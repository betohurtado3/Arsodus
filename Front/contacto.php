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
  <title>Arsodus</title>
  <link rel="icon" type="image/png" href="/assets/img/LogoSinFondo.png">
  <script src="//unpkg.com/alpinejs" defer></script>


  <!-- Metadatos dinámicos para compartir -->
  <meta property="og:title" content="Arsodus">
  <meta property="og:description" content="Dale vida a tu marca con Arsodus">
  <meta property="og:image" content="/assets/img/LogoSinFondo.png">
  <meta property="og:url" content="https://arsodus.com/">
  <meta property="og:type" content="website">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Arsodus">
  <meta name="twitter:description" content="Dale vida a tu marca con Arsodus">
  <meta name="twitter:image" content="/assets/img/LogoSinFondo.png">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


  <style>
    body {
      padding-top: 80px;
      /* Ajusta según la altura de tu navbar */
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
  </style>
</head>

<body class="bg-[#fdfaf6] text-gray-800 font-sans">

  <div id="inicio">
    <?php include 'navbar.php'; ?>
  </div>
  <br>

  <section class="bg-[#fdfaf6] py-16">
    <div class="max-w-4xl mx-auto px-6 text-center">
      <!-- Foto / Logo -->
      <img src="../assets/img/LogoSinFondo.png"
        alt="Foto de Arsodus"
        class="w-32 h-32 mx-auto rounded-full shadow-lg mb-6 object-cover">

      <!-- Texto descriptivo -->
      <div class="text-center mb-6">
        <h2 class="section-title">
          Arsodus
        </h2>
      </div>

      <p class="text-gray-700 leading-relaxed max-w-2xl mx-auto">
        Con más de 5 años de experiencia y colaboraciones con organizaciones de alto nivel, hemos desarrollado procesos que garantizan acabados duraderos, colores que destacan y una entrega confiable en cada pedido.
        Impulsamos la identidad de negocios y organizaciones con serigrafía profesional y acabados que perduran. Aquí tus ideas se vuelven piezas que se ven, se sienten y representan tu marca con fuerza.
      </p>
    </div>
  </section>



  <section class="bg-gradient-to-r from-blue-50 to-indigo-100 py-10">


    <div class="text-center mb-9">
      <h2 class="section-title">
        🚀 Hagamos despegar tu proyecto
      </h2>
    </div>
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

      <!-- Columna formulario -->
      <div>
        <form
          class="flex flex-col gap-6"
          method="POST"
          action="Back/enviar_cotizacion.php"
          enctype="multipart/form-data">

          <!-- NOMBRE -->
          <input
            type="text"
            name="nombre"
            placeholder="¿Cuál es tu nombre?"
            required
            class="font-sans w-full px-5 py-3 rounded-xl border-2 border-gray-300 bg-gray-50
           focus:outline-none focus:ring-4 focus:ring-blue-300 focus:border-blue-500
           transition-all duration-300 ease-in-out placeholder-gray-500 text-gray-800
           shadow-sm hover:shadow-md hover:border-blue-400">

          <!-- CONTACTO (TEL O CORREO) -->
          <input
            type="text"
            name="contacto"
            placeholder="Tu Correo o Teléfono"
            required
            class="font-sans w-full px-5 py-3 rounded-xl border-2 border-gray-300 bg-gray-50
           focus:outline-none focus:ring-4 focus:ring-blue-300 focus:border-blue-500
           transition-all duration-300 ease-in-out placeholder-gray-500 text-gray-800
           shadow-sm hover:shadow-md hover:border-blue-400">

          <!-- MENSAJE -->
          <textarea
            name="mensaje"
            placeholder="Platícanos tu increíble idea o proyecto aquí..."
            rows="4"
            required
            class="font-sans w-full px-5 py-3 rounded-xl border-2 border-gray-300 bg-gray-50
           focus:outline-none focus:ring-4 focus:ring-blue-300 focus:border-blue-500
           transition-all duration-300 ease-in-out resize-y placeholder-gray-500 text-gray-800
           shadow-sm hover:shadow-md hover:border-blue-400"></textarea>

          <!-- ARCHIVO -->
          <input
            type="file"
            name="archivo"
            class="font-sans w-full text-sm text-gray-600
           file:mr-4 file:py-2 file:px-4
           file:rounded-full file:border-0
           file:text-sm file:font-semibold
           file:bg-blue-100/50 file:text-blue-700
           hover:file:bg-blue-200/70
           transition-all duration-300 ease-in-out">

          <!-- BOTÓN -->
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

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-10 text-center max-w-3xl mx-auto">

        <!-- Facebook -->
        <a href="https://www.facebook.com/profile.php?id=61557954562648" target="_blank" rel="noopener noreferrer" class="group">
          <div
            class="bg-blue-100 p-4 rounded-full w-20 h-20 mx-auto flex items-center justify-center transition transform group-hover:scale-110 group-hover:bg-blue-200">
            <i class="bi bi-facebook text-[#0f52bd] text-3xl"></i>
          </div>
          <p class="mt-4 text-gray-700 font-medium transition group-hover:text-[#0f52bd]">
            Arsodus
          </p>
        </a>

        <!-- TikTok -->
        <a href="https://www.tiktok.com/@arsodus?_t=ZS-8ykcMfVFG7z&_r=1" target="_blank" rel="noopener noreferrer" class="group">
          <div
            class="bg-blue-100 p-4 rounded-full w-20 h-20 mx-auto flex items-center justify-center transition transform group-hover:scale-110 group-hover:bg-blue-200">
            <i class="bi bi-tiktok text-[#0f52bd] text-3xl"></i>
          </div>
          <p class="mt-4 text-gray-700 font-medium transition group-hover:text-[#0f52bd]">
            @arsodus
          </p>
        </a>

        <!-- Instagram -->
        <a href="https://www.instagram.com/arsodus.serigrafia/" target="_blank" rel="noopener noreferrer" class="group">
          <div
            class="bg-blue-100 p-4 rounded-full w-20 h-20 mx-auto flex items-center justify-center transition transform group-hover:scale-110 group-hover:bg-blue-200">
            <i class="bi bi-instagram text-[#0f52bd] text-3xl"></i>
          </div>
          <p class="mt-4 text-gray-700 font-medium transition group-hover:text-[#0f52bd]">
            @arsodus.serigrafia
          </p>
        </a>

        <!-- Correo -->
        <a href="mailto:arsodus.serigrafia@gmail.com" class="group">
          <div
            class="bg-blue-100 p-4 rounded-full w-20 h-20 mx-auto flex items-center justify-center transition transform group-hover:scale-110 group-hover:bg-blue-200">
            <i class="bi bi-envelope-fill text-[#0f52bd] text-3xl"></i>
          </div>
          <p class="mt-4 text-gray-700 font-medium transition group-hover:text-[#0f52bd]">
            arsodus.serigrafia@gmail.com
          </p>
        </a>

      </div>


    </div>

  </section>





  <!-- Footer -->
  <?php include 'footer.php'; ?>

</body>

</html>