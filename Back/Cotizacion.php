<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Composer: composer require phpmailer/phpmailer

echo "<h2>Datos recibidos:</h2>";
echo "<pre>";
print_r($_POST);
echo "</pre>";

// Si mandaste la imagen en base64
if (!empty($_POST['imagenBase64'])) {
    $data = $_POST['imagenBase64'];
    $data = str_replace('data:image/png;base64,', '', $data);
    $data = str_replace(' ', '+', $data);
    $imagen = base64_decode($data);

    // Guardar como archivo temporal
    file_put_contents('uploads/diseno.png', $imagen);
    echo "<p>Imagen guardada en /uploads/diseno.png</p>";
}

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

?>