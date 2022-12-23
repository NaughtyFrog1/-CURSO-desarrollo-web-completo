<?php
  declare(strict_types = 1);
  require_once 'includes/functions/funciones.php';
  require_once 'includes/secure/db_conn.php';

  $db = conectarDB();

  $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
  if (!$id) {
    header('Location: /BienesRaices/');
  }

  $query = mysqli_query(
    $db, "SELECT * FROM propiedades WHERE idpropiedades = {$id}"
  );

  // Si no existe una propiedad con el id pasado redireccionamos
  if ($query->num_rows === 0) {
    header('Location: /BienesRaices');
  }

  $propiedad = mysqli_fetch_assoc($query);

  incluirHeader('Anuncio - Bienes Raices');
?>

<main class="anuncio container container--sm section">
  <h1><?= $propiedad['titulo'] ?></h1>

  <img src="images/<?= $propiedad['imagen'] ?>" alt="Imagen propiedad">
  <p class="anuncio__ubicacion">
    <span class="fw--400"><?= $propiedad['ciudad'] ?> |</span>
    <span class="fw--300"><?= $propiedad['provincia'] ?></span>
  </p>
  <div class="anuncio__detalles">
    <h3 class="m0 ta--left">$<?= $propiedad['precio'] ?></h3>
    
    <ul class="card__caract">
      <li>
        <i class="fas fa-bed"></i>
        <span><?= $propiedad['habitaciones'] ?></span>
      </li>
      <li>
        <i class="fas fa-toilet-paper"></i>
        <span><?= $propiedad['wc'] ?></span>
      </li>
      <li>
        <i class="fas fa-car-alt"></i>
        <span><?= $propiedad['estacionamiento'] ?></span>
      </li>
    </ul>
  </div>


    
  <p class="anuncio__descripcion"><?= $propiedad['descripcion'] ?></p>

  <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum at, veniam hic non corporis velit accusamus? Atque quisquam dolores eos praesentium magnam eius vero excepturi, maiores quo harum, quos consequatur?
  </p>
  <p>
    Debitis esse perspiciatis modi fugiat voluptatibus, adipisci vitae eaque blanditiis saepe sunt sapiente sit nobis earum porro iure ab expedita. Aut, similique quis sapiente corrupti laudantium labore dolorem reiciendis omnis.
  </p>
  <p>
    Doloremque, ipsum tempora, provident officiis consequatur id itaque fugit eaque ea magnam accusantium neque commodi similique reprehenderit! Quae commodi molestias tenetur assumenda ea repudiandae temporibus placeat, numquam eius dolore nesciunt.
  </p>
  <p>
    Nihil mollitia debitis vel dolorem aspernatur aut inventore officiis? Repellendus temporibus est, voluptas sed modi ullam magnam? Aut sit similique, repellat ipsam accusamus ut odio tempore minima voluptates, beatae culpa?
  </p>
</main>

<?php 
  incluirTemplate('footer');
  mysqli_close($db);
?>
