<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $cursoModel;
    protected $videoModel;

    public function __construct()
    {
        $this->cursoModel = new \App\Models\CursoModel();
        $this->videoModel = new \App\Models\VideoModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Witral - Tejidos con Consciencia Social',
            'cursos_destacados' => $this->cursoModel->limit(3)->find(),
            'total_estudiantes' => $this->cursoModel->getTotalEstudiantes(),
            'total_cursos' => $this->cursoModel->countAll()
        ];

        return view('pages/home', $data);
    }

    public function cursos()
    {
        $data = [
            'title' => 'Cursos - Witral',
            'cursos' => $this->cursoModel->findAll(),
            'categorias' => $this->cursoModel->getCategorias()
        ];

        return view('pages/cursos', $data);
    }

    public function nosotros()
    {
        $data = [
            'title' => 'Nosotros - Witral'
        ];

        return view('pages/nosotros', $data);
    }

    public function contacto()
    {
        $data = [
            'title' => 'Contacto - Witral'
        ];

        return view('pages/contacto', $data);
    }
}