<?php 
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : 'default';

$proyectos = [
    'martins-bach' => [
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
      <img src="/Arsodus/assets/icons/fabric.svg" alt="Tipo de tela" class="w-12 h-12 mb-4">
      <h3 class="text-lg font-semibold">Tipo de tela</h3>
      <p class="text-gray-500 mt-2"><?php echo $proyecto['tela']; ?></p>
    </div>

    <!-- Tipo de servicio -->
    <div class="flex flex-col items-center text-center p-6 rounded-2xl shadow-md bg-white hover:shadow-lg transition">
      <img src="/Arsodus/assets/icons/service.svg" alt="Servicio" class="w-12 h-12 mb-4">
      <h3 class="text-lg font-semibold">Servicio</h3>
      <p class="text-gray-500 mt-2"><?php echo $proyecto['servicio']; ?></p>
    </div>

    <!-- Extra (opcional: fecha, cliente, estilo...) -->
    <div class="flex flex-col items-center text-center p-6 rounded-2xl shadow-md bg-white hover:shadow-lg transition">
      <img src="/Arsodus/assets/icons/concept.svg" alt="Concepto" class="w-12 h-12 mb-4">
      <h3 class="text-lg font-semibold">Concepto</h3>
      <p class="text-gray-500 mt-2"><?php echo $proyecto['concepto']; ?></p>
    </div>
  </div>

  <!-- Imagen destacada del proyecto -->
  <div class="rounded-2xl overflow-hidden shadow-lg mb-12">
    <img src="<?php echo $proyecto['imagen']; ?>" alt="<?php echo $proyecto['titulo']; ?>" class="w-full h-auto object-cover">
  </div>

  <!-- Call to action o cierre -->
  <div class="text-center">
    <a href="/Arsodus/galeria.php" 
       class="inline-block bg-blue-800 text-white px-6 py-3 rounded-full shadow-md hover:bg-blue-900 transition">
      Ver más proyectos
    </a>
  </div>
</section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-gray-300 py-8">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <p>© 2025 Arsodus. Todos los derechos reservados.</p>
    </div>
  </footer>


    
</body>
</html>