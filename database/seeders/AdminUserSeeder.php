<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'admin@todo.local',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('SekretneHaslo123@!'), // hasło zaszyfrowane
        ]);
    }
}
