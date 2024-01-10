<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher=[
            [
                'id'=>1,
                'name'=>'S.M Sarowar',
                'email'=>'sarowara8@gmail.com',
                'user_name'=>'sarowar',
                'subject'=>'bangla',
                'Phone'=>'01677997957',
                'desination'=>'asdd',
                'dob'=>'12',
                'gender'=>'male',
                'religion'=>'islam',
                'joining_date'=>'12',
                'photo'=>' ',
                'address'=>' ',
                'education'=>' ',
                'password'=>'12345678',
                'created_by'=>' ',
                'Slug'=>'sarowar',
                'status'=>1,
            ],
            [
                'id'=>2,
                'name'=>'sarowar ahmed',
                'email'=>'sarowar352420@diu.edu.bd',
                'user_name'=>'sarowar ahmed',
                'subject'=>'bangla',
                'Phone'=>'01234568',
                'desination'=>'asdd',
                'dob'=>'12',
                'gender'=>'male',
                'religion'=>'islam',
                'joining_date'=>'12',
                'photo'=>' ',
                'address'=>' ',
                'education'=>' ',
                'password'=>'12345678',
                'created_by'=>' ',
                'Slug'=>'sarowar ahmed',
                'status'=>1,
            ]
        ];
        Teacher::insert($teacher);
    }
}
