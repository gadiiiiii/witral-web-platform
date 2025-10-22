<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyVideosTable extends Migration
{
    public function up()
    {
        // Eliminar foreign key si existe
        if ($this->db->DBDriver === 'MySQLi') {
            $this->forge->dropForeignKey('videos', 'videos_curso_id_foreign');
        }

        // Modificar columnas existentes
        $fields = [
            'curso_id' => [
                'name' => 'video_id',
                'type' => 'VARCHAR',
                'constraint' => 50,
                'comment' => 'ID del video de YouTube',
            ],
            'archivo' => [
                'name' => 'destacado',
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
                'comment' => 'Si aparece en home',
            ],
            'duracion' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'comment' => 'Duración formato texto (ej: 45 min)',
            ],
            'estado' => [
                'name' => 'activo',
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1,
            ],
        ];

        $this->forge->modifyColumn('videos', $fields);

        // Agregar nueva columna
        $this->forge->addColumn('videos', [
            'total_estudiantes' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
                'after' => 'duracion',
            ],
        ]);
    }

    public function down()
    {
        // Revertir cambios
        $fields = [
            'video_id' => [
                'name' => 'curso_id',
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'destacado' => [
                'name' => 'archivo',
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'duracion' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'activo' => [
                'name' => 'estado',
                'type' => 'ENUM',
                'constraint' => ['activo', 'inactivo'],
                'default' => 'activo',
            ],
        ];

        $this->forge->modifyColumn('videos', $fields);
        $this->forge->dropColumn('videos', 'total_estudiantes');
    }
}

// INSTRUCCIONES:
// 1. Guarda como: app/Database/Migrations/2025-01-10-000001_ModifyVideosTable.php
// 2. Ejecuta: php spark migrate