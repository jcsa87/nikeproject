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
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/about'); ?>">Nosotros</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/comercialization'); ?>">Comercialización</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/contact'); ?>">Contacto</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/terms-uses'); ?>">Términos y Condiciones</a></li>
            </ul>

        <!-- social media -->
        <div class="social-icons d-flex mb-2 mb-lg-0">
            <?php if (session()->get('logged_in')): ?>
                <span class="navbar-text me-3 text-light">
             Bienvenido, <?= esc(session()->get('user_name')) ?>
             <?php if(session()->get('user_rol') === 'admin'): ?>
                <li class="badge bg-warning text-dark ms-2"><a class="nav-link text-dark" href="<?= base_url('/Admin/adminPage'); ?>" >ADMIN</a></li>
             <?php endif; ?>
                </span>
            <form action="<?= base_url('/logout') ?>" method="post" style="display:inline;">
                 <button type="submit" class="btn btn-danger btn-sm ms-2">Cerrar sesión</button>
              </form>
            <?php else: ?>
             <a class="nav-link btn btn-outline-primary px-5" href="<?= base_url('/Auth/Login'); ?>">Iniciar sesión</a>
                <?php endif; ?>
            <a href="https://www.instagram.com/nike" target="_blank">
        <img src="assets/img/social_media/icons8-instagram-50.png" alt="Instagram Logo">
            </a>
        <a href="https://www.facebook.com/nike/" target="_blank">
            <img src="assets/img/social_media/icons8-facebook-50.png" alt="Facebook Logo">
            </a>
        <a href="https://www.twitter.com/nike/" target="_blank">
            <img src="assets/img/social_media/icons8-twitter-50.png" alt="Twitter Logo">
            </a>
        </div>



            <!-- Barra de búsqueda para futura implementación -->
            <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-buscar" type="submit">Buscar</button>
            </form> -->

        </div>
    </div>
</nav>