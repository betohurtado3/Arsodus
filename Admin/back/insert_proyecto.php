<?php
// Habilitar errores para debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');


require_once '../../config/Config.php';

try {
    // 1️⃣ Conexión PDO
    $pdo = connectPDO();

    // 2️⃣ Validar campos obligatorios
    $campos_obligatorios = ['Titulo', 'Servicio'];
    foreach ($campos_obligatorios as $campo) {
        if (empty($_POST[$campo])) {
            echo json_encode([
                'success' => false,
                'message' => "El campo '$campo' es obligatorio."
            ]);
            exit;
        }
    }

    // 3️⃣ Sanitizamos inputs
    $Titulo      = trim($_POST['Titulo']);
    $Descripcion = trim($_POST['Descripcion'] ?? '');
    $Tela        = trim($_POST['Tela'] ?? '');
    $Servicio    = trim($_POST['Servicio']);
    $Concepto    = trim($_POST['Concepto'] ?? '');

    // 4️⃣ Inserción inicial SIN imagen
    $stmt = $pdo->prepare("
        INSERT INTO proyectos (Titulo, Descripcion, Tela, Servicio, Concepto)
        VALUES (:titulo, :descripcion, :tela, :servicio, :concepto)
    ");

    $stmt->execute([
        ':titulo'      => $Titulo,
        ':descripcion' => $Descripcion,
        ':tela'        => $Tela,
        ':servicio'    => $Servicio,
        ':concepto'    => $Concepto
    ]);

    // 5️⃣ Conseguir ID generado
    $id = $pdo->lastInsertId();

    if (!$id) {
        throw new Exception("No se pudo recuperar el ID del proyecto.");
    }

    // 6️⃣ Crear carpeta para imágenes
    // 5️⃣ Conseguir ID generado
    $id = $pdo->lastInsertId();

    if (!$id) {
        throw new Exception("No se pudo recuperar el ID del proyecto.");
    }

    // 6️⃣ RUTA FÍSICA REAL DEL SERVIDOR
    $rutaFisica = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/Proyectos/{$id}/";

    // 6.1 Crear carpeta si no existe
    if (!is_dir($rutaFisica)) {
        if (!mkdir($rutaFisica, 0777, true)) {
            throw new Exception("No se pudo crear la carpeta del proyecto en: " . $rutaFisica);
        }
    }

    // 7️⃣ Manejar imagen subida
    $nombreImagenFinal = null;

    if (!empty($_FILES['Imagen']['name'])) {

        $nombreOriginal = basename($_FILES['Imagen']['name']);
        $nombreSeguro = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $nombreOriginal);
        $nombreImagenFinal = "img_" . time() . "_" . $nombreSeguro;

        // RUTA FÍSICA donde se guardará la imagen
        $rutaDestino = $rutaFisica . $nombreImagenFinal;

        if (!move_uploaded_file($_FILES['Imagen']['tmp_name'], $rutaDestino)) {
            throw new Exception("No se pudo guardar la imagen en: " . $rutaDestino);
        }

        // Guardar en BD
        $stmtImg = $pdo->prepare("
        UPDATE proyectos 
        SET Imagen = :img 
        WHERE Id = :id
    ");
        $stmtImg->execute([
            ':img' => $nombreImagenFinal,
            ':id'  => $id
        ]);
    }

    // 8️⃣ Respuesta final
    echo json_encode([
        'success' => true,
        'message' => "Proyecto agregado correctamente.",
        'id'      => $id,
        'imagen'  => $nombreImagenFinal,
        'carpeta_creada' => $rutaFisica // DEBUG
    ]);
    exit;
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => "Error: " . $e->getMessage()
    ]);
    exit;
}
