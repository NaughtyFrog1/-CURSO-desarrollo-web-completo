


//* NAVEGACIÓN -------------------------------------------------------------->


let navbarHeight = $(`#site-navbar`).innerHeight(),
		windowHeight = $(window).height(),
		prevScollPos = $(window).scrollTop();


// Sticky and hidden navbar

$(window).scroll(function () {
	let currentScrollPos = $(window).scrollTop();

	// Sticky navbar
	if (currentScrollPos > windowHeight) {
		$(`#site-navbar`).addClass(`js_fixed`);
		$(`body`).css({ 'margin-top': (navbarHeight) + 'px' });
		$(`#site-navbar`).removeClass("js_nav-site-open")
	} else {
		$(`#site-navbar`).removeClass(`js_fixed`);
		$(`body`).css({ 'margin-top': '0' });
	}

	// Hidden navbar
	if ($(`#site-navbar.js_fixed`).length != 0) {
		if (prevScollPos > currentScrollPos) {
			$(`#site-navbar.js_fixed`).css({ 'top': '0px' })
		} else {
			$(`#site-navbar.js_fixed`).css({ 'top': '-' + navbarHeight + 'px' });
		}
		prevScollPos = currentScrollPos;
	}
});


// Burger menu

$(`.nav-burger`).click(function (e) {
  e.preventDefault();
  document.getElementById("site-navbar").classList.toggle("js_nav-site-open");
});


// Hide lateral links

$(`.nav-shadow`).click(function (e) {
	e.preventDefault();
	$(`#site-navbar`).removeClass("js_nav-site-open")
})



$(function () {	// DOMContentLoaded en jQuery
	'use strict';


	// Indicar cuál es la página actual

	$(`body#conferencias #site-navbar a:contains('Conferencias')`)
		.addClass('js_sitio-actual');

	$(`body#calendario #site-navbar a:contains('Calendario')`)
		.addClass('js_sitio-actual');

	$(`body#invitados #site-navbar a:contains('Invitados')`)
		.addClass('js_sitio-actual');

	$(`body#registro #site-navbar a:contains('Reservaciones')`)
		.addClass('js_sitio-actual');

		

	//* INDEX.php ------------------------------------------------------------->


	if (document.getElementById(`index`)) {


		// PROGRAMA DEL EVENTO

		$(`.programa-menu a:first`).addClass(`activo`);
		$(`.programa-evento .programa-info:first`).show();

		$(`.programa-menu a`).click(function (e) {
			e.preventDefault();
			let enlace = $(this).attr(`href`);

			$(`.programa-info`).hide();
			$(`.programa-menu a`).removeClass(`activo`);

			$(enlace).fadeIn(1000);
			$(this).addClass(`activo`)
		});


		// CONTADOR

		$(`.contador ul.contador-contenido li:nth-child(1) p.numero`)
			.animateNumber({ number: 6 }, 1200);

		$(`.contador ul.contador-contenido li:nth-child(2) p.numero`)
			.animateNumber({ number: 15 }, 1500);

		$(`.contador ul.contador-contenido li:nth-child(3) p.numero`)
			.animateNumber({ number: 3 }, 1300);

		$(`.contador ul.contador-contenido li:nth-child(4) p.numero`)
			.animateNumber({ number: 9 }, 1000);


		// MAPA LEAFLET

		var map = L.map('mapa').setView([-34.92143, -57.954587], 13);
		//             div#mapa          Coordenadas            Zoom

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

		L.marker([-34.92143, -57.954587]).addTo(map)
			.bindPopup(`GDLWEBCAMP <br><a href="https://www.google.com.ar/maps/place/Plaza+Moreno/@-34.9212808,-57.9552759,17.94z/data=!4m5!3m4!1s0x95a2e62e3fc93575:0x6ffaec3bf616e000!8m2!3d-34.9208532!4d-57.9542241" target="_blank">Abrir en maps</a>`)
			.openPopup()
		// .bindTooltip(`GDLWEBCAMP`)
		// .openTooltip();


		// NEWSLETTER
		$(`.btn_newsletter`).colorbox({
			speed: 250,
			rel: 'newsletter',
			close: '<i class="fas fa-times"></i>',
			inline: true, 
			width: '90%',
			maxWidth: '768px',
			fixed: true
		})

		// FALTAN

		$(`.faltan`).countdown(`2021/11/12 00:00:00`, function (event) {
			$(`#dias`).html(event.strftime(`%D`));
			$(`#horas`).html(event.strftime(`%H`));
			$(`#minutos`).html(event.strftime(`%M`));
			$(`#segundos`).html(event.strftime(`%S`));
		});
	}



	//* CONFERENCIAS.php ------------------------------------------------------>


	if (document.getElementById(`conferencias`)) {
		for (let i = 1; i <= 20; i++) {
			let enlace = document.createElement(`a`),
				imagen = document.createElement(`img`);

			imagen.setAttribute(`src`, `img/galeria/thumbs/${i}.jpg`);
			imagen.setAttribute(`alt`, `Imagen ${i}`);

			enlace.appendChild(imagen);
			enlace.setAttribute(`href`, `img/galeria/${i}.jpg`);
			enlace.setAttribute(`data-lightbox`, `galeria`);

			document.getElementById(`galeria`).appendChild(enlace);

			/* Resultado:
				<a href="img/galeria/$.jpg" data-lightbox="galeria">
				  <img src="img/galeria/thumbs/$.jpg" alt="Imagen $">
				</a> */
		}
	}
});



