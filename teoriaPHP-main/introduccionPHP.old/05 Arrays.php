<?php
  require_once '../includes/app.php';

  $titulo = '05 Arrays';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  // ARRAY INDEXADO
  // forma de declaracion antigua
  $frontend = ['CSS', 'HTML', 'JavaScript', 'jQuery'];
  //              0       1       2             3
  echo $frontend[0] . "<br>";

  // forma declaracion actual
  $backend = array('C++', 'Python', 'Java', 'MySQL');
  echo $backend[1];
?>


<!-- ----------------------------------------------------- -->
<h2>print_r y var_dump</h2>

<h3>print_r(arr)</h3>
<?php print_r($frontend) ?>
<pre><?php print_r($frontend) ?></pre>

<h3>var_dump(arr)</h3>
<?php var_dump($backend) ?>
<pre><?php var_dump($backend) ?></pre>



<!-- ----------------------------------------------------- -->
<h2>Añadir elementos a un array</h2>

<?php
  // Dos formas
  $backend[]  = "PHP";        // Forma mas comun
  $backend[5] = "Node JS";    // Forma antigua
  /* El problema de la ultima forma es que si se escribe mal el indice, se puede
   sobrescribir un elemento o dejar espacios vacios */
?>
<pre><?php var_dump($backend) ?></pre>



<!-- ----------------------------------------------------- -->
<h2>Extraer y borrar elementos</h2>

<h3>unset()</h3>
<p>Remover un elemento del array</p>
<pre><?php var_dump($frontend) ?></pre>
<?php
unset($frontend[0]);    // Se elige que elemento borrar
?>
<pre><?php var_dump($frontend) ?></pre>

<h3>array_splice()</h3>
<p>Remover ciertos elementos y agregar otros</p>
<pre> $backend <?php var_dump($backend) ?></pre>
<?php
$array = array_splice($backend, 3, 2, array("Go", "Perl"));
/*  
  array_splice(
    array a modificar, 
    indice donde iniciar,
    partiendo del indicado cuantos modificar,
    nuevos elementos a agregar
  )

  una forma puede ser:
  array(elementos que reemplazan el contenido),
  si no se agrega nada se borraran del array reduciendo su tamano
  si se agregan de mas, desplazaran el contenido de los otros indices
*/
?>
<pre>$backend modificado <?php var_dump($backend) ?></pre>
<pre>array nuevo <?php var_dump($array) ?></pre>

<h3>array_pop()</h3>
<p>Extraer ultimo elemento en una variable</p>
<pre><?php var_dump($backend) ?></pre>
<?php
$lastBackend = array_pop($backend);
echo "<pre>\$lastBackend = $lastBackend</pre>";
?>
<pre><?php var_dump($backend) ?></pre>

<h3>array_shift()</h3>
<p>Extraer primer elemento en una variable</p>
<?php
$firstBackend = array_shift($backend);
echo "<pre>\$firstBackend = $firstBackend</pre>";
?>
<pre><?php var_dump($backend) ?></pre>



<!-- ----------------------------------------------------- -->
<h2>Arrays Asociativos</h2>

<?php
$personas = array(
  'nombre' => 'Manuel',
  'pais'   => 'Argentina',
  'ciudad' => 'La Plata'
);
// echo $personas[0]; no funciona
echo $personas['nombre'];
?>
<pre>
<?php
  var_dump($personas);
  print_r(array_keys($personas));
  print_r(array_values($personas));
?>
</pre>



<!-- ----------------------------------------------------- -->
<h2>Arrays Multidimensionales</h2>
<?php
$datos = array(
  'personales' => array(
    'nombre' => 'Manuel',
    'apellido' => 'Silenzi',
    'edad' => '18',
    'localidad' => array(
      'ciudad' => 'La Plata',
      'provincia' => 'Buenos Aires',
      'pais' => 'Argentina'
    )
  ),
  'profesionales' => array(
    'profesion' => 'Estudiante',
    'secundario' => 'Tecnico electronico',
    'Trabajos' => 'La vagancia'
  )
)
?>
<pre>
  <?php
    print_r($datos);
    echo "<br>";
    print_r($datos['personales']['localidad']['ciudad']);
  ?>
</pre>



<!-- ----------------------------------------------------- -->
<h2>Comprobar que un elemento existe en un array</h2>

<h3>Para arrays indexados</h3>
<?php
  $frontend = array('CSS', 'HTML', 'JavaScript', 'jQuery');
  echo in_array('HTML', $frontend) . "<br>"; // 1
  echo var_dump(in_array('HTML', $frontend)) . "<br>";
  echo in_array('Bootstrap', $frontend) . "<br>"; // Nada
  echo var_dump(in_array('Bootstrap', $frontend)) . "<br>";
?>

<h3>Para arrays asociativos</h3>
<?php echo var_dump(in_array('Manuel', array_values($datos))) ?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
