<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section style="padding-top: 120px; padding-bottom: 80px; background: linear-gradient(135deg, #2563EB, #10B981);">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                <h1 class="display-4 fw-bold mb-4">Conoce Nuestra Historia</h1>
                <p class="lead">
                    Somos una empresa comprometida con el tejido artesanal y el comercio justo, 
                    trabajando junto a talentosas artesanas para crear productos únicos.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Mission Values -->
<section class="section-py bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                <div class="text-center">
                    <div class="mb-4">
                        <i class="bi bi-heart-fill" style="font-size: 4rem; color: var(--primary);"></i>
                    </div>
                    <h4 class="mb-3">Generar Comunidad</h4>
                    <p class="text-muted">
                        El tejido afecta positivamente la vida de las personas. Buscamos promover 
                        su práctica y generar una comunidad en torno a esta hermosa actividad.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="text-center">
                    <div class="mb-4">
                        <i class="bi bi-mortarboard-fill" style="font-size: 4rem; color: var(--accent);"></i>
                    </div>
                    <h4 class="mb-3">Facilitar Aprendizaje</h4>
                    <p class="text-muted">
                        Apoyamos el desarrollo de las habilidades y capacidades de las personas 
                        con las que trabajamos, creando oportunidades de crecimiento.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="300">
                <div class="text-center">
                    <div class="mb-4">
                        <i class="bi bi-balance-scale-fill" style="font-size: 4rem; color: var(--primary);"></i>
                    </div>
                    <h4 class="mb-3">Comercio Justo</h4>
                    <p class="text-muted">
                        Los precios se definen en conjunto con las artesanas, buscando siempre 
                        las instancias de diálogo y trabajo en equipo.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="section-py" style="background: var(--secondary);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Nuestro Equipo</h2>
            <p class="section-subtitle">
                Conoce a las personas que hacen posible nuestra misión
            </p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card card-modern text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div style="width: 100px; height: 100px; background: var(--primary); border-radius: 50%; margin: 0 auto; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <h5>María González</h5>
                        <p class="text-primary">Fundadora y Directora</p>
                        <p class="text-muted">
                            Con más de 20 años de experiencia en tejido artesanal, 
                            María lidera nuestra visión de comercio justo.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card card-modern text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div style="width: 100px; height: 100px; background: var(--accent); border-radius: 50%; margin: 0 auto; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <h5>Ana Rodríguez</h5>
                        <p class="text-primary">Instructora Principal</p>
                        <p class="text-muted">
                            Especialista en técnicas tradicionales de tejido, 
                            Ana desarrolla nuestros contenidos educativos.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card card-modern text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div style="width: 100px; height: 100px; background: var(--light); border-radius: 50%; margin: 0 auto; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <h5>Carlos Muñoz</h5>
                        <p class="text-primary">Coordinador Técnico</p>
                        <p class="text-muted">
                            Carlos se encarga de la plataforma digital y 
                            la experiencia de usuario en nuestros cursos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Certifications -->
<section class="section-py bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Certificaciones y Reconocimientos</h2>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card card-modern text-center h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-award-fill" style="font-size: 3rem; color: var(--primary);"></i>
                        </div>
                        <h6>Comercio Justo</h6>
                        <p class="text-muted small">Certificación en prácticas de comercio justo</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card card-modern text-center h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-leaf-fill" style="font-size: 3rem; color: var(--accent);"></i>
                        </div>
                        <h6>Sustentabilidad</h6>
                        <p class="text-muted small">Compromiso con prácticas sustentables</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card card-modern text-center h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-people-fill" style="font-size: 3rem; color: var(--primary);"></i>
                        </div>
                        <h6>Responsabilidad Social</h6>
                        <p class="text-muted small">Reconocimiento por impacto social positivo</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="card card-modern text-center h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-star-fill" style="font-size: 3rem; color: var(--accent);"></i>
                        </div>
                        <h6>Calidad Educativa</h6>
                        <p class="text-muted small">Estándares de calidad en educación</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>