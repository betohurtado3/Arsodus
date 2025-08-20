<?php
/*      
      1.- Mensaje Pequeño para incitar al hacer el click el las flipcards
      2.- Modales para listado de información de las flipcards
      3.- Logos de Marcas que se usan
      4.- Logos de marcas con las que se han trabajado
      5.- Reseñas - Diseño/Estructura
      6.- Contacto Rapido, Newsleetter Llamativo 
      7.- Footer con enlaces Rapidos
      8.- IDEA CAMISAS INTERACTIVAS
        - Diseños con zoom de las camisas para ver telas
        - Modal de las camisas para tener Información
        - Camisa en 3D

*/
?>
<!DOCTYPE html>
<html lang="es" x-data="{ openModal: false }" xmlns="http://www.w3.org/1999/xhtml">
<!-- Header-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="/Arsodus/assets/css/index.css">
  <script src="//unpkg.com/alpinejs" defer></script>

  <title>Arsodus</title>
  <link rel="icon" type="image/png" href="assets/img/LogoSinFondo.png">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>


  <style>
    body {
      padding-top: 80px;
      /* Ajusta según la altura de tu navbar */
    }
  </style>
</head>

<body class="bg-[#fdfaf6]">
  <div id="inicio">
    <?php include 'Front/navbar.php'; ?>
  </div>

  <!-- 
  Hero Section
   -->
  <div x-data="{ openModal: false }">
    <section class="relative h-screen flex items-center justify-center text-center text-white">

      <!-- Video de fondo -->
      <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover">
        <source src="Media/Serigrafia.mp4" type="video/mp4">
      </video>

      <!-- Sombra degradada -->
      <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/40 to-black/60"></div>

      <!-- Contenido -->
      <div class="relative z-10 max-w-2xl px-6">
        <h1 class="font-raleway text-4xl md:text-6xl font-bold mb-4 drop-shadow-lg">
          Dale vida a tu marca con <span class="text-[#fdfaf6]">Arsodus</span>
        </h1>
        <p class="font-montserrat text-lg md:text-xl mb-8 drop-shadow-md">
          Serigrafía, vinil, sublimación, bordado y DTF para empresas que buscan calidad superior.
        </p>
        <button
          @click="openModal = true"
          class="relative bg-blue-800 hover:bg-blue-700 text-[#fdfaf6] px-8 py-3.5 rounded-full text-lg font-semibold shadow-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl active:translate-y-0 overflow-hidden group">
          <span class="font-raleway relative z-10">Pide tu cotización</span>
          <span class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
        </button>
      </div>
    </section>

    <!-- Modal de contacto con efecto neon -->
    <div
      x-show="openModal"
      x-transition:enter="ease-out duration-300"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="ease-in duration-200"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      x-cloak
      class="fixed inset-0 flex items-center justify-center bg-black/60 z-50 backdrop-blur-sm">

      <div @click.away="openModal = false"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="bg-[#fdfaf6] rounded-2xl p-6 sm:p-8 w-[90%] max-w-md mx-4 shadow-xl relative transition-all duration-300 transform hover:shadow-2xl">

        <!-- Botón cerrar -->
        <button @click="openModal = false"
          class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 transition-colors duration-200 transform hover:scale-110 active:scale-95">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>

        <h2 class="Font-raleway text-2xl md:text-3xl font-bold text-blue-900 mb-6 leading-tight">¡Platiquemos tu idea!</h2>

        <form class="space-y-5" method="POST" action="enviar.php">
          <!-- Input Nombre con efecto neon -->
          <div class="relative group">
            <label class="font-montserrat block text-blue-900 font-medium mb-1 transition-all duration-300 group-focus-within:text-blue-700">Nombre:</label>
            <div class="relative">
              <input type="text" name="nombre"
                class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-blue-800/30 transition-all duration-300 bg-white/90 z-10 relative"
                required>
              <div class="absolute inset-0 rounded-xl bg-blue-800/10 opacity-0 group-hover:opacity-100 group-focus-within:opacity-100 transition-opacity duration-300 blur-[2px]"></div>
              <div class="absolute inset-0 rounded-xl shadow-[0_0_8px_-2px_rgba(30,64,175,0.3)] group-hover:shadow-[0_0_12px_-2px_rgba(30,64,175,0.5)] group-focus-within:shadow-[0_0_12px_-2px_rgba(30,64,175,0.5)] transition-all duration-500"></div>
            </div>
          </div>

          <!-- Input Contacto con efecto neon -->
          <div class="relative group">
            <label class="font-montserrat block text-blue-900 font-medium mb-1 transition-all duration-300 group-focus-within:text-blue-700">Teléfono o Correo:</label>
            <div class="relative">
              <input type="text" name="contacto"
                class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-blue-800/30 transition-all duration-300 bg-white/90 z-10 relative"
                required>
              <div class="absolute inset-0 rounded-xl bg-blue-800/10 opacity-0 group-hover:opacity-100 group-focus-within:opacity-100 transition-opacity duration-300 blur-[2px]"></div>
              <div class="absolute inset-0 rounded-xl shadow-[0_0_8px_-2px_rgba(30,64,175,0.3)] group-hover:shadow-[0_0_12px_-2px_rgba(30,64,175,0.5)] group-focus-within:shadow-[0_0_12px_-2px_rgba(30,64,175,0.5)] transition-all duration-500"></div>
            </div>
          </div>

          <!-- Textarea con efecto neon -->
          <div class="relative group">
            <label class="font-montserrat block text-blue-900 font-medium mb-1 transition-all duration-300 group-focus-within:text-blue-700">Cuéntame tu idea:</label>
            <div class="relative">
              <textarea name="mensaje"
                class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-blue-800/30 transition-all duration-300 bg-white/90 z-10 relative min-h-[120px]"
                required></textarea>
              <div class="absolute inset-0 rounded-xl bg-blue-800/10 opacity-0 group-hover:opacity-100 group-focus-within:opacity-100 transition-opacity duration-300 blur-[2px]"></div>
              <div class="absolute inset-0 rounded-xl shadow-[0_0_8px_-2px_rgba(30,64,175,0.3)] group-hover:shadow-[0_0_12px_-2px_rgba(30,64,175,0.5)] group-focus-within:shadow-[0_0_12px_-2px_rgba(30,64,175,0.5)] transition-all duration-500"></div>
            </div>
          </div>

          <!-- Botones -->
          <div class="flex justify-end space-x-3 pt-2">
            <button type="button"
              @click="openModal = false"
              class="px-5 py-2.5 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 transition-all duration-300 transform hover:-translate-y-0.5 active:translate-y-0 shadow-sm hover:shadow-md">
              Cerrar
            </button>
            <button type="submit"
              class="px-5 py-2.5 rounded-xl bg-blue-800 text-[#fdfaf6] hover:bg-blue-700 transition-all duration-300 transform hover:-translate-y-0.5 active:translate-y-0 shadow-sm hover:shadow-md hover:shadow-blue-800/30 relative overflow-hidden group">
              <span class="Font-raleway relative z-10">Enviar</span>
              <span class="absolute inset-0 bg-blue-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
            </button>
          </div>
        </form>
      </div>
    </div>

  </div>

  <!-- =========================
  COTIZADOR (Sección + Modal)
  Ahora con Fase 2: Técnica
