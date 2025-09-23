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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>


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

<body>

  <div id="inicio">
    <?php include 'navbar.php'; ?>
  </div>
  <br>



  <section class="max-w-5xl mx-auto px-6 py-16">
    <!-- Título principal -->
    <div class="text-center mb-6">
      <h2 class="section-title">
        <?php echo $proyecto['titulo']; ?>
      </h2>
    </div>

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

      <!-- Título principal -->
      <div class="text-center mb-6">
        <h2 class="section-title">
          ¿Listo para darle vida a tu idea?
        </h2>
      </div>

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
  <?php include 'footer.php'; ?>

  <?php include '../Cotizador/Cotizador.php'; ?>


</body>

</html>