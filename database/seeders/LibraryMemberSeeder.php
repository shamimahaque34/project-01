<?php

namespace Database\Seeders;

use App\Models\LibraryMember;
use Illuminate\Database\Seeder;

class LibraryMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LibraryMember::factory()
            ->count(5)
            ->create();
    }
}
