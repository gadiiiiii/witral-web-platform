<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="container mt-5 pt-5 pb-5 mb-5" style="min-height: calc(100vh - 100px);">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="mb-4">
                <a href="<?= base_url('admin') ?>" class="text-decoration-none text-muted mb-2 d-inline-block">
                    <i class="bi bi-arrow-left"></i> Volver al panel
                </a>
                <h2 style="color: var(--dark); font-weight: 800;">
                    <?= isset($video) ? '<i class="bi bi-pencil"></i> Editar Video' : '<i class="bi bi-plus-circle"></i> Agregar Nuevo Video' ?>
                </h2>
            </div>

            <!-- Mensajes de error -->
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
            <div class="card-modern">
                <div class="card-body p-4">
                    <form action="<?= isset($video) ? base_url('admin/actualizar/' . $video['id']) : base_url('admin/guardar') ?>" 
                          method="POST">
                        <?= csrf_field() ?>

                        <!-- Título -->
                        <div class="mb-4">
                            <label for="titulo" class="form-label fw-bold">
                                <i class="bi bi-card-heading"></i> Título del Video
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control form-control-lg" 
                                   id="titulo" 
                                   name="titulo" 
                                   value="<?= old('titulo', $video['titulo'] ?? '') ?>"
                                   placeholder="Ej: Fundamentos del Tejido"
                                   required>
                            <small class="text-muted">El título aparecerá en la tarjeta del video</small>
                        </div>

                        <!-- Descripción -->
                        <div class="mb-4">
                            <label for="descripcion" class="form-label fw-bold">
                                <i class="bi bi-file-text"></i> Descripción
                                <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control" 
                                      id="descripcion" 
                                      name="descripcion" 
                                      rows="4" 
                                      placeholder="Describe brevemente lo que aprenderán en este video..."
                                      required><?= old('descripcion', $video['descripcion'] ?? '') ?></textarea>
                            <small class="text-muted">Describe el contenido del video (mínimo 10 caracteres)</small>
                        </div>
                    
                        <!-- Nivel -->

                        <div class="mb-3">
                            <label for="nivel" class="form-label">Nivel</label>
                                <select class="form-select" id="nivel" name="nivel" required>
                                    <option value="principiante" <?= isset($video['nivel']) && $video['nivel'] == 'principiante' ? 'selected' : '' ?>>Principiante</option>
                                    <option value="intermedio" <?= isset($video['nivel']) && $video['nivel'] == 'intermedio' ? 'selected' : '' ?>>Intermedio</option>
                                    <option value="avanzado" <?= isset($video['nivel']) && $video['nivel'] == 'avanzado' ? 'selected' : '' ?>>Avanzado</option>
                                </select>
                        </div>
                        <!-- Video ID -->
                        <div class="mb-4">
                            <label for="video_id" class="form-label fw-bold">
                                <i class="bi bi-youtube"></i> ID del Video de YouTube
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-link-45deg"></i>
                                </span>
                                <input type="text" 
                                       class="form-control" 
                                       id="video_id" 
                                       name="video_id" 
                                       value="<?= old('video_id', $video['video_id'] ?? '') ?>"
                                       placeholder="dQw4w9WgXcQ"
                                       required>
                            </div>
                            <small class="text-muted">
                                Copia el ID del video de YouTube. Ejemplo: en https://www.youtube.com/watch?v=<strong>dQw4w9WgXcQ</strong>, 
                                el ID es <strong>dQw4w9WgXcQ</strong>
                            </small>
                            
                            <!-- Preview del video -->
                            <div id="video-preview" class="mt-3" style="display: none;">
                                <label class="form-label fw-bold">Vista Previa:</label>
                                <img id="thumbnail-preview" src="" alt="Preview" class="img-fluid rounded shadow-sm" style="max-height: 200px;">
                            </div>
                        </div>

                        <!-- Duración -->
                        <div class="mb-4">
                            <label for="duracion" class="form-label fw-bold">
                                <i class="bi bi-clock"></i> Duración
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control" 
                                   id="duracion" 
                                   name="duracion" 
                                   value="<?= old('duracion', $video['duracion'] ?? '') ?>"
                                   placeholder="Ej: 45 min"
                                   required>
                            <small class="text-muted">Formato sugerido: "45 min", "1h 30min", etc.</small>
                        </div>

                        <!-- Total Estudiantes -->
                        <div class="mb-4">
                            <label for="total_estudiantes" class="form-label fw-bold">
                                <i class="bi bi-people"></i> Total de Estudiantes
                            </label>
                            <input type="number" 
                                   class="form-control" 
                                   id="total_estudiantes" 
                                   name="total_estudiantes" 
                                   value="<?= old('total_estudiantes', $video['total_estudiantes'] ?? 0) ?>"
                                   min="0"
                                   placeholder="0">
                            <small class="text-muted">Número de estudiantes inscritos (opcional)</small>
                        </div>

                        <!-- Orden -->
                        <div class="mb-4">
                            <label for="orden" class="form-label fw-bold">
                                <i class="bi bi-sort-numeric-down"></i> Orden de Aparición
                            </label>
                            <input type="number" 
                                   class="form-control" 
                                   id="orden" 
                                   name="orden" 
                                   value="<?= old('orden', $video['orden'] ?? 0) ?>"
                                   min="0"
                                   placeholder="0">
                            <small class="text-muted">Número menor aparece primero</small>
                        </div>

                        <!-- Checkboxes -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           id="destacado" 
                                           name="destacado" 
                                           value="1"
                                           <?= old('destacado', $video['destacado'] ?? false) ? 'checked' : '' ?>>
                                    <label class="form-check-label fw-bold" for="destacado">
                                        <i class="bi bi-star-fill text-warning"></i> Video Destacado
                                    </label>
                                    <br>
                                    <small class="text-muted">Aparecerá en la página principal</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           id="activo" 
                                           name="activo" 
                                           value="1"
                                           <?= old('activo', $video['activo'] ?? true) ? 'checked' : '' ?>>
                                    <label class="form-check-label fw-bold" for="activo">
                                        <i class="bi bi-check-circle text-success"></i> Video Activo
                                    </label>
                                    <br>
                                    <small class="text-muted">Los usuarios podrán ver este video</small>
                                </div>
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="d-flex gap-3 mt-5">
                            <button type="submit" class="btn-primary-hero">
                                <i class="bi bi-save"></i>
                                <?= isset($video) ? 'Actualizar Video' : 'Guardar Video' ?>
                            </button>
                            <a href="<?= base_url('admin') ?>" class="btn-secondary-hero">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Preview del thumbnail cuando se ingresa el video ID
