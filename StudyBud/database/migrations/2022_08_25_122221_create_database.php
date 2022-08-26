<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('posts', function (Blueprint $table) {
            $table->increments('post_id');
            $table->integer('user_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->string('content');
        });

        Schema::create('courses', function (Blueprint $table) {
            $table->increments('course_id');
            $table->string('name');
            $table->integer('professor_id')->unsigned();
            $table->integer('uni_id')->unsigned();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->string('content');
        });

        Schema::create('universities', function (Blueprint $table) {
            $table->increments('uni_id');
            $table->string('name');
        });

        Schema::create('courses_sb_users',function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('course_id')->unsigned();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('sb_users');
            $table->foreign('course_id')->references('course_id')->on('courses');
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->foreign('professor_id')->references('user_id')->on('sb_users');
            $table->foreign('uni_id')->references('uni_id')->on('universities');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('sb_users');
            $table->foreign('post_id')->references('post_id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
