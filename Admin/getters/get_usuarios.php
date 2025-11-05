<?php
require_once '../../config/Config.php';
header('Content-Type: application/json; charset=utf-8');

try {
  $pdo = connectPDO();
$stmt = $pdo->query("SELECT Id AS id, Usuario, Telefono FROM usuarios");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(['success' => true, 'data' => $rows]);

} catch (Exception $e) {
  echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
