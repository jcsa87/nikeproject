<!-- filepath: c:\xampp\htdocs\nikeproyect\app\Views\templates\main.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="<?= base_url('assets/img/favicon.ico'); ?>" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Nike Corrientes' ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Sección para CSS personalizado por vista -->
    <?= $this->renderSection('styles') ?>

</head>
<body>
    <!-- Navbar -->
    <?php include(APPPATH . 'Views/components/navbar.php'); ?>

    <!-- Contenido dinámico -->
    <div style="">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
