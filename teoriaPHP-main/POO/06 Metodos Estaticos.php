<?php
  require_once '../includes/app.php';

  $titulo = '06 Métodos estáticos';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  class Producto {
    protected static $imagen = 'img.jpg';

    public function __construct(
      protected $nombre,
      protected $precio,
      protected $estaDisponible,
      protected $img = 'placeholder'
    ) {}

    public static function obtenerImg() {
      echo "Obteniendo imagen " . self::$imagen ;
    }

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
  $celular = new Producto('Celular Samsung', 25000, true, 'douu'); 

  var_dump($tablet);
  var_dump($celular);

  Producto::obtenerImg();
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
