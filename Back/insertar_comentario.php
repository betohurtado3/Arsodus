<?php
require_once __DIR__ . '/../config/Config.php';

$pdo = connectPDO();

// ============================
// 1️⃣ VALIDAR QUE VENGAN DATOS
// ============================
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acceso no permitido.");
}

// ============================
// 2️⃣ LIMPIAR DATOS
// ============================
$nombre     = trim($_POST['nombre'] ?? '');
$comentario = trim($_POST['comentario'] ?? '');
$estrellas  = intval($_POST['estrellas'] ?? 0);

// ============================
// 3️⃣ VALIDACIONES
// ============================
if ($nombre === '' || $comentario === '' || $estrellas < 1 || $estrellas > 5) {
    echo "<pre>";
    echo "❌ Datos incompletos o inválidos\n";
    print_r($_POST);
    echo "</pre>";
    exit;
}

// ============================
// 4️⃣ INSERTAR EN BD
// ============================
try {

    $stmt = $pdo->prepare("
        INSERT INTO comentarios (Nombre, Comentario, Calificacion, Fecha)
        VALUES (:nombre, :comentario, :calificacion, NOW())
    ");

    $stmt->execute([
        ':nombre'       => $nombre,
        ':comentario'   => $comentario,
        ':calificacion' => $estrellas
    ]);

    // ============================
    // 5️⃣ REDIRECT CON ESTADO OK
    // ============================
    header("Location: ../index.php?comentario=ok");
    exit;

} catch (Exception $e) {

    echo "<pre>";
    echo "❌ Error al insertar comentario:\n";
    echo $e->getMessage();
    echo "</pre>";
    exit;
}
