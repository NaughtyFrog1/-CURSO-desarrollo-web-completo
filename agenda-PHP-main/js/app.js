const formularioContactos = document.querySelector('#contacto'),
      listadoContacto = document.querySelector('#listado-contactos tbody'),
      buscador = document.querySelector('#buscar');

eventListeners();

function eventListeners() {
  formularioContactos.addEventListener('submit', leerFormulario);

  if (listadoContacto) {
    listadoContacto.addEventListener('click', eliminarContacto);
  }

  buscador.addEventListener('input', buscarContacto); 

  numeroContactos();
}

function leerFormulario(e) {
  e.preventDefault();

  const nombre   = document.querySelector('#nombre').value,
        empresa = document.querySelector('#empresa').value,
        telefono = document.querySelector('#telefono').value,
        accion   = document.querySelector('#accion').value;

  if (nombre === '' || empresa === '' || telefono === '') {
    mostarNotificacion(
      'Todos los campos son obligatorios', 'notificacion-error'
    );
  } else {
    const infoContacto = new FormData();
    infoContacto.append('nombre', nombre);
    infoContacto.append('empresa', empresa);
    infoContacto.append('telefono', telefono);
    infoContacto.append('accion', accion);

    // El spread operator '...' permite a un elemento iterable ser expandido
    // en lugares donde cero o más argumentos son esperados, o a un objeto ser
    // expandido en lugares donde cero o más pares de valores clave son
    // esperados
    // console.log(...infoContacto);

    if (accion === 'crear') {
      insertarBD(infoContacto);
    } else {
      const idRegistro = document.querySelector('#id').value;

      infoContacto.append('id', idRegistro);
      actualizarRegistro(infoContacto);
    }
  }
}

function eliminarContacto(e) {
  if (e.target.parentElement.classList.contains('btn-borrar')) {
    const id = e.target.parentElement.getAttribute('data-id');
    
    const respuesta = confirm('Desea eliminar el contacto?')
    if (respuesta) {
      const xhr = new XMLHttpRequest();

      xhr.open(
        'GET',
        `inc/modelos/modelo-contactos.php?id=${id}&accion=borrar`,
        true
      );

      xhr.onload = function() {
        if (this.status === 200) {
          const resultado = JSON.parse(xhr.responseText);

          if(resultado.respuesta === 'correcto') {
            e.target.parentElement.parentElement.parentElement.remove();
            mostarNotificacion(
              'Contacto eliminado satisfactoriamente', 
              'notificacion-correcto'
            );
            numeroContactos();
          } else {
            mostarNotificacion('Ocurrio un error', 'notificacion-error');
          }
        }
      }

      xhr.send();
    }
  }
}

function insertarBD(datos) {
  // 1. Crear el objeto
  const xhr = new XMLHttpRequest();

  // 2. abrir la conexión
  xhr.open('POST', 'inc/modelos/modelo-contactos.php', true);

  // 3. pasar los datos
  xhr.onload = function() {
    if(this.status === 200) {
      const respuesta = JSON.parse(xhr.responseText);

      // Insertar un nuevo elemento en la tabla
      const nuevoContacto = document.createElement('tr');
      nuevoContacto.innerHTML = `
        <td>${respuesta.datos.nombre}</td>
        <td>${respuesta.datos.empresa}</td>
        <td>${respuesta.datos.telefono}</td>
      `;

 
      // Botón Editar
      const iconoEditar = document.createElement('i');
      iconoEditar.classList.add('fas', 'fa-pen');

      const btnEditar = document.createElement('a');
      btnEditar.appendChild(iconoEditar);
      btnEditar.href = `editar.php?id=${respuesta.datos.id}`;
      btnEditar.classList.add('btn', 'btn-editar');


      // Botón Eliminar
      const iconoEliminar = document.createElement('i');
      iconoEliminar.classList.add('fas', 'fa-trash');

      const btnEliminar = document.createElement('button');
      btnEliminar.appendChild(iconoEliminar);
      btnEliminar.setAttribute('data-id', respuesta.datos.id);
      btnEliminar.classList.add('btn', 'btn-borrar');


      // Agregar los botones a la tabla
      const contenedorAcciones = document.createElement('td');
      contenedorAcciones.appendChild(btnEditar);
      contenedorAcciones.appendChild(btnEliminar);

      nuevoContacto.appendChild(contenedorAcciones)
      listadoContacto.appendChild(nuevoContacto);


      // Resetear formulario
      document.querySelector('form#contacto').reset()      

      mostarNotificacion(
        'Contacto creado exitosamente', 'notificacion-correcto'
      );
      numeroContactos();
    }
  }

  // 4. enviar los datos
  xhr.send(datos);

}

function mostarNotificacion(mensaje, clase) {
  const notificacion = document.createElement('div');
  notificacion.classList.add('notificacion', 'sombra-s', 'rounded-s', clase);
  notificacion.textContent = mensaje;

  formularioContactos.insertBefore(
    notificacion, document.querySelector('form legend')
  );

  setTimeout(() => {
    notificacion.classList.add('visible');

    setTimeout(() => {
      notificacion.classList.remove('visible');
      setTimeout(() => {
        notificacion.remove();
      }, 350);  // Similar tiempo transition
    }, 3000)
  }, 100);
}

function actualizarRegistro(datos) {
  const xhr = new XMLHttpRequest();

  xhr.open('POST', 'inc/modelos/modelo-contactos.php', true);

  xhr.onload = function() {
    if (this.status === 200) {
      const respuesta = JSON.parse(xhr.responseText);

      if (respuesta.respuesta === 'correcto') {
        mostarNotificacion(
          'Contacto editado correctamente', 'notificacion-correcto'
        );
      } else {
        mostarNotificacion(
          'Ocurrio un error', 'notificacion-error'
        );
      }
    }

    setTimeout(() => {
      window.location.href = 'index.php';
    }, 4000);
  }

  xhr.send(datos);
}

function buscarContacto(e) {
  const expresion = new RegExp(e.target.value, 'i'),
        registros = document.querySelectorAll('#listado-contactos tbody tr');

  registros.forEach(registro => {
    registro.style.display = 'none';
    if (
      registro.childNodes[1].textContent.replace(/\s/g, ' ')
        .search(expresion) != -1
    ) {
      registro.style.display = 'table-row';
    }
    numeroContactos();
  });

}

function numeroContactos() {
  const totalContactos = document.querySelectorAll('#listado-contactos tbody tr'),
        contenedorNumero = document.querySelector('.total-contactos span');

  const conContactos = document.querySelector('#con-contactos'),
        sinContactos = document.querySelector('#sin-contactos');

  let total = 0;

  // Contar contactos que coinciden con la busqueda
  totalContactos.forEach(contacto => {
    if (
      contacto.style.display === '' || contacto.style.display === 'table-row') 
    {
      total++;
    }
  });
  contenedorNumero.textContent = total;

  // Mostrar mensaje si no hay ningun contacto
  if (totalContactos.length === 0) {
    conContactos.style.display = 'none';
    sinContactos.style.display = 'block';
  } else {
    conContactos.style.display = 'block';
    sinContactos.style.display = 'none';
  }
}