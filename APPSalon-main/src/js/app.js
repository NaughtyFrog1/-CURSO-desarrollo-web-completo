/* eslint-disable max-classes-per-file */
// eslint-disable-next-line no-unused-expressions
`use strict`;

class Alert {
  constructor(id, place) {
    this.id = id;
    this.place = place;
  }

  show(mensaje, tipo = 'error', force = false) {
    const boxExists = this.place.contains(
      this.place.querySelector('.alert-box')
    );
    const alertExists = this.place.contains(
      this.place.querySelector(`p[data-alert=${this.id}]`)
    );

    if (!boxExists) {
      const box = document.createElement('DIV');
      box.classList.add('alert-box');
      this.place.appendChild(box);
    }

    if (!alertExists) {
      const p = document.createElement('P');
      p.textContent = mensaje;
      p.classList.add(
        'alert',
        tipo === 'error' ? 'alerta--error' : 'alerta--success'
      );
      p.dataset.alert = this.id;
      this.place.querySelector('.alert-box').appendChild(p);
    } else if (force) {
      this.place.querySelector(
        `p[data-alert=${this.id}]`
      ).textContent = mensaje;
    }
  }

  remove() {
    const alertExists = this.place.contains(
      this.place.querySelector(`p[data-alert=${this.id}]`)
    );

    if (alertExists) {
      this.place.querySelector(`p[data-alert=${this.id}]`).remove();
    }
  }
}

class Panel {
  constructor(panel) {
    this.id = document.getElementById(panel);
    this.width = getComputedStyle(document.documentElement).getPropertyValue(
      `--panel-width--${panel}`
    );
    this.tipo = document.querySelector(`#${panel} .side-panel__tipo`);
    this.siguiente = document.getElementById(`btn-${panel}`);
    this.anterior = document.getElementById(`btn-${panel}-atras`);
  }

  mostrar() {
    this.id.style.transform = 'translateX(0)';
  }

  ocultar() {
    this.id.style.transform = `translateX(${this.width})`;
  }
}

