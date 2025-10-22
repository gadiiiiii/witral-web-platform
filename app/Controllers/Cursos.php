<?php

namespace App\Controllers;

use App\Models\VideoModel;

class Cursos extends BaseController
{
    public function index()
    {
        $videoModel = new VideoModel();
        
        // Obtener el término de búsqueda si existe
        $busqueda = $this->request->getGet('buscar');
        
        // Construir la consulta
        $query = $videoModel->where('activo', 1);
        
        // Si hay búsqueda, filtrar por título o descripción
        if ($busqueda) {
            $query->groupStart()
                  ->like('titulo', $busqueda)
                  ->orLike('descripcion', $busqueda)
                  ->groupEnd();
        }
        
        // Obtener los cursos
        $cursos = $query->orderBy('orden', 'ASC')->findAll();
        
        // Pasar los cursos y el término de búsqueda a la vista
        $data = [
            'cursos' => $cursos,
            'busqueda' => $busqueda
        ];
        
        return view('pages/cursos', $data);
    }

    public function ver($id)
    {
        $videoModel = new VideoModel();
        
        // Obtener el curso específico
        $curso = $videoModel->find($id);
        
        // Si no existe el curso, mostrar error 404
        if (!$curso) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        // Obtener cursos relacionados (del mismo nivel)
        $cursosRelacionados = $videoModel->where('activo', 1)
                                        ->where('nivel', $curso['nivel'])
                                        ->where('id !=', $id)
                                        ->orderBy('orden', 'ASC')
                                        ->limit(3)
                                        ->findAll();
        
        $data = [
            'curso' => $curso,
            'cursosRelacionados' => $cursosRelacionados
        ];
        
        return view('pages/curso_detalle', $data);
    }
}