//* REGISTRO.php ------------------------------------------------------------>


if (document.getElementById(`registro`)) {

	// Datos de Usuario
	let nombre   = document.getElementById('nombre'),
			apellido = document.getElementById('apellido'),
			email    = document.getElementById('email');

	// Campos pases
	let paseUno  = document.getElementById('paseUno'),
			paseDos  = document.getElementById('paseDos'),
			paseTres = document.getElementById('paseTres');

	//Botones y divs
	let calcular       = document.getElementById('calcular'),
			errorDiv       = document.getElementById('error'),
			btnRegistro    = document.getElementById(`btnRegistro`),
			totalPagar     = document.getElementById('suma-total'),
			listaProductos = document.getElementById(`lista-productos`);

	// Extras
	let camisas   = document.getElementById(`camisas-evento`),
			etiquetas = document.getElementById(`etiquetas-evento`),
			regalo    = document.getElementById('regalo');

	
	btnRegistro.disabled = true;
	
	nombre.addEventListener(`blur`, validarCampos);
	apellido.addEventListener(`blur`, validarCampos);
	email.addEventListener(`blur`, validarCampos);
	email.addEventListener(`blur`, validarMail);

	paseUno.addEventListener(`input`, mostrarEventos);
	paseDos.addEventListener(`input`, mostrarEventos);
	paseTres.addEventListener(`input`, mostrarEventos);
	// change se activa cuano cambia el valor del input/textarea

	// (1)                      (2)          (3)
	calcular.addEventListener('click', calcularMontos);
	// Al clickear (2) sobre el elemento #calcular (1) 
	// se llevara a cabo la funcion (3)


	function validarCampos() {
		if (this.value == '') {
			errorDiv.style.display = 'block';
			errorDiv.innerHTML = 'Falta completar campos obligatorios';
			this.style.border = '1px solid red';
		} else {
			this.style.border = '1px solid #777';
			errorDiv.style.display = 'none';
		}
	}
	

	function validarMail() {
		if (this.value.indexOf("@") > -1) {
			this.style.border = '1px solid #777';
			errorDiv.style.display = 'none';
		} else {
			errorDiv.style.display = 'block';
			errorDiv.innerHTML = 'Email invalido';
			this.style.border = '1px solid red';
		}
	}


	function mostrarEventos() {
		let boletosUno = parseInt(paseUno.value, 10) || 0,
			boletosDos = parseInt(paseDos.value, 10) || 0,
			boletosTres = parseInt(paseTres.value, 10) || 0;

		let siElegidos = [],
			noElegidos = [];

		if (boletosUno > 0) {
			siElegidos.push('viernes');
		} else {
			noElegidos.push('viernes');
		}

		if (boletosDos > 0) {
			siElegidos.push('viernes', 'sabado');
		} else {
			noElegidos.push('viernes', 'sabado');
		}

		if (boletosTres > 0) {
			siElegidos.push('viernes', 'sabado', 'domingo');
		} else {
			noElegidos.push('viernes', 'sabado', 'domingo');
		}

		for (let i = 0; i < noElegidos.length; i++) {
			document.getElementById(noElegidos[i]).style.display = 'none';
		}

		for (let i = 0; i < siElegidos.length; i++) {
			document.getElementById(siElegidos[i]).style.display = 'block';
		}

		if (noElegidos.length < 6) {
			document.getElementById('avisoDias').style.display = 'none';
		} else {
			document.getElementById('avisoDias').style.display = 'block';
		}
	}


	function calcularMontos(event) {
		event.preventDefault();
		if (regalo.value === '') {
			alert("Debes elegir un regalo");
		} else {
			let boletosUno = parseInt(paseUno.value, 10) || 0,
					boletosDos = parseInt(paseDos.value, 10) || 0,
					boletosTres = parseInt(paseTres.value, 10) || 0;

			let cantCamisas = parseInt(camisas.value, 10) || 0,
					cantEtiquetas = parseInt(etiquetas.value, 10) || 0;

			let pagar = boletosUno * 30 + boletosDos * 45 + boletosTres * 50 
										+ (cantCamisas * 10) * 0.93 + cantEtiquetas * 2

			let listadoProductos = [];


			if (boletosUno == 1) {
				listadoProductos.push(`${boletosUno} pase por un día`);
			} else if (boletosUno > 1) {
				listadoProductos.push(`${boletosUno} pases por un día`);
			}

			if (boletosDos == 1) {
				listadoProductos.push(`${boletosDos} pase por dos días`);
			} else if (boletosDos > 1) {
				listadoProductos.push(`${boletosDos} pases por dos días`);
			}

			if (boletosTres === 1) {
				listadoProductos.push(`${boletosTres} pase completo`);
			} else if (boletosTres > 1) {
				listadoProductos.push(`${boletosTres} pases completos`);
			}

			if (cantCamisas === 1) {
				listadoProductos.push(`${cantCamisas} camisa`);
			} else if (cantCamisas > 1) {
				listadoProductos.push(`${cantCamisas} camisas`);
			}

			if (cantEtiquetas === 1) {
				listadoProductos.push(`${cantEtiquetas} paquete de etiquetas`);
			} else if (cantEtiquetas > 1) {
				listadoProductos.push(`${cantEtiquetas} paquetes de etiquetas`);
			}

			listaProductos.style.display = `block`;
			listaProductos.innerHTML = ``;
			// Limpia la lista de productos al presionar calcular para evitar acumular listas anteriores
			for (let i = 0; i < listadoProductos.length; i++) {
				listaProductos.innerHTML += listadoProductos[i] + `<br/>`
			}

			totalPagar.style.display = 'block';
			totalPagar.innerHTML = `$` + pagar.toFixed(2);

			btnRegistro.disabled = false;
			document.getElementById('totalPedido').value = pagar;
		}
	}
}



//* INVITADOS.php ----------------------------------------------------------->


if (document.getElementById('index') || document.getElementById(`invitados`)) {
	$(`a.invitado-info`).colorbox({
		speed: 250,
		rel: 'invitados',
		current: 'Invitade {current} de {total}',
		previous: '<i class="fas fa-arrow-left"></i>',
		next: '<i class="fas fa-arrow-right"></i>',
		close: '<i class="fas fa-times"></i>',
		inline: true, 
		width: '90%',
		maxWidth: '768px',
		fixed: true
	})
}
