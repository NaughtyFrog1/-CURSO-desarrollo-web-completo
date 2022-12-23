<?php
  require_once '../includes/app.php';

  $titulo = '09 Arrays Asociativos';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  // Crear array asocoativo 
  $cliente = [
    'nombre' => 'Juan',
    'saldo' => 200,
    'informacion' => [
      'tipo' => 'premium'
    ] 
  ];

  var_dump($cliente);

  echo $cliente['informacion']['tipo'];

  // Agregar una nueva propidad
  $cliente['codigo'] = 16513221;

  // Reescribir un valor
  $cliente['nombre'] = 'Pablo';

  var_dump($cliente);
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
