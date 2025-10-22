<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<section style="padding-top: 120px; padding-bottom: 80px; background: var(--secondary);">
    <div class="container">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-7 mb-5 mb-lg-0" data-aos="fade-right">
                <div class="card card-modern">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="mb-4">Envíanos un Mensaje</h2>
                        
                        <?php if (session()->has('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <?= session('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->has('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <?= session('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->has('errors')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Por favor corrige los siguientes errores:</strong>
                                <ul class="mb-0 mt-2">
                                    <?php foreach (session('errors') as $error): ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('contacto/enviar') ?>" method="post" id="contactForm">
                            <?= csrf_field() ?>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nombre" class="form-label">Nombre Completo *</label>
                                    <input type="text" 
                                           class="form-control <?= session('errors.nombre') ? 'is-invalid' : '' ?>" 
                                           id="nombre" 
                                           name="nombre" 
                                           value="<?= old('nombre') ?>"
                                           required>
                                    <?php if (session('errors.nombre')): ?>
                                        <div class="invalid-feedback"><?= session('errors.nombre') ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" 
                                           class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" 
                                           id="email" 
                                           name="email" 
                                           value="<?= old('email') ?>"
                                           required>
                                    <?php if (session('errors.email')): ?>
                                        <div class="invalid-feedback"><?= session('errors.email') ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="tel" 
                                           class="form-control <?= session('errors.telefono') ? 'is-invalid' : '' ?>" 
                                           id="telefono" 
                                           name="telefono" 
                                           value="<?= old('telefono') ?>">
                                    <?php if (session('errors.telefono')): ?>
                                        <div class="invalid-feedback"><?= session('errors.telefono') ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="asunto" class="form-label">Asunto *</label>
                                    <select class="form-select <?= session('errors.asunto') ? 'is-invalid' : '' ?>" 
                                            id="asunto" 
                                            name="asunto" 
                                            required>
                                        <option value="">Selecciona un asunto</option>
                                        <option value="Información sobre cursos" <?= old('asunto') == 'Información sobre cursos' ? 'selected' : '' ?>>Información sobre cursos</option>
                                        <option value="Consulta sobre compras" <?= old('asunto') == 'Consulta sobre compras' ? 'selected' : '' ?>>Consulta sobre compras</option>
                                        <option value="Soporte técnico" <?= old('asunto') == 'Soporte técnico' ? 'selected' : '' ?>>Soporte técnico</option>
                                        <option value="Colaboraciones" <?= old('asunto') == 'Colaboraciones' ? 'selected' : '' ?>>Colaboraciones</option>
                                        <option value="Otro" <?= old('asunto') == 'Otro' ? 'selected' : '' ?>>Otro</option>
                                    </select>
                                    <?php if (session('errors.asunto')): ?>
                                        <div class="invalid-feedback"><?= session('errors.asunto') ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="mensaje" class="form-label">Mensaje *</label>
                                <textarea class="form-control <?= session('errors.mensaje') ? 'is-invalid' : '' ?>" 
                                          id="mensaje" 
                                          name="mensaje" 
                                          rows="6" 
                                          required><?= old('mensaje') ?></textarea>
                                <small class="text-muted">Mínimo 10 caracteres, máximo 1000</small>
                                <?php if (session('errors.mensaje')): ?>
                                    <div class="invalid-feedback"><?= session('errors.mensaje') ?></div>
                                <?php endif; ?>
                            </div>

                            <button type="submit" class="btn btn-primary-custom w-100" id="submitBtn">
                                <i class="bi bi-send-fill"></i> Enviar Mensaje
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-lg-5" data-aos="fade-left">
                <div class="card card-modern mb-4">
                    <div class="card-body p-4">
                        <h3 class="mb-4">Información de Contacto</h3>
                        
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <div class="icon-box bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px;">
                                    <i class="bi bi-envelope-fill"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5>Email</h5>
                                <p class="text-muted mb-0">info@witral.cl</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <div class="icon-box bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px;">
                                    <i class="bi bi-telephone-fill"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5>Teléfono</h5>
                                <p class="text-muted mb-0">+56 9 1234 5678</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <div class="icon-box bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px;">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5>Ubicación</h5>
                                <p class="text-muted mb-0">Cauquenes, Chile</p>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="icon-box bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px;">
                                    <i class="bi bi-clock-fill"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5>Horario de Atención</h5>
                                <p class="text-muted mb-0">Lunes a Viernes<br>9:00 AM - 6:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
// Form validation and loading state
document.getElementById('contactForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Enviando...';
});
</script>

<?= $this->endSection() ?>