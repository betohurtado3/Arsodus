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
  <title><?php echo ucfirst($Servicio); ?> - Arsodus</title>
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

  <section class="bg-[#fdfaf6] py-16">
  <div class="max-w-4xl mx-auto px-6 text-center">
    <!-- Foto / Logo -->
    <img src="assets/img/foto-perfil.jpg" 
         alt="Foto de Arsodus" 
         class="w-32 h-32 mx-auto rounded-full shadow-lg mb-6 object-cover">
    
    <!-- Texto descriptivo -->
    <h2 class="text-3xl font-bold text-gray-900 mb-4">Arsodus</h2>
    <p class="text-gray-700 leading-relaxed max-w-2xl mx-auto">
      Soy Brandon Gutierrez, apasionado por el diseño y la personalización textil. 
      Con experiencia en serigrafía, vinil y sublimación, mi filosofía es 
      entregar calidad y creatividad en cada proyecto.
    </p>
  </div>
</section>

<!-- Sección de contacto -->
<section class="bg-white py-16">
  <div class="max-w-4xl mx-auto px-6 text-center">
    <h3 class="text-2xl font-bold text-gray-900 mb-10">¿Hablamos?</h3>
    
    <!-- Información directa -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mb-12">
      <div>
        <div class="bg-blue-100 p-4 rounded-full w-16 h-16 mx-auto flex items-center justify-center">
          <!-- Icono teléfono -->
          <svg class="h-8 w-8 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 5a2 2 0 012-2h2a2 2 0 012 2v3a2 2 0 01-2 2H5v1a11 11 0 0011 11h1v-2a2 2 0 012-2h3a2 2 0 012 2v2a2 2 0 01-2 2h-1C9.716 23 1 14.284 1 4V3a2 2 0 012-2h2z" />
          </svg>
        </div>
        <p class="mt-4 text-gray-700 font-medium">+52 123 456 7890</p>
      </div>
      <div>
        <div class="bg-blue-100 p-4 rounded-full w-16 h-16 mx-auto flex items-center justify-center">
          <!-- Icono email -->
          <svg class="h-8 w-8 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 12l-4-4-4 4m8 0l-4 4-4-4" />
          </svg>
        </div>
        <p class="mt-4 text-gray-700 font-medium">contacto@arsodus.com</p>
      </div>
      <div>
        <div class="bg-blue-100 p-4 rounded-full w-16 h-16 mx-auto flex items-center justify-center">
          <!-- Icono instagram -->
          <svg class="h-8 w-8 text-blue-800" fill="currentColor" viewBox="0 0 24 24">
            <path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2c1.65 0 3 1.35 3 3v10c0 1.65-1.35 3-3 3H7c-1.65 0-3-1.35-3-3V7c0-1.65 1.35-3 3-3h10z"/>
          </svg>
        </div>
        <p class="mt-4 text-gray-700 font-medium">@arsodus</p>
      </div>
    </div>

    <!-- Formulario rápido -->
    <form class="space-y-4 max-w-xl mx-auto">
      <input type="text" placeholder="Tu nombre" 
             class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
      <input type="email" placeholder="Tu correo" 
             class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
      <textarea placeholder="Escribe tu mensaje..." rows="4"
                class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
      <button type="submit" 
              class="bg-blue-800 text-white font-medium px-6 py-3 rounded-xl shadow-md hover:bg-blue-700 transition">
        Enviar mensaje
      </button>
    </form>
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