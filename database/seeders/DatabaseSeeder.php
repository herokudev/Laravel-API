<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Asistencia;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AlumnoSeeder::class);
        $this->call(AsistenciaSeeder::class);
        $this->call(CursoSeeder::class);
        $this->call(AlumnosCursoSeeder::class);
        $this->call(MaestroSeeder::class);
        $this->call(MaestrosCursoSeeder::class);
        $this->call(UserSeeder::class);
    }
}
