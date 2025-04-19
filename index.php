<?php
session_start();
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email == "admin" && $password == "2025") {
        $_SESSION["rol"] = "admin";
        header("Location: admin/dashboard.php");
        exit;
    }

    $stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE email = ? AND rol = 'usuario'");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hash);
        $stmt->fetch();

        if (password_verify($password, $hash)) {
            $_SESSION["user_id"] = $id;
            $_SESSION["rol"] = "usuario";
            header("Location: user/home.php");
            exit;
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Hotel Camino Real</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Correo o admin" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="submit" value="Ingresar">
        </form>
        <a class="register-link" href="register.php">¿No tienes cuenta? Regístrate</a>
    </div>
</body>
</html>
