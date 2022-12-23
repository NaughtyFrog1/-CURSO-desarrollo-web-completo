<?php
  require_once '../includes/app.php';

  $titulo = '06 Arrays con foreach';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  $frontend = ['CSS', 'HTML', 'JavaScript', 'jQuery'];

  $personas = array(
    'nombre' => 'Manuel',
    'pais'   => 'Argentina',
    'ciudad' => 'La Plata'
  );

  $datos = array(
    'personales' => array(
      'nombre' => 'Manuel',
      'Apellido' => 'Silenzi',
      'profesion' => 'Desarrollador Web'
    ),
    'lenguajes' => array(
      'front_end' => array('css', 'html5', 'javascript', 'jquery'),
      'back_end' => array('php', 'mysql', 'python')
    )
  );
?>

<h2>Unidimensionaales</h2>
<h3>Array Indexado</h3>
<ul>
  <?php foreach ($frontend as $tecnologia) : ?>
    <li><?php echo $tecnologia ?></li>
  <?php endforeach ?>
</ul>
<br>
<h3>Array Asociativo</h3>
<ul>
  <?php foreach ($personas as $key => $value) : ?>
    <li><?php echo $key . ": " . $value ?></li>
  <?php endforeach ?>
</ul>


<h2>Array Multidimensional</h2>
<ul>
  <!-- Llamando directamente al array que se quiere recorrer -->
  <?php foreach ($datos['personales'] as $keyDatos => $valDatos) : ?>
    <li><?php echo $keyDatos . ": " . $valDatos ?></li>
  <?php endforeach ?>
</ul>
<br>
<ul>
  <?php foreach ($datos as $leng) {
    if (array_key_exists('front_end', $leng)) {
      echo "<h3>Frontend</h3>";
      //      array_key_exists(key, donde_buscar)
      foreach ($leng['front_end'] as $valLeng) {
        echo "<li> ${valLeng} </li>";
      }
      echo "<br>";
    }
    if (array_key_exists('back_end', $leng)) {
      echo "<h3>Backend</h3>";
      foreach ($leng['back_end'] as $valLeng) {
        echo "<li> ${valLeng} </li>";
      }
    }
  } ?>
</ul>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
