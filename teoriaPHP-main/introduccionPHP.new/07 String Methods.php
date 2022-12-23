<?php
  require_once '../includes/app.php';

  $titulo = '07 String Methods';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  $nombre = 'Manuel Silenzi';

  // Conocer largo de una cadena (cuenta los espacios)
  echo strlen($nombre) . "<br>";
  
  // Eliminar espacios en blanco al principio y al final
  // trim no modifica el valor de la variable, solo retorna la variable modificada
  $txt = '   Hola        Mundo     ';
  $trim = trim($txt);
  echo "<pre> {$trim} </pre> <br>"; 
  echo "<pre> {$txt} </pre> <br>";
  
  echo strtoupper($nombre) . " - ";  // a mayúsculas
  echo strtolower($nombre) . "<br>";  // a minúsculas
  
  // Reemplazar texto
  echo str_replace('Manuel', 'Manu', $nombre) . "<br>";  // No modifica variable
  
  // Devuelve la posición donde se encuentra la coincidencia
  echo strpos($nombre, 'Silenzi') . "<br>";
  
  
  // CONCATENAR STRINGS - TEMPLATE STRINGS
  // Se concatena con un `.` 
  // Para los template strings la variable puede ir dentro de llaves 
  // `"{$variable} o ${variable} o $variable"`, y se debe usar `"` 
  // aunque no es un template strings como tal
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
