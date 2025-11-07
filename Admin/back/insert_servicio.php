<?php
// Archivo: /Admin/back/insert_servicio.php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

// Incluimos conexión segura
require_once '../../config/Config.php';

// Activa logs y errores solo para desarrollo
ini_set('display_errors', 1);
error_reporting(E_ALL);

/**
 * 📋 Función auxiliar para responder en JSON
 */
function json_response(bool $success, string $message, $data = null): void {
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data'    => $data
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

/**
 * 📋 Leer datos enviados (puede venir como JSON o FormData)
 */
$raw = file_get_contents('php://input');
$decoded = json_decode($raw, true);

if ($decoded === null) {
    // fallback para FormData
    $decoded = $_POST;
}

file_put_contents(__DIR__ . '/log_insert_debug.txt', print_r([
    'datetime' => date('Y-m-d H:i:s'),
    'raw'      => $raw,
    'decoded'  => $decoded
], true), FILE_APPEND);

/**
 * 🧠 Validamos que haya datos
 */
if (empty($decoded) || !is_array($decoded)) {
    json_response(false, "No se recibieron datos válidos del formulario.", ['raw' => $raw]);
}

/**
 * 🚀 Conectamos a la base de datos
 */
try {
    $pdo = connectPDO();

    // Campos esperados
    $fields = ['Nombre', 'Descripcion', 'Especificaciones', 'Colores', 'Tamanos', 'Calidades'];

    // Preparamos el insert dinámico
    $sql = "INSERT INTO servicios (Nombre, Descripcion, Especificaciones, Colores, Tamanos, Calidades)
            VALUES (:Nombre, :Descripcion, :Especificaciones, :Colores, :Tamanos, :Calidades)";

    $stmt = $pdo->prepare($sql);

    // Ejecutar con valores (si alguno no llega, lo reemplaza por null)
    $stmt->execute([
        ':Nombre'           => $decoded['Nombre'] ?? null,
        ':Descripcion'      => $decoded['Descripcion'] ?? null,
        ':Especificaciones' => $decoded['Especificaciones'] ?? null,
        ':Colores'          => $decoded['Colores'] ?? null,
        ':Tamanos'          => $decoded['Tamanos'] ?? null,
        ':Calidades'        => $decoded['Calidades'] ?? null
    ]);

    json_response(true, "Servicio agregado correctamente.", [
        'id' => $pdo->lastInsertId(),
        'input' => $decoded
    ]);
} catch (Throwable $e) {
    file_put_contents(__DIR__ . '/log_insert_debug.txt', "❌ EXCEPTION: " . $e->getMessage() . PHP_EOL, FILE_APPEND);
    json_response(false, "Error al insertar servicio: " . $e->getMessage());
}
