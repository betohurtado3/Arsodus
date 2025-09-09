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
  <link rel="stylesheet" href="/Arsodus/assets/css/index.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/png" href="../assets/img/LogoSinFondo.png">
  <script src="//unpkg.com/alpinejs" defer></script>

  <title><?php echo ucfirst($Servicio); ?> - Arsodus</title>


  <style>
    body {
      padding-top: 80px;
      /* Ajusta según la altura de tu navbar */
    }
  </style>
</head>

<body class="bg-[#fdfaf6] text-gray-800 font-sans">

  <div id="inicio">
    <?php include 'navbar.php'; ?>
  </div>
  <br>

  <!-- Hero Section -->
  <section class="py-20 bg-[#fdfaf6]">
    <div class="max-w-6xl mx-auto px-6 text-center">

      <h2 class="impact-heading">
        <?php echo ucfirst($Servicio); ?>
      </h2>

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
  <section class="py-12">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-10 items-stretch">

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


          <button class="px-10 py-4 bg-blue-600 text-white font-semibold rounded-xl shadow-lg hover:scale-105 hover:bg-blue-700 transition-all duration-300 ease-in-out abrir-cotizador">
            🚀 Iniciar Cotización
          </button>
        <?php else: ?>
          <p class="text-red-500">No se encontró información para este servicio.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Otros servicios -->
  <section class="bg-gradient-to-r from-blue-50 to-indigo-100 py-16">
    <div class="max-w-6xl mx-auto px-6">

      <div class="text-center mb-12">
        <h2 class="impact-heading">
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
  </section>


  <!-- Sección Cotizador -->
  <section class="py-20 bg-[#fdfaf6] py-24" id="Cotizador">
    <div class="max-w-6xl mx-auto px-6 text-center">

      <!-- Título -->
      <div class="text-center mb-12">
        <h2 class="impact-heading">
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

      <button class="px-10 py-4 bg-blue-600 text-white font-semibold rounded-xl shadow-lg hover:scale-105 hover:bg-blue-700 transition-all duration-300 ease-in-out abrir-cotizador">
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

      <div class="text-center mb-12">
        <h2 class="impact-heading">
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


  <!-- Footer -->
  <?php include 'footer.php'; ?>

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
      </div>

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
      <div id="fase2" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 hidden">


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

        <div class="p-4 border rounded cursor-pointer hover:shadow"
          data-tecnica='{"nombre":"Sublimación","extra":40}'>
          <h3 class="font-semibold">Sublimación</h3>
          <p class="text-sm text-gray-500">Alta Calidad, +$45</p>
        </div>

        <div class="p-4 border rounded cursor-pointer hover:shadow"
          data-tecnica='{"nombre":"Vinil","extra":40}'>
          <h3 class="font-semibold">Vinil</h3>
          <p class="text-sm text-gray-500">Permanencia, +$30</p>
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
    // Se crea una variable JS con el valor de PHP
    const servicioPreseleccionado = "<?php echo $ServicioSeleccionado; ?>";
    // Se Agrega esta nueva variable global
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
    const botonesAbrir = document.querySelectorAll('.abrir-cotizador');
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

    const progressBar = document.getElementById('progressBar');

    const faseTitulo = document.getElementById('faseTitulo');
    const faseDescripcion = document.getElementById('faseDescripcion');



    // Variables globales
    let fase = 1;
    let seleccion = {
      tela: null,
      tecnica: null,
      imagen: null,
      cantidad: 10 // Iniciamos con 10 por defecto
    };
    console.log("Seleccionado:", servicioPreseleccionado);

    function preseleccionarServicio() {
      if (servicioPreseleccionado) {
        const cards = document.querySelectorAll('#fase2 [data-tecnica]');
        let tecnicaEncontrada = null;

        cards.forEach(card => {
          // Leer el objeto de datos de la técnica
          const tecnica = JSON.parse(card.dataset.tecnica);

          console.log("tecnica:", tecnica);
          // Comprobar si el nombre de la técnica coincide con el valor del GET
          if (tecnica.nombre === servicioPreseleccionado) {
            tecnicaEncontrada = card;
          }
        });

        if (tecnicaEncontrada) {
          // Simular el clic en la tarjeta encontrada
          tecnicaEncontrada.click();

          /* Pasar a la fase 2 si no se abre directamente en ella
          /if (fase === 1) {
            fase = 2;
            renderFase();
          }*/

        }
      }
    }


    // ---- Abrir modal con animación ----
    // Selecciona todos los elementos con la clase 'abrir-cotizador'
    botonesAbrir.forEach(boton => {
      boton.addEventListener('click', () => {
        // ---- Abrir modal con animación ----
        modalCotizador.classList.remove('opacity-0', 'pointer-events-none');
        setTimeout(() => {
          modalContent.classList.remove('scale-95', 'opacity-0');
          modalContent.classList.add('scale-100', 'opacity-100');
        }, 20);
      });
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
    // Función para renderizar el contenido de cada fase
    function renderFase() {
      // Ocultar todas las fases
      ['fase1', 'fase2', 'fase3', 'fase4'].forEach(id => {
        const element = document.getElementById(id);
        if (element) element.classList.add('hidden');
      });

      // Mostrar solo la fase actual
      const faseActualElement = document.getElementById(`fase${fase}`);
      if (faseActualElement) faseActualElement.classList.remove('hidden');

      // --- NUEVA LÓGICA DE ACTUALIZACIÓN DE TÍTULOS Y DESCRIPCIONES ---
      const info = fasesInfo[fase];
      if (faseTitulo) faseTitulo.textContent = info.titulo;
      if (faseDescripcion) faseDescripcion.textContent = info.descripcion;

      // Lógica de la barra de progreso
      const pasos = ['paso1', 'paso2', 'paso3', 'paso4'];
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
        if (fase === 4) {
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
      preseleccionarServicio();
    }, 100);
  </script>


  <script>
    feather.replace();
    renderFase();
  </script>

</body>

</html>