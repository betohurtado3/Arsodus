  <?php

  $tipo = $_GET["tipo"] ?? 'Nada';

  ?>



  <!-- Modal Cotizador -->
  <div id="cotizadorModal"
    class="fixed inset-0 bg-black bg-opacity-50 opacity-0 pointer-events-none transition-opacity duration-300 flex items-center justify-center z-50">
    <div id="cotizadorContent"
      class="bg-white w-full max-w-3xl mx-4 rounded-lg shadow-lg p-6 relative transform scale-95 opacity-0 transition-all duration-300">


      <!-- Cerrar modal -->
      <button id="cerrarModal"
        class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl">&times;</button>

      <!-- Header -->
      <h2 class="text-2xl font-bold mb-2" id="faseTitulo"></h2>
      <p class="text-gray-500 mb-6" id="faseDescripcion"></p>


      <div class="mb-6 flex items-center justify-between">

        <div class="flex flex-col items-center">
          <div id="paso1" class="w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300 border-2 border-blue-500 bg-blue-500 text-white">1</div>
          <span class="mt-2 text-xs font-medium text-gray-500">Tela</span>
        </div>

        <div class="flex-1 h-1 bg-gray-200 mx-2"></div>
        <div class="flex flex-col items-center">
          <div id="paso2" class="w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300 border-2 border-gray-400 text-gray-400">2</div>
          <span class="mt-2 text-xs font-medium text-gray-500">Técnica </span>
        </div>
        <div class="flex-1 h-1 bg-gray-200 mx-2"></div>

        <div class="flex flex-col items-center">
          <div id="paso3" class="w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300 border-2 border-gray-400 text-gray-400">3</div>
          <span class="mt-2 text-xs font-medium text-gray-500 hidden sm:block">Diseño & Cantidad</span>
          <span class="mt-2 text-xs font-medium text-gray-500 sm:hidden">Diseño</span>
        </div>

        <div class="flex-1 h-1 bg-gray-200 mx-2"></div>
        <div class="flex flex-col items-center">
          <div id="paso4" class="w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300 border-2 border-gray-400 text-gray-400">4</div>
          <span class="mt-2 text-xs font-medium text-gray-500">Resumen</span>
        </div>

        <div class="flex-1 h-1 bg-gray-200 mx-2"></div>
        <div class="flex flex-col items-center">
          <div id="paso5" class="w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300 border-2 border-gray-400 text-gray-400">5</div>
          <span class="mt-2 text-xs font-medium text-gray-500">Finalizar</span>
        </div>


      </div>

      <!-- Contenido Fase 1 -->
      <div id="fase1" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <!-- Algodón -->
        <div class="p-4 border rounded cursor-pointer hover:shadow relative overflow-hidden group"
          data-tela='{"nombre":"Algodón","precio":70}'>
          <!-- Fondo textura -->
          <div class="absolute inset-0 bg-[url('/Arsodus/assets/img/textures/Algodon.jpg')] bg-cover bg-center opacity-0 group-hover:opacity-80 transition-opacity duration-500"></div>
          <h3 class="font-semibold relative z-10">Algodón</h3>
          <p class="text-sm text-gray-500 relative z-10">Suavidad y comodidad. $60 - $80</p>
        </div>

        <!-- Algodón Poliéster -->
        <div class="p-4 border rounded cursor-pointer hover:shadow relative overflow-hidden group"
          data-tela='{"nombre":"Algodón poliéster","precio":65}'>
          <!-- Fondo textura -->
          <div class="absolute inset-0 bg-[url('/Arsodus/assets/img/textures/AlgoPol.png')] bg-cover bg-center opacity-0 group-hover:opacity-80 transition-opacity duration-500"></div>
          <h3 class="font-semibold relative z-10">Algodón Poliéster</h3>
          <p class="text-sm text-gray-500 relative z-10">Durabilidad y confort. $55 - $75</p>
        </div>

        <!-- Poliéster -->
        <div class="p-4 border rounded cursor-pointer hover:shadow relative overflow-hidden group"
          data-tela='{"nombre":"Poliéster","precio":50}'>
          <!-- Fondo textura -->
          <div class="absolute inset-0 bg-[url('/Arsodus/assets/img/textures/Poliester.jpg')] bg-cover bg-center opacity-0 group-hover:opacity-80 transition-opacity duration-500"></div>
          <h3 class="font-semibold relative z-10">Poliéster</h3>
          <p class="text-sm text-gray-500 relative z-10">Resistencia y ligereza. $40 - $60</p>
        </div>

        <!-- Algodón Poliéster Nylon -->
        <div class="p-4 border rounded cursor-pointer hover:shadow relative overflow-hidden group"
          data-tela='{"nombre":"Algodón poliéster nylon","precio":80}'>
          <!-- Fondo textura -->
          <div class="absolute inset-0 bg-[url('/Arsodus/assets/img/textures/Nylon.png')] bg-cover bg-center opacity-0 group-hover:opacity-80 transition-opacity duration-500"></div>
          <h3 class="font-semibold relative z-10">Algodón Poliéster Nylon</h3>
          <p class="text-sm text-gray-500 relative z-10">Máxima resistencia y estilo. $70 - $90</p>
        </div>

      </div>

      <!-- Contenido Fase 2 -->
      <div id="fase2" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 hidden">

        <!-- Serigrafía -->
        <div class="p-4 border rounded cursor-pointer hover:shadow relative overflow-hidden group"
          data-tecnica='{"nombre":"Serigrafía","extra":30}'>
          <!-- Fondo textura -->
          <div class="absolute inset-0 bg-[url('/Arsodus/assets/img/textures/Serigrafia.png')] bg-cover bg-center opacity-0 group-hover:opacity-50 transition-opacity duration-500"></div>
          <h3 class="font-semibold relative z-10">Serigrafía</h3>
          <p class="text-sm text-gray-500 relative z-10">Colores sólidos, +$30</p>
        </div>

        <!-- DTF -->
        <div class="p-4 border rounded cursor-pointer hover:shadow relative overflow-hidden group"
          data-tecnica='{"nombre":"DTF","extra":15}'>
          <div class="absolute inset-0 bg-[url('/Arsodus/assets/img/textures/DTF.jpg')] bg-cover bg-center opacity-0 group-hover:opacity-50 transition-opacity duration-500"></div>
          <h3 class="font-semibold relative z-10">DTF</h3>
          <p class="text-sm text-gray-500 relative z-10">Calidad de impresión, +$15</p>
        </div>

        <!-- Bordado -->
        <div class="p-4 border rounded cursor-pointer hover:shadow relative overflow-hidden group"
          data-tecnica='{"nombre":"Bordado","extra":40}'>
          <div class="absolute inset-0 bg-[url('/Arsodus/assets/img/textures/Bordado.png')] bg-cover bg-center opacity-0 group-hover:opacity-50 transition-opacity duration-500"></div>
          <h3 class="font-semibold relative z-10">Bordado</h3>
          <p class="text-sm text-gray-500 relative z-10">Durabilidad, +$40</p>
        </div>

        <!-- Sublimación -->
        <div class="p-4 border rounded cursor-pointer hover:shadow relative overflow-hidden group"
          data-tecnica='{"nombre":"Sublimación","extra":45}'>
          <div class="absolute inset-0 bg-[url('/Arsodus/assets/img/textures/sublimacion.jpg')] bg-cover bg-center opacity-0 group-hover:opacity-50 transition-opacity duration-500"></div>
          <h3 class="font-semibold relative z-10">Sublimación</h3>
          <p class="text-sm text-gray-500 relative z-10">Alta Calidad, +$45</p>
        </div>

        <!-- Vinil -->
        <div class="p-4 border rounded cursor-pointer hover:shadow relative overflow-hidden group"
          data-tecnica='{"nombre":"Vinil","extra":30}'>
          <div class="absolute inset-0 bg-[url('/Arsodus/assets/img/textures/vinil.avif')] bg-cover bg-center opacity-0 group-hover:opacity-50 transition-opacity duration-500"></div>
          <h3 class="font-semibold relative z-10">Vinil</h3>
          <p class="text-sm text-gray-500 relative z-10">Permanencia, +$30</p>
        </div>

      </div>

      <!-- Contenido Fase 3 -->
      <div id="fase3" class="hidden">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">

          <!-- Sección selección de color -->
          <div class="flex flex-col items-center p-4 bg-white rounded-lg shadow-md">
            <!-- Título principal -->
            <h2 class="text-xl font-semibold mb-4">Selecciona el color de las prendas</h2>

            <!-- Camiseta -->
            <svg id="previewCamiseta" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"
              class="w-32 h-32 mb-4 transition-colors duration-300">
              <path d="M50,40 L150,40 L170,70 L150,100 L150,180 L50,180 L50,100 L30,70 Z"
                stroke="black" stroke-width="3" fill="#ffffff" id="camisetaBase" />
            </svg>

            <!-- Colores rápidos -->
            <div class="flex gap-2 mb-4">
              <button type="button" class="w-8 h-8 rounded-full border border-gray-300"
                style="background-color: #ffffff;" data-color="#ffffff"></button>
              <button type="button" class="w-8 h-8 rounded-full border border-gray-300"
                style="background-color: #000000;" data-color="#000000"></button>
              <button type="button" class="w-8 h-8 rounded-full border border-gray-300"
                style="background-color: #2563eb;" data-color="#2563eb"></button>
              <button type="button" class="w-8 h-8 rounded-full border border-gray-300"
                style="background-color: #e11d48;" data-color="#e11d48"></button>
            </div>

            <!-- Botón y picker -->
            <div class="flex flex-col items-center gap-2">
              <div id="pickr-container" class="mt-1"></div>
              <button id="openColorPicker" type="button"
                class="px-3 py-1 rounded bg-blue-600 text-white text-sm hover:bg-blue-700">
                + Más colores
              </button>

            </div>

            <!-- Input oculto -->
            <input type="hidden" id="inputColor" name="color" value="#ffffff">
          </div>


          <!-- Lado derecho: inputs -->
          <div>
            <label class="block mb-2 font-medium">Sube tu diseño (JPEG, PNG o GIF)</label>
            <input type="file" id="inputImagen" accept=".jpg,.jpeg,.png,.gif"
              class="block w-full border rounded p-2 mb-4">


            <label class="block mb-2 font-medium">Cantidad</label>
            <input type="number" id="inputCantidad" min="10" value="10"
              class="block w-full border rounded p-2">
          </div>

        </div>
      </div>

      <!-- Contenido Fase 4 -->
      <div id="fase4" class="hidden mt-4 flex flex-col h-full">
        <h3 class="text-xl font-bold mb-4 text-center">Resumen de tu pedido</h3>

        <!-- Contenedor con scroll interno -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 flex-1 overflow-y-auto px-1">

          <!-- Detalles -->
          <div class="border rounded-lg p-3 shadow-sm bg-gray-50 space-y-2 text-sm">
            <p class="text-gray-700"><strong>Tela:</strong> <span id="resumenTela">—</span></p>
            <p class="text-gray-700"><strong>Técnica:</strong> <span id="resumenTecnica">—</span></p>
            <p class="text-gray-700"><strong>Cantidad:</strong> <span id="resumenCantidad">—</span></p>
            <p class="text-gray-700"><strong>Color:</strong> <span id="resumenColor">—</span></p>
            <p class="text-base font-semibold text-blue-700">
              Total: <span id="resumenTotal">—</span>
            </p>
          </div>

          <!-- Imagen subida -->
          <div class="border rounded-lg p-3 shadow-sm bg-white flex flex-col items-center justify-center">
            <p class="text-xs text-gray-500 mb-2">Diseño subido</p>
            <img id="resumenImg"
              class="max-h-40 w-auto rounded-lg border border-gray-200 shadow-md object-contain"
              src="https://dummyimage.com/300x300/ddd/aaa.png&text=Sin+imagen"
              alt="Diseño subido">
          </div>

          <!-- Camiseta con color seleccionado -->
          <div class="border rounded-lg p-3 shadow-sm bg-white flex flex-col items-center justify-center">
            <p class="text-xs text-gray-500 mb-2">Color seleccionado</p>
            <svg id="resumenCamiseta" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"
              class="w-24 h-24">
              <path d="M50,40 L150,40 L170,70 L150,100 L150,180 L50,180 L50,100 L30,70 Z"
                stroke="black" stroke-width="2" fill="#ffffff" id="resumenCamisetaBase" />
            </svg>
          </div>

        </div>
      </div>


      <!-- Contenido Fase 5 -->
      <div id="fase5" class="hidden mt-4">
        <h3 class="text-lg font-bold mb-4 text-center">Finaliza tu Cotización</h3>

        <form id="formCotizacion" action="Back/Cotizacion.php" method="POST" enctype="multipart/form-data" class="space-y-4 max-w-lg mx-auto">
          <!-- Nombre -->
          <input type="text" id="nombre" name="nombre" required
            placeholder="Tu nombre"
            class="w-full border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />

          <!-- Selector contacto -->
          <div class="flex items-center justify-center gap-6 text-sm">
            <label class="flex items-center gap-2 cursor-pointer">
              <input type="radio" name="contactoTipo" value="correo" checked />
              <span>Correo</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
              <input type="radio" name="contactoTipo" value="whatsapp" />
              <span>WhatsApp</span>
            </label>
          </div>

          <!-- Correo -->
          <input type="email" id="correo" name="correo" placeholder="Correo electrónico"
            class="w-full border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />

          <!-- WhatsApp -->
          <input type="tel" id="whatsapp" name="whatsapp" placeholder="+52 55 1234 5678"
            class="w-full border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-green-500 focus:outline-none hidden" />

          <!-- Mensaje -->
          <textarea id="mensaje" name="mensaje" rows="2"
            placeholder="Cuéntanos tu idea..."
            class="w-full border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>

          <!-- 🔥 Inputs ocultos para pasar datos del cotizador -->
          <input type="hidden" name="tela" id="inputTela" />
          <input type="hidden" name="tecnica" id="inputTecnica" />
          <input type="hidden" name="cantidad" id="inputCantidadHidden" />
          <input type="hidden" name="total" id="inputTotal" />

          <!-- Para la imagen -->
          <input type="hidden" name="imagenBase64" id="inputImagenHidden" />

          <!-- Botón enviar -->
          <button type="submit"
            class="btnContinuar w-full py-2 bg-blue-600 text-white rounded font-semibold hover:bg-blue-700 transition text-sm">
            Enviar Cotización
          </button>
        </form>

      </div>

      <!-- Navegación -->
      <div class="flex justify-between mt-6">
        <button id="btnAtras"
          class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Atrás</button>
        <button id="btnContinuar"
          class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Continuar</button>
      </div>

    </div>
  </div>

  <!-- ------------------------------ Scripts ------------------------------------------ -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- SwiperJS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script>
    /* ================================
   CONFIGURACIÓN DE SLIDER (Swiper)
================================ */
    var swiper = new Swiper(".testimonios-swiper", {
      slidesPerView: 3, // Siempre mostrar 3
      spaceBetween: 30,
      grabCursor: true,
      loop: true, // 🔥 Permite ir hacia la izquierda/derecha sin fin
      centeredSlides: true, // 🔥 Centra el slide activo
      navigation: {
        nextEl: ".custom-next",
        prevEl: ".custom-prev",
      },
      effect: "coverflow", // 🔥 Efecto tipo carrusel 3D
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 120,
        modifier: 1,
        slideShadows: false,
      },
      breakpoints: {
        0: {
          slidesPerView: 1
        },
        768: {
          slidesPerView: 2
        },
        1024: {
          slidesPerView: 3
        },
      },
    });

    /* ================================
       INFORMACIÓN DE FASES
    ================================ */
    const fasesInfo = {
      1: {
        titulo: "Selección de Material",
        descripcion: "Elige la tela ideal para tu prenda."
      },
      2: {
        titulo: "Selección de Servicio",
        descripcion: "Elige la técnica de personalización para tu diseño."
      },
      3: {
        titulo: "Diseño y Cant.",
        descripcion: "Sube tu diseño y especifica la cantidad de prendas."
      },
      4: {
        titulo: "Resumen de tu Cotización",
        descripcion: "Revisa los detalles de tu pedido antes de finalizar."
      },
      5: {
        titulo: "Finaliza tu Cotización",
        descripcion: "Proporciona tus datos para enviarte la cotización."
      }
    };

    /* ================================
       REFERENCIAS DEL DOM
    ================================ */
    // Modal
    const modalCotizador = document.getElementById('cotizadorModal');
    const modalContent = document.getElementById('cotizadorContent');
    const abrir = document.getElementById('abrirCotizador');
    const botonesAbrir = document.querySelectorAll('.abrirCotizador');
    const cerrar = document.getElementById('cerrarModal');
    const btnContinuar = document.getElementById('btnContinuar');
    const btnAtras = document.getElementById('btnAtras');

      const servicioPreseleccionado = "<?php echo $tipo; ?>";

    // Fases
    const fase1 = document.getElementById('fase1');
    const fase2 = document.getElementById('fase2');
    const fase3 = document.getElementById('fase3');
    const fase4 = document.getElementById('fase4');
    const fase5 = document.getElementById('fase5');

    // Resumen (fase 4)
    const resumenTela = document.getElementById('resumenTela');
    const resumenTecnica = document.getElementById('resumenTecnica');
    const resumenCantidad = document.getElementById('resumenCantidad');
    const resumenColor = document.getElementById('resumenColor');
    const resumenTotal = document.getElementById('resumenTotal');
    const resumenImg = document.getElementById('resumenImg');

    // Barra de progreso
    const progressBar = document.getElementById('progressBar');
    const faseTitulo = document.getElementById('faseTitulo');
    const faseDescripcion = document.getElementById('faseDescripcion');

    // Inputs contacto
    const radios = document.querySelectorAll('input[name="contactoTipo"]');
    const correoInput = document.getElementById('correo');
    const whatsappInput = document.getElementById('whatsapp');
    const formCotizacion = document.getElementById("formCotizacion");

    /* ================================
       VARIABLES GLOBALES
    ================================ */
    let fase = 1;
    let seleccion = {
      tela: null,
      tecnica: null,
      imagen: null,
      cantidad: 10, // Cantidad mínima inicial
      color: "#ffffff"
    };

    /* ================================
       FUNCIONES DE MODAL
    ================================ */
    // Abrir modal con animación
    if (abrir) {
      abrir.addEventListener('click', () => {
        modalCotizador.classList.remove('opacity-0', 'pointer-events-none');
        setTimeout(() => {
          modalContent.classList.remove('scale-95', 'opacity-0');
          modalContent.classList.add('scale-100', 'opacity-100');
        }, 20);
      });
    }


    /// Botones abrir en la pagina servicios ya que hay dos 
    botonesAbrir.forEach((boton) => {
      boton.addEventListener('click', () => {
        modalCotizador.classList.remove('opacity-0', 'pointer-events-none');
        setTimeout(() => {
          modalContent.classList.remove('scale-95', 'opacity-0');
          modalContent.classList.add('scale-100', 'opacity-100');
        }, 20);
      });
    });

    // Cerrar modal con animación
    cerrar.addEventListener('click', () => {
      modalContent.classList.remove('scale-100', 'opacity-100');
      modalContent.classList.add('scale-95', 'opacity-0');
      setTimeout(() => {
        modalCotizador.classList.add('opacity-0', 'pointer-events-none');
      }, 300);
    });

    /* ================================
       SELECCIONES DE FASES
    ================================ */
    // Selección de telas
    document.querySelectorAll('#fase1 [data-tela]').forEach(card => {
      card.addEventListener('click', () => {
        document.querySelectorAll('#fase1 [data-tela]').forEach(c => c.classList.remove('border-blue-500'));
        card.classList.add('border-blue-500');
        seleccion.tela = JSON.parse(card.dataset.tela);
        validarFaseActual();
      });
    });

    // Selección de técnicas
