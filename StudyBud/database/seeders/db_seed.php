<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SBUser;
use App\Models\Post;
use App\Models\Comment;
use App\Models\DataLayer;
use Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class db_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        SBUser::create(['username'=>'m.manenti',
        'full_name'=>'Marcello Manenti',
        'email'=>'m.manenti016@studenti.unibs.it',
        'password'=>md5('prova'),
        'uni_id'=>1,
        'major'=>'Informatica',
        'role'=>'Student']);

        SBUser::create(['username'=>'a.bettinzana',
        'full_name'=>'Alessandro Bettinzana',
        'email'=>'a.bettinzana@studenti.unibs.it',
        'password'=>md5('provabet'),
        'uni_id'=>2,
        'major'=>'Informatica',
        'role'=>'Student']);

        SBUser::create(['username'=>'sarto',
        'full_name'=>'Marco Sartorelli',
        'email'=>'m.sartorelli@studenti.unibs.it',
        'password'=>md5('provasarto'),
        'uni_id'=>4,
        'major'=>'Informatica',
        'role'=>'Student']);

        SBUser::create(['username'=>'matteom',
        'full_name'=>'Matteo Martani',
        'email'=>'m.martani@studenti.unibs.it',
        'password'=>md5('provamatteo'),
        'uni_id'=>1,
        'major'=>'Informatica',
        'role'=>'Student']);

        SBUser::create(['username'=>'b.gates',
        'full_name'=>'Bill Gates',
        'email'=>'b.gates@microsoft.com',
        'password'=>md5('billbill'),
        'uni_id'=>1,
        'major'=>'Informatica',
        'role'=>'Professor']);
        */

        $dl = new DataLayer();
        $userMarcello = $dl->getUserID('m.manenti');
        $userAlessandro = $dl->getUserID('a.bettinzana');
        $userMarco = $dl->getUserID('sarto');
        $userMatteo = $dl->getUserID('matteom');
        $userGiovanni = $dl->getUserID('g.baselli');

        $userBill = $dl->getUserID('b.gates');
        $userTuring = $dl->getUserID('a.turing');
        $userNeumann = $dl->getUserID('j.neumann');
        $userBuffett = $dl->getUserID('w.buffett');
        $userBoole = $dl->getUserID('g.boole');

        $students = [$userMarcello, $userAlessandro, $userMarco, $userMatteo, $userGiovanni];
        $professors = [$userBill, $userTuring, $userNeumann, $userBuffett, $userBoole];
        
        Course::factory()->count(3)->create(['professor_id'=>$userBoole, 'uni_id'=>3]);

        $coursesBoole = $dl->listCoursesByProfessor($userBoole);

        foreach($coursesBoole as $course) {
            $dl->addUserToCourse($userBoole, $course->course_id);
        }

        foreach ($students as $student) {
            $courses = $dl->listCoursesAvailableByUserId($student);
            // apply to 3 random different courses
            foreach ($courses as $course) {
                $random = rand(0, count($courses) - 1);
                $dl->addUserToCourse($student, $courses[$random]->course_id);
            }
        }

        // generate random posts for each course chosing a random enrolled user
        $courses = $dl->listCourses();
        foreach ($courses as $course) {
            $users = $dl->listEnrolledUsers($course->course_id);
            for($i = 0; $i < rand(1, 40); $i++) {
                if (count($users) > 1) {
                    $random = rand(0, count($users) - 1);
                    $user = $users[$random];
                    Post::factory()->create(['course_id' => $course->course_id, 'user_id' => $user->user_id]);
                }
            }
        }

        // generate random comments for each post
        $posts = $dl->listPosts();
        foreach ($posts as $post) {
            $users = $dl->listEnrolledUsers($post->course_id);
            for($i = 0; $i < rand(0, 20); $i++) {
                if (count($users) > 1) {
                    $random = rand(0, count($users) - 1);
                    $user = $users[$random];
                    Comment::factory()->create(['post_id' => $post->post_id, 'user_id' => $user->user_id]);
                }
            }
        }
    }
}
