var videos = [];
$(document).ready(function () {
  $(".dropdown-toggle").dropdown();
  $(".carouselsection").carousel({
    quantity: 4,
    sizes: {
      900: 3,
      500: 1,
    },
  });

  $(".banner-video-youtube").each(function () {
    // console.log($(this).attr('data-video'));
    const datavideo = $(this).attr("data-video");
    const idvideo = $(this).attr("id");
    const playerDefaults = {
      autoplay: 0,
      autohide: 1,
      modestbranding: 0,
      rel: 0,
      showinfo: 0,
      controls: 0,
      disablekb: 1,
      enablejsapi: 0,
      iv_load_policy: 3,
    };
    const video = {
      videoId: datavideo,
      suggestedQuality: "hd1080",
    };
    videos[videos.length] = new YT.Player(idvideo, {
      videoId: datavideo,
      playerVars: playerDefaults,
      events: {
        onReady: onAutoPlay,
        onStateChange: onFinish,
      },
    });
  });

  function onAutoPlay(event) {
    event.target.playVideo();
    event.target.mute();
  }

  function onFinish(event) {
    if (event.data === 0) {
      event.target.playVideo();
    }
  }
  const tooltipTriggerList = document.querySelectorAll(
    '[data-bs-toggle="tooltip"]'
  );
  const tooltipList = [...tooltipTriggerList].map(
    (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
  );
});

document.addEventListener("DOMContentLoaded", () => {
  // Inicializar galería masonry si existe
  initGalleryMasonry();

  // Funcionalidad del menú hamburger
  const hamburger = document.querySelector('.hamburger');
  const navMenu = document.querySelector('.nav-menu');

  if (hamburger && navMenu) {
    hamburger.addEventListener('click', function() {
      hamburger.classList.toggle('active');
      navMenu.classList.toggle('active');
    });

    // Cerrar menú al hacer click en un enlace (en móvil)
    document.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        navMenu.classList.remove('active');
      });
    });

    // Cerrar menú al hacer click fuera de él
    document.addEventListener('click', function(event) {
      const isClickInsideNav = navMenu.contains(event.target);
      const isClickOnHamburger = hamburger.contains(event.target);
      
      if (!isClickInsideNav && !isClickOnHamburger && navMenu.classList.contains('active')) {
        hamburger.classList.remove('active');
        navMenu.classList.remove('active');
      }
    });
  }

  const animaciones = [
    "fade-up",
    //  "fade-down",
    /* "fade-left",
    "fade-right",
    "zoom-in",
    "zoom-out",
    "flip-left",
    "flip-right", */
  ];
  document.querySelectorAll("[data-aos]").forEach((element) => {
    const animacionAleatoria =
      animaciones[Math.floor(Math.random() * animaciones.length)];
    element.setAttribute("data-aos", animacionAleatoria);
  });

  AOS.init({
    // once: true,
    duration: 500,
  });

  /* ------------------------------------------------------ */
  /* --------------------- FORMULARIO CONTACTO---------------- */
  /* ------------------------------------------------------ */
  document
    .getElementById("form-contact")
    ?.addEventListener("submit", function (e) {
      e.preventDefault();
      const response = grecaptcha.getResponse();
      if (response.length === 0) {
        Swal.fire({
          icon: "warning",
          text: "Por favor, verifica que no eres un robot.",
          confirmButtonColor: "#5475a1",
          confirmButtonText: "Continuar",
        });
        grecaptcha.reset();
      } else {
        $(".loader-bx").addClass("show");

        let submitBtn = document.getElementById("submit-btn");
        // Deshabilitar botón y mostrar animación
        submitBtn.disabled = true;

        let formData = new FormData(this);
        let data = {};
        formData.forEach((value, key) => {
          data[key] = value;
        });

        fetch(this.getAttribute("action"), {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(data),
        })
          .then((response) => response.json())
          .then((data2) => {
            // console.log("Status:", data2.status); // Verifica el valor exacto

            if (data2.status.trim().toLowerCase() === "success") {
              Swal.fire({
                icon: "success",
                text: "Gracias por subscribirte, pronto recibirás más información.",
                confirmButtonColor: "#5475a1",
                confirmButtonText: "Continuar",
              });
            } else if (data2.status === "error") {
              Swal.fire({
                icon: "error",
                text:
                  data2.error ||
                  "Ha ocurrido un error, por favor intenta de nuevo.",
                confirmButtonColor: "#5475a1",
                confirmButtonText: "Continuar",
              });
            }
            document.getElementById("form-contact").reset();
            // Habilitar botón y ocultar animación
            submitBtn.disabled = false;
            $(".loader-bx").removeClass("show");
            grecaptcha.reset();
          })

          .catch((error) => {
            // console.log("Error:", error);

            Swal.fire({
              icon: "error",
              text: "Ha ocurrido un error, por favor intenta de nuevo.",
              confirmButtonColor: "#5475a1",
              confirmButtonText: "Continuar",
            });
            // Habilitar botón y ocultar animación
            submitBtn.disabled = false;
            $(".loader-bx").removeClass("show");
            grecaptcha.reset();
          });
      }
    });
});

