<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section style="padding-top: 120px; padding-bottom: 80px; background: var(--secondary);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="section-title">Contáctanos</h1>
            <p class="section-subtitle">
                Estamos aquí para ayudarte. Escríbenos y te responderemos lo antes posible.
            </p>
        </div>
    </div>
</section>

<!-- Contact Form -->
<section class="section-py bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card card-modern">
                    <div class="card-body p-5">
                        <form data-aos="fade-up">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Nombre completo</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Asunto</label>
                                <select class="form-select">
                                    <option>Consulta general</option>
                                    <option>Soporte técnico</option>
                                    <option>Colaboración</option>
                                    <option>Otro</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Mensaje</label>
                                <textarea class="form-control" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary-custom w-100">
                                <i class="bi bi-send"></i> Enviar Mensaje
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Info -->
<section class="section-py" style="background: var(--secondary);">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card card-modern text-center h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-geo-alt-fill" style="font-size: 3rem; color: var(--primary);"></i>
                        </div>
                        <h5>Ubicación</h5>
                        <p class="text-muted">Santiago, Chile<br>Región Metropolitana</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card card-modern text-center h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-envelope-fill" style="font-size: 3rem; color: var(--accent);"></i>
                        </div>
                        <h5>Email</h5>
                        <p class="text-muted">info@witral.cl<br>cursos@witral.cl</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card card-modern text-center h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-share-fill" style="font-size: 3rem; color: var(--primary);"></i>
                        </div>
                        <h5>Redes Sociales</h5>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="text-primary fs-4"><i class="bi bi-youtube"></i></a>
                            <a href="#" class="text-primary fs-4"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="text-primary fs-4"><i class="bi bi-facebook"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>