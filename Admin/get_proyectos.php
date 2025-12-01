<?php
// get_servicios.php
require_once '../config/Config.php'; // ajusta si tu config está en otra ruta

header('Content-Type: application/json; charset=utf-8');

try {
    $pdo = connectPDO();

    $stmt = $pdo->query("SELECT Id, Titulo, Descripcion, Tela, Servicio, Concepto, Imagen FROM proyectos");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['success' => true, 'data' => $rows], JSON_UNESCAPED_UNICODE);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
