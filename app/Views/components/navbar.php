<link rel="stylesheet" href="assets/css/navbarstyle.css">

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/'); ?>">
            <img src="assets/img/logitosinplb.jpg" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/'); ?>">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('producto/catalogo'); ?>">Catálogo</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/about'); ?>">Nosotros</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/comercialization'); ?>">Comercialización</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/contact'); ?>">Contacto</a></li>
            </ul>

            <!-- Acciones de usuario y carrito -->
            <div class="user-actions d-flex align-items-center gap-2">
                <?php if (session()->get('logged_in')): ?>
                    <span class="navbar-text me-3 text-light">
                        Bienvenido, <?= esc(session()->get('user_name')) ?>
                        <?php if(session()->get('user_rol') === 'admin'): ?>
                            <li class="badge bg-warning text-dark ms-2">
                                <a class="nav-link text-dark" href="<?= base_url('/Admin/adminPage'); ?>">ADMIN</a>
                            </li>
                        <?php endif; ?>
                    </span>
                    <form action="<?= base_url('/logout') ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-danger btn-sm ms-2">Cerrar sesión</button>
                    </form>
                <?php else: ?>
                    <!-- Ícono de usuario -->
                    <a class="user-icon" href="<?= base_url('/Auth/Login'); ?>" title="Iniciar sesión">
                        <i class="bi bi-person"></i>
                    </a>
                <?php endif; ?>

                <!-- Ícono de carrito -->
                <a class="cart-icon"
                    href="<?= session()->get('logged_in') ? base_url('/cart') : base_url('/Auth/Login'); ?>"
                    title="Carrito de compras">
                    <i class="bi bi-cart3"></i>
                </a>
            </div>
        </div>
    </div>
</nav>
