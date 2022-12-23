<?php
  require_once '../includes/app.php';

  $titulo = '04 Sentencia Switch';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  $lenguaje = "JavaScript";

  echo $lenguaje . ": ";

  switch ($lenguaje) {
    case 'PHP':
      echo "Mierda";
      break;
    case 'JavaScript':
      echo "True Pain";
      break;

    default:
      echo "Esa wea no existe";
      break;
  }
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
