<?php
  $styles = array(
    /* Para subir a un sitio va a ser conveniente utilizar los recursos de 
    leaflet y no catgarlos nativamente*/
    'leaflet/leaflet.css',
    'css/colorbox.css'
  );
  $scripts = array(
    "js/jquery.animateNumber.min.js",
    "js/jquery.countdown.min.js",
    "leaflet/leaflet.js",
    'js/jquery.colorbox-min.js'
  );
  include_once 'includes/templates/header.php'
?>

<section class="seccion container">
  <h2>La mejor conferencia de diseño web en español</h2>
  <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Ha sido el texto de relleno estándar de las industrias desde el año 1500. Fue popularizado en los 60s y más recientemente con el software de autoedición.</p>
</section>

<section class="programa">
  <div class="programa-video">
    <video poster="img/bg-talleres.jpg" autoplay loop>
      <source src="video/video.mp4" type="video/mp4">
      <source src="video/video.webm" type="video/webm">
      <source src="video/video.ogv" type="video/ogv">
    </video>
  </div>

  <div class="programa-contenido">
    <div class="container">
      <div class="programa-evento">
        <h2>Programa del Evento</h2>
        <?php
          try {
            //* 1. Creamos la conexión
            require_once('includes/funciones/db_connection.php');

            //* 2. Escribimos la consulta
            $sql  = "SELECT * FROM categoria_evento";

            //* 3. Consultamos la base
            $resultado = $conn->query($sql);
          } catch (Exception $e) {
            echo $e->getMessage();
          }
        ?>
        <nav class="programa-menu">
          <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
            <a href="#<?php echo($cat['cat_evento']) ?>">
              <i class="<?php echo($cat['icono']) ?>"></i>
              <?php echo($cat['cat_evento']) ?>
            </a>
          <?php } ?>
        </nav>
        
        <?php
          try {
            //* 1. Creamos la conexión
            require_once('includes/funciones/db_connection.php');
      
            //* 2. Escribimos la consulta
            /*
             La consulta es una multi query, esta formada por otras 3 
             consultas, una por cada categoría (seminario, conferencia y taller).

             La forma en la que se filtran los distintos tipos de eventos es
             gracias a su ID por ello lo usamos a modo de filtro. Para evitar 
             escribir la consulta 3 veces solo cambiando el ID, lo colocamos
             dentro de un bucle for que itera el valor del id
            */
            $sql = "";
            for ($id = 1; $id < 4; $id++) { 
              $sql .= "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, ";
              $sql .= "cat_evento, icono, nombre_invitado, apellido_invitado, ";
              $sql .= "trabajo, url_imagen ";
              $sql .= "FROM eventos ";
              // 2.1 Juntamos las diferentes tablas con JOIN
              $sql .= "INNER JOIN categoria_evento "; // Tabla que se quiere unir
              $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
              $sql .= "INNER JOIN invitados ";
              $sql .= "ON ((eventos.id_inv = invitados.id_invitado) ";
              $sql .= "AND (eventos.id_cat_evento = {$id}))";
              $sql .= "ORDER BY id_evento LIMIT 2;";
            }
           
          } catch (\Exception $e) {
            echo $e -> getMessage();
          }

          //* 3. Consultamos la base
          $conn -> multi_query($sql);
        ?>

        <?php do { ?>
          <?php
            $resultado = $conn->store_result();
            $row = $resultado->fetch_all(MYSQLI_ASSOC);
            $i = 0;
          ?>
          <?php foreach($row as $ev) { ?>
            <?php if($i % 2 == 0) { ?>
              <div id="<?php echo $ev['cat_evento'] ?>" class="programa-info ocultar clearfix">
            <?php } ?>
                <div class="programa-detalle">
                  <h3><?php echo $ev['nombre_evento'] ?></h3>
                  <p><i class="far fa-clock"></i><?php echo $ev['hora_evento'] ?></p>
                  <p><i class="far fa-calendar"></i><?php echo $ev['fecha_evento'] ?></p>
                  <p><i class="fas fa-user"></i>
                    <?php echo $ev['nombre_invitado'] . " " . $ev['apellido_invitado'] ?>
                  </p>
                </div>
            <?php if($i % 2 == 1) { ?>
                <a href="calendario.php" class="btn">Ver Todos</a>
              </div> <!-- Talleres -->
            <?php } ?>
            <?php $i++; ?>
          <?php } ?>
        <?php } while ($conn->more_results() && $conn->next_result()); ?>
      </div>
    </div>
  </div>
</section>

<?php include_once 'includes/templates/lista_inv.php' ?>

<section class="contador parallax">
  <div class="container">
    <ul class="contador-contenido clearfix">
      <li>
        <p class="numero"></p>
        <p>Invitados</p>
      </li>
      <li>
        <p class="numero"></p>
        <p>Talleres</p>
      </li>
      <li>
        <p class="numero"></p>
        <p>Días</p>
      </li>
      <li>
        <p class="numero"></p>
        <p>Conferencias</p>
      </li>
    </ul>
  </div>
</section>

<section class="precios seccion">
  <div class="container">
    <h2>Precios</h2>
    <ul class="precios-lista">
      <li>
        <h3>Pase por un día</h3>
        <p class="numero">$30</p>
        <ul class="precios-detalle">
          <li>Bocadillos gratis</li>
          <li>Todas las conferencias</li>
          <li>Todos los talleres</li>
        </ul>
        <a href="" class="btn hollow">comprar</a>
      </li>
      <li>
        <h3>Todos los días</h3>
        <p class="numero">$50</p>
        <ul class="precios-detalle">
          <li>Bocadillos gratis</li>
          <li>Todas las conferencias</li>
          <li>Todos los talleres</li>
        </ul>
        <a href="" class="btn">comprar</a>
      </li>
      <li>
        <h3>Pase por dos días</h3>
        <p class="numero">$45</p>
        <ul class="precios-detalle">
          <li>Bocadillos gratis</li>
          <li>Todas las conferencias</li>
          <li>Todos los talleres</li>
        </ul>
        <a href="" class="btn hollow">comprar</a>
      </li>
    </ul>
  </div>
