<?php
require_once __DIR__ . '/../config/Config.php';

try {
    $pdo = connectPDO();
    $pdo->query("SET NAMES utf8mb4");

    // Obtener proyectos
    $stmt = $pdo->query("
        SELECT Id, Titulo, Descripcion, Tela, Servicio, Concepto, Imagen
        FROM proyectos 
        WHERE Titulo != 'Proyecto desconocido'
        ORDER BY Servicio, Titulo
    ");

    $proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $agrupados = [];

    // 👀 IMPORTANTE:
    // En producción, tu web corre en https://arsodus.com/
    // así que la ruta base pública es /assets/..., no /Arsodus/assets/...
    $rutaBase = '/assets/img/Proyectos/'; // en servidor
    // En local podría ser: $rutaBase = '/Arsodus/assets/img/Proyectos/';

    foreach ($proyectos as $p) {
        $id       = $p['Id'];
        $servicio = $p['Servicio'] ?: 'Otros';

        // Carpeta física en disco
        $folderDisk = $_SERVER['DOCUMENT_ROOT'] . $rutaBase . $id;

        // Carpeta accesible desde el navegador
        $folderWeb  = $rutaBase . $id . '/';

        // Fallback por si no encontramos nada
        $imagenPrincipal = $folderWeb . 'default.jpg';

        // 🖼️ Nombre de archivo que viene desde la BD
        $archivoImagen = trim($p['Imagen'] ?? '');

        // 1️⃣ Si en la BD viene un nombre de imagen, intentamos usarlo primero
        if ($archivoImagen !== '') {
            $rutaEnDisco = $folderDisk . '/' . $archivoImagen;

            if (file_exists($rutaEnDisco)) {
                // ✅ Usamos la ruta que corresponde a carpeta/id + nombre_de_imagen
                $imagenPrincipal = $folderWeb . $archivoImagen;
            } else {
                // Log de ayuda si la imagen no existe físicamente
                error_log("get_proyectos.php -> Imagen no encontrada para proyecto {$id}: {$rutaEnDisco}");
            }
        }

        // 2️⃣ Si todavía seguimos con default y existe la carpeta, intentamos buscar imágenes
        if (is_dir($folderDisk) && ($archivoImagen === '' || !file_exists($folderDisk . '/' . $archivoImagen))) {
            $files = scandir($folderDisk);

            // Filtrar imágenes válidas
            $imagenes = array_values(array_filter($files, function ($file) {
                return preg_match('/\.(jpg|jpeg|png|webp)$/i', $file);
            }));

            if (!empty($imagenes)) {
                // Preferir una imagen que contenga "main" en el nombre
                $main = array_filter($imagenes, fn($i) => stripos($i, 'main') !== false);

                if (!empty($main)) {
                    $imagenPrincipal = $folderWeb . reset($main);
                } else {
                    $imagenPrincipal = $folderWeb . $imagenes[0];
                }
            }
        }

        // Guardamos la ruta final en el array del proyecto
        $p['Imagen'] = $imagenPrincipal;

        // Agrupar por servicio
        $agrupados[$servicio][] = $p;
    }

    echo json_encode([
        'success' => true,
        'data'    => $agrupados
    ]);
} catch (Exception $e) {
    error_log("Error en get_proyectos.php: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Error al obtener los proyectos'
    ]);
}


?>

