<?php
  require_once '../includes/app.php';

  $titulo = '11 Validar Datos';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
$rtaForm = $_POST;
$nombre = $rtaForm["nombre"];
$apellido = $rtaForm["apellido"];
?>

<?php // Validacion estricta
echo "<p>";
if (
  !(filter_has_var(INPUT_POST, "nombre") &&
    strlen(filter_input(INPUT_POST, "nombre")) > 0 &&
    trim($nombre) != '')
) {
  echo "ERROR: No ingreso un nombre";
} else {
  echo "Nombre: $nombre";
}
echo "</p>";
?>


<?php // Validacion 'moderada'
echo "<p>";
if (!empty($apellido) && trim($apellido) != '') {
  echo "Apellido: $apellido";
} else {
  echo "ERROR: No ingreso un apellido";
}
echo "</p>";
?>

<?php // validar checkbox
echo "<p>";

if (isset($rtaForm["notificaciones"])) {
  // isset verifica que la variable exista
  echo "Se recibiran notificaciones";
} else {
  echo "No se recibiran notificaciones";
}
echo "</p>";

?>
<br>
<p>Cursos a los que te has inscripto</p>
<?php
// Validar multiples ckeckboxes
if (isset($rtaForm["curso"])) {
  echo "<ul>";
  foreach ($rtaForm["curso"] as $curso) {
    echo "<li>$curso</li>";
  }
  echo "</ul>";
} else {
  echo "No se incribio a ningun curso";
}
?>

<br>
<p>Area de especializacion</p>
<?php
// Validar una lista select 
echo "<p>";
if (empty($_POST["area"])) {
  echo "No eligio un area";
} else {
  switch ($_POST["area"]) {
    case 'fe':
      echo "Frontend";
      break;
    case 'be':
      echo "Backend";
      break;
    case 'fs':
      echo "Fullstack";
      break;
    default:
      echo "ERROR: Opcion Invalida";
  }
}
echo "</p>";
?>

<br>
<p>Tipo de curso</p>
<?php
// Validar radio btn
echo "<p>";
if (isset($_POST["opciones"])) {
  switch ($_POST["opciones"]) {
    case 'pres':
      echo "Presencial";
      break;
    case 'online':
      echo "Online";
      break;
    case 'mixto':
      echo "Online y Presencial";
      break;

    default:
      echo "ERROR: Tipo de cursada invalida";
      break;
  }
} else {
  echo "No se eligio un tipo de cursada";
}
echo "</p>";
?>

<br>
<p>Mensaje</p>
<?php
echo "<pre>";
$msjFiltrado = filter_var($_POST["mensaje"], FILTER_SANITIZE_STRING);
// remueve etiquetas para evitar ingresar codigo HTML como
// por ej.: <script></script>
if (
  !empty($msjFiltrado) &&
  trim($msjFiltrado) != ''
) {
  echo $msjFiltrado;
} else {
  echo "No se dejo ningun mensaje";
}
echo "</pre>"
?>
<br><br>
<pre><?php var_dump($_POST) ?></pre>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
