<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Composer: composer require phpmailer/phpmailer

/* echo "<h2>Datos recibidos:</h2>";
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/
$Nombre_Cliente = $_POST["nombre"];
$Tipo_Contacto = $_POST["contactoTipo"];
$Correo_Cliente = $_POST["correo"];
$Whatsapp_Cliente = $_POST["whatsapp"];
$Mensaje_Cliente = $_POST["mensaje"];
$Tela_Seleccionada = $_POST["tela"];
$Tecnica_Seleccionada = $_POST["tecnica"];
$Cantidad_De_Camisas = $_POST["cantidad"];
$Monto_Total = $_POST["total"];


if ($Tipo_Contacto == "whatsapp") {
    // Número de destino
    $telefono = "5213323638666";

    // Texto base del mensaje
    $mensaje  = "👋 *Hola Arsodus*, me gustaría hacer una cotización con los siguientes datos:\n\n";
    $mensaje .= "🧑‍💼 *Nombre*: $Nombre_Cliente\n";
    $mensaje .= "📲 *Tipo de Contacto*: $Tipo_Contacto\n";
    $mensaje .= "📧 *Correo*: $Correo_Cliente\n";
    $mensaje .= "💬 *Whatsapp*: $Whatsapp_Cliente\n\n";
    $mensaje .= "📝 *Mensaje*: \n$Mensaje_Cliente\n\n";
    $mensaje .= "👕 *Tela*: $Tela_Seleccionada\n";
    $mensaje .= "🎨 *Técnica*: $Tecnica_Seleccionada\n";
    $mensaje .= "📦 *Cantidad*: $Cantidad_De_Camisas\n";
    $mensaje .= "💰 *Monto Total*: $$Monto_Total";

    // Convertir a formato URL
    $mensajeCodificado = urlencode($mensaje);

    // URL final de WhatsApp
    $url = "https://api.whatsapp.com/send?phone=$telefono&text=$mensajeCodificado";

    // Redirigir
    header("Location: $url");
    exit();
}
elseif ($Tipo_Contacto == "correo") {
    // Aquí se manejará el envío por correo

// Metodo para Whatsapp

// Metodo para correo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $contactoTipo = $_POST['contactoTipo'];
    $correo = $_POST['correo'];
    $whatsapp = $_POST['whatsapp'];
    $mensaje = $_POST['mensaje'];
    $tela = $_POST['tela'];
    $tecnica = $_POST['tecnica'];
    $cantidad = $_POST['cantidad'];
    $total = $_POST['total'];

    $mail = new PHPMailer(true);

    try {
        // Config SMTP (ejemplo Gmail)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'TU_CORREO@gmail.com';
        $mail->Password = 'TU_PASSWORD_APP'; // OJO: no uses tu pass normal, sino uno de aplicación
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Remitente y destinatario
        $mail->setFrom('TU_CORREO@gmail.com', 'Cotizador Web');
        $mail->addAddress($correo, $nombre);

        // Adjuntar imagen si existe
        if (file_exists('uploads/diseno.png')) {
            $mail->addAttachment('uploads/diseno.png');
        }

        // Contenido
        $mail->isHTML(true);
        $mail->Subject = "Cotización personalizada - $nombre";
        $mail->Body = "
            <h2>Detalles de la cotización</h2>
            <p><b>Cliente:</b> $nombre</p>
            <p><b>Contacto:</b> $contactoTipo</p>
            <p><b>Correo:</b> $correo</p>
            <p><b>Whatsapp:</b> $whatsapp</p>
            <p><b>Mensaje:</b> $mensaje</p>
            <p><b>Tela:</b> $tela</p>
            <p><b>Técnica:</b> $tecnica</p>
            <p><b>Cantidad:</b> $cantidad</p>
            <p><b>Total:</b> $$total MXN</p>
        ";

        $mail->send();
        echo 'Correo enviado correctamente';
    } catch (Exception $e) {
        echo "Error al enviar: {$mail->ErrorInfo}";
    }
}
}
