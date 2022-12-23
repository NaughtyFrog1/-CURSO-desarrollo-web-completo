<?php
  require_once '../includes/app.php';

  $titulo = '11 Autoload y Namespaces';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php 
	// Creamos una función que recibe como argumento el nombre de la clase y
  // dentro de ella ejecutamos un requiere_once con la ubicación de la clase
  function miAutoload($clase) {
    $parts = explode('\\', $clase);
    require_once  __DIR__ . "/Clases/" . end($parts) . ".php";
  }

  // Pasamos como string el nombre de la función que queremos llamar cuando
  // agregamos una clase. Esta función ejecutará la función pasada como
  // argumento y le pondrá como argumento en nombre de la clase.
  spl_autoload_register('miAutoload');


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
