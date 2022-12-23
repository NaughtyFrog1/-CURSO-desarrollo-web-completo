<?php
  require_once '../includes/app.php';

  $titulo = '13 MySQLi';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  //* Conectar a la base de datos
  $db = new mysqli('localhost', 'root', 'ManucoSQL!1', 'bienesraices');
  
  //* Preparar la base de datos para la consulta
  $query_str = "SELECT titulo FROM propiedades";
  $stmt = $db->prepare($query_str);

  //* Ejecutamos la consulta
  $stmt->execute();

  //* Creamos la variable
  // Asigna el resultado de la consulta en la variable pasada como argumento
  $stmt->bind_result($propiedadTitulo);

  //* Asignamos el resultado
  $stmt->fetch();

  var_dump($stmt);
  var_dump($propiedadTitulo);
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
