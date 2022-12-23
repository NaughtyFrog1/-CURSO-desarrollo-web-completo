<?php
  require_once '../includes/app.php';

  $titulo = '04 Métodos';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  class Producto {
      public function __construct(
      public $nombre,
      public $precio,
      public $estaDisponible
    ) {}

    public function mostrarProducto() {
      echo "El producto es '$this->nombre' y su valor es de $$this->precio;";
    }
  }

  $tablet  = new Producto('Tablet 10.1"', 30000, true);
  $celular = new Producto('Celular Samsung', 25000, true); 
?>

<ul>
  <li><?= $tablet->mostrarProducto() ?></li>
  <li><?= $celular->mostrarProducto() ?></li>
</ul>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
