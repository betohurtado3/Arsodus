<?php
/*    
Actualizaciones pendientes:
  Navbar ojo, hay dos navbar xd

  Cotizador 
  - Agregar Opciones de Colores en la fase 1
  

  Servicios
  -> Imagenes representativas /// Pendiente del cliente

  Galeria:
  -> Mejor Acomodo de Imagenes

  ////////////////////////////////// Pendiente del cliente
  Proyecto(Individual):
  -> Agregar Iconos e información del proyecto
  - Homologar diseño de titulos

  General:
  -> Revisar ortografía y gramática
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
</head>

<body class="bg-[#fdfaf6]">
  <div id="inicio">
    <?php include 'navbar.php'; ?>
  </div>

  <!-- Hero Section -->
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
          Serigrafía, vinil, sublimación, bordado y DTF para empresas que buscan calidad superior en <span class="font-semibold"> México</span>.
        </p>
        <button id="abrirCotizador"
          class="px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold rounded-full 
               shadow-lg hover:from-blue-700 hover:to-blue-900 
               transform hover:scale-105 transition-all duration-300 ease-out 
               focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-75">
          Iniciar Cotización
        </button>
      </div>
    </section>
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
            <p class="font-sans text-center text-gray-600">Ideal para uniformes de uso diario.</p>


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
            <p class="font-sans text-center text-gray-600">Cortes perfectos</p>
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
            <p class="font-sans text-center text-gray-600"> Ideal para logos pequeños</p>
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
          Nuestros Clientes
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
          <img src="assets/img/Clientes/Well.png" alt="Well Company"
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
          <img src="assets/img/Clientes/Well.png" alt="Well Company"
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

          <button
            type="submit"
            class="font-montserrat w-full bg-gradient-to-r from-blue-700 to-blue-900 text-white font-extrabold 
                 px-8 py-4 rounded-xl shadow-xl hover:from-blue-800 hover:to-blue-950 
                 transform hover:scale-105 transition-all duration-300 ease-out 
                 focus:outline-none focus:ring-4 focus:ring-blue-400 focus:ring-opacity-75
                 tracking-wide text-lg">
            ¡Enviar Mi Propuesta Ahora!
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


  <?php include 'Front/footer.php'; ?>

  <!-- ------------------------------ Modales ------------------------------------------ -->

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
          <span class="mt-2 text-xs font-medium text-gray-500">Técnica</span>
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
          <div id="paso5" class="w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300 border-2 border-gray-400 text-gray-400">4</div>
          <span class="mt-2 text-xs font-medium text-gray-500">Finalizar</span>
        </div>


      </div>

      <!-- Contenido Fase 1 -->
      <div id="fase1" class="grid grid-cols-1 sm:grid-cols-2 gap-4">

        <!-- Algodón -->
        <div class="p-4 border rounded cursor-pointer hover:shadow relative overflow-hidden group"
          data-tela='{"nombre":"Algodón","precio":70}'>
          <!-- Fondo textura -->
          <div class="absolute inset-0 bg-[url('assets/img/textures/Algodon.jpg')] bg-cover bg-center opacity-0 group-hover:opacity-80 transition-opacity duration-500"></div>
          <h3 class="font-semibold relative z-10">Algodón</h3>
          <p class="text-sm text-gray-500 relative z-10">Suavidad y comodidad. $60 - $80</p>
        </div>

        <!-- Algodón Poliéster -->
        <div class="p-4 border rounded cursor-pointer hover:shadow relative overflow-hidden group"
          data-tela='{"nombre":"Algodón poliéster","precio":65}'>
          <!-- Fondo textura -->
          <div class="absolute inset-0 bg-[url('assets/img/textures/AlgoPol.png')] bg-cover bg-center opacity-0 group-hover:opacity-80 transition-opacity duration-500"></div>
          <h3 class="font-semibold relative z-10">Algodón Poliéster</h3>
          <p class="text-sm text-gray-500 relative z-10">Durabilidad y confort. $55 - $75</p>
        </div>

        <!-- Poliéster -->
        <div class="p-4 border rounded cursor-pointer hover:shadow relative overflow-hidden group"
          data-tela='{"nombre":"Poliéster","precio":50}'>
          <!-- Fondo textura -->
          <div class="absolute inset-0 bg-[url('assets/img/textures/Poliester.jpg')] bg-cover bg-center opacity-0 group-hover:opacity-80 transition-opacity duration-500"></div>
          <h3 class="font-semibold relative z-10">Poliéster</h3>
          <p class="text-sm text-gray-500 relative z-10">Resistencia y ligereza. $40 - $60</p>
        </div>

        <!-- Algodón Poliéster Nylon -->
        <div class="p-4 border rounded cursor-pointer hover:shadow relative overflow-hidden group"
          data-tela='{"nombre":"Algodón poliéster nylon","precio":80}'>
          <!-- Fondo textura -->
          <div class="absolute inset-0 bg-[url('assets/img/textures/Nylon.png')] bg-cover bg-center opacity-0 group-hover:opacity-80 transition-opacity duration-500"></div>
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
          <div class="absolute inset-0 bg-[url('assets/img/textures/Serigrafia.png')] bg-cover bg-center opacity-0 group-hover:opacity-50 transition-opacity duration-500"></div>
          <h3 class="font-semibold relative z-10">Serigrafía</h3>
          <p class="text-sm text-gray-500 relative z-10">Colores sólidos, +$30</p>
        </div>

        <!-- DTF -->
        <div class="p-4 border rounded cursor-pointer hover:shadow relative overflow-hidden group"
          data-tecnica='{"nombre":"DTF","extra":15}'>
          <div class="absolute inset-0 bg-[url('assets/img/textures/DTF.jpg')] bg-cover bg-center opacity-0 group-hover:opacity-50 transition-opacity duration-500"></div>
          <h3 class="font-semibold relative z-10">DTF</h3>
          <p class="text-sm text-gray-500 relative z-10">Calidad de impresión, +$15</p>
        </div>

        <!-- Bordado -->
        <div class="p-4 border rounded cursor-pointer hover:shadow relative overflow-hidden group"
          data-tecnica='{"nombre":"Bordado","extra":40}'>
          <div class="absolute inset-0 bg-[url('assets/img/textures/Bordado.png')] bg-cover bg-center opacity-0 group-hover:opacity-50 transition-opacity duration-500"></div>
          <h3 class="font-semibold relative z-10">Bordado</h3>
          <p class="text-sm text-gray-500 relative z-10">Durabilidad, +$40</p>
        </div>

        <!-- Sublimación -->
        <div class="p-4 border rounded cursor-pointer hover:shadow relative overflow-hidden group"
          data-tecnica='{"nombre":"Sublimación","extra":45}'>
          <div class="absolute inset-0 bg-[url('assets/img/textures/sublimacion.jpg')] bg-cover bg-center opacity-0 group-hover:opacity-50 transition-opacity duration-500"></div>
          <h3 class="font-semibold relative z-10">Sublimación</h3>
          <p class="text-sm text-gray-500 relative z-10">Alta Calidad, +$45</p>
        </div>

        <!-- Vinil -->
        <div class="p-4 border rounded cursor-pointer hover:shadow relative overflow-hidden group"
          data-tecnica='{"nombre":"Vinil","extra":30}'>
          <div class="absolute inset-0 bg-[url('assets/img/textures/vinil.avif')] bg-cover bg-center opacity-0 group-hover:opacity-50 transition-opacity duration-500"></div>
          <h3 class="font-semibold relative z-10">Vinil</h3>
          <p class="text-sm text-gray-500 relative z-10">Permanencia, +$30</p>
        </div>

      </div>


      <!-- Contenido Fase 3 -->
      <div id="fase3" class="hidden">
        <label class="block mb-2 font-medium">Sube tu diseño (JPEG, PNG o GIF)</label>
        <input type="file" id="inputImagen" accept=".jpg,.jpeg,.png,.gif"
          class="block w-full border rounded p-2 mb-4">
        <label class="block mb-2 font-medium">Cantidad</label>

        <input type="number" id="inputCantidad" min="10" value="10"
          class="block w-full border rounded p-2">
      </div>

      <!-- Contenido Fase 4 -->
      <div id="fase4" class="hidden mt-4">
        <h3 class="text-xl font-bold mb-4">Resumen de tu pedido</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <!-- Detalles -->
          <div class="border rounded-lg p-4 shadow-sm bg-gray-50 space-y-3">
            <p class="text-gray-700"><strong>Tela:</strong> <span id="resumenTela">—</span></p>
            <p class="text-gray-700"><strong>Técnica:</strong> <span id="resumenTecnica">—</span></p>
            <p class="text-gray-700"><strong>Cantidad:</strong> <span id="resumenCantidad">—</span></p>
            <p class="text-lg font-semibold text-blue-700">
              Total: <span id="resumenTotal">—</span>
            </p>
          </div>

          <!-- Imagen subida -->
          <div class="border rounded-lg p-4 shadow-sm bg-white flex flex-col items-center justify-center">
            <p class="text-sm text-gray-500 mb-3">Diseño subido</p>
            <img id="resumenImg"
              class="max-h-64 w-auto rounded-lg border border-gray-200 shadow-md object-contain"
              src="https://dummyimage.com/300x300/ddd/aaa.png&text=Sin+imagen"
              alt="Diseño subido">
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
    var swiper = new Swiper(".testimonios-swiper", {
      slidesPerView: 3, // siempre mostrar 3
      spaceBetween: 30,
      grabCursor: true,
      loop: true, // 🔥 permite ir hacia la izquierda y derecha sin fin
      centeredSlides: true, // 🔥 centra siempre el slide activo
      navigation: {
        nextEl: ".custom-next",
        prevEl: ".custom-prev",
      },
      effect: "coverflow", // 🔥 da profundidad tipo carrusel
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 120,
        modifier: 1,
        slideShadows: false,
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      },
    });
  </script>

  <!-- Scripts para el Modal del Cotizador -->
  <script>
    // Agrega esta nueva variable global
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
      }
    };

    // Referencias del modal
    const modalCotizador = document.getElementById('cotizadorModal');
    const modalContent = document.getElementById('cotizadorContent');
    const abrir = document.getElementById('abrirCotizador');
    const cerrar = document.getElementById('cerrarModal');
    const btnContinuar = document.getElementById('btnContinuar');
    const btnAtras = document.getElementById('btnAtras');
    const faseProgreso = document.getElementById('faseProgreso');
    const faseActual = document.getElementById('faseActual');

    // Contenedores de fases
    const fase1 = document.getElementById('fase1');
    const fase2 = document.getElementById('fase2');
    const fase3 = document.getElementById('fase3');
    const fase4 = document.getElementById('fase4');
    const fase5 = document.getElementById('fase5');

    // Resumen fase 4
    const resumenTela = document.getElementById('resumenTela');
    const resumenTecnica = document.getElementById('resumenTecnica');
    const resumenCantidad = document.getElementById('resumenCantidad');
    const resumenTotal = document.getElementById('resumenTotal');
    const resumenImg = document.getElementById('resumenImg');

    const progressBar = document.getElementById('progressBar');

    const faseTitulo = document.getElementById('faseTitulo');
    const faseDescripcion = document.getElementById('faseDescripcion');

    const radios = document.querySelectorAll('input[name="contactoTipo"]');
    const correoInput = document.getElementById('correo');
    const whatsappInput = document.getElementById('whatsapp');
    const formCotizacion = document.getElementById("formCotizacion");

    // Variables globales
    let fase = 1;
    let seleccion = {
      tela: null,
      tecnica: null,
      imagen: null,
      cantidad: 10 // Iniciamos con 10 por defecto
    };

    // ---- Abrir modal con animación ----
    abrir.addEventListener('click', () => {
      modalCotizador.classList.remove('opacity-0', 'pointer-events-none');
      setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
      }, 20);
    });

    // ---- Cerrar modal con animación ----
    cerrar.addEventListener('click', () => {
      modalContent.classList.remove('scale-100', 'opacity-100');
      modalContent.classList.add('scale-95', 'opacity-0');
      setTimeout(() => {
        modalCotizador.classList.add('opacity-0', 'pointer-events-none');
      }, 300);
    });

    // Selección de telas
    document.querySelectorAll('#fase1 [data-tela]').forEach(card => {
      card.addEventListener('click', () => {
        document.querySelectorAll('#fase1 [data-tela]').forEach(c => c.classList.remove('border-blue-500'));
        card.classList.add('border-blue-500');
        seleccion.tela = JSON.parse(card.dataset.tela);
        validarFaseActual(); // Validar después de seleccionar
      });
    });

    // Selección de técnicas
    document.querySelectorAll('#fase2 [data-tecnica]').forEach(card => {
      card.addEventListener('click', () => {
        document.querySelectorAll('#fase2 [data-tecnica]').forEach(c => c.classList.remove('border-blue-500'));
        card.classList.add('border-blue-500');
        seleccion.tecnica = JSON.parse(card.dataset.tecnica);
        validarFaseActual(); // Validar después de seleccionar
      });
    });

    // Input imagen
    const inputImagen = document.getElementById('inputImagen');
    if (inputImagen) {
      inputImagen.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file && ["image/jpeg", "image/png", "image/gif"].includes(file.type)) {
          seleccion.imagen = file;
          validarFaseActual(); // Validar después de subir imagen
        } else {
          alert("Formato no permitido. Sube JPEG, PNG o GIF.");
          inputImagen.value = "";
          seleccion.imagen = null;
          validarFaseActual();
        }
      });
    }

    // Input cantidad - VALIDACIÓN MEJORADA
    const inputCantidad = document.getElementById('inputCantidad');
    if (inputCantidad) {
      const validarCantidad = () => {
        const valor = parseInt(inputCantidad.value) || 0;
        const esValido = valor >= 10;

        // Aplicar estilos de validación
        if (esValido) {
          inputCantidad.classList.remove('border-red-500', 'bg-red-50');
          inputCantidad.classList.add('border-green-500');
          seleccion.cantidad = valor;
        } else {
          inputCantidad.classList.remove('border-green-500');
          inputCantidad.classList.add('border-red-500', 'bg-red-50');
          seleccion.cantidad = 0; // Marcamos como inválido
        }

        validarFaseActual(); // Validar botón continuar
      };

      inputCantidad.addEventListener('input', validarCantidad);
      inputCantidad.addEventListener('change', validarCantidad);

      // Validar inicialmente
      setTimeout(validarCantidad, 100);
    }

    // Cambiar entre correo y whats
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



    formCotizacion.addEventListener("submit", (e) => {
      // Pasar tela, técnica y cantidad
      document.getElementById("inputTela").value = seleccion.tela?.nombre || "";
      document.getElementById("inputTecnica").value = seleccion.tecnica?.nombre || "";
      document.getElementById("inputCantidadHidden").value = seleccion.cantidad || "";

      const base = seleccion.tela?.precio || 0;
      const extra = seleccion.tecnica?.extra || 0;
      const total = (base + extra) * (seleccion.cantidad || 1);
      document.getElementById("inputTotal").value = total;

      // Pasar imagen como base64
      if (seleccion.imagen) {
        const reader = new FileReader();
        reader.onload = function(ev) {
          document.getElementById("inputImagenHidden").value = ev.target.result;
          formCotizacion.submit(); // 🔥 reenvía el form cuando ya está la imagen lista
        };
        reader.readAsDataURL(seleccion.imagen);

        e.preventDefault(); // Evita enviar antes de convertir la imagen
      }
    });

    // Función para validar el estado del botón continuar
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
          esValido = true; // En la fase 4 siempre se puede continuar
          break;
        case 5:
          esValido = true;
          break;
      }

      // Actualizar estado del botón
      if (btnContinuar) {
        if (esValido) {
          btnContinuar.disabled = false;
          btnContinuar.classList.remove('bg-gray-400', 'cursor-not-allowed');
          btnContinuar.classList.add('bg-blue-600', 'hover:bg-blue-700');
        } else {
          btnContinuar.disabled = true;
          btnContinuar.classList.remove('bg-blue-600', 'hover:bg-blue-700');
          btnContinuar.classList.add('bg-gray-400', 'cursor-not-allowed');
        }
      }

      return esValido;
    }

    // Botón Continuar - avanza a la siguiente fase si es válida
    if (btnContinuar) {
      btnContinuar.addEventListener('click', () => {
        if (validarFase()) { // Validar que los datos de la fase actual sean correctos
          if (fase < 5) { // Solo avanza si no es la última fase
            fase++; // Incrementar contador de fase
            renderFase(); // Renderizar contenido correspondiente
            validarFaseActual(); // Ejecutar validación específica de la nueva fase
          }
        }
      });
    }

    // Botón atrás
    if (btnAtras) {
      btnAtras.addEventListener('click', () => {
        if (fase > 1) {
          fase--;
          renderFase();
          validarFaseActual(); // Validar nueva fase
        }
      });
    }

    // Mostrar fases
    // Mostrar la fase correspondiente y actualizar datos
    // Función para renderizar el contenido de cada fase
    function renderFase() {
      // Ocultar todas las fases
      ['fase1', 'fase2', 'fase3', 'fase4', 'fase5'].forEach(id => {
        const element = document.getElementById(id);
        if (element) element.classList.add('hidden');
      });

      // Mostrar solo la fase actual
      const faseActualElement = document.getElementById(`fase${fase}`);
      if (faseActualElement) faseActualElement.classList.remove('hidden');

      // --- NUEVA LÓGICA DE ACTUALIZACIÓN DE TÍTULOS Y DESCRIPCIONES ---
      const info = fasesInfo[fase];
      console.log(info)
      if (faseTitulo) faseTitulo.textContent = info.titulo;
      if (faseDescripcion) faseDescripcion.textContent = info.descripcion;

      // Lógica de la barra de progreso
      const pasos = ['paso1', 'paso2', 'paso3', 'paso4', 'paso5'];
      pasos.forEach((pasoId, index) => {
        const pasoElement = document.getElementById(pasoId);
        if (pasoElement) {
          if (index < fase) {
            pasoElement.classList.remove('border-gray-400', 'text-gray-400');
            pasoElement.classList.add('border-blue-500', 'bg-blue-500', 'text-white');
          } else {
            pasoElement.classList.remove('border-blue-500', 'bg-blue-500', 'text-white');
            pasoElement.classList.add('border-gray-400', 'text-gray-400');
          }
        }
      });

      // Mostrar u ocultar botón "Continuar" dependiendo de la fase
      if (btnContinuar) {
        if (fase === 5) {
          btnContinuar.classList.add('hidden');
        } else {
          btnContinuar.classList.remove('hidden');
        }
      }

      // Si estamos en la fase 4, renderizar resumen
      if (fase === 4) {
        if (resumenTela) resumenTela.textContent = seleccion.tela?.nombre || "—";
        if (resumenTecnica) resumenTecnica.textContent = seleccion.tecnica?.nombre || "—";
        if (resumenCantidad) resumenCantidad.textContent = seleccion.cantidad || "—";

        const base = seleccion.tela?.precio || 0;
        const extra = seleccion.tecnica?.extra || 0;
        const total = (base + extra) * (seleccion.cantidad || 1);
        if (resumenTotal) resumenTotal.textContent = `$${total.toFixed(2)}`;

        if (seleccion.imagen && resumenImg) {
          const reader = new FileReader();
          reader.onload = ev => resumenImg.src = ev.target.result;
          reader.readAsDataURL(seleccion.imagen);
        }

        console.log("Resumen actualizado", resumenTotal);
      }
    }


    // Validaciones al hacer clic en continuar
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

    // Validar inicialmente al cargar
    setTimeout(() => {
      validarFaseActual();
    }, 100);


    feather.replace();
    renderFase();
  </script>
  
</body>

</html>