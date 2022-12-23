<?php
  require_once '../includes/app.php';

  $titulo = '08 Arrays';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  // Crear arrays
  $array1 = [];
  $array2 = array();

  $carrito = array('Tablet', 'TV', 'Computadora');


  // Añadir elemento al final
  array_push($carrito, 'Auriculares');

  // Añadir elemento al principio
  array_unshift($carrito, 'Celular');


  echo '<pre>';
  var_dump($carrito);
  echo'</pre>';
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
