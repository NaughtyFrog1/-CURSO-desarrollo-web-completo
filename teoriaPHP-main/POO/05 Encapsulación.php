<?php
  require_once '../includes/app.php';

  $titulo = '05 Encapsulasión';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  class Producto {
      public function __construct(
      protected $nombre,
      protected $precio,
      protected $estaDisponible
    ) {}

    public function mostrarProducto() {
      echo "El producto es '$this->nombre' y su valor es de $$this->precio;";
    }

    public function getNombre()  {
      return $this->nombre;
    }

    public function setNombre($nombre) {
      $this->nombre = $nombre;
    }
  }

  $tablet  = new Producto('Tablet 10.1"', 30000, true);
  $celular = new Producto('Celular Samsung', 25000, true); 

  $celular->setNombre('Celular Motorola');
?>

<ul>
  <li><?= $tablet->getNombre() ?></li>
  <li><?= $celular->getNombre() ?></li>
</ul>

<?php
  // Con var_dump se puede ver el alcance de los atributos
  var_dump($tablet);
?>


<?php include_once ROOT_ABS . 'includes/footer.php' ?>
