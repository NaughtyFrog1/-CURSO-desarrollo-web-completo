<?php
  declare(strict_types = 1);
  require_once 'includes/functions/funciones.php';

  incluirHeader('Bienes Raices', 'index');
?>

<header class="site__header">
  <h1 class="header__title ta--left">
    Venta de casas y departamentos exclusivos de lujo
  </h1>
  <div class="header__glide glide">
    <div class="glide__track" data-glide-el="track">
      <ul class="glide__slides"></ul>
    </div>
  </div>
</header>

<?php incluirTemplate('nosotros') ?>

<main class="venta section container container--lg">
  <h2>Casas y departamentos en venta</h2>

  <?php
    $limit = 3;
    include 'includes/layout/anuncios.php';
  ?>
  
  <div class="venta__ver-mas">
    <a href="anuncios.php" class="btn btn--secundario">Ver más propiedades</a>
  </div>
</main>

<section class="section contacto">
  <div class="contacto__content container container--lg">
    <h2>Encuentra la casa de tus sueños</h2>
    <p class="ta--center">
      Llena el formulario y un asesor se pondrá en contacto contigo a la brevedad
    </p>
    <a href="contacto.php" class="btn btn--primario">Contactanos</a>
  </div>
</section>

<div class="container container--lg section blog-testimoniales">
  <section class="blog">
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
  </section>

  <section class="testimoniales">
    <h2>Testimoniales</h2>
    <div class="testimonial">
      <blockquote>
        El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
      </blockquote>
      <p>- Manuel Silenzi</p>
    </div>
  </section>
</div>

<?php incluirTemplate('footer') ?>
