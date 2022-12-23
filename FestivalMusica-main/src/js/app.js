document.addEventListener("DOMContentLoaded", function () {
  scrollNav();
  stickyNav();
  crearGaleria();
});

function stickyNav() {
  const body = document.querySelector("body");
  const header = document.querySelector(".header");

  // Registrar el Intersection Observer
  const observer = new IntersectionObserver(function (entries) {
    if (entries[0].isIntersecting) {
      header.classList.remove("header--sticky");
      body.style.marginTop = `0px`;
    } else {
      body.style.marginTop = `${header.getBoundingClientRect().height}px`;
      header.classList.add("header--sticky");
    }
  });

  // Elemento a observar
  observer.observe(document.querySelector(".video"));
}

function scrollNav() {
  const enlaces = document.querySelectorAll(".nav-prpal a");
  enlaces.forEach(function (enlace) {
    enlace.addEventListener("click", function (e) {
      e.preventDefault();
      const section = document.querySelector(e.target.attributes.href.value);
      section.scrollIntoView({
        behavior: "smooth",
      });
    });
  });
}

function crearGaleria() {
  const galeria = document.querySelector("ul.galeria__imagenes");

  for (let i = 1; i < 13; i++) {
    const img = document.createElement("IMG");
    const li = document.createElement("LI");
    img.src = `build/img/thumb/${i}.webp`;
    img.alt = `Imagen ${i}`;
    img.dataset.imgId = i;
    img.onclick = mostrarImagen;
    li.appendChild(img);
    galeria.appendChild(li);
  }
}

function mostrarImagen(e) {
  const id = parseInt(e.target.dataset.imgId);

  const img = document.createElement("IMG");
  img.src = `build/img/grande/${id}.webp`;
  img.alt = `Imagen ${id}`;

  const overlay = document.createElement("DIV");
  overlay.classList.add("overlay");
  overlay.onclick = function (e) {
    if (e.target.classList.value === "overlay") {
      this.remove();
      body.classList.remove("no-scroll");
    }
  };
  overlay.appendChild(img);

  const body = document.querySelector("body");
  body.classList.add("no-scroll");
  body.appendChild(overlay);
}
