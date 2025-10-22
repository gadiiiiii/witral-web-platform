<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    /**
     * Mostrar formulario de login
     */
    public function login()
    {
        // Si ya está logueado, redirigir al admin
        if (session()->has('user_id')) {
            return redirect()->to('/admin');
        }

        $data = [
            'title' => 'Iniciar Sesión - Witral'
        ];

        return view('auth/login', $data);
    }

    /**
     * Procesar login
     */
    public function attemptLogin()
    {
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Validar campos
        if (empty($email) || empty($password)) {
            return redirect()->back()->with('error', 'Por favor completa todos los campos');
        }

        // Verificar credenciales
        $user = $userModel->verificarCredenciales($email, $password);

        if ($user) {
            // Crear sesión
            session()->set([
                'user_id'   => $user['id'],
                'user_nombre' => $user['nombre'],
                'user_email'  => $user['email'],
                'user_rol'    => $user['rol'],
                'logged_in'   => true
            ]);

            return redirect()->to('/admin')->with('success', '¡Bienvenido ' . $user['nombre'] . '!');
        } else {
            return redirect()->back()->with('error', 'Credenciales incorrectas');
        }
    }

    /**
     * Cerrar sesión
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Sesión cerrada exitosamente');
    }
}

// INSTRUCCIONES:
// Guarda este archivo como: app/Controllers/Auth.php