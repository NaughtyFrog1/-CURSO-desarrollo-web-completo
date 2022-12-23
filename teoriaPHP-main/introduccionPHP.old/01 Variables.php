<?php
  require_once '../includes/app.php';

  $titulo = '01 Variables';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  // Las variables empiezan con $
  // PHP no distingue el tipo de dato que hay en la variable
  $nombre = "Manuel";

  // CONCATENAR VARIABLES
  echo "Hola {$nombre} <br>";
  echo "Hola $nombre <br>";
  echo "Hola ${nombre} <br>";
  echo "Hola" . " " . $nombre . " " . "<br>";

  // Las variables puden ser redeclaradas
  $nombre = "Juan";
  echo "Hola {$nombre} <br>";

  // PHP diferencia las comillas simples de las dobles
  //  prestar atencion a eso
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
