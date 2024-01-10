<?php

namespace Database\Seeders;

use App\Models\LibraryBook;
use Illuminate\Database\Seeder;

class LibraryBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LibraryBook::factory()
            ->count(5)
            ->create();
    }
}
