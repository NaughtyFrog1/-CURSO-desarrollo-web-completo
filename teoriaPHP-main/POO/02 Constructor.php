<?php
  declare(strict_types = 1);
  require_once '../includes/app.php';

  $titulo = '02 Constructor';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  class Producto {
    //* Atributos/Propiedades
    public $nombre;
    public $precio;
    public $estaDisponible;

    public function __construct($nombre, $precio, $estaDisponible) {
      $this->nombre = $nombre;
      $this->precio = $precio;
      $this->estaDisponible = $estaDisponible;
    }
  }

  class Strict {
    public string $str;
    public int $number;
    public bool $boolean;

    public function __construct(string $str, int $number, bool $boolean) {
      $this->str = $str;
      $this->number = $number;
      $this->boolean = $boolean;
    }
  }


  //* Instanciar la clase

  $tablet  = new Producto('Tablet 10.1"', 30000, true);
  $celular = new Producto('Celular Samsung', 25000, true); 


  var_dump($tablet);
  var_dump($celular);
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
