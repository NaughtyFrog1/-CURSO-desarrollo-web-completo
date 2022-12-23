<?php
  require_once '../includes/app.php';

  $titulo = '02 Variables';
  include_once ROOT_ABS . 'includes/header.php';
?>


<!-- VARIABLES -->

<?php 
  // Las variables empiezan por $
  // Por defecto PHP no distingue el tipo de dato que hay en una variable
  $nombre = 'Juan';
?>
<p><?=$nombre?></p>

<?php $nombre = 'Manuel' ?>
<p><?=$nombre?></p>


<hr>
<!-- CONSTANTES -->

<?php define('constante', 'valorConstante'); ?>
<p><?=constante?></p>

<?php
  // Esta es una forma menos común de crear constantes
  const constante2 = "otraConstante";
?>
<p><?=constante2?></p>


<hr>
<!-- VARIABLES EN STRING -->

<p>
  <?php 
    $nombre = 'Manuel';
    
    // Para mostrar la variable en un str se deben usar `"`
    echo "Mi nombre es $nombre <br>";
    echo "Mi nombre es {$nombre} <br>";
    echo "Mi nombre es ${nombre} <br>";
    echo "Mi nombre es " . $nombre . " <br>";
  ?>
</p>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