// eslint-disable-next-line func-names
(function () {
  const serviciosPanel = new Panel('servicios');
  const info = new Panel('info');
  const resumen = new Panel('resumen');
  const cita = {
    nombre: '',
    apellido: '',
    email: '',
    fecha: '',
    hora: '',
    servicios: [],
  };

  const inicio = {
    id: document.getElementById('inicio'),
    overlay: document.querySelector('#inicio .overlay'),
    siguiente: document.getElementById('btn-inicio'),
    mostrar() {
      this.id.style.transform = 'translateX(0)';
      this.overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.33)';
    },
    ocultar() {
      this.id.style.transform = `translateX(calc(${serviciosPanel.width} * -1)`;
      this.overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.66)';
    },
  };

  function crearResumen() {
    const content = resumen.id.querySelector('.content__main');
    const alerts = {
      inputs: new Alert('inputs', content),
      serv: new Alert('serv', content),
    };
    const vacios = [];

    console.log(cita);

    // Validar que esten todos los datos

    Object.keys(cita).forEach((element) => {
      if (cita[element] === '') {
        vacios.push(element);
      }
    });

    if (vacios.length > 0) {
      alerts.inputs.show(`Faltan datos de ${vacios.join(', ')}`, 'error', true);
    } else {
      alerts.inputs.remove();
    }

    if (cita.servicios.length === 0) {
      alerts.serv.show('No se eligió ningún servicio');
    } else {
      alerts.serv.remove();
    }

    // Crear el resumen

    const resumenContent = content.querySelector('.resumen__content');
    if (resumenContent !== null) {
      resumenContent.remove();
    }

    if (vacios.length === 0 && cita.servicios.length > 0) {
      const resumenDiv = document.createElement('DIV');
      resumenDiv.classList.add('resumen__content');
      resumenDiv.innerHTML = `
        <h3>Tus datos de contacto</h3> 
      `;
      content.appendChild(resumenDiv);

      const nombre = document.createElement('P');
      nombre.classList.add('resumen__dato');
      nombre.innerHTML = `<span>Nombre:</span> ${cita.nombre} ${cita.apellido}`;
      resumenDiv.appendChild(nombre);

      const email = document.createElement('P');
      email.classList.add('resumen__dato');
      email.innerHTML = `<span>Email</span> ${cita.email}`;
      resumenDiv.appendChild(email);

      const fecha = document.createElement('P');
      fecha.classList.add('resumen__dato');
      fecha.innerHTML = `<span>Fecha</span> ${cita.fecha}`;
      resumenDiv.appendChild(fecha);

      const hora = document.createElement('P');
      hora.classList.add('resumen__dato');
      hora.innerHTML = `<span>Hora</span> ${cita.hora}`;
      resumenDiv.appendChild(hora);

      resumenDiv.innerHTML += `
        <h3>Servicios</h3>
      `;

      const serviciosUL = document.createElement('UL');
      serviciosUL.classList.add('resumen__servicios');
      cita.servicios.forEach((servicio) => {
        serviciosUL.innerHTML += `
          <li class="resumen__servicio">
            <span class="resumen__servicio__nombre">
              ${servicio.nombre}
            </span>
            <span class="resumen__servicio__precio">
              ${servicio.precio}
            <span>
          </li>
        `;
      });

      const precios = cita.servicios.map((servicio) => {
        const precio = servicio.precio.split('$');
        return parseInt(precio[1].trim(), 10);
      });

      const total = precios.reduce((resultado, precio) => resultado + precio);

      serviciosUL.innerHTML += `
        <li class="resumen__total resumen__servicio">
          <span class="total__total">Total</span>
          <span class="total__precio">$ ${total}</span>
        </li>
      `;

      resumenDiv.appendChild(serviciosUL);
    }
  }

  function eventListenersPanels() {
    inicio.siguiente.addEventListener('click', () => {
      serviciosPanel.mostrar();
      inicio.ocultar();
    });
    inicio.overlay.addEventListener('click', () => {
      serviciosPanel.ocultar();
      info.ocultar();
      resumen.ocultar();
      inicio.mostrar();
    });

    serviciosPanel.siguiente.addEventListener('click', () => {
      info.mostrar();
    });
    serviciosPanel.anterior.addEventListener('click', () => {
      serviciosPanel.ocultar();
      inicio.mostrar();
    });
    serviciosPanel.tipo.addEventListener('click', () => {
      info.ocultar();
      resumen.ocultar();
    });

    info.siguiente.addEventListener('click', () => {
      resumen.mostrar();
      crearResumen();
    });
    info.anterior.addEventListener('click', () => {
      info.ocultar();
    });
    info.tipo.addEventListener('click', () => {
      resumen.ocultar();
    });

    resumen.anterior.addEventListener('click', () => {
      resumen.ocultar();
    });
  }

  function agregarServicio(datos) {
    const { servicios } = cita;
    cita.servicios = [...servicios, datos];
  }

  function eliminarServicio(id) {
    const { servicios } = cita;
    cita.servicios = servicios.filter((servicio) => servicio.id !== id);
  }

  async function listarServicios() {
    try {
      const url = 'includes/models/servicios.php';
      const response = await fetch(url);
      const db = await response.json();

      db.forEach((servicio) => {
        const { id, nombre, precio } = servicio;

        const nombreServicio = document.createElement('P');
        nombreServicio.textContent = nombre;
        nombreServicio.classList.add('servicio__nombre');

        const precioServicio = document.createElement('P');
        precioServicio.textContent = `$ ${precio}`;
        precioServicio.classList.add('servicio__precio');

        const divServicio = document.createElement('DIV');
        divServicio.classList.add('servicio');
        divServicio.dataset.id = id;
        divServicio.appendChild(nombreServicio);
        divServicio.appendChild(precioServicio);

        serviciosPanel.id
          .querySelector('.servicios__listado')
          .appendChild(divServicio);

        divServicio.onclick = (e) => {
          const elemento =
            e.target.tagName === 'P' ? e.target.parentElement : e.target;

          elemento.classList.toggle('servicio--seleccionado');

          if (elemento.classList.contains('servicio--seleccionado')) {
            const servicioDatos = {
              id: parseInt(elemento.dataset.id, 10),
              nombre: elemento.querySelector('.servicio__nombre').textContent,
              precio: elemento.querySelector('.servicio__precio').textContent,
            };
            agregarServicio(servicioDatos);
          } else {
            const idBorrar = parseInt(elemento.dataset.id, 10);
            eliminarServicio(idBorrar);
          }
        };
      });
    } catch (error) {
      // eslint-disable-next-line no-console
      console.log(error);
    }
  }

  function validarInput(tipo, patt) {
    const input = document.querySelector(`#${tipo}`);
    const alert = new Alert(tipo, info.id.querySelector('.content__main'));

    input.addEventListener('input', (e) => {
      const value = e.target.value.trim();

      if (patt.test(value)) {
        cita[tipo] = value;
        alert.remove();
      } else {
        cita[tipo] = '';
        alert.show(`${tipo} inválido`);
      }
    });
  }

  function formatearFecha(date) {
    const y = date.getFullYear();
    const m = date.getMonth() + 1; // JS empieza en 0
    const d = date.getDate();

    const mm = m < 10 ? `0${m}` : m;
    const dd = d < 10 ? `0${d}` : d;

    return `${dd}/${mm}/${y}`;
  }

  function validarFecha(año, mes, dia) {
    const content = info.id.querySelector('.content__main');
    const alerts = {
      existe: new Alert('existe', content),
      anterior: new Alert('anterior', content),
      meses: new Alert('meses', content),
      finde: new Alert('finde', content),
      faltanDatos: new Alert('faltanDatos', content),
    };

    const status = {
      anterior: false,
      meses: false,
      finde: false,

      ok() {
        // Si todos los elementos estan en true devuelve true
        return !Object.values(this).includes(false);
      },
    };

    const inputDate = new Date(año, mes, dia);

    if ([año, mes, dia].includes('')) {
      // Si faltan datos
      alerts.faltanDatos.show('Falta completar campos de la fecha');
    } else {
      alerts.faltanDatos.remove();

      if (
        año !== inputDate.getFullYear().toString() ||
        mes !== inputDate.getMonth().toString() ||
        dia !== inputDate.getDate().toString()
      ) {
        // Si la fecha no existe (31 de febrero por ejemplo)
        alerts.existe.show('La fecha es incorrecta');
      } else {
        alerts.existe.remove();

        // Ahora que sabemos que estan todos los datos y que la fecha existe
        // podemos terminar de validar los datos, usando inputDate
        // con la certeza de que su fecha es correcta

        const hoy = new Date();
        const diff = inputDate - hoy;

        // Comprobar que no sea un fin de semana
        if ([0, 6].includes(inputDate.getDay())) {
          alerts.finde.show('La fecha debe ser un dia de semana');
          status.finde = false;
        } else {
          alerts.finde.remove();
          status.finde = true;
        }

        // Comprobar que sea a partir del día siguiente
        // (1000 * 60 * 60 * 24) == milisegundos de 1 día
        if (diff / (1000 * 60 * 60 * 24) < 0.5) {
          alerts.anterior.show(
            'La fecha de la cita debe ser a partir de mañana'
          );
          status.anterior = false;
        } else {
          alerts.anterior.remove();
          status.anterior = true;
        }

        // Comprobar que el turno no sea para dentro de más de 6 meses
        if (diff / (1000 * 60 * 60 * 24) > 30 * 6) {
          alerts.meses.show(
            'La cita no puede ser para dentro de más de seis meses'
          );
          status.meses = false;
        } else {
          alerts.meses.remove();
          status.meses = true;
        }

        cita.fecha = status.ok() ? formatearFecha(inputDate) : '';
      }
    }
  }

  function crearFecha() {
    const hoy = new Date();
    const input = {
      dia: document.querySelector('#fechaDia'),
      mes: document.querySelector('#fechaMes'),
      año: document.querySelector('#fechaAño'),
    };

    // Crear opciones para día
    for (let i = 1; i <= 31; i += 1) {
      const option = document.createElement('OPTION');
      option.value = i;
      option.innerText = i;

      input.dia.appendChild(option);
    }

    // Crear opciones para mes
    for (let i = 1; i <= 12; i += 1) {
      const option = document.createElement('OPTION');
      option.value = i - 1; // Los meses en JS empiezan en 0
      option.innerText = i;

      input.mes.appendChild(option);
    }

    // Crear opciones para año
    if (hoy.getMonth() >= 5) {
      const año = hoy.getFullYear();

      for (let i = año; i <= año + 1; i += 1) {
        const option = document.createElement('OPTION');
        option.value = i;
        option.innerText = i;

        input.año.appendChild(option);
      }
    } else {
      const option = input.año.querySelector('option');
      option.innerText = hoy.getFullYear();
      option.value = hoy.getFullYear();
      input.año.style.backgroundColor = 'hsl(0deg 0% 12%)';
      input.año.disabled = true;
    }

    Object.keys(input).forEach((key) => {
      input[key].addEventListener('input', () => {
        validarFecha(input.año.value, input.mes.value, input.dia.value);
      });
    });
  }

  function validarHora(hora, mins) {
    const content = info.id.querySelector('.content__main');
    const alerts = {
      faltanDatos: new Alert('faltan', content),
      hora: new Alert('hora', content),
      mins: new Alert('mins', content),
    };

    const status = {
      hora: false,
      mins: false,

      ok() {
        return !Object.values(this).includes(false);
      },
    };

    if ([hora, mins].includes('')) {
      alerts.faltanDatos.show('Falta completar campos de la hora');
    } else {
      alerts.faltanDatos.remove();

      if ((hora > 7 && hora < 13) || (hora > 14 && hora < 20)) {
        alerts.hora.remove();
        status.hora = true;
      } else {
        alerts.hora.show('La hora no esta dentro del horario');
      }

      if (['00', '15', '30', '45'].includes(mins)) {
        alerts.mins.remove();
        status.mins = true;
      } else {
        alerts.mins.show('Minutos no validos');
      }
    }

    if (status.ok()) {
      cita.hora = `${hora}:${mins}`;
    } else {
      cita.hora = '';
    }
  }

  function crearHora() {
    const hora = document.querySelector('#horaHora');
    const mins = document.querySelector('#horaMinutos');
    const horaGroup = document.querySelectorAll('#horaHora optgroup');

    for (let h = 8; h <= 12; h += 1) {
      const option = document.createElement('OPTION');
      option.value = h;
      option.innerText = h;

      horaGroup[0].appendChild(option);
    }

    for (let h = 15; h <= 19; h += 1) {
      const option = document.createElement('OPTION');
      option.value = h;
      option.innerText = h;

      horaGroup[1].appendChild(option);
    }

    const optionMins = document.createElement('OPTION');
    optionMins.value = '00';
    optionMins.innerText = '00';

    mins.appendChild(optionMins);

    for (let m = 15; m < 60; m += 15) {
      const option = document.createElement('OPTION');
      option.value = m;
      option.innerText = m;

      mins.appendChild(option);
    }

    hora.addEventListener('input', () => {
      validarHora(hora.value, mins.value);
    });
    mins.addEventListener('input', () => {
      validarHora(hora.value, mins.value);
    });
  }

  document.addEventListener('DOMContentLoaded', () => {
    const regexNombre = new RegExp('^([a-záéíóú]+[\\s]?){3,}$', 'i');
    const regexEmail = new RegExp('^[^\\s@]+@[^\\s@]+\\.[^\\s@]+$');

    eventListenersPanels();
    listarServicios();
    validarInput('nombre', regexNombre);
    validarInput('apellido', regexNombre);
    validarInput('email', regexEmail);
    crearFecha();
    crearHora();
  });
})();
