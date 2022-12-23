<?php
  require_once '../includes/app.php';

  $titulo = '14 foreach()';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  $clientes = ['Juan', 'Pablo', 'Karen'];

  $clienteDatos = [
    'nombre' => 'Juan',
    'saldo' => 200,
    'tipo' => 'premium'  
  ];
  
  foreach ($clientes as $cliente) {
    echo $cliente . '<br>';
  }
  
  foreach ($clienteDatos as $dato => $value) {
    echo "{$dato}: {$value} <br>";
  }
  
  // Si iteramos con un foreach sobre un array asociativo sin crear una variable
  // para las keys, entonces solo iterará sobre los valores
  
  echo "<hr>";
  
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
?>

<ul> 
<?php foreach ($productos as $producto) { ?>
  <li> 
    <p>Producto: <?=$producto['nombre']?></p>
    <p>Precio: $<?=$producto['precio'] ?></p>
    <p><?= $producto['disponible'] ? 'Disponible' : 'No disponible' ?>
    </p>
    <br>
  </li>
<?php } ?> 
</ul>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
