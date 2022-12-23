<?php 
  include_once 'inc/functions/funciones.php';
  include_once 'inc/layout/header.php';

  $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

  if (!$id) {
    die('No es valido');
  }

  $resultado = obtenerContacto($id);
  $contacto = $resultado->fetch_assoc();
?>

<div class="container-barra sombra-s">
  <div class="editar-barra container">
    <a href="index.php" class="btn btn-volver sombra-s rounded-s">Volver</a>
    <h1>Editar Contacto</h1>
  </div>
</div>

<section class="jumbotron bg-amarillo container sombra rounded">
  <form action="#" id="contacto">
    <legend>Edite el contacto</legend>

    <?php include_once 'inc/layout/formulario.php' ?>

  </form>
</section>

<?php include_once 'inc/layout/footer.php' ?>
