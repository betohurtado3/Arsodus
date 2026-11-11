<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ============================
// DEPENDENCIAS
// ============================
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'libs/PHPMailer/PHPMailer.php';
require 'libs/PHPMailer/SMTP.php';
require 'libs/PHPMailer/Exception.php';

session_start();

// ============================
// VALIDAR MÉTODO
// ============================
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

// ============================
// OBTENER DATOS DEL FORM
// ============================

$mensaje       = trim($_POST['mensaje'] ?? '');
$nombre        = trim($_POST['nombre'] ?? '');
$telefono      = trim($_POST['telefono'] ?? '');


// Página de regreso (referer)
$paginaOrigen = $_SERVER['HTTP_REFERER'] ?? '../index.php';

// ============================
// VALIDACIONES BÁSICAS
// ============================
if (empty($telefono) || empty($mensaje) || empty($nombre)) {
    $_SESSION['flash_tipo'] = 'error';
    $_SESSION['flash_msg']  = '❌ Todos los campos son obligatorios';

    header("Location: $paginaOrigen");
    exit;
}

if (!filter_var($telefono, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['flash_tipo'] = 'error';
    $_SESSION['flash_msg']  = '❌ El correo no es válido';

    header("Location: $paginaOrigen");
    exit;
}

// ============================
// ENVIAR CORREO
// ============================
$mail = new PHPMailer(true);

try {

    // ============================
    // CONFIGURACIÓN SMTP GMAIL
    // ============================
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'serigrafiaarsodus@gmail.com'; 
    $mail->Password   = 'tows hxdo ukob kcqx';   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->CharSet    = 'UTF-8';

    // ============================
    // REMITENTE Y DESTINATARIO
    // ============================
    $mail->setFrom('serigrafiaarsodus@gmail.com', 'Formulario Web Arsodus');
    //$mail->addAddress('arsodus.serigrafia@gmail.com'); // correo destino
    $mail->addAddress('betohurtado3@hotmail.com'); // correo destino


    // ============================
    // CONTENIDO DEL CORREO
    // ============================
    $mail->isHTML(true);
    $mail->Subject = '📩 Nuevo mensaje desde el sitio web';

    $mail->Body = "
<div style='background:#f4f6f8; padding:30px; font-family: Arial, Helvetica, sans-serif;'>

    <div style='max-width:600px; margin:auto; background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 0 10px rgba(0,0,0,0.05);'>

        <!-- HEADER -->
        <div style='background:#0f172a; color:white; padding:20px 30px;'>
            <h2 style='margin:0; font-size:20px;'>📩 Nuevo mensaje desde el sitio web</h2>
            <p style='margin:5px 0 0; font-size:13px; opacity:0.8;'>Formulario de contacto</p>
        </div>

        <!-- CONTENIDO -->
        <div style='padding:30px; color:#111827;'>

            <p style='font-size:15px; margin-bottom:20px;'>
                Se ha recibido un nuevo mensaje desde el formulario del sitio web.
            </p>

            <!-- BLOQUE DE DATOS -->
            <div style='background:#f1f5f9; padding:20px; border-radius:6px; margin-bottom:20px;'>
                <p style='margin:0; font-size:14px;'><strong>📧 Medio de comunicación del cliente:</strong></p>
                <p style='margin:5px 0 0; font-size:15px; color:#2563eb;'>{$telefono}</p>
                <p style='margin:15px 0 0; font-size:14px;'><strong>👤 Nombre del cliente:</strong></p>
                <p style='margin:5px 0 0; font-size:15px; color:#2563eb;'>{$nombre}</p>
            </div>

            <!-- MENSAJE -->
            <div style='margin-top:20px;'>
                <p style='font-size:14px; margin-bottom:10px;'><strong>📝 Mensaje del cliente:</strong></p>

                <div style='background:#f8fafc; border-left:4px solid #2563eb; padding:15px; border-radius:4px; font-size:14px; line-height:1.6; white-space: pre-line;'>
                    {$mensaje}
                </div>
            </div>

        </div>

        <!-- FOOTER -->
        <div style='background:#f1f5f9; padding:20px 30px; text-align:center; font-size:12px; color:#6b7280;'>
            <p style='margin:0;'>Este mensaje fue enviado desde el formulario del sitio web</p>
            <p style='margin:5px 0 0;'>Arsodus · Sistema automático de contacto</p>
        </div>

    </div>

</div>
";


    // ============================
    // ENVIAR
    // ============================
    $mail->send();

    $_SESSION['flash_tipo'] = 'ok';
    $_SESSION['flash_msg']  = '✅ Mensaje enviado correctamente';

    header("Location: $paginaOrigen");
    exit;
} catch (Exception $e) {

    $_SESSION['flash_tipo'] = 'error';
    $_SESSION['flash_msg']  = '❌ Error al enviar el mensaje. Intenta más tarde';

    // Debug (solo en local)
    // $_SESSION['flash_msg'] .= ' | ' . $mail->ErrorInfo;

    header("Location: $paginaOrigen");
    exit;
}
