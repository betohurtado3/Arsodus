<?php
require_once __DIR__ . '/../../Config/Config.php';

$mode = $_GET['mode'] ?? 'add';
$id = $_GET['id'] ?? null;

// Logs simples de debug
error_log("[MODAL_USUARIOS] Cargando modo $mode con ID $id");

// Si es editar, obtén datos
if ($mode === 'edit' && $id) {
  $pdo = connectPDO();
  $stmt = $pdo->prepare("SELECT Nombre, Usuario, Telefono FROM usuarios WHERE Id = ?");
  $stmt->execute([$id]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<form id="formUsuarios" class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Nombre</label>
    <input type="text" name="Nombre" class="form-control" value="<?= $user['Nombre'] ?? '' ?>" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Usuario</label>
    <input type="text" name="Usuario" class="form-control" value="<?= $user['Usuario'] ?? '' ?>" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Telefono</label>
    <input type="number" name="Telefono" class="form-control" value="<?= $user['Telefono'] ?? '' ?>" required>
  </div>
  <?php if ($mode === 'add'): ?>
  <div class="col-md-6">
    <label class="form-label">Contraseña</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <?php endif; ?>
</form>