========================== -->

  <section id="cotizador" class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-6 text-center">
      <span class="inline-flex items-center gap-2 text-xs font-medium px-3 py-1 rounded-full bg-blue-50 text-blue-700">
        ✨ Nuevo módulo
      </span>

      <h2 class="mt-4 text-3xl md:text-4xl font-extrabold tracking-tight text-gray-900">
        Arma tu cotización en minutos
      </h2>
      <p class="mt-3 text-gray-600 max-w-2xl mx-auto">
        Selecciona tela, técnica y cantidad. Te mostramos el estimado al momento.
      </p>

      <!-- CTA abre modal -->
      <button id="openCotizador"
        class="mt-6 inline-flex items-center justify-center px-6 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 active:scale-[.99] transition">
        Comenzar
      </button>

      <!-- Resumen mínimo -->
      <div id="resumenWrapper" class="mt-6 hidden">
        <div class="inline-flex flex-col items-center gap-2 px-4 py-3 rounded-lg bg-blue-50 text-blue-800">
          <span class="text-sm">Tela seleccionada: <strong id="resumenTela"></strong></span>
          <span class="text-sm">Técnica seleccionada: <strong id="resumenTecnica"></strong></span>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal -->
  <div id="cotizadorModal" class="hidden fixed inset-0 z-50">
    <div id="modalBackdrop" class="absolute inset-0 bg-black/50 opacity-0 transition-opacity"></div>

    <div id="modalDialog"
      class="relative mx-auto w-[90%] max-w-2xl px-6 pt-6 pb-5 bg-white rounded-2xl shadow-xl
              top-[12vh] opacity-0 scale-95 transition duration-200">
      <!-- Header -->
      <div class="flex items-start justify-between">
        <div>
          <p id="faseTitulo" class="text-xs uppercase tracking-wider text-blue-600 font-semibold">Fase 1</p>
          <h3 id="faseSubtitulo" class="text-xl md:text-2xl font-bold text-gray-900">Elige la tela</h3>
        </div>
        <button id="closeCotizador" class="p-2 rounded-lg hover:bg-gray-100 text-gray-500" aria-label="Cerrar">
          ✕
        </button>
      </div>

      <p id="faseDescripcion" class="mt-2 text-sm text-gray-600">
        Escoge la base ideal. Mostramos un rango de precio por prenda según la tela.
      </p>

      <!-- Contenido Fase 1 (Tela) -->
        <div id="fase1" class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-4" role="radiogroup" aria-label="Seleccionar tela">
          <!-- Opción: Algodón -->
          <button type="button"
            class="tela-card group w-full text-left rounded-xl border border-gray-200 hover:border-blue-300 
                     hover:shadow-sm p-4 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500"
            role="radio" aria-checked="false"
            data-option="algodon" data-nombre="Algodón" data-precio="60 - 80 $">
            <div class="flex items-start justify-between">
              <div>
                <h4 class="text-base font-semibold text-gray-900">Algodón</h4>
                <p class="mt-1 text-sm text-gray-600">Suave, transpirable y cómodo.</p>
              </div>
              <span class="mt-1 inline-flex items-center text-xs px-2 py-1 rounded bg-blue-50 text-blue-700">
                60 – 80 $
              </span>
            </div>
          </button>

          <!-- Opción: Popelina -->
          <button type="button"
            class="tela-card group w-full text-left rounded-xl border border-gray-200 hover:border-blue-300 
                     hover:shadow-sm p-4 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500"
            role="radio" aria-checked="false"
            data-option="popelina" data-nombre="Popelina" data-precio="40 - 70 $">
            <div class="flex items-start justify-between">
              <div>
                <h4 class="text-base font-semibold text-gray-900">Popelina</h4>
                <p class="mt-1 text-sm text-gray-600">Tejido compacto, look formal.</p>
              </div>
              <span class="mt-1 inline-flex items-center text-xs px-2 py-1 rounded bg-blue-50 text-blue-700">
                40 – 70 $
              </span>
            </div>
          </button>
        </div>

        <!-- Contenido Fase 2 (Técnica) -->
        <div id="fase2" class="mt-5 grid grid-cols-1 sm:grid-cols-3 gap-4 hidden" role="radiogroup" aria-label="Seleccionar técnica">
          <button type="button"
            class="tecnica-card group w-full text-left rounded-xl border border-gray-200 hover:border-blue-300 
                     hover:shadow-sm p-4 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500"
            role="radio" aria-checked="false"
            data-option="dtf" data-nombre="DTF">
            <h4 class="text-base font-semibold text-gray-900">DTF</h4>
            <p class="mt-1 text-sm text-gray-600">Colores vivos, detalles finos.</p>
          </button>

          <button type="button"
            class="tecnica-card group w-full text-left rounded-xl border border-gray-200 hover:border-blue-300 
                     hover:shadow-sm p-4 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500"
            role="radio" aria-checked="false"
            data-option="serigrafia" data-nombre="Serigrafía">
            <h4 class="text-base font-semibold text-gray-900">Serigrafía</h4>
            <p class="mt-1 text-sm text-gray-600">Duradera y con colores sólidos.</p>
          </button>

          <button type="button"
            class="tecnica-card group w-full text-left rounded-xl border border-gray-200 hover:border-blue-300 
                     hover:shadow-sm p-4 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500"
            role="radio" aria-checked="false"
            data-option="bordado" data-nombre="Bordado">
            <h4 class="text-base font-semibold text-gray-900">Bordado</h4>
            <p class="mt-1 text-sm text-gray-600">Acabado premium y elegante.</p>
          </button>
        </div>

        <!-- Footer -->
        <div class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
          <!-- Stepper -->
          <div id="faseStepper" class="flex items-center gap-2 text-xs">
            <button data-step="1" class="step-btn px-2 py-1 rounded cursor-default bg-blue-600 text-white font-semibold">1</button>
            <span>—</span>
            <button data-step="2" class="step-btn px-2 py-1 rounded cursor-not-allowed bg-gray-200 text-gray-500">2</button>
            <span>—</span>
            <span class="px-2 py-1 rounded bg-gray-100 text-gray-400">3</span>
          </div>

          <!-- Botones -->
          <div class="flex gap-3 flex-wrap justify-end">
            <button id="atrasBtn" class="px-4 py-2 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 hidden">
              Atrás
            </button>
            <button id="cancelarModal" class="px-4 py-2 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50">
              Cancelar
            </button>
            <button id="continuarBtn"
              class="px-5 py-2 rounded-lg bg-blue-600 text-white font-semibold disabled:opacity-50 disabled:cursor-not-allowed">
              Continuar
            </button>
          </div>
        </div>
    </div>
  </div>

  <script>
    const openBtn = document.getElementById('openCotizador');
    const modalCotizacion = document.getElementById('cotizadorModal');
    const backdrop = document.getElementById('modalBackdrop');
    const dialog = document.getElementById('modalDialog');
    const closeBtnCotizacion = document.getElementById('closeCotizador');
    const cancelBtn = document.getElementById('cancelarModal');
    const atrasBtn = document.getElementById('atrasBtn');
    const continuar = document.getElementById('continuarBtn');
    const resumenWrapper = document.getElementById('resumenWrapper');
    const resumenTela = document.getElementById('resumenTela');
    const resumenTecnica = document.getElementById('resumenTecnica');

    const fase1 = document.getElementById('fase1');
    const fase2 = document.getElementById('fase2');
    const faseTitulo = document.getElementById('faseTitulo');
    const faseSubtitulo = document.getElementById('faseSubtitulo');
    const faseDescripcion = document.getElementById('faseDescripcion');
    const stepper = document.getElementById('faseStepper');

    let fase = 1;
    let seleccion = {
      tela: null,
      tecnica: null
    };

    function openModal() {
      modalCotizacion.classList.remove('hidden');
      requestAnimationFrame(() => {
        backdrop.classList.remove('opacity-0');
        dialog.classList.remove('opacity-0', 'scale-95');
      });
      document.documentElement.style.overflow = 'hidden';
      fase = 1;
      renderFase();
    }

    function closeModal() {
      backdrop.classList.add('opacity-0');
      dialog.classList.add('opacity-0', 'scale-95');
      setTimeout(() => {
        modalCotizacion.classList.add('hidden');
        document.documentElement.style.overflow = '';
      }, 200);
    }

    function enableContinue(enable) {
      continuar.disabled = !enable;
    }

    function resetCardsVisual(selector) {
      document.querySelectorAll(selector).forEach(btn => {
        btn.setAttribute('aria-checked', 'false');
        btn.classList.remove('ring-2', 'ring-blue-500', 'bg-blue-50/40');
      });
    }

    function renderStepper() {
      const buttons = stepper.querySelectorAll('.step-btn');
      buttons.forEach(btn => {
        const step = parseInt(btn.dataset.step);
        if (step < fase && (step === 1 && seleccion.tela || step === 2 && seleccion.tecnica)) {
          btn.className = "step-btn px-2 py-1 rounded bg-gray-200 text-gray-700 hover:bg-gray-300 cursor-pointer";
        } else if (step === fase) {
          btn.className = "step-btn px-2 py-1 rounded bg-blue-600 text-white font-semibold cursor-default";
        } else {
          btn.className = "step-btn px-2 py-1 rounded bg-gray-200 text-gray-400 cursor-not-allowed";
        }
      });
    }

    function renderFase() {
      atrasBtn.classList.toggle('hidden', fase === 1);

      if (fase === 1) {
        fase1.classList.remove('hidden');
        fase2.classList.add('hidden');
        faseTitulo.textContent = "Fase 1";
        faseSubtitulo.textContent = "Elige la tela";
        faseDescripcion.textContent = "Escoge la base ideal. Mostramos un rango de precio por prenda según la tela.";
        enableContinue(!!seleccion.tela);
      } else if (fase === 2) {
        fase1.classList.add('hidden');
        fase2.classList.remove('hidden');
        faseTitulo.textContent = "Fase 2";
        faseSubtitulo.textContent = "Elige la técnica";
        faseDescripcion.textContent = "Selecciona el tipo de estampado o bordado que prefieras.";
        enableContinue(!!seleccion.tecnica);
      }
      renderStepper();
    }

    // Abrir/cerrar modal
    openBtn.addEventListener('click', openModal);
    closeBtnCotizacion.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);
    backdrop.addEventListener('click', closeModal);
    window.addEventListener('keydown', (e) => {
      if (!modalCotizacion.classList.contains('hidden') && e.key === 'Escape') closeModal();
    });

    // Atrás
    atrasBtn.addEventListener('click', () => {
      if (fase > 1) {
        fase--;
        renderFase();
      }
    });

    // Click directo en stepper (solo si está habilitado)
    stepper.addEventListener('click', (e) => {
      if (e.target.dataset.step) {
        const step = parseInt(e.target.dataset.step);
        if (step < fase && (step === 1 && seleccion.tela || step === 2 && seleccion.tecnica)) {
          fase = step;
          renderFase();
        }
      }
    });

    // Click en telas
    document.querySelectorAll('.tela-card').forEach(btn => {
      btn.addEventListener('click', () => {
        resetCardsVisual('.tela-card');
        btn.setAttribute('aria-checked', 'true');
        btn.classList.add('ring-2', 'ring-blue-500', 'bg-blue-50/40');
        seleccion.tela = {
          id: btn.dataset.option,
          nombre: btn.dataset.nombre,
          precio: btn.dataset.precio
        };
        enableContinue(true);
      });
    });

    // Click en técnicas
    document.querySelectorAll('.tecnica-card').forEach(btn => {
      btn.addEventListener('click', () => {
        resetCardsVisual('.tecnica-card');
        btn.setAttribute('aria-checked', 'true');
        btn.classList.add('ring-2', 'ring-blue-500', 'bg-blue-50/40');
        seleccion.tecnica = {
          id: btn.dataset.option,
          nombre: btn.dataset.nombre
        };
        enableContinue(true);
      });
    });

    // Continuar: avanza o finaliza
    continuar.addEventListener('click', () => {
      if (fase === 1 && seleccion.tela) {
        fase = 2;
        renderFase();
      } else if (fase === 2 && seleccion.tecnica) {
        resumenTela.textContent = `${seleccion.tela.nombre} · ${seleccion.tela.precio}`;
        resumenTecnica.textContent = seleccion.tecnica.nombre;
        resumenWrapper.classList.remove('hidden');
        closeModal();
        console.log(JSON.stringify(seleccion)); // <--- aquí ves tu JSON en consola
      }
    });

    enableContinue(false);
  </script>

  <!-- 
  Servicios con efecto flip 3D
  -->
  <section id="servicios" class="py-20 max-w-7xl mx-auto px-4">

    <div class="text-center mb-16 relative">
      <!-- Título con efecto sombra dinámica -->
      <h2 class="impact-heading">
        Impulsa tu empresa con calidad
      </h2>
      <br><br>
      <!-- Descripción con expansión vertical -->
      <div class="overflow-hidden max-h-20 transition-all duration-500 hover:max-h-40 mx-auto max-w-2xl">
        <p
          class="font-montserrat text-gray-700  px-4 transform translate-y-0 transition-all duration-500 hover:translate-y-1 hover:text-gray-700"
          style="text-shadow: 0 1px 2px rgba(0,0,0,0.02)">
          Técnicas artesanales combinadas con tecnología de punta para resultados excepcionales
          <span class="block mt-2 text-sm text-blue-800/70 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            Calidad que perdura en cada impresión
          </span>
        </p>
      </div>

      <!-- Subrayado decorativo (opcional) -->
      <div class="mt-6 w-20 h-0.5 bg-blue-800/30 mx-auto group-hover:w-32 transition-all duration-500"></div>
    </div>

    <!-- Espacio para las cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

      <!-- Tarjeta Serigrafía -->
      <div class="flip-card h-72 group" data-servicio="serigrafia">
        <div class="flip-card-inner">
          <!-- FRONT -->
          <div class="flip-card-front bg-gradient-to-br from-white to-gray-50 rounded-2xl p-6 flex flex-col justify-center items-center shadow-lg border border-gray-100">
            <div class="bg-blue-100/20 p-4 rounded-full mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m4 4h6a2 2 0 002-2v-4a2 2 0 00-2-2h-6a2 2 0 00-2 2v4a2 2 0 002 2z" />
              </svg>
            </div>

            <h3 class="font-heading font-bold text-xl text-blue-900 mb-2">Serigrafía</h3>
            <p class="font-sans text-center text-gray-600">Precisión en cada detalle</p>
          </div>

          <!-- BACK -->
          <div class="flip-card-back bg-gradient-to-br from-blue-800 to-blue-900 rounded-2xl p-6 flex flex-col justify-center items-center text-white shadow-lg">
            <h3 class="font-heading font-bold text-xl mb-3">Serigrafía</h3>
            <ul class="font-sans text-sm space-y-2">
              <li class="flex items-center"><span class="mr-2">✓</span> Ideal para grandes volúmenes</li>
              <li class="flex items-center"><span class="mr-2">✓</span> Colores vibrantes</li>
              <li class="flex items-center"><span class="mr-2">✓</span> Durabilidad extrema</li>
            </ul>

            <a href="Front/servicio.php?tipo=serigrafia" class="font-sans mt-4 text-sm bg-white text-blue-900 py-2 px-4 rounded-full shadow hover:bg-gray-100 transition">
              Conoce más →
            </a>
          </div>
        </div>
      </div>

      <!-- Tarjeta Vinil -->
      <div class="flip-card h-72">
        <div class="flip-card-inner">
          <div class="flip-card-front bg-gradient-to-br from-white to-gray-50 rounded-2xl p-6 flex flex-col justify-center items-center shadow-lg border border-gray-100">
            <div class="bg-blue-100/20 p-4 rounded-full mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z" />
              </svg>
            </div>
            <h3 class="font-heading font-bold text-xl text-blue-900 mb-2">Vinil</h3>
            <p class="font-sans text-center text-gray-600">Cortes perfectos</p>
          </div>
          <div class="flip-card-back bg-gradient-to-br from-blue-800 to-blue-900 rounded-2xl p-6 flex flex-col justify-center items-center text-white shadow-lg">
            <h3 class="font-heading font-bold text-xl mb-3">Vinil de Corte</h3>
            <ul class="font-sans text-sm space-y-2 text-center">
              <li class="flex items-center"><span class="mr-2">✓</span> Detalles nítidos</li>
              <li class="flex items-center"><span class="mr-2">✓</span> Aplicación versátil</li>
              <li class="flex items-center"><span class="mr-2">✓</span> Ideal para logos</li>
            </ul>
            <a href="Front/servicio.php?tipo=vinil" class="font-sans mt-4 text-sm bg-white text-blue-900 py-2 px-4 rounded-full shadow hover:bg-gray-100 transition">
              Conoce más →
            </a>
          </div>
        </div>
      </div>

      <!-- Tarjeta Sublimación -->
      <div class="flip-card h-72">
        <div class="flip-card-inner">
          <div class="flip-card-front bg-gradient-to-br from-white to-gray-50 rounded-2xl p-6 flex flex-col justify-center items-center shadow-lg border border-gray-100">
            <div class="bg-blue-100/20 p-4 rounded-full mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
              </svg>
            </div>
            <h3 class="font-heading font-bold text-xl text-blue-900 mb-2">Sublimación</h3>
            <p class="font-sans text-center text-gray-600">Colores que permanecen</p>
          </div>
          <div class="flip-card-back bg-gradient-to-br from-blue-800 to-blue-900 rounded-2xl p-6 flex flex-col justify-center items-center text-white shadow-lg">
            <h3 class="font-heading font-bold text-xl mb-3">Sublimación</h3>
            <ul class="font-sans text-sm space-y-2">
              <li class="flex items-center"><span class="mr-2">✓</span> Estampado completo</li>
              <li class="flex items-center"><span class="mr-2">✓</span> Sin sensación de estampado</li>
              <li class="flex items-center"><span class="mr-2">✓</span> Ideal para artículos claros</li>
            </ul>
            <a href="Front/servicio.php?tipo=sublimacion" class="font-sans mt-4 text-sm bg-white text-blue-900 py-2 px-4 rounded-full shadow hover:bg-gray-100 transition">
              Conoce más →
            </a>
          </div>
        </div>
      </div>

      <!-- Tarjeta Bordado -->
      <div class="flip-card h-72">
        <div class="flip-card-inner">
          <div class="flip-card-front bg-gradient-to-br from-white to-gray-50 rounded-2xl p-6 flex flex-col justify-center items-center shadow-lg border border-gray-100">
            <div class="bg-blue-100/20 p-4 rounded-full mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
              </svg>
            </div>
            <h3 class="font-heading font-bold text-xl text-blue-900 mb-2">Bordado</h3>
            <p class="font-sans text-center text-gray-600">Elegancia textil</p>
          </div>
          <div class="flip-card-back bg-gradient-to-br from-blue-800 to-blue-900 rounded-2xl p-6 flex flex-col justify-center items-center text-white shadow-lg">
            <h3 class="font-heading font-bold text-xl mb-3">Bordado</h3>
            <ul class="font-sans text-sm space-y-2 text-center">
              <li class="flex items-center"><span class="mr-2">✓</span> Acabado premium</li>
              <li class="flex items-center"><span class="mr-2">✓</span> Hilos de alta resistencia</li>
              <li class="flex items-center"><span class="mr-2">✓</span> Profesionalismo táctil</li>
            </ul>
            <a href="Front/servicio.php?tipo=Bordado" class="font-sans mt-4 text-sm bg-white text-blue-900 py-2 px-4 rounded-full shadow hover:bg-gray-100 transition">
              Conoce más →
            </a>
          </div>
        </div>
      </div>

      <!-- Tarjeta DTF -->
      <div class="flip-card h-72">
        <div class="flip-card-inner">
          <div class="flip-card-front bg-gradient-to-br from-white to-gray-50 rounded-2xl p-6 flex flex-col justify-center items-center shadow-lg border border-gray-100">
            <div class="bg-blue-100/20 p-4 rounded-full mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
              </svg>
            </div>
            <h3 class="font-heading font-bold text-xl text-blue-900 mb-2">DTF</h3>
            <p class="font-sans text-center text-gray-600">Transferencia digital</p>
          </div>
          <div class="flip-card-back bg-gradient-to-br from-blue-800 to-blue-900 rounded-2xl p-6 flex flex-col justify-center items-center text-white shadow-lg">
            <h3 class="font-heading font-bold text-xl mb-3">DTF</h3>
            <ul class="font-sans text-sm space-y-2">
              <li class="flex items-center"><span class="mr-2">✓</span> Máxima durabilidad</li>
              <li class="flex items-center"><span class="mr-2">✓</span> Estampado flexible</li>
              <li class="flex items-center"><span class="mr-2">✓</span> Excelente en colores oscuros</li>
            </ul>
            <a href="Front/servicio.php?tipo=dtf" class="font-sans mt-4 text-sm bg-white text-blue-900 py-2 px-4 rounded-full shadow hover:bg-gray-100 transition">
              Conoce más →
            </a>
          </div>
        </div>
      </div>

    </div>
  </section>


  <!-- 
  Reseñas 
  -->
  <section class="bg-gray-100 py-20" id="testimonios">
    <h2 class="Font-raleway text-5xl font-bold text-center mb-12">Lo que dicen nuestros clientes</h2>


    <div class="relative max-w-4xl mx-auto">
      <!-- Carrusel contenedor -->
      <div id="testimonial-carousel" class="flex transition-transform duration-500 ease-in-out">

        <!-- Card 1 -->
        <div class="min-w-full px-6">
          <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
            <div class="flex justify-center text-yellow-400 mb-4">
              <i data-feather="star" class="w-5 h-5 fill-current"></i>
              <i data-feather="star" class="w-5 h-5 fill-current"></i>
              <i data-feather="star" class="w-5 h-5 fill-current"></i>
              <i data-feather="star" class="w-5 h-5 fill-current"></i>
              <i data-feather="star" class="w-5 h-5 fill-current"></i>
            </div>
            <p class="text-gray-700 mb-6 italic">
              "Excelente calidad y tiempos de entrega. Perfecto para nuestros uniformes corporativos."
            </p>
            <p class="font-montserrat text-gray-900">Juan Pérez</p>
            <p class="text-gray-500 text-sm">Gerente de Compras — Empresa XYZ</p>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="min-w-full px-6">
          <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
            <div class="flex justify-center text-yellow-400 mb-4">
              <i data-feather="star" class="w-5 h-5 fill-current"></i>
              <i data-feather="star" class="w-5 h-5 fill-current"></i>
              <i data-feather="star" class="w-5 h-5 fill-current"></i>
              <i data-feather="star" class="w-5 h-5 fill-current"></i>
              <i data-feather="star" class="w-5 h-5 fill-current"></i>
            </div>
            <p class="text-gray-700 mb-6 italic">
              "La atención y el acabado superaron nuestras expectativas."
            </p>
            <p class="font-semibold text-gray-900">María López</p>
            <p class="text-gray-500 text-sm">Directora Comercial — Distribuidora ABC</p>
          </div>
        </div>

        <!-- Repite para 3,4,5 -->
        <div class="min-w-full px-6">
          <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
            <div class="flex justify-center text-yellow-400 mb-4">
              <i data-feather="star" class="w-5 h-5 fill-current"></i>
              <i data-feather="star" class="w-5 h-5 fill-current"></i>
              <i data-feather="star" class="w-5 h-5 fill-current"></i>
              <i data-feather="star" class="w-5 h-5 fill-current"></i>
              <i data-feather="star" class="w-5 h-5 fill-current"></i>
            </div>
            <p class="text-gray-700 mb-6 italic">
              "Gran comunicación y excelente servicio al cliente."
            </p>
            <p class="font-semibold text-gray-900">Carlos Ramírez</p>
            <p class="text-gray-500 text-sm">CEO — StartUp Design</p>
          </div>
        </div>

        <!-- ... Card 4 y 5 iguales ... -->

      </div>
      <!-- Controles -->
      <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white rounded-full shadow-lg p-2 hover:scale-110 transition">
        <i data-feather="chevron-left"></i>
      </button>
      <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white rounded-full shadow-lg p-2 hover:scale-110 transition">
        <i data-feather="chevron-right"></i>
      </button>
    </div>
  </section>

  <!-- Contacto Rapido: Newsletter -->
  <section id="contacto" class="py-20 bg-gradient-to-br from-blue-50 to-blue-100">
    <div class="max-w-3xl mx-auto px-6 text-center">
      <h2 class="font-heading text-3xl font-bold text-blue-900 mb-4">
        ¿Quieres promociones y descuentos exclusivos?
      </h2>
      <p class="font-sans text-gray-700 mb-6">
        Suscríbete a nuestra lista y recibe ofertas únicas directamente en tu correo.
      </p>

      <form class="flex flex-col sm:flex-row gap-3 justify-center">
        <input
          type="email"
          placeholder="Tu correo electrónico"
          class="font-sans flex-1 px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <button
          type="submit"
          class="font-sans bg-blue-800 text-white px-6 py-3 rounded-xl hover:bg-blue-900 transition">
          ¡Quiero unirme!
        </button>
      </form>

      <p class="font-sans text-xs text-gray-500 mt-3">
        No hacemos spam. Puedes darte de baja cuando quieras.
      </p>
    </div>
  </section>


  <!-- Footer -->
  <footer class="bg-gray-900 text-gray-300 py-8">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <p>© 2025 Arsodus. Todos los derechos reservados.</p>
    </div>
  </footer>

  <!-- Modal oculto por defecto -->
  <div id="materialModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <!-- Aquí inyectamos contenido dinámico con JS -->
      <div id="modalBody"></div>
    </div>
  </div>

  <script>
    const modal = document.getElementById('fase-tela');
    const startBtn = document.getElementById('startCotizadorBtn');
    const closeBtn = document.getElementById('closeFaseTela');

    // Abrir modal con animación
    startBtn.addEventListener('click', () => {
      modal.classList.remove('hidden');
      gsap.fromTo(modal.querySelector('.bg-white'), {
        scale: 0.8,
        opacity: 0
      }, {
        scale: 1,
        opacity: 1,
        duration: 0.5,
        ease: "power3.out"
      });
      gsap.fromTo(modal, {
        opacity: 0
      }, {
        opacity: 1,
        duration: 0.3,
        ease: "power1.out"
      });
    });

    // Cerrar modal con animación
    closeBtn.addEventListener('click', () => {
      gsap.to(modal.querySelector('.bg-white'), {
        scale: 0.8,
        opacity: 0,
        duration: 0.3,
        ease: "power3.in"
      });
      gsap.to(modal, {
        opacity: 0,
        duration: 0.3,
        ease: "power1.in",
        onComplete: () => {
          modal.classList.add('hidden');
          modal.style.opacity = ""; // reset para reabrir limpio
        }
      });
    });
  </script>



  <script>
    // Mostrar la fase 1
    document.getElementById('startCotizadorBtn').addEventListener('click', function() {
      document.getElementById('fase-tela').classList.remove('hidden');
    });

    // Cerrar fase 1
    document.getElementById('closeFaseTela').addEventListener('click', function() {
      document.getElementById('fase-tela').classList.add('hidden');
    });
  </script>

  <!-- Scripts -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    feather.replace();

    const carousel = document.getElementById('testimonial-carousel');
    const totalCards = carousel.children.length;
    let index = 0;





    document.getElementById('next').addEventListener('click', () => {
      index = (index + 1) % totalCards;
      carousel.style.transform = `translateX(-${index * 100}%)`;
    });

    document.getElementById('prev').addEventListener('click', () => {
      index = (index - 1 + totalCards) % totalCards;
      carousel.style.transform = `translateX(-${index * 100}%)`;
    });

    AOS.init();

    document.addEventListener("DOMContentLoaded", () => {
      const cards = document.querySelectorAll(".flip-card");
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add("visible");
          }
        });
      }, {
        threshold: 0.5
      });

      cards.forEach(card => {
        card.classList.add("card-appear");
        observer.observe(card);
      });
    });
  </script>
</body>

</html>