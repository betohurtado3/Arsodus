<?php
session_start();
if (empty($_SESSION['user_id'])) { header("Location: index.php"); exit; }
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
    :root { --primary:#0d6efd; --gradient:linear-gradient(180deg,#0d6efd,#6610f2); }
    body { background:#f8f9fa; font-family:"Poppins",sans-serif; }
    .sidebar {
      min-height:100vh; background:var(--gradient); color:#fff;
      position:fixed; top:0; left:0; width:230px; transition:.3s;
    }
    .sidebar .nav-link { color:#e2e6ea; font-weight:500; margin-bottom:4px; }
    .sidebar .nav-link.active, .sidebar .nav-link:hover {
      background:rgba(255,255,255,0.1); border-radius:8px; color:#fff;
    }
    .navbar { background:#fff; margin-left:230px; box-shadow:0 2px 4px rgba(0,0,0,.05); }
    .content { margin-left:230px; padding:2rem; transition:.3s; }
    @media (max-width:991px) {
      .sidebar { left:-230px; z-index:1030; }
      .sidebar.show { left:0; }
      .navbar,.content { margin-left:0; }
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

<!-- Modal Global -->
<div class="modal fade" id="globalModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalTitle">Formulario</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body" id="modalBody">
        <p class="text-center text-muted">Cargando formulario...</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary" id="btnSave">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap + JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/dashboard.js"></script>
</body>
</html>
