<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="hero-section" id="inicio">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 hero-content" data-aos="fade-up">
                <h1 class="hero-title">
                    Tejidos con<br>
                    <span style="color: #10B981;">Consciencia Social</span>
                </h1>
                <p class="hero-subtitle">
                    Descubre el hermoso mundo del tejido y únete a nuestra comunidad de artesanas comprometidas con el comercio justo y la sustentabilidad.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?= base_url('cursos') ?>" class="btn btn-primary-custom">
                        <i class="bi bi-play-circle"></i> Ver Cursos
                    </a>
                    <a href="<?= base_url('nosotros') ?>" class="btn btn-outline-light">
                        <i class="bi bi-info-circle"></i> Conocer Más
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section-py bg-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card">
                    <span class="stat-number"><?= $total_cursos ?? '6' ?></span>
                    <span class="stat-label">Cursos Disponibles</span>
                </div>
            </div>
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card">
                    <span class="stat-number"><?= $total_estudiantes ?? '1,019' ?></span>
                    <span class="stat-label">Estudiantes</span>
                </div>
            </div>
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card">
                    <span class="stat-number">95%</span>
                    <span class="stat-label">Satisfacción</span>
                </div>
            </div>
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-card">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Acceso Ilimitado</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Courses -->
<section class="section-py" style="background: var(--secondary);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Cursos Destacados</h2>
            <p class="section-subtitle">
                Aprende las técnicas fundamentales del tejido con nuestros cursos especializados
            </p>
        </div>
        
        <div class="row">
            <?php if (isset($cursos_destacados) && !empty($cursos_destacados)): ?>
                <?php foreach ($cursos_destacados as $index => $curso): ?>
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="<?= ($index + 1) * 100 ?>">
                    <div class="card card-modern h-100">
                        <div class="card-img-gradient">
                            <i class="bi bi-play-circle"></i>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3"><?= esc($curso['titulo']) ?></h5>
                            <p class="card-text text-muted"><?= esc($curso['descripcion']) ?></p>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <small class="text-muted">
                                    <i class="bi bi-clock"></i> <?= $curso['duracion'] ?> min
                                </small>
                                <small class="text-muted">
                                    <i class="bi bi-people"></i> <?= $curso['total_estudiantes'] ?> estudiantes
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>No hay cursos disponibles por el momento.</p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="<?= base_url('cursos') ?>" class="btn btn-primary-custom">
                <i class="bi bi-collection-play"></i> Ver Todos los Cursos
            </a>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="section-py bg-white" id="mision">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <h2 class="section-title text-start">Nuestra Misión</h2>
                <div class="mb-4">
                    <h4 class="text-primary mb-3">
                        <i class="bi bi-heart"></i> Generar una Comunidad
                    </h4>
                    <p class="lead">El tejido afecta positivamente la vida de las personas. Buscamos promover su práctica y generar una comunidad en torno a esta hermosa actividad.</p>
                </div>
                <div class="mb-4">
                    <h4 class="text-primary mb-3">
                        <i class="bi bi-mortarboard"></i> Facilitar el Aprendizaje
                    </h4>
                    <p class="lead">Apoyamos el desarrollo de las habilidades y capacidades de las personas con las que trabajamos.</p>
                </div>
                <div class="mb-4">
                    <h4 class="text-primary mb-3">
                        <i class="bi bi-balance-scale"></i> Comercio Justo
                    </h4>
                    <p class="lead">Los precios se definen en conjunto con las artesanas, buscando siempre el diálogo y trabajo en equipo.</p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="position-relative">
                    <div style="background: linear-gradient(135deg, var(--primary), var(--accent)); height: 400px; border-radius: 20px; display: flex; align-items: center; justify-content: center; color: white; font-size: 4rem;">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>