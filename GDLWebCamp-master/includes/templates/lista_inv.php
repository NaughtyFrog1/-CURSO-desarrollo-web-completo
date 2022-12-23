<section class="invitados container seccion">
    <h2>Nuestros invitados</h2>

  <?php
    try {
      //* 1. Creamos la conexión
      require_once('includes/funciones/db_connection.php');

      //* 2. Escribimos la consulta
      $sql  = "SELECT * FROM invitados";

      //* 3. Consultamos la base
      $resultado = $conn -> query($sql);  
    } catch (\Exception $e) {
      echo $e -> getMessage();
    }
  ?>

  <ul class="invitados-lista">
    <?php 
      $calendario = array();  
      while ($invitado = $resultado -> fetch_assoc()) { ?>
      <li>
        <div class="invitado">
          <a class="invitado-info" 
             href="#invitado<?php echo $invitado['id_invitado']?>">
            <img src="img/<?php echo $invitado['url_imagen']?>" alt="Invitado">
            <p> <?php
              echo $invitado['nombre_invitado'] . " "
                  . $invitado['apellido_invitado']
            ?></p>
          </a>
        </div>
      </li>
      <div style="display: none">
        <div class="invitado-info colorbox-invitado colorbox" 
             id="invitado<?php echo $invitado['id_invitado']?>">
          <h3 class="colorbox-titulo"><?php 
            echo $invitado['nombre_invitado'] . " " 
            . $invitado['apellido_invitado']
          ?></h3>
          <p class="colorbox-subtitulo"><?php 
            echo $invitado['trabajo']
          ?></p>
          <img src="img/<?php echo $invitado['url_imagen']?>" alt="Invitado">
          <p class="colorbox-descripcion"><?php 
            echo $invitado['descripcion_invitado']
          ?></p>
          <nav class="redes-sociales">
            <a href="https://www.facebook.com" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.pinterest.com" target="_blank">
              <i class="fab fa-pinterest-p"></i>
            </a>
            <a href="https://www.youtube.com" target="_blank">
              <i class="fab fa-youtube"></i>
            </a>
        </nav>
        </div>
      </div>
    <?php } ?>
  </ul>
</section>

<?php $conn -> close();  //! 5. Cerramos la conexión ?>