<?php

namespace Database\Seeders;

use App\Models\LibraryEbook;
use Illuminate\Database\Seeder;

class LibraryEbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LibraryEbook::factory()
            ->count(5)
            ->create();
    }
}
