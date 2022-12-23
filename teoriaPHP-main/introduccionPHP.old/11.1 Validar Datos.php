<?php
  require_once '../includes/app.php';

  $titulo = '11 Validar Datos';
  include_once ROOT_ABS . 'includes/header.php';
?>

<form class="" action="11.2 Respuesta.php" method="post">

  <div class="informacion">

    <div class="campo">
      <label for="nombre">Nombre
        <input type="text" name="nombre" id="nombre">
      </label>
    </div>
    <div class="campo">
      <label for="apellido">Apellido
        <input type="text" name="apellido" id="apellido">
      </label>
    </div>

    <!-- Desde un checkbox-->
    <div class="campo">
      <label for="notificaciones">Notificaciones
        <input type="checkbox" name="notificaciones" id="notificaciones">
      </label>
    </div>
  </div>
  <!--.informacion-->


  <!-- Desde array de Checkboxes-->
  <div class="cursos">
    <h2>Cursos</h2>
    <div class="campo">
      <label for="html5">HTML5
        <!-- El name de las checkboxes es un array -->
        <input type="checkbox" name="curso[]" value="HTML5" id="html5">
      </label>
    </div>
    <div class="campo">
      <label for="css3">CSS3
        <input type="checkbox" name="curso[]" value="CSS3" id="css3">
      </label>
    </div>
    <div class="campo">
      <label for="javascript">JavaScipt
        <input type="checkbox" name="curso[]" value="JavaScript" id="javascript">
      </label>
    </div>
  </div>



  <div class="especializacion">
    <h2>Área de Especialización</h2>

    <select name="area" value="-Any-">
      <option value="">- Selecciona una area -</option>
      <option value="fe">Front End</option>
      <option value="be">Back End</option>
      <option value="fs">Full Stack</option>
    </select>
  </div>


  <div class="tipo_curso">
    <h2>Tipo de Curso</h2>
    <?php $opciones = array(
      'pres' => 'Presencial',
      'online' => 'En Línea',
      'mixto' => 'Online y Presencial'
    ); ?>


    <?php foreach ($opciones as $key => $opcion) {
      echo "<div class='campo'>";
      echo "<input type='radio' name='opciones' value='$key' id='$key'>";
      echo "<label for='$key'>$opcion</label>";
      echo "</div>";
    } ?>
  </div>
  <br>
  <div class="textarea">
    <div class="campo">
      <label for="mensaje">Deja tu mensaje:</label>
      <textarea name="mensaje" rows="8" cols="40" id="mensaje"></textarea>
    </div>
  </div>
  <input type="submit">
</form>
<?php include_once ROOT_ABS . 'includes/footer.php' ?>
