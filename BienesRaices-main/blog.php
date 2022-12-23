<?php
  declare(strict_types = 1);
  require_once 'includes/functions/funciones.php';

  incluirHeader('Blog - Bienes Raices');
?>
<main class="blog container container--md">
  <h2>Nuestro Blog</h2>     
  <article class="blog__entrada">
    <a href="entrada.php" class="entrada__content">
      <div class="entrada__img-container">
        <picture class="entrada__img">
          <source srcset="build/image/blog1.webp" type="images/webp">
          <source srcset="build/image/blog1.jpg" type="images/jpeg">
          <img src="build/images/blog1.jpg" alt="Blog1">
        </picture>
      </div>
      <div class="entrada__desc">
        <h3 class="entrada__titulo">Terraza en el techo de tu casa</h3>
        <p class="entrada__meta">
          Escrito el <time>20/10/2020</time> por <span>Manuel Silenzi</span>
        </p>
        <p class="entrada__resumen">
          Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
        </p>
      </div>
    </a>
  </article>
  <article class="blog__entrada">
    <a href="entrada.php" class="entrada__content">
      <div class="entrada__img-container">
        <picture class="entrada__img">
          <source srcset="build/image/blog2.webp" type="images/webp">
          <source srcset="build/image/blog2.jpg" type="images/jpeg">
          <img src="build/images/blog2.jpg" alt="Blog1">
        </picture>
      </div>
      <div class="entrada__desc">
        <h3 class="entrada__titulo">Guia para decoración de tu hogar</h3>
        <p class="entrada__meta">
          Escrito el <time>20/10/2020</time> por <span>Manuel Silenzi</span>
        </p>
        <p class="entrada__resumen">
          Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
        </p>
      </div>
    </a>
  </article>
  <article class="blog__entrada">
    <a href="entrada.php" class="entrada__content">
      <div class="entrada__img-container">
        <picture class="entrada__img">
          <source srcset="build/image/blog3.webp" type="images/webp">
          <source srcset="build/image/blog3.jpg" type="images/jpeg">
          <img src="build/images/blog3.jpg" alt="Blog3">
        </picture>
      </div>
      <div class="entrada__desc">
        <h3 class="entrada__titulo">Guia para decoración de tu hogar</h3>
        <p class="entrada__meta">
          Escrito el <time>20/10/2020</time> por <span>Manuel Silenzi</span>
        </p>
        <p class="entrada__resumen">
          Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
        </p>
      </div>
    </a>
  </article>
  <article class="blog__entrada">
    <a href="entrada.php" class="entrada__content">
      <div class="entrada__img-container">
        <picture class="entrada__img">
          <source srcset="build/image/blog4.webp" type="images/webp">
          <source srcset="build/image/blog4.jpg" type="images/jpeg">
          <img src="build/images/blog4.jpg" alt="Blog4">
        </picture>
      </div>
      <div class="entrada__desc">
        <h3 class="entrada__titulo">Guia para decoración de tu hogar</h3>
        <p class="entrada__meta">
          Escrito el <time>20/10/2020</time> por <span>Manuel Silenzi</span>
        </p>
        <p class="entrada__resumen">
          Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
        </p>
      </div>
    </a>
  </article>
</main>

<?php incluirTemplate('footer') ?>
