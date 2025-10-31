<?php
require_once __DIR__ . '/../Config/Config.php'; // conexión segura con PDO

// 1️⃣ Obtener parámetro de la URL (?nombre=...)
$nombre = isset($_GET['nombre']) ? trim($_GET['nombre']) : 'default';

// 2️⃣ Conexión con la BD
$pdo = connectPDO();

// 3️⃣ Buscar el proyecto en la base de datos (coincidencia flexible)
$stmt = $pdo->prepare("SELECT * FROM proyectos WHERE LOWER(REPLACE(Titulo, ' ', '')) = :nombre LIMIT 1");
$stmt->execute([':nombre' => strtolower(str_replace(' ', '', $nombre))]);
$proyecto = $stmt->fetch(PDO::FETCH_ASSOC);

// 4️⃣ Fallback si no existe
if (!$proyecto) {
  $proyecto = [
    'Titulo' => 'Proyecto desconocido',
    'Descripcion' => 'No se encontró información para este proyecto.',
    'Tela' => '-',
    'Servicio' => '-',
    'Concepto' => '-'
  ];
  $carpeta = $_SERVER['DOCUMENT_ROOT'] . "/Arsodus/assets/img/Proyectos/default/";
  $tituloParaArchivo = "default";
} else {
  // 5️⃣ Título real del proyecto (usado para nombres de carpeta e imágenes)
  $tituloReal = trim($proyecto['Titulo']);
  $carpeta = $_SERVER['DOCUMENT_ROOT'] . "/Arsodus/assets/img/Proyectos/{$tituloReal}/";
  $tituloParaArchivo = $tituloReal; // las imágenes se llaman igual que el título
}

// 6️⃣ Buscar imágenes que siguen el patrón "<titulo>*.(png|jpg|jpeg|webp)"
$pattern = $carpeta . $tituloParaArchivo . "*.{png,jpg,jpeg,webp}";
$imagenes = glob($pattern, GLOB_BRACE);

// 7️⃣ Convertir rutas absolutas a relativas
$imagenes_rel = [];
foreach ($imagenes as $img) {
  $imagenes_rel[] = str_replace($_SERVER['DOCUMENT_ROOT'], '', $img);
}

// Si no se encontró ninguna imagen, usar una default
if (empty($imagenes_rel)) {
  $imagenes_rel[] = "/Arsodus/assets/img/Proyectos/default/default.jpg";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="/assets/img/LogoSinFondo.png">
  <link rel="stylesheet" href="/assets/css/index.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

  <title><?php echo htmlspecialchars($proyecto['Titulo']); ?> - Arsodus</title>

  <!-- 🔥 Metadatos dinámicos -->
  <meta property="og:title" content="<?php echo htmlspecialchars($proyecto['Titulo']); ?> | Arsodus">
  <meta property="og:description" content="<?php echo htmlspecialchars($proyecto['Descripcion']); ?>">
  <meta property="og:image" content="<?php echo htmlspecialchars($imagenes_rel[0]); ?>">
  <meta property="og:url" content="https://arsodus.com/Front/Proyecto.php?nombre=<?php echo urlencode($nombre); ?>">
  <meta property="og:type" content="article">

  <style>
    body {
      padding-top: 80px;
    }

    .section-title {
      font-family: 'Poppins', sans-serif;
      font-size: 2.5rem;
      font-weight: 600;
      color: #154584;
      text-align: center;
      position: relative;
      display: inline-block;
      padding-bottom: 5px;
      transition: color 0.3s ease, transform 0.3s ease;
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
      transition: width 0.3s ease;
    }

    .section-title:hover {
      color: #0f52bd;
      transform: translateY(-3px);
    }

    .section-title:hover::after {
      width: 100px;
    }
  </style>
</head>

<body class="bg-[#fdfaf6] text-gray-800 font-sans">

  <?php include 'navbar.php'; ?>
  <br><br>

  <section class="max-w-5xl mx-auto px-6 py-16">
    <!-- Título -->
    <div class="text-center mb-6">
      <h2 class="section-title"><?php echo htmlspecialchars($proyecto['Titulo']); ?></h2>
    </div>

    <!-- Descripción -->
    <p class="text-lg text-gray-600 text-center max-w-2xl mx-auto mb-12 leading-relaxed">
      <?php echo htmlspecialchars($proyecto['Descripcion']); ?>
    </p>

    <!-- Detalles -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
      <div class="flex flex-col items-center text-center p-6 rounded-2xl shadow-md bg-white hover:shadow-lg transition">
        <img src="../assets/icon/tipo/telas.png" alt="Tipo de tela" class="w-12 h-12 mb-4">
        <h3 class="text-lg font-semibold">Tipo de tela</h3>
        <p class="text-gray-500 mt-2"><?php echo htmlspecialchars($proyecto['Tela']); ?></p>
      </div>

      <div class="flex flex-col items-center text-center p-6 rounded-2xl shadow-md bg-white hover:shadow-lg transition">
        <img src="../assets/icon/tipo/servicio.png" alt="Servicio" class="w-12 h-12 mb-4">
        <h3 class="text-lg font-semibold">Servicio</h3>
        <p class="text-gray-500 mt-2"><?php echo htmlspecialchars($proyecto['Servicio']); ?></p>
      </div>

      <div class="flex flex-col items-center text-center p-6 rounded-2xl shadow-md bg-white hover:shadow-lg transition">
        <img src="../assets/icon/tipo/concepto.png" alt="Concepto" class="w-12 h-12 mb-4">
        <h3 class="text-lg font-semibold">Concepto</h3>
        <p class="text-gray-500 mt-2"><?php echo htmlspecialchars($proyecto['Concepto']); ?></p>
      </div>
    </div>

    <!-- Carrusel -->
    <section x-data="{ selectedImage: null }" class="mb-12">
      <div class="flex space-x-4 overflow-x-auto snap-x snap-mandatory pb-4">
        <?php foreach ($imagenes_rel as $img): ?>
          <div class="snap-center shrink-0 w-80 h-56 rounded-xl overflow-hidden shadow-md cursor-pointer transition-transform hover:scale-105"
            @click="selectedImage = '<?php echo $img; ?>'">
            <img src="<?php echo $img; ?>" alt="<?php echo htmlspecialchars($proyecto['Titulo']); ?>" class="w-full h-full object-cover">
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Lightbox -->
      <div x-show="selectedImage"
        class="fixed inset-0 bg-black/90 flex items-center justify-center z-50 p-6"
        x-transition
        @click.away="selectedImage = null"
        @keydown.escape.window="selectedImage = null">
        <button class="absolute top-6 right-6 text-white text-3xl font-bold" @click="selectedImage = null">&times;</button>
        <img :src="selectedImage" alt="Imagen grande" class="max-h-full max-w-full rounded-lg shadow-2xl">
      </div>
    </section>

    <div class="text-center">
      <a href="galeria.php" class="inline-block bg-blue-800 text-white px-6 py-3 rounded-full shadow-md hover:bg-blue-900 transition">
        Ver más proyectos
      </a>
    </div>
  </section>

  <?php include 'footer.php'; ?>
</body>

</html>