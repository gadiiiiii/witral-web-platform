<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="container mt-5 pt-5" style="max-width: 1400px;">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-2" style="color: var(--dark); font-weight: 800;">
                        <i class="bi bi-speedometer2"></i> Panel de Administración
                    </h2>
                    <p class="text-muted">Gestiona tus videos y contenido</p>
                </div>
                <a href="<?= base_url('admin/crear') ?>" class="btn-primary-hero">
                    <i class="bi bi-plus-circle"></i> Agregar Video
                </a>
            </div>

            <!-- Mensajes de éxito/error -->
            <?php if (session()->has('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle"></i> <?= session('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle"></i> <?= session('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- Estadísticas Centradas -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10">
                    <div class="row text-center g-4">
                        <div class="col-md-4">
                            <div class="stat-card p-4 rounded-4" style="background: white; box-shadow: 0 4px 20px rgba(60, 55, 47, 0.08);">
                                <span class="stat-number d-block" style="font-size: 3rem; font-weight: 800; color: #589169; line-height: 1;"><?= $total_videos ?></span>
                                <span class="stat-label d-block mt-2" style="color: #666; font-weight: 500; font-size: 1rem;">Total Videos</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-card p-4 rounded-4" style="background: white; box-shadow: 0 4px 20px rgba(60, 55, 47, 0.08);">
                                <span class="stat-number d-block" style="font-size: 3rem; font-weight: 800; color: #589169; line-height: 1;"><?= $videos_activos ?></span>
                                <span class="stat-label d-block mt-2" style="color: #666; font-weight: 500; font-size: 1rem;">Videos Activos</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-card p-4 rounded-4" style="background: white; box-shadow: 0 4px 20px rgba(60, 55, 47, 0.08);">
                                <span class="stat-number d-block" style="font-size: 3rem; font-weight: 800; color: #589169; line-height: 1;"><?= $videos_destacados ?></span>
                                <span class="stat-label d-block mt-2" style="color: #666; font-weight: 500; font-size: 1rem;">Destacados</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabla de Videos Centrada -->
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card-modern">
                        <div class="card-body p-4">
                            <h4 class="mb-4" style="color: var(--dark); font-weight: 700;">
                                <i class="bi bi-collection-play"></i> Lista de Videos
                            </h4>

                            <?php if (empty($videos)): ?>
                                <div class="text-center py-5">
                                    <i class="bi bi-inbox" style="font-size: 4rem; color: var(--text-muted);"></i>
                                    <h5 class="mt-3" style="color: var(--text-muted);">No hay videos disponibles</h5>
                                    <p style="color: var(--text-muted);">Comienza agregando tu primer video</p>
                                    <a href="<?= base_url('admin/crear') ?>" class="btn-primary-hero mt-3">
                                        <i class="bi bi-plus-circle"></i> Agregar Primer Video
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead style="background: var(--secondary);">
                                            <tr>
                                                <th style="width: 80px;" class="text-center">Orden</th>
                                                <th style="width: 100px;">Preview</th>
                                                <th>Título</th>
                                                <th style="width: 120px;">Duración</th>
                                                <th style="width: 130px;">Estudiantes</th>
                                                <th style="width: 100px;" class="text-center">Estado</th>
                                                <th style="width: 100px;" class="text-center">Destacado</th>
                                                <th style="width: 200px;" class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($videos as $video): ?>
                                            <tr>
                                                <td class="text-center">
                                                    <span class="badge bg-secondary"><?= $video['orden'] ?></span>
                                                </td>
                                                <td>
                                                    <img src="https://img.youtube.com/vi/<?= esc($video['video_id']) ?>/default.jpg" 
                                                         alt="Thumbnail" 
                                                         class="rounded" 
                                                         style="width: 80px; height: 60px; object-fit: cover;">
                                                </td>
                                                <td>
                                                    <strong style="font-weight: 600;"><?= esc($video['titulo']) ?></strong>
                                                    <br>
                                                    <small class="text-muted"><?= esc(substr($video['descripcion'], 0, 60)) ?>...</small>
                                                </td>
                                                <td>
                                                    <i class="bi bi-clock text-muted"></i> <?= esc($video['duracion']) ?>
                                                </td>
                                                <td>
                                                    <i class="bi bi-people text-muted"></i> <?= esc($video['total_estudiantes']) ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($video['activo']): ?>
                                                        <span class="badge bg-success">Activo</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-secondary">Inactivo</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($video['destacado']): ?>
                                                        <i class="bi bi-star-fill text-warning fs-5"></i>
                                                    <?php else: ?>
                                                        <i class="bi bi-star text-muted fs-5"></i>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <a href="<?= base_url('admin/editar/' . $video['id']) ?>" 
                                                           class="btn btn-outline-primary" 
                                                           title="Editar">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <a href="<?= base_url('admin/toggle-activo/' . $video['id']) ?>" 
                                                           class="btn btn-outline-secondary" 
                                                           title="Activar/Desactivar">
                                                            <i class="bi bi-power"></i>
                                                        </a>
                                                        <a href="<?= base_url('admin/toggle-destacado/' . $video['id']) ?>" 
                                                           class="btn btn-outline-warning" 
                                                           title="Destacar">
                                                            <i class="bi bi-star"></i>
                                                        </a>
                                                        <button onclick="confirmarEliminar(<?= $video['id'] ?>)" 
                                                                class="btn btn-outline-danger" 
                                                                title="Eliminar">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function confirmarEliminar(id) {
    if (confirm('¿Estás seguro de que quieres eliminar este video? Esta acción no se puede deshacer.')) {
        window.location.href = '<?= base_url('admin/eliminar/') ?>' + id;
    }
}
</script>

<style>
.stat-card {
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(60, 55, 47, 0.15) !important;
}

.table {
    margin-bottom: 0;
}

.table thead th {
    border-bottom: 2px solid #589169;
    font-weight: 600;
    color: var(--dark);
    padding: 1rem 0.75rem;
}

.table tbody tr {
    transition: all 0.3s ease;
}

.table tbody tr:hover {
    background: var(--secondary);
}

.table tbody td {
    padding: 1rem 0.75rem;
}

.btn-group-sm .btn {
    padding: 0.4rem 0.6rem;
    font-size: 0.875rem;
}

.btn-outline-primary:hover {
    background: #589169;
    border-color: #589169;
}
</style>

<?= $this->endSection() ?>