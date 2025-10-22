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

        <!-- Search Bar -->
        <div class="row justify-content-center mb-4" data-aos="fade-up" data-aos-delay="50">
            <div class="col-lg-8">
                <div class="position-relative">
                    <div class="input-group input-group-lg">
                        <input type="text" 
                               class="form-control" 
                               id="searchInput" 
                               placeholder="Buscar cursos..." 
                               aria-label="Buscar cursos">
                        <span class="input-group-text bg-white border-start-0">
                            <i class="bi bi-search"></i>
                        </span>
                    </div>
                    <!-- Loading indicator -->
                    <div id="searchLoading" class="position-absolute top-50 end-0 translate-middle-y me-5 d-none">
                        <div class="spinner-border spinner-border-sm text-primary" role="status">
                            <span class="visually-hidden">Buscando...</span>
                        </div>
                    </div>
                </div>
                
                <!-- Search results counter -->
                <div id="searchResults" class="mt-3 text-center d-none">
                    <small class="text-muted">
                        <span id="resultsCount">0</span> curso(s) encontrado(s)
                    </small>
                    <button id="clearSearch" class="btn btn-sm btn-link text-decoration-none ms-2 d-none">
                        <i class="bi bi-x-circle"></i> Limpiar búsqueda
                    </button>
                </div>
            </div>
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
        
        <!-- No results message -->
        <div id="noResults" class="row d-none">
            <div class="col-12 text-center">
                <div class="alert alert-warning">
                    <i class="bi bi-search"></i> No se encontraron cursos que coincidan con tu búsqueda
                </div>
            </div>
        </div>
        
        <div class="row" id="coursesContainer">
            <?php if (isset($cursos) && !empty($cursos)): ?>
                <?php foreach ($cursos as $index => $curso): ?>
                <div class="col-lg-4 col-md-6 mb-4 course-item" 
                     data-level="<?= esc($curso['nivel']) ?>" 
                     data-title="<?= strtolower(esc($curso['titulo'])) ?>"
                     data-description="<?= strtolower(esc($curso['descripcion'])) ?>"
                     data-aos="fade-up" 
                     data-aos-delay="<?= ($index + 1) * 100 ?>">
                    <div class="card card-modern h-100">
                        <div class="card-img-gradient">
                            <img src="https://img.youtube.com/vi/<?= esc($curso['video_id']) ?>/maxresdefault.jpg" 
                                 class="card-img-top" 
                                 alt="<?= esc($curso['titulo']) ?>">
                            <i class="bi bi-play-circle"></i>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0"><?= esc($curso['titulo']) ?></h5>
                                <span class="badge badge-nivel-<?= esc($curso['nivel']) ?>">
                                    <?= ucfirst(esc($curso['nivel'])) ?>
                                </span>
                            </div>
                            <p class="card-text text-muted"><?= esc($curso['descripcion']) ?></p>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <small class="text-muted">
                                    <i class="bi bi-clock"></i> <?= esc($curso['duracion']) ?> min
                                </small>
                                <small class="text-muted">
                                    <i class="bi bi-people"></i> <?= esc($curso['total_estudiantes']) ?> estudiantes
                                </small>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0 p-4 pt-0">
                            <a href="<?= base_url('curso/' . $curso['id']) ?>" class="btn btn-primary-custom w-100 mt-3">
                                <i class="bi bi-play"></i> Ver Curso
                            </a>
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
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchLoading = document.getElementById('searchLoading');
    const searchResults = document.getElementById('searchResults');
    const resultsCount = document.getElementById('resultsCount');
    const clearSearchBtn = document.getElementById('clearSearch');
    const noResults = document.getElementById('noResults');
    const courseItems = document.querySelectorAll('.course-item');
    
    let searchTimeout;
    let currentFilter = 'all';
    
    // Real-time search functionality
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();
        
        // Clear previous timeout
        clearTimeout(searchTimeout);
        
        // Show loading indicator
        searchLoading.classList.remove('d-none');
        
        // Debounce search (wait 300ms after user stops typing)
        searchTimeout = setTimeout(() => {
            performSearch(searchTerm);
            searchLoading.classList.add('d-none');
        }, 300);
    });
    
    // Perform search
    function performSearch(searchTerm) {
        let visibleCount = 0;
        
        courseItems.forEach(course => {
            const title = course.dataset.title;
            const description = course.dataset.description;
            const level = course.dataset.level;
            
            // Check if matches search term
            const matchesSearch = searchTerm === '' || 
                                 title.includes(searchTerm) || 
                                 description.includes(searchTerm);
            
            // Check if matches current filter
            const matchesFilter = currentFilter === 'all' || level === currentFilter;
            
            // Show/hide course based on both search and filter
            if (matchesSearch && matchesFilter) {
                course.style.display = 'block';
                visibleCount++;
            } else {
                course.style.display = 'none';
            }
        });
        
        // Update results counter
        updateResultsDisplay(searchTerm, visibleCount);
    }
    
    // Update results display
    function updateResultsDisplay(searchTerm, count) {
        if (searchTerm !== '') {
            searchResults.classList.remove('d-none');
            clearSearchBtn.classList.remove('d-none');
            resultsCount.textContent = count;
            
            if (count === 0) {
                noResults.classList.remove('d-none');
            } else {
                noResults.classList.add('d-none');
            }
        } else {
            searchResults.classList.add('d-none');
            clearSearchBtn.classList.add('d-none');
            noResults.classList.add('d-none');
        }
    }
    
    // Clear search
    clearSearchBtn.addEventListener('click', function() {
        searchInput.value = '';
        performSearch('');
        searchInput.focus();
    });
    
    // Filter functionality
    document.querySelectorAll('[data-filter]').forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            document.querySelectorAll('[data-filter]').forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Update current filter
            currentFilter = this.dataset.filter;
            
            // Reapply search with new filter
            const searchTerm = searchInput.value.toLowerCase().trim();
            performSearch(searchTerm);
        });
    });
    
    // Keyboard shortcut: Ctrl+K or Cmd+K to focus search
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            searchInput.focus();
        }
        
        // Escape to clear search
        if (e.key === 'Escape' && searchInput.value !== '') {
            searchInput.value = '';
            performSearch('');
        }
    });
});
</script>

