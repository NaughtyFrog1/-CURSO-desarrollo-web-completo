<?php
  require_once '../includes/app.php';

  $titulo = '01 Crear Clases';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  class Productos {
    //* Atributos/Propiedades
    public $nombre;
    public $precio;
    public $estaDisponible;
  }


  //* Instanciar la clase

  $tablet  = new Productos();
  $celular = new Productos(); 


  //* Acceder a los métodos y propiedades

  $tablet->nombre = 'Tablet 10"';
  $tablet->precio = 30000;
  $tablet->estaDisponible = true;

  $celular->nombre = 'Celular Samsung';
  $celular->precio = 25000;
  $celular->estaDisponible = true;


  var_dump($tablet);
  var_dump($celular);
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
