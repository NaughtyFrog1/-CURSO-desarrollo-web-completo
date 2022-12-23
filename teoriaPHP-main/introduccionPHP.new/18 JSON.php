<?php
  require_once '../includes/app.php';

  $titulo = '18 JSON';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  $productos = [
    [
      'nombre' => 'Tablet', 
      'precio' => 200,
      'disponible' => true
    ],
    [
      'nombre' => 'Television', 
      'precio' => 400,
      'disponible' => true
    ],
    [
      'nombre' => 'Monitor', 
      'precio' => 300,
      'disponible' => false
    ],
  ];
  
  // `json_encode()` toma un arreglo asociativo y lo convierte en un string.
  // Pasamos la variable a convertir a JSON y la forma en la que lo convierte.
  // En este caso lo pasa con formato unicode para poder usar acentos, etc.
  $json = json_encode($productos, JSON_UNESCAPED_UNICODE);
  
  echo '<pre>';
  var_dump($productos);
  echo '</pre>';
  
  echo '<pre>';
  var_dump($json);
  echo '</pre>';
  
  // `json_decode()` hace el proceso inverso. Convierte un string con formato JSON
  // a un array asociativo.
  $array_json = json_decode($json);
  echo '<pre>';
  var_dump($array_json);
  echo '</pre>';
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
