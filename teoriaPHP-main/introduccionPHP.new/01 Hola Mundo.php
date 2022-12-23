<?php
  require_once '../includes/app.php';

  $titulo = '01 Hola Mundo';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php 
  echo "<p>Hola Mundo</p>";
  echo("<p>Hola Mundo()</p>");

  print "<p>Hola Mundo</p>";
  print("<p>Hola Mundo()</p>");

  print_r('Hola');
  var_dump('Hola Mundo');
?>

<p>El nombre es <?=$titulo?>, el primer ejercicio</p>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
