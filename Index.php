<?php ?>
<!DOCTYPE html>
<html lang="es" x-data="{ openModal: false }">

<head>
  <!-- ================================ -->
  <!-- 🔹 CONFIGURACIÓN GENERAL -->
  <!-- ================================ -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Título e Icono -->
  <title>Arsodus</title>
  <link rel="icon" type="image/png" href="assets/img/LogoSinFondo.png">


  <!-- ================================ -->
  <!-- 🔹 ESTILOS PRINCIPALES -->
  <!-- ================================ -->

  <!-- TailwindCSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Estilos personalizados del proyecto -->
  <link rel="stylesheet" href="assets/css/index.css">

  <!-- SwiperJS CSS (Carrusel testimonios) -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />


  <!-- ================================ -->
  <!-- 🔹 LIBRERÍAS JS NECESARIAS -->
  <!-- ================================ -->

  <!-- Alpine.js – control de modales -->
  <script src="//unpkg.com/alpinejs" defer></script>

  <!-- GSAP – Animaciones personalizadas -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

  <!-- Pickr (selector de color) – si algún día lo usas en el cotizador -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons (para estrellitas) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- ================================ -->
  <!-- 🔹 METADATOS PARA SOCIAL MEDIA -->
  <!-- ================================ -->
  <meta property="og:title" content="Arsodus">
  <meta property="og:description" content="Dale vida a tu marca con Arsodus">
  <meta property="og:image" content="assets/img/LogoSinFondo.png">
  <meta property="og:url" content="https://arsodus.com/">
  <meta property="og:type" content="website">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Arsodus">
  <meta name="twitter:description" content="Dale vida a tu marca con Arsodus">
  <meta name="twitter:image" content="assets/img/LogoSinFondo.png">


  <!-- ================================ -->
  <!-- 🔹 ESTILOS INTERNOS (solo lo necesario) -->
  <!-- ================================ -->
  <style>
    /* --- Testimonios / Swiper --- */
    /* Controles más grandes y hacia los costados */
    #comentariosCarousel .carousel-indicators button {
      width: 12px;
      height: 12px;
      background-color: #2563eb !important;
      /* azul bonito */
      border-radius: 50%;
      opacity: 0.4;
      margin: 0 6px;
    }

    #comentariosCarousel .carousel-indicators .active {
      opacity: 1 !important;
    }

    /* Flechas fuera */
    #comentariosCarousel .carousel-control-prev,
    #comentariosCarousel .carousel-control-next {
      width: 5%;
    }

    #comentariosCarousel .carousel-control-prev-icon,
    #comentariosCarousel .carousel-control-next-icon {
      filter: invert(1);
      width: 2.3rem;
      height: 2.3rem;
    }

    #comentariosCarousel .carousel-control-prev:hover,
    #comentariosCarousel .carousel-control-next:hover {
      transform: scale(1.15);
      transition: .25s ease;
    }

    /* --- Títulos de Sección --- */
    .section-title {
      font-family: 'Poppins', sans-serif;
      font-size: 2.5rem;
      font-weight: 600;
      color: #154584;
      text-align: center;
      position: relative;
      display: inline-block;
      padding-bottom: 5px;
      transition: color 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    .section-title::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      height: 4px;
      background-color: #1e3a8a;
      border-radius: 2px;
      transition: width 0.3s ease-in-out;
    }

    .section-title:hover {
      color: #0f52bd;
      transform: translateY(-3px);
    }

    .section-title:hover::after {
      width: 100px;
    }

    @media (min-width: 768px) {
      .section-title {
        font-size: 3.5rem;
      }

      .section-title::after {
        height: 5px;
      }
    }

    /* --- Marquee / Clientes --- */
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

    /* Alpine.js: ocultar contenido inicial */
    [x-cloak] {
      display: none !important;
    }
  </style>

</head>





<div id="inicio">
  <?php include 'navbar.php'; ?>
</div>

