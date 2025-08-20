<?php

?>
<!DOCTYPE html>
<html lang="es" x-data="{ openModal: false }" xmlns="http://www.w3.org/1999/xhtml">
<!-- Header-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="/Arsodus/assets/css/index.css">
  <title>Arsodus</title>
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
      <img src="../assets/img/LogoSinFondo.png"
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
            <!-- Teléfono -->
            <svg class="h-8 w-8 text-blue-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
            </svg>
          </div>
          <p class="mt-4 text-gray-700 font-medium">+52 123 456 7890</p>
        </div>
        <div>
          <div class="bg-blue-100 p-4 rounded-full w-16 h-16 mx-auto flex items-center justify-center">
            <!-- Icono email -->
            <!-- Email -->
            <svg class="h-8 w-8 text-blue-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
            </svg>
          </div>
          <p class="mt-4 text-gray-700 font-medium">contacto@arsodus.com</p>
        </div>
        <div>
          <div class="bg-blue-100 p-4 rounded-full w-16 h-16 mx-auto flex items-center justify-center">
            <!-- Icono instagram -->
            <!-- Instagram -->
            <svg class="h-8 w-8 text-blue-800" viewBox="0 0 24 24" fill="currentColor">
              <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
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