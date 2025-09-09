<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="hero-modern">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7" data-aos="fade-up">
                <span class="hero-badge">
                    <i class="bi bi-star-fill me-1"></i>
                    Plataforma Educativa
                </span>
                
                <h1 class="hero-title">
                    Tejidos con<br>
                    <span style="color: var(--accent-green);">Consciencia Social</span>
                </h1>
                
                <p class="hero-description">
                    Descubre el hermoso mundo del tejido y únete a nuestra comunidad de artesanas comprometidas con el comercio justo y la sustentabilidad.
                </p>
                
                <div class="hero-buttons">
                    <a href="<?= base_url('cursos') ?>" class="btn-primary-hero">
                        <i class="bi bi-play-circle"></i>
                        Ver Cursos
                    </a>
                    <a href="<?= base_url('nosotros') ?>" class="btn-secondary-hero">
                        <i class="bi bi-info-circle"></i>
                        Conocer Más
                    </a>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200">
                <div class="hero-image">
                    <img src="<?= base_url('assets/img/tejido-prueba.jpg') ?>" alt="Artesana tejiendo" class="hero-img">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="stats-section">
    <div class="container">
        <div class="row" data-aos="fade-up">
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-number"><?= $total_cursos ?? '6' ?></span>
                    <div class="stat-label">Cursos Disponibles</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-number"><?= $total_estudiantes ?? '1,019' ?></span>
                    <div class="stat-label">Estudiantes</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-number">95%</span>
                    <div class="stat-label">Satisfacción</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <div class="stat-label">Acceso Ilimitado</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">¿Por qué elegir Witral?</h2>
            <p class="section-subtitle">
                Ofrecemos una experiencia de aprendizaje única que combina tradición artesanal con tecnología moderna
            </p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h3 class="feature-title">Comunidad Activa</h3>
                    <p class="feature-description">
                        Únete a una comunidad vibrante de artesanas y aprende de sus experiencias compartidas.
                    </p>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-mortarboard"></i>
                    </div>
                    <h3 class="feature-title">Cursos Especializados</h3>
                    <p class="feature-description">
                        Aprende técnicas tradicionales y modernas de tejido con instructores expertos y certificados.
                    </p>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-heart"></i>
                    </div>
                    <h3 class="feature-title">Comercio Justo</h3>
                    <p class="feature-description">
                        Comprometidos con prácticas éticas y el desarrollo sostenible de nuestras artesanas.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Courses -->
