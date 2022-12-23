<?php 
  $styles = array();
  $scripts = array();

  include_once 'includes/templates/header.php'
?>


<section class="seccion container">
  <h2>Calendario de eventos</h2>

  <?php
    try {
      //* 1. Creamos la conexión
      require_once('includes/funciones/db_connection.php');

      //* 2. Escribimos la consulta
      $sql  = "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, ";
      $sql .= "cat_evento, icono, nombre_invitado, apellido_invitado, ";
      $sql .= "trabajo, url_imagen ";
      $sql .= "FROM eventos ";
      // 2.1 Juntamos las diferentes tablas con JOIN
      $sql .= "INNER JOIN categoria_evento "; // Tabla que se quiere unir
      $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
      $sql .= "INNER JOIN invitados ";
      $sql .= "ON eventos.id_inv = invitados.id_invitado ";
      $sql .= "ORDER BY id_evento";


      //* 3. Consultamos la base
      $resultado = $conn -> query($sql);  
    } catch (\Exception $e) {
      echo $e -> getMessage();
    }
  ?>

  <div class="calendario">
    <?php 
      $calendario = array();  
      while ($evento = $resultado -> fetch_assoc()) { 
        $info_evento = array(
          'titulo' => $evento['nombre_evento'],
          'fecha'  => $evento['fecha_evento'],
          'hora'   => $evento['hora_evento'],
          'icono'  => $evento['icono'],
          'categoria' => $evento['cat_evento'],
          'invitado'  => $evento['nombre_invitado'] . " " 
                         . $evento['apellido_invitado'],
          'trabajo' => $evento['trabajo'],
          'imagen_inv' => $evento['url_imagen']
        );

        // Creamos un nuevo arreglo formateado y agrupandolos por fecha
        $calendario[$evento['fecha_evento']][] = $info_evento;
      }
    ?>

    <?php setlocale(LC_TIME, 'spanish') /*En windos, UNIX = ES_es */ ?>
    <?php foreach ($calendario as $dia => $lista_eventos) { ?>
      <div class="calendario-dia">
        <div class="dia">
          <i class="far fa-calendar"></i>
          <?php 
            echo "<h3>" 
              . ucfirst(utf8_encode(strftime("%A, %d de %B", strtotime($dia))))
              . "</h3>"; 
          ?>
        </div> 

        <section class="grid-eventos">
          <?php foreach ($lista_eventos as $evento) { ?>
            <div class="dia-evento">
              <h4 class="titulo" title="<?php echo $evento['titulo'] ?>">
                <?php echo $evento['titulo'] ?>
              </h4>
              <div class="info-detalle">
                <i class="info-ico <?php echo $evento['icono'] ?>"></i>
                <?php echo "<p>" . $evento['categoria'] . "</p>" ?>
              </div>

              <div class="info-detalle">
                <i class="info-ico far fa-clock"></i>
                <?php echo "<p>"
                  . strftime("%H:%M", strtotime($evento['hora']))
                  . "</p>"
                ?>
              </div>

              <div class="info-detalle">
                <img class="info-ico" 
                  src="img/<?php echo $evento['imagen_inv'] ?> " 
                  alt="Invitado">
                <div class="invitado-info">
                  <p class="inv-nombre"><?php echo $evento['invitado'] ?></p>
                  <p class="inv-trabajo" title="<?php echo $evento['trabajo']?>">
                    <?php echo $evento['trabajo'] ?>
                  </p>
                </div>
              </div>
            </div>  <!-- end .dia-evento -->
          <?php } ?>
        </section>  <!-- end .grid-eventos -->
      </div>
    <?php } ?>
  </div>
</section>

<?php 
  $conn -> close();  //! 5. Cerramos la conexión
  include_once 'includes/templates/footer.php'
?>