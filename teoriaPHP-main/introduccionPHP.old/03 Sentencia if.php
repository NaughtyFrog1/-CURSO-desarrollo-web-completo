<?php
  require_once '../includes/app.php';

  $titulo = '03 Sentencia if';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  $num1 = 1;
  $num2 = 2;

  if ($num1 < $num2) {
    echo "${num1} es menor a ${num2}";
  } else if ($num1 > $num2) {
    echo "${num1} es mayor a ${num2}";
  } else {
    echo "${num1} es igual a ${num2}";
  }
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