<section class="section-py" style="background: white;">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Cursos Destacados</h2>
            <p class="section-subtitle">
                Aprende las técnicas fundamentales del tejido con nuestros cursos especializados
            </p>
        </div>
        
        <div class="row g-4">
            <?php if (isset($cursos_destacados) && !empty($cursos_destacados)): ?>
                <?php foreach ($cursos_destacados as $index => $curso): ?>
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="<?= ($index + 1) * 100 ?>">
                    <div class="card card-modern">
                        <div class="card-img-gradient">
                            <i class="bi bi-play-circle"></i>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3" style="font-weight: 700; color: var(--dark);">
                                <?= esc($curso['titulo']) ?>
                            </h5>
                            <p class="card-text" style="color: var(--text-muted); line-height: 1.6;">
                                <?= esc($curso['descripcion']) ?>
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <small style="color: var(--text-muted); font-weight: 500;">
                                    <i class="bi bi-clock"></i> <?= $curso['duracion'] ?> min
                                </small>
                                <small style="color: var(--text-muted); font-weight: 500;">
                                    <i class="bi bi-people"></i> <?= $curso['total_estudiantes'] ?> estudiantes
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Cursos de ejemplo si no hay datos -->
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card card-modern">
                        <div class="card-img-gradient">
                            <i class="bi bi-play-circle"></i>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3" style="font-weight: 700; color: var(--dark);">
                                Fundamentos del Tejido
                            </h5>
                            <p class="card-text" style="color: var(--text-muted); line-height: 1.6;">
                                Aprende las bases del tejido artesanal desde cero con técnicas tradicionales.
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <small style="color: var(--text-muted); font-weight: 500;">
                                    <i class="bi bi-clock"></i> 45 min
                                </small>
                                <small style="color: var(--text-muted); font-weight: 500;">
                                    <i class="bi bi-people"></i> 234 estudiantes
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card card-modern">
                        <div class="card-img-gradient">
                            <i class="bi bi-play-circle"></i>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3" style="font-weight: 700; color: var(--dark);">
                                Técnicas Avanzadas
                            </h5>
                            <p class="card-text" style="color: var(--text-muted); line-height: 1.6;">
                                Perfecciona tus habilidades con patrones complejos y técnicas profesionales.
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <small style="color: var(--text-muted); font-weight: 500;">
                                    <i class="bi bi-clock"></i> 60 min
                                </small>
                                <small style="color: var(--text-muted); font-weight: 500;">
                                    <i class="bi bi-people"></i> 156 estudiantes
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card card-modern">
                        <div class="card-img-gradient">
                            <i class="bi bi-play-circle"></i>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3" style="font-weight: 700; color: var(--dark);">
                                Comercialización
                            </h5>
                            <p class="card-text" style="color: var(--text-muted); line-height: 1.6;">
                                Aprende a convertir tu pasión en un negocio sustentable y rentable.
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <small style="color: var(--text-muted); font-weight: 500;">
                                    <i class="bi bi-clock"></i> 30 min
                                </small>
                                <small style="color: var(--text-muted); font-weight: 500;">
                                    <i class="bi bi-people"></i> 89 estudiantes
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="<?= base_url('cursos') ?>" class="btn-primary-hero">
                <i class="bi bi-collection-play"></i> Ver Todos los Cursos
            </a>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="section-py" style="background: var(--secondary);" id="mision">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <h2 class="section-title text-start">Nuestra Misión</h2>
                <div class="mb-4">
                    <h4 style="color: var(--accent-green); margin-bottom: 1rem; font-weight: 700;">
                        <i class="bi bi-heart"></i> Generar una Comunidad
                    </h4>
                    <p style="font-size: 1.1rem; line-height: 1.7; color: var(--text-muted);">
                        El tejido afecta positivamente la vida de las personas. Buscamos promover su práctica y generar una comunidad en torno a esta hermosa actividad.
                    </p>
                </div>
                <div class="mb-4">
                    <h4 style="color: var(--accent-green); margin-bottom: 1rem; font-weight: 700;">
                        <i class="bi bi-mortarboard"></i> Facilitar el Aprendizaje
                    </h4>
                    <p style="font-size: 1.1rem; line-height: 1.7; color: var(--text-muted);">
                        Apoyamos el desarrollo de las habilidades y capacidades de las personas con las que trabajamos.
                    </p>
                </div>
                <div class="mb-4">
                    <h4 style="color: var(--accent-green); margin-bottom: 1rem; font-weight: 700;">
                        <i class="bi bi-balance-scale"></i> Comercio Justo
                    </h4>
                    <p style="font-size: 1.1rem; line-height: 1.7; color: var(--text-muted);">
                        Los precios se definen en conjunto con las artesanas, buscando siempre el diálogo y trabajo en equipo.
                    </p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="position-relative">
                    <div style="background: linear-gradient(135deg, var(--primary), var(--accent-brown)); height: 400px; border-radius: 20px; display: flex; align-items: center; justify-content: center; color: white; font-size: 4rem; box-shadow: 0 20px 40px rgba(60, 55, 47, 0.2);">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container" data-aos="fade-up">
        <h2 class="cta-title">Comienza tu viaje en el tejido</h2>
        <p class="cta-description">
            Descubre el arte ancestral del tejido y forma parte de nuestra comunidad comprometida con la sustentabilidad
        </p>
        <a href="<?= base_url('cursos') ?>" class="btn-cta">
            <i class="bi bi-arrow-right"></i>
            Explorar Cursos
        </a>
    </div>
</section>

<?= $this->endSection() ?>