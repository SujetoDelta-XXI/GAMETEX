<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('moders')->insert([
            'nombres' => 'Juan Pérez',
            'email' => 'jn@gametex.com',
            'password' => bcrypt('123'),
            'fecha_inicio' => now(),
            'fecha_fin' => now()->addYear(1),
            'sueldo' => 1500,
            'profile_photo_path' => 'images/profile_juan.jpg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('moders')->insert([
            'nombres' => 'Adrian Escobar',
            'email' => 'ad@gametex.com',
            'password' => bcrypt('123'),
            'fecha_inicio' => now(),
            'fecha_fin' => now()->addMonths(11),
            'sueldo' => 1500,
            'profile_photo_path' => 'images/profile_ana.jpg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