const tecnicas = document.querySelectorAll('#fase2 [data-tecnica]');

tecnicas.forEach(card => {
  card.addEventListener('click', () => {
    tecnicas.forEach(c => c.classList.remove('border-blue-500'));
    card.classList.add('border-blue-500');
    seleccion.tecnica = JSON.parse(card.dataset.tecnica);
    validarFaseActual();
  });
});

// 🔹 Si hay servicio preseleccionado desde PHP → URL
if (servicioPreseleccionado && servicioPreseleccionado !== "Nada") {
  tecnicas.forEach(card => {
    const data = JSON.parse(card.dataset.tecnica);
    if (data.nombre.toLowerCase() === servicioPreseleccionado.toLowerCase()) {
      card.click(); // Dispara la lógica existente (ya selecciona y valida)
    }
  });
}

    // Subida de imagen
    const inputImagen = document.getElementById('inputImagen');
    if (inputImagen) {
      inputImagen.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file && ["image/jpeg", "image/png", "image/gif"].includes(file.type)) {
          seleccion.imagen = file;
        } else {
          alert("Formato no permitido. Sube JPEG, PNG o GIF.");
          inputImagen.value = "";
          seleccion.imagen = null;
        }
        validarFaseActual();
      });
    }

    // Validación cantidad
    const inputCantidad = document.getElementById('inputCantidad');
    if (inputCantidad) {
      const validarCantidad = () => {
        const valor = parseInt(inputCantidad.value) || 0;
        const esValido = valor >= 10;

        if (esValido) {
          inputCantidad.classList.remove('border-red-500', 'bg-red-50');
          inputCantidad.classList.add('border-green-500');
          seleccion.cantidad = valor;
        } else {
          inputCantidad.classList.remove('border-green-500');
          inputCantidad.classList.add('border-red-500', 'bg-red-50');
          seleccion.cantidad = 0;
        }
        validarFaseActual();
      };
      inputCantidad.addEventListener('input', validarCantidad);
      inputCantidad.addEventListener('change', validarCantidad);
      setTimeout(validarCantidad, 100); // Validar inicialmente
    }

    /* ================================
       SELECCIÓN DE COLOR (Pickr)
    ================================ */
    const pickr = Pickr.create({
      el: '#pickr-container',
      theme: 'nano',
      default: '#ffffff',
      swatches: ['#ffffff', '#000000', '#2563eb', '#e11d48', '#16a34a'],
      components: {
        preview: true,
        opacity: true,
        hue: true,
        interaction: {
          input: true,
          save: true
        }
      }
    });

    // Cambiar el texto del botón "Save" del pickr a "Seleccionar"
    pickr.on('init', instance => {
      const saveBtn = instance.getRoot().querySelector('.pcr-button-save');
      if (saveBtn) saveBtn.textContent = 'Seleccionar';
    });

    // Guardar color desde Pickr
    pickr.on('save', (color) => {
      const hex = color.toHEXA().toString();
      document.getElementById('camisetaBase').setAttribute('fill', hex);
      document.getElementById('inputColor').value = hex;
      seleccion.color = hex;
      pickr.hide();
    });

    // Botones rápidos de color
    document.querySelectorAll('[data-color]').forEach(btn => {
      btn.addEventListener('click', () => {
        const color = btn.getAttribute('data-color');
        document.getElementById('camisetaBase').setAttribute('fill', color);
        document.getElementById('inputColor').value = color;
        seleccion.color = color;
        validarFaseActual();
      });
    });

    // Mostrar/ocultar Pickr
    document.getElementById('openColorPicker').addEventListener('click', () => pickr.show());

    // Input color manual
    const inputColor = document.getElementById('inputColor');
    if (inputColor) {
      inputColor.addEventListener('change', () => {
        seleccion.color = inputColor.value;
      });
    }

    /* ================================
       CONTACTO (correo / whatsapp)
    ================================ */
    radios.forEach(r => {
      r.addEventListener('change', () => {
        if (r.value === "correo") {
          correoInput.classList.remove("hidden");
          whatsappInput.classList.add("hidden");
        } else {
          correoInput.classList.add("hidden");
          whatsappInput.classList.remove("hidden");
        }
      });
    });

    /* ================================
       SUBMIT DEL FORMULARIO
    ================================ */
    formCotizacion.addEventListener("submit", (e) => {
      // Pasar datos a inputs ocultos
      document.getElementById("inputTela").value = seleccion.tela?.nombre || "";
      document.getElementById("inputTecnica").value = seleccion.tecnica?.nombre || "";
      document.getElementById("inputCantidadHidden").value = seleccion.cantidad || "";
      document.getElementById("inputColor").value = seleccion.color || "#ffffff";

      // Calcular total
      const base = seleccion.tela?.precio || 0;
      const extra = seleccion.tecnica?.extra || 0;
      const total = (base + extra) * (seleccion.cantidad || 1);
      document.getElementById("inputTotal").value = total;

      // Imagen en base64
      if (seleccion.imagen) {
        const reader = new FileReader();
        reader.onload = function(ev) {
          document.getElementById("inputImagenHidden").value = ev.target.result;
          formCotizacion.submit(); // 🔥 Reenvía el form cuando ya está lista
        };
        reader.readAsDataURL(seleccion.imagen);
        e.preventDefault();
      }
    });

    /* ================================
       NAVEGACIÓN ENTRE FASES
    ================================ */
    // Botón Continuar
    if (btnContinuar) {
      btnContinuar.addEventListener('click', () => {
        if (validarFase()) {
          if (fase < 5) {
            fase++;
            renderFase();
            validarFaseActual();
          }
        }
      });
    }

    // Botón Atrás
    if (btnAtras) {
      btnAtras.addEventListener('click', () => {
        if (fase > 1) {
          fase--;
          renderFase();
          validarFaseActual();
        }
      });
    };

    /* ================================
       RENDER DE FASES Y PROGRESO
    ================================ */
    function renderFase() {
      // Ocultar todas
      ['fase1', 'fase2', 'fase3', 'fase4', 'fase5'].forEach(id => {
        document.getElementById(id)?.classList.add('hidden');
      });

      // Mostrar actual
      document.getElementById(`fase${fase}`)?.classList.remove('hidden');

      // Título y descripción
      const info = fasesInfo[fase];
      if (faseTitulo) faseTitulo.textContent = info.titulo;
      if (faseDescripcion) faseDescripcion.textContent = info.descripcion;

      // 🔥 Lógica de la barra de progreso 🔥
      const pasos = ['paso1', 'paso2', 'paso3', 'paso4', 'paso5'];
      pasos.forEach((pasoId, index) => {
        const pasoElement = document.getElementById(pasoId);
        if (pasoElement) {
          if (index < fase) {
            pasoElement.classList.add('border-blue-500', 'bg-blue-500', 'text-white');
            pasoElement.classList.remove('border-gray-400', 'text-gray-400');
          } else {
            pasoElement.classList.add('border-gray-400', 'text-gray-400');
            pasoElement.classList.remove('border-blue-500', 'bg-blue-500', 'text-white');
          }
        }
      });

      // Ocultar botón continuar en última fase
      if (btnContinuar) {
        btnContinuar.classList.toggle('hidden', fase === 5);
      }

      // Render resumen en fase 4
      if (fase === 4) {
        resumenTela.textContent = seleccion.tela?.nombre || "—";
        resumenTecnica.textContent = seleccion.tecnica?.nombre || "—";
        resumenCantidad.textContent = seleccion.cantidad || "—";
        resumenColor.textContent = seleccion.color || "—";

        const base = seleccion.tela?.precio || 0;
        const extra = seleccion.tecnica?.extra || 0;
        const total = (base + extra) * (seleccion.cantidad || 1);
        resumenTotal.textContent = `$${total.toFixed(2)}`;

        // Pintar camiseta del resumen
        document.getElementById("resumenCamisetaBase")
          .setAttribute("fill", seleccion.color);

        // Imagen del resumen
        if (seleccion.imagen) {
          const reader = new FileReader();
          reader.onload = ev => resumenImg.src = ev.target.result;
          reader.readAsDataURL(seleccion.imagen);
        }
      }
    }

    /* ================================
       VALIDACIONES
    ================================ */
    function validarFase() {
      if (fase === 1 && !seleccion.tela) {
        alert("Selecciona una tela.");
        return false;
      }
      if (fase === 2 && !seleccion.tecnica) {
        alert("Selecciona una técnica.");
        return false;
      }
      if (fase === 3 && (!seleccion.imagen || seleccion.cantidad < 10)) {
        if (!seleccion.imagen) alert("Sube una imagen.");
        if (seleccion.cantidad < 10) alert("La cantidad mínima es 10.");
        return false;
      }
      return true;
    }

    // Validar estado del botón
    function validarFaseActual() {
      let esValido = false;
      switch (fase) {
        case 1:
          esValido = seleccion.tela !== null;
          break;
        case 2:
          esValido = seleccion.tecnica !== null;
          break;
        case 3:
          esValido = seleccion.imagen !== null && seleccion.cantidad >= 10;
          break;
        case 4:
          esValido = true;
          break;
        case 5:
          esValido = true;
          break;
      }

      if (btnContinuar) {
        btnContinuar.disabled = !esValido;
        btnContinuar.classList.toggle('bg-blue-600', esValido);
        btnContinuar.classList.toggle('hover:bg-blue-700', esValido);
        btnContinuar.classList.toggle('bg-gray-400', !esValido);
        btnContinuar.classList.toggle('cursor-not-allowed', !esValido);
      }
      return esValido;
    }

    /* ================================
       INICIALIZACIÓN
    ================================ */
    setTimeout(validarFaseActual, 100);
    feather.replace();
    renderFase();
  </script>