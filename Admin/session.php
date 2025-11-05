<?php
// File: /Arsodus/Admin/session.php
session_start();
require_once '../config/Config.php';

// Seguridad básica
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

// Recibir datos del formulario
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$remember = isset($_POST['remember']);

// Validar campos vacíos
if ($username === '' || $password === '') {
    $_SESSION['login_error'] = "Por favor, completa todos los campos.";
    header("Location: index.php");
    exit;
}

try {
    $pdo = connectPDO();

    // Buscar usuario por nombre o correo
    $stmt = $pdo->prepare("SELECT id, usuario, password FROM usuarios WHERE usuario = :username LIMIT 1");
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Inicio de sesión correcto
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['usuario'] = $user['usuario'];

        // Si seleccionó "recordarme"
        if ($remember) {
            // Cookie válida por 7 días (puedes cambiarlo)
            setcookie('remember_user', $user['id'], time() + (7 * 24 * 60 * 60), "/", "", false, true);
        }

        header("Location: dashboard.php");
        exit;
    } else {
        $_SESSION['login_error'] = "Usuario o contraseña incorrectos.";
        header("Location: index.php");
        exit;
    }
} catch (Exception $e) {
    error_log("Error en login: " . $e->getMessage());
    $_SESSION['login_error'] = "Error interno del servidor.";
    header("Location: index.php");
    exit;
}
