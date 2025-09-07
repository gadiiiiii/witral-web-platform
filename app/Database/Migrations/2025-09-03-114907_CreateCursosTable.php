<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCursosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'titulo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'descripcion' => [
                'type' => 'TEXT',
            ],
            'duracion' => [
                'type' => 'INT',
                'constraint' => 11,
                'comment' => 'Duración en minutos',
            ],
            'nivel' => [
                'type' => 'ENUM',
                'constraint' => ['principiante', 'intermedio', 'avanzado'],
                'default' => 'principiante',
            ],
            'imagen' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'total_estudiantes' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'estado' => [
                'type' => 'ENUM',
                'constraint' => ['activo', 'inactivo'],
                'default' => 'activo',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('cursos');
    }

    public function down()
    {
        $this->forge->dropTable('cursos');
    }
}
