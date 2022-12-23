<?php
  require_once '../includes/app.php';

  $titulo = '08 Funciones';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  function suma($num1, $num2) 
  {
    return $num1 + $num2;
  }

  echo suma(2, 3);
  echo "<br>";
  echo "<br>";
?>

<?php
  // Establece valores predeterminados (Thom y Yorke)
  function defaultVal($nombre = "Thom", $apellido = "Yorke")
  {
    return $nombre . " " . $apellido;
  }

  echo defaultVal("Manuel", "Silenzi");
  echo "<br>";
  echo defaultVal("Manuel",);
  echo "<br>";
  echo "<br>";
?>

<?php
  $agenda = array();

  function guardarContacto($nombre = "Contact", $tel = "000 000-0000")
  {
    global $agenda; // Indica que tiene que acceder a una variable global
    $agenda[] = $nombre . " " . $tel;
  }
  function mostrarUsuario($index)
  {
    global $agenda;
    echo $agenda[$index];
  }

  guardarContacto("Manuel", "221 123-4567");
  echo "<pre>";
  echo var_dump($agenda);
  echo "</pre>";

  guardarContacto("Thom", "221 890-1234");
  echo "<pre>";
  echo var_dump($agenda);
  echo "</pre>";

  mostrarUsuario(0);
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
