<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nike</title>
    <?php $base_url = "http://localhost/nikeproyect"; ?>
    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet" integrity=" " crossorigin="">
    <link href="../assets/css/styles.css" rel="stylesheet">
    <!-- Ejemplo de estilo interno. -->
    <!-- <style>
    p {color:red;}
    </style> -->
</head>

<body>
  <section>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</section>
    
    <div class="titulo">
        <h1>Taller de Programación I</h1>
    </div>

    <div>
        <h2 style="color:green">Ejemplo de div y span.</h2>
        <p class="parrafoModificado">Esto es un párrafo dentro de un div,
            <span style="color:red;"> y esto es un span dentro de un párrafo.</span>
        </p>
        <p class="parrafo">Este es otro párrafo dentro de la misma división.</p>
    </div>
    <nav class="menu">
        <ul>
            <li><a href="https://www.google.com">Inicio</a></li>
            <li><a href="https://www.yahoo.com">Sobre nosotros</a></li>
            <li><a href="https://www.exa.unne.edu.ar">Contacto</a></li>
        </ul>

        <img src="" alt="">
    </nav>
    <script src="<?php echo $base_url; ?>/assets/js/bootstrap.bundle.min.js" integrity="" crossorigin="">
    </script>
    <link href="<?php echo $base_url; ?>/assets/css/styles.css?v=<?php echo time(); ?>" rel="stylesheet">

    
  <section>
    <h1 class="display-1 text-center">Carousel de imágenes</h1>
    <div class="containerCarousel">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../assets/img/1080p-3qmj7oaige168170.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../assets/img/minimalism-4k-for-mac-desktop-wallpaper-preview.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../assets/img/ultra-hd-wazf67lzyh5q7k32.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
</section>

  <section>
    <div class="containerParrafo m-5 p-5">
          <p class="text-start fs-1 fw-bold fst-italic"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est similique molestiae doloribus? Dolorem iusto dignissimos adipisci fugiat ipsam excepturi veniam impedit sit omnis et, accusamus rerum neque voluptas deserunt modi!
          <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est similique molestiae doloribus? Dolorem iusto dignissimos adipisci fugiat ipsam excepturi veniam impedit sit omnis et, accusamus rerum neque voluptas deserunt modi!
          <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est similique molestiae doloribus? Dolorem iusto dignissimos adipisci fugiat ipsam excepturi veniam impedit sit omnis et, accusamus rerum neque voluptas deserunt modi!
          <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est similique molestiae doloribus? Dolorem iusto dignissimos adipisci fugiat ipsam excepturi veniam impedit sit omnis et, accusamus rerum neque voluptas deserunt modi!
  </div>
  </section>


  <footer class="d-flex justify-content-between align-items-center p-3">
    <h1 class="text-lowercase fst-italic ">
      Footer
</h1>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus iure cum eligendi at est ea necessitatibus porro. Nemo delectus animi facilis deserunt suscipit in, sequi corrupti laborum necessitatibus saepe fugiat.
</p>

  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Red-Dead-Redemption-Logo.svg/2560px-Red-Dead-Redemption-Logo.svg.png" alt="Logo" class="img-fluid" style="width: 150px;">
  </footer>
</body> 



</html>