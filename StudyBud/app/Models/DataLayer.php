<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;
use App\Models\Course;
use App\Models\SBUser;

use Illuminate\Support\Facades\File;

class DataLayer extends Model
{
    use HasFactory;

    public function listPostsByUserId($user)
    {
        $posts = Post::where('user_id', $user)->orderBy('post_id', 'desc')->get();
        return $posts;
    }

    public function listPostsByUserIdAndEnrollment($user, $loggedUser)
    {
        // get post list by user id and remove posts that are not enrolled by logged user
        $posts = Post::where('user_id', $user)->orderBy('post_id', 'desc')->get();
        $enrolled_course_list = $this->listCoursesByUserId($loggedUser);
        $enrolled_course_ids = array();
        foreach ($enrolled_course_list as $course) {
            array_push($enrolled_course_ids, $course->course_id);
        }
        $filtered_posts = array();
        foreach ($posts as $post) {
            if (in_array($post->course_id, $enrolled_course_ids)) {
                array_push($filtered_posts, $post);
            }
        }
        return $filtered_posts;
    }

    public function listPostsByCourseId($courseId)
    {
        $posts = Post::where('course_id', $courseId)->orderBy('post_id', 'desc')->get();
        return $posts;
    }

    public function listCoursesByUserId($userID)
    {
        $courses = SBUser::find($userID)->courses;
        return $courses;
    }

    public function listCoursesAvailableByUserId($userID)
    {
        $uni = SBUser::find($userID)->uni_id;
        $courses = Course::whereNotIn('course_id', function ($query) use ($userID) {
            $query->select('course_id')->from('courses_sb_users')->where('user_id', $userID);
        })->where('uni_id', $uni)->get();
        return $courses;
    }

    public function listPostByEnrolledCourses($userID)
    {
        $posts = Post::whereIn('course_id', function ($query) use ($userID) {
            $query->select('course_id')->from('courses_sb_users')->where('user_id', $userID);
        })->orderBy('post_id', 'desc')->get();
        return $posts;
    }

    public function listUniversities()
    {
        $universities = University::all();
        return $universities;
    }

    public function listCommentsByPostId($postId)
    {
        $comments = Comment::where('post_id', $postId)->orderBy('comment_id', 'asc')->get();
        return $comments;
    }

    public function findUserById($id)
    {
        $user = SBUser::find($id);
        return $user;
    }

    public function findCourseById($id)
    {
        $course = Course::find($id);
        return $course;
    }

    public function findPostById($id)
    {
        $post = Post::find($id);
        return $post;
    }

    public function findCourseByName($name)
    {
        $course = Course::where('name', $name)->get();
        return $course;
    }

    public function findCourseByNameAndUniId($name, $uniId, $editedCourseId)
    {
        $course = Course::where('name', $name)->where('uni_id', $uniId)->get();
        if (count($course) > 0) {
            if($course[0]->course_id == $editedCourseId){
                return false;
            }
            return true;
        } else {
            return false;
        }
    }

    public function findUniversityById($id)
    {
        $university = University::find($id);
        return $university;
    }

    public function deleteCourse($id)
    {
        $course = Course::find($id);
        $course->delete();
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
    }

    public function deleteUserPostsinCourse($id, $course)
    {
        $post = Post::where('user_id', $id)->where('course_id', $course)->get();
        foreach ($post as $p) {
            $p->delete();
        }
    }

    public function deleteUserCommentsInCourse($id, $course)
    {
        $commentedPosts = Comment::where('user_id', $id)->get();
        foreach ($commentedPosts as $post) {
            if ($post->post->course_id == $course) {
                $post->delete();
            }
        }
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
    }

    public function editUser($id, $username, $full_name, $email, $uni_id, $major)
    {
        $user = SBUser::find($id);
        $user->username = $username;
        $user->full_name = $full_name;
        $user->email = $email;
        $user->uni_id = $uni_id;
        $user->major = $major;
        $user->save();
        $_SESSION['loggedName'] = $username;
    }

    public function editUserPassword($id, $password)
    {
        $user = SBUser::find($id);
        $user->password = md5($password);
        $user->save();
    }

    public function editCourse($id, $name)
    {
        $course = Course::find($id);
        $course->name = $name;
        $course->save();
    }

    public function addUser($username, $full_name, $email, $password, $uni, $major, $role)
    {
        $user = new SBUser();
        $user->username = $username;
        $user->full_name = $full_name;
        $user->email = $email;
        $user->password = md5($password);
        $user->uni_id = $uni;
        $user->major = $major;
        $user->role = $role;
        $user->save();
    }

    public function addCourse($name, $professor_id, $uni_id)
    {
        $course = new Course();
        $course->name = $name;
        $course->professor_id = $professor_id;
        $course->uni_id = $uni_id;
        $course->save();
    }

    public function addPost($user_id, $course_id, $content)
    {
        $post = new Post();
        $post->user_id = $user_id;
        $post->course_id = $course_id;
        $post->content = $content;
        $post->save();
    }

    public function addComment($user_id, $post_id, $content)
    {
        $comment = new Comment();
        $comment->user_id = $user_id;
        $comment->post_id = $post_id;
        $comment->content = $content;
        $comment->save();
    }

    // validazione utente
    public function validateUser($username, $password)
    {
        $user = SBUser::where('username', $username)->get(['password']);
        if (count($user) == 0) {
            return false;
        } else {
            return (md5($password) == ($user[0]->password));
        }
    }

    public function addUserToCourse($userID, $courseID)
    {
        $course = Course::find($courseID);
        $course->users()->attach($userID);
    }

    public function removeUserFromCourse($userID, $courseID)
    {
        $course = Course::find($courseID);
        $this->deleteUserCommentsInCourse($userID, $courseID);
        $this->deleteUserPostsinCourse($userID, $courseID);
        $course->users()->detach($userID);
    }

    public function getUserId($username)
    {
        $id = SBUser::where('username', $username)->get(['user_id']);
        return $id[0]->user_id;
    }

    public function getCourseId($name)
    {
        $id = Course::where('name', $name)->get(['course_id']);
        return $id[0]->course_id;
    }

    public function isEnrolled($userID, $courseID)
    {
        $course = Course::find($courseID);
        $users = $course->users()->get();
        foreach ($users as $user) {
            if ($user->user_id == $userID) {
                return true;
            }
        }
        return false;
    }

    public function removeUserFromAllCourses($userID)
    {
        $courses = Course::all();
        foreach ($courses as $course) {
            $this->removeUserFromCourse($userID, $course->course_id);
        }
    }

    public function deleteAllCreatedCourses($userID)
    {
        $courses = Course::where('professor_id', $userID)->get();
        foreach ($courses as $course) {
            $course->delete();
        }
    }

    public function usernameExists($username)
    {
        $user = SBUser::where('username', $username)->get();
        if (count($user) == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function editUserPicture($id, $picture)
    {
        $user = SBUser::find($id);
        $user->profile_picture = $picture;
        $user->save();
    }
}
