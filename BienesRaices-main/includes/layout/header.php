<?php 
  if (!isset($_SESSION)) {
    session_start();
  }

  // Con `A ?? B` evalua A y si es null retorna B, caso contrario retorna A
  $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta 
    name="description" 
    content="BienesRaices es un sitio de venta de casas y departamentos exclusivos de lujo"
  >
  <title><?= $site_title ?></title>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link 
    href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@300;400;700;900&display=swap" 
    rel="stylesheet"
  >
  <script
    src="https://kit.fontawesome.com/a004f94d5a.js" 
    crossorigin="anonymous"
  ></script>
  <link rel="stylesheet" href="/BienesRaices/build/css/main.min.css">
</head>
<body id="<?= $site_id ?>">
  <nav
    <?php
      if ($site_id == 'index') {
        echo 'class="site__navbar site__navbar--transparent"';
      } else {
        echo 'class="site__navbar"';
      }
    ?>
    id="site__navbar"
  >
    <div class="navbar__content container container--lg">
      <a href="/BienesRaices/index.php" class="navbar__logo">
        <span class="logo__bienes">Bienes</span><span class="logo__raices">Raices</span>
      </a>
      <button class="navbar__burger" id="navbar__burger">
        <span class="burger--1"></span>
        <span class="burger--2"></span>
        <span class="burger--3"></span>
      </button>
      <div class="navbar__overlay" id="navbar__overlay"></div>
      <div class="navbar__collapse">
        <a href="index.php" class="navbar__logo">
          <span class="logo__bienes">Bienes</span><span class="logo__raices">Raices</span>
        </a>
        <ul class="navbar__links">
          <li class="navbar__item">
            <a href="/BienesRaices/nosotros.php" class="navbar__link">Nosotros</a>
          </li>
          <li class="navbar__item">
            <a href="/BienesRaices/anuncios.php" class="navbar__link">Anuncios</a>
          </li>
          <li class="navbar__item">
            <a href="/BienesRaices/blog.php" class="navbar__link">Blog</a>
          </li>
          <li class="navbar__item">
            <a href="/BienesRaices/contacto.php" class="navbar__link">Contacto</a>
          </li>
          <?php if ($auth) { ?>
            <li class="navbar__item" title="Cerrar Sesión">
              <a 
                class="navbar__link navbar__link--session" 
                href="/BienesRaices/cerrar-sesion.php?url=<?= $_SERVER['PHP_SELF']?>" 
              >
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>