</section>

<div id="mapa" class="mapa"></div>

<section class="seccion container">
  <h2>Testimoniales</h2>
  <div class="testimoniales clearfix">
    <div class="testimonial">
      <blockquote>
        <p>Lorem ipsum, dolor sit amet consectetur adipis vicing elit. Esse odit, numquam illo ipsa debitis qui nisi
          vero ipsam iure dolorem dolore cupiditate ut sapiente recusandae dignissimos, est deleniti, saepe animi.</p>
        <footer class="testimonial-footer clearfix">
          <img src="img/testimonial.jpg" alt="Testimonial">
          <cite>Oswaldo Aponte Escobedo <span>Diseañador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div>
    <div class="testimonial">
      <blockquote>
        <p>Lorem ipsum, dolor sit amet consectetur adipis vicing elit. Esse odit, numquam illo ipsa debitis qui nisi
          vero ipsam iure dolorem dolore cupiditate ut sapiente recusandae dignissimos, est deleniti, saepe animi.</p>
        <footer class="testimonial-footer clearfix">
          <img src="img/testimonial.jpg" alt="Testimonial">
          <cite>Oswaldo Aponte Escobedo <span>Diseañador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div>
    <div class="testimonial">
      <blockquote>
        <p>Lorem ipsum, dolor sit amet consectetur adipis vicing elit. Esse odit, numquam illo ipsa debitis qui nisi
          vero ipsam iure dolorem dolore cupiditate ut sapiente recusandae dignissimos, est deleniti, saepe animi.</p>
        <footer class="testimonial-footer clearfix">
          <img src="img/testimonial.jpg" alt="Testimonial">
          <cite>Oswaldo Aponte Escobedo <span>Diseañador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div>
  </div>
</section>

<section class="newsletter parallax">
  <div class="newsletter-contenido container">
    <p>Registrate al newsletter</p>
    <h3>gdlwebcapm</h3>
    <a href="#mc_embed_signup" class="btn transparent btn_newsletter">Registro</a>
  </div>
</section>

<section class="seccion faltan">
  <h2>Faltan</h2>
  <ul class="clearfix contador-contenido container">
    <li>
      <p id="dias" class="numero"></p>días
    </li>
    <li>
      <p id="horas" class="numero"></p>horas
    </li>
    <li>
      <p id="minutos" class="numero"></p>minutos
    </li>
    <li>
      <p id="segundos" class="numero"></p>segundos
    </li>
  </ul>
</section>

<?php include_once 'includes/templates/footer.php'?>

<div style="display: none;">
  <!-- Begin Mailchimp Signup Form -->
  <link
    href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css"
    rel="stylesheet"
    type="text/css"
  />
  <style type="text/css">
    #mc_embed_signup {
      background: #fff;
      clear: left;
    }
  </style>
  <div id="mc_embed_signup">
    <form
      action="https://gmail.us7.list-manage.com/subscribe/post?u=96591fdc0557614ef851a5728&amp;id=294a60b3fe"
      method="post"
      id="mc-embedded-subscribe-form"
      name="mc-embedded-subscribe-form"
      class="validate"
      target="_blank"
      novalidate
    >
      <div id="mc_embed_signup_scroll">
        <h3 class="colorbox-titulo">Suscribete al newsletter</h3>
        <p>
          Al suscribirte a nuestro newsletter recibirás emails con las últimas 
          novedades sobre todos los eventos, talleres y conferencias organizados
          por GDLWebCamp
        </p>
        <div class="indicates-required">
          <span class="asterisk">*</span> indicates required
        </div>
        <div class="mc-input-group">
          <div class="mc-field-group name">
            <label for="mce-NAME">Nombre <span class="asterisk">*</span> </label>
            <input
              type="text"
              value=""
              name="NAME"
              class="required"
              id="mce-NAME"
            />
          </div>
          <div class="mc-field-group">
            <label for="mce-EMAIL">Email <span class="asterisk">*</span> </label>
            <input
              type="email"
              value=""
              name="EMAIL"
              class="required email"
              id="mce-EMAIL"
            />
          </div>
          <div id="mce-responses" class="clear">
            <div
              class="response"
              id="mce-error-response"
              style="display: none"
            ></div>
            <div
              class="response"
              id="mce-success-response"
              style="display: none"
            ></div>
          </div>
          <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px" aria-hidden="true">
            <input
              type="text"
              name="b_96591fdc0557614ef851a5728_294a60b3fe"
              tabindex="-1"
              value=""
            />
          </div>
          <div class="clear">
            <input
              type="submit"
              value="Suscribirse"
              name="subscribe"
              id="mc-embedded-subscribe"
              class="button newsletter-btn"
            />
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

  <script
    type="text/javascript"
    src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"
  ></script>
  <script type="text/javascript">
    (function ($) {
      window.fnames = new Array();
      window.ftypes = new Array();
      fnames[1] = "NAME";
      ftypes[1] = "text";
      fnames[0] = "EMAIL";
      ftypes[0] = "email";
    })(jQuery);
    var $mcj = jQuery.noConflict(true);
  </script>
  <!--End mc_embed_signup-->
  