<link rel="stylesheet" href="<?= base_url('assets/css/navbarstyle.css') ?>">

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/'); ?>">
            <img src="<?= base_url('assets/img/logitosinplb.jpg') ?>" alt="Logo">
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
                <?php if(!session()->get('logged_in')): ?>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/contact'); ?>">Contacto</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/consulta'); ?>">Consulta</a></li>
                <?php endif; ?>
            </ul>

            <!-- Acciones de usuario y carrito -->
            <div class="user-actions d-flex align-items-center gap-3">
                <!-- Menú de usuario -->
                <div class="user-icon <?php echo session()->get('logged_in') ? 'logged-in' : ''; ?>">
                    <?php if (!session()->get('logged_in')): ?>
                        <a class="login-link text-light" href="<?= base_url('/Auth/Login'); ?>">
                            <i class="bi bi-person"></i>
                        </a>
                    <?php else: ?>
                        <a class="dropdown-toggle text-light" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown" style="z-index: 1001;">
                            <li><h6 class="dropdown-header">Hola, <?= esc(session()->get('user_name')) ?>!</h6></li>
                            <li><a class="dropdown-item" href="<?= base_url('/perfil'); ?>">👤 Ver perfil</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('/consulta'); ?>">📩 Consulta</a></li>
                            <?php if(session()->get('user_rol') === 'admin'): ?>
                                <li><a class="dropdown-item" href="<?= base_url('/Admin/adminPage'); ?>">🛠 Panel Admin</a></li>
                            <?php endif; ?>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="<?= base_url('/logout') ?>" method="post" class="px-3">
                                    <button type="submit" class="btn btn-danger btn-sm w-100">Cerrar sesión</button>
                                </form>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- Ícono de carrito -->
                <a class="cart-icon"
                    href="<?= session()->get('logged_in') ? base_url('/carrito') : base_url('/Auth/Login'); ?>"
                    title="Carrito de compras">
                    <i class="bi bi-cart3"></i>
                </a>
            </div>
        </div>
    </div>
</nav>