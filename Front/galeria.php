<!DOCTYPE html>
<html lang="es" x-data="{ openModal: false }" xmlns="http://www.w3.org/1999/xhtml">
<!-- Header-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="/Arsodus/assets/css/index.css">
  <title>Proyectos - Arsodus</title>
  <link rel="icon" type="image/png" href="/Arsodus/assets/img/LogoSinFondo.png">
  <script src="//unpkg.com/alpinejs" defer></script>

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

  <section class="max-w-6xl mx-auto px-6 py-16">
    <h2 class="text-3xl font-heading font-bold text-center mb-12">Proyectos</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Ejemplo de proyecto -->
      <div class="group relative border rounded-lg overflow-hidden shadow-lg">
        <img src="/Arsodus/assets/img/Proyectos/MartinsBach/bach2.png" alt="Martin’s Bach" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105">
        <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
          <h3 class="text-white text-2xl font-semibold">Martin’s Bach</h3>
          <p class="text-white mt-2">Descripción breve del proyecto o técnica aplicada.</p>
          <a href="/Arsodus/Front/proyecto.php?nombre=banch" class="mt-4 inline-block bg-blue-800 text-white px-4 py-2 rounded-full hover:bg-blue-900 transition">Conocer más</a>
        </div>
      </div>

      <!-- Otro proyecto -->
      <div class="group relative border rounded-lg overflow-hidden shadow-lg">
        <img src="/Arsodus/assets/img/Proyectos/Mindset/Mindset1.png" alt="Abundance is a mindset" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105">
        <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
          <h3 class="text-white text-2xl font-semibold">Abundance is a mindset</h3>
          <p class="text-white mt-2">Descripción breve del concepto o colores usados.</p>
          <a href="/Arsodus//Front/proyecto.php?nombre=mindset" class="mt-4 inline-block bg-blue-800 text-white px-4 py-2 rounded-full hover:bg-blue-900 transition">Conocer más</a>
        </div>
      </div>
    </div>
  </section>



<br><br>
<br><br>

  <!-- Footer -->
  <footer class="bg-gray-900 text-gray-300 py-8">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <p>© 2025 Arsodus. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>

</html>