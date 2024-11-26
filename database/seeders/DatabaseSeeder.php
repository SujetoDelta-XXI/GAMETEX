<?php

namespace Database\Seeders;

use App\Models\ModerModel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([ UserSeeder::class, ]);
        $this->call([ ModerSeeder::class, ]);
        $this->call([ AdminSeeder::class, ]);
        $this->call([ eventosSeeder::class, ]);
        $this->call([ eventosTipoSeeder::class, ]);
        $this->call([ RecompensasTipoSeeder::class, ]);
    }
}
