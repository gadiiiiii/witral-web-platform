<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="hero-modern">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-6" data-aos="fade-up">
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
            
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="hero-image">
                    <img src="<?= base_url('assets/img/img-prueba.jpg') ?>" alt="Artesana tejiendo" class="hero-img">
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

<!-- Featured Courses - DESDE BASE DE DATOS -->
<section class="section-py" style="background: white;">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Cursos Destacados</h2>
            <p class="section-subtitle">
                Pasa el mouse sobre los videos para ver un preview
            </p>
        </div>
        
        <div class="row g-4">
            <?php if (!empty($cursos_destacados)): ?>
                <?php foreach ($cursos_destacados as $index => $curso): ?>
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="<?= ($index + 1) * 100 ?>">
                    <div class="card card-modern video-card" data-video-id="<?= esc($curso['video_id']) ?>">
                        <div class="video-container">
                            <!-- Thumbnail de YouTube -->
                            <img src="https://img.youtube.com/vi/<?= esc($curso['video_id']) ?>/maxresdefault.jpg" 
                                 alt="<?= esc($curso['titulo']) ?>" 
                                 class="video-thumbnail">
                            
                            <!-- Overlay con botón play -->
                            <div class="video-overlay">
                                <div class="play-button">
                                    <i class="bi bi-play-fill"></i>
                                </div>
                                <div class="video-duration"><?= esc($curso['duracion']) ?></div>
                            </div>
                            
                            <!-- Preview iframe (oculto inicialmente) -->
                            <iframe class="video-preview" 
                                    src="" 
                                    frameborder="0" 
                                    allow="autoplay; encrypted-media" 
                                    allowfullscreen>
                            </iframe>
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
                                    <i class="bi bi-clock"></i> <?= esc($curso['duracion']) ?>
                                </small>
                                <small style="color: var(--text-muted); font-weight: 500;">
                                    <i class="bi bi-people"></i> <?= esc($curso['total_estudiantes']) ?> estudiantes
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Mensaje si no hay cursos -->
                <div class="col-12 text-center py-5">
                    <i class="bi bi-camera-video" style="font-size: 4rem; color: var(--text-muted);"></i>
                    <h4 class="mt-3" style="color: var(--text-muted);">No hay cursos disponibles</h4>
                    <p style="color: var(--text-muted);">Agrega cursos desde el panel de administración</p>
                </div>
            <?php endif; ?>
        </div>
        
        <?php if (!empty($cursos_destacados)): ?>
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="<?= base_url('cursos') ?>" class="btn-primary-hero">
                <i class="bi bi-collection-play"></i> Ver Todos los Cursos
            </a>
        </div>
        <?php endif; ?>
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
                    <img src="<?= base_url('assets/img/artesanas_witral.webp') ?>" 
                         alt="Misión Witral - Artesanas" 
                         style="width: 100%; height: 400px; object-fit: cover; border-radius: 20px; box-shadow: 0 20px 40px rgba(60, 55, 47, 0.2);">
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

<style>
/* Video Cards Styles */
.video-card {
    cursor: pointer;
    transition: all 0.3s ease;
}

.video-container {
    position: relative;
    height: 220px;
    overflow: hidden;
    border-radius: 24px 24px 0 0;
    background: #000;
}

.video-thumbnail {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.3s ease;
}

.video-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
}

.video-card:hover .video-overlay {
    opacity: 1;
}

.video-card:hover .video-thumbnail {
    transform: scale(1.05);
}

.play-button {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-green);
    font-size: 2rem;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.play-button:hover {
    background: white;
    transform: scale(1.1);
}

.video-duration {
    position: absolute;
    bottom: 15px;
    right: 15px;
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 0.8rem;
    font-weight: 600;
}

.video-preview {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: none;
    border-radius: 24px 24px 0 0;
}

.video-preview.active {
    display: block;
}

@media (max-width: 768px) {
    .video-container {
        height: 200px;
    }
    
    .play-button {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
}
</style>

<script>
// Funcionalidad de preview de video
document.addEventListener('DOMContentLoaded', function() {
    const videoCards = document.querySelectorAll('.video-card');
    
    videoCards.forEach(card => {
        const videoId = card.dataset.videoId;
        const thumbnail = card.querySelector('.video-thumbnail');
        const overlay = card.querySelector('.video-overlay');
        const preview = card.querySelector('.video-preview');
        
        let isHovering = false;
        let hoverTimer = null;
        
        // Mouse enter - iniciar timer para preview
        card.addEventListener('mouseenter', function() {
            isHovering = true;
            
            // Esperar 1 segundo antes de mostrar preview
            hoverTimer = setTimeout(() => {
                if (isHovering) {
                    showVideoPreview(videoId, thumbnail, overlay, preview);
                }
            }, 1000);
        });
        
        // Mouse leave - ocultar preview
        card.addEventListener('mouseleave', function() {
            isHovering = false;
            clearTimeout(hoverTimer);
            hideVideoPreview(thumbnail, overlay, preview);
        });
        
        // Click para ir al video completo
        card.addEventListener('click', function() {
            window.open(`https://www.youtube.com/watch?v=${videoId}`, '_blank');
        });
    });
});

function showVideoPreview(videoId, thumbnail, overlay, preview) {
    // Configurar iframe con autoplay pero sin sonido
    preview.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&mute=1&controls=0&showinfo=0&rel=0&modestbranding=1`;
    
    // Ocultar thumbnail y overlay
    thumbnail.style.opacity = '0';
    overlay.style.opacity = '0';
    
    // Mostrar preview
    setTimeout(() => {
        preview.classList.add('active');
    }, 300);
}

function hideVideoPreview(thumbnail, overlay, preview) {
    // Ocultar preview
    preview.classList.remove('active');
    preview.src = '';
    
    // Mostrar thumbnail
    thumbnail.style.opacity = '1';
    overlay.style.opacity = '0';
}
</script>

<?= $this->endSection() ?>