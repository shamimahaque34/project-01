<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LibraryEbookFile;

class LibraryEbookFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LibraryEbookFile::factory()
            ->count(5)
            ->create();
    }
}
