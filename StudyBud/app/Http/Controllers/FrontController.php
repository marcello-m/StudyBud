<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\DataLayer;

class FrontController extends Controller
{
    public function getHome()
    {
        session_start();
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
            $dl = new DataLayer();
            $userID = $dl->getUserId($_SESSION['loggedName']);
            $post_list = $dl->listPostByEnrolledCourses($userID);
            $user = $dl->findUserById($userID);
            $course_list = $dl->listCoursesByUserId($userID);
            $uni = $dl->findUniversityById($user->uni_id);
            return view('home')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('postList', $post_list)->with('courseList', $course_list)->with('user', $user)->with('uni', $uni);
        } else {
            return view('auth/index')->with('logged', false);
        }
    }
}
