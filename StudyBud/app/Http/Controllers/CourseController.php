<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\DataLayer;

use function PHPUnit\Framework\isEmpty;

class CourseController extends Controller
{
    public function index()
    {
        $dl = new DataLayer();
        $userID = $dl->getUserId($_SESSION['loggedName']);
        $user = $dl->findUserById($userID);
        $enrolled_course_list = $dl->listCoursesByUserId($userID);
        $available_course_list = $dl->listCoursesAvailableByUserId($userID);
        return view('manageCourses')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('enrolledCoursesList', $enrolled_course_list)->with('availableCoursesList', $available_course_list)->with('user', $user);
    }

    public function create()
    {
        // view creation form
        $dl = new DataLayer();
        $userID = $dl->getUserId($_SESSION['loggedName']);
        $user = $dl->findUserById($userID);
        $uni = $dl->findUniversityById($user->uni_id);
        return view('editCourse')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('user', $user)->with('uni', $uni);
    }

    public function edit($courseId)
    {
        // view edit form
        $dl = new DataLayer();
        $userID = $dl->getUserId($_SESSION['loggedName']);
        $user = $dl->findUserById($userID);
        $course = $dl->findCourseById($courseId);
        $uni = $dl->findUniversityById($user->uni_id);
        return view('editCourse')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('user', $user)->with('course', $course)->with('uni', $uni);
    }

    public function update($course, Request $request)
    {
        // for saving just edited course
        $dl = new DataLayer();
        $userID = $dl->getUserId($_SESSION['loggedName']);
        $user = $dl->findUserById($userID);
        if ($user->role == "Student") {
            $dl->addUserToCourse($userID, $course);
        } else if ($user->role == "Professor") {
            $dl->editCourse($course, $request->input('name'));
        }
        return Redirect::to('/course');
    }

    public function store(Request $request)
    {
        // for saving just created course
        $dl = new DataLayer();
        $userID = $dl->getUserId($_SESSION['loggedName']);
        $user = $dl->findUserById($userID);
        $uni = $dl->findUniversityById($user->uni_id);
        $dl->addCourse($request->input('name'), $userID, $uni->uni_id);
        $course_id = $dl->getCourseId($request->input('name'));
        $dl->addUserToCourse($userID, $course_id);
        return view('manageCourses')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('enrolledCoursesList', $dl->listCoursesByUserId($userID))->with('availableCoursesList', $dl->listCoursesAvailableByUserId($userID))->with('user', $user);
    }

    public function destroy($courseId)
    {
        // for deleting a course
        $dl = new DataLayer();
        $userID = $dl->getUserId($_SESSION['loggedName']);
        $user = $dl->findUserById($userID);
        if ($user->role == "Student") {
            $dl->removeUserFromCourse($userID, $courseId);
            return Redirect::to('/course');
        } else {
            $dl->removeUserFromCourse($userID, $courseId);
            $dl->deleteCourse($courseId);
            return Redirect::to('/course');
        }
    }

    public function show($id)
    {
        $dl = new DataLayer();
        $userID = $dl->getUserId($_SESSION['loggedName']);
        $user = $dl->findUserById($userID);
        $course = $dl->findCourseById($id);
        $post_list = $dl->listPostsByCourseId($id);
        $course_list = $dl->listCoursesByUserId($userID);
        $professor = $dl->findUserById($course->professor_id);
        $uni = $dl->findUniversityById($user->uni_id);
        if ($dl->isEnrolled($userID, $id)) {
            return view('course')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('postList', $post_list)->with('courseList', $course_list)->with('user', $user)->with('course', $course)->with('professor', $professor)->with('uni', $uni);
        } else {
            return Redirect::to('/course');
        }
    }

    public function members($courseId)
    {
        $dl = new DataLayer();
        $userID = $dl->getUserId($_SESSION['loggedName']);
        $user = $dl->findUserById($userID);
        $course = $dl->findCourseById($courseId);
        $uni = $dl->findUniversityById($user->uni_id);
        $member_list = $dl->listCourseMembers($course);
        return view('courseMembers')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('membersList', $member_list)->with('user', $user)->with('course', $course)->with('uni', $uni);
    }

    public function ajaxCourseNameCheck(Request $request)
    {
        $dl = new DataLayer();
        $userID = $dl->getUserId($_SESSION['loggedName']);
        $user = $dl->findUserById($userID);
        $foundCourse = $dl->findCourseByNameAndUniId($request->input('name'), $user->uni_id, $request->input('id'));
        if ($foundCourse) {
            $response = array('found' => true); // course found
        } else {
            $response = array('found' => false); // course not found
        }
        return response()->json($response);
    }
}
