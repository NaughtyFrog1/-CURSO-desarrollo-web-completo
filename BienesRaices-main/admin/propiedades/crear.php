<?php
  declare(strict_types = 1);
  require_once '../../includes/functions/funciones.php';
  require_once '../../includes/secure/db_conn.php';

  validarSesion();
  $db = conectarDB();

  // Obtener los vendedores
  $vendedores = mysqli_query($db, 'SELECT * FROM  vendedores');

  $errores = [];
  $form = [
    'titulo' => '',
    'precio' => '',
    'img'    => '',
    'desc'   => '',
    'habs'   => '',
    'wc'     => '',
    'est'    => '',
    'ciudad' => '',
    'prov'   => '',
    'vendedor' => '',
    'creado' => ''
  ];

  // Ejecutar el código después de que el usuario envía el formulario 
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // var_dump($_POST);
    // var_dump($_FILES);

    $form['titulo'] = mysqli_real_escape_string($db, $_POST['titulo']);
    $form['precio'] = mysqli_real_escape_string($db, $_POST['precio']);
    $form['img']    = $_FILES['imagen'];
    $form['desc']   = mysqli_real_escape_string($db, $_POST['descripcion']);
    $form['habs']   = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $form['wc']     = mysqli_real_escape_string($db, $_POST['wc']);
    $form['est']    = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $form['ciudad'] = mysqli_real_escape_string($db, $_POST['ciudad']);
    $form['prov']   = mysqli_real_escape_string($db, $_POST['provincia']);
    $form['vendedor'] = mysqli_real_escape_string($db, $_POST['vendedor']);
    $form['creado'] = date('Y/m/d');

    // Validar que todos los campos esten completos
    if (!$form['titulo']) {
      $errores[] = 'Debes añadir un título';
    }

    if (!$form['precio']) {
      $errores[] = 'Debes añadir un precio';
    }

    if (!$form['img']['name']) {
      $errores[] = 'Debes añadir una imagen';
    } else if ($form['img']['size'] > 1048576 || $form['img']['error'] === 1) {
      $errores[] = 'La imagen no debe pesar más de 1MB';
    }

    if (strlen($form['desc']) < 50) {
      $errores[] = 'Debes añadir una descripción de al menos 50 caracteres';
    }

    if (!$form['habs']) {
      $errores[] = 'Debes añadir la cantidad de habitaciones';
    }

    if (!$form['wc']) {
      $errores[] = 'Debes añadir la cantidad de baños';
    }

    if (!$form['est']) {
      $errores[] = 'Debes añadir la capacidad del estacionamiento';
    }

    if (!$form['ciudad']) {
      $errores[] = 'Debes añadir la ciudad';
    }

    if (!$form['prov']) {
      $errores[] = 'Debes añadir la provincia';
    }

    if (!$form['vendedor']) {
      $errores[] = 'Debes elegir el vendedor';
    }

    // Si no hay errores enviar el formulario y vaciar los campos
    if (empty($errores)) {

      // SUBIR IMAGENES
      $img = [
        // Extraer la extension del nombre del archivo
        'ext'  => '.' . pathinfo($form['img']['name'], PATHINFO_EXTENSION),

        // Generar un nombre único
        'name' => md5(uniqid(strval(rand()), true)),

        // Definir el path donde van las imagenes
        'path' => '../../images/'
      ];

      // Crear carpeta
      if (!is_dir($img['path'])) {
        mkdir($img['path']);
      }

      // Subir la imagen
      move_uploaded_file(
        $form['img']['tmp_name'], 
        $img['path'] . $img['name'] . $img['ext']
      );

      $nombreImg = $img['name'] . $img['ext'];

      // Guardar los datos en la DB
      $query =
        "INSERT INTO propiedades (" .
        "titulo, precio, imagen, descripcion, habitaciones, wc, " .
        "estacionamiento, ciudad, provincia, creado, vendedorId) VALUES (" .
        "'{$form["titulo"]}', '{$form["precio"]}', '{$nombreImg}', " .
        "'{$form["desc"]}', '{$form["habs"]}', '{$form["wc"]}', " .
        "'{$form["est"]}', '{$form["ciudad"]}', '{$form["prov"]}', " .
        "'{$form["creado"]}', '{$form["vendedor"]}')";
      $res = mysqli_query($db, $query);

      // Vaciar los campos del formulario
      $form['titulo'] = '';
      $form['precio'] = '';
      $form['img'] = '';
      $form['desc'] = '';
      $form['habs'] = '';
      $form['wc'] = '';
      $form['est'] = '';
      $form['ciudad'] = '';
      $form['prov'] = '';
      $form['vendedor'] = '';
    }
  }

  incluirHeader('Crear - Bienes Raices');
