<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/topbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/navbarstyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footerstyle.css') ?>">


<div class="container py-5">
    <div class="row">
        <div class="col-md-6">

            <img src="<?= base_url('assets/img/' . ($producto['imagen'] ?? 'default.jpg')) ?>" class="img-fluid" alt="<?= esc($producto['nombre']) ?>">
        </div>
        <div class="col-md-6">
            <h2><?= esc($producto['nombre']) ?></h2>
            
            <?php if ($producto['activo'] == 0 || $producto['cantidad'] == 0 ): ?>
                <p class="text-danger">PRODUCTO NO DISPONIBLE</p>
            <?php else: ?>
                <p class="text-success">PRODUCTO DISPONIBLE</p>
            <?php endif; ?>
            
            <h4 class="text-success">$<?= number_format($producto['precio'], 0, ',', '.') ?></h4>
            <p><?= esc($producto['descripcion']) ?></p>
            <p><strong>Tipo:</strong> <?= esc($producto['categoria_nombre']) ?></p>
            <p><strong>Sexo:</strong> <?= esc($producto['sexo']) ?></p>
            <p><strong>Talle:</strong> <?= esc($producto['talle']) ?></p>
            

            <!-- Métodos de pago -->
<div class="mt-4">
    <h5>Métodos de pago</h5>
    <ul>
        <li>Tarjeta de crédito y débito (Visa, MasterCard, American Express)</li>
        <li>Mercado Pago</li>
        <li>Transferencia bancaria</li>
    </ul>
</div>

<!-- Devoluciones y envíos -->
<div class="mt-4">
    <h5>Devoluciones y envíos</h5>
    <ul>
        <li>Envíos a todo el país en 3 a 7 días hábiles.</li>
        <li>Devoluciones gratuitas dentro de los 30 días de recibido el producto.</li>
        <li>Para más información, consulta nuestra <a href="<?= base_url('/terms-uses') ?>">política de devoluciones</a>.</li>
    </ul>
</div>

<!-- Compartir como botón desplegable -->
<div class="mt-4">
    <div class="dropdown">
        <button class="btn btn-outline-primary dropdown-toggle btn-sm" type="button" id="dropdownCompartir" data-bs-toggle="dropdown" aria-expanded="false">
            Compartir
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownCompartir">
            <li>
                <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u=<?= current_url() ?>" target="_blank">
                    <i class="bi bi-facebook"></i> Facebook
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="https://twitter.com/intent/tweet?url=<?= current_url() ?>&text=¡Mirá este producto Nike!" target="_blank">
                    <i class="bi bi-twitter"></i> Twitter
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="https://api.whatsapp.com/send?text=<?= current_url() ?>" target="_blank">
                    <i class="bi bi-whatsapp"></i> WhatsApp
                </a>
            </li>
        </ul>
    </div>
</div>
                    <a href="<?= base_url('/producto/catalogo') ?>" class="btn btn-secondary mt-3">Volver al catálogo</a>   
        </div>

        
</div>


<?= $this->endSection() ?>