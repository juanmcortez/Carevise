<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\Users\UserSeeder;
use Database\Seeders\Users\ProviderSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a unique main user
        $this->callOnce(UserSeeder::class);
        // Create some providers
        $this->call(ProviderSeeder::class);
    }
}
