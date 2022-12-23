<?php
  declare(strict_types = 1);
  require_once 'includes/functions/funciones.php';

  incluirHeader('Anuncios - Bienes Raices');
?>

<main class="venta section container container--lg">
  <h2>Casas y departamentos en venta</h2>

  <?php
    include 'includes/layout/anuncios.php'
  ?>
</main>
 
<?php incluirTemplate('footer') ?>
