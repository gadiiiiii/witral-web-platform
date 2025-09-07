<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<section style="padding-top: 120px; padding-bottom: 80px; background: var(--secondary);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="section-title">Nuestros Cursos</h1>
            <p class="section-subtitle">
                Descubre todos nuestros cursos de tejido y encuentra el perfecto para tu nivel
            </p>
        </div>
        
        <!-- Filter Tabs -->
        <div class="d-flex justify-content-center mb-5" data-aos="fade-up" data-aos-delay="100">
            <ul class="nav nav-pills" id="courseFilter">
                <li class="nav-item">
                    <button class="nav-link active" data-filter="all">Todos</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-filter="principiante">Principiante</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-filter="intermedio">Intermedio</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-filter="avanzado">Avanzado</button>
                </li>
            </ul>
        </div>
        
        <div class="row" id="coursesContainer">
            <?php if (isset($cursos) && !empty($cursos)): ?>
                <?php foreach ($cursos as $index => $curso): ?>
                <div class="col-lg-4 col-md-6 mb-4 course-item" data-level="<?= $curso['nivel'] ?>" data-aos="fade-up" data-aos-delay="<?= ($index + 1) * 100 ?>">
                    <div class="card card-modern h-100">
                        <div class="card-img-gradient">
                            <i class="bi bi-play-circle"></i>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0"><?= esc($curso['titulo']) ?></h5>
                                <span class="badge bg-<?= $curso['nivel'] == 'principiante' ? 'primary' : ($curso['nivel'] == 'intermedio' ? 'warning' : 'danger') ?>"><?= ucfirst($curso['nivel']) ?></span>
                            </div>
                            <p class="card-text text-muted"><?= esc($curso['descripcion']) ?></p>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <small class="text-muted">
                                    <i class="bi bi-clock"></i> <?= $curso['duracion'] ?> min
                                </small>
                                <small class="text-muted">
                                    <i class="bi bi-people"></i> <?= $curso['total_estudiantes'] ?? 0 ?> estudiantes
                                </small>
                            </div>
                            <button class="btn btn-primary-custom w-100 mt-3">
                                <i class="bi bi-play"></i> Ver Curso
                            </button>
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
    </div>
</section>

<script>
// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('[data-filter]').forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            document.querySelectorAll('[data-filter]').forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const filter = this.dataset.filter;
            const courses = document.querySelectorAll('.course-item');
            
            courses.forEach(course => {
                if (filter === 'all' || course.dataset.level === filter) {
                    course.style.display = 'block';
                } else {
                    course.style.display = 'none';
                }
            });
        });
    });
});
</script>
<?= $this->endSection() ?> 