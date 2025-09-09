<?php
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : 'default';
//echo "<br><br><br><br><br><br>";
//echo " nombre recibido: " . $nombre . " ";
$proyectos = [
  'bach' => [
    'titulo' => 'Martin’s Bach',
    'descripcion' => 'Diseño elegante en serigrafía para prendas de algodón premium.',
    'tela' => 'Algodón 100%',
    'servicio' => 'Serigrafía',
    'concepto' => 'Inspiración minimalista y musical',
    'imagen' => '/Arsodus/assets/img/proyectos/martinsbach.jpg'
  ],
  'mindset' => [
    'titulo' => 'Abundance is a Mindset',
    'descripcion' => 'Prenda conceptual con acabados en vinil de alta durabilidad.',
    'tela' => 'Poliéster con mezcla',
    'servicio' => 'Vinil textil',
    'concepto' => 'Mentalidad de crecimiento y abundancia',
    'imagen' => '/Arsodus/assets/img/proyectos/mindset.jpg'
  ],
  'default' => [
    'titulo' => 'Proyecto desconocido',
    'descripcion' => 'No se encontró información para este proyecto.',
    'tela' => '-',
    'servicio' => '-',
    'concepto' => '-',
    'imagen' => '/Arsodus/assets/img/default.jpg'
  ]
];

$proyecto = isset($proyectos[$nombre]) ? $proyectos[$nombre] : $proyectos['default'];


// Carpeta del proyecto
$carpeta = "../assets/img/Proyectos/$nombre/";

// Buscar imágenes tipo png o jpg
$imagenes = glob($carpeta . "*.png");
if (empty($imagenes)) {
  $imagenes = glob($carpeta . "*.jpg");
}

// Convertir a rutas relativas (para el src del <img>)
$imagenes_rel = [];
foreach ($imagenes as $img) {
  $imagenes_rel[] = str_replace($_SERVER['DOCUMENT_ROOT'], '', $img);
}

//print_r($imagenes_rel);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="/Arsodus/assets/css/index.css">
  <title><?php echo $nombre; ?> - Arsodus</title>
  <link rel="icon" type="image/png" href="/Arsodus/assets/img/LogoSinFondo.png">
  <script src="//unpkg.com/alpinejs" defer></script>

  <style>
    body {
      padding-top: 80px;
      /* Ajusta según la altura de tu navbar */
    }
  </style>
</head>

<body>

  <div id="inicio">
    <?php include 'navbar.php'; ?>
  </div>
  <br>



  <section class="max-w-5xl mx-auto px-6 py-16">
    <!-- Título principal -->
    <h1 class="text-4xl font-extrabold text-center mb-8 tracking-tight">
      <?php echo $proyecto['titulo']; ?>
    </h1>

    <!-- Breve descripción -->
    <p class="text-lg text-gray-600 text-center max-w-2xl mx-auto mb-12 leading-relaxed">
      <?php echo $proyecto['descripcion']; ?>
    </p>

    <!-- Bloque con detalles visuales -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
      <!-- Tipo de tela -->
      <div class="flex flex-col items-center text-center p-6 rounded-2xl shadow-md bg-white hover:shadow-lg transition">
        <img src="/Arsodus/assets/icon/tipo/telas.png" alt="Tipo de tela" class="w-12 h-12 mb-4">
        <h3 class="text-lg font-semibold">Tipo de tela</h3>
        <p class="text-gray-500 mt-2"><?php echo $proyecto['tela']; ?></p>
      </div>

      <!-- Tipo de servicio -->
      <div class="flex flex-col items-center text-center p-6 rounded-2xl shadow-md bg-white hover:shadow-lg transition">
        <img src="/Arsodus/assets/icon/tipo/servicio.png" alt="Servicio" class="w-12 h-12 mb-4">
        <h3 class="text-lg font-semibold">Servicio</h3>
        <p class="text-gray-500 mt-2"><?php echo $proyecto['servicio']; ?></p>
      </div>

      <!-- Extra (opcional: fecha, cliente, estilo...) -->
      <div class="flex flex-col items-center text-center p-6 rounded-2xl shadow-md bg-white hover:shadow-lg transition">
        <img src="/Arsodus/assets/icon/tipo/concepto.png" alt="Concepto" class="w-12 h-12 mb-4">
        <h3 class="text-lg font-semibold">Concepto</h3>
        <p class="text-gray-500 mt-2"><?php echo $proyecto['concepto']; ?></p>
      </div>
    </div>

    <section x-data="{ selectedImage: null }" class="mb-12">
      <!-- Carrusel -->
      <div class="flex space-x-4 overflow-x-auto snap-x snap-mandatory pb-4">
        <?php foreach ($imagenes_rel as $img): ?>
          <div class="snap-center shrink-0 w-80 h-56 rounded-xl overflow-hidden shadow-md cursor-pointer transition-transform hover:scale-105"
            @click="selectedImage = '<?php echo $img; ?>'">
            <img src="<?php echo $img; ?>"
              alt="<?php echo $proyecto['titulo']; ?>"
              class="w-full h-full object-cover">
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Lightbox -->
      <div x-show="selectedImage"
        class="fixed inset-0 bg-black/90 flex items-center justify-center z-50 p-6"
        x-transition
        @click.away="selectedImage = null"
        @keydown.escape.window="selectedImage = null">

        <button class="absolute top-6 right-6 text-white text-3xl font-bold"
          @click="selectedImage = null">&times;</button>

        <img :src="selectedImage" alt="Imagen grande" class="max-h-full max-w-full rounded-lg shadow-2xl">
      </div>
    </section>


    <!-- Call to action o cierre -->
    <div class="text-center">
      <a href="galeria.php"
        class="inline-block bg-blue-800 text-white px-6 py-3 rounded-full shadow-md hover:bg-blue-900 transition">
        Ver más proyectos
      </a>
    </div>
  </section>

  <!-- Sección Cotizador -->
  <section class="bg-gradient-to-r from-blue-50 to-indigo-100 py-24" id="Cotizador">
    <div class="max-w-4xl mx-auto px-6 text-center">

      <!-- Título -->
      <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
        ¿Listo para darle vida a tu idea?
      </h2>

      <!-- Texto secundario -->
      <p class="text-lg sm:text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
        Cotiza tu proyecto con nosotros y descubre cómo transformar tus ideas en productos de alta calidad.
        ¡Haz clic y comencemos juntos!
      </p>

      <!-- Botón -->
      <button id="abrirCotizador"
        class="px-10 py-4 bg-blue-600 text-white font-semibold rounded-xl shadow-lg hover:scale-105 hover:bg-blue-700 transition-all duration-300 ease-in-out">
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