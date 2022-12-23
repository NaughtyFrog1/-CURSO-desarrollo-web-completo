<?php
  declare(strict_types = 1);
  require_once 'includes/functions/funciones.php';

  incluirHeader('Nosotros - Bienes Raices');
?>

<main class="container container--lg section">
  <h2>Nuestra historia</h2>

  <h3>25 años de experiencia</h3>
  <div class="nosotros__item">
    <div class="item__img">
      <picture>
        <source srcset="build/images/nosotros.webp" type="image/webp">
        <source srcset="build/images/nosotros.jpg" type="image/jpeg">
        <img src="build/images/nosotros.jpg" alt="Nosotros">
      </picture>
    </div>
    <div class="item__texto">
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae magni deserunt expedita tempore ipsum ea, quos aliquid quisquam aspernatur laboriosam reiciendis, qui, corrupti quasi nam hic. Ea voluptatem officia saepe?
      </p>
      <p>
        Sunt, delectus impedit quasi cumque incidunt, aperiam nisi ipsa suscipit facilis quaerat vel natus esse? Incidunt, quidem ad. Modi porro dolor itaque, necessitatibus at tenetur est quae sed eligendi ut!
      </p>
      <p>
        Ut quam in voluptas aut tenetur excepturi reiciendis molestiae recusandae fugit consequatur provident expedita aperiam nihil sint officia, consequuntur consectetur! Iure fuga iste commodi atque tenetur tempore numquam veritatis architecto?
      </p>
    </div>
  </div>


  <h3>Pasión por lo nuestro</h3>
  <div class="nosotros__item">
    <div class="item__img">
      <picture>
        <source srcset="build/images/nosotros.webp" type="image/webp">
        <source srcset="build/images/nosotros.jpg" type="image/jpeg">
        <img src="build/images/nosotros.jpg" alt="Nosotros">
      </picture>
    </div>
    <div class="item__texto">
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae magni deserunt expedita tempore ipsum ea, quos aliquid quisquam aspernatur laboriosam reiciendis, qui, corrupti quasi nam hic. Ea voluptatem officia saepe?
      </p>
      <p>
        Sunt, delectus impedit quasi cumque incidunt, aperiam nisi ipsa suscipit facilis quaerat vel natus esse? Incidunt, quidem ad. Modi porro dolor itaque, necessitatibus at tenetur est quae sed eligendi ut!
      </p>
      <p>
        Ut quam in voluptas aut tenetur excepturi reiciendis molestiae recusandae fugit consequatur provident expedita aperiam nihil sint officia, consequuntur consectetur! Iure fuga iste commodi atque tenetur tempore numquam veritatis architecto?
      </p>
      <p>
        Ut quam in voluptas aut tenetur excepturi reiciendis molestiae recusandae fugit consequatur provident expedita aperiam nihil sint officia, consequuntur consectetur! Iure fuga iste commodi atque tenetur tempore numquam veritatis architecto?
      </p>
    </div>
  </div>
</main>

<?php incluirTemplate('nosotros') ?>

<?php incluirTemplate('footer') ?>
