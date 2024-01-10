<?php

namespace Database\Seeders;

use App\Models\HostelMember;
use Illuminate\Database\Seeder;

class HostelMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HostelMember::factory()
            ->count(5)
            ->create();
    }
}
