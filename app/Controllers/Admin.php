<?php

namespace App\Controllers;

use App\Models\VideoModel;

class Admin extends BaseController
{
    protected $videoModel;

    public function __construct()
    {
        $this->videoModel = new VideoModel();
    }

    /**
     * Dashboard principal del admin
     */
    public function index()
    {
        $data = [
            'title' => 'Panel de Administración - Witral',
            'videos' => $this->videoModel->orderBy('orden', 'ASC')->findAll(),
            'total_videos' => $this->videoModel->countAll(),
            'videos_activos' => $this->videoModel->where('activo', 1)->countAllResults(),
            'videos_destacados' => $this->videoModel->where('destacado', 1)->countAllResults(),
        ];

        return view('admin/dashboard', $data);
    }

    /**
     * Formulario para crear nuevo video
     */
    public function crear()
    {
        $data = [
            'title' => 'Agregar Nuevo Video - Witral',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/video_form', $data);
    }

    /**
     * Guardar nuevo video
     */
    public function guardar()
    {
        // Validación
        $rules = [
            'titulo' => 'required|min_length[3]|max_length[255]',
            'descripcion' => 'required|min_length[10]',
            'video_id' => 'required|min_length[11]|max_length[50]',
            'duracion' => 'required',
            'total_estudiantes' => 'permit_empty|integer',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Preparar datos
        $data = [
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'video_id' => $this->request->getPost('video_id'),
            'duracion' => $this->request->getPost('duracion'),
            'total_estudiantes' => $this->request->getPost('total_estudiantes') ?? 0,
            'destacado' => $this->request->getPost('destacado') ? 1 : 0,
            'orden' => $this->request->getPost('orden') ?? 0,
            'activo' => $this->request->getPost('activo') ? 1 : 0,
        ];

        // Guardar
        if ($this->videoModel->insert($data)) {
            return redirect()->to('/admin')->with('success', 'Video agregado exitosamente');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error al agregar el video');
        }
    }

    /**
     * Formulario para editar video
     */
    public function editar($id)
    {
        $video = $this->videoModel->find($id);

        if (!$video) {
            return redirect()->to('/admin')->with('error', 'Video no encontrado');
        }

        $data = [
            'title' => 'Editar Video - Witral',
            'video' => $video,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/video_form', $data);
    }

    /**
     * Actualizar video
     */
    public function actualizar($id)
    {
        // Validación
        $rules = [
            'titulo' => 'required|min_length[3]|max_length[255]',
            'descripcion' => 'required|min_length[10]',
            'video_id' => 'required|min_length[11]|max_length[50]',
            'duracion' => 'required',
            'total_estudiantes' => 'permit_empty|integer',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Preparar datos
        $data = [
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'video_id' => $this->request->getPost('video_id'),
            'duracion' => $this->request->getPost('duracion'),
            'total_estudiantes' => $this->request->getPost('total_estudiantes') ?? 0,
            'destacado' => $this->request->getPost('destacado') ? 1 : 0,
            'orden' => $this->request->getPost('orden') ?? 0,
            'activo' => $this->request->getPost('activo') ? 1 : 0,
        ];

        // Actualizar
        if ($this->videoModel->update($id, $data)) {
            return redirect()->to('/admin')->with('success', 'Video actualizado exitosamente');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error al actualizar el video');
        }
    }

    /**
     * Eliminar video
     */
    public function eliminar($id)
    {
        if ($this->videoModel->delete($id)) {
            return redirect()->to('/admin')->with('success', 'Video eliminado exitosamente');
        } else {
            return redirect()->to('/admin')->with('error', 'Error al eliminar el video');
        }
    }

    /**
     * Cambiar estado activo/inactivo
     */
    public function toggleActivo($id)
    {
        $video = $this->videoModel->find($id);
        
        if (!$video) {
            return redirect()->to('/admin')->with('error', 'Video no encontrado');
        }

        $this->videoModel->update($id, ['activo' => $video['activo'] ? 0 : 1]);
        
        return redirect()->to('/admin')->with('success', 'Estado actualizado');
    }

    /**
     * Cambiar estado destacado
     */
    public function toggleDestacado($id)
    {
        $video = $this->videoModel->find($id);
        
        if (!$video) {
            return redirect()->to('/admin')->with('error', 'Video no encontrado');
        }

        $this->videoModel->update($id, ['destacado' => $video['destacado'] ? 0 : 1]);
        
        return redirect()->to('/admin')->with('success', 'Estado actualizado');
    }
}

// INSTRUCCIONES:
// Guarda este archivo como: app/Controllers/Admin.php