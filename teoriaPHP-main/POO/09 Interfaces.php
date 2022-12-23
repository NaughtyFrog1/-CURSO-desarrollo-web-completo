<?php
  require_once '../includes/app.php';

  $titulo = '09 Interfaces';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  interface TransporteInterface {
    public function getInfo(): string;
    public function getRuedas(): int;
  }

  abstract class Transporte9 implements TransporteInterface {
    public function __construct(
      protected int $ruedas,
      protected int $capacidad
    ) {}
    
    public function getInfo(): string {
      return "El transporte tiene $this->ruedas ruedas y $this->capacidad asientos";
    }
  }
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
