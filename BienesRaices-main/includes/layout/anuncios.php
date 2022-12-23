<?php
  declare(strict_types = 1);
  require_once 'includes/functions/funciones.php';
  require_once 'includes/secure/db_conn.php';

  $db = conectarDB();
  $query = mysqli_query(
    $db, "SELECT * FROM propiedades " . (isset($limit) ? "LIMIT {$limit}" : '')
  );
?>

<ul class="venta__lista">
  <?php while($propiedad = mysqli_fetch_assoc($query)) { ?>
    <li class="venta__card">
      <a href="anuncio.php?id=<?=$propiedad['idpropiedades']?>">
        <div class="card__img">
          <img src="images/<?=$propiedad['imagen']?>" alt="Anuncio 1">
        </div>
        <div class="card__content">
          <div class="card__ubicacion"><?= $propiedad['ciudad'] ?></div>
          <p class="card__titulo"><?= $propiedad['titulo'] ?></p>
          <p class="card__precio">$<?= $propiedad['precio'] ?></p>
          <div class="card__detalles">
            <div class="detalles__content">
              <p class="card__desc">
                <?= $propiedad['descripcion'] ?>
              </p>
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
          </div>
          <footer class="card__footer">
            <p><?= $propiedad['ciudad'] . ", " . $propiedad['provincia'] ?></p>
          </footer>
        </div>
      </a>
    </li>
  <?php } ?>
</ul>

<?php mysqli_close($db) ?>
