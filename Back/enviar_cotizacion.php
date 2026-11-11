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
    $mail->Subject = "🧾 Nueva Cotización | Arsodus | Folio #$id";

    $mail->Body = "
<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
</head>
<body style='margin:0; padding:0; background-color:#f4f6f8; font-family: Arial, Helvetica, sans-serif;'>

  <table width='100%' cellpadding='0' cellspacing='0' style='background:#f4f6f8; padding:30px 0;'>
    <tr>
      <td align='center'>

        <!-- CONTENEDOR -->
        <table width='600' cellpadding='0' cellspacing='0' style='background:#ffffff; border-radius:14px; overflow:hidden; box-shadow:0 10px 30px rgba(0,0,0,0.08);'>

          <!-- HEADER -->
          <tr>
            <td style='background:linear-gradient(90deg,#0f52bd,#1e3a8a); padding:30px; text-align:center;'>
              <h1 style='color:#ffffff; margin:0; font-size:28px;'>Arsodus</h1>
              <p style='color:#cbd5f5; margin-top:5px;'>Nueva cotización recibida</p>
            </td>
          </tr>

          <!-- BODY -->
          <tr>
            <td style='padding:30px;'>

              <h2 style='color:#1e3a8a; margin-bottom:10px;'>📩 Tienes una nueva solicitud</h2>

              <p style='color:#555; font-size:15px;'>
                Un cliente ha enviado una nueva cotización desde el sitio web.
              </p>

              <!-- INFO BOX -->
              <table width='100%' cellpadding='0' cellspacing='0' style='margin-top:20px; background:#f8fafc; border-radius:10px;'>
                <tr>
                  <td style='padding:20px;'>

                    <p style='margin:6px 0;'><strong>👤 Nombre:</strong> {$nombre}</p>
                    <p style='margin:6px 0;'><strong>📧 Contacto:</strong> {$contacto}</p>
                    <p style='margin:6px 0;'><strong>🧾 Folio:</strong> #{$id}</p>
                    <p style='margin:6px 0;'><strong>📅 Fecha:</strong> {$fecha}</p>

                  </td>
                </tr>
              </table>

              <!-- MENSAJE -->
              <div style='margin-top:25px;'>
                <h3 style='color:#1e3a8a;'>📝 Mensaje del cliente</h3>
                <div style='background:#ffffff; border:1px solid #e5e7eb; border-radius:10px; padding:15px; color:#333; line-height:1.6;'>
                  {$mensaje}
                </div>
              </div>

              <!-- CTA -->
              <div style='margin-top:30px; text-align:center;'>
                <a href='mailto:{$contacto}'
                   style='background:#0f52bd; color:white; padding:14px 26px; text-decoration:none; border-radius:8px; display:inline-block; font-weight:bold;'>
                  📬 Responder al cliente
                </a>
              </div>

            </td>
          </tr>

          <!-- FOOTER -->
          <tr>
            <td style='background:#f1f5f9; padding:20px; text-align:center; font-size:12px; color:#64748b;'>
              Arsodus © " . date('Y') . " <br>
              Impresión • Serigrafía • Identidad Visual
            </td>
          </tr>

        </table>

      </td>
    </tr>
  </table>

</body>
</html>
";

    $mail->AltBody = "
NUEVA COTIZACIÓN - ARSODUS

Nombre: {$nombre}
Contacto: {$contacto}
Folio: #{$id}
Fecha: {$fecha}

Mensaje:
{$mensaje}
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
