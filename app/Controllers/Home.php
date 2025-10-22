<?php
// app/Controllers/Home.php

namespace App\Controllers;

use App\Models\VideoModel;

class Home extends BaseController
{
    public function index()
    {
        $videoModel = new VideoModel();
        
        $data = [
            'title' => 'Witral - Tejidos con Consciencia Social',
            'cursos_destacados' => $videoModel->getVideosDestacados(3),
            'total_cursos' => $videoModel->where('activo', 1)->countAllResults(),
            'total_estudiantes' => '1,019',
        ];
        
        return view('pages/home', $data);
    }

     public function cursos()
    {
        return view('pages/cursos');
    }

    public function nosotros()
    {
        return view('pages/nosotros');
    }

    public function contacto()
    {
        return view('pages/contacto');
    }
}