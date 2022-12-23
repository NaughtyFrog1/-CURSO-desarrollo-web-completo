<?php
  declare(strict_types = 1);
  require_once 'includes/functions/funciones.php';

  incluirHeader('Contacto - Bienes Raices');
?>

<header class="container container--lg">
  <h1>Contacto</h1>
  <picture>
    <source srcset="build/images/destacada3.webp" type="image/webp">
    <source srcset="build/images/destacada3.jpg" type="image/jpeg">
    <img src="build/images/destacada3.jpg" alt="Imagen contacto">
  </picture>
</header>

<main class="container container--sm">
  <form 
    action="#" 
    class="form form--contacto"
    method="GET"
    name="formulario_contacto"
  >
    <div>
      <fieldset class="form__fieldset">
        <h4 class="fieldset__title">Información personal</h4>
        <div class="form__row">
          <div class="input-group">
            <input
              class="input--text"
              id="nombre"
              name="nombre"
              type="text"
            />
            <label class="label" for="nombre">nombre</label>
          </div>
          <div class="input-group">
            <input
              class="input--text"
              id="apellido"
              name="apellido"
              type="text"
            />
            <label class="label" for="apellido">apellido</label>
          </div>
        </div>
        <div class="form__row">
          <div class="input-group">
            <input
              class="input--text"
              id="email"
              name="email"
              type="email"
            />
            <label class="label" for="email">email</label>
          </div>
          <div class="input-group">
            <input
              class="input--text"
              id="telefono"
              name="telefono"
              type="tel"
            />
            <label class="label" for="telefono">telefono</label>
          </div>
        </div>
        <div class="input-group">
          <textarea
            class="input--text"
            id="mensaje"
            name="mensaje"
            rows="5"
            type="text"
          ></textarea>
          <label class="label" for="mensaje">mensaje</label>
        </div>
      </fieldset>

      <fieldset class="form__fieldset">
        <h4 class="fieldset__title">Información sobre la propiedad</h4>
        <div class="form__row contacto__presupuesto">
          <div class="input-group input-group--radio">
            <input
              class="input--radio"
              id="compra"
              name="compra-venta"
              type="radio"
              value="compra"
            />
            <label class="label--radio" for="compra">compra</label>
            <input
              class="input--radio"
              id="venta"
              name="compra-venta"
              type="radio"
              value="venta"
            />
            <label class="label--radio" for="venta">venta</label>
          </div>
          <div class="input-group contacto__input-pres">
            <input
              class="input--text"
              id="presupuesto"
              name="presupuesto"
              type="number"
            />
            <label
              class="label"
              for="presupuesto"
            >
              Precio o presupuesto
            </label>
          </div>
        </div>
      </fieldset>

      <fieldset class="form__fieldset">
        <h4 class="fieldset__title">Método de contacto</h4>
        <p class="form__aclaracion">Como desea ser contactado</p>
        <div class="form__row">
          <div class="input-group input-group--radio">
            <input
              class="input--radio"
              id="metodo-telefono"
              name="metodo"
              type="radio"
              value="metodo-telefono"
            />
            <label class="label--radio" for="metodo-telefono">telefono</label>

            <input
              class="input--radio"
              id="metodo-email"
              name="metodo"
              type="radio"
              value="metodo-email"
            />
            <label class="label--radio" for="metodo-email">email</label>
          </div>
        </div>

        <p class="form__aclaracion">
          Si eligió telefono, elija en que fecha y horario
        </p>
        <div class="form__row">
          <div class="input-group">
            <input
              class="input--text"
              id="metodo-fecha"
              name="metodo-fecha"
              type="date"
            />
            <label class="label label--date" for="metodo-fecha">fecha</label>
          </div>
          <div class="input-group">
            <input
              class="input--text"
              id="metodo-hora"
              name="metodo-hora"
              type="time"
            />
            <label class="label label--date" for="metodo-hora">hora</label>
          </div>
        </div>
      </fieldset>

      <div class="form__row form__row--submit">
        <input
          class="btn btn--primario" 
          id="submit-contacto"
          type="submit"
          value="Enviar"
        />
      </div>
    </div>
  </form>
</main>

<?php incluirTemplate('footer') ?>
