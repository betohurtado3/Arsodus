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
  <script src="//unpkg.com/alpinejs" defer></script>
  <link rel="stylesheet" href="assets/css/index.css">
  <title>Arsodus</title>
  <link rel="icon" type="image/png" href="assets/img/LogoSinFondo.png">
</head>

<body class="bg-[#fdfaf6]">
  <div id="inicio">
    <?php include 'Front/navbar.php'; ?>
  </div>

  <!-- Hero Section -->
  <div x-data="{ openModal: false }">
    <section class="relative h-screen flex items-center justify-center text-center text-white">

      <!-- Video de fondo -->
      <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover">
        <source src="Media/HeroVideo.mov" type="video/mp4">
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

  <!-- Servicios con efecto flip 3D -->
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


  <!-- Reseñas -->
  <section class="bg-gray-100 py-20" id="testimonios">
    <h2 class="Font-raleway text-3xl font-bold text-center mb-12">Lo que dicen nuestros clientes</h2>

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