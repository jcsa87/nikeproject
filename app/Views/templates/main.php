<!-- filepath: c:\xampp\htdocs\nikeproyect\app\Views\templates\main.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/img/favicon2.ico'); ?>" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Nike Corrientes' ?></title>

    <!-- Bootstrap -->

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Sección para CSS personalizado por vista -->
    <?= $this->renderSection('styles') ?>

</head>
<body>
    <!-- Navbar -->
    <?php include(APPPATH . 'Views/components/navbar.php'); ?>

    <!-- Topbar reutilizable -->
    <?php include(APPPATH . 'Views/components/topbar.php'); ?>
    
    <!-- Contenido dinámico -->
    <div>
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Bootstrap JS -->
    <script href="assets/css/bootstrap.bundle.min.css" integrity="" crossorigin=""></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"> -->
</body>
</html>