document.addEventListener("DOMContentLoaded", () => {
  /* ------------------------------------------------------ */
  /* --------------------- FORMULARIO CONTACTO PÁGINA ---------------- */
  /* ------------------------------------------------------ */
  document
    .getElementById("form-contacto")
    ?.addEventListener("submit", function (e) {
      e.preventDefault();
      const response = grecaptcha.getResponse();
      if (response.length === 0) {
        Swal.fire({
          icon: "warning",
          text: "Por favor, verifica que no eres un robot.",
          confirmButtonColor: "#5475a1",
          confirmButtonText: "Continuar",
        });
        grecaptcha.reset();
      } else {
        $(".loader-bx").addClass("show");

        let submitBtn = document.getElementById("submit-btn-contacto");
        // Deshabilitar botón y mostrar animación
        submitBtn.disabled = true;
        submitBtn.innerHTML = "Enviando...";

        let formData = new FormData(this);
        let data = {};
        formData.forEach((value, key) => {
          data[key] = value;
        });

        fetch(this.getAttribute("action"), {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(data),
        })
          .then((response) => response.json())
          .then((data2) => {
            if (data2.status.trim().toLowerCase() === "success") {
              Swal.fire({
                icon: "success",
                text: "Gracias por contactarnos. Hemos recibido tu mensaje y te responderemos pronto.",
                confirmButtonColor: "#5475a1",
                confirmButtonText: "Continuar",
              });
              document.getElementById("form-contacto").reset();
            } else if (data2.status === "error") {
              Swal.fire({
                icon: "error",
                text:
                  data2.error ||
                  "Ha ocurrido un error, por favor intenta de nuevo.",
                confirmButtonColor: "#5475a1",
                confirmButtonText: "Continuar",
              });
            }

            // Habilitar botón y restaurar texto
            submitBtn.disabled = false;
            submitBtn.innerHTML = "Enviar Mensaje";
            $(".loader-bx").removeClass("show");
            grecaptcha.reset();
          })
          .catch((error) => {
            Swal.fire({
              icon: "error",
              text: "Ha ocurrido un error, por favor intenta de nuevo.",
              confirmButtonColor: "#5475a1",
              confirmButtonText: "Continuar",
            });
            // Habilitar botón y restaurar texto
            submitBtn.disabled = false;
            submitBtn.innerHTML = "Enviar Mensaje";
            $(".loader-bx").removeClass("show");
            grecaptcha.reset();
          });
      }
    });
});

/* ------------------------------------------------------ */
/* --------------------- GALERÍA MASONRY --------------- */
/* ------------------------------------------------------ */

// Función para inicializar Fancybox en la galería
function initFancyboxGallery() {
  if (typeof Fancybox !== "undefined") {
    // Destruir instancias previas
    Fancybox.destroy();

    // Inicializar Fancybox con configuración específica
    Fancybox.bind("[data-fancybox]", {
      initialSize: "fit",
      // Configuraciones adicionales para mejor rendimiento
      hideScrollbar: false,
      placeFocusBack: false,
      trapFocus: false,
    });
  }
}

