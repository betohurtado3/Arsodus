<?php
require_once __DIR__ . '/../Config/Config.php';

header('Content-Type: application/json; charset=utf-8');

try {
    $pdo = connectPDO();

    // Selecciona los campos que necesitas
    $stmt = $pdo->query("SELECT Id, Titulo, Descripcion, Tela, Servicio, Concepto, Imagen FROM proyectos WHERE Titulo != 'Proyecto desconocido' ORDER BY Servicio, Titulo ");
    $proyectos = $stmt->fetchAll();

    $agrupados = [];
    foreach ($proyectos as $p) {
        $servicio = $p['Servicio'] ?: 'Otros';

        // Ruta base dentro del proyecto (desde el navegador, no el disco)
        $rutaBase = '/Arsodus/assets/img/Proyectos/';

        // Construir ruta final de la imagen
        if (!empty($p['Imagen'])) {
            $p['Imagen'] = $rutaBase . ltrim($p['Imagen'], '/');
        } else {
            $p['Imagen'] = '/Arsodus/assets/img/Proyectos/default.jpg';
        }

        $agrupados[$servicio][] = $p;
    }

    echo json_encode([
        'success' => true,
        'data' => $agrupados
    ]);
} catch (Exception $e) {
    error_log("Error en get_proyectos.php: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Error al obtener los proyectos'
    ]);
}
?>

