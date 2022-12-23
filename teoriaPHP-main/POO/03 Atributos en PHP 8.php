<?php
  require_once '../includes/app.php';

  $titulo = '03 Atributos en PHP 8';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  class Producto {
    public function __construct(
      public $nombre,
      public $precio,
      public $estaDisponible
    ) {}
  }


  //* Instanciar la clase

  $tablet  = new Producto('Tablet 10.1"', 30000, true);
  $celular = new Producto('Celular Samsung', 25000, true); 


  var_dump($tablet);
  var_dump($celular);
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
