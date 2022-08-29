<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\DataLayer;

class UserController extends Controller
{
    public function show($userId)
    {
        // show single profile
        $dl = new DataLayer();
        // user of the profile
        $user = $dl->findUserById($userId);
        // logged user
        $loggedUser = $dl->findUserById($dl->getUserId($_SESSION['loggedName']));
        $uni = $dl->findUniversityById($user->uni_id);
        $enrolled_course_list = $dl->listCoursesByUserId($userId);
        $postList = $dl->listPostsByUserIdAndEnrollment($userId, $loggedUser->user_id);
        return view('profile')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('user', $user)->with('uni', $uni)->with('enrolledCoursesList', $enrolled_course_list)->with('loggedUser', $loggedUser)->with('postList', $postList);
    }

    public function edit($userId)
    {
        // view edit form
        $dl = new DataLayer();
        $user = $dl->findUserById($userId);
        $uni = $dl->findUniversityById($user->uni_id);
        $uniList = $dl->listUniversities()->where('uni_id', '!=', $user->uni_id);
        return view('editProfile')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('user', $user)->with('uni', $uni)->with('uniList', $uniList);
    }

    public function update($userId, Request $request)
    {
        // for saving just edited profile
        $dl = new DataLayer();
        $user = $dl->findUserById($userId);
        $uniBefore = $dl->findUniversityById($user->uni_id);

        $dl->editUser($userId, $request->input('username'), $request->input('full_name'), $request->input('email'), $request->input('uni_id'), $request->input('major'));

        $newUser = $dl->findUserById($userId);
        $uni = $dl->findUniversityById($newUser->uni_id);

        $loggedUser = $dl->findUserById($dl->getUserId($_SESSION['loggedName']));

        if ($uniBefore->uni_id != $uni->uni_id) {
            if ($user->role == "Professor") {
                $dl->removeUserFromAllCourses($userId);
                $dl->deleteAllCreatedCourses($userId);
            } else {
                $dl->removeUserFromAllCourses($userId);
            }
        }

        $enrolled_course_list = $dl->listCoursesByUserId($userId);
        $postList = $dl->listPostsByUserId($userId);
        return Redirect::to('/user/' . $userId);
    }


    public function editPassword($userId)
    {
        $_SESSION['passwordEditError'] = false;
        $dl = new DataLayer();
        $user = $dl->findUserById($userId);
        return view('editPassword')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('user', $user);
    }

    public function updatePassword($userId, Request $request)
    {
        $dl = new DataLayer();
        if (md5($request->input('oldPassword')) == $dl->findUserById($userId)->password) {
            if ($request->input('newPassword') == $request->input('newPasswordConfirm')) {
                $dl->editUserPassword($userId, $request->input('newPassword'));
            } else {
                return Redirect::to('/user/' . $userId);
            }
        } else {
            $user = $dl->findUserById($userId);
            $_SESSION['passwordEditError'] = true;
            return view('editPassword')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('user', $user);
        }
        $_SESSION['logged'] = false;
        return Redirect::to('/');
    }

    public function editPicture($userId)
    {
        $dl = new DataLayer();
        $user = $dl->findUserById($userId);
        return view('editProfilePicture')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('user', $user);
    }

    public function updatePicture($userId, Request $request)
    {
        $dl = new DataLayer();

        $cover_name = "";

        if ($request->hasFile('picture')) {
            $cover = $request->file('picture');
            $cover_name = $userId . '.png';
            $cover->move(public_path() . "/img/profile/", $cover_name);
            $dl->editUserPicture($userId, $cover_name);
        } else {
            $dl->editUserPicture($userId, "default.png");
        }
        return Redirect::to('/user/' . $userId);
    }
    
    public function ajaxUser(Request $request)
    {
        $dl = new DataLayer();
        if ($dl->usernameExists($request->input('username'))) {
            $response = array('found' => true); // username found
        } else {
            $response = array('found' => false); // username not found
        }
        return response()->json($response);
    }
}
