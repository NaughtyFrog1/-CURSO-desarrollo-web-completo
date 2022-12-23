<?php 
  $styles = array();
  $scripts = array(); 

  include_once 'includes/templates/header.php'
?>

<section class="seccion container">
  <h2>Registro de Usuarios</h2>

  <form id="registro" class="registro" action="validar_registro.php" method="POST">
    <div id="datosUsuario" class="registro caja clearfix">
      <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre">
      </div>
      <div class="campo">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" placeholder="Tu apellido">
      </div>
      <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Tu email">
      </div>
      <div id="error"></div>
    </div>

    <div id="paquetes" class="paquetes">
      <h3>Elige el numero de boletos</h3>
      <ul class="precios-lista">
        <li>
          <h3>Pase por un día</h3>
          <p class="dias">Viernes</p>
          <p class="numero">$30</p>
          <ul class="precios-detalle">
            <li>Bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <div class="orden">
            <label for="paseUno">Boletos deseados</label>
            <input type="number" id="paseUno" min="0" size="3" name="boletos[]" placeholder="0">
          </div>
        </li>
        <li>
          <h3>Todos los días</h3>
          <p class="dias">Viernes, Sábado y Domingo</p>
          <p class="numero">$50</p>
          <ul class="precios-detalle">
            <li>Bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <div class="orden">
            <label for="paseTres">Boletos deseados</label>
            <input type="number" id="paseTres" min="0" size="3" name="boletos[]" placeholder="0">
          </div>
        </li>
        <li>
          <h3>Pase por dos días</h3>
          <p class="dias">Viernes y Sábado</p>
          <p class="numero">$45</p>
          <ul class="precios-detalle">
            <li>Bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <div class="orden">
            <label for="paseDos">Boletos deseados</label>
            <input type="number" id="paseDos" min="0" size="3" name="boletos[]" placeholder="0">
          </div>
        </li>
      </ul>
    </div>
    </div>

    <div id="eventos" class="eventos clearfix">
      <h3>Elige tus talleres</h3>
      <div class="caja">
        <div id="avisoDias" class="contenido-dia clearfix">
          <h4>HEY!</h4>
          <p>Primero debes elegir los boletos</p>
        </div>

        <div id="viernes" class="contenido-dia clearfix">
          <h4>Viernes</h4>
          <div>
            <p>Talleres:</p>
            <label>
              <input type="checkbox" name="registro[]" id="taller_01" value="taller_01">
              <p> <time>10:00</time> Responsive Web Design </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="taller_02" value="taller_02">
              <p> <time>12:00</time> Flexbox </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="taller_03" value="taller_03">
              <p> <time>14:00</time> HTML5 y CSS3 </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="taller_04" value="taller_04">
              <p> <time>17:00</time> Drupal </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="taller_05" value="taller_05">
              <p> <time>19:00</time> WordPress </p>
            </label>
          </div>

          <div>
            <p>Conferencias:</p>
            <label>
              <input type="checkbox" name="registro[]" id="conf_01" value="conf_01">
              <p> <time>10:00</time> Como ser Freelancer </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="conf_02" value="conf_02">
              <p> <time>17:00</time> Tecnologías del Futuro </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="conf_03" value="conf_03">
              <p> <time>19:00</time> Seguridad en la Web </p>
            </label>

          </div>
          <div>
            <p>Seminarios:</p>
            <label><input type="checkbox" name="registro[]" id="sem_01" value="sem_01">
              <p> <time>10:00</time> Diseño UI y UX para móviles</p>
            </label>
          </div>
        </div>
        <!--#viernes-->
        <div id="sabado" class="contenido-dia clearfix">

          <h4>Sábado</h4>
          <div>
            <p>Talleres:</p>
            <label>
              <input type="checkbox" name="registro[]" id="taller_06" value="taller_06">
              <p> <time>10:00</time> AngularJS </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="taller_07" value="taller_07">
              <p> <time>12:00</time> PHP y MySQL </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="taller_08" value="taller_08">
              <p> <time>14:00</time> JavaScript Avanzado </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="taller_09" value="taller_09">
              <p> <time>17:00</time> SEO en Google </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="taller_10" value="taller_10">
              <p> <time>19:00</time> De Photoshop a HTML5 y CSS3 </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="taller_11" value="taller_11">
              <p> <time>21:00</time> PHP Medio y Avanzado </p>
            </label>

          </div>
          <div>
            <p>Conferencias:</p>
            <label>
              <input type="checkbox" name="registro[]" id="conf_04" value="conf_04">
              <p> <time>10:00</time> Como crear una tienda online que venda millones en pocos días </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="conf_05" value="conf_05">
              <p> <time>17:00</time> Los mejores lugares para encontrar trabajo </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="conf_06" value="conf_06">
              <p> <time>19:00</time> Pasos para crear un negocio rentable </p>
            </label>

          </div>
          <div>
            <p>Seminarios:</p>
            <label>
              <input type="checkbox" name="registro[]" id="sem_02" value="sem_02">
              <p> <time>10:00</time> Aprende a Programar en una mañana </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="sem_03" value="sem_03">
              <p> <time>17:00</time> Diseño UI y UX para móviles </p>
            </label>

          </div>
        </div>
        <!--#sabado-->

        <div id="domingo" class="contenido-dia clearfix">
          <h4>Domingo</h4>
          <div>
            <p>Talleres:</p>
            <label>
              <input type="checkbox" name="registro[]" id="taller_12" value="taller_12">
              <p> <time>10:00</time> Laravel </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="taller_13" value="taller_13">
              <p> <time>12:00</time> Crea tu propia API </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="taller_14" value="taller_14">
              <p> <time>14:00</time> JavaScript y jQuery </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="taller_15" value="taller_15">
              <p> <time>17:00</time> Creando Plantillas para WordPress </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="taller_16" value="taller_16">
              <p> <time>19:00</time> Tiendas Virtuales en Magento </p>
            </label>

          </div>
          <div>
            <p>Conferencias:</p>
            <label>
              <input type="checkbox" name="registro[]" id="conf_07" value="conf_07">
              <p> <time>10:00</time> Como hacer Marketing en línea </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="conf_08" value="conf_08">
              <p> <time>17:00</time> ¿Con que lenguaje debo empezar? </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="conf_09" value="conf_09">
              <p> <time>19:00</time> Frameworks y librerias Open Source </p>
            </label>

          </div>
          <div>
            <p>Seminarios:</p>
            <label>
              <input type="checkbox" name="registro[]" id="sem_04" value="sem_04">
              <p> <time>14:00</time> Creando una App en Android en una tarde </p>
            </label>

            <label>
              <input type="checkbox" name="registro[]" id="sem_05" value="sem_05">
              <p> <time>17:00</time> Creando una App en iOS en una tarde </p>
            </label>

          </div>
        </div>
        <!--#domingo-->
      </div>
      <!--.caja-->
    </div>
    <!--#eventos-->

    <div id="resumen" class="resumen">
      <h3>Pagos y Extras</h3>
      <div class="caja">
        <div class="extras">
          <div class="orden">
            <label for="camisas-evento">Camisa del Evento $10 <small>(7% de descuento)</small></label>
            <input type="number" min="0" id="camisas-evento" name="pedido_camisas" size="3" placeholder="0"">
          </div>
          <div class=" orden">
            <label for="etiquetas-evento">10 etiquetas $2 <small>(HTML5, CSS, JS)</small></label>
            <input type="number" min="0" id="etiquetas-evento" name="pedido_etiquetas" size="3" placeholder="0">
          </div>
          <div class="orden">
            <label for="regalo">Seleccione un regalo</label>
            <select id="regalo" name="regalo" required>
              <option value="">-- Seleccione un regalo --</option>
              <!-- Los values de los options estan determinados por el
                id_regalo de la base de datos -->
              <option value="2">Etiquetas</option>
              <option value="1">Pulseras</option>
              <option value="3">Plumas</option>
            </select>
          </div>
          <input type="button" name="" id="calcular" class="btn" value="Calcular">
        </div> <!-- .extras -->
        <div class="total">
          <p>Resumen:</p>
          <div id="lista-productos"></div>
          <p>Total:</p>
          <div id="suma-total"></div>
          <!-- Los campos ocultos nos permiten pasar información de una forma
            sencilla sin que el usuario la vea -->
          <input type="hidden" name="total_pedido" id="totalPedido">
          <input type="submit" value="Pagar" name="submit" id="btnRegistro" class="btn">
        </div> <!-- .total -->
      </div> <!-- .caja -->
    </div> <!-- .resumen -->

  </form>
</section>

<?php include_once 'includes/templates/footer.php'?>
