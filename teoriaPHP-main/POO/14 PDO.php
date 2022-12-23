<?php
  require_once '../includes/app.php';

  $titulo = '14 PDO';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  // PDO('tipo_db:host=localhost; dbname=nombreDB', user, passwd )
  $db = new PDO(
    'mysql:host=localhost; dbname=bienesraices', 'root', 'ManucoSQL!1'
  );

  $query_str = 'SELECT * FROM propiedades';
  $stmt = $db->prepare($query_str);
  $stmt->execute();
  // Elegimos la forma en la que se trae los datos
  $propiedades = $stmt->fetch(PDO::FETCH_ASSOC);

  var_dump($propiedades);
?>
<hr>

<ul>
  <?php
      echo '<li>' . $propiedades['titulo'] . '</li>';
      echo '<li>' . $propiedades['precio'] . '</li>';
  ?>
</ul>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
