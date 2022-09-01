<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('lang')->group(function () {
Route::get('/user/login', [AuthController::class, 'authentication'])->name('user.login');
Route::post('/user/login', [AuthController::class, 'login'])->name('user.login');
Route::get('/user/register', [AuthController::class, 'register'])->name('user.register');
Route::post('/user/register', [AuthController::class, 'registration'])->name('user.register');
Route::get('/user/logout', [AuthController::class, 'logout'])->name('user.logout');

Route::get('/', [FrontController::class, 'getHome'])->middleware('lang')->name('index');

Route::get('/ajaxRegister', [AuthController::class, 'ajaxRegister'])->name('ajaxRegister');
Route::get('/ajaxLogin', [AuthController::class, 'ajaxLogin'])->name('ajaxLogin');
});

Route::middleware('auth.custom', 'lang')->group(function () {
    Route::post('/', [PostController::class, 'post'])->name('post');
    Route::post('/course/{course}', [PostController::class, 'postInCourse'])->name('post.course');
    
    Route::get('/post/{postId}', [PostController::class, 'show'])->name('post.show');
    Route::post('/post/{postId}/comment', [PostController::class, 'comment'])->name('post.comment');
    Route::get('post/{postId}/destroy', [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('post/{postId}/comment/{commentId}/destroy', [PostController::class, 'destroyComment'])->name('post.comment.destroy');
    
    Route::resource('/course', CourseController::class);
    Route::get('/course/{course}/destroy', [CourseController::class, 'destroy'])->name('course.destroy');
    Route::get('/course/{course}/update', [CourseController::class, 'update'])->name('course.update');
    Route::get('/course/{course}/members', [CourseController::class, 'members'])->name('course.members');

    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{userId}/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/{userId}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/user/{userId}/editPassword', [UserController::class, 'editPassword'])->name('user.edit.password');
    Route::get('/user/{userId}/updatePassword', [UserController::class, 'updatePassword'])->name('user.update.password');
    Route::get('/user/{userId}/editPicture', [UserController::class, 'editPicture'])->name('user.edit.picture');
    Route::post('/user/{userId}/updatePicture', [UserController::class, 'updatePicture'])->name('user.update.picture');

    Route::get('/ajaxCourse', [CourseController::class, 'ajaxCourseNameCheck'])->name('ajaxCourse');
    Route::get('/ajaxUser', [UserController::class, 'ajaxUser'])->name('ajaxUser');
    Route::get('/ajaxPassword', [UserController::class, 'ajaxPassword'])->name('ajaxPassword');
});

/*
resource routes:
    index -> post.index
    create -> post.create
    store -> post.store
    show -> post.show
    edit -> post.edit
    update -> post.update
    destroy -> post.destroy
*/

Route::get('/lang/{lang}', [LangController::class, 'changeLanguage'])->name('setLang');
