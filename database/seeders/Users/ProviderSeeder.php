<?php

namespace Database\Seeders\Users;

use App\Models\Users\Provider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provider::factory()->count(20)->create([
            'password'  => Hash::make('5uper4dm!nCar3vis3'),
        ]);
    }
}
