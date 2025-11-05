
<?php
require_once '../../config/Config.php';
header('Content-Type: application/json; charset=utf-8');

try {
  $pdo = connectPDO();
  $stmt = $pdo->query("SELECT Titulo, Descripcion, Tela, Servicio, Concepto FROM proyectos ORDER BY Id DESC");
  $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'data' => $usuarios]);
} catch (Exception $e) {
  echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
