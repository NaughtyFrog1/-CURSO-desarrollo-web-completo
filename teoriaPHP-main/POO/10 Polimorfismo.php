<?php
  require_once '../includes/app.php';

  $titulo = '10 Polimorfismo';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  interface TransporteInterface {
    public function getInfo(): string;
    public function getRuedas(): int;
  }

  abstract class Transporte10 implements TransporteInterface {
    public function __construct(
      protected int $ruedas,
      protected int $capacidad
    ) {}
    
    public function getInfo(): string {
      return "El transporte tiene $this->ruedas ruedas y $this->capacidad asientos";
    }

    public function getRuedas(): int {
      return $this->ruedas;
    }
  }

  class Automovil10 extends Transporte10 implements TransporteInterface {
    // El constructor varia su comportamiento según la clase a la que pertenece
    // el objeto. Esto es un ejemplo básico de polimorfismo
    public function __construct(
      protected int $ruedas,
      protected int $capacidad,
      protected string $color
    ) {}

    public function getInfo(): string {
      return "El auto tiene $this->ruedas ruedas y $this->capacidad asientos";
    }
  }

  class Bicicleta10 extends Transporte10 implements TransporteInterface {
    public function getInfo(): string {
      return "La bicicleta tiene $this->ruedas ruedas y $this->capacidad asientos";
    }
  }


  //* Ejemplo del uso del polimorfismo.
  // La función verInfo() llama al método getInfo() del objeto pasado como 
  // argumento y según que tipo sea este  objeto, la función responderá de una
  // u otra forma.
  function verInfo($vehiculo) {
    echo $vehiculo->getInfo();
  }

  $auto = new Automovil10(4, 5, 'gris');
  $bici = new Bicicleta10(2, 1);
?>


<p><?= verInfo($auto) ?></p>
<p><?= verInfo($bici) ?></p>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
