<?php
  declare(strict_types = 1);
  require_once 'includes/functions/funciones.php';
  require_once 'includes/secure/db_conn.php';

  $db = conectarDB();
  $errores = [];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var(
      mysqli_real_escape_string($db, $_POST['email']), 
      FILTER_VALIDATE_EMAIL
    );
    $pass = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
      $errores[] = 'Debes añadir un email';
    }
    if (!$pass) {
      $errores[] = 'Debes añadir una contraseña';
    }

    if (empty($errores)) {
      $query_str = "SELECT * FROM usuarios WHERE email = '{$email}'";
      $query = mysqli_query($db, $query_str);

      if ($query->num_rows) {
        $usuario = mysqli_fetch_assoc($query);
        $auth = password_verify($pass, $usuario['password']);

        if ($auth) {
          session_start();
          $_SESSION['usuario'] = $usuario['email'];
          $_SESSION['login'] = true;

          header('Location: /BienesRaices/admin');
        } else {
          $errores[] = 'Usuario o contraseña inválidos';
        }
      } else {
        $errores[] = 'Usuario o contraseña inválidos';
      }
    }
  }

  incluirHeader('Login - Bienes Raices');
?>

<main class="container container--sm section">
  <h1>Iniciar Sesión</h1>

  <?php if(!empty($errores)) { ?>
    <div class="container-alert--error container-alert--php">
      <?php foreach ($errores as $error): ?>
        <p class="alert alert--error"><?= $error ?></p>  
      <?php endforeach ?>
    </div>
  <?php } ?>

  <form 
    class="form form--login"
    enctype="multipart/form-data"
    method="POST"
    name="formulario_login"
  >
    <fieldset class="form__fieldset">
      <h4 class="fieldset__title">Inicia sesión de administrador</h4>
      <div class="form__row">
        <div class="input-group">
          <input
            class="input--text"
            name="email"
            type="email"
            value="<?= $email ?>"
          >
          <label class="label" for="email">email</label>
        </div>
        <div class="input-group">
          <input
            class="input--text"
            name="password"
            type="password"
            value="<?= $pass ?>"
          >
          <label class="label" for="password">contraseña</label>
        </div>
      </div>

    </fieldset>
    <div class="form__row form__row--submit">
      <input
        class="btn btn--primario" 
        id="submit-contacto"
        type="submit"
        value="Iniciar Sesión"
      />
    </div>
  </form>
</main>

<?php incluirTemplate('footer') ?>