<?php if (isset($_GET['estado'])): ?>
  <?php if (isset($_GET['estado'])): ?>
    <div id="flashPopup" class="fixed top-6 right-6 z-50 hidden">
      <div id="flashBox" class="px-6 py-4 rounded-xl shadow-lg text-white font-semibold"></div>
    </div>

    <div id="popupEstado"
      class="fixed top-6 left-1/2 -translate-x-1/2 z-50
              px-6 py-4 rounded-xl shadow-xl text-white
              transition-all duration-500 ease-out
              <?php echo $_GET['estado'] === 'ok' ? 'bg-green-600' : 'bg-red-600'; ?>">

      <?php if ($_GET['estado'] === 'ok'): ?>
        ✅ Cotización enviada correctamente
      <?php else: ?>
        ❌ Error al enviar la cotización
      <?php endif; ?>
    </div>
  <?php endif; ?>


  <script>
    const popup = document.getElementById("popupEstado");

    if (popup) {
      // Ocultar después de 3 segundos
      setTimeout(() => {
        popup.classList.add("opacity-0", "translate-y-[-20px]");
      }, 3000);

      // Eliminar completamente después de la animación
      setTimeout(() => {
        popup.remove();
      }, 3500);

      // 🔥 LIMPIAR EL PARÁMETRO "estado" DE LA URL
      const url = new URL(window.location);
      url.searchParams.delete("estado");
      window.history.replaceState({}, document.title, url.pathname);
    }
  </script>



<?php unset($_SESSION['wa_url']);
endif; ?>

<?php if (isset($_GET['comentario']) && $_GET['comentario'] === 'ok'): ?>
  <div id="popupComentario"
    class="fixed top-6 left-1/2 -translate-x-1/2 bg-green-600 text-white px-6 py-4 rounded-xl shadow-xl z-50">
    ✅ Comentario enviado correctamente
  </div>

  <script>
    setTimeout(() => {
      const popup = document.getElementById("popupComentario");
      if (popup) popup.remove();

      const url = new URL(window.location);
      url.searchParams.delete("comentario");
      window.history.replaceState({}, document.title, url.pathname);
    }, 3000);
  </script>
<?php endif; ?>



