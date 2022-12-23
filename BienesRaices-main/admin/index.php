<?php
  declare(strict_types = 1);
  require_once '../includes/functions/funciones.php';
  require_once '../includes/secure/db_conn.php';

  validarSesion();

  // 1. Conectar a la base de datos
  $db = conectarDB();

  // 2. Realizar la consulta
  $propiedades = mysqli_query($db, 'SELECT * FROM propiedades');

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
    
    if ($id) {
      // Borrar imagen propiedad
      $img = mysqli_fetch_assoc(mysqli_query(
        $db, "SELECT imagen FROM propiedades WHERE idpropiedades = {$id}"
      ));
      unlink('../images/' . $img['imagen']);

      // Borrar propiedad de la base de datos
      $borrar = mysqli_query(
        $db, "DELETE FROM propiedades WHERE idpropiedades = {$id}"
      );
      if ($borrar) {
        header('Location: /BienesRaices/admin');
      }
    }
  }

  // 3. Cerrar la conexión
  mysqli_close($db);

  incluirHeader('Admin - Bienes Raices');
?>

<main class="section container container--md">
  <h1>Administrador de Bienes Raices</h1>

  <a href="propiedades/crear.php" class="btn btn--primario">
    Agregar una propiedad
  </a>

  <div class="table-container">
    <table class="propiedades">
      <thead>
        <tr>
          <th>ID</th>
          <th>Título</th>
          <th>Imagen</th>
          <th>Precio</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <tbody>
        <?php $pathImg = '../images/' ?>
        <?php while($propiedad = mysqli_fetch_assoc($propiedades)) { ?>
          <tr class="propiedad">
            <td class="ta--right"><?= $propiedad['idpropiedades'] ?></td>
            <td><?= $propiedad['titulo'] ?></td>
            <td class="propiedad__imagen">
              <img 
                src="<?= $pathImg . $propiedad['imagen'] ?>"
                alt="<?= $propiedad['titulo'] ?>"
              >
            </td>
            <td class="ta--right">$<?= $propiedad['precio'] ?></td>
            <td class="propiedad__acciones">
              <div class="acciones__container">
                <a 
                  class="propiedad__accion"
                  href="propiedades/actualizar.php?id=<?= $propiedad['idpropiedades'] ?>" 
                >
                  <img 
                    src="../src/assets/images/icons/pen.svg" 
                    alt="Actualizar"
                  >
                </a>
                <form class="propiedad__accion" method="post">
                  <input
                    name="id"
                    type="hidden"
                    value="<?= $propiedad['idpropiedades'] ?>""
                  >
                  <input type="submit" value=''>
                </form>
              </div>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</main>

<?php incluirTemplate('footer') ?>
