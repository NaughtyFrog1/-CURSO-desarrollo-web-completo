<?php
  require_once '../includes/app.php';

  $titulo = '10 isset() empty()';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  $clientes = [];
  $clientes2 = ['Juan', 'Pablo'];
  
  $cliente = [
    'nombre' => 'Juan',
    'saldo' => 200,
    'informacion' => [] 
  ];
  
  var_dump(empty($clientes));
  var_dump(empty($clientes2));
  var_dump(empty($cliente['informacion']));
  echo '<hr>';
  
  var_dump(isset($clientes3));
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
