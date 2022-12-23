<?php
  require_once '../includes/app.php';
  require_once ROOT_ABS . 'vendor/autoload.php';

  $titulo = '12 Autoload Composer';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php 
  class Clientes {
    public function __construct() {
      echo "Desde main.php";
    }
  }

  $detalles = new App\Detalles();
  echo '<br>';
  $cliente1 = new App\Clientes();
  echo '<br>';
  $cliente2 = new Clientes();
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
