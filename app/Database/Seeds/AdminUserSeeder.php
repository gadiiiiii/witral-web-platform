<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nombre'     => 'Administrador',
            'email'      => 'admin@witral.cl',
            'password'   => password_hash('admin123', PASSWORD_DEFAULT),
            'rol'        => 'admin',
            'activo'     => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('users')->insert($data);
        
        echo "\n✅ Usuario admin creado exitosamente!\n";
        echo "📧 Email: admin@witral.cl\n";
        echo "🔑 Password: admin123\n\n";
    }
}

// INSTRUCCIONES:
// 1. Guarda como: app/Database/Seeds/AdminUserSeeder.php
// 2. Ejecuta: php spark db:seed AdminUserSeeder
// 
// CREDENCIALES DE ACCESO:
// Email: admin@witral.cl
// Password: admin123