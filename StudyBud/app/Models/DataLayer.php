<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;
use App\Models\Course;
use App\Models\SBUser;

class DataLayer extends Model
{
    use HasFactory;

    public function listPostsByUserId($user){
        $posts = Post::where('user_id',$user)->orderBy('post_id','desc')->get();
        return $posts;
    }

    public function listPostsByCourseId($courseId){
        $posts = Post::where('course_id', $courseId)->orderBy('post_id','desc')->get();
        return $posts;
    }

    public function listAllPosts(){
        $posts = Post::orderBy('post_id','desc')->get();
        return $posts;
    }

    public function listCourses($userID){
        $courses = Course::where('professor_id',$userID)->get();
        return $courses;
    }

    public function listAllCourses(){
        $courses = Course::all();
        return $courses;
    }

    public function listCoursesByUserId($userID){
        $courses = SBUser::find($userID)->courses;
        return $courses;
    }

    public function listCoursesAvailableByUserId($userID){
        $uni = SBUser::find($userID)->uni_id;
        $courses = Course::whereNotIn('course_id', function($query) use ($userID){
            $query->select('course_id')->from('courses_sb_users')->where('user_id', $userID);
        })->where('uni_id', $uni)->get();
        return $courses;
    }

    public function listPostByEnrolledCourses($userID){
        $posts = Post::whereIn('course_id', function($query) use ($userID){
            $query->select('course_id')->from('courses_sb_users')->where('user_id', $userID);
        })->orderBy('post_id','desc')->get();
        return $posts;
    }

    public function listUsers($course){
        $users = Course::where('course_id',$course)->get();
        return $users;
    }

    public function listUniversities(){
        $universities = University::all();
        return $universities;
    }

    public function listCoursesByUniversity($university){
        $courses = Course::where('university_id',$university)->get();
        return $courses;
    }

    public function listCommentsByPostId($postId){
        $comments = Comment::where('post_id',$postId)->orderBy('comment_id','asc')->get();
        return $comments;
    }

    public function findUserById($id){
        $user = SBUser::find($id);
        return $user;
    }

    public function findCourseById($id){
        $course = Course::find($id);
        return $course;
    }

    public function findPostById($id){
        $post = Post::find($id);
        return $post;
    }

    public function findCourseByProfessorId($id){
        $course = Course::where('professor_id', $id)->get();
        return $course;
    }

    public function findPostByUserId($id){
        $post = Post::where('user_id', $id)->get();
        return $post;
    }

    public function findPostByCourseId($id){
        $post = Post::where('course_id', $id)->get();
        return $post;
    }

    public function findUniversityById($id){
        $university = University::find($id);
        return $university;
    }

    public function deleteUser($id){
        $user = SBUser::find($id);
        $user->delete();
    }

    public function deleteCourse($id){
        $course = Course::find($id);
        $course->delete();
    }

    public function deletePost($id){
        $post = Post::find($id);
        $post->delete();
    }

    public function deleteUserPostsinCourse($id, $course){
        $post = Post::where('course_id', $course)->where('user_id', $id)->delete();
    }

    public function deleteComment($id){
        $comment = Comment::find($id);
        $comment->delete();
    }

    public function editUser($id, $username, $full_name, $email, $uni_id, $major){
        $user = SBUser::find($id);
        $user->username = $username;
        $user->full_name = $full_name;
        $user->email = $email;
        $user->uni_id = $uni_id;
        $user->major = $major;
        $user->save();
        $_SESSION['loggedName'] = $username;
    }

    public function editUserPassword($id, $password){
        $user = SBUser::find($id);
        $user->password = $password;
        $user->save();
    }

    public function editCourse($id, $name){
        $course = Course::find($id);
        $course->name = $name;
        $course->save();
    }

    public function editPost($id, $user_id, $course_id, $content){
        $post = Post::find($id);
        $post->user_id = $user_id;
        $post->course_id = $course_id;
        $post->content = $content;
        $post->save();
    }

    public function addUser($username, $full_name, $email, $password, $university, $major, $role){
        $user = new SBUser();
        $user->username = $username;
        $user->full_name = $full_name;
        $user->email = $email;
        $user->password = md5($password);
        $user->university = $university;
        $user->major = $major;
        $user->role = $role;
        $user->save();
    }

    public function addCourse($name, $professor_id, $uni_id){
        $course = new Course();
        $course->name = $name;
        $course->professor_id = $professor_id;
        $course->uni_id = $uni_id;
        $course->save();
    }

    public function addPost($user_id, $course_id, $content){
        $post = new Post();
        $post->user_id = $user_id;
        $post->course_id = $course_id;
        $post->content = $content;
        $post->save();
    }

    public function addUniversity($name){
        $university = new University();
        $university->name = $name;
        $university->save();
    }

    public function addComment($user_id, $post_id, $content){
        $comment = new Comment();
        $comment->user_id = $user_id;
        $comment->post_id = $post_id;
        $comment->content = $content;
        $comment->save();
    }

    // validazione utente
    public function validateUser($username, $password){
        $user = SBUser::where('username', $username)->get(['password']);
        if(count($user) == 0){
            return false;
        } else {
            return (md5($password) == ($user[0]->password));
        }
    }

    public function addUserToCourse($userID, $courseID){
        $course = Course::find($courseID);
        $course->users()->attach($userID);
    }

    public function removeUserFromCourse($userID, $courseID){
        $course = Course::find($courseID);
        $course->users()->detach($userID);

    }

    public function getUserID($username){
        $id = SBUser::where('username', $username)->get(['user_id']);
        return $id[0]->user_id;
    }

    public function getCourseId($name){
        $id = Course::where('name', $name)->get(['course_id']);
        return $id[0]->course_id;
    }

    public function checkIfUserIsInCourse($userID, $courseID){
        $course = Course::find($courseID);
        $users = $course->users()->get();
        foreach($users as $user){
            if($user->user_id == $userID){
                return true;
            }
        }
        return false;
    }

    public function removeUserFromAllCourses($userID){
        $courses = Course::all();
        foreach($courses as $course){
            $course->users()->detach($userID);
        }
    }
}
