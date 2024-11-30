<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'Brandon Arias',
            'email' => 'bn@gametex.com',
            'password' => bcrypt('123'),
            'telefono' => 986523258,
            'remember_token' => Str::random(10),
            'sueldo' => 1700,
            'profile_photo_path' => 'images/profile_pedro.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('admins')->insert([
            'name' => 'Axcel Loayza',
            'email' => 'ax@gametex.com',
            'password' => bcrypt('123'),
            'telefono' => 253685177,
            'remember_token' => Str::random(10),
            'sueldo' => 1700,
            'profile_photo_path' => 'images/profile_maria.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('admins')->insert([
            'name' => 'Carlos Asparrin',
            'email' => 'ca@gametex.com',
            'password' => bcrypt('123'),
            'telefono' => 426525588,
            'remember_token' => Str::random(10),
            'sueldo' => 1700,
            'profile_photo_path' => 'images/profile_maria.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
