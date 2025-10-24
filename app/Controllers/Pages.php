<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends BaseController
{
    // Página Nosotros (ya existe)
    public function nosotros()
    {
        $data = [
            'title' => 'Nosotros - Witral'
        ];
        
        return view('pages/nosotros', $data);
    }

    // Página Contacto
    public function contacto()
    {
        $data = [
            'title' => 'Contacto - Witral'
        ];
        
        return view('pages/contacto', $data);
    }

    // Procesar formulario de contacto
    public function enviarContacto()
    {
        // Validación
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

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Obtener datos del formulario
        $nombre = $this->request->getPost('nombre');
        $email = $this->request->getPost('email');
        $telefono = $this->request->getPost('telefono');
        $asunto = $this->request->getPost('asunto');
        $mensaje = $this->request->getPost('mensaje');

        // Guardar en base de datos (opcional - implementaremos después)
        $this->guardarMensajeContacto($nombre, $email, $telefono, $asunto, $mensaje);

        // Enviar email (implementaremos después con PHPMailer)
        $emailEnviado = $this->enviarEmail($nombre, $email, $telefono, $asunto, $mensaje);

        if ($emailEnviado) {
            return redirect()->back()->with('success', '¡Mensaje enviado exitosamente! Te contactaremos pronto.');
        } else {
            return redirect()->back()->withInput()->with('warning', 'Tu mensaje fue recibido pero hubo un problema al enviar el email. Te contactaremos pronto.');
        }
    }

    // Guardar mensaje en base de datos
    private function guardarMensajeContacto($nombre, $email, $telefono, $asunto, $mensaje)
    {
        // Por ahora solo registramos en log
        log_message('info', "Nuevo mensaje de contacto de: {$nombre} ({$email})");
        
        // TODO: Guardar en tabla `contactos` cuando la crees
        /*
        $db = \Config\Database::connect();
        $db->table('contactos')->insert([
            'nombre' => $nombre,
            'email' => $email,
            'telefono' => $telefono,
            'asunto' => $asunto,
            'mensaje' => $mensaje,
            'leido' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        */
    }
private function enviarEmail($nombre, $email, $telefono, $asunto, $mensaje)
{
    $emailService = \Config\Services::email();
    
    try {
        // Configurar remitente
        $emailService->setFrom('noreply@witral.cl', 'Witral Plataforma');
        
        // Destinatario (cambia por tu email real para ver los emails)
        $emailService->setTo('gadielv1998@gmail.com'); // ← TU EMAIL AQUÍ
        
        // Reply-To para que puedas responder directamente
        $emailService->setReplyTo($email, $nombre);
        
        // Asunto
        $emailService->setSubject('📧 Nuevo mensaje de contacto: ' . $asunto);
        
        // Cuerpo del email en HTML
        $body = "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <style>
                body { 
                    font-family: Arial, sans-serif; 
                    line-height: 1.6; 
                    color: #333; 
                    background: #f5f5f5;
                    margin: 0;
                    padding: 0;
                }
                .container { 
                    max-width: 600px; 
                    margin: 20px auto; 
                    background: white;
                    border-radius: 10px;
                    overflow: hidden;
                    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                }
                .header { 
                    background: linear-gradient(135deg, #589169, #467355);
                    color: white; 
                    padding: 30px 20px; 
                    text-align: center; 
                }
                .header h2 {
                    margin: 0;
                    font-size: 24px;
                }
                .content { 
                    padding: 30px; 
                }
                .info-row { 
                    margin-bottom: 20px; 
                    padding: 15px; 
                    background: #f8f9fa; 
                    border-left: 4px solid #589169;
                    border-radius: 5px; 
                }
                .label { 
                    font-weight: bold; 
                    color: #589169; 
                    display: block;
                    margin-bottom: 5px;
                }
                .value {
                    color: #333;
                    word-wrap: break-word;
                }
                .alert-box {
                    margin-top: 20px; 
                    padding: 15px; 
                    background: #fff3cd; 
                    border-left: 4px solid #ffc107; 
                    border-radius: 5px;
                }
                .footer { 
                    text-align: center; 
                    padding: 20px; 
                    background: #f8f9fa;
                    font-size: 12px; 
                    color: #666; 
                }
                .footer strong {
                    color: #589169;
                }
                a {
                    color: #589169;
                    text-decoration: none;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>📧 Nuevo Mensaje de Contacto</h2>
                    <p style='margin: 5px 0 0 0; opacity: 0.9;'>Formulario de Contacto - Witral</p>
                </div>
                <div class='content'>
                    <div class='info-row'>
                        <span class='label'>👤 Nombre Completo:</span>
                        <span class='value'>{$nombre}</span>
                    </div>
                    <div class='info-row'>
                        <span class='label'>📧 Correo Electrónico:</span>
                        <span class='value'><a href='mailto:{$email}'>{$email}</a></span>
                    </div>
                    <div class='info-row'>
                        <span class='label'>📱 Teléfono:</span>
                        <span class='value'>" . ($telefono ?: 'No proporcionado') . "</span>
                    </div>
                    <div class='info-row'>
                        <span class='label'>🏷️ Asunto:</span>
                        <span class='value'>{$asunto}</span>
                    </div>
                    <div class='info-row'>
                        <span class='label'>💬 Mensaje:</span>
                        <div class='value' style='margin-top: 10px; white-space: pre-wrap;'>" . nl2br(htmlspecialchars($mensaje)) . "</div>
                    </div>
                    <div class='alert-box'>
                        <strong>⚠️ Importante:</strong> Responde directamente a este email haciendo click en 'Responder' para contactar al remitente ({$email}).
                    </div>
                </div>
                <div class='footer'>
                    <p>Este mensaje fue enviado desde el <strong>Formulario de Contacto de Witral</strong></p>
                    <p>📅 Fecha: " . date('d/m/Y H:i:s') . "</p>
                    <p style='margin-top: 15px;'>
                        <a href='http://localhost:8080'>Visitar Witral</a>
                    </p>
                </div>
            </div>
        </body>
        </html>
        ";
        
        $emailService->setMessage($body);
        
        // Intentar enviar
        if ($emailService->send()) {
            log_message('info', "✅ Email enviado exitosamente de {$nombre} ({$email})");
            return true;
        } else {
            // Log del error
            $error = $emailService->printDebugger(['headers']);
            log_message('error', "❌ Error al enviar email: {$error}");
            return false;
        }
        
    } catch (\Exception $e) {
        log_message('error', "❌ Excepción al enviar email: " . $e->getMessage());
        return false;
    }
}
}