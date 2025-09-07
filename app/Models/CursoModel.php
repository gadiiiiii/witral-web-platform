<?php

namespace App\Models;

use CodeIgniter\Model;

class CursoModel extends Model
{
    protected $table = 'cursos';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'titulo', 'descripcion', 'duracion', 'nivel', 'imagen', 
        'estado', 'total_estudiantes', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getTotalEstudiantes()
    {
        return $this->selectSum('total_estudiantes')->first()['total_estudiantes'] ?? 0;
    }

    public function getCategorias()
    {
        return $this->distinct()->select('nivel')->findAll();
    }
}