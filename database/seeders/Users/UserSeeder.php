<?php

namespace Database\Seeders\Users;

use App\Models\Users\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'username'  => 'superadmin',
            'email'     => 'superadmin@carevise.com',
            'password'  => Hash::make('5uper4dm!nCar3vis3'),
        ]);
    }
}
