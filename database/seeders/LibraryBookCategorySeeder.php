<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LibraryBookCategory;

class LibraryBookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LibraryBookCategory::factory()
            ->count(5)
            ->create();
    }
}
