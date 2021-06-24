<?php

namespace Database\Seeders;

use App\Models\Document;
use Database\Factories\FieldFactory;
use Database\Factories\FormFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            CategorySeeder::class,
            PermissionsSeeder::class,
            NewsSeeder::class,
            ProductSeeder::class,
            CartSeeder::class,
            WishlistSeeder::class,
            FieldSeeder::class,
            FormSeeder::class,
            DocumentSeeder::class,
        ]);

    }
}
