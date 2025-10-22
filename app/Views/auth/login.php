<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Login - Witral' ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #3C372F;
            --accent-green: #3E7D54;
            --secondary: #F2EEE8;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--secondary) 0%, #E8E2D8 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            max-width: 450px;
            width: 100%;
            padding: 20px;
        }

        .login-card {
            background: white;
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(60, 55, 47, 0.15);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-text {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .logo-subtitle {
            color: var(--accent-green);
            font-size: 0.9rem;
            font-weight: 600;
        }

        .form-label {
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .form-control {
            border-radius: 12px;
            padding: 0.75rem 1rem;
            border: 2px solid #E2E8F0;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--accent-green);
            box-shadow: 0 0 0 0.25rem rgba(62, 125, 84, 0.15);
        }

        .btn-login {
            background: var(--accent-green);
            border: none;
            border-radius: 12px;
            padding: 0.75rem;
            font-weight: 700;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: #2F6041;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(62, 125, 84, 0.3);
        }

        .back-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .back-link a {
            color: var(--accent-green);
            text-decoration: none;
            font-weight: 600;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Logo -->
            <div class="logo-container">
                <div class="logo-text">Witral</div>
                <div class="logo-subtitle">Panel de Administración</div>
            </div>

            <!-- Mensajes -->
            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle"></i> <?= session('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->has('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle"></i> <?= session('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- Formulario -->
            <form action="<?= base_url('login') ?>" method="POST">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="email" class="form-label">
                        <i class="bi bi-envelope"></i> Correo Electrónico
                    </label>
                    <input type="email" 
                           class="form-control" 
                           id="email" 
                           name="email" 
                           placeholder="admin@witral.cl"
                           required
                           autofocus>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">
                        <i class="bi bi-lock"></i> Contraseña
                    </label>
                    <input type="password" 
                           class="form-control" 
                           id="password" 
                           name="password" 
                           placeholder="••••••••"
                           required>
                </div>

                <button type="submit" class="btn btn-login">
                    <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                </button>
            </form>

            <!-- Link para volver -->
            <div class="back-link">
                <a href="<?= base_url('/') ?>">
                    <i class="bi bi-arrow-left"></i> Volver al inicio
                </a>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- INSTRUCCIONES:
Guarda este archivo como: app/Views/auth/login.php
-->