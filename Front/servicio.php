<?php
$Servicio = $_GET['tipo'];
$ServicioSeleccionado = $_GET['tipo'];

$servicios = [
  "Serigrafía" => [
    "descripcion" => "La serigrafía es una técnica tradicional que utiliza mallas para transferir tinta directamente sobre la prenda.",
    "caracteristicas" => [
      "Ideal para altos volúmenes",
      "Colores vibrantes y duraderos",
      "Excelente relación costo-beneficio"
    ],
    "especificaciones" => [
      "Tamaños desde 2 cm.",
      "Medidas más grandes al tabloide aplican restricciones.",
    ],
    "detalles" => [
      "colores" => "Según pantone especificado o tono más similar.",
      "tamaños" => "Igual o menor a media carta hasta tabloide (Mayores aplican restricciones).",
      "calidades" => "Alta durabilidad con tintas resistentes al lavado."
    ]
  ],

  "Vinil" => [
    "descripcion" => "El vinil textil permite crear diseños con acabados brillantes o mate, aplicados con calor y presión.",
    "caracteristicas" => [
      "Perfecto para personalización rápida",
      "Acabados especiales: glitter, holográfico, metálico",
      "No requiere grandes tirajes"
    ],
    "especificaciones" => [],
    "detalles" => [
      "colores" => "Del tono solicitado o similares.",
      "tamaños" => "Igual o menor a media carta hasta tabloide (Mayores aplican restricciones).",
      "calidades" => "Disponible en acabado mate y brillante."
    ]
  ],

  "DTF" => [
    "descripcion" => "La impresión DTF transfiere diseños completos a prendas mediante calor y presión, sin perder detalle ni color.",
    "caracteristicas" => [
      "Alta resolución y colores intensos",
      "Compatible con cualquier tela o superficie rígida",
      "Excelente resistencia al lavado"
    ],
    "especificaciones" => [],
    "detalles" => [
      "colores" => "Ilimitados.",
      "tamaños" => "Igual o menor a media carta hasta tabloide (Mayores aplican restricciones).",
      "calidades" => "Dependerá del archivo enviado y la superficie aplicada."
    ]
  ],

  "Bordado" => [
    "descripcion" => "Técnica de acabado premium con hilos de alta calidad para crear diseños textiles con relieve y elegancia.",
    "caracteristicas" => [
      "Acabado profesional y de lujo",
      "Durabilidad extrema",
      "Ideal para logos corporativos y uniformes"
    ],
    "especificaciones" => [],
    "detalles" => [
      "colores" => "Hilos del tono requeridos (o similares) sin límite de color.",
      "tamaños" => "Igual o menor a media carta hasta tabloide (Mayores aplican restricciones).",
      "calidades" => "Premium con hilos de poliéster o rayón de alta resistencia."
    ]
  ],

  "Sublimación" => [
    "descripcion" => "Método donde los diseños se imprimen con tinta que se fusiona químicamente con las fibras del textil.",
    "caracteristicas" => [
      "Estampado sin sensación de tinta o relieve",
      "Colores fotográficos y degradados perfectos",
      "Recomendado únicamente para prendas blancas 100% poliéster"
    ],
    "especificaciones" => [],
    "detalles" => [
      "colores" => "Ilimitados, según los que requiera la imagen.",
      "tamaños" => "Igual o menor a media carta hasta tabloide (Mayores aplican restricciones).",
      "calidades" => "100% poliéster blanco."
    ]
  ]
];
?>


<!DOCTYPE html>
<html lang="es" x-data="{ openModal: false }" xmlns="http://www.w3.org/1999/xhtml">
<!-- Header-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/index.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/png" href="/assets/img/LogoSinFondo.png">
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>


  <title><?php echo ucfirst($Servicio); ?> - Arsodus</title>

  <!-- Metadatos dinámicos para compartir -->
  <meta property="og:title" content="<?php echo ucfirst($Servicio); ?> | Arsodus">
  <meta property="og:description" content="Conoce todo sobre <?php echo strtolower($Servicio); ?>: técnica, calidad y opciones personalizadas.">
  <meta property="og:image" content="/assets/img/LogoSinFondo.png">
  <meta property="og:url" content="https://arsodus.com/Front/servicio.php?tipo=<?php echo urlencode($Servicio); ?>">
  <meta property="og:type" content="website">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo ucfirst($Servicio); ?> | Arsodus">
  <meta name="twitter:description" content="Conoce todo sobre <?php echo strtolower($Servicio); ?> en Arsodus.">
  <meta name="twitter:image" content="https://arsodus.com/assets/img/<?php echo $Servicio; ?>1.png">



  <style>
    body {
      padding-top: 80px;
      /* Ajusta según la altura de tu navbar */
    }

    /* Nuevo estilo para los títulos de sección */
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
  </style>
