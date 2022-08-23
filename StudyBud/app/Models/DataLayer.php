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

    public function listPosts($user){
        $posts = Post::where('user_id'.$user)->get();
        return $posts;
    }

    public function listCourses($user){
        $courses = Course::where('professor_id'.$user)->get();
        return $courses;
    }

    public function listUsers($course){
        $users = Course::where('course_id'.$course)->get();
        return $users;
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

    public function deleteUserById($id){
        $user = SBUser::find($id);
        $user->delete();
    }

    public function deleteCourseById($id){
        $course = Course::find($id);
        $course->delete();
    }

    public function deletePostById($id){
        $post = Post::find($id);
        $post->delete();
    }

    public function editUser($id, $username, $full_name, $email, $password, $institution, $major, $role){
        $user = SBUser::find($id);
        $user->username = $username;
        $user->full_name = $full_name;
        $user->email = $email;
        $user->password = $password;
        $user->institution = $institution;
        $user->major = $major;
        $user->role = $role;
        $user->save();
    }

    public function editCourse($id, $name, $professor_id, $university, $major){
        $course = Course::find($id);
        $course->name = $name;
        $course->professor_id = $professor_id;
        $course->university = $university;
        $course->major = $major;
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

    public function addCourse($name, $professor_id, $university, $major){
        $course = new Course();
        $course->name = $name;
        $course->professor_id = $professor_id;
        $course->university = $university;
        $course->major = $major;
        $course->save();
    }

    public function addPost($user_id, $course_id, $content){
        $post = new Post();
        $post->user_id = $user_id;
        $post->course_id = $course_id;
        $post->content = $content;
        $post->save();
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
}
