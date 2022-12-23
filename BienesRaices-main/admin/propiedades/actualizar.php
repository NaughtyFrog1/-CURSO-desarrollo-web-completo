<?php
  declare(strict_types = 1);
  require_once '../../includes/functions/funciones.php';
  require_once '../../includes/secure/db_conn.php';

  validarSesion();

  // Validar id solicitado
  $idEditar = filter_var($_GET['id'], FILTER_VALIDATE_INT);

  if (!$idEditar) {
    header('Location: /BienesRaices/admin');
  }


  $db = conectarDB();

  // Obtener los datos de la propiedad a editar
  $query = "SELECT * FROM propiedades WHERE idpropiedades = {$idEditar}";
  $propiedad = mysqli_fetch_assoc(mysqli_query($db, $query));

  // Obtener los vendedores
  $vendedores = mysqli_query($db, 'SELECT * FROM  vendedores');


  $errores = [];
  $form = [
    'titulo' => $propiedad['titulo'],
    'precio' => $propiedad['precio'],
    'img'    => $propiedad['imagen'],
    'desc'   => $propiedad['descripcion'],
    'habs'   => $propiedad['habitaciones'],
    'wc'     => $propiedad['wc'],
    'est'    => $propiedad['estacionamiento'],
    'ciudad' => $propiedad['ciudad'],
    'prov'   => $propiedad['provincia'],
    'vendedor' => $propiedad['vendedorid'],
    'creado' => ''
  ];

  // Ejecutar el código después de que el usuario envía el formulario 
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    if ($form['img']['size'] > 1048576 || $form['img']['error'] === 1) {
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
      $img = [
        'ext'  => '',
        'name' => '',
        'path' => '../../images/'
      ];

      // Crear carpeta
      if (!is_dir($img['path'])) {
        mkdir($img['path']);
      }

      // Si existe una nueva imagen
      if ($form['img']['name']) {
        $img['ext'] = '.' . pathinfo($form['img']['name'], PATHINFO_EXTENSION);
        $img['name'] = md5(uniqid(strval(rand()), true));

        move_uploaded_file(
          $form['img']['tmp_name'], 
          $img['path'] . $img['name'] . $img['ext']
        );

        $nombreImg = $img['name'] . $img['ext'];

        // Eliminar imagen anterior
        unlink($img['path'] . $propiedad['imagen']);
      } else {
        $nombreImg = $propiedad['imagen'];
      }

      // Actualizar información DB
      $query = 
        "UPDATE propiedades SET " .
        "titulo = '{$form["titulo"]}', " .
        "precio = '{$form["precio"]}', " .
        "imagen = '{$nombreImg}', " .
        "descripcion = '{$form["desc"]}', " .
        "habitaciones = {$form["habs"]}, " .
        "wc = {$form["wc"]}, " .
        "estacionamiento = {$form["est"]}, " .
        "ciudad = '{$form["ciudad"]}', " .
        "provincia = '{$form["prov"]}', " .
        "creado = '{$form["creado"]}', " .
        "vendedorid = {$form["vendedor"]} " .
        "WHERE idpropiedades = {$idEditar}";
      $res = mysqli_query($db, $query);
    }
  }

  incluirHeader('Actualizar - Bienes Raices');
?>

<main class="section container container--sm">
  <a class="btn btn--secundario" href="../index.php">Volver</a>

  <h1>Actualizar</h1>

  <?php if(!empty($errores)) { ?>
    <div class="container-alert--error container-alert--php">
      <?php foreach ($errores as $error): ?>
        <p class="alert alert--error"><?= $error ?></p>  
      <?php endforeach ?>
    </div>
  <?php } else if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
    <div class="container-alert--success container-alert--php">
      <p class="alert alert--success">Casa actualizada satisfactoriamente</p>  
    </div>
  <?php } ?>

  <form 
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
      <img 
        class="form__vista-previa"
        src="../../images/<?= ($nombreImg) ? $nombreImg : $propiedad['imagen'] ?>" 
        alt="Imagen propiedad"
      >
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
          <input 
            class="input--text" 
            type="text" 
            name="ciudad"
            value="<?=$form['ciudad']?>"
          >
          <label for="ciudad" class="label">ciudad</label>
        </div>
        <div class="input-group">
          <input
            type="text" 
            class="input--text" 
            name="provincia"
            value="<?=$form['prov']?>"
          >
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
        value="Actualizar"
      />
    </div>
  </form>
</main>

<?php incluirTemplate('footer') ?>
