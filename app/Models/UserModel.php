<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nombre',
        'email',
        'password',
        'rol',
        'activo'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'nombre'   => 'required|min_length[3]|max_length[100]',
        'email'    => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]',
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Este email ya está registrado.',
        ],
    ];

    protected $skipValidation = false;

    /**
     * Verificar credenciales de login
     */
    public function verificarCredenciales($email, $password)
    {
        $user = $this->where('email', $email)
                     ->where('activo', 1)
                     ->first();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    /**
     * Verificar si es admin
     */
    public function esAdmin($userId)
    {
        $user = $this->find($userId);
        return $user && $user['rol'] === 'admin';
    }
}

// INSTRUCCIONES:
// Guarda este archivo como: app/Models/UserModel.php