<!-- Hero Section -->
<div x-data="{ openModal: false }">
  <section class="relative h-screen flex items-center justify-center text-center text-white overflow-hidden">

    <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover 
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
        Serigrafía, vinil, sublimación, bordado y DTF para empresas <br>que buscan calidad superior.
      </p>

      <!-- Botón que abre el modal -->
      <button @click="openModal = true" class="px-8 py-4 bg-[#0f52bd] text-white font-semibold rounded-full 
               shadow-lg hover:bg-[#0d47a1] hover:scale-105 
               transition-all duration-300 ease-out focus:outline-none 
               focus:ring-4 focus:ring-[#0f52bd]/40">
        Realizar cotización en línea
      </button>
    </div>
  </section>

  <!-- Modal Cotizador Sencillo -->
  <!-- 🔹 MODAL -->
  <div x-cloak x-show="openModal" x-transition.opacity.duration.300ms
    class="fixed inset-0 flex items-center justify-center z-50"
    style="background-color: rgba(0, 0, 0, 0.25); backdrop-filter: blur(3px);">
    <div @click.away="openModal = false" x-transition.scale.origin.center.duration.250ms
      class="bg-white text-gray-800 rounded-2xl shadow-xl w-11/12 max-w-md p-6 relative">
      <!-- Botón cerrar -->
      <button @click="openModal = false"
        class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 text-xl font-bold transition">
        ×
      </button>

      <!-- Contenido modal -->
      <h2 class="text-2xl font-semibold text-[#0f52bd] mb-4 text-center">Cotización en línea</h2>
      <p class="text-gray-600 text-center mb-6 text-sm">Envíanos tu idea y nos ponemos en contacto contigo al
        instante.</p>

      <form class="space-y-4" method="POST" action="Back/enviar_cotizacion.php" enctype="multipart/form-data">

        <input type="text" name="nombre" placeholder="Nombre"
          class="w-full border border-gray-200 rounded-lg px-4 py-2">

        <input type="text" name="contacto" placeholder="Número o correo"
          class="w-full border border-gray-200 rounded-lg px-4 py-2">

        <textarea name="mensaje" placeholder="Cuéntanos tu idea" rows="3"
          class="w-full border border-gray-200 rounded-lg px-4 py-2"></textarea>

        <input type="file" name="archivo" class="w-full text-sm text-gray-600">

        <button type="submit" class="w-full py-3 bg-[#0f52bd] text-white font-semibold rounded-full shadow-lg">
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
        Impulsa <span class="text-blue-600">tu idea</span> con calidad
      </h2>
    </div>

    <!-- Descripción con expansión vertical -->
    <div class="overflow-hidden max-h-20 transition-all duration-500 hover:max-h-40 mx-auto max-w-2xl">
      <p class="font-montserrat text-gray-700  px-4 transform translate-y-0 transition-all duration-500 hover:translate-y-1 hover:text-gray-700"
        style="text-shadow: 0 1px 2px rgba(0,0,0,0.02)">
        Técnicas artesanales combinadas con tecnología de punta para resultados excepcionales
        <span
          class="block mt-2 text-sm text-blue-800/70 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
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
        <div
          class="flip-card-front bg-gradient-to-br from-white to-gray-50 rounded-2xl p-6 flex flex-col justify-center items-center shadow-lg border border-gray-100">

          <div class="bg-blue-100/20 p-4 rounded-full mb-4">
            <img src="assets/icon/Serigrafía.png?v=<?php echo time(); ?>" alt="Serigrafía"
              class="w-10 h-10 object-contain">
          </div>

          <h3 class="font-heading font-bold text-xl text-blue-900 mb-2">Serigrafía</h3>
          <p class="font-sans text-center text-gray-600">Perfecto para uniformes de uso diario</p>


        </div>

        <!-- BACK -->
        <div
          class="flip-card-back bg-gradient-to-br from-blue-800 to-blue-900 rounded-2xl p-6 flex flex-col justify-center items-center text-white shadow-lg">
          <h3 class="font-heading font-bold text-xl mb-3">Serigrafía</h3>
          <ul class="font-sans text-sm space-y-2">
            <li class="flex items-center"><span class="mr-2">✓</span> Base agua o Ahulada</li>
            <li class="flex items-center"><span class="mr-2">✓</span> 1 a 6 tintas</li>
            <li class="flex items-center"><span class="mr-2">✓</span> Mínimo 15 piezas</li>
          </ul>

          <a href="Front/servicio.php?tipo=Serigrafía"
            class="font-sans mt-4 text-sm bg-white text-blue-900 py-2 px-4 rounded-full shadow hover:bg-gray-100 transition">
            Conoce más →
          </a>
        </div>
      </div>
    </div>

    <!-- Tarjeta Vinil -->
    <div class="flip-card h-72">
      <div class="flip-card-inner">
        <div
          class="flip-card-front bg-gradient-to-br from-white to-gray-50 rounded-2xl p-6 flex flex-col justify-center items-center shadow-lg border border-gray-100">

          <div class="bg-blue-100/20 p-4 rounded-full mb-4">
            <img src="assets/icon/Vinil.png?v=<?php echo time(); ?>" alt="Vinil" class="w-10 h-10 object-contain">
          </div>

          <h3 class="font-heading font-bold text-xl text-blue-900 mb-2">Vinil</h3>
          <p class="font-sans text-center text-gray-600">Excelente para calcamonias y souvenirs</p>
        </div>
        <div
          class="flip-card-back bg-gradient-to-br from-blue-800 to-blue-900 rounded-2xl p-6 flex flex-col justify-center items-center text-white shadow-lg">
          <h3 class="font-heading font-bold text-xl mb-3">Vinil de Corte</h3>
          <ul class="font-sans text-sm space-y-2">
            <li class="flex items-center text-left"><span class="mr-2">✓</span> Corte de detalle</li>
            <li class="flex items-center text-left"><span class="mr-2">✓</span> Aplicación versátil</li>
            <li class="flex items-center text-left"><span class="mr-2">✓</span> Ideal para personalizar uniformes
              deportivos</li>
          </ul>
          <a href="Front/servicio.php?tipo=Vinil"
            class="font-sans mt-4 text-sm bg-white text-blue-900 py-2 px-4 rounded-full shadow hover:bg-gray-100 transition">
            Conoce más →
          </a>
        </div>
      </div>
    </div>

    <!-- Tarjeta Sublimación -->
    <div class="flip-card h-72">
      <div class="flip-card-inner">
        <div
          class="flip-card-front bg-gradient-to-br from-white to-gray-50 rounded-2xl p-6 flex flex-col justify-center items-center shadow-lg border border-gray-100">

          <div class="bg-blue-100/20 p-4 rounded-full mb-4">
            <img src="assets/icon/Sublimación.png?v=<?php echo time(); ?>" alt="Sublimación"
              class="w-10 h-10 object-contain">
          </div>

          <h3 class="font-heading font-bold text-xl text-blue-900 mb-2">Sublimación</h3>
          <p class="font-sans text-center text-gray-600"> Ideal para impresión en alta calidad</p>
        </div>
        <div
          class="flip-card-back bg-gradient-to-br from-blue-800 to-blue-900 rounded-2xl p-6 flex flex-col justify-center items-center text-white shadow-lg">
          <h3 class="font-heading font-bold text-xl mb-3">Sublimación</h3>
          <ul class="font-sans text-sm space-y-2">
            <li class="flex items-center"><span class="mr-2">✓</span> Estampado completo</li>
            <li class="flex items-center"><span class="mr-2">✓</span> Sin sensación de estampado</li>
            <li class="flex items-center"><span class="mr-2">✓</span> Ideal para prendas blancas de poliéster y tazas
            </li>
          </ul>
          <a href="Front/servicio.php?tipo=Sublimación"
            class="font-sans mt-4 text-sm bg-white text-blue-900 py-2 px-4 rounded-full shadow hover:bg-gray-100 transition">
            Conoce más →
          </a>
        </div>
      </div>
    </div>

    <!-- Tarjeta Bordado -->
    <div class="flip-card h-72">
      <div class="flip-card-inner">
        <div
          class="flip-card-front bg-gradient-to-br from-white to-gray-50 rounded-2xl p-6 flex flex-col justify-center items-center shadow-lg border border-gray-100">

          <div class="bg-blue-100/20 p-4 rounded-full mb-4">
            <img src="assets/icon/Bordado.png?v=<?php echo time(); ?>" alt="Bordado" class="w-10 h-10 object-contain">
          </div>

          <h3 class="font-heading font-bold text-xl text-blue-900 mb-2">Bordado</h3>
          <p class="font-sans text-center text-gray-600"> Utilizado pricipalmente para logos bordados</p>
        </div>
        <div
          class="flip-card-back bg-gradient-to-br from-blue-800 to-blue-900 rounded-2xl p-6 flex flex-col justify-center items-center text-white shadow-lg">
          <h3 class="font-heading font-bold text-xl mb-3">Bordado</h3>
          <ul class="font-sans text-sm space-y-2 text-center">
            <li class="flex items-center"><span class="mr-2">✓</span> Ideal para camisas, polos o gorras</li>
            <li class="flex items-center"><span class="mr-2">✓</span> Hilos de alta resistencia</li>
            <li class="flex items-center"><span class="mr-2">✓</span> Profesionalismo.</li>
          </ul>
          <a href="Front/servicio.php?tipo=Bordado"
            class="font-sans mt-4 text-sm bg-white text-blue-900 py-2 px-4 rounded-full shadow hover:bg-gray-100 transition">
            Conoce más →
          </a>
        </div>
      </div>
    </div>

    <!-- Tarjeta DTF -->
    <div class="flip-card h-72">
      <div class="flip-card-inner">
        <div
          class="flip-card-front bg-gradient-to-br from-white to-gray-50 rounded-2xl p-6 flex flex-col justify-center items-center shadow-lg border border-gray-100">

          <div class="bg-blue-100/20 p-4 rounded-full mb-4">
            <img src="assets/icon/DTF.png?v=<?php echo time(); ?>" alt="DTF" class="w-10 h-10 object-contain">
          </div>

          <h3 class="font-heading font-bold text-xl text-blue-900 mb-2">DTF</h3>
          <p class="font-sans text-center text-gray-600">Impresiones de diseños en alta definición </p>
        </div>
        <div
          class="flip-card-back bg-gradient-to-br from-blue-800 to-blue-900 rounded-2xl p-6 flex flex-col justify-center items-center text-white shadow-lg">
          <h3 class="font-heading font-bold text-xl mb-3">DTF</h3>
          <ul class="font-sans text-sm space-y-2">
            <li class="flex items-center"><span class="mr-2">✓</span> Imágenes sin fondo y a detalle</li>
            <li class="flex items-center"><span class="mr-2">✓</span> Estampado resistente</li>
            <li class="flex items-center"><span class="mr-2">✓</span> Ideal para diseños complejos y muchos colores
            </li>
          </ul>
          <a href="Front/servicio.php?tipo=DTF"
            class="font-sans mt-4 text-sm bg-white text-blue-900 py-2 px-4 rounded-full shadow hover:bg-gray-100 transition">
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
<section class="testimonios py-14 bg-gradient-to-r from-blue-50 to-indigo-100">
  <div class="max-w-7xl mx-auto px-6">

    <!-- Título -->
    <div class="text-center mb-10">
      <h2 class="section-title">Sus Comentarios</h2>
    </div>

    <!-- GRID 70 / 30 -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

      <!-- 🟩 IZQUIERDA – CARRUSEL (70%) -->
      <div class="md:col-span-2">
        <?php
        require_once 'config/Config.php';
        $pdo = connectPDO();

        $stmt = $pdo->query("SELECT Nombre, Comentario, Calificacion FROM comentarios ORDER BY Id DESC LIMIT 12");
        $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Paso 1: dividir en chunks de 2
        $rawSlides = array_chunk($comentarios, 2);

        // Paso 2: eliminar grupos con solo 1 card
        $slides = array_filter($rawSlides, fn($g) => count($g) === 2);

        // Paso 3: reindexar
        $slides = array_values($slides);

        ?>

        <section class="py-5">
          <div class="container">
            <div id="comentariosCarousel" class="carousel slide" data-bs-ride="carousel">

              <div class="carousel-inner">

                <?php foreach ($slides as $index => $grupo): ?>
                  <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">

                    <div class="row justify-content-center g-4">

                      <?php foreach ($grupo as $c): ?>
                        <div class="col-12 col-md-4">
                          <div class="card shadow-sm border-0 p-4 h-100 text-center">
                            <h5 class="fw-bold text-dark"><?php echo htmlspecialchars($c["Nombre"]); ?></h5>

                            <!-- Estrellitas -->
                            <div class="text-warning mb-2">
                              <?php for ($i = 0; $i < 5; $i++): ?>
                                <i class="bi <?php echo $i < $c['Calificacion'] ? 'bi-star-fill' : 'bi-star'; ?>"></i>
                              <?php endfor; ?>
                            </div>

                            <p class="text-muted fst-italic">
                              "<?php echo htmlspecialchars($c['Comentario']); ?>"
                            </p>
                          </div>
                        </div>
                      <?php endforeach; ?>

                    </div>

                  </div>
                <?php endforeach; ?>

              </div>
              <!-- Indicadores -->
              <div class="d-flex justify-content-center mt-3">
                <div class="carousel-indicators position-static">

                  <?php foreach ($slides as $i => $_): ?>
                    <button type="button" data-bs-target="#comentariosCarousel" data-bs-slide-to="<?php echo $i; ?>"
                      class="<?php echo $i === 0 ? 'active' : ''; ?>"
                      aria-current="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                      aria-label="Slide <?php echo $i + 1; ?>">
                    </button>
                  <?php endforeach; ?>

                </div>
              </div>


              <!-- Controles -->
              <button class="carousel-control-prev" type="button" data-bs-target="#comentariosCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </button>

              <button class="carousel-control-next" type="button" data-bs-target="#comentariosCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
              </button>


            </div>
          </div>
          <div class="text-center mt-2 text-muted" id="contadorSlides">
            1 / <?php echo count($slides); ?>
          </div>
        </section>
        <script>
          document.addEventListener("DOMContentLoaded", () => {

            const carousel = document.querySelector("#comentariosCarousel");
            const contador = document.getElementById("contadorSlides");
            const total = <?php echo count($slides); ?>;

            carousel.addEventListener("slid.bs.carousel", (e) => {
              contador.textContent = `${e.to + 1} / ${total}`;
            });

          });
          document.addEventListener("DOMContentLoaded", () => {
            const cards = Array.from(document.querySelectorAll("#carousel .card"));
            const nextBtn = document.getElementById("nextBtn");
            const prevBtn = document.getElementById("prevBtn");
            let current = 0;

            function renderCarousel() {
              cards.forEach((card, i) => {
                const diff = i - current;

                card.classList.remove("hidden");
                card.style.transition = "transform 0.5s ease, opacity 0.5s ease";

                if (diff === 0) {
                  card.style.transform = "scale(1.05) translateX(0)";
                  card.style.opacity = "1";
                  card.style.zIndex = 20;
                } else if (diff === -1 || diff === 1) {
                  card.style.transform = `scale(0.9) translateX(${diff * 150}px)`;
                  card.style.opacity = "0.6";
                  card.style.zIndex = 10;
                } else {
                  card.style.transform = `translateX(${diff * 500}px) scale(0.8)`;
                  card.style.opacity = "0";
                  card.style.zIndex = 0;
                  setTimeout(() => (card.classList.add("hidden")), 400);
                }
              });
            }

            nextBtn.addEventListener("click", () => {
              current = (current + 1) % cards.length;
              renderCarousel();
            });

            prevBtn.addEventListener("click", () => {
              current = (current - 1 + cards.length) % cards.length;
              renderCarousel();
            });

            renderCarousel();
          });
        </script>
      </div>

      <!-- 🟥 DERECHA – FORMULARIO (30%) -->
      <div class="bg-white rounded-2xl shadow-lg p-6">
        <h3 class="text-xl font-semibold mb-4 text-indigo-700 text-center">
          Deja tu comentario
        </h3>

        <form method="POST" action="Back/insertar_comentario.php" class="space-y-4">

          <!-- NOMBRE -->
          <div>
            <label class="block font-medium text-gray-700 mb-1">Nombre</label>
            <input type="text" name="nombre" required
              class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-indigo-400 outline-none">
          </div>

          <!-- COMENTARIO -->
          <div>
            <label class="block font-medium text-gray-700 mb-1">Comentario</label>
            <textarea name="comentario" rows="3" required
              class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-indigo-400 outline-none"></textarea>
          </div>

          <!-- CALIFICACIÓN -->
          <div>
            <label class="block font-medium text-gray-700 mb-1">Calificación</label>

            <div id="rating-stars" class="flex flex-row-reverse justify-end gap-1 text-3xl cursor-pointer select-none">

              <input type="radio" name="estrellas" value="5" id="star5" hidden>
              <label for="star5" data-star="5" class="text-gray-300">★</label>

              <input type="radio" name="estrellas" value="4" id="star4" hidden>
              <label for="star4" data-star="4" class="text-gray-300">★</label>

              <input type="radio" name="estrellas" value="3" id="star3" hidden>
              <label for="star3" data-star="3" class="text-gray-300">★</label>

              <input type="radio" name="estrellas" value="2" id="star2" hidden>
              <label for="star2" data-star="2" class="text-gray-300">★</label>

              <input type="radio" name="estrellas" value="1" id="star1" hidden>
              <label for="star1" data-star="1" class="text-gray-300">★</label>

            </div>
          </div>


          <!-- BOTÓN -->
          <button type="submit"
            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-xl font-semibold transition">
            Enviar
          </button>

        </form>


      </div>

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
    <div
      class="bg-white p-8 md:p-16 rounded-3xl shadow-2xl transform transition-transform duration-500 hover:scale-[1.01] hover:shadow-3xl border-t-4 border-blue-600">

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

    <p class="font-montserrat text-sm text-gray-600 mt-8 text-center animate-fade-in delay-500">
      Tu mensaje es importante para nosotros. En breve, el equipo de Arsodus se comunicará contigo para discutir los
      detalles. ¡Gracias por confiar en nosotros!
    </p>
  </div>
</section>




<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
  // Esperar a que el DOM esté listo
  document.addEventListener('DOMContentLoaded', () => {

    // ==========================
    // Swiper – Carrusel testimonios
    // ==========================
    const swiper = new Swiper('.testimonios-swiper', {
      slidesPerView: 3,
      centeredSlides: true,
      spaceBetween: 30,
      loop: true,

      breakpoints: {
        0: {
          slidesPerView: 1,
          centeredSlides: true
        },
        768: {
          slidesPerView: 3
        }
      },

      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },

      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      speed: 500,
    });

    // ==========================
    // Sistema de estrellas (rating)
    // ==========================

  });


  document.addEventListener("DOMContentLoaded", () => {

    const starsContainer = document.getElementById("rating-stars");
    if (!starsContainer) return;

    const labels = starsContainer.querySelectorAll("label");
    let currentRating = 0;

    function pintar(rating) {
      labels.forEach(label => {
        const value = parseInt(label.dataset.star);
        label.style.color = value <= rating ? "#facc15" : "#d1d5db";
      });
    }

    // Estado inicial
    pintar(0);

    labels.forEach(label => {
      const value = parseInt(label.dataset.star);

      // Hover
      label.addEventListener("mouseenter", () => pintar(value));

      // Click fijo
      label.addEventListener("click", () => {
        currentRating = value;

        document.getElementById("star" + value).checked = true;

        pintar(currentRating);
      });
    });

    starsContainer.addEventListener("mouseleave", () => pintar(currentRating));

  });
</script>

<?php include 'Cotizador/Cotizador.php'; ?>
<?php include 'Front/footer.php'; ?>




</body>

</html>