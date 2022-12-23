!(function () {
  `use strict`;
  
  function animationCardVentas() {
    const cards = document.querySelectorAll('.venta__lista .venta__card');

    function cardsHeight() {
      cards.forEach((card) => {
        const height = card.querySelector('.detalles__content').offsetHeight;
        const desc = card.querySelector('.card__detalles');
        desc.setAttribute('style', `--detalles-height: ${height}px`);
      });
    }
    
    cardsHeight();
    window.addEventListener('resize', cardsHeight);
  }

  function headerGlide() {
    const slides = document.querySelector('.header__glide .glide__slides');

    for (let i = 1; i < 7; i++) {
      const webp = document.createElement('source');
      webp.type = 'image/webp';
      webp.srcset = `build/images/header${i}.webp`;

      const imgsrc = document.createElement('source');
      imgsrc.type = 'image/jpeg';
      imgsrc.srcset = `build/images/header${i}.jpg`;

      const img = document.createElement('img');
      img.alt = `Headaer ${i}`;
      img.src = `build/images/header${i}.jpg`;

      const picture = document.createElement('picture');
      picture.appendChild(webp);
      picture.appendChild(imgsrc);
      picture.appendChild(img);

      const slide = document.createElement('li');
      slide.classList.add('glide__slide');
      slide.appendChild(picture);

      slides.appendChild(slide);
    }

    new Glide('.header__glide', {
      type: 'carousel',
      gap: 0,
      autoplay: 4000,
      hoverpause: false,
      keyboard: false,
      swipeThreshold: false,
      dragThreshold: false,
      animationDuration: 1250,

    }).mount();
  }

  function toggleNavbar() {
    const navbar = document.querySelector('#site__navbar');
    const btn = document.querySelector('#navbar__burger');
    const overlay = document.querySelector('#navbar__overlay');
    const collapse = document.querySelector('.navbar__collapse');
    let endresize;

    btn.addEventListener('click', () => {
      navbar.classList.add('site__navbar--open');
    });

    overlay.addEventListener('click', () => {
      navbar.classList.remove('site__navbar--open');
    });

    window.addEventListener('scroll', () => {
      navbar.classList.remove('site__navbar--open');
    });

    window.addEventListener('resize', () => {
      clearTimeout(endresize);
      navbar.classList.remove('site__navbar--open');
      collapse.style.transition = 'none';

      endresize = setTimeout(() => {
        collapse.style.transition = 'left 0.3s ease-in-out';
      }, 350);
    });
  }

  function transparentNavbar() {
    const navbar = document.querySelector('#site__navbar');
    const header = document.querySelector('.site__header');
    const headerImgs = document.querySelectorAll('.site__header picture img');
    let endresize;

    let navbarHeight = navbar.offsetHeight;

    // Estilos iniciales
    header.style.marginTop = `-${navbarHeight + 16}px`;
    header.style.height = `calc(75vh + ${navbarHeight}px)`;
    headerImgs.forEach(headerImg => {
      headerImg.style.height = `calc(75vh + ${navbarHeight}px)`;
    });
    
    window.addEventListener('resize', () => {
      clearTimeout(endresize);
      navbar.style.transition = 'none';

      navbarHeight = navbar.offsetHeight;

      header.style.marginTop = `-${navbarHeight + 16}px`;
      header.style.height = `calc(75vh + ${navbarHeight}px)`;
      headerImgs.forEach(headerImg => {
        headerImg.style.height = `calc(75vh + ${navbarHeight}px)`;
      });

      endresize = setTimeout(() => {
        navbar.style.transition = 'all .35s linear';
      }, 400);
    });

    window.addEventListener('scroll', () => {
      const currentScrollPos = window.pageYOffset;
      
      if (currentScrollPos > navbarHeight) {
        navbar.classList.remove('site__navbar--transparent');
      } else {
        navbar.classList.add('site__navbar--transparent');
      }
    });
  }

  function formEventos() {
    const form = document.querySelector('.form');
    const inputText = form.querySelectorAll('.input--text');
    const inputRadio = form.querySelectorAll('.input--radio');

    inputText.forEach(input => {
      input.addEventListener('blur', e => {
        const parent = e.target.parentElement;
        const label = parent.children[1];

        if (e.target.value !== '') {
          parent.classList.remove('input-group--error');
          label.classList.add('label--active');
        } else {
          parent.classList.add('input-group--error');
          label.classList.remove('label--active');
        }
      });
    });

    inputRadio.forEach(input => {
      input.addEventListener('click', e => {
        e.target.parentElement.classList.remove('input-group--error');
      });
    });
  }

  function validarVacios(form) {
    const inputText = form.querySelectorAll('.input--text');
    let sinVacios = true;

    inputText.forEach(input => {
      if (input.value === '') {
        input.parentElement.classList.add('input-group--error');
        sinVacios = false;
      }
    });

    return sinVacios;
  }

  function validarRadio(form, name) {
    const inputRadio = form.querySelectorAll(`[name="${name}"]`);
    let checked = false

    inputRadio.forEach(input => {
      if (input.checked) {
        checked = true;
      }
    });

    if (checked) {
      inputRadio[0].parentElement.classList.remove('input-group--error');
    } else {
      inputRadio[0].parentElement.classList.add('input-group--error');
    }

    return checked;
  }

  function formContacto() {
    const form = document.querySelector('form.form--contacto');

    form.addEventListener('submit', e => {

      let vacios = validarVacios(form);
      let radio1 = validarRadio(form, 'compra-venta');
      let radio2 = validarRadio(form, 'metodo');
      const alert = new Alert('form-contacto', form);

      if (vacios && radio1 && radio2){
        alert.remove();
        // Enviar datos
      } else {
        e.preventDefault();
        alert.show('Todos los campos deben estar completos');
      }
    });
  }

  function formCrear() {
    const form = document.querySelector('form.form--crear'); 
    const inputs = form.querySelectorAll('.input--text');

    // Comprobar los campos del formulario con informacion previa
    inputs.forEach(input => {
      const parent = input.parentElement;
      const label = parent.children[1];
  
      if (input.value !== '') {
        label.classList.add('label--active');
      }
    });
  }

  function formLogin() {
    const form = document.querySelector('form.form--login'); 
    const inputs = form.querySelectorAll('.input--text');

    // Comprobar los campos del formulario con informacion previa
    inputs.forEach(input => {
      const parent = input.parentElement;
      const label = parent.children[1];
      if (input.value !== '') {
        label.classList.add('label--active');
      }
    });
  }


  document.addEventListener('DOMContentLoaded', () => {
    toggleNavbar();

    if (document.querySelector('body#index') !== null) {
      headerGlide();
      transparentNavbar();
    }

    if (document.querySelector('.venta') !== null) {
      animationCardVentas();
    }

    if (document.querySelector('.form') !== null) {
      formEventos();
    }

    if (document.querySelector('form.form--contacto') !== null) {
      formContacto();
    }

    if (document.querySelector('form.form--crear') !== null) {
      formCrear();
    }

    if (document.querySelector('form.form--login') !== null) {
      formLogin();
    }
  });
}());