<style>
/* Smooth transitions for search */
.course-item {
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.course-item[style*="display: none"] {
    opacity: 0;
    transform: scale(0.95);
}

/* Search input focus effect */
#searchInput:focus {
    box-shadow: 0 0 0 0.25rem rgba(88, 145, 105, 0.25);
    border-color: var(--primary);
}

/* Loading spinner animation */
@keyframes spin {
    to { transform: rotate(360deg); }
}

.spinner-border {
    animation: spin 0.75s linear infinite;
}

/* FIX: Card image with play button */
.card-img-gradient {
    position: relative;
    overflow: hidden;
}

.card-img-gradient img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.card-img-gradient:hover img {
    transform: scale(1.05);
}

.card-img-gradient i.bi-play-circle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 4rem;
    color: white;
    opacity: 0.9;
    transition: all 0.3s ease;
    pointer-events: none;
    z-index: 10;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
}

.card-img-gradient:hover i.bi-play-circle {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1.1);
}

/* Dark overlay on hover */
.card-img-gradient::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1;
}

.card-img-gradient:hover::before {
    opacity: 1;
}

.badge-nivel-principiante {
    background-color: #589169 !important;
    color: white;
    font-weight: 600;
}

.badge-nivel-intermedio {
    background-color: #7aaa8a !important;
    color: white;
    font-weight: 600;
}

.badge-nivel-avanzado {
    background-color: #3d6b4d !important;
    color: white;
    font-weight: 600;
}

/* Estilos para los botones de filtro */
.nav-pills .nav-link {
    color: #589169;
    background-color: transparent;
    border: 2px solid #589169;
    border-radius: 25px;
    padding: 8px 20px;
    font-weight: 600;
    transition: all 0.3s ease;
    margin: 0 5px;
}

.nav-pills .nav-link:hover {
    background-color: rgba(88, 145, 105, 0.1);
    color: #3d6b4d;
    border-color: #3d6b4d;
    transform: translateY(-2px);
}

.nav-pills .nav-link.active {
    background-color: #589169 !important;
    color: white !important;
    border-color: #589169 !important;
    box-shadow: 0 4px 12px rgba(88, 145, 105, 0.3);
}
</style>

<?= $this->endSection() ?>