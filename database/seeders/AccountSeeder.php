<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.de',
            'password' => Hash::make('satisati'),
            'is_admin' => true
        ]);

        // Standard User
        User::create([
            'name' => 'user',
            'email' => 'user@example.de',
            'password' => Hash::make('satisati'),
            'email_verified_at' => now()
        ]);
    }
}
