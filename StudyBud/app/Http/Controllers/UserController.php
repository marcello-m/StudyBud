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
        $postList = $dl->listPostsByUserId($userId);
        return view('profile')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('user', $user)->with('uni', $uni)->with('enrolledCoursesList', $enrolled_course_list)->with('loggedUser', $loggedUser)->with('postList', $postList);
    }

    public function edit($userId)
    {
        // view edit form
        $dl = new DataLayer();
        $user = $dl->findUserById($userId);
        $uni = $dl->findUniversityById($user->uni_id);
        $uniList = $dl->listUniversities();
        return view('editProfile')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('user', $user)->with('uni', $uni)->with('uniList', $uniList);
    }

    public function update($userId, Request $request)
    {
        // for saving just edited profile
        $dl = new DataLayer();
        $user = $dl->findUserById($userId);
        $uniBefore = $dl->findUniversityById($user->uni_id);
        $dl->editUser($userId, $request->input('username'), $request->input('full_name'), $request->input('email'), $request->input('uni_id'), $request->input('major'));
        $uni = $dl->findUniversityById($user->uni_id);
        $loggedUser = $dl->findUserById($dl->getUserId($_SESSION['loggedName']));
        if($uniBefore->id != $uni->id){
            $dl->removeUserFromAllCourses($userId);
            $dl->deleteUserPostsinCourse($userId, $uniBefore->id);
        }
        $enrolled_course_list = $dl->listCoursesByUserId($userId);
        return view('profile')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('user', $user)->with('uni', $uni)->with('enrolledCoursesList', $enrolled_course_list)->with('loggedUser', $loggedUser);
    }
}
