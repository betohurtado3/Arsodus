<?php
$Servicio = $_GET['tipo'];
echo "<br>";
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
  
  <title><?php echo ucfirst($Servicio); ?> - Arsodus</title>
  <link rel="icon" type="image/png" href="/Arsodus/assets/img/LogoSinFondo.png">
  

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
               alt="<?php echo ucfirst($Servicio).' '.$index; ?>">
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
    <div>
      <h2 class="text-2xl font-bold mb-4">¿Qué es la <?php echo ucfirst($Servicio); ?>?</h2>
      <p class="text-gray-700 leading-relaxed mb-4">
        Aquí puedes colocar una explicación clara, sin texto excesivo. Resalta 
        para qué prendas funciona y qué ventajas tiene.
      </p>
      <ul class="space-y-3 text-gray-600">
        <li class="flex items-center"><span class="mr-2 text-blue-600 font-bold">✓</span> Ideal para altos volúmenes</li>
        <li class="flex items-center"><span class="mr-2 text-blue-600 font-bold">✓</span> Colores vibrantes y duraderos</li>
        <li class="flex items-center"><span class="mr-2 text-blue-600 font-bold">✓</span> Excelente relación costo-beneficio</li>
      </ul>
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
        $servicios = ['serigrafia', 'bordado', 'sublimacion','dtf', 'vinil'];
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




  <!-- Footer -->
  <footer class="bg-gray-900 text-gray-300 py-8">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <p>© 2025 Arsodus. Todos los derechos reservados.</p>
    </div>
  </footer>

</body>

</html>