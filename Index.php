<?php
/*    
Actualizaciones pendientes:
  Navbar 
  -> Agregar Iconos de redes sociales ( En Movil )

  Cotizador 
  -> Agregar Barra de Progreso
  -> Textura en la fase 1 (Seleccion de telas)
  -> Iconos para la fase 2 (Seleccion de tecnica)
  -> En la Fase 4 Agregar un Input text area para agregar Comentarios de la Idea
  -> Agregar fase 5 en donde se muestren 3 botones Correo o Whatsapp o Instagram para enviar la cotizacion
    -> Cuando se seleccione la opcion, voltear la card y mostrar un formulario con los datos de contacto
    -> Terminar cotizacion y enviar los datos a un correo o base de datos
  
  Referencias
  -> Agregar diseño amigable fresco con comentarios
  
  Servicios
  -> Imagenes representativas 
  -> Actualizar Cotizador (Pendiente)

  Galeria:
  -> Mejor Acomodo de Imagenes

  Proyecto(Individual):
  -> Agregar Iconos e información del proyecto

  General:
  -> Homologar Iconos de los servicios
  -> Revisar ortografía y gramática
  -> Acomodar el tipo de habla de Brandon con el tipo de habla de la pagina (Formal o informal)

  A
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
    <?php include 'navbar.php'; ?>
  </div>

  <!-- Hero Section -->
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
        <button id="abrirCotizador"
          class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
          Iniciar Cotización
        </button>
      </div>
    </section>
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

  <!-- Seccion de testimonios -->
  <section class="bg-gray-50 py-20" id="testimonios">
    <div class="max-w-6xl mx-auto px-4">
      <h2 class="text-3xl sm:text-4xl font-bold text-center mb-12 text-gray-900">
        Lo que dicen nuestros clientes
      </h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Card 1 -->
        <div class="bg-white rounded-xl shadow-md p-6 flex flex-col">
          <p class="text-gray-700 mb-4 italic">
            "Excelente calidad y tiempos de entrega. Perfecto para nuestros uniformes corporativos."
          </p>
          <div class="mt-auto">
            <p class="font-semibold text-gray-900">Juan Pérez</p>
            <p class="text-gray-500 text-sm">Gerente de Compras — Empresa XYZ</p>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl shadow-md p-6 flex flex-col">
          <p class="text-gray-700 mb-4 italic">
            "La atención y el acabado superaron nuestras expectativas."
          </p>
          <div class="mt-auto">
            <p class="font-semibold text-gray-900">María López</p>
            <p class="text-gray-500 text-sm">Directora Comercial — Distribuidora ABC</p>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl shadow-md p-6 flex flex-col">
          <p class="text-gray-700 mb-4 italic">
            "Gran comunicación y excelente servicio al cliente."
          </p>
          <div class="mt-auto">
            <p class="font-semibold text-gray-900">Carlos Ramírez</p>
            <p class="text-gray-500 text-sm">CEO — StartUp Design</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contacto Rapido: Formulario de Ideas -->
  <section id="contacto" class="py-20 bg-gradient-to-br from-blue-50 to-blue-100">
    <div class="max-w-3xl mx-auto px-6 text-center">
      <h2 class="font-heading text-3xl font-bold text-blue-900 mb-4">
        ¿Tienes una idea en mente?
      </h2>
      <p class="font-sans text-gray-700 mb-6">
        Platicame y hagámosla realidad juntos.
      </p>

      <form class="flex flex-col sm:flex-row gap-3 justify-center">
        <input
          type="text"
          placeholder="Correo o Teléfono"
          class="font-sans flex-1 px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">

        <input
          type="text"
          placeholder="¿Qué necesitas?"
          class="font-sans flex-1 px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">

        <button
          type="submit"
          class="font-sans bg-blue-800 text-white px-6 py-3 rounded-xl hover:bg-blue-900 transition">
          ¡Enviar Propuesta!
        </button>
      </form>

      <p class="font-sans text-xs text-gray-500 mt-3">
        En breve nos comunicaremos contigo.
      </p>
    </div>
  </section>

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
      <h2 class="text-2xl font-bold mb-2" id="faseTitulo">Fase <span id="faseActual">1</span></h2>
      <p class="text-gray-600 mb-1" id="faseSubtitulo">Selecciona la tela</p>
      <p class="text-gray-500 mb-6" id="faseDescripcion">
        Elige el material para tu prenda.
      </p>

      <!-- Contenido Fase 1 -->
      <div id="fase1" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="p-4 border rounded cursor-pointer hover:shadow"
          data-tela='{"nombre":"Algodón","precio":70}'>
          <h3 class="font-semibold">Algodón</h3>
          <p class="text-sm text-gray-500">Suavidad y comodidad. $60 - $80</p>
        </div>
        <div class="p-4 border rounded cursor-pointer hover:shadow"
          data-tela='{"nombre":"Popelina","precio":50}'>
          <h3 class="font-semibold">Popelina</h3>
          <p class="text-sm text-gray-500">Textura fina, ideal para camisas. $40 - $70</p>
        </div>
      </div>

      <!-- Contenido Fase 2 -->
      <div id="fase2" class="grid grid-cols-1 sm:grid-cols-3 gap-4 hidden">
        <div class="p-4 border rounded cursor-pointer hover:shadow"
          data-tecnica='{"nombre":"Serigrafía","extra":30}'>
          <h3 class="font-semibold">Serigrafía</h3>
          <p class="text-sm text-gray-500">Colores sólidos, +$30</p>
        </div>
        <div class="p-4 border rounded cursor-pointer hover:shadow"
          data-tecnica='{"nombre":"DTF","extra":15}'>
          <h3 class="font-semibold">DTF</h3>
          <p class="text-sm text-gray-500">Calidad de impresión, +$15</p>
        </div>
        <div class="p-4 border rounded cursor-pointer hover:shadow"
          data-tecnica='{"nombre":"Bordado","extra":40}'>
          <h3 class="font-semibold">Bordado</h3>
          <p class="text-sm text-gray-500">Durabilidad, +$40</p>
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

        <!-- Botón Finalizar -->
        <div class="flex flex-col sm:flex-row gap-4 mt-6">

          <button id="completarCotizacion"
            class="flex-1 px-6 py-3 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition">
            Completar Cotización
          </button>
        </div>
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


  <!-- Scripts para el Modal del Cotizador -->
  <script>
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

    // Resumen fase 4
    const resumenTela = document.getElementById('resumenTela');
    const resumenTecnica = document.getElementById('resumenTecnica');
    const resumenCantidad = document.getElementById('resumenCantidad');
    const resumenTotal = document.getElementById('resumenTotal');
    const resumenImg = document.getElementById('resumenImg');

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
          if (fase < 4) { // Solo avanza si no es la última fase
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
    function renderFase() {
      // 1. Ocultar todas las fases
      ['fase1', 'fase2', 'fase3', 'fase4'].forEach(id => {
        const element = document.getElementById(id);
        if (element) element.classList.add('hidden');
      });

      // 2. Mostrar solo la fase actual
      const faseActualElement = document.getElementById(`fase${fase}`);
      if (faseActualElement) faseActualElement.classList.remove('hidden');

      // 3. Actualizar el texto que indica el número de fase (si existe)
      if (faseActual) faseActual.textContent = fase;

      // 4. Mostrar u ocultar botón "Continuar" dependiendo de la fase
      if (btnContinuar) {
        if (fase === 4) {
          btnContinuar.classList.add('hidden'); // Ocultamos en la fase 4
        } else {
          btnContinuar.classList.remove('hidden'); // Mostramos en las fases 1-3
        }
      }

      // 5. Si estamos en la fase 4, renderizar resumen
      if (fase === 4) {
        if (resumenTela) resumenTela.textContent = seleccion.tela?.nombre || "—";
        if (resumenTecnica) resumenTecnica.textContent = seleccion.tecnica?.nombre || "—";
        if (resumenCantidad) resumenCantidad.textContent = seleccion.cantidad || "—";

        // Calcular total (precio base + extra) * cantidad
        const base = seleccion.tela?.precio || 0;
        const extra = seleccion.tecnica?.extra || 0;
        const total = (base + extra) * (seleccion.cantidad || 1);
        if (resumenTotal) resumenTotal.textContent = `$${total.toFixed(2)}`;

        // Mostrar la imagen subida en el resumen (si existe)
        if (seleccion.imagen && resumenImg) {
          const reader = new FileReader();
          reader.onload = ev => resumenImg.src = ev.target.result;
          reader.readAsDataURL(seleccion.imagen);
        }
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
  </script>


  <script>
    feather.replace();
  </script>
</body>

</html>