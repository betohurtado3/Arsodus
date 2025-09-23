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
    ]
  ],
  "Vinil" => [
    "descripcion" => "El vinil textil permite crear diseños con acabados brillantes o mate, aplicados con calor y presión.",
    "caracteristicas" => [
      "Perfecto para personalización rápida",
      "Acabados especiales: glitter, holográfico, metálico",
      "No requiere grandes tirajes"
    ]
  ],
  "DTF" => [
    "descripcion" => "La impresión DTF transfiere diseños completos a prendas mediante calor, sin perder detalle ni color.",
    "caracteristicas" => [
      "Alta resolución y colores intensos",
      "Compatible con cualquier tela",
      "Excelente resistencia al lavado"
    ]
  ],
  "Bordado" => [
    "descripcion" => "Técnica de acabado premium que utiliza hilos de alta calidad para crear diseños textiles con relieve y elegancia.",
    "caracteristicas" => [
      "Acabado profesional y de lujo",
      "Durabilidad extrema (resistente a lavados frecuentes)",
      "Ideal para logos corporativos y uniformes"
    ]
  ],
  "Sublimación" => [
    "descripcion" => "Método donde los diseños se imprimen con tinta que se fusiona químicamente con las fibras del textil.",
    "caracteristicas" => [
      "Estampado completo sin sensación de tinta",
      "Colores fotográficos y degradados perfectos",
      "Recomendado para prendas blancas o claras"
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
  <link rel="icon" type="image/png" href="../assets/img/LogoSinFondo.png">
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>


  <title><?php echo ucfirst($Servicio); ?> - Arsodus</title>


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
  $imagenes = [];
  for ($i = 1; $i <= 4; $i++) {
    $imagePath = "/Arsodus/assets/img/{$Servicio}{$i}.png";
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath)) {
      $imagenes[] = $imagePath;
    }
  }
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
          <img src="../assets/icon/<?php echo $Servicio; ?>.png?v=<?php echo time(); ?>"
            alt="<?php echo ucfirst($Servicio); ?>"
            class="w-12 h-12 object-contain">
        </div>

        <h2 class="font-heading font-bold text-2xl text-blue-900 mb-4">
          <?php echo ucfirst($Servicio); ?>
        </h2>

        <?php if ($info): ?>
          <p class="text-gray-700 leading-relaxed mb-6">
            <?php echo $info['descripcion']; ?>
          </p>
          <ul class="space-y-3 text-gray-600 text-left w-full max-w-md">
            <?php foreach ($info['caracteristicas'] as $c): ?>
              <li class="flex items-center">
                <span class="mr-2 text-blue-600 font-bold">✓</span>
                <?php echo $c; ?>
              </li>
            <?php endforeach; ?>
          </ul>
          <br>
          <button class="abrirCotizador px-10 py-4 bg-blue-600 text-white font-semibold rounded-xl shadow-lg hover:scale-105 hover:bg-blue-700 transition-all duration-300 ease-in-out">
            🚀 Iniciar Cotización
          </button>
        <?php else: ?>
          <p class="text-red-500">No se encontró información para este servicio.</p>
        <?php endif; ?>
      </div>
    </div>
    <br>

  </section>

  <!-- Otros servicios -->
  <section class="bg-gradient-to-r from-blue-50 to-indigo-100 py-10">
    <div class="max-w-6xl mx-auto px-6">
      <!-- Título -->
      <div class="text-center mb-6">
        <h2 class="section-title">
          Otros Servicios
        </h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <!-- Aquí filtras para no mostrar la misma card -->
        <?php
        $servicios = ['Serigrafía', 'Bordado', 'Sublimación', 'DTF', 'Vinil'];
        $descripciones = [
          'Serigrafía'  => 'Impresión de alta calidad en distintos materiales con gran durabilidad.',
          'Bordado'     => 'Acabado elegante y resistente, ideal para prendas personalizadas.',
          'Sublimación' => 'Colores vivos en telas y objetos con excelente definición.',
          'DTF'         => 'Tecnología moderna de impresión con gran detalle y versatilidad.',
          'Vinil'       => 'Corte y aplicación de vinil para diseños creativos y resistentes.',
        ];
        foreach ($servicios as $s) {
          if ($s === $Servicio) continue; // omitir el actual
        ?>
          <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-lg border border-gray-100 p-8 flex flex-col items-center text-center hover:scale-105 transition-transform duration-300">

            <!-- Icono -->
            <div class="bg-blue-100/30 p-4 rounded-full mb-4">
              <img src="../assets/icon/<?php echo $s; ?>.png?v=<?php echo time(); ?>"
                alt="<?php echo ucfirst($s); ?>"
                class="w-12 h-12 object-contain">
            </div>

            <!-- Título -->
            <h4 class="font-heading font-bold text-xl text-blue-900 mb-3">
              <?php echo ucfirst($s); ?>
            </h4>

            <!-- Descripción breve -->
            <p class="text-gray-700 leading-relaxed text-sm mb-6">
              <?php echo $descripciones[$s] ?? 'Descripción no disponible.'; ?>
            </p>

            <!-- Botón -->
            <a href="/Arsodus/Front/servicio.php?tipo=<?php echo $s; ?>"
              class="inline-block bg-blue-600 text-white px-6 py-2 rounded-full font-semibold shadow hover:scale-105 hover:bg-blue-700 transition">
              Ver más →
            </a>
          </div>
        <?php } ?>
      </div>

    </div>
    <br>
    <br>
  </section>


  <!-- Sección Cotizador -->
  <section class="py-20 bg-[#fdfaf6] py-20" id="Cotizador">
    <div class="max-w-6xl mx-auto px-6 text-center">

      <!-- Título -->
      <div class="text-center mb-6">
        <h2 class="section-title">
          ¿Listo para darle vida a tu idea?
        </h2>
      </div>


      <!-- Contenedor de cards -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">

        <!-- Card Colores -->
        <div class="bg-white shadow-md rounded-2xl p-8 flex flex-col items-center hover:shadow-lg transition">
          <span class="text-blue-600 text-4xl mb-4">🎨</span>
          <h3 class="font-bold text-xl text-gray-900 mb-3 text-center">Colores</h3>
          <p class="text-gray-600 text-center">
            Pueden ser igualados con pantones si se especifica; de lo contrario, se usará el tono más similar.
          </p>
        </div>

        <!-- Card Tamaños -->
        <div class="bg-white shadow-md rounded-2xl p-8 flex flex-col items-center hover:shadow-lg transition">
          <span class="text-blue-600 text-4xl mb-4">📐</span>
          <h3 class="font-bold text-xl text-gray-900 mb-3 text-center">Tamaños</h3>
          <p class="text-gray-600 text-center">
            Van desde <strong>4 cm</strong> (igual o menor a media carta) hasta <strong>27 cm</strong> (igual o menor a tabloide).
          </p>
        </div>

        <!-- Card Calidades -->
        <div class="bg-white shadow-md rounded-2xl p-8 flex flex-col items-center hover:shadow-lg transition">
          <span class="text-blue-600 text-4xl mb-4">🧵</span>
          <h3 class="font-bold text-xl text-gray-900 mb-3 text-center">Calidades</h3>
          <ul class="list-disc list-inside text-gray-600 space-y-2 text-left">
            <li><strong>Premium:</strong> algodón peinado o combinaciones con poliéster, nylon, elastano, etc.</li>
            <li><strong>Estándar:</strong> 100% algodón.</li>
          </ul>
        </div>
      </div>

      <button class="abrirCotizador px-10 py-2 bg-blue-600 text-white font-semibold rounded-xl shadow-lg hover:scale-105 hover:bg-blue-700 transition-all duration-300 ease-in-out">
        🚀 Iniciar Cotización
      </button>
      <!-- Nota -->
      <p class="mt-4 text-sm text-gray-500">
        Estos factores influirán directamente en el costo del trabajo.
      </p>
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
          <img src="/Arsodus/assets/img/Marcas/Yazbek.png" alt="Yazbek"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">

          <img src="/Arsodus/assets/img/Marcas/Euro.png" alt="Euro"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">

          <img src="/Arsodus/assets/img/Marcas/Optima.png" alt="Optima"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">

          <img src="/Arsodus/assets/img/Marcas/Playertytees.png" alt="Playereetys"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">

          <!-- Bloque 2 (duplicado para el loop) -->

          <img src="/Arsodus/assets/img/Marcas/Yazbek.png" alt="Yazbek"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">

          <img src="/Arsodus/assets/img/Marcas/Euro.png" alt="Euro"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">

          <img src="/Arsodus/assets/img/Marcas/Optima.png" alt="Optima"
            class="h-16 grayscale hover:grayscale-0 hover:scale-110 transition duration-300">

          <img src="/Arsodus/assets/img/Marcas/Playertytees.png" alt="Playereetys"
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

  <?php include '../Cotizador/Cotizador.php'; ?>


  <!-- Footer -->
  <?php include 'footer.php'; ?>

</body>

</html>