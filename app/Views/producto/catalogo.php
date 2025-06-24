<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<?= $this->section('styles') ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/topbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/navbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footerstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/catalogo.css') ?>">
<?= $this->endSection() ?>

<!-- Hero Section -->
<div class="catalog-hero">
    <div class="catalog-container">
        <div class="catalog-title">
            <h1><i class="fas fa-store me-3"></i>Catálogo de Productos</h1>
            <p class="catalog-subtitle">Descubre nuestra increíble colección de calzados Nike</p>
        </div>
    </div>
</div>

<div class="catalog-container">
    <!-- Sección de Filtros -->
    <div class="filters-section">
        <h3 class="filters-title">
            <i class="fas fa-filter me-2"></i>Filtros y Búsqueda
        </h3>
        
        <form method="get" id="filterForm">
            <!-- Búsqueda -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="search-container">
                        <i class="fas fa-search search-icon"></i>
                        <input 
                            type="text" 
                            name="nombre" 
                            id="searchInput"
                            class="form-control search-input" 
                            placeholder="Buscar productos por nombre... (presiona Enter para buscar)" 
                            value="<?= esc($filtros['nombre'] ?? '') ?>"
                        >
                        <button type="button" id="searchButton" class="search-button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Filtros -->
            <div class="row g-3">
                <div class="col-md-2">
                    <label class="form-label">
                        <i class="fas fa-tags me-1"></i>Categoría
                    </label>
                    <select name="categoria" class="form-select">
                        <option value="">Todas las categorías</option>
                        <?php foreach ($categorias as $cat): ?>
                            <option value="<?= $cat['id_categoria'] ?>" <?= ($filtros['categoria'] == $cat['id_categoria']) ? 'selected' : '' ?>>
                                <?= esc($cat['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="col-md-2">
                    <label class="form-label">
                        <i class="fas fa-dollar-sign me-1"></i>Precio mínimo
                    </label>
                    <input 
                        type="number" 
                        name="min_precio" 
                        class="form-control" 
                        placeholder="$0"
                        value="<?= esc($filtros['min_precio'] ?? '') ?>"
                    >
                </div>
                
                <div class="col-md-2">
                    <label class="form-label">
                        <i class="fas fa-dollar-sign me-1"></i>Precio máximo
                    </label>
                    <input 
                        type="number" 
                        name="max_precio" 
                        class="form-control" 
                        placeholder="$999999"
                        value="<?= esc($filtros['max_precio'] ?? '') ?>"
                    >
                </div>
                
                <div class="col-md-2">
                    <label class="form-label">
                        <i class="fas fa-venus-mars me-1"></i>Sexo
                    </label>
                    <select name="sexo" class="form-select">
                        <option value="">Todos</option>
                        <option value="Hombre" <?= ($filtros['sexo'] == 'Hombre') ? 'selected' : '' ?>>Hombre</option>
                        <option value="Mujer" <?= ($filtros['sexo'] == 'Mujer') ? 'selected' : '' ?>>Mujer</option>
                        <option value="Unisex" <?= ($filtros['sexo'] == 'Unisex') ? 'selected' : '' ?>>Unisex</option>
                    </select>
                </div>
                
                <div class="col-md-2">
                    <label class="form-label">
                        <i class="fas fa-shoe-prints me-1"></i>Talle
                    </label>
                    <input 
                        type="number" 
                        step="0.5" 
                        name="talle" 
                        class="form-control" 
                        placeholder="35-50"
                        value="<?= esc($filtros['talle'] ?? '') ?>"
                    >
                </div>
                
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search me-1"></i>Filtrar
                    </button>
                </div>
            </div>
            
            <!-- Botón limpiar filtros -->
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <a href="<?= base_url('producto/catalogo') ?>" class="btn btn-secondary">
                        <i class="fas fa-eraser me-1"></i>Limpiar todos los filtros
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Resultados -->
    <div class="results-info mb-4">
        <?php if (!empty($productos)): ?>
            <p class="text-center" style="color: var(--nike-blue-light); font-weight: 600;">
                <i class="fas fa-box me-2"></i>
                Mostrando <?= count($productos) ?> productos
            </p>
        <?php endif; ?>
    </div>

    <!-- Grid de Productos -->
    <?php if (!empty($productos)): ?>
        <div class="products-grid" id="productsGrid">
            <?php foreach ($productos as $producto): ?>
                <div class="product-card card h-100">
                    <a href="<?= base_url('producto/' . $producto['id_producto']) ?>" class="text-decoration-none">
                        <img 
                            src="<?= base_url('assets/img/' . ($producto['imagen'] ?? 'default.jpg')) ?>" 
                            class="product-image" 
                            alt="<?= esc($producto['nombre']) ?>"
                            loading="lazy"
                        >
                    </a>
                    
                    <div class="product-body card-body">
                        <h5 class="product-title card-title">
                            <?= esc($producto['nombre']) ?>
                        </h5>
                        
                        <p class="product-category">
                            <i class="fas fa-tag me-1"></i>
                            <?= esc($producto['categoria_nombre']) ?>
                        </p>
                        
                        <p class="product-price">
                            $<?= number_format($producto['precio'], 0, ',', '.') ?>
                        </p>
                        
                        <p class="<?= $producto['cantidad'] > 0 ? 'stock-available' : 'stock-unavailable' ?>">
                            <i class="fas <?= $producto['cantidad'] > 0 ? 'fa-check-circle' : 'fa-times-circle' ?> me-1"></i>
                            <?= $producto['cantidad'] > 0 ? 'Disponible' : 'Sin stock' ?>
                        </p>

                        <?php if ($producto['cantidad'] > 0): ?>
                            <a href="<?= base_url('carrito/agregar/' . $producto['id_producto']) ?>" class="btn-add-cart">
                                <i class="fas fa-shopping-cart"></i>
                                Agregar al carrito
                            </a>
                        <?php else: ?>
                            <button class="btn-add-cart" disabled style="opacity: 0.5; cursor: not-allowed;">
                                <i class="fas fa-ban"></i>
                                Sin stock
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <!-- Sin productos -->
        <div class="no-products">
            <div class="no-products-icon">
                <i class="fas fa-search"></i>
            </div>
            <h3>No se encontraron productos</h3>
            <p>No hay productos que coincidan con los filtros seleccionados.</p>
            <a href="<?= base_url('producto/catalogo') ?>" class="btn btn-primary">
                <i class="fas fa-refresh me-2"></i>Ver todos los productos
            </a>
        </div>
    <?php endif; ?>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');
    const filterForm = document.getElementById('filterForm');

    // Búsqueda solo al presionar Enter
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            filterForm.submit();
        }
    });

    // Búsqueda al hacer clic en el botón de búsqueda
    searchButton.addEventListener('click', function() {
        filterForm.submit();
    });

    // Feedback visual cuando se escribe
    searchInput.addEventListener('input', function() {
        if (this.value.length > 0) {
            this.style.borderColor = '#007bff';
            this.style.boxShadow = '0 0 0 0.2rem rgba(0, 123, 255, 0.25)';
        } else {
            this.style.borderColor = '';
            this.style.boxShadow = '';
        }
    });

    // Animación de hover mejorada para las tarjetas
    const productCards = document.querySelectorAll('.product-card');
    
    productCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Efecto de carga para botones de agregar al carrito
    const addToCartButtons = document.querySelectorAll('.btn-add-cart');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!this.disabled) {
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Agregando...';
                this.disabled = true;
                
                // Simular un pequeño delay para mejor UX
                setTimeout(() => {
                    // El navegador redirigirá, pero si no lo hace, restaurar el botón
                    this.innerHTML = originalText;
                    this.disabled = false;
                }, 1000);
            }
        });
    });

    // Auto-submit del formulario cuando cambian los selects
    const formSelects = document.querySelectorAll('select[name="categoria"], select[name="sexo"]');
    formSelects.forEach(select => {
        select.addEventListener('change', function() {
            filterForm.submit();
        });
    });
});
</script>

<?= $this->endSection() ?>