<!-- login.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Hotel Camino Real</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="login-container">
        <form action="validate_login.php" method="POST" class="login-form">
            <img src="assets/img/logo.png" alt="Hotel Camino Real" class="logo">
            <h2>Bienvenido al sistema</h2>
            <div class="input-group">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" id="email" required placeholder="Ingresa tu correo">
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required placeholder="Ingresa tu contraseña">
            </div>
            <button type="submit" class="btn-login">Ingresar</button>
        </form>
    </div>
</body>
</html>
