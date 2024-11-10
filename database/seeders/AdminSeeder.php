<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    // Crear el numero de users administrados para el sistema
    public function run(): void
    {
        // Model Admin con el metodo factory la cantidad de users admin creados para el sistema
        Admin::factory(1)->create();
    }
}
