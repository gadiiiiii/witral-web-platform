<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Witral' ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            /* Colores principales del diseño Figma */
            --primary: #3C372F;          /* 3C372F */
            --primary-dark: #2B2B27;     /* 2B2B27 */
            --secondary: #F2EEE8;        /* F2EEE8 */
            --accent-green: #3E7D54;     /* 3E7D54 */
            --accent-brown: #7A5A3C;     /* 7A5A3C */
            
            /* Colores base */
            --dark: #2B2B27;             /* 2B2B27 */
            --light-gray: #8A8578;       /* 8A8578 */
            --background: #FFFFFF;       /* FFFFFF */
            --card-border: #EDE6DC;      /* EDE6DC */
            --text-muted: #8A8578;       /* 8A8578 */
            
            /* Colores adicionales */
            --light-cream: #F6F3EE;      /* F6F3EE */
            --success: #3E7D54;          /* Verde para elementos de éxito */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
            color: var(--dark);
            background: var(--background);
            font-weight: 400;
        }

        html {
            scroll-behavior: smooth;
        }

        /* Logo estilos*/
        .navbar-brand-logo {
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .navbar-brand-logo:hover {
            transform: scale(1.05);
        }

        .logo-img {
            height: 60px;
            width: auto;
            max-width: 200px;
            transition: all 0.3s ease;
        }

        /* Ajustes responsivos para el logo */
        @media (max-width: 768px) {
            .logo-img {
                height: 50px;
                max-width: 160px;
            }
        }

        @media (max-width: 480px) {
            .logo-img {
                height: 40px;
                max-width: 130px;
            }
        }

        /* Header/Navbar */
        .navbar-modern {
            background: var(--background);
            padding: 0.5rem 0;
            min-height: auto;
            border-bottom: 1px solid var(--card-border);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar-modern.scrolled {
            box-shadow: 0 2px 10px rgba(60, 55, 47, 0.08);
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            padding: 0.3rem 0;
        }

        .navbar-modern.scrolled .logo-img {
            height: 50px;
        }

        @media (max-width: 768px) {
            .navbar-modern.scrolled .logo-img {
                height: 40px;
            }
        }

        .navbar-brand-modern {
            font-weight: 800;
            font-size: 1.8rem;
            color: var(--primary) !important;
            letter-spacing: -0.02em;
            text-decoration: none;
        }

        .nav-link-modern {
            font-weight: 500;
            color: var(--dark) !important;
            margin: 0 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.95rem;
            position: relative;
        }

        .nav-link-modern::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background: var(--accent-green);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link-modern:hover::after,
        .nav-link-modern.active::after {
            width: 80%;
        }

        .nav-link-modern:hover {
            color: var(--accent-green) !important;
        }

        .btn-primary-modern {
            background: var(--accent-green);
            border: none;
            border-radius: 8px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            font-size: 0.9rem;
            color: white;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary-modern:hover {
            background: #2F6041;
            transform: translateY(-1px);
            color: white;
        }

        /* Hero Section */
        .hero-modern {
            padding: 140px 0 80px;
            background: var(--background);
        }

        .hero-badge {
            background: rgba(62, 125, 84, 0.1);
            color: var(--accent-green);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 2rem;
            border: 1px solid rgba(62, 125, 84, 0.2);
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            color: var(--dark);
            margin-bottom: 1.5rem;
            letter-spacing: -0.03em;
        }

        .hero-description {
            font-size: 1.2rem;
            color: var(--text-muted);
            margin-bottom: 2.5rem;
            line-height: 1.6;
            max-width: 600px;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-bottom: 4rem;
        }

        .btn-primary-hero {
            background: var(--accent-green);
            border: none;
            border-radius: 10px;
            padding: 1rem 2rem;
            font-weight: 600;
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary-hero:hover {
            background: #2F6041;
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 10px 30px rgba(62, 125, 84, 0.3);
        }

        .btn-secondary-hero {
            background: transparent;
            border: 2px solid var(--card-border);
            border-radius: 10px;
            padding: 1rem 2rem;
            font-weight: 600;
            color: var(--dark);
            font-size: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-secondary-hero:hover {
            border-color: var(--accent-green);
            color: var(--accent-green);
            background: rgba(62, 125, 84, 0.05);
        }

        /* Feature Cards */
        .features-section {
            padding: 80px 0;
            background: var(--secondary);
        }

        .feature-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid var(--card-border);
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(60, 55, 47, 0.1);
            border-color: rgba(62, 125, 84, 0.2);
        }

        .feature-icon {
            width: 64px;
            height: 64px;
            background: rgba(62, 125, 84, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--accent-green);
            font-size: 1.5rem;
        }

        .feature-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: var(--dark);
        }

        .feature-description {
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* Statistics Section */
        .stats-section {
            padding: 80px 0;
            background: white;
        }

        .stat-item {
            text-align: center;
            padding: 1rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: var(--accent-green);
            display: block;
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* CTA Section */
        .cta-section {
            padding: 100px 0;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            text-align: center;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            letter-spacing: -0.02em;
        }

        .cta-description {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 2.5rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-cta {
            background: white;
            color: var(--primary);
            border: none;
            border-radius: 10px;
            padding: 1rem 2.5rem;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            color: var(--primary);
        }

        /* Modern Cards for Courses */
        .card-modern {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s ease;
            background: white;
            box-shadow: 0 4px 20px rgba(60, 55, 47, 0.08);
            height: 100%;
        }

        .card-modern:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(60, 55, 47, 0.15);
        }

        .card-img-gradient {
            background: linear-gradient(135deg, var(--primary), var(--accent-brown));
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }

        .section-py {
            padding: 80px 0;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 1rem;
            color: var(--dark);
            letter-spacing: -0.02em;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.1rem;
            color: var(--text-muted);
            margin-bottom: 4rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Admin Panel */
        .admin-panel {
            background: linear-gradient(135deg, var(--light-cream), var(--secondary));
            border-radius: 16px;
            border: 1px solid rgba(62, 125, 84, 0.1);
            margin: 2rem 0;
            padding: 2rem;
            border-left: 4px solid var(--accent-green);
        }

        .admin-controls {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .admin-btn {
            background: white;
            border: 2px solid var(--accent-green);
            color: var(--accent-green);
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .admin-btn:hover {
            background: var(--accent-green);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(62, 125, 84, 0.3);
        }

        /* Footer */
        .footer-modern {
            background: var(--dark);
            color: white;
            padding: 60px 0 30px;
        }

        .footer-brand {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--accent-green);
            margin-bottom: 1rem;
        }

        .footer-description {
            color: #94A3B8;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: #94A3B8;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .footer-links a:hover {
            color: white;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--accent-green);
            color: white;
            transform: translateY(-2px);
        }

        .footer-bottom {
            border-top: 1px solid #334155;
            margin-top: 3rem;
            padding-top: 2rem;
            text-align: center;
            color: #94A3B8;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-description {
                font-size: 1.1rem;
            }
            
            .hero-buttons {
                flex-direction: column;
            }
            
            .btn-primary-hero,
            .btn-secondary-hero {
                text-align: center;
                justify-content: center;
            }
            
            .nav-link-modern {
                margin: 0.5rem 0;
            }
            
            .cta-title {
                font-size: 2rem;
            }
            
            .stat-number {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar-modern" id="mainNavbar">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center w-100">
                <a href="<?= base_url() ?>" class="navbar-brand-logo d-flex align-items-center">
                    <img src="<?= base_url('assets/img/logo_witral.png') ?>" alt="Witral - Wool for the world" class="logo-img">
                </a>
                
                <!-- Desktop Menu -->
                <div class="d-none d-lg-flex align-items-center">
                    <a href="<?= base_url() ?>" class="nav-link-modern">Inicio</a>
                    <a href="<?= base_url('nosotros') ?>" class="nav-link-modern">Nosotros</a>
                    <a href="<?= base_url('cursos') ?>" class="nav-link-modern">Cursos</a>
                    <a href="<?= base_url('contacto') ?>" class="nav-link-modern">Contacto</a>
                    <button class="btn-primary-modern ms-3" onclick="toggleAdmin()">
                        <i class="bi bi-person-gear"></i> Admin
                    </button>
                </div>
                
                <!-- Mobile Menu Toggle -->
                <button class="btn d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu">
                    <i class="bi bi-list" style="font-size: 1.5rem;"></i>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div class="collapse d-lg-none mt-3" id="mobileMenu">
                <div class="d-flex flex-column">
                    <a href="<?= base_url() ?>" class="nav-link-modern">Inicio</a>
                    <a href="<?= base_url('nosotros') ?>" class="nav-link-modern">Nosotros</a>
                    <a href="<?= base_url('cursos') ?>" class="nav-link-modern">Cursos</a>
                    <a href="<?= base_url('contacto') ?>" class="nav-link-modern">Contacto</a>
                    <button class="btn-primary-modern mt-2 text-center" onclick="toggleAdmin()">
                        <i class="bi bi-person-gear"></i> Admin
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Admin Panel (Hidden by default) -->
    <div class="admin-panel d-none" id="adminPanel" style="margin-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-4">
                        <i class="bi bi-speedometer2"></i> Panel de Administración
                    </h3>
                    
                    <div class="row mb-4">
                        <div class="col-md-3 mb-3">
                            <div class="stat-item">
                                <span class="stat-number"><?= $total_cursos ?? '6' ?></span>
                                <span class="stat-label">Cursos</span>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stat-item">
                                <span class="stat-number">89</span>
                                <span class="stat-label">Videos</span>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stat-item">
                                <span class="stat-number"><?= $total_estudiantes ?? '1,019' ?></span>
                                <span class="stat-label">Estudiantes</span>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stat-item">
                                <span class="stat-number">6</span>
                                <span class="stat-label">Activos</span>
                            </div>
                        </div>
                    </div>

                    <div class="admin-controls">
                        <a href="#" class="admin-btn" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                            <i class="bi bi-plus-circle"></i> Agregar Curso
                        </a>
                        <a href="#" class="admin-btn" data-bs-toggle="modal" data-bs-target="#uploadVideoModal">
                            <i class="bi bi-camera-video"></i> Subir Video
                        </a>
                        <a href="#" class="admin-btn">
                            <i class="bi bi-pencil-square"></i> Editar Info
                        </a>
                        <a href="#" class="admin-btn">
                            <i class="bi bi-bar-chart"></i> Estadísticas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="footer-modern">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-brand d-flex align-items-center">
                        <img src="<?= base_url('assets/img/logo_witral.png') ?>" alt="Witral" style="height: 40px; filter: brightness(0) invert(1);">
                    </div>
                    <p class="footer-description">
                        Promoviendo el arte del tejido con consciencia social y comercio justo desde Chile para el mundo.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link">
                            <i class="bi bi-youtube"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="bi bi-facebook"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 style="color: white; margin-bottom: 1.5rem; font-weight: 600;">Navegación</h5>
                    <ul class="footer-links">
                        <li><a href="<?= base_url() ?>">Inicio</a></li>
                        <li><a href="<?= base_url('nosotros') ?>">Nosotros</a></li>
                        <li><a href="<?= base_url('cursos') ?>">Cursos</a></li>
                        <li><a href="<?= base_url('contacto') ?>">Contacto</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 style="color: white; margin-bottom: 1.5rem; font-weight: 600;">Cursos</h5>
                    <ul class="footer-links">
                        <li><a href="#">Tejido Básico</a></li>
                        <li><a href="#">Técnicas Avanzadas</a></li>
                        <li><a href="#">Diseño de Patrones</a></li>
                        <li><a href="#">Comercialización</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 style="color: white; margin-bottom: 1.5rem; font-weight: 600;">Contacto</h5>
                    <ul class="footer-links">
                        <li><a href="#">info@witral.cl</a></li>
                        <li><a href="#">+56 9 1234 5678</a></li>
                        <li><a href="#">Santiago, Chile</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 Witral. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true
        });

        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        function toggleAdmin() {
            const adminPanel = document.getElementById('adminPanel');
            adminPanel.classList.toggle('d-none');
            
            if (!adminPanel.classList.contains('d-none')) {
                adminPanel.scrollIntoView({ behavior: 'smooth' });
            }
        }

        const currentLocation = location.pathname;
        const navLinks = document.querySelectorAll('.nav-link-modern');
        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentLocation) {
                link.classList.add('active');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>