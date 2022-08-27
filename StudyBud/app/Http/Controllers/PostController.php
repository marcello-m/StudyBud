<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\DataLayer;

class PostController extends Controller
{
    public function post(Request $request)
    {
        $dl = new DataLayer();
        // add submitted post to database
        $userId = $dl->getUserId($_SESSION['loggedName']);
        $dl->addPost($userId, $request->input('course'), $request->input('content'));
        return Redirect::to('/');
    }

    public function postInCourse(Request $request, $course)
    {
        $dl = new DataLayer();
        // add submitted post to database
        $userId = $dl->getUserId($_SESSION['loggedName']);
        $dl->addPost($userId, $course, $request->input('content'));
        return Redirect::to('/course/' . $course);
    }

    public function show($postId)
    {
        $dl = new DataLayer();
        $post = $dl->findPostById($postId);
        $userId = $dl->getUserId($_SESSION['loggedName']);
        $user = $dl->findUserById($userId);
        $course = $dl->findCourseById($post->course_id);
        $comments = $dl->listCommentsByPostId($postId);
        return view('post')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('post', $post)->with('user', $user)->with('course', $course)->with('commentsList', $comments);
    }

    public function comment($postId, Request $request)
    {
        $dl = new DataLayer();
        $userId = $dl->getUserId($_SESSION['loggedName']);
        $dl->addComment($userId, $postId, $request->input('content'));
        return Redirect::to('/post/' . $postId);
    }

    public function destroy($postId)
    {
        $dl = new DataLayer();
        $dl->deletePost($postId);
        return Redirect::to('/');
    }

    public function destroyComment($postId, $commentId)
    {
        $dl = new DataLayer();
        $dl->deleteComment($commentId);
        return Redirect::to('/post/' . $postId);
    }
}
