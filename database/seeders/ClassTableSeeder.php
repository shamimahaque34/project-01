<?php

namespace Database\Seeders;

use App\Models\ClassMadrasha;
use Illuminate\Database\Seeder;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class=[
            [
                'id'=>1,
                'class_name'=>'one',
                'class_numeric'=>12,
                'class_note'=>'class one',
                'class_lavel'=>'primary',
                'status'=>1,
                'slug'=>str_replace(' ', '-', 'a'),
            ],
            [
                'id'=>2,
                'class_name'=>'one',
                'class_numeric'=>12,
                'class_note'=>'class one',
                'class_lavel'=>'primary',
                'status'=>1,
                'slug'=>str_replace(' ', '-', 'b'),
            ],
        ];
        ClassMadrasha::insert($class);
    }
}
