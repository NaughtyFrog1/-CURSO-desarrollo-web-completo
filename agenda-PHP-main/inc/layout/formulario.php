<fieldset class="campos">
  <div class="campo">
    <label for="nombre">Nombre:</label>
    <input
      class="sombra-s"
      type="text"
      placeholder="Nombre contacto"
      id="nombre"
      value="<?php echo (isset($contacto['nombre'])) ? $contacto['nombre'] : '' ?>"
    />
  </div>
  <div class="campo">
    <label for="empresa">Empresa:</label>
    <input
      class="sombra-s"
      type="text"
      placeholder="Empresa contacto"
      id="empresa"
      value="<?php echo (isset($contacto['empresa'])) ? $contacto['empresa'] : '' ?>"
    />
  </div>
  <div class="campo">
    <label for="telefono">Teléfono:</label>
    <input
      class="sombra-s"
      type="tel"
      placeholder="Teléfono contacto"
      id="telefono"
      value="<?php echo (isset($contacto['telefono'])) ? $contacto['telefono'] : '' ?>"
    />
  </div>
</fieldset>

<div class="campo enviar">
  <?php
    // Si existe la variable telefono es porque estamos editando, sino es
    // porque estamos creando el contacto
    $textoBtn = (isset($contacto['telefono'])) ? 'Editar' : 'Añadir'; 
    $accion = (isset($contacto['telefono'])) ? 'editar' : 'crear'
  ?>
  <input 
    type="hidden" 
    id="accion" 
    value="<?php echo $accion ?>"
  />

  <?php if (isset($contacto['id'])) { ?>
    <input 
      type="hidden" 
      id="id" 
      value="<?php echo $contacto['id'] ?>"
    />
  <?php } ?>
  <input
    type="submit"
    class="sombra-s bg-primario"
    value="<?php echo $textoBtn ?>"
  />
</div>
