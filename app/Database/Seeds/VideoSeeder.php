<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'titulo' => 'Fundamentos del Tejido',
                'descripcion' => 'Aprende las bases del tejido artesanal desde cero con técnicas tradicionales y materiales básicos.',
                'video_id' => 'dQw4w9WgXcQ',
                'duracion' => '45 min',
                'total_estudiantes' => 234,
                'destacado' => 1,
                'orden' => 1,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'titulo' => 'Técnicas Avanzadas',
                'descripcion' => 'Perfecciona tus habilidades con patrones complejos y técnicas profesionales de tejido.',
                'video_id' => 'jNQXAC9IVRw',
                'duracion' => '60 min',
                'total_estudiantes' => 156,
                'destacado' => 1,
                'orden' => 2,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'titulo' => 'Comercialización de Tejidos',
                'descripcion' => 'Aprende a convertir tu pasión en un negocio sustentable y rentable. Marketing y ventas.',
                'video_id' => 'ScMzIvxBSi4',
                'duracion' => '30 min',
                'total_estudiantes' => 89,
                'destacado' => 1,
                'orden' => 3,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('videos')->insertBatch($data);
    }
}