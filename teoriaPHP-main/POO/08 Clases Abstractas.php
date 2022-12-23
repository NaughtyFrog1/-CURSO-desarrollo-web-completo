<?php
  require_once '../includes/app.php';

  $titulo = '08 Clases Abstractas';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  //* Clase base

  abstract class Transporte {
    public function __construct(
      protected int $ruedas,
      protected int $capacidad
    ) {}
    
    public function getInfo(): string {
      return "El transporte tiene $this->ruedas ruedas y $this->capacidad asientos";
    }
  }
  

  //* Clases derivadas

  class Bicicleta extends Transporte {
    // Redefinir un método
    public function getInfo(): string {
      return "La bicicleta tiene $this->ruedas ruedas y $this->capacidad asientos";
    }
  }

  class Auto extends Transporte {
    public function __construct(
      protected int $ruedas,
      protected int $capacidad,
      protected string $transmision
    ) {}
    
    // Crear un método nuevo
    public function getTransmision(): string {
      return $this->transmision;
    }
  }
  

  $bicicleta = new Bicicleta(2, 1);
  $auto = new Auto(4, 5, 'manual');
  echo $bicicleta->getInfo();
  echo '<br>';
  echo $auto->getInfo();
  echo $auto->getTransmision();
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
