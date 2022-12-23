<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>GDLWebCamp</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <script src="https://kit.fontawesome.com/a004f94d5a.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald:400,700|PT+Sans:400,700&display=swap" rel="stylesheet">
  <link rel=" stylesheet" href="css/normalize.css">

  <?php
    // Retorna el nombre del archivo actual
    $archivo = basename($_SERVER['PHP_SELF']);
    // Eliminal el .php del nombre del archivo
    $pagina = str_replace('.php', '', $archivo);
  ?>

  <?php
  foreach ($styles as $style_path) {
    echo "<link rel=\"stylesheet\" href=$style_path>";
  }
  ?>

  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/style.min.css?v=<?php echo time() ?>">


  <meta name="theme-color" content="#fafafa">
</head>

<body <?php echo "id=$pagina" ?> >
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <header class="site-header">
    <div class="container">

      <div class="header-info">
        <nav class="redes-sociales">
          <a href="https://www.facebook.com" target="_blank">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="https://www.instagram.com" target="_blank">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="https://www.twitter.com" target="_blank">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="https://www.pinterest.com" target="_blank">
            <i class="fab fa-pinterest-p"></i>
          </a>
          <a href="https://www.youtube.com" target="_blank">
            <i class="fab fa-youtube"></i>
          </a>
        </nav>
        <span class="fecha">
          <i class="far fa-calendar"></i>
          <p>20-25 Dic</p>
        </span>
        <span class="lugar">
          <p>La Plata, ARG</p>
          <i class="fas fa-map-marker-alt"></i>
        </span>
      </div>
      <div class="header-title">
        <h1 class="header-h1">
          <span>gdl</span>
          <span>web</span>
          <span>camp</span>
        </h1>
        <p class="slogan">diseño<span>web</span></p>
      </div>
      <a href="#site-navbar" class="header-arrow">
        <i class="fas fa-chevron-circle-down"></i>
      </a>
    </div>
  </header>

  <nav id="site-navbar">
    <div class="container">
      <header class="nav-header">
        <div class="nav-logo">
          <a href="index.php">gdlwebcamp</a>
        </div>
        <div class="nav-burger">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </header>
      <ul class="nav-links">
        <li><a href="conferencias.php">Conferencias</a></li>
        <li><a href="calendario.php">Calendario</a></li>
        <li><a href="invitados.php">Invitados</a></li>
        <li><a href="registro.php">Reservaciones</a></li>
      </ul>
    </div>
  </nav>