<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $table            = 'videos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'titulo',
        'descripcion',
        'video_id',
        'duracion',
        'nivel',
        'total_estudiantes',
        'destacado',
        'orden',
        'activo'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'titulo'    => 'required|min_length[3]|max_length[255]',
        'video_id'  => 'required|min_length[11]|max_length[50]',
        'duracion'  => 'required',
    ];
    
    protected $validationMessages   = [
        'titulo' => [
            'required' => 'El título es obligatorio',
            'min_length' => 'El título debe tener al menos 3 caracteres',
        ],
        'video_id' => [
            'required' => 'El ID del video es obligatorio',
        ],
        'duracion' => [
            'required' => 'La duración es obligatoria',
        ],
    ];
    
    protected $skipValidation       = false;

    /**
     * Obtener videos destacados para el home
     */
    public function getVideosDestacados($limit = 3)
    {
        return $this->where('destacado', 1)
                    ->where('activo', 1)
                    ->orderBy('orden', 'ASC')
                    ->findAll($limit);
    }

    /**
     * Obtener todos los videos activos
     */
    public function getVideosActivos()
    {
        return $this->where('activo', 1)
                    ->orderBy('orden', 'ASC')
                    ->findAll();
    }

    public function getThumbnailUrl($videoId)
    {
        return "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg";
    }
}