document.getElementById('video_id').addEventListener('input', function() {
    const videoId = this.value.trim();
    const preview = document.getElementById('video-preview');
    const thumbnail = document.getElementById('thumbnail-preview');
    
    if (videoId.length >= 11) {
        thumbnail.src = `https://img.youtube.com/vi/${videoId}/maxresdefault.jpg`;
        preview.style.display = 'block';
    } else {
        preview.style.display = 'none';
    }
});

// Mostrar preview si ya hay un video ID al cargar la página
window.addEventListener('DOMContentLoaded', function() {
    const videoId = document.getElementById('video_id').value.trim();
    if (videoId.length >= 11) {
        const preview = document.getElementById('video-preview');
        const thumbnail = document.getElementById('thumbnail-preview');
        thumbnail.src = `https://img.youtube.com/vi/${videoId}/maxresdefault.jpg`;
        preview.style.display = 'block';
    }
});
</script>

<style>
.form-control:focus,
.form-check-input:focus {
    border-color: var(--accent-green);
    box-shadow: 0 0 0 0.25rem rgba(62, 125, 84, 0.25);
}

.form-check-input:checked {
    background-color: var(--accent-green);
    border-color: var(--accent-green);
}

.input-group-text {
    background: var(--secondary);
    border-color: #dee2e6;
}
</style>

<?= $this->endSection() ?>

<!-- INSTRUCCIONES:
Guarda este archivo como: app/Views/admin/video_form.php
-->