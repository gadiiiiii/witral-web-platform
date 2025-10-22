<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Hero Nosotros -->
<section class="hero-modern" style="padding: 160px 0 100px; background: linear-gradient(135deg, var(--secondary), white);">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-6" data-aos="fade-up">
                <span class="hero-badge">
                    <i class="bi bi-heart-fill me-1"></i>
                    Nuestra Historia
                </span>
                
                <h1 class="hero-title" style="margin-bottom: 2rem;">
                    Amistad hecha<br>
                    <span style="color: var(--accent-green);">a mano</span>
                </h1>
                
                <p style="font-size: 1.2rem; color: var(--text-muted); line-height: 1.8; margin-bottom: 2rem;">
                    Desde el año 2013, en Witral trabajamos de manera diferente, desafiando un mundo cada vez más industrializado y automatizado.
                </p>
                
                <div class="d-flex gap-4 mb-4">
                    <div>
                        <h3 style="color: var(--accent-green); font-weight: 800; font-size: 2.5rem; margin-bottom: 0.5rem;">12+</h3>
                        <p style="color: var(--text-muted); font-weight: 500;">Años de experiencia</p>
                    </div>
                    <div>
                        <h3 style="color: var(--accent-green); font-weight: 800; font-size: 2.5rem; margin-bottom: 0.5rem;">100+</h3>
                        <p style="color: var(--text-muted); font-weight: 500;">Artesanas colaboradoras</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="hero-image">
                    <img src="<?= base_url('assets/img/tejido-prueba.jpg') ?>" 
                         alt="Witral - Tejidos con consciencia" 
                         class="hero-img"
                         style="border-radius: 24px; box-shadow: 0 20px 60px rgba(60, 55, 47, 0.2);">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quiénes Somos -->
<section class="section-py" style="background: white;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">¿Quiénes Somos?</h2>
                </div>
                
                <div class="card border-0 rounded-4 shadow-sm" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-body p-5">
                        <p style="font-size: 1.15rem; line-height: 1.9; color: var(--text-muted); text-align: justify;">
                            En nuestra empresa, valoramos el sentido individual y lo que realmente importa a cada persona. 
                            Nos dedicamos a crear <strong style="color: var(--accent-green);">amistad hecha a mano</strong> a través de productos que cuentan una historia: 
                            la historia de la rica tradición textil y el comercio justo. Cada prenda que producimos lleva consigo 
                            el legado de las artesanas, promoviendo la sostenibilidad y la justicia en cada etapa de nuestro proceso.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Misión y Visión -->
<section class="section-py" style="background: var(--secondary);">
    <div class="container">
        <div class="row g-4">
            <!-- Misión -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="card border-0 rounded-4 shadow-sm h-100" style="background: white;">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 60px; height: 60px; background: rgba(62, 125, 84, 0.1);">
                                <i class="bi bi-compass fs-2" style="color: var(--accent-green);"></i>
                            </div>
                            <h3 style="color: var(--dark); font-weight: 800; margin: 0;">Misión</h3>
                        </div>
                        <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-muted); text-align: justify;">
                            Entregar a las personas la posibilidad de conectarse con prácticas tradicionales de nuestra zona, 
                            ofreciendo productos artesanales y naturales elaborados por diferentes grupos de artesanas locales, 
                            mediante un trabajo colaborativo que logra rescatar nuestra identidad cultural y apoyar el desarrollo 
                            sustentable de las localidades.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Visión -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="card border-0 rounded-4 shadow-sm h-100" style="background: white;">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 60px; height: 60px; background: rgba(62, 125, 84, 0.1);">
                                <i class="bi bi-eye fs-2" style="color: var(--accent-green);"></i>
                            </div>
                            <h3 style="color: var(--dark); font-weight: 800; margin: 0;">Visión</h3>
                        </div>
                        <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-muted); text-align: justify; margin-bottom: 1rem;">
                            Posicionar el consumo artesanal y natural por sobre el consumo industrial, en nuestro país y en todo el mundo, 
                            mediante el mejoramiento de las técnicas utilizadas y el desarrollo de productos integrados en funcionalidad, 
                            tendencia y diseño.
                        </p>
                        <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-muted); text-align: justify;">
                            Valorizando el oficio artesanal y manteniendo en constante actividad a las artesanas de nuestra zona, 
                            siendo una red de apoyo y fuente de ingresos permanente en el tiempo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Nuestros Valores -->
