<?php
  require_once '../includes/app.php';

  $titulo = '10 $_POST y $_GET';
  include_once ROOT_ABS . 'includes/header.php';
?>

<p>Nombre: <?php echo $_POST["nombre"] ?></p>
<!-- Lo que determina el key del array es el parametro name="..." -->
<p>Apellido: <?php echo $_POST["apellido"] ?></p>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
