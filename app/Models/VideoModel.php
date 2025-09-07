<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $table = 'videos';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'curso_id', 'titulo', 'descripcion', 'archivo', 'duracion', 
        'orden', 'estado', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getVideosByCurso($cursoId)
    {
        return $this->where('curso_id', $cursoId)
                   ->where('estado', 'activo')
                   ->orderBy('orden', 'ASC')
                   ->findAll();
    }
}