// Función para distribuir elementos en masonry
function initMasonry() {
  const gallery = document.getElementById("masonryGallery");
  if (!gallery) return; // Solo ejecutar si estamos en la página de galería

  const columns = gallery.querySelectorAll(".masonry-column");
  const items = document.querySelectorAll(
    ".masonry-items-hidden .masonry-item"
  );

  // Limpiar columnas
  columns.forEach((col) => (col.innerHTML = ""));

  // Distribuir elementos en columnas usando movimiento en lugar de clonación
  items.forEach((item, index) => {
    const columnIndex = index % columns.length;
    // Mover el elemento original en lugar de clonarlo
    columns[columnIndex].appendChild(item);
  });

  // Reinicializar Fancybox después de redistribuir
  setTimeout(initFancyboxGallery, 100);
}

// Función para redistribuir en responsive
function redistributeOnResize() {
  const gallery = document.getElementById("masonryGallery");
  if (!gallery) return;

  const currentColumns =
    window.innerWidth <= 480 ? 1 : window.innerWidth <= 768 ? 2 : 3;

  // Verificar si realmente necesitamos redistribuir
  const existingColumns = gallery.querySelectorAll(".masonry-column").length;
  if (existingColumns === currentColumns) return;

  // Mover todos los elementos de vuelta al contenedor oculto antes de redistribuir
  const hiddenContainer = document.querySelector(".masonry-items-hidden");
  const allItems = gallery.querySelectorAll(".masonry-item");

  // Mover elementos de vuelta al contenedor oculto
  allItems.forEach((item) => {
    hiddenContainer.appendChild(item);
  });

  // Actualizar número de columnas
  gallery.innerHTML = "";
  for (let i = 0; i < currentColumns; i++) {
    const column = document.createElement("div");
    column.className = "masonry-column";
    gallery.appendChild(column);
  }

  // Redistribuir elementos
  initMasonry();
}

// Inicializar galería masonry
function initGalleryMasonry() {
  if (document.getElementById("masonryGallery")) {
    initMasonry();

    // Redistribuir en cambios de tamaño con debounce para mejor rendimiento
    let resizeTimeout;
    window.addEventListener("resize", () => {
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(redistributeOnResize, 100);
    });
  }
}

initGalleryMasonry();

// Función para recargar reCAPTCHA con nuevo idioma
function reloadRecaptcha(language) {
  // Verificar si reCAPTCHA está disponible
  if (typeof grecaptcha !== 'undefined') {
    // Obtener todos los elementos de reCAPTCHA
    const recaptchaElements = document.querySelectorAll('.g-recaptcha');
    
    recaptchaElements.forEach(function(element) {
      // Reset del reCAPTCHA actual
      try {
        grecaptcha.reset();
      } catch (e) {
        console.log('Error resetting reCAPTCHA:', e);
      }
    });
    
    // Recargar el script de reCAPTCHA con el nuevo idioma
    const existingScript = document.querySelector('script[src*="recaptcha/api.js"]');
    if (existingScript) {
      existingScript.remove();
    }
    
    // Crear nuevo script con el idioma correcto
    const newScript = document.createElement('script');
    newScript.src = `https://www.google.com/recaptcha/api.js?hl=${language}`;
    newScript.async = true;
    newScript.defer = true;
    document.head.appendChild(newScript);
  }
}

// Detectar cambios de idioma y recargar reCAPTCHA si es necesario
document.addEventListener('DOMContentLoaded', function() {
  // Observar cambios en el atributo lang del documento
  const observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
      if (mutation.type === 'attributes' && mutation.attributeName === 'lang') {
        const newLang = document.documentElement.getAttribute('lang');
        reloadRecaptcha(newLang);
      }
    });
  });
  
  observer.observe(document.documentElement, { 
    attributes: true, 
    attributeFilter: ['lang'] 
  });
});
