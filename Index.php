<?php
?>
<!DOCTYPE html>
<html lang="es" x-data="{ openModal: false }" xmlns="http://www.w3.org/1999/xhtml">
<!-- Header-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="assets/css/index.css">
  <script src="//unpkg.com/alpinejs" defer></script>

  <title>Arsodus</title>
  <link rel="icon" type="image/png" href="assets/img/LogoSinFondo.png">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>

    <!-- Metadatos dinámicos para compartir -->
  <meta property="og:title" content="Arsodus">
  <meta property="og:description" content="Dale vida a tu marca con Arsodus">
  <meta property="og:image" content="assets/img/LogoSinFondo.png">
  <meta property="og:url" content="https://arsodus.com/">
  <meta property="og:type" content="website">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Arsodus">
  <meta name="twitter:description" content="Dale vida a tu marca con Arsodus">
  <meta name="twitter:image" content="assets/img/LogoSinFondo.png">




  <style>
    /* Contenedor principal */
    .testimonios-swiper {
      overflow: hidden;
      /* evita cortes en hover/sombra */
      padding-bottom: 3rem;
      /* espacio extra para sombras */
    }

    /* Cards */
    .card-testimonio {
      background: white;
      border-radius: 1rem;
      padding: 2rem;
      min-height: 180px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      /* centra verticalmente */
      text-align: center;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-testimonio:hover {
      transform: scale(1.05);
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
      z-index: 5;
      /* para que sobresalga */
    }

    /* Flechas */
    .custom-prev,
    .custom-next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 45px;
      height: 45px;
      z-index: 20;
      cursor: pointer;
    }

    .custom-prev,
    .custom-next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 45px;
      height: 45px;
      z-index: 20;
      cursor: pointer;

      /* Agregamos una transición para que el hover se vea más suave */
      transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .custom-prev {
      left: -2.5rem;
      /* flecha afuera */
    }

    .custom-next {
      right: -2.5rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .custom-prev {
        left: -1rem;
      }

      .custom-next {
        right: -1rem;
      }
    }

    /* Ajuste de opacidad lateral */
    .swiper-slide {
      transition: transform 0.4s ease, opacity 0.4s ease;
      opacity: 0.2;
    }

    .swiper-slide-active {
      opacity: 1;
      transform: scale(1.05);
      z-index: 10;
    }

    .swiper-slide-next,
    .swiper-slide-prev {
      opacity: 0.5;
    }

    /* Flechas personalizadas */
    .swiper-button-next,
    .swiper-button-prev {
      color: #1e3a8a;
      /* azul */
      transition: transform 0.3s ease, text-shadow 0.3s ease;
    }

    .swiper-button-next:hover,
    .swiper-button-prev:hover {
      text-shadow: 0 0 10px rgba(30, 58, 138, 0.8);
    }

    /* Bullets */
    .swiper-pagination-bullet {
      background: #1e3a8a;
      opacity: 0.4;
    }

    .swiper-pagination-bullet-active {
      opacity: 1;
      transform: scale(1.3);
    }


    /* Nuevo estilo para los títulos de sección */
    .section-title {
      font-family: 'Poppins', sans-serif;
      /* Usamos una fuente más moderna y amigable */
      font-size: 2.5rem;
      /* ~40px */
      font-weight: 600;
      /* Un peso medio, menos formal */
      color: #154584;
      /* Un gris más claro para un toque suave */
      text-align: center;
      position: relative;
      display: inline-block;
      padding-bottom: 5px;
      /* Espacio para la barra */
      transition: color 0.3s ease-in-out, transform 0.3s ease-in-out;
      /* Transición para el color y el transform */
    }

    /* Efecto de barra inferior con seudoelemento ::after */
    .section-title::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      /* Ancho de la barra */
      height: 4px;
      /* Grosor de la barra */
      background-color: #1e3a8a;
      /* Un color azul vibrante para destacar */
      border-radius: 2px;
      transition: width 0.3s ease-in-out;
    }

    /* Efecto al pasar el cursor (hover) */
    .section-title:hover {
      color: #0f52bd;
      /* Cambia a un azul un poco más oscuro y vibrante al hacer hover */
      transform: translateY(-3px);
      /* Se eleva ligeramente el texto */
    }

    .section-title:hover::after {
      width: 100px;
      /* La barra se expande al pasar el cursor */
    }

    /* Media Query para tamaños de pantalla más grandes */
    @media (min-width: 768px) {
      .section-title {
        font-size: 3.5rem;
        /* ~56px en escritorio */
      }

      .section-title::after {
        height: 5px;
        /* Barra un poco más gruesa en desktop */
      }
    }

    /* Animación Del Carrusel de iconos de clientes */
    @keyframes marquee {
      0% {
        transform: translateX(0);
      }

      100% {
        transform: translateX(-50%);
      }
    }

    .animate-marquee {
      display: flex;
      width: max-content;
      animation: marquee 25s linear infinite;
    }
  </style>
  <style>
    [x-cloak] {
      display: none !important;
    }
  </style>
