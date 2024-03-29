<?php
//Arrancamos la sesión
session_start();
$_SESSION['user'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bienvenido</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Vendor -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- CSS  -->
  <link href="assets/css/landing_page.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Top  ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center"> 
      </div>
      <div class="social-links d-none d-md-block"> 
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="menu.php"> Bienvenido/a:   <?php echo $_SESSION['user']; ?> </a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="menu.html">Pagina principal</a></li>
          <li><a class="nav-link scrollto" href="memory_game/memory_game.php">Memorizando</a></li>
          <li><a class="nav-link scrollto" href="camino.php">Camino Sin fin</a></li>
        
      </nav>  
      
    <a href="logout.php">
          <button type="button" class="btn btn-outline-danger btn-lg btn3d"><span ></span> Cerrar sesión</button>
    </a>
       
    </div> 

  </header><!-- End Header -->
 
  <!-- ======= Hero ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
        
      <h1>Juegos disponibles:</h1>
      <h2>Presione uno de los botones para elegir un juego</h2>
      
      <a href="memory_game/memory_game.php" class="btn-get-started scrollto">Memorizando</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      <a href="camino.php" class="btn-get-started scrollto">Camino sin fin</a>
    </div>
  </section><!--  Hero -->

  <!-- JS  -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!--  Main JS File -->
  <script src="assets/js/landing_page.js"></script>

</body>

</html>