?>

<main class="section container container--sm">
  <a class="btn btn--secundario" href="../index.php">Volver</a>

  <h1>Crear</h1>

  <?php if(!empty($errores)) { ?>
    <div class="container-alert--error container-alert--php">
      <?php foreach ($errores as $error): ?>
        <p class="alert alert--error"><?= $error ?></p>  
      <?php endforeach ?>
    </div>
  <?php } else if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
    <div class="container-alert--success container-alert--php">
      <p class="alert alert--success">Casa agregada satisfactoriamente</p>  
    </div>
  <?php } ?>

  <form 
    action="crear.php"
    class="form form--crear"
    enctype="multipart/form-data"
    method="POST"
    name="formulario_crear"
  >
    <fieldset class="form__fieldset">
      <h4 class="fieldset__title">Información General</h4>
      <div class="form__row">
        <div class="input-group">
          <input
            class="input--text"
            id="titulo"
            name="titulo"
            type="text"
            value="<?=$form['titulo']?>"
          >
          <label class="label" for="titulo">titulo</label>
        </div>
        <div class="input-group">
          <input
            class="input--text"
            id="precio"
            min="0"
            name="precio"
            type="number"
            value="<?=$form['precio']?>"
          >
          <label class="label" for="precio">precio</label>
        </div>
      </div>
      <div class="input-group">
        <input
          accept="image/jpeg, image/png"
          class="input--text"
          id="imagen"
          name="imagen"
          type="file"
        >
        <label class="label label--date" for="imagen">imágen</label>
      </div>
      <div class="input-group">
        <textarea
          class="input--text"
          id="descripcion"
          name="descripcion"
          rows="5"
          type="text"
        ><?=$form['desc']?></textarea>
        <label class="label" for="descripcion">descripcion</label>
      </div>
    </fieldset>

    <fieldset class="form__fieldset">
      <h4 class="fieldset__title">Información Propiedad</h4>
      <div class="form__row--3">
        <div class="input-group">
          <input
            class="input--text"
            id="habitaciones"
            min="0"
            name="habitaciones"
            type="number"
            value="<?=$form['habs']?>"
          />
          <label class="label" for="habitaciones">habitaciones</label>
        </div>

        <div class="input-group">
          <input
            class="input--text"
            id="wc"
            min="0"
            name="wc"
            type="number"
            value="<?=$form['wc']?>"
          />
          <label class="label" for="wc">baños</label>
        </div>

        <div class="input-group">
          <input
            class="input--text"
            id="estacionamiento"
            min="0"
            name="estacionamiento"
            type="number"
            value="<?=$form['est']?>"
          />
          <label class="label" for="estacionamiento">estacionamiento</label>
        </div>
      </div>
      <div class="form__row">
        <div class="input-group">
          <input type="text" class="input--text" name="ciudad">
          <label for="ciudad" class="label">ciudad</label>
        </div>
        <div class="input-group">
          <input type="text" class="input--text" name="provincia">
          <label for="provincia" class="label">provincia</label>
        </div>
      </div>
    </fieldset>

    <fieldset class="form__fieldset">
      <h4 class="fieldset__title">Vendedor</h4>

      <div class="input-group">
        <select class="input--text" name="vendedor" id="vendedor">
          <option 
            <?= ($form['vendedor'] === '') ? 'selected' : '' ?>  
            value="" 
          ></option>
          <?php while($row = mysqli_fetch_assoc($vendedores)): ?>
            <option 
              value="<?= $row['idvendedores'] ?>"
              <?= 
                ($form['vendedor'] === $row['idvendedores']) ? 'selected' : ''
              ?>
            >
              <?= $row['nombre']. " " . $row['apellido'] ?>
            </option>
          <?php endwhile ?>
        </select>
        <label class="label" for="vendedor">vendedor</label>
      </div>
    </fieldset>
    <div class="form__row form__row--submit">
      <input
        class="btn btn--primario" 
        id="submit-contacto"
        type="submit"
        value="Crear"
      />
    </div>
  </form>
</main>

<?php
  mysqli_close($db);
  incluirTemplate('footer') 
?>
