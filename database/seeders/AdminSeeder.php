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
            'nombres' => 'Pedro López',
            'apellidos' => 'Martínez',
            'email' => 'pe@gametex.com',
            'password' => bcrypt('123'),
            'telefono' => 986523258,
            'remember_token' => Str::random(10),
            'sueldo' => 1700,
            'profile_photo_path' => 'images/profile_pedro.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('admins')->insert([
            'nombres' => 'Mario',
            'apellidos' => 'González',
            'email' => 'mr@gametex.com',
            'password' => bcrypt('123'),
            'telefono' => 987654321,
            'remember_token' => Str::random(10),
            'sueldo' => 1700,
            'profile_photo_path' => 'images/profile_maria.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
