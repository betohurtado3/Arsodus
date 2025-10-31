  <!DOCTYPE html>
  <html lang="es" x-data="{ openModal: false }" xmlns="http://www.w3.org/1999/xhtml">
  <!-- Header-->

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/assets/css/index.css">
    <title>Proyectos - Arsodus</title>
    <link rel="icon" type="image/png" href="../assets/img/LogoSinFondo.png">
    <script src="//unpkg.com/alpinejs" defer></script>


    <!-- Metadatos dinámicos para compartir -->
    <meta property="og:title" content="Arsodus">
    <meta property="og:description" content="Conoce la galeria de proyectos.">
    <meta property="og:image" content="/assets/img/LogoSinFondo.png">
    <meta property="og:url" content="https://arsodus.com/">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Arsodus">
    <meta name="twitter:description" content="Conoce la galeria de proyectos.">
    <meta name="twitter:image" content="/assets/img/LogoSinFondo.png">



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

      .section-title:hover::after {
        width: 100px;
        /* La barra se expande al pasar el cursor */
      }

      /* Media Query para tamaños de pantalla más grandes */
      @media (min-width: 768px) {
        .section-title {
          font-size: 3.5rem;
          /* ~56px en escritorio */
        }

        .section-title::after {
          height: 5px;
          /* Barra un poco más gruesa en desktop */
        }
      }

      .proyecto-grupo {
        scroll-margin-top: 100px;
      }

      .proyecto-grupo:not(:first-child) {
        padding-top: 2rem;
        border-top: 1px solid #e5e7eb;
      }
    </style>
  </head>

  <body class="bg-[#fdfaf6] text-gray-800 font-sans">

    <div id="inicio">
      <?php include 'navbar.php'; ?>
    </div>
    <br>
    <section class="max-w-7xl mx-auto px-6 py-20">
      <div class="text-center mb-6">
        <h2 class="section-title">Proyectos Destacados</h2>
      </div>
      <div class="text-center mb-16">
        <p class="text-gray-600 max-w-2xl mx-auto">
          Conoce algunos de los proyectos en los que hemos colaborado, aplicando distintas técnicas y estilos para dar vida a cada idea.
        </p>
      </div>

      <div id="contenedor-proyectos" class="space-y-20">
        <!-- Aquí se insertarán dinámicamente los grupos -->
      </div>
    </section>
    <script>
      document.addEventListener("DOMContentLoaded", async () => {
        const contenedor = document.getElementById("contenedor-proyectos");

        try {
          const response = await fetch("../Back/get_proyectos.php");
          const data = await response.json();

          if (!data.success) throw new Error("No se pudieron cargar los proyectos");


          // Recorre cada servicio
          Object.entries(data.data).forEach(([servicio, proyectos]) => {
            const grupo = document.createElement("div");
            grupo.className = "proyecto-grupo";
            console.log("Proyecto:", proyectos);

            grupo.innerHTML = `
        <h3 class="text-3xl font-bold text-center text-blue-800 mb-10">${servicio}</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
          ${proyectos.map(p => `
            <div class="group relative overflow-hidden rounded-2xl shadow-lg">
              <img src="${p.Imagen}" 
     alt="${p.Titulo || 'Proyecto'}"
     class="w-full h-72 object-cover transform transition-transform duration-500 group-hover:scale-110">

              <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6">
                <h3 class="text-white text-2xl font-semibold">${p.Titulo}</h3>
                <p class="text-gray-200 mt-2 text-sm">${p.Descripcion}</p>
                <a href="Proyecto.php?nombre=${encodeURIComponent(p.Titulo.toLowerCase())}"
                   class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow hover:bg-blue-700 transition">
                  Conocer más →
                </a>
              </div>
            </div>
          `).join("")}
        </div>
      `;

            contenedor.appendChild(grupo);
          });
        } catch (error) {
          contenedor.innerHTML = `<p class="text-center text-red-500">Error al cargar proyectos: ${error.message}</p>`;
        }
      });
    </script>


    <br><br>
    <br><br>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
  </body>

  </html>