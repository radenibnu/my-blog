<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin', // Nama admin
            'email' => 'admin@gmail.com', // Email admin
            'password' => Hash::make('bismillah'), // Password admin (pastikan pakai Hash::make)
            'is_admin' => true, // Set kolom is_admin ke true untuk menandakan ini admin
        ]);
    }
}
