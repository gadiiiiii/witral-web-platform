<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Contacto extends BaseController
{
    public function index()
    {
        return view('pages/contacto');
    }

    public function enviar()
    {
        // Reglas de validación
        $rules = [
            'nombre' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'El nombre es obligatorio',
                    'min_length' => 'El nombre debe tener al menos 3 caracteres',
                    'max_length' => 'El nombre no puede exceder 100 caracteres'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'El email es obligatorio',
                    'valid_email' => 'Debes ingresar un email válido'
                ]
            ],
            'telefono' => [
                'rules' => 'permit_empty|min_length[9]|max_length[15]',
                'errors' => [
                    'min_length' => 'El teléfono debe tener al menos 9 dígitos',
                    'max_length' => 'El teléfono no puede exceder 15 dígitos'
                ]
            ],
            'asunto' => [
                'rules' => 'required|min_length[5]|max_length[200]',
                'errors' => [
                    'required' => 'El asunto es obligatorio',
                    'min_length' => 'El asunto debe tener al menos 5 caracteres',
                    'max_length' => 'El asunto no puede exceder 200 caracteres'
                ]
            ],
            'mensaje' => [
                'rules' => 'required|min_length[10]|max_length[1000]',
                'errors' => [
                    'required' => 'El mensaje es obligatorio',
                    'min_length' => 'El mensaje debe tener al menos 10 caracteres',
                    'max_length' => 'El mensaje no puede exceder 1000 caracteres'
                ]
            ]
        ];

        // Validar datos
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Obtener datos del formulario
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'email' => $this->request->getPost('email'),
            'telefono' => $this->request->getPost('telefono'),
            'asunto' => $this->request->getPost('asunto'),
            'mensaje' => $this->request->getPost('mensaje')
        ];

        // Enviar email
        $emailService = \Config\Services::email();
        
        $emailService->setFrom($data['email'], $data['nombre']);
        $emailService->setTo('info@witral.cl'); // Cambia esto al email de Witral
        $emailService->setSubject('Contacto desde Witral.cl - ' . $data['asunto']);
        
        $mensaje = "
            <h2>Nuevo mensaje de contacto</h2>
            <p><strong>Nombre:</strong> {$data['nombre']}</p>
            <p><strong>Email:</strong> {$data['email']}</p>
            <p><strong>Teléfono:</strong> {$data['telefono']}</p>
            <p><strong>Asunto:</strong> {$data['asunto']}</p>
            <hr>
            <p><strong>Mensaje:</strong></p>
            <p>{$data['mensaje']}</p>
        ";
        
        $emailService->setMessage($mensaje);

        if ($emailService->send()) {
            return redirect()->back()->with('success', '¡Mensaje enviado exitosamente! Nos pondremos en contacto contigo pronto.');
        } else {
            // En caso de error, guardar en log y mostrar mensaje
            log_message('error', 'Error al enviar email: ' . $emailService->printDebugger(['headers']));
            return redirect()->back()->withInput()->with('error', 'Hubo un problema al enviar el mensaje. Por favor intenta nuevamente o contáctanos directamente.');
        }
    }
}