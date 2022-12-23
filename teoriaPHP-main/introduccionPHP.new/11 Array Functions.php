<?php
  require_once '../includes/app.php';

  $titulo = '11 Array Funsctions';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  $carrito = ['tablet', 'PC', 'TV'];

  // Contar los elementos de un array
  echo count($carrito) . '<br>';
  
  // Nos dice si un elemento existe en el array
  var_dump(in_array('tablet', $carrito));
  
  
  // Ordenar arreglo
  $numeros = [1, 4, 2, 5, 3];
  
  // De menor a mayor
  sort($numeros); 
  echo '<pre>';
  print_r($numeros);
  echo'</pre>';
  
  // De mayor a menor
  rsort($numeros); 
  echo '<pre>';
  print_r($numeros);
  echo '</pre>';
  echo '<hr>';
  
  
  // Ordenar arreglo asociativo
  $cliente = [
    'saldo' => 200,
    'tipo' => 'Premium',
    'nombre' => 'Juan'
  ];
  
  // asort() ordena por valores, primero numeros y después strings
  // arsort() ordena de 'mayor' a 'menor'
  asort($cliente); 
  echo '<pre>';
  print_r($cliente);
  echo'</pre>';
  
  // ksort() ordena por valores de la llave
  // krsort() invierte los valores en los que ordena
  ksort($cliente); 
  echo '<pre>';
  print_r($cliente);
  echo'</pre>';
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
