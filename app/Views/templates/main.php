<!-- filepath: c:\xampp\htdocs\nikeproyect\app\Views\templates\main.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/img/favicon2.ico'); ?>" type="image/x-icon">
    <title><?= isset($pageTitle) ? $pageTitle : 'Nike Corrientes' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Nike Corrientes' ?></title>

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


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

    <!-- Footer reutilizable -->
    <?php include(APPPATH . 'Views/components/footer.php'); ?>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>