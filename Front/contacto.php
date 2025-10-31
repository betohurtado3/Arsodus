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
        <form class="space-y-4">
          <input type="text" placeholder="Tu nombre"
            class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#0f52bd] focus:border-[#0f52bd] outline-none transition hover:scale-[1.01]">
          <input type="email" placeholder="Tu correo"
            class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#0f52bd] focus:border-[#0f52bd] outline-none transition hover:scale-[1.01]">
          <textarea placeholder="Escribe tu mensaje..." rows="4"
            class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#0f52bd] focus:border-[#0f52bd] outline-none transition hover:scale-[1.01]"></textarea>
          <button type="submit"
            class="w-full bg-gradient-to-r from-[#0f52bd] to-blue-600 text-white font-semibold px-6 py-3 rounded-xl shadow-md hover:scale-105 hover:shadow-lg transition">
            Enviar mensaje
          </button>
        </form>
      </div>

      <!-- Columna contacto -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">

        <!-- Facebook -->
        <a href="https://www.facebook.com/profile.php?id=61557954562648" target="_blank" rel="noopener noreferrer" class="group">
          <div
            class="bg-blue-100 p-4 rounded-full w-16 h-16 mx-auto flex items-center justify-center transition transform group-hover:scale-110 group-hover:bg-blue-200">
            <svg class="h-8 w-8 text-[#0f52bd]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 5.012 3.676 9.162 8.438 9.878v-6.987h-2.54v-2.89h2.54V9.845c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.772-1.63 1.562v1.872h2.773l-.443 2.89h-2.33v6.987C18.324 21.162 22 17.012 22 12z" />
            </svg>
          </div>
          <p class="mt-4 text-gray-700 font-medium transition group-hover:text-[#0f52bd]">Arsodus</p>
        </a>

        <!-- TikTok -->
        <a href="https://www.tiktok.com/@arsodus?_t=ZS-8ykcMfVFG7z&_r=1" target="_blank" rel="noopener noreferrer" class="group">
          <div
            class="bg-blue-100 p-4 rounded-full w-16 h-16 mx-auto flex items-center justify-center transition transform group-hover:scale-110 group-hover:bg-blue-200">
            <svg class="h-8 w-8 text-[#0f52bd]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor">
              <path
                d="M224 80.001a63.92 63.92 0 0 1-38.78-12.99A63.89 63.89 0 0 1 160 13.93a8 8 0 0 0-8-7.93h-32a8 8 0 0 0-8 8v136a24 24 0 1 1-24-24 8 8 0 0 0 8-8V84.67a8 8 0 0 0-8.56-8 88 88 0 1 0 96.72 87.33V106.1a79.9 79.9 0 0 0 40 10.9 8 8 0 0 0 8-8v-28a8 8 0 0 0-8-8Z" />
            </svg>
          </div>
          <p class="mt-4 text-gray-700 font-medium transition group-hover:text-[#0f52bd]">Arsodus</p>
        </a>

        <!-- Instagram -->
        <a href="https://www.instagram.com/arsodus.serigrafia/" target="_blank" rel="noopener noreferrer" class="group">
          <div
            class="bg-blue-100 p-4 rounded-full w-16 h-16 mx-auto flex items-center justify-center transition transform group-hover:scale-110 group-hover:bg-blue-200">
            <svg class="h-8 w-8 text-[#0f52bd]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
              <path fill-rule="evenodd"
                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                clip-rule="evenodd" />
            </svg>
          </div>
          <p class="mt-4 text-gray-700 font-medium transition group-hover:text-[#0f52bd]">@arsodus.serigrafia</p>
        </a>

      </div>
    </div>

  </section>





  <!-- Footer -->
  <?php include 'footer.php'; ?>

</body>

</html>