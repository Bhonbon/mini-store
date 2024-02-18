<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Laravel\Prompts\password;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin Bhonbon',
            'email' => 'bonbongonzales16@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Cabornay123'),
            'admin' => 1,
            'approved_at' => now()
        ]);
    }
}
