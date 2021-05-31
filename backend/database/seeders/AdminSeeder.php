<?php

namespace Database\Seeders;

use App\Models\Admin;
use Database\Factories\AdminFactory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory()->create();
    }
}
