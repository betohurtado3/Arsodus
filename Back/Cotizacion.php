<?php
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
?>