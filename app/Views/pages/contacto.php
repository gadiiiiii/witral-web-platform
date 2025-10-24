<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Hero Contacto -->
<section class="hero-modern" style="padding: 160px 0 80px; background: linear-gradient(135deg, var(--secondary), white);">
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <span class="hero-badge">
                <i class="bi bi-envelope-fill me-1"></i>
                Contáctanos
            </span>

            <h1 class="hero-title" style="margin-bottom: 1.5rem;">
                ¿Tienes alguna<br>
                <span style="color: var(--accent-green);">pregunta?</span>
            </h1>

            <p style="font-size: 1.2rem; color: var(--text-muted); max-width: 600px; margin: 0 auto;">
                Estamos aquí para ayudarte. Envíanos un mensaje y te responderemos lo antes posible.
            </p>
        </div>
    </div>
</section>

<!-- Formulario y Información -->
<section class="section-py" style="background: white;">
    <div class="container">
        <div class="row g-5">
            <!-- Columna Formulario -->
            <div class="col-lg-7" data-aos="fade-right">
                <div class="card border-0 rounded-4 shadow-sm">
                    <div class="card-body p-5">
                        <h3 style="color: var(--dark); font-weight: 800; margin-bottom: 1.5rem;">
                            <i class="bi bi-chat-dots"></i> Envíanos un mensaje
                        </h3>

                        <!-- Mensajes de éxito/error -->
                        <?php if (session()->has('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle"></i> <?= session('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->has('warning')): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle"></i> <?= session('warning') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->has('errors')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><i class="bi bi-exclamation-triangle"></i> Errores de validación:</strong>
                                <ul class="mb-0 mt-2">
                                    <?php foreach (session('errors') as $error): ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <!-- Formulario -->
                        <form action="<?= base_url('contacto/enviar') ?>" method="POST" id="contactForm">
                            <?= csrf_field() ?>

                            <div class="row g-3">
                                <!-- Nombre -->
                                <div class="col-md-6">
                                    <label for="nombre" class="form-label fw-bold">
                                        <i class="bi bi-person"></i> Nombre completo
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-lg"
                                        id="nombre"
                                        name="nombre"
                                        value="<?= old('nombre') ?>"
                                        placeholder="Ej: María González"
                                        required>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-bold">
                                        <i class="bi bi-envelope"></i> Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email"
                                        class="form-control form-control-lg"
                                        id="email"
                                        name="email"
                                        value="<?= old('email') ?>"
                                        placeholder="tu@email.com"
                                        required>
                                </div>

                                <!-- Teléfono -->
                                <div class="col-md-6">
                                    <label for="telefono" class="form-label fw-bold">
                                        <i class="bi bi-phone"></i> Teléfono
                                        <small class="text-muted">(opcional)</small>
                                    </label>
                                    <input type="tel"
                                        class="form-control form-control-lg"
                                        id="telefono"
                                        name="telefono"
                                        value="<?= old('telefono') ?>"
                                        placeholder="+56 9 1234 5678">
                                </div>

                                <!-- Asunto -->
                                <div class="col-12">
                                    <label for="asunto" class="form-label fw-bold">
                                        <i class="bi bi-tag"></i> Asunto
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select form-select-lg" id="asuntoSelect" onchange="toggleOtroAsunto()" required>
                                        <option value="">Selecciona un asunto</option>
                                        <option value="Consulta sobre cursos" <?= old('asunto') == 'Consulta sobre cursos' ? 'selected' : '' ?>>Consulta sobre cursos</option>
                                        <option value="Información de precios" <?= old('asunto') == 'Información de precios' ? 'selected' : '' ?>>Información de precios</option>
                                        <option value="Soporte técnico" <?= old('asunto') == 'Soporte técnico' ? 'selected' : '' ?>>Soporte técnico</option>
                                        <option value="Colaboración artesanal" <?= old('asunto') == 'Colaboración artesanal' ? 'selected' : '' ?>>Colaboración artesanal</option>
                                        <option value="Sugerencias" <?= old('asunto') == 'Sugerencias' ? 'selected' : '' ?>>Sugerencias</option>
                                        <option value="otro">Otro (especificar)</option>
                                    </select>

                                    <!-- Campo de texto "Otro" (oculto inicialmente) -->
                                    <div id="otroAsuntoDiv" style="display: none; margin-top: 1rem;">
                                        <input type="text"
                                            class="form-control form-control-lg"
                                            id="otroAsuntoInput"
                                            name="asunto"
                                            placeholder="Especifica tu asunto aquí..."
                                            value="<?= old('asunto') ?>">
                                    </div>

                                    <!-- Hidden input para cuando NO es "Otro" -->
                                    <input type="hidden" id="asuntoHidden" name="asunto" value="<?= old('asunto') ?>">
                                </div>


                                <!-- Mensaje -->
                                <div class="col-12">
                                    <label for="mensaje" class="form-label fw-bold">
                                        <i class="bi bi-chat-text"></i> Mensaje
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control"
                                        id="mensaje"
                                        name="mensaje"
                                        rows="6"
                                        placeholder="Escribe tu mensaje aquí... (mínimo 10 caracteres)"
                                        required><?= old('mensaje') ?></textarea>
                                    <small class="text-muted" id="charCount">0 / 1000 caracteres</small>
                                </div>

                                <!-- Botón Submit -->
                                <div class="col-12">
                                    <button type="submit" class="btn-primary-hero w-100" id="submitBtn">
                                        <i class="bi bi-send"></i>
                                        <span id="btnText">Enviar Mensaje</span>
                                        <span id="btnLoading" style="display: none;">
                                            <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                            Enviando...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Columna Información de Contacto -->
            <div class="col-lg-5" data-aos="fade-left">
                <!-- Información -->
                <div class="card border-0 rounded-4 shadow-sm mb-4" style="background: var(--secondary);">
                    <div class="card-body p-4">
                        <h4 style="color: var(--dark); font-weight: 700; margin-bottom: 1.5rem;">
                            <i class="bi bi-info-circle"></i> Información de contacto
                        </h4>

                        <!-- Email -->
                        <div class="contact-info-item mb-4">
                            <div class="d-flex align-items-start">
                                <div class="contact-icon">
                                    <i class="bi bi-envelope-fill"></i>
                                </div>
                                <div>
                                    <h6 style="font-weight: 700; color: var(--dark); margin-bottom: 0.5rem;">Email</h6>
                                    <p style="color: var(--text-muted); margin: 0;">
                                        <a href="gadielv1998@gmail.com" style="color: var(--accent-green); text-decoration: none;">
                                            gadielv1998@gmail.com
                                        </a>
                                    </p>
                                    <small class="text-muted">Respuesta en 24-48 horas</small>
                                </div>
                            </div>
                        </div>

                        <!-- Teléfono -->
                        <div class="contact-info-item mb-4">
                            <div class="d-flex align-items-start">
                                <div class="contact-icon">
                                    <i class="bi bi-phone-fill"></i>
                                </div>
                                <div>
                                    <h6 style="font-weight: 700; color: var(--dark); margin-bottom: 0.5rem;">Teléfono</h6>
                                    <p style="color: var(--text-muted); margin: 0;">
                                        <a href="tel:+56912345678" style="color: var(--accent-green); text-decoration: none;">
                                            +56 9 1234 5678
                                        </a>
                                    </p>
                                    <small class="text-muted">Lun - Vie: 9:00 - 18:00</small>
                                </div>
                            </div>
                        </div>

                        <!-- Ubicación -->
                        <div class="contact-info-item">
                            <div class="d-flex align-items-start">
                                <div class="contact-icon">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </div>
                                <div>
                                    <h6 style="font-weight: 700; color: var(--dark); margin-bottom: 0.5rem;">Ubicación</h6>
                                    <p style="color: var(--text-muted); margin: 0;">
                                        Santiago, Chile
                                    </p>
                                    <small class="text-muted">Región Metropolitana</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Redes Sociales -->
                <div class="card border-0 rounded-4 shadow-sm" style="background: linear-gradient(135deg, var(--accent-green), #467355);">
                    <div class="card-body p-4 text-white text-center">
                        <h5 style="font-weight: 700; margin-bottom: 1rem;">
                            <i class="bi bi-share"></i> Síguenos en redes sociales
                        </h5>
                        <p style="opacity: 0.9; margin-bottom: 1.5rem;">
                            Mantente al día con nuestras novedades y talleres
                        </p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="https://facebook.com/witral" target="_blank" class="social-icon-btn">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://instagram.com/witral" target="_blank" class="social-icon-btn">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="https://youtube.com/witral" target="_blank" class="social-icon-btn">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Horario de atención -->
                <div class="alert alert-info mt-4" role="alert">
                    <i class="bi bi-clock"></i> <strong>Horario de atención:</strong><br>
                    Lunes a Viernes: 9:00 - 18:00<br>
                    Sábados: 10:00 - 14:00
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Rápido -->
<section class="section-py" style="background: var(--secondary);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Preguntas Frecuentes</h2>
            <p class="section-subtitle">
                Quizás encuentres tu respuesta aquí
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <!-- Pregunta 1 -->
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                ¿Cómo puedo inscribirme a un curso?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Actualmente nuestros cursos son de acceso libre. Simplemente ve a la sección de Cursos, elige el que te interese y comienza a aprender. En el futuro implementaremos un sistema de inscripción formal con certificados.
                            </div>
                        </div>
                    </div>

                    <!-- Pregunta 2 -->
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                ¿Los cursos tienen costo?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Actualmente todos nuestros cursos básicos son gratuitos como parte de nuestra misión de preservar y difundir las técnicas tradicionales de tejido. Contáctanos si estás interesado en talleres personalizados o cursos avanzados.
                            </div>
                        </div>
                    </div>

                    <!-- Pregunta 3 -->
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                ¿Puedo ser instructora en Witral?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                ¡Sí! Estamos siempre buscando artesanas talentosas que quieran compartir su conocimiento. Envíanos un mensaje a través de este formulario con el asunto "Colaboración artesanal" y cuéntanos sobre tu experiencia.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Contact Info Icons */
    .contact-icon {
        width: 50px;
        height: 50px;
        background: rgba(88, 145, 105, 0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--accent-green);
        font-size: 1.5rem;
        margin-right: 1rem;
        flex-shrink: 0;
    }

    /* Social Icon Buttons */
    .social-icon-btn {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .social-icon-btn:hover {
        background: white;
        color: var(--accent-green);
        transform: translateY(-5px);
    }

    /* Form Styles */
    .form-control:focus,
    .form-select:focus {
        border-color: var(--accent-green);
        box-shadow: 0 0 0 0.25rem rgba(88, 145, 105, 0.25);
    }

    /* Accordion Custom */
    .accordion-item {
        border: none;
        margin-bottom: 1rem;
        border-radius: 12px !important;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .accordion-button {
        background: white;
        color: var(--dark);
        font-weight: 600;
        padding: 1.25rem 1.5rem;
        border-radius: 12px !important;
    }

    .accordion-button:not(.collapsed) {
        background: var(--accent-green);
        color: white;
        box-shadow: none;
    }

    .accordion-button:focus {
        box-shadow: none;
        border-color: transparent;
    }

    .accordion-body {
        padding: 1.5rem;
        background: white;
    }

    /* Loading Animation */
    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .spinner-border {
        animation: spin 1s linear infinite;
    }
</style>

<script>
    // Contador de caracteres
    const mensajeTextarea = document.getElementById('mensaje');
    const charCount = document.getElementById('charCount');

    mensajeTextarea.addEventListener('input', function() {
        const length = this.value.length;
        charCount.textContent = `${length} / 1000 caracteres`;

        if (length > 1000) {
            charCount.style.color = '#dc3545';
        } else if (length > 900) {
            charCount.style.color = '#ffc107';
        } else {
            charCount.style.color = 'var(--text-muted)';
        }
    });

    // Función para mostrar/ocultar campo "Otro"
    function toggleOtroAsunto() {
        const select = document.getElementById('asuntoSelect');
        const otroDiv = document.getElementById('otroAsuntoDiv');
        const otroInput = document.getElementById('otroAsuntoInput');
        const hiddenInput = document.getElementById('asuntoHidden');

        if (select.value === 'otro') {
            // Mostrar campo de texto
            otroDiv.style.display = 'block';
            otroInput.required = true;
            otroInput.name = 'asunto'; // Activar el input
            hiddenInput.name = ''; // Desactivar el hidden
            select.removeAttribute('name'); // Quitar name del select
        } else {
            // Ocultar campo de texto
            otroDiv.style.display = 'none';
            otroInput.required = false;
            otroInput.name = ''; // Desactivar el input
            hiddenInput.name = 'asunto'; // Activar el hidden
            hiddenInput.value = select.value; // Copiar valor del select
            select.name = ''; // Quitar name del select para evitar duplicados
        }
    }

    // Ejecutar al cargar la página por si viene de old() con error
    document.addEventListener('DOMContentLoaded', function() {
        const oldAsunto = '<?= old('asunto') ?>';
        const asuntoSelect = document.getElementById('asuntoSelect');

        // Si el asunto anterior no está en las opciones predefinidas, es "otro"
        const opciones = ['Consulta sobre cursos', 'Información de precios', 'Soporte técnico',
            'Colaboración artesanal', 'Sugerencias'
        ];

        if (oldAsunto && !opciones.includes(oldAsunto)) {
            asuntoSelect.value = 'otro';
            toggleOtroAsunto();
            document.getElementById('otroAsuntoInput').value = oldAsunto;
        } else if (oldAsunto) {
            document.getElementById('asuntoHidden').value = oldAsunto;
        }
    });

    // Loading al enviar formulario
    const contactForm = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const btnLoading = document.getElementById('btnLoading');

    contactForm.addEventListener('submit', function() {
        submitBtn.disabled = true;
        btnText.style.display = 'none';
        btnLoading.style.display = 'inline';
    });

    // Auto-dismiss alerts después de 5 segundos
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            const bsAlert = new bootstrap.Alert(alert);
            setTimeout(() => bsAlert.close(), 5000);
        });
    }, 100);
</script>

<?= $this->endSection() ?>