</head>

<body class="bg-[#fdfaf6] text-gray-800 font-sans">

  <div id="inicio">
    <?php include 'navbar.php'; ?>
  </div>
  <br> <br>

  <!-- Hero Section -->
  <section class="py-10 bg-[#fdfaf6] py-10">
    <div class="max-w-6xl mx-auto px-6 text-center">

      <!-- Título -->
      <div class="text-center mb-6">
        <h2 class="section-title">
          <?php echo ucfirst($Servicio); ?>
        </h2>
      </div>

      <p class="max-w-2xl mx-auto text-gray-600 text-lg">
        Conoce todo sobre la técnica de <span class="font-semibold"><?php echo ucfirst($Servicio); ?></span>,
        sus beneficios, aplicaciones y cómo puede elevar la calidad de tus prendas.
      </p>
    </div>
  </section>

  <?php
  // -------------------- DEBUG BLOQUE --------------------
  //echo "<pre style='background:#111;color:#0f0;padding:10px;border-radius:8px;'>";
  //echo "DEBUG RUTAS DE IMAGENES\n";
  //echo "=================================\n";

  $imagenes = [];
  for ($i = 1; $i <= 4; $i++) {
    $imagePath = "/assets/img/{$Servicio}{$i}.png";

    // Mostramos la ruta relativa que se intenta cargar
    //echo "Intentando con: $imagePath\n";

    // Ruta absoluta en el servidor
    $absolutePath = $_SERVER['DOCUMENT_ROOT'] . $imagePath;
    //echo "Ruta absoluta: $absolutePath\n";

    // Verificamos si existe
    if (file_exists($absolutePath)) {
      //echo "✅ Existe\n";
      $imagenes[] = $imagePath;
    } else {
      //echo "❌ No existe\n";
    }

    //echo "---------------------------------\n";
  }

  //echo "DOCUMENT_ROOT: " . $_SERVER['DOCUMENT_ROOT'] . "\n";
  //echo "Directorio actual (__DIR__): " . __DIR__ . "\n";
  //echo "Archivo actual (__FILE__): " . __FILE__ . "\n";
  //echo "=================================\n";
  //echo "</pre>";

  // -------------------- FIN DEBUG --------------------
  ?>

  <!-- Carrusel + Card -->
  <section class="py-8">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-10 items-stretch">
      <!-- CarroGalería -->
      <div
        x-data="{
            active: 0,
            total: <?php echo count($imagenes); ?>,
            interval: null,
            start() {
              this.interval = setInterval(() => {
                this.active = (this.active + 1) % this.total;
              }, 5000);
            },
            stop() {
              clearInterval(this.interval);
              this.interval = null;
            }
          }"
        x-init="start()"
        class="relative w-full aspect-[4/3] rounded-2xl overflow-hidden shadow-lg bg-gray-200 flex"
        @mouseenter="stop()"
        @mouseleave="start()">

        <!-- Slides -->
        <?php foreach ($imagenes as $index => $img) { ?>
          <div
            x-show="active === <?php echo $index; ?>"
            x-transition.opacity.duration.500ms
            class="absolute inset-0">
            <img src="<?php echo $img; ?>"
              class="w-full h-full object-cover"
              alt="<?php echo ucfirst($Servicio) . ' ' . $index; ?>">
          </div>

        <?php } ?>

        <!-- Botones navegación -->
        <button
          @click="active = (active - 1 + total) % total"
          class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/40 text-white rounded-full p-2 hover:bg-black/60 transition">
          ‹
        </button>
        <button
          @click="active = (active + 1) % total"
          class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/40 text-white rounded-full p-2 hover:bg-black/60 transition">
          ›
        </button>

        <!-- Indicadores -->
        <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex space-x-2">
          <?php foreach ($imagenes as $index => $_) { ?>
            <div
              @click="active = <?php echo $index; ?>"
              :class="active === <?php echo $index; ?> ? 'bg-blue-600' : 'bg-white/70'"
              class="w-3 h-3 rounded-full cursor-pointer transition"></div>
          <?php } ?>
        </div>
      </div>

      <!-- Texto explicativo con estilo card -->
      <?php
      //$Servicio = strtolower($_GET['tipo'] ?? 'Serigrafía'); // por defecto serigrafía
      $info = $servicios[$Servicio] ?? null;
      ?>

      <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl p-8 flex flex-col justify-center items-center shadow-lg border border-gray-100 text-center">

        <!-- Icono dinámico -->
        <div class="bg-blue-100/30 p-4 rounded-full mb-4">
          <img src="/assets/icon/<?php echo $Servicio; ?>.png?v=<?php echo time(); ?>"
            alt="<?php echo ucfirst($Servicio); ?>"
            class="w-12 h-12 object-contain">
        </div>

        <h2 class="font-heading font-bold text-2xl text-blue-900 mb-4">
          <?php echo ucfirst($Servicio); ?>
        </h2>

        <?php if ($info): ?>
          <!-- Descripción principal -->
          <p class="text-gray-700 leading-relaxed mb-6">
            <?php echo nl2br($info['descripcion']); ?>
          </p>

          <!-- Características -->
          <ul class="space-y-3 text-gray-600 text-left w-full max-w-md mb-6">
            <?php foreach ($info['caracteristicas'] as $c): ?>
              <li class="flex items-start">
                <span class="mr-2 text-blue-600 font-bold">✓</span>
                <span><?php echo $c; ?></span>
              </li>
            <?php endforeach; ?>
          </ul>

          <!-- Especificaciones (nuevo bloque secundario) -->
          <?php if (!empty($info['especificaciones'])): ?>
            <div class="mt-4 bg-blue-50/50 border border-blue-100 rounded-xl p-4 text-left w-full max-w-md shadow-inner">
              <h3 class="text-blue-800 font-semibold mb-2 text-lg flex items-center">
                <svg class="w-5 h-5 text-blue-700 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6v6h4m5 6a9 9 0 1 1-18 0 9 9 0 0 1 18 0z" />
                </svg>
                Especificaciones
              </h3>
              <ul class="list-disc list-inside text-gray-700 text-sm space-y-1">
                <?php foreach ($info['especificaciones'] as $e): ?>
                  <li><?php echo nl2br($e); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <br>

          <!-- Botón cotizador -->
          <button
            @click="openModal = true"
            class="px-8 py-4 bg-[#0f52bd] text-white font-semibold rounded-full 
               shadow-lg hover:bg-[#0d47a1] hover:scale-105 
               transition-all duration-300 ease-out focus:outline-none 
               focus:ring-4 focus:ring-[#0f52bd]/40">
            Realizar cotización en línea
          </button>

        <?php else: ?>
          <p class="text-red-500">No se encontró información para este servicio.</p>
        <?php endif; ?>
      </div>

    </div>
    <br>

  </section>




  <!-- Sección Cotizador Dinámico -->
  <section class="py-20 bg-[#fdfaf6]" id="Cotizador">
    <div class="max-w-6xl mx-auto px-6 text-center">

      <!-- Título -->
      <div class="text-center mb-10">
        <h2 class="section-title text-3xl font-extrabold text-blue-900">
          Especificaciones del servicio <?php echo ucfirst($Servicio); ?>
        </h2>
        <p class="text-gray-500 mt-2">Cada técnica tiene sus propias condiciones y características de producción.</p>
      </div>

      <?php if (isset($servicios[$Servicio]['detalles'])): ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">

          <!-- Card Colores -->
          <div class="bg-white shadow-md rounded-2xl p-8 flex flex-col items-center hover:shadow-lg transition">
            <span class="text-blue-600 text-4xl mb-4">🎨</span>
            <h3 class="font-bold text-xl text-gray-900 mb-3 text-center">Colores</h3>
            <p class="text-gray-600 text-center">
              <?php echo $servicios[$Servicio]['detalles']['colores']; ?>
            </p>
          </div>

          <!-- Card Tamaños -->
          <div class="bg-white shadow-md rounded-2xl p-8 flex flex-col items-center hover:shadow-lg transition">
            <span class="text-blue-600 text-4xl mb-4">📐</span>
            <h3 class="font-bold text-xl text-gray-900 mb-3 text-center">Tamaños</h3>
            <p class="text-gray-600 text-center">
              <?php echo $servicios[$Servicio]['detalles']['tamaños']; ?>
            </p>
          </div>

          <!-- Card Calidades -->
          <div class="bg-white shadow-md rounded-2xl p-8 flex flex-col items-center hover:shadow-lg transition">
            <span class="text-blue-600 text-4xl mb-4">🧵</span>
            <h3 class="font-bold text-xl text-gray-900 mb-3 text-center">Calidades</h3>
            <p class="text-gray-600 text-center">
              <?php echo $servicios[$Servicio]['detalles']['calidades']; ?>
            </p>
          </div>
        </div>
      <?php else: ?>
        <p class="text-gray-500 italic">No hay especificaciones registradas para este servicio.</p>
      <?php endif; ?>

      <!-- Botón cotizador -->
      <button
        @click="openModal = true"
        class="px-8 py-4 bg-[#0f52bd] text-white font-semibold rounded-full 
             shadow-lg hover:bg-[#0d47a1] hover:scale-105 
             transition-all duration-300 ease-out focus:outline-none 
             focus:ring-4 focus:ring-[#0f52bd]/40">
        Comenzar cotización en línea 🚀
      </button>

      <!-- Nota -->
      <p class="mt-4 text-sm text-gray-500">
        Estos factores influirán directamente en el costo del trabajo.
      </p>
    </div>
  </section>


  <!-- Otros servicios -->
  <section class="bg-gradient-to-r from-blue-50 to-indigo-100 py-10">
    <div class="max-w-6xl mx-auto px-6">
      <div class="text-center mb-6">
        <h2 class="section-title">Otros Servicios</h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <?php
        // ✅ usamos otro nombre para no pisar el array principal
        $listaServicios = ['Serigrafía', 'Bordado', 'Sublimación', 'DTF', 'Vinil'];
        $descripciones = [
          'Serigrafía'  => 'Impresión de alta calidad en distintos materiales con gran durabilidad.',
          'Bordado'     => 'Acabado elegante y resistente, ideal para prendas personalizadas.',
          'Sublimación' => 'Colores vivos en telas y objetos con excelente definición.',
          'DTF'         => 'Tecnología moderna de impresión con gran detalle y versatilidad.',
          'Vinil'       => 'Corte y aplicación de vinil para diseños creativos y resistentes.',
        ];

        foreach ($listaServicios as $s) {
          if ($s === $Servicio) continue;
        ?>
          <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-lg border border-gray-100 p-8 flex flex-col items-center text-center hover:scale-105 transition-transform duration-300">
            <div class="bg-blue-100/30 p-4 rounded-full mb-4">
              <img src="/assets/icon/<?php echo $s; ?>.png?v=<?php echo time(); ?>" alt="<?php echo ucfirst($s); ?>" class="w-12 h-12 object-contain">
            </div>
            <h4 class="font-heading font-bold text-xl text-blue-900 mb-3"><?php echo ucfirst($s); ?></h4>
            <p class="text-gray-700 leading-relaxed text-sm mb-6"><?php echo $descripciones[$s] ?? 'Descripción no disponible.'; ?></p>
            <a href="servicio.php?tipo=<?php echo $s; ?>" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-full font-semibold shadow hover:scale-105 hover:bg-blue-700 transition">
              Ver más →
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <!-- Seccion de Clientes -->
  <section class="bg-gradient-to-r from-blue-50 to-indigo-100 py-16">
    <div class="max-w-7xl mx-auto px-6">

      <!-- Título -->
      <div class="text-center mb-6">
        <h2 class="section-title">
          Marcas que usamos en nuestros productos
        </h2>
      </div>

      <!-- Carrusel -->
      <div class="relative overflow-hidden">
        <div class="flex space-x-12 animate-marquee">

          <!-- Bloque 1 -->
          <img src="/assets/img/Marcas/Yazbek.png" alt="Yazbek"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">

          <img src="/assets/img/Marcas/Euro.png" alt="Euro"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">

          <img src="/assets/img/Marcas/Optima.png" alt="Optima"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">

          <img src="/assets/img/Marcas/Playertytees.png" alt="Playereetys"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">

          <!-- Bloque 2 (duplicado para el loop) -->

          <img src="/assets/img/Marcas/Yazbek.png" alt="Yazbek"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">

          <img src="/assets/img/Marcas/Euro.png" alt="Euro"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">

          <img src="/assets/img/Marcas/Optima.png" alt="Optima"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">

          <img src="/assets/img/Marcas/Playertytees.png" alt="Playereetys"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">


        </div>
      </div>

    </div>
  </section>

  <!-- Animacion del carrusel  -->
  <style>
    /* Animación marquee */
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

  <!-- Footer -->
  <?php include 'footer.php'; ?>

</body>

</html>