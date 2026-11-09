<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear usuarios de prueba si todavía no existen.
        $ana = User::firstOrCreate(
            ['email' => 'ana@example.com'],
            [
                'name' => 'Ana García',
                'password' => 'password',
            ]
        );

        $carlos = User::firstOrCreate(
            ['email' => 'carlos@example.com'],
            [
                'name' => 'Carlos López',
                'password' => 'password',
            ]
        );

        $maria = User::firstOrCreate(
            ['email' => 'maria@example.com'],
            [
                'name' => 'María Sánchez',
                'password' => 'password',
            ]
        );

        // Crear proyectos de prueba.
        $project1 = $ana->projects()->firstOrCreate(
            ['title' => 'Desarrollo de una página web'],
            [
                'description' => 'Proyecto para desarrollar una página web colaborativa.',
                'due_date' => '2027-12-31',
                'status' => 'en progreso',
            ]
        );

        $project2 = $carlos->projects()->firstOrCreate(
            ['title' => 'Aplicación de gestión de tareas'],
            [
                'description' => 'Aplicación para organizar tareas y proyectos.',
                'due_date' => '2027-11-30',
                'status' => 'pendiente',
            ]
        );

        // Añadir participantes a los proyectos.
        $project1->participants()->syncWithoutDetaching([
            $carlos->id => [
                'role' => 'Desarrollador',
                'contribution_hours' => 10,
            ],
            $maria->id => [
                'role' => 'Diseñadora',
                'contribution_hours' => 5,
            ],
        ]);

        $project2->participants()->syncWithoutDetaching([
            $ana->id => [
                'role' => 'Colaboradora',
                'contribution_hours' => 8,
            ],
        ]);
    }
}
