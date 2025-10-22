<?php
namespace App\Controllers;

class Nosotros extends BaseController
{
    public function index()
    {
        return view('layout/main', [
            'content' => view('pages/nosotros')
        ]);
    }
}