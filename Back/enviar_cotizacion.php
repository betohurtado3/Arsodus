<?php
$paginaOrigen = $_SERVER['HTTP_REFERER'] ?? '../index.php';
/// Mostrar errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../config/Config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'libs/PHPMailer/PHPMailer.php';
require 'libs/PHPMailer/SMTP.php';
require 'libs/PHPMailer/Exception.php';


$fecha = date("Y-m-d H:i:s");

$pdo = connectPDO();

// ============================
// 1️⃣ LIMPIAR DATOS
// ============================
$nombre   = trim($_POST['nombre'] ?? '');
$contacto = trim($_POST['contacto'] ?? '');
$mensaje  = trim($_POST['mensaje'] ?? '');
$ip       = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';

if (!$nombre || !$contacto || !$mensaje) {
    die("Faltan datos obligatorios.");
}

// ============================
// 2️⃣ DETECTAR TIPO DE CONTACTO
// ============================
$tipoContacto = 'correo';

$contactoLimpio = preg_replace('/[^0-9]/', '', $contacto);

if (strlen($contactoLimpio) >= 10) {
    $tipoContacto = 'telefono';
}

// ============================
// 3️⃣ MANEJO DE ARCHIVO
// ============================
// ============================
// SUBIDA DE ARCHIVO
// ============================

$archivoGuardado = null;

if (!empty($_FILES['archivo']['name'])) {

    // 📁 Carpeta donde se guardan las cotizaciones
    $carpeta = $_SERVER['DOCUMENT_ROOT'] . "/Arsodus/assets/cotizaciones/";

    // ✅ Crear carpeta si no existe
    if (!is_dir($carpeta)) {
        mkdir($carpeta, 0777, true);
    }

    // ✅ Limpiar nombre del archivo
    $nombreOriginal = basename($_FILES['archivo']['name']);
    $nombreSeguro   = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $nombreOriginal);

    // ✅ Nombre final único
    $nombreFinal = time() . "_" . $nombreSeguro;

    // ✅ Ruta completa AL ARCHIVO (no solo carpeta)
    $rutaFinal = $carpeta . $nombreFinal;

    // ✅ Mover archivo
    if (!move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaFinal)) {
        die("❌ Error: No se pudo guardar el archivo.");
    }

    $archivoGuardado = $nombreFinal;
}


// ============================
// 4️⃣ GUARDAR EN BASE DE DATOS
// ============================
$stmt = $pdo->prepare("
    INSERT INTO cotizaciones 
    (Nombre, Contacto, TipoContacto, Mensaje, Archivo, Ip, Fecha)
    VALUES (:nombre, :contacto, :tipo, :mensaje, :archivo, :ip, NOW())
");

$stmt->execute([
    ':nombre'   => $nombre,
    ':contacto' => $contacto,
    ':tipo'     => $tipoContacto,
    ':mensaje'  => $mensaje,
    ':archivo'  => $nombreFinal,
    ':ip'       => $ip
]);

$id = $pdo->lastInsertId();

// ============================
// 5️⃣ SI ES TELÉFONO → WHATSAPP ADMIN
// ============================
if ($tipoContacto === 'telefono') {

    // ✅ TU NÚMERO FIJO DE ARSODUS (cámbialo aquí)
    $telefonoAdmin = "5213323638666"; // Ejemplo: 52 + 10 dígitos

    // ✅ MENSAJE QUE RECIBES TÚ
    $mensajeWA = "
🖨️ Nueva cotización Arsodus

👤 Nombre: $nombre
📞 Contacto cliente: $contacto
📝 Mensaje: $mensaje
🧾 Folio: #$id
";

    $mensajeWA = urlencode($mensajeWA);

    // ✅ Envío directo a TU WhatsApp
    $url = "https://wa.me/$telefonoAdmin?text=$mensajeWA";

    header("Location: $url");
    exit;
} else if ($tipoContacto === 'correo') {



    $mail = new PHPMailer(true);

    try {

        // ============================
        // CONFIGURACIÓN SMTP GMAIL
        // ============================
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'b.hurtado1998@gmail.com';   // TU CORREO
        $mail->Password   = 'yuve jhbv oouk bvwq';        // CONTRASEÑA DE APLICACIÓN
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';

        // ============================
        // REMITENTE Y DESTINATARIO
        // ============================
        $mail->setFrom('b.hurtado1998@gmail.com', 'Beto Prueba');
        $mail->addAddress('b.hurtado1998@gmail.com'); // A QUIÉN LLEGA (TÚ)

        // ============================
        // CONTENIDO DEL CORREO
        // ============================
        $mail->isHTML(true);
        $mail->Subject = "Nueva Cotización | Folio #$id";

        $mail->Body = "
            <h2>Nueva cotización recibida</h2>
            <p><strong>Nombre:</strong> {$nombre}</p>
            <p><strong>Correo del cliente:</strong> {$contacto}</p>
            <p><strong>Mensaje:</strong></p>
            <p>{$mensaje}</p>
            <hr>
            <p><strong>Folio:</strong> #{$id}</p>
            <p><strong>Fecha:</strong> {$fecha}</p>
        ";

        $mail->AltBody = "
Nueva cotización Arsodus

Nombre: {$nombre}
Correo del cliente: {$contacto}
Mensaje: {$mensaje}
Folio: #{$id}
Fecha: {$fecha}
        ";

        // ============================
        // ENVIAR CORREO
        // ============================
        $mail->send();

        echo json_encode([
            'success' => true,
            'tipo'    => 'correo',
            'message' => 'Cotización enviada correctamente por correo.'
        ]);
    } catch (Exception $e) {

        session_start();

        $_SESSION['flash_tipo'] = 'error';
        $_SESSION['flash_msg']  = '❌ Error al enviar la cotización: ' . $mail->ErrorInfo;

        header("Location: $paginaOrigen?estado=error");
        exit;
    }
}



// ============================
// 6️⃣ SI ES CORREO (POR AHORA SOLO CONFIRMAMOS)
// ============================
session_start();

$mail->send();

// ✅ Mensajes flash
$_SESSION['flash_tipo'] = 'success';
$_SESSION['flash_msg']  = '✅ Cotización enviada correctamente por correo.';


$separador = (strpos($paginaOrigen, '?') !== false) ? '&' : '?';
header("Location: {$paginaOrigen}{$separador}estado=ok");
exit;
