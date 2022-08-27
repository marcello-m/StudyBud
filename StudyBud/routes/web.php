<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\CourseController;

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

Route::get('/user/login', [AuthController::class, 'authentication'])->name('user.login');
Route::post('/user/login', [AuthController::class, 'login'])->name('user.login');
Route::get('/user/register', [AuthController::class, 'register'])->name('user.register');
Route::post('/user/register', [AuthController::class, 'registration'])->name('user.register');
Route::get('/user/logout', [AuthController::class, 'logout'])->name('user.logout');

Route::get('/', [FrontController::class, 'getHome'])->middleware('lang')->name('index');

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
