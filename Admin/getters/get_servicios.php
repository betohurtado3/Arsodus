<?php
require_once '../../config/Config.php';
header('Content-Type: application/json; charset=utf-8');

try {
  $pdo = connectPDO();
  $stmt = $pdo->query("SELECT Id, Usuario, Telefono FROM usuarios ORDER BY id DESC");
  $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'data' => $usuarios]);
} catch (Exception $e) {
  echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
