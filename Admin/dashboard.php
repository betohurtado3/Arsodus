<?php
session_start();
if (empty($_SESSION['user_id'])) {
  header("Location: index.php");
  exit;
}
$user = $_SESSION['usuario'] ?? 'Administrador';
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - Arsodus Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    :root {
      --primary: #0d6efd;
      --gradient: linear-gradient(180deg, #0d6efd, #6610f2);
    }

    body {
      background: #f8f9fa;
      font-family: "Poppins", sans-serif;
    }

    .sidebar {
      min-height: 100vh;
      background: var(--gradient);
      color: #fff;
      position: fixed;
      top: 0;
      left: 0;
      width: 230px;
      transition: .3s;
    }

    .sidebar .nav-link {
      color: #e2e6ea;
      font-weight: 500;
      margin-bottom: 4px;
    }

    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 8px;
      color: #fff;
    }

    .navbar {
      background: #fff;
      margin-left: 230px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, .05);
    }

    .content {
      margin-left: 230px;
      padding: 2rem;
      transition: .3s;
    }

    @media (max-width:991px) {
      .sidebar {
        left: -230px;
        z-index: 1030;
      }

      .sidebar.show {
        left: 0;
      }

      .navbar,
      .content {
        margin-left: 0;
      }
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <button class="btn btn-outline-primary d-lg-none me-2" id="toggleSidebar"><i class="bi bi-list"></i></button>
      <a class="navbar-brand fw-bold text-primary" href="#">Arsodus Admin</a>
      <div class="ms-auto small text-muted">
        Hola, <strong><?php echo htmlspecialchars($user); ?></strong> |
        <a href="logout.php" class="text-danger text-decoration-none">Salir</a>
      </div>
    </div>
  </nav>

  <!-- Sidebar -->
  <nav class="sidebar p-3" id="sidebarMenu">
    <h5 class="fw-bold mb-4 text-center">Panel Arsodus</h5>
    <ul class="nav flex-column">
      <li class="nav-item"><a class="nav-link active" data-section="usuarios" href="#"><i class="bi bi-people-fill me-2"></i>Usuarios</a></li>
      <li class="nav-item"><a class="nav-link" data-section="servicios" href="#"><i class="bi bi-gear-fill me-2"></i>Servicios</a></li>
      <li class="nav-item"><a class="nav-link" data-section="proyectos" href="#"><i class="bi bi-collection-fill me-2"></i>Proyectos</a></li>
    </ul>
  </nav>

  <!-- Contenido -->
  <main class="content">
    <div id="mainContent" class="pt-4">
      <div class="text-center mt-5">
        <h4 class="fw-semibold text-secondary">Selecciona una sección para comenzar</h4>
      </div>
    </div>
  </main>

  <!-- Modal: Agregar Servicio -->
  <div class="modal fade" id="modalServicio" tabindex="-1" aria-labelledby="modalServicioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content shadow">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="modalServicioLabel">Agregar Servicio</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <form id="formServicio" class="p-3">
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Nombre</label>
                <input type="text" name="Nombre" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Descripción</label>
                <input type="text" name="Descripcion" class="form-control">
              </div>
              <div class="col-md-6">
                <label class="form-label">Especificaciones</label>
                <input type="text" name="Especificaciones" class="form-control">
              </div>
              <div class="col-md-6">
                <label class="form-label">Colores</label>
                <input type="text" name="Colores" class="form-control">
              </div>
              <div class="col-md-6">
                <label class="form-label">Tamaños</label>
                <input type="text" name="Tamanos" class="form-control">
              </div>
              <div class="col-md-6">
                <label class="form-label">Calidades</label>
                <input type="text" name="Calidades" class="form-control">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>




  <!-- Bootstrap + JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const mainContent = document.getElementById("mainContent");
      const links = document.querySelectorAll(".nav-link");

      /// Variables para el modal de Servicios
      const modalServicio = new bootstrap.Modal(document.getElementById("modalServicio"));
      const formServicio = document.getElementById("formServicio");


      // Al hacer clic en los elementos del sidebar
      links.forEach(link => {
        link.addEventListener("click", e => {
          e.preventDefault();

          // Marcar como activo visualmente
          links.forEach(l => l.classList.remove("active"));
          link.classList.add("active");

          const section = link.dataset.section;
          console.log("📂 Sección seleccionada:", section);

          // Cargar según sección
          if (section === "servicios") {
            cargarServicios();
          } else {
            mainContent.innerHTML = `<div class='text-center mt-5'><h5>Sección <strong>${section}</strong> próximamente...</h5></div>`;
          }
        });
      });

      async function cargarServicios() {
        console.log("🔄 Cargando servicios...");
        mainContent.innerHTML = `
      <div class='text-center p-5 text-muted'>
        <div class="spinner-border text-primary" role="status"></div>
        <p class="mt-2">Cargando Servicios...</p>
      </div>`;

        try {
          const res = await fetch("get_servicios.php");
          const text = await res.text();

          console.log("📦 Respuesta cruda:", text);

          const data = JSON.parse(text);

          if (!data.success) throw new Error(data.error || "Error desconocido.");

          renderServicios(data.data);
        } catch (err) {
          console.error("❌ Error al cargar servicios:", err);
          mainContent.innerHTML = `
        <div class="alert alert-danger m-4">
          <strong>Error al cargar servicios:</strong><br>${err.message}
        </div>`;
        }
      }

      function renderServicios(rows) {

        if (!rows.length) {
          mainContent.innerHTML = `<p class="text-center text-muted mt-5">No hay servicios registrados.</p>`;

          return;
        }

        const headers = Object.keys(rows[0]);

        const tableHTML = ` <br><br>
      <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Servicios</h5>
          <button class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i>Agregar Servicio
          </button>
        </div>
        <div class="table-responsive">
          <table class="table table-striped align-middle mb-0">
            <thead class="table-light">
              <tr>${headers.map(h => `<th>${h}</th>`).join("")}</tr>
            </thead>
            <tbody>
              ${rows.map(row => `
                <tr>${headers.map(h => `<td>${row[h]}</td>`).join("")}</tr>
              `).join("")}
            </tbody>
          </table>
        </div>
      </div>`;

        mainContent.innerHTML = tableHTML;

        // Escuchar clic en el botón de agregar servicio
        const btnAdd = mainContent.querySelector(".btn-primary");
        btnAdd.addEventListener("click", () => {
          console.log("🧩 Abriendo modal de nuevo servicio...");
          formServicio.reset(); // limpiar formulario
          modalServicio.show();
        });

        console.log("✅ Servicios renderizados correctamente.");
      }

      // Manejo del envío del formulario del modal
      formServicio.addEventListener("submit", async (e) => {
        e.preventDefault();

        const formData = new FormData(formServicio);
        const data = Object.fromEntries(formData.entries());

        console.log("📋 Datos capturados del formulario:", data);

        try {
          const res = await fetch("back/insert_servicio.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/json"
            },
            body: JSON.stringify(data),
          });

          const text = await res.text();
          console.log("📦 Respuesta cruda del servidor:", text);

          const json = JSON.parse(text);
          if (!json.success) throw new Error(json.message);

          alert("✅ " + json.message);

          // 🧹 Limpiamos el formulario
          formServicio.reset();

          // 🧱 Cerrar el modal antes del refresh
          console.log("🧩 Cerrando modal...");
          modalServicio.hide();

          // 🔁 Espera un poco y recarga la tabla de servicios
          setTimeout(() => {
            console.log("🔁 Refrescando tabla de servicios...");
            cargarServicios();
          }, 400);

        } catch (err) {
          console.error("❌ Error al guardar servicio:", err);
          alert("Error al guardar servicio: " + err.message);
        }
      });


    });
  </script>


</body>

</html>