<section class="section-py" style="background: white;">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Nuestros Valores</h2>
            <p class="section-subtitle">
                Los pilares fundamentales que guían nuestro trabajo
            </p>
        </div>
        
        <div class="row g-4">
            <!-- Fair Trade -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 rounded-4 shadow-sm h-100 text-center" 
                     style="transition: all 0.3s ease; cursor: pointer;"
                     onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 40px rgba(60, 55, 47, 0.15)'"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(60, 55, 47, 0.08)'">
                    <div class="card-body p-5">
                        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4" 
                             style="width: 100px; height: 100px; background: rgba(62, 125, 84, 0.1);">
                            <i class="bi bi-balance-scale fs-1" style="color: var(--accent-green);"></i>
                        </div>
                        <h4 style="color: var(--dark); font-weight: 700; margin-bottom: 1.5rem;">Fair Trade</h4>
                        <p style="font-size: 1.05rem; line-height: 1.7; color: var(--text-muted);">
                            Creemos que la persona debe ir al centro de la sociedad, por lo que nuestro modelo se enfoca en 
                            crear valor para los artesanos locales mediante el desarrollo de sus actividades y el reconocimiento 
                            de su trabajo.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Consumo Responsable -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 rounded-4 shadow-sm h-100 text-center" 
                     style="transition: all 0.3s ease; cursor: pointer;"
                     onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 40px rgba(60, 55, 47, 0.15)'"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(60, 55, 47, 0.08)'">
                    <div class="card-body p-5">
                        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4" 
                             style="width: 100px; height: 100px; background: rgba(62, 125, 84, 0.1);">
                            <i class="bi bi-recycle fs-1" style="color: var(--accent-green);"></i>
                        </div>
                        <h4 style="color: var(--dark); font-weight: 700; margin-bottom: 1.5rem;">Consumo Responsable</h4>
                        <p style="font-size: 1.05rem; line-height: 1.7; color: var(--text-muted);">
                            Promovemos nuestra identidad local como motor de consumo consciente basado en productos artesanales 
                            y de origen natural, con impacto social, medioambiental y económico.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Amistad Hecha a Mano -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 rounded-4 shadow-sm h-100 text-center" 
                     style="transition: all 0.3s ease; cursor: pointer;"
                     onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 40px rgba(60, 55, 47, 0.15)'"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(60, 55, 47, 0.08)'">
                    <div class="card-body p-5">
                        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4" 
                             style="width: 100px; height: 100px; background: rgba(62, 125, 84, 0.1);">
                            <i class="bi bi-heart-fill fs-1" style="color: var(--accent-green);"></i>
                        </div>
                        <h4 style="color: var(--dark); font-weight: 700; margin-bottom: 1.5rem;">Amistad Hecha a Mano</h4>
                        <p style="font-size: 1.05rem; line-height: 1.7; color: var(--text-muted);">
                            Creamos una relación de confianza e interacción permanente con todas las personas, colaboradores y clientes, 
                            a través de productos que representan una historia de tradiciones locales, desde la obtención de la materia 
                            hasta el uso final del producto.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Final -->
<section class="cta-section">
    <div class="container" data-aos="fade-up">
        <h2 class="cta-title">Únete a nuestra comunidad</h2>
        <p class="cta-description">
            Sé parte del cambio y aprende el arte tradicional del tejido con consciencia social
        </p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="<?= base_url('cursos') ?>" class="btn-cta">
                <i class="bi bi-collection-play"></i>
                Ver Cursos
            </a>
            <a href="<?= base_url('contacto') ?>" class="btn-cta" style="background: transparent; border: 2px solid white; color: white;">
                <i class="bi bi-envelope"></i>
                Contáctanos
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>