</head>

<body class="bg-[#fdfaf6]">
  <div id="inicio">
    <?php include 'navbar.php'; ?>
  </div>

  <div x-data="{ openModal: false }">
    <section class="relative h-screen flex items-center justify-center text-center text-white overflow-hidden">

      <video autoplay loop muted playsinline
        class="absolute inset-0 w-full h-full object-cover 
                filter blur-sm brightness-75 
                transition-all duration-700 ease-in-out 
                hover:filter-none hover:brightness-100">
        <source src="Media/Serigrafia.mp4" type="video/mp4">
      </video>

      <div class="absolute inset-0 bg-black/30 transition-all duration-700 ease-in-out hover:bg-black/60"></div>

      <div class="relative z-10 max-w-3xl px-6">

        <h1 class="text-4xl md:text-6xl font-extrabold leading-tight tracking-wide text-center">
          Dale vida a tu marca con
          <span class="ml-2 text-[#fdfaf6] animate-pulse">Arsodus</span>
        </h1>
        <br>
        <p class="font-montserrat text-lg md:text-xl mb-8 drop-shadow-md opacity-90">
          Serigrafía, vinil, sublimación, bordado y DTF para empresas que buscan calidad superior en <span class="font-semibold">México</span>.
        </p>

        <!-- Botón que abre el modal -->
        <button
          @click="openModal = true"
          class="px-8 py-4 bg-[#0f52bd] text-white font-semibold rounded-full 
               shadow-lg hover:bg-[#0d47a1] hover:scale-105 
               transition-all duration-300 ease-out focus:outline-none 
               focus:ring-4 focus:ring-[#0f52bd]/40">
          Realizar cotización en línea
        </button>
      </div>
    </section>

    <!-- Modal Cotizador Sencillo -->
    <!-- 🔹 MODAL -->
    <div
      x-cloak
      x-show="openModal"
      x-transition.opacity.duration.300ms
      class="fixed inset-0 flex items-center justify-center z-50"
      style="background-color: rgba(0, 0, 0, 0.25); backdrop-filter: blur(3px);">
      <div
        @click.away="openModal = false"
        x-transition.scale.origin.center.duration.250ms
        class="bg-white text-gray-800 rounded-2xl shadow-xl w-11/12 max-w-md p-6 relative">
        <!-- Botón cerrar -->
        <button
          @click="openModal = false"
          class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 text-xl font-bold transition">
          ×
        </button>

        <!-- Contenido modal -->
        <h2 class="text-2xl font-semibold text-[#0f52bd] mb-4 text-center">Cotización en línea</h2>
        <p class="text-gray-600 text-center mb-6 text-sm">Envíanos tu idea y nos ponemos en contacto contigo al instante.</p>

        <form class="space-y-4">
          <input type="text" placeholder="Nombre"
            class="w-full border border-gray-200 rounded-lg px-4 py-2 focus:border-[#0f52bd] focus:ring focus:ring-[#0f52bd]/20 outline-none transition">
          <input type="text" placeholder="Número o correo"
            class="w-full border border-gray-200 rounded-lg px-4 py-2 focus:border-[#0f52bd] focus:ring focus:ring-[#0f52bd]/20 outline-none transition">
          <textarea placeholder="Cuéntanos tu idea" rows="3"
            class="w-full border border-gray-200 rounded-lg px-4 py-2 focus:border-[#0f52bd] focus:ring focus:ring-[#0f52bd]/20 outline-none transition"></textarea>
          <input type="file"
            class="w-full text-sm text-gray-600 file:mr-3 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#e9f1ff] file:text-[#0f52bd] hover:file:bg-[#d7e6ff] transition">

          <button type="submit"
            class="w-full py-3 bg-[#0f52bd] text-white font-semibold rounded-full shadow-lg hover:scale-105 hover:bg-[#0d47a1] transition-all duration-300">
            Enviar
          </button>
        </form>
      </div>
    </div>

  </div>




  <!-- Servicios con efecto flip 3D -->
  <section id="servicios" class="py-12 max-w-7xl mx-auto px-4">
    <div class="text-center mb-16 relative">
      <div class="text-center mb-6">
        <h2 class="section-title">
          Impulsa tu empresa con calidad
        </h2>
      </div>

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
              <img src="assets/icon/Serigrafía.png?v=<?php echo time(); ?>"
                alt="Serigrafía"
                class="w-10 h-10 object-contain">
            </div>

            <h3 class="font-heading font-bold text-xl text-blue-900 mb-2">Serigrafía</h3>
            <p class="font-sans text-center text-gray-600">Perfecto para uniformes de uso diario</p>


          </div>

          <!-- BACK -->
          <div class="flip-card-back bg-gradient-to-br from-blue-800 to-blue-900 rounded-2xl p-6 flex flex-col justify-center items-center text-white shadow-lg">
            <h3 class="font-heading font-bold text-xl mb-3">Serigrafía</h3>
            <ul class="font-sans text-sm space-y-2">
              <li class="flex items-center"><span class="mr-2">✓</span> Base agua o Ahulada</li>
              <li class="flex items-center"><span class="mr-2">✓</span> Una Tinta</li>
              <li class="flex items-center"><span class="mr-2">✓</span> Mínimo 15 piezas</li>
            </ul>

            <a href="Front/servicio.php?tipo=Serigrafía" class="font-sans mt-4 text-sm bg-white text-blue-900 py-2 px-4 rounded-full shadow hover:bg-gray-100 transition">
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
              <img src="assets/icon/Vinil.png?v=<?php echo time(); ?>"
                alt="Vinil"
                class="w-10 h-10 object-contain">
            </div>

            <h3 class="font-heading font-bold text-xl text-blue-900 mb-2">Vinil</h3>
            <p class="font-sans text-center text-gray-600">Excelente para calcamonias y souvenirs</p>
          </div>
          <div class="flip-card-back bg-gradient-to-br from-blue-800 to-blue-900 rounded-2xl p-6 flex flex-col justify-center items-center text-white shadow-lg">
            <h3 class="font-heading font-bold text-xl mb-3">Vinil de Corte</h3>
            <ul class="font-sans text-sm space-y-2">
              <li class="flex items-center text-left"><span class="mr-2">✓</span> Detalles nítidos</li>
              <li class="flex items-center text-left"><span class="mr-2">✓</span> Aplicación versátil</li>
              <li class="flex items-center text-left"><span class="mr-2">✓</span> Personalización de uniformes deportivos</li>
            </ul>
            <a href="Front/servicio.php?tipo=Vinil" class="font-sans mt-4 text-sm bg-white text-blue-900 py-2 px-4 rounded-full shadow hover:bg-gray-100 transition">
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
              <img src="assets/icon/Sublimación.png?v=<?php echo time(); ?>"
                alt="Sublimación"
                class="w-10 h-10 object-contain">
            </div>

            <h3 class="font-heading font-bold text-xl text-blue-900 mb-2">Sublimación</h3>
            <p class="font-sans text-center text-gray-600"> Ideal para impresión en alta calidad</p>
          </div>
          <div class="flip-card-back bg-gradient-to-br from-blue-800 to-blue-900 rounded-2xl p-6 flex flex-col justify-center items-center text-white shadow-lg">
            <h3 class="font-heading font-bold text-xl mb-3">Sublimación</h3>
            <ul class="font-sans text-sm space-y-2">
              <li class="flex items-center"><span class="mr-2">✓</span> Estampado completo</li>
              <li class="flex items-center"><span class="mr-2">✓</span> Sin sensación de estampado</li>
              <li class="flex items-center"><span class="mr-2">✓</span> Ideal para artículos claros</li>
            </ul>
            <a href="Front/servicio.php?tipo=Sublimación" class="font-sans mt-4 text-sm bg-white text-blue-900 py-2 px-4 rounded-full shadow hover:bg-gray-100 transition">
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
              <img src="assets/icon/Bordado.png?v=<?php echo time(); ?>"
                alt="Bordado"
                class="w-10 h-10 object-contain">
            </div>

            <h3 class="font-heading font-bold text-xl text-blue-900 mb-2">Bordado</h3>
            <p class="font-sans text-center text-gray-600"> Utilizado pricipalmente para logos bordados</p>
          </div>
          <div class="flip-card-back bg-gradient-to-br from-blue-800 to-blue-900 rounded-2xl p-6 flex flex-col justify-center items-center text-white shadow-lg">
            <h3 class="font-heading font-bold text-xl mb-3">Bordado</h3>
            <ul class="font-sans text-sm space-y-2 text-center">
              <li class="flex items-center"><span class="mr-2">✓</span> Hasta tamaño carta.</li>
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
              <img src="assets/icon/DTF.png?v=<?php echo time(); ?>"
                alt="DTF"
                class="w-10 h-10 object-contain">
            </div>

            <h3 class="font-heading font-bold text-xl text-blue-900 mb-2">DTF</h3>
            <p class="font-sans text-center text-gray-600">Impresiones de diseños en alta definición </p>
          </div>
          <div class="flip-card-back bg-gradient-to-br from-blue-800 to-blue-900 rounded-2xl p-6 flex flex-col justify-center items-center text-white shadow-lg">
            <h3 class="font-heading font-bold text-xl mb-3">DTF</h3>
            <ul class="font-sans text-sm space-y-2">
              <li class="flex items-center"><span class="mr-2">✓</span> Se recomiendan imagenes sin fondo</li>
              <li class="flex items-center"><span class="mr-2">✓</span> Estampado flexible</li>
              <li class="flex items-center"><span class="mr-2">✓</span> Excelente en colores oscuros</li>
            </ul>
            <a href="Front/servicio.php?tipo=DTF" class="font-sans mt-4 text-sm bg-white text-blue-900 py-2 px-4 rounded-full shadow hover:bg-gray-100 transition">
              Conoce más →
            </a>
          </div>
        </div>
      </div>

    </div>
    <br>
  </section>

  <!-- Seccion de Clientes -->
  <section class="bg-gradient-to-r from-blue-50 to-indigo-100 py-10">
    <div class="max-w-7xl mx-auto px-6">
      <!-- Titulo -->
      <div class="text-center mb-6">
        <h2 class="section-title">
          Algunos De Nuestros Clientes
        </h2>
      </div>

      <!-- Carrusel -->
      <div class="relative overflow-hidden">
        <div class="flex space-x-12 animate-marquee">

          <!-- Bloque 1 -->
          <img src="assets/img/Clientes/Charros.png" alt="Charros de Jalisco"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">
          <img src="assets/img/Clientes/Nazil.png" alt="Nazil"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">
          <img src="assets/img/Clientes/Bandrex.png" alt="Bandrex"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">
          <img src="assets/img/Clientes/Kaimex.png" alt="Kaimex"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">
          <img src="assets/img/Clientes/Universidad.png" alt="UdeG"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">
          <img src="assets/img/Clientes/Cucea.png" alt="CUCEA"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">
          <img src="assets/img/Clientes/Tequilart.png" alt="TequilArt"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">

          <!-- Bloque 2 (duplicado para el loop) -->
          <img src="assets/img/Clientes/Charros.png" alt="Charros de Jalisco"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">
          <img src="assets/img/Clientes/Nazil.png" alt="Nazil"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">
          <img src="assets/img/Clientes/Bandrex.png" alt="Bandrex"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">
          <img src="assets/img/Clientes/Kaimex.png" alt="Kaimex"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">
          <img src="assets/img/Clientes/Universidad.png" alt="UdeG"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">
          <img src="assets/img/Clientes/Cucea.png" alt="CUCEA"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">
          <img src="assets/img/Clientes/Tequilart.png" alt="TequilArt"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">

        </div>
      </div>

    </div>
  </section>

  <!-- Sección Testimonios -->
  <section class="testimonios py-10 relative bg-gradient-to-r from-blue-50 to-indigo-100">
    <div class="max-w-7xl mx-auto px-6 relative">

      <!-- Título -->
      <div class="text-center mb-6">
        <h2 class="section-title">
          Sus Comentarios
        </h2>
      </div>

      <!-- Swiper -->
      <div class="swiper-container testimonios-swiper">
        <br>
        <div class="swiper-wrapper">

          <!-- Card 1 -->
          <div class="swiper-slide">
            <div class="card-testimonio">
              <p class="text-gray-700 italic mb-4">
                "La mejor calidad, tiempo de entrega ideal
                Muy buena atención"
              </p>
              <div class="flex justify-center mb-3 text-yellow-400">
                ★★★★★
              </div>
              <p class="font-bold text-center">Isabel T.</p>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="swiper-slide">
            <div class="card-testimonio">
              <p class="text-gray-700 italic mb-4">
                "Excelente calidad y diseños increíbles"
              </p>
              <div class="flex justify-center mb-3 text-yellow-400">
                ★★★★
              </div>
              <p class="font-bold text-center">Alejandra B.</p>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="swiper-slide">
            <div class="card-testimonio">
              <p class="text-gray-700 italic mb-4">
                "Nos tienes increíblemente contentos con tu trabajo, que buena calidad, mil gracias ✨"
              </p>
              <div class="flex justify-center mb-3 text-yellow-400">
                ★★★★★
              </div>
              <p class="font-bold text-center">Aura J.</p>
            </div>
          </div>

          <!-- Card 4 -->
          <div class="swiper-slide">
            <div class="card-testimonio">
              <p class="text-gray-700 italic mb-4">
                "10 de 10, excelente calidad en los diseños y las telas, quedan increíbles a la hora de usarlas, muy satisfecho con el producto."
              </p>
              <div class="flex justify-center mb-3 text-yellow-400">
                ★★★★★
              </div>
              <p class="font-bold text-center">Uriel H.</p>
            </div>
          </div>

          <!-- Card 5 -->
          <div class="swiper-slide">
            <div class="card-testimonio">
              <p class="text-gray-700 italic mb-4">
                "Excelentes trabajos y diseños, manejan calidad de
                10/10 🥵🤩
                para qué comprar en tiendas de diseñadores caros, si ARSODUS te da mejor calidad
                en telas."
              </p>
              <div class="flex justify-center mb-3 text-yellow-400">
                ★★★★★
              </div>
              <p class="font-bold text-center">Gian C.</p>
            </div>
          </div>

          <!-- Card 6 -->
          <div class="swiper-slide">
            <div class="card-testimonio">
              <p class="text-gray-700 italic mb-4">"Manejan telas de muy buena calidad y ni se diga del gran trabajo en la serigrafia, muy de mega maaaas, excelente servicio y atención siempre 🤌🏽👍🏽"</p>
              <div class="flex justify-center mb-3 text-yellow-400">
                ★★★★★
              </div>
              <p class="font-bold text-center">Pilar L.</p>
            </div>
          </div>

          <!-- Card 7 -->
          <div class="swiper-slide">
            <div class="card-testimonio">
              <p class="text-gray-700 italic mb-4">
                "Me encanto la calidad, tamaño y diseño de las prendas, recomiendo demasiado, super cómodas. "
              </p>
              <div class="flex justify-center mb-3 text-yellow-400">
                ★★★★★
              </div>
              <p class="font-bold text-center">Heriberto H.</p>
            </div>
          </div>

        </div>
      </div>


      <!-- Flechas -->
      <!-- Botones de navegación -->
      <div class="swiper-button-next custom-next"></div>
      <div class="swiper-button-prev custom-prev"></div>

      <!-- Bullets -->
      <div class="swiper-pagination mt-8"></div>
    </div>
    </div>
  </section>

  <!--  Sección de Contacto: Formulario de Ideas -->
  <section id="contacto" class="py-20 bg-gradient-to-br from-[#fdfaf6] to-gray-100 relative overflow-hidden">

    <div class="absolute inset-0 z-0 opacity-10">
      <svg class="w-full h-full" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="20" cy="20" r="10" fill="#93C5FD" />
        <rect x="70" y="30" width="15" height="15" fill="#BFDBFE" />
        <path d="M40 80 L50 90 L60 80 Z" fill="#60A5FA" />
        <circle cx="85" cy="70" r="8" fill="#93C5FD" />
      </svg>
    </div>

    <div class="max-w-3xl mx-auto px-6 relative z-10">
      <div class="bg-white p-8 md:p-16 rounded-3xl shadow-2xl transform transition-transform duration-500 hover:scale-[1.01] hover:shadow-3xl border-t-4 border-blue-600">

        <div class="text-center mb-10">

          <h2 class="font-Poppins text-4xl md:text-5xl font-extrabold text-blue-900 mb-4 animate-fade-in-down">
            ¿Listo para transformar <span class="text-blue-600">tu idea</span> en realidad?

          </h2>


          <div class="text-center mb-6">

          </div>

          <p class="font-montserrat text-lg text-gray-700 max-w-lg mx-auto animate-fade-in delay-200">
            Tu visión es nuestro lienzo, Cuéntanos qué tienes en mente:
          </p>
        </div>

        <form class="flex flex-col gap-6">
          <input
            type="text"
            placeholder="Cual es tu nombre?"
            class="font-sans w-full px-5 py-3 rounded-xl border-2 border-gray-300 bg-gray-50
                 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:border-blue-500
                 transition-all duration-300 ease-in-out placeholder-gray-500 text-gray-800
                 shadow-sm hover:shadow-md hover:border-blue-400">

          <input
            type="text"
            placeholder="Tu Correo o Teléfono"
            class="font-sans w-full px-5 py-3 rounded-xl border-2 border-gray-300 bg-gray-50
                 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:border-blue-500
                 transition-all duration-300 ease-in-out placeholder-gray-500 text-gray-800
                 shadow-sm hover:shadow-md hover:border-blue-400">

          <textarea
            placeholder="Platícanos tu increíble idea o proyecto aquí..."
            rows=""
            class="font-sans w-full px-5 py-3 rounded-xl border-2 border-gray-300 bg-gray-50
                 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:border-blue-500
                 transition-all duration-300 ease-in-out resize-y placeholder-gray-500 text-gray-800
                 shadow-sm hover:shadow-md hover:border-blue-400"></textarea>

          <input
            type="file"
            class="font-sans w-full text-sm text-gray-600
                 file:mr-4 file:py-2 file:px-4
                 file:rounded-full file:border-0
                 file:text-sm file:font-semibold
                 file:bg-blue-100/50 file:text-blue-700
                 hover:file:bg-blue-200/70
                 transition-all duration-300 ease-in-out">

          <button
            type="submit"
            class="font-montserrat w-full bg-gradient-to-r from-blue-700 to-blue-900 text-white font-extrabold 
                 px-8 py-4 rounded-xl shadow-xl hover:from-blue-800 hover:to-blue-950 
                 transform hover:scale-105 transition-all duration-300 ease-out 
                 focus:outline-none focus:ring-4 focus:ring-blue-400 focus:ring-opacity-75
                 tracking-wide text-lg">
            ¡Enviar Mi Idea Ahora!
          </button>
        </form>
      </div>

      <p class="font-montserrat text-sm text-gray-600 mt-8 text-center animate-fade-in delay-500">
        Tu mensaje es importante para nosotros. En breve, el equipo de Arsodus se comunicará contigo para discutir los detalles. ¡Gracias por confiar en nosotros!
      </p>
    </div>
  </section>

  <style>
    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    .animate-fade-in-down {
      animation: fadeInDown 0.8s ease-out forwards;
    }

    .animate-fade-in {
      animation: fadeIn 0.8s ease-out forwards;
    }

    .delay-200 {
      animation-delay: 0.2s;
    }

    .delay-500 {
      animation-delay: 0.5s;
    }
  </style>
  <?php include 'Cotizador/Cotizador.php'; ?>

  <?php include 'Front/footer.php'; ?>




</body>

</html>