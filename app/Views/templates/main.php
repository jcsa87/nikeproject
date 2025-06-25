<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/img/favicon2.ico'); ?>" type="image/x-icon">
    <title><?= $this->renderSection('title') ? $this->renderSection('title') : 'Nike Corrientes' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= base_url('assets/css/navbarstyle.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/footerstyle.css') ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <?= $this->renderSection('styles') ?>

</head>
<body>

    <?php include(APPPATH . 'Views/components/navbar.php'); ?>


    <div>
        <?= $this->renderSection('content') ?>
    </div>

    <?php include(APPPATH . 'Views/components/footer.php'); ?>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>