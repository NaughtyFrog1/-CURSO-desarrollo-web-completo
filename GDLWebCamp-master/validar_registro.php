<?php if(isset($_POST['submit'])) { // isset revisa que la variable exista
  include_once 'includes/funciones/funciones.php';

  $nombre   = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email    = $_POST['email'];
  $regalo   = $_POST['regalo'];
  $total    = $_POST['total_pedido'];
  $fecha    = date('Y-m-d H:i:s');

  // Pedidos
  $boletos   = $_POST['boletos'];
  $camisas   = $_POST['pedido_camisas'];
  $etiquetas = $_POST['pedido_etiquetas'];
  $pedido    = productos_json($boletos, $camisas, $etiquetas);

  // Eventos
  $eventos  = $_POST['registro'];
  $registro = eventos_json($eventos);


  try {
    //* 1. Creamos la conexión
    require_once('includes/funciones/db_connection.php');

    //* 2. Preparamos la consulta
    // stmt = statement. Con prepare() se previenen las SQL injection
    $stmt  = $conn->prepare(
      "INSERT INTO registrados (nombre_registrado, apellido_registrado, " .
      "email_registrado, fecha_registro, pases_articulos, " .
      "talleres_registrados, regalo, total_pagado) " . 
      "VALUES (?,?,?,?,?,?,?,?)"
    );

    //* 3. Indicamos que datos pasar
    $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, 
                      $pedido, $registro, $regalo, $total);

    //* 4. Ejecutamos la consulta
    $stmt->execute();

    //* 5. Cerramos el statement y la conexión
    $stmt->close();
    $conn->close();

    // Redirigimos la página a otro sitio para evitar el reenvio del formulario
    header('Location: validar_registro.php?success=1');
  } catch (\Exception $e) {
    echo $e -> getMessage();
  }
} ?>

<?php 
  $styles = array();
  $scripts = array(); 

  include_once 'includes/templates/header.php';
?>

<section class="seccion container">
  <h2>Resumen de compra</h2>
  <?php 
    if(isset($_GET["success"])) {
      if ($_GET["success"] == "1") {
        echo '<p class="success">Registro exitoso!</p>';
      } else {
        echo '<p class="success">Ocurrió un error en el registro!</p>';
      }
    } else {
      echo '<p class="success">Ocurrió un error en el registro!</p>';
    }
  ?>
  

</section>

<?php include_once 'includes/templates/footer.php'?>

<!-- MySQLi y PDO

  MySQLi y PDO son APIs (interfaz programación de aplicaciones) de PHP para DB
  (MySQL esta obsoleta)

    - MySQLi: usamos MySQL como base de datos
    - PDO: Es una capa de abstracción de base de datos para aplicaciones PHP,
      nos permite conectarnos a distintos sistemas gestores de bases de datos
      MySQL sin necesitar realizar grandes cambios, su principal desventaja
      es que no nos permite usar las funciones más avanzadas de MySQL, por lo
      que si no se tiene planeado hacer un cambio de gestor de bases de datos
      es recomendable usar MySQLi
-->

<!-- Prepared statements

  Solo estan dispinibles si usa código MySQLi o PDO.
  Ayudan a prevenir SQL injections y permiten realizar querys de forma
  optimizada, por lo que son más rápidos.
-->
