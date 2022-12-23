<?php
  require_once '../includes/app.php';

  $titulo = '09 $_GET';
  include_once ROOT_ABS . 'includes/header.php';
?>

<h2>Tienda en linea - Producto</h2>
<a href="09.1 GET.php">Volver a la pag principal</a>

<pre>
    <?php var_dump($_GET) ?>
</pre>

<p>Se puede ver la informacion enviada desde la otra pagina</p>
<p>ID: <?php echo htmlspecialchars($_GET["id"]) ?></p>
<p>Nombre: <?php echo htmlspecialchars($_GET["nombre"]) ?></p>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
