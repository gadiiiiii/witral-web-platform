<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div style="padding-top: 120px; padding-bottom: 80px; background: var(--secondary); min-height: 100vh;">
    <div class="container">
        <div class="row g-4">
            <!-- Video Player Column -->
            <div class="col-lg-8">

                <!-- Video Player -->
                <div class="card border-0 rounded-4 shadow-sm mb-4 overflow-hidden">
                    <div class="ratio ratio-16x9" style="background: #000;">
                        <iframe 
                            src="https://www.youtube.com/embed/<?= esc($curso['video_id']) ?>" 
                            title="<?= esc($curso['titulo']) ?>" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <!-- Alert Info -->
                <div class="alert alert-info d-flex align-items-start border-0 rounded-4 shadow-sm mb-4" style="background: #e7f5ff; border-left: 4px solid #0dcaf0 !important;">
                    <i class="bi bi-info-circle me-3 fs-5" style="color: #0dcaf0;"></i>
                    <div class="flex-grow-1">
                        <strong>¿No puedes ver el video?</strong>
                        <p class="mb-2 mt-1">Algunos videos tienen restricciones de reproducción embebida.</p>
                        <a href="https://www.youtube.com/watch?v=<?= esc($curso['video_id']) ?>" 
                           target="_blank" 
                           class="btn btn-danger btn-sm">
                            <i class="bi bi-youtube"></i> Ver en YouTube
                        </a>
                    </div>
                </div>

                <!-- Tabs -->
                <div class="card border-0 rounded-4 shadow-sm">
                    <div class="card-body p-4">
                        <ul class="nav nav-tabs border-0 mb-4" id="courseTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active border-0 px-4 py-2" id="descripcion-tab" data-bs-toggle="tab" 
                                        data-bs-target="#descripcion" type="button" role="tab"
                                        style="color: #666; font-weight: 500; border-bottom: 3px solid transparent !important;">
                                    Descripción
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link border-0 px-4 py-2" id="detalles-tab" data-bs-toggle="tab" 
                                        data-bs-target="#detalles" type="button" role="tab"
                                        style="color: #666; font-weight: 500; border-bottom: 3px solid transparent !important;">
                                    Detalles
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="courseTabContent">
                            <div class="tab-pane fade show active" id="descripcion" role="tabpanel">
                                <h5 class="mb-3" style="color: var(--dark);">Sobre este curso</h5>
                                <p class="text-muted" style="line-height: 1.8;"><?= esc($curso['descripcion']) ?></p>
                            </div>
                            <div class="tab-pane fade" id="detalles" role="tabpanel">
                                <h5 class="mb-4" style="color: var(--dark);">Información del curso</h5>
                                <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle me-3" 
                                         style="width: 48px; height: 48px; background: rgba(88, 145, 105, 0.1);">
                                        <i class="bi bi-clock fs-5" style="color: #589169;"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted small">Duración</div>
                                        <div class="fw-bold"><?= esc($curso['duracion']) ?> minutos</div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle me-3" 
                                         style="width: 48px; height: 48px; background: rgba(88, 145, 105, 0.1);">
                                        <i class="bi bi-people fs-5" style="color: #589169;"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted small">Estudiantes</div>
                                        <div class="fw-bold"><?= esc($curso['total_estudiantes']) ?></div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle me-3" 
                                         style="width: 48px; height: 48px; background: rgba(88, 145, 105, 0.1);">
                                        <i class="bi bi-bar-chart fs-5" style="color: #589169;"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted small">Nivel</div>
                                        <div class="fw-bold"><?= ucfirst(esc($curso['nivel'])) ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
<div class="col-lg-4">
    <div style="position: sticky; top: 100px;">
        <!-- Course Info Card -->
        <div class="card border-0 rounded-4 shadow-sm mb-4">
            <div class="card-body p-4">
                <h4 class="mb-3" style="color: var(--dark); font-weight: 700;"><?= esc($curso['titulo']) ?></h4>
                
                <div class="d-flex gap-2 mb-4 flex-wrap">
                    <span class="badge px-3 py-2" style="background: #589169; border-radius: 8px; font-weight: 600;">
                        <?= ucfirst(esc($curso['nivel'])) ?>
                    </span>
                    <?php if ($curso['destacado']): ?>
                    <span class="badge px-3 py-2" style="background: #f0ad4e; border-radius: 8px; font-weight: 600;">
                        <i class="bi bi-star-fill"></i> Destacado
                    </span>
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3 pb-3" style="border-bottom: 1px solid #e9ecef;">
                        <span class="text-muted"><i class="bi bi-clock me-2"></i>Duración</span>
                        <strong><?= esc($curso['duracion']) ?> min</strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted"><i class="bi bi-people me-2"></i>Estudiantes</span>
                        <strong><?= esc($curso['total_estudiantes']) ?></strong>
                    </div>
                </div>

                <a href="<?= base_url('cursos') ?>" class="btn w-100 mb-2" 
                   style="color: #589169; border: 2px solid #589169; border-radius: 8px; font-weight: 600; padding: 0.75rem;">
                    <i class="bi bi-arrow-left"></i> Volver a Cursos
                </a>
                
                <a href="https://www.youtube.com/watch?v=<?= esc($curso['video_id']) ?>" 
                   target="_blank" 
                   class="btn btn-danger w-100"
                   style="border-radius: 8px; font-weight: 600; padding: 0.75rem;">
                    <i class="bi bi-youtube"></i> Ver en YouTube
                </a>
            </div>
        </div>

        <!-- Related Courses -->
        <?php if (!empty($cursosRelacionados)): ?>
        <div class="card border-0 rounded-4 shadow-sm">
            <div class="card-body p-4">
                <h5 class="mb-4" style="font-weight: 700;">Cursos Relacionados</h5>
                <?php foreach ($cursosRelacionados as $index => $relacionado): ?>
                <a href="<?= base_url('curso/' . $relacionado['id']) ?>" class="text-decoration-none d-block">
                    <div class="d-flex align-items-center mb-3 pb-3 <?= $index < count($cursosRelacionados) - 1 ? 'border-bottom' : '' ?>">
                        <img src="https://img.youtube.com/vi/<?= esc($relacionado['video_id']) ?>/mqdefault.jpg" 
                             class="rounded me-3" 
                             style="width: 80px; height: 60px; object-fit: cover; flex-shrink: 0;" 
                             alt="<?= esc($relacionado['titulo']) ?>">
                        <div>
                            <h6 class="mb-1" style="color: var(--dark); font-weight: 600;"><?= esc($relacionado['titulo']) ?></h6>
                            <small class="text-muted">
                                <i class="bi bi-clock"></i> <?= esc($relacionado['duracion']) ?> min
                            </small>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
    </div>
</div>

<style>
.nav-tabs .nav-link.active {
    color: #589169 !important;
    border-bottom: 3px solid #589169 !important;
    font-weight: 600 !important;
}

.nav-tabs .nav-link:hover {
    color: #589169 !important;
    border-bottom: 3px solid rgba(88, 145, 105, 0.3) !important;
}

.btn:hover {
    transform: translateY(-2px);
    transition: all 0.3s ease;
}
</style>

<?= $this->endSection() ?>