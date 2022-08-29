<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder; 
use App\Models\SBUser;
use App\Models\Post;
use App\Models\DataLayer;
use Database\Factories\CourseFactory;

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
        $userBill = $dl->getUserID('b.gates');

        Course::factory()->count(5)->create(['professor_id'=>$userBill, 'uni_id'=>$userBill->uni_id]);
    }
}
