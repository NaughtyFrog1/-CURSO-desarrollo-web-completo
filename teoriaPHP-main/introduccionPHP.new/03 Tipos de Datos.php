<?php
  require_once '../includes/app.php';

  $titulo = '03 Tipos de datos';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  // Por defecto PHP es de tipado dinámico. Se puede habilitar el tipado estricto
  // colocando `declare(strict_types = 1)` en la primera línea del archivo

  // Boolean
  $bool = true;
  var_dump($bool);

  // Int
  $int = 4;
  var_dump($int);

  //Float
  $float = 3.14;
  var_dump($float);

  //String
  $str = "String";
  var_dump($str);
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
