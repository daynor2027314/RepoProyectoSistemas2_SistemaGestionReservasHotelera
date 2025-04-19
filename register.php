<?php
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password);
    
    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        $error = "El correo ya está registrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Hotel Camino Real</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Registrarse</h2>
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="submit" value="Crear cuenta">
        </form>
        <a class="register-link" href="index.php">¿Ya tienes cuenta? Inicia sesión</a>
    </div>
</body>
</html>
