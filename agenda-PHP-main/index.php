<?php 
  include_once 'inc/functions/funciones.php';
  include_once 'inc/layout/header.php';
?>

<div class="container-barra sombra-s">
  <h1>Agenda de contactos</h1>
</div>

<main class="jumbotron bg-amarillo container sombra rounded">
  <form action="#" id="contacto">
    <legend>Añada un contacto</legend>
    <p class="sub-legend">Todos los campos son obligatorios</p>

    <?php include_once 'inc/layout/formulario.php' ?>
    
  </form>
</main>

<section class="jumbotron bg-blanco container sombra rounded contactos">
  <div class="container-s">
    <h2>Contactos</h2>
    <div id="con-contactos" class="con-contactos">
      <input
        type="text"
        id="buscar"
        class="buscador sombra-s rounded"
        placeholder="Buscar contactos..."
      />

      <p class="total-contactos rounded-s"><span class="bg-primario">2</span> Contactos</p>

      <div class="container-tabla">
        <table id="listado-contactos" class="listado-contactos">
          <thead class="bg-primario">
            <tr>
              <th>Nombre</th>
              <th>Empresa</th>
              <th>Teléfono</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $contactos = obtenerContactos();

              if($contactos->num_rows) {
                foreach ($contactos as $contacto) {
            ?>
              <tr>
                <td><?php echo $contacto['nombre'] ?></td>
                <td><?php echo $contacto['empresa'] ?></td>
                <td><?php echo $contacto['telefono'] ?></td>
                <td>
                  <a 
                    class="btn-editar btn"
                    href="editar.php?id=<?php echo $contacto['id']?>"
                  >
                    <i class="fas fa-pen"></i>
                  </a>
                  <button
                    data-id="<?php echo $contacto['id']?>"
                    type="button" 
                    class="btn-borrar btn"
                  >
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
            <?php
                }
              } 
            ?> 
          </tbody>
        </table>
      </div> <!-- end .container-tabla -->
    </div> <!-- end .con-contactos -->
    <div id="sin-contactos" class="sin-contactos jumbotron rounded bg-grey"">
      <img src="img/undraw_phone_call_grmk.svg" alt="">
      <h2>Ups!</h2>
      <p class="subtitulo">Parece que todavía no has agregado ningún contacto</p>
      <p>
        Para agregar un nuevo contacto completa los campos del formulario
        anterior y haz click en añadir
      </p>
    </div>
  </div>
</section>

<?php include_once 'inc/layout/footer.php' ?>
