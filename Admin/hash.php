<?php
// File: /Arsodus/Admin/generar_password.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = trim($_POST['password'] ?? '');

    if ($password === '') {
        echo "<p style='color:red;'>❌ Ingresa una contraseña válida.</p>";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        echo "<h4>🔒 Hash generado:</h4>";
        echo "<textarea rows='3' cols='100'>{$hash}</textarea>";
        echo "<p>✅ Copia este hash y guárdalo en el campo <code>password</code> de tu tabla <code>usuarios</code>.</p>";
    }
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Generar contraseña encriptada - Arsodus</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
  <div class="card shadow p-4" style="max-width:420px;width:100%;">
    <h4 class="mb-3 text-center text-primary">Generar contraseña segura 🔐</h4>
    <form method="POST" class="mb-3">
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña:</label>
        <input type="text" id="password" name="password" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Generar hash</button>
    </form>
    <p class="text-center small text-muted mb-0">&copy; <?php echo date('Y'); ?> Arsodus</p>
  </div>
</body>
</html>
