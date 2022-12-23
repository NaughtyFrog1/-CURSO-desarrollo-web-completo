<?php
  require_once '../includes/app.php';

  $titulo = '02 Operadores';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  $num1 = 1;
  $num2 = 2;
  $num3 = 3;
  $num4 = 4;


  // Concatenar strings con operaciones
  echo "${num1} + ${num2} = " . ($num1 + $num2) . "<br>";
  echo "${num4} - ${num3} = " . ($num4 - $num3) . "<br>";
  echo "${num2} * ${num4} = " . ($num2 * $num4) . "<br>";
  echo "${num4} / ${num2} = " . ($num4 / $num2) . "<br>";
  echo "${num3} % ${num2} = " . ($num3 % $num2) . "<br>"; // Resto de division
  echo "<br>";
  // Se pueden hacer operaciones de varios terminos
  echo "(${num1} + ${num3}) * ${num2} = " . (($num1 + $num3) * $num2) . "<br>";



  echo "<h2>Incrementos y decrementos</h2>";

  echo "num1++ = " . $num1++ . "<br>"; // Muestra el valor y luego incrementa
  echo "num1 =  ${num1} <br>";
  echo "<br>";

  $num1 = 1;  // Reset

  echo "++num1 = " . ++$num1 . "<br>"; // Incrementa el valor y luego lo muestra
  echo "num1 =  ${num1} <br>";
  echo "<br>";
  // Lo mismo ocurre con los decrementos

  $num1 = 1;
  echo "num1+= 10: " . ($num1 += 10) . "<br>";
  $num1 = 1;
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
