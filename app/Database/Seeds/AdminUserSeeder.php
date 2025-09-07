<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Insertar cursos de ejemplo
        $cursos = [
            [
                'titulo' => 'Introducción al Telar',
                'descripcion' => 'Aprende los fundamentos básicos del tejido en telar con nuestra línea Urdiembre.',
                'duracion' => 45,
                'nivel' => 'principiante',
                'total_estudiantes' => 234,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'titulo' => 'Técnicas de Crochet',
                'descripcion' => 'Domina las técnicas avanzadas de crochet para crear piezas únicas.',
                'duracion' => 60,
                'nivel' => 'intermedio',
                'total_estudiantes' => 189,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'titulo' => 'Patrones y Diseños',
                'descripcion' => 'Crea tus propios patrones y diseña piezas personalizadas.',
                'duracion' => 90,
                'nivel' => 'avanzado',
                'total_estudiantes' => 156,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'titulo' => 'Corte y Confección',
                'descripcion' => 'Aprende las técnicas básicas de corte y confección para tus proyectos.',
                'duracion' => 75,
                'nivel' => 'principiante',
                'total_estudiantes' => 198,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'titulo' => 'Combinación de Colores',
                'descripcion' => 'Domina el arte de combinar colores en tus proyectos de tejido.',
                'duracion' => 50,
                'nivel' => 'intermedio',
                'total_estudiantes' => 143,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'titulo' => 'Técnicas Especializadas',
                'descripcion' => 'Técnicas avanzadas para profesionales del tejido artesanal.',
                'duracion' => 120,
                'nivel' => 'avanzado',
                'total_estudiantes' => 89,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('cursos')->insertBatch($cursos);
    }
}
