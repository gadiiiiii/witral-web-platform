<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNivelToVideos extends Migration
{
    public function up()
    {
        $this->forge->addColumn('videos', [
            'nivel' => [
                'type'       => 'ENUM',
                'constraint' => ['principiante', 'intermedio', 'avanzado'],
                'default'    => 'principiante',
                'after'      => 'descripcion'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('videos', 'nivel');
    }
}