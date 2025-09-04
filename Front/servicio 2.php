<?php
$Servicio = $_GET['tipo'];
?>
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

$servicios = [
  "serigrafia" => [
    "descripcion" => "La serigrafía es una técnica tradicional que utiliza mallas para transferir tinta directamente sobre la prenda.",
    "caracteristicas" => [
      "Ideal para altos volúmenes",
      "Colores vibrantes y duraderos",
      "Excelente relación costo-beneficio"
    ]
  ],
  "vinil" => [
    "descripcion" => "El vinil textil permite crear diseños con acabados brillantes o mate, aplicados con calor y presión.",
    "caracteristicas" => [
      "Perfecto para personalización rápida",
      "Acabados especiales: glitter, holográfico, metálico",
      "No requiere grandes tirajes"
    ]
  ],
  "dtf" => [
    "descripcion" => "La impresión DTF transfiere diseños completos a prendas mediante calor, sin perder detalle ni color.",
    "caracteristicas" => [
      "Alta resolución y colores intensos",
      "Compatible con cualquier tela",
      "Excelente resistencia al lavado"
    ]
  ],
  "bordado" => [
    "descripcion" => "Técnica de acabado premium que utiliza hilos de alta calidad para crear diseños textiles con relieve y elegancia.",
    "caracteristicas" => [
      "Acabado profesional y de lujo",
      "Durabilidad extrema (resistente a lavados frecuentes)",
      "Ideal para logos corporativos y uniformes"
    ]
  ],
  "sublimacion" => [
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
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
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

<body class="bg-[#fdfaf6] text-gray-800 font-sans" x-data="{ openModal: false }">

  <div id="inicio">
    <?php include 'navbar.php'; ?>
  </div>

  <!-- Hero Section -->
  <section class="bg-gradient-to-br from-white to-gray-50 py-16">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h1 class="font-heading text-4xl md:text-5xl font-bold text-gray-900 mb-4">
        <?php echo ucfirst($Servicio); ?>
      </h1>
      <p class="max-w-2xl mx-auto text-gray-600 text-lg">
        Conoce todo sobre la técnica de <span class="font-semibold"><?php echo ucfirst($Servicio); ?></span>,
        sus beneficios, aplicaciones y cómo puede elevar la calidad de tus prendas.
      </p>
    </div>
  </section>

  <?php
  $Servicio = $_GET['tipo'];
  $servicioLower = strtolower($Servicio);
  $imagenes = [];
  for ($i = 1; $i <= 4; $i++) {
    $imagePath = "/Arsodus/assets/img/{$Servicio}{$i}.png";
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath)) {
      $imagenes[] = $imagePath;
    }
  }

  ?>

  <!-- Carrusel minimalista -->
  <section class="py-12">
    <div class="max-w-5xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

      <!-- Galería -->
      <div
        x-data="{ active: 0, total: <?php echo count($imagenes); ?> }"
        class="relative w-full h-80 rounded-2xl overflow-hidden shadow-lg bg-gray-200">

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

      <!-- Texto explicativo -->
      <?php
      $Servicio = strtolower($_GET['tipo'] ?? 'Serigrafía'); // por defecto serigrafía
      $info = $servicios[$Servicio] ?? null;
      ?>

      <!-- Texto explicativo -->
      <div>
        <h2 class="text-2xl font-bold mb-4">¿Qué es la <?php echo ucfirst($Servicio); ?>?</h2>

        <?php if ($info): ?>
          <p class="text-gray-700 leading-relaxed mb-4">
            <?php echo $info['descripcion']; ?>
          </p>
          <ul class="space-y-3 text-gray-600">
            <?php foreach ($info['caracteristicas'] as $c): ?>
              <li class="flex items-center">
                <span class="mr-2 text-blue-600 font-bold">✓</span>
                <?php echo $c; ?>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <p class="text-red-500">No se encontró información para este servicio.</p>
        <?php endif; ?>
      </div>


    </div>
  </section>

  <!-- Otros servicios -->
  <section class="bg-white py-16">
    <div class="max-w-6xl mx-auto px-6">
      <h3 class="text-2xl font-heading font-bold text-gray-900 text-center mb-10">
        Conoce más sobre nuestros servicios
      </h3>
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Aquí filtras para no mostrar la misma card -->
        <?php
        $servicios = ['Serigrafía', 'Bordado', 'Sublimación', 'DTF', 'Vinil'];
        foreach ($servicios as $s) {
          if ($s === $Servicio) continue; // omitir el actual
        ?>
          <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-lg p-6 flex flex-col items-center text-center">
            <img src="/Arsodus/assets/icon/<?php echo $s; ?>.png" class="w-24 h-24 object-cover mb-4">
            <h4 class="font-bold text-lg mb-2"><?php echo ucfirst($s); ?></h4>
            <p class="text-gray-600 mb-4 text-sm">Breve descripción del servicio.</p>
            <a href="/Arsodus/Front/servicio.php?tipo=<?php echo $s; ?>"
              class="text-white bg-blue-800 hover:bg-blue-900 px-4 py-2 rounded-full text-sm transition">
              Ver más
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <!-- CTA Cotización -->
  <section class="py-20 bg-gradient-to-br from-blue-50 to-blue-100">
    <div class="max-w-3xl mx-auto px-6 text-center">

      <!-- Título llamativo / para no cortar el texto: hitespace-nowrap-->
      <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-blue-900 mb-4 whitespace-nowrap transition-all duration-500 hover:scale-105 hover:text-blue-800">
        ¿Listo para llevar tu idea al siguiente nivel?
      </h2>

      <!-- Texto secundario -->
      <p class="font-sans text-gray-700 mb-8 text-lg transition-colors duration-500 hover:text-gray-900">
        Cotiza con nosotros en minutos y recibe una propuesta adaptada a tus necesidades.
      </p>

      <!-- Botón cotizador -->
      <button id="abrirCotizador"
        class="px-8 py-4 bg-blue-600 text-white font-semibold rounded-xl shadow-lg 
             hover:bg-blue-700 hover:shadow-xl transition transform hover:scale-105">
        🚀 Iniciar Cotización
      </button>
    </div>
  </section>


  <!-- Footer -->
  <footer class="bg-gray-900 text-gray-300 py-8">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <p>© 2025 Arsodus. Todos los derechos reservados.</p>
    </div>
  </footer>


  <!-- ------------------------------ Modales ------------------------------------------ -->
  <!-- Modal Cotizador -->
  <div id="cotizadorModal"
    class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white w-full max-w-3xl mx-4 rounded-lg shadow-lg p-6 relative">

      <!-- Cerrar modal -->
      <button id="cerrarModal"
        class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl">&times;</button>

      <!-- Header -->
      <h2 class="text-2xl font-bold mb-2" id="faseTitulo">Fase 1</h2>
      <p class="text-gray-600 mb-1" id="faseSubtitulo">Selecciona la tela</p>
      <p class="text-sm text-gray-500 cursor-pointer hover:underline" id="faseProgreso">
        Paso <span id="faseActual">1</span> de 4
      </p>
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
        <input type="number" id="inputCantidad" min="1" value="1"
          class="block w-full border rounded p-2">
      </div>

      <!-- Contenido Fase 4 -->
      <div id="fase4" class="hidden mt-4">
        <h3 class="text-xl font-bold mb-4">Resumen de tu pedido</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <!-- Detalles -->
          <div class="space-y-2">
            <p><strong>Tela:</strong> <span id="resumenTela">—</span></p>
            <p><strong>Técnica:</strong> <span id="resumenTecnica">—</span></p>
            <p><strong>Cantidad:</strong> <span id="resumenCantidad">—</span></p>
            <p><strong>Total:</strong> <span id="resumenTotal" class="font-bold text-blue-700">—</span></p>
          </div>
          <!-- Imagen -->
          <div class="text-center">
            <p class="text-sm text-gray-500 mb-2">Diseño subido:</p>
            <div class="relative inline-block">
              <img src="https://dummyimage.com/200x250/ddd/aaa.png&text=Camiseta"
                class="max-h-64 rounded shadow">
              <img id="resumenImg"
                class="absolute top-1/3 left-1/2 -translate-x-1/2 max-h-20 rounded border border-gray-200 shadow">
            </div>
          </div>
        </div>
        <button id="finalizarPedido"
          class="mt-6 px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
          Confirmar y Enviar
        </button>
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
  <!-- Scripts para el Modal del Cotizador -->
  <script>
    // Referencias del modal
    const modalCotizador = document.getElementById('cotizadorModal');
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
      cantidad: 1
    };

    // Abrir y cerrar modal
    document.getElementById('abrirCotizador').addEventListener('click', () => {
      document.getElementById('cotizadorModal').classList.remove('hidden');
    });
    document.getElementById('cerrarModal').addEventListener('click', () => {
      document.getElementById('cotizadorModal').classList.add('hidden');
    });

    // Selección de telas
    document.querySelectorAll('#fase1 [data-tela]').forEach(card => {
      card.addEventListener('click', () => {
        // Limpiar selección previa
        document.querySelectorAll('#fase1 [data-tela]').forEach(c => c.classList.remove('border-blue-500'));
        // Marcar la actual
        card.classList.add('border-blue-500');
        // Guardar selección
        seleccion.tela = JSON.parse(card.dataset.tela);
      });
    });

    // Selección de técnicas
    document.querySelectorAll('#fase2 [data-tecnica]').forEach(card => {
      card.addEventListener('click', () => {
        document.querySelectorAll('#fase2 [data-tecnica]').forEach(c => c.classList.remove('border-blue-500'));
        card.classList.add('border-blue-500');
        seleccion.tecnica = JSON.parse(card.dataset.tecnica);
      });
    });

    // Input imagen
    const inputImagen = document.getElementById('inputImagen');
    if (inputImagen) {
      inputImagen.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file && ["image/jpeg", "image/png", "image/gif"].includes(file.type)) {
          seleccion.imagen = file;
        } else {
          alert("Formato no permitido. Sube JPEG, PNG o GIF.");
          inputImagen.value = "";
        }
      });
    }

    // Input cantidad
    const inputCantidad = document.getElementById('inputCantidad');
    if (inputCantidad) {
      inputCantidad.addEventListener('input', (e) => {
        seleccion.cantidad = parseInt(e.target.value) || 1;
      });
    }

    // Botón continuar
    document.getElementById('btnContinuar').addEventListener('click', () => {
      if (validarFase()) {
        if (fase < 4) {
          fase++;
          renderFase();
        }
      }
    });

    // Botón atrás
    document.getElementById('btnAtras').addEventListener('click', () => {
      if (fase > 1) {
        fase--;
        renderFase();
      }
    });

    // Mostrar fases
    function renderFase() {
      ['fase1', 'fase2', 'fase3', 'fase4'].forEach(id => {
        document.getElementById(id).classList.add('hidden');
      });
      document.getElementById(`fase${fase}`).classList.remove('hidden');

      document.getElementById('faseActual').textContent = fase;

      if (fase === 4) {
        // Mostrar resumen
        document.getElementById('resumenTela').textContent = seleccion.tela?.nombre || "—";
        document.getElementById('resumenTecnica').textContent = seleccion.tecnica?.nombre || "—";
        document.getElementById('resumenCantidad').textContent = seleccion.cantidad || "—";

        const base = seleccion.tela?.precio || 0;
        const extra = seleccion.tecnica?.extra || 0;
        const total = (base + extra) * (seleccion.cantidad || 1);
        document.getElementById('resumenTotal').textContent = `$${total.toFixed(2)}`;

        if (seleccion.imagen) {
          const reader = new FileReader();
          reader.onload = ev => document.getElementById('resumenImg').src = ev.target.result;
          reader.readAsDataURL(seleccion.imagen);
        }
      }
    }

    // Validaciones
    function validarFase() {
      if (fase === 1 && !seleccion.tela) {
        alert("Selecciona una tela.");
        return false;
      }
      if (fase === 2 && !seleccion.tecnica) {
        alert("Selecciona una técnica.");
        return false;
      }
      if (fase === 3 && !seleccion.imagen) {
        alert("Sube una imagen.");
        return false;
      }
      return true;
    }
  </script>


  <script>
    feather.replace();
  </script>

</body>

</html>