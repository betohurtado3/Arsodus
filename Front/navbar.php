<!-- Navbar -->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Import Fonts -  -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- TailwindCSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Heroicons -->
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <title>Navbar Arsodus</title>
</head>

<body class="bg-gray-50">

  <!-- Barra de navegación -->
  <nav id="navbar" class="fixed top-0 left-0 w-full bg-white shadow-lg z-50 transition-all duration-300 rounded-b-3xl py-4">
    <div class="max-w-7xl mx-auto flex items-center px-6">

      <!-- Menú izquierdo (solo desktop) -->
      <div class="flex-1 justify-center hidden md:flex">
        <div class="flex space-x-8 font-raleway  text-gray-900">
          <a href="/Arsodus/Index.php" class="font-raleway hover:text-indigo-600 transition">Inicio</a>
          <a href="/Arsodus/Front/servicio.php?tipo=serigrafia" class="font-raleway  hover:text-indigo-600 transition">Servicios</a>
          <a href="/Arsodus/Front/galeria.php" class="font-raleway  hover:text-indigo-600 transition">Galeria</a>
          <a href="/Arsodus/Front/contacto.php" class="font-raleway  hover:text-indigo-600 transition">Contacto</a>
        </div>
      </div>

      <!-- Logo centrado (siempre visible) -->
      <div class="flex-shrink-0 flex justify-center w-1/3">
        <img src="<?php echo '/Arsodus/assets/img/LogoSinFondo.png'; ?>" alt="Arsodus" class="h-20 md:h-28 object-contain transition-all duration-300">
      </div>

      <!-- Redes sociales (solo desktop) -->
      <div class="flex-1 justify-center hidden md:flex">
        <div class="flex space-x-6"> <!-- Aumenté el espacio entre iconos -->
          <!-- Instagram -->
          <a href="https://www.instagram.com/arsodus.serigrafia/" target="_blank"
            class="group p-3 rounded-full bg-gradient-to-tr from-pink-500 to-yellow-500 shadow-md hover:shadow-xl transform hover:scale-110 transition-all">
            <i data-feather="instagram" class="w-7 h-7 text-white"></i> <!-- Icono más grande -->
          </a>
          <!-- TikTok -->
          <a href="https://www.tiktok.com/@arsodus?_t=ZS-8ykcMfVFG7z&_r=1" target="_blank"
            class="group p-3 rounded-full bg-black shadow-md hover:shadow-xl transform hover:scale-110 transition-all">
            <i class="fab fa-tiktok text-white text-2xl"></i> <!-- Icono más grande -->
          </a>
          <!-- WhatsApp -->
          <a href="https://wa.me/XXXXXXXXXX" target="_blank"
            class="group p-3 rounded-full bg-green-500 shadow-md hover:shadow-xl transform hover:scale-110 transition-all">
            <i class="fab fa-whatsapp text-white text-2xl"></i> <!-- Icono más grande -->
          </a>
        </div>
      </div>

      <!-- Botón hamburguesa solo en móvil -->
      <button id="menu-btn" class="md:hidden ml-auto p-2 focus:outline-none">
        <i data-feather="menu" class="w-8 h-8"></i>
      </button>

    </div>

    <!-- Menú fullscreen móvil -->
    <div id="mobile-menu"
      class="fixed inset-0 bg-white flex flex-col items-center justify-center px-6 py-10 
            transform translate-y-full transition-transform duration-300 md:hidden z-50">

      <!-- Botón cerrar -->
      <button id="close-btn" class="absolute top-6 right-6 p-2">
        <i data-feather="x" class="w-8 h-8"></i>
      </button>

      <!-- Redes sociales (solo desktop) -->
      <div class="flex-1 justify-center hidden md:flex">
        <div class="flex space-x-6">
          <!-- Instagram (Feather) -->
          <a href="https://www.instagram.com/arsodus.serigrafia/" target="_blank"
            class="social-wrap group rounded-full bg-gradient-to-tr from-pink-500 to-yellow-500 shadow-md hover:shadow-xl transform hover:scale-110 transition-all p-3">
            <i data-feather="instagram" class="social-icon w-7 h-7 text-white transition-all"></i>
          </a>

          <!-- TikTok (Font Awesome) -->
          <a href="https://www.tiktok.com/@arsodus?_t=ZS-8ykcMfVFG7z&_r=1" target="_blank"
            class="social-wrap group rounded-full bg-black shadow-md hover:shadow-xl transform hover:scale-110 transition-all p-3">
            <i class="fab fa-tiktok social-icon text-white text-2xl transition-all"></i>
          </a>

          <!-- WhatsApp (Font Awesome) -->
          <a href="https://wa.me/XXXXXXXXXX" target="_blank"
            class="social-wrap group rounded-full bg-green-500 shadow-md hover:shadow-xl transform hover:scale-110 transition-all p-3">
            <i class="fab fa-whatsapp social-icon text-white text-2xl transition-all"></i>
          </a>
        </div>
      </div>


      <!-- Links del menú -->
      <div class="flex flex-col items-center space-y-8 text-2xl font-semibold text-gray-800">
        <a href="/Arsodus/Index.php" class="font-raleway hover:text-indigo-600 transition">Inicio</a>
        <a href="/Arsodus/Front/servicio.php?tipo=serigrafia" class="font-raleway  hover:text-indigo-600 transition">Servicios</a>
        <a href="/Arsodus/Front/galeria.php" class="font-raleway  hover:text-indigo-600 transition">Galeria</a>
        <a href="/Arsodus/Front/contacto.php" class="font-raleway  hover:text-indigo-600 transition">Contacto</a>
      </div>
    </div>


    <script>
      feather.replace(); // Activar iconos

      const navbar = document.getElementById('navbar');
      const logo = navbar.querySelector('img');
      const menuBtn = document.getElementById('menu-btn');
      const closeBtn = document.getElementById('close-btn');
      const mobileMenu = document.getElementById('mobile-menu');
      // Selecciona DESPUÉS de feather.replace() para que ya existan los <svg>
      const socialWraps = navbar.querySelectorAll('.social-wrap');
      const socialIcons = navbar.querySelectorAll('.social-icon');
      // Abrir menu móvil
      menuBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('translate-y-full');
        mobileMenu.classList.add('translate-y-0');
      });

      // Cerrar menu móvil
      closeBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('translate-y-0');
        mobileMenu.classList.add('translate-y-full');
      });

      function handleScroll() {
        if (window.innerWidth >= 768) { // solo desktop
          const shrink = window.scrollY > 50;

          // Navbar padding + borde
          navbar.classList.toggle('py-1', shrink);
          navbar.classList.toggle('py-4', !shrink);
          navbar.classList.toggle('rounded-b-xl', shrink);

          // Logo
          logo.classList.toggle('h-14', shrink);
          logo.classList.toggle('md:h-20', shrink);
          logo.classList.toggle('h-20', !shrink);
          logo.classList.toggle('md:h-28', !shrink);

          // Wrapper (padding)
          socialWraps.forEach(w => {
            w.classList.toggle('p-2', shrink);
            w.classList.toggle('p-3', !shrink);
          });

          // Íconos
          socialIcons.forEach(icon => {
            // Si feather ya reemplazó, será <svg class="social-icon ...">
            if (icon.tagName.toLowerCase() === 'svg') {
              icon.classList.toggle('w-5', shrink);
              icon.classList.toggle('h-5', shrink);
              icon.classList.toggle('w-7', !shrink);
              icon.classList.toggle('h-7', !shrink);
            } else {
              // Font Awesome (TikTok/WhatsApp)
              icon.classList.toggle('text-xl', shrink);
              icon.classList.toggle('text-2xl', !shrink);
            }
          });
        }
      }

      // Listeners
      window.addEventListener('scroll', handleScroll);
      window.addEventListener('resize', handleScroll);
      // Estado inicial correcto
      handleScroll();
    </script>
  </nav>



</body>

</html>