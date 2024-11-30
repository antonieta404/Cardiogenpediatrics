
<?php
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login y Registro</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="../css/normalize.css">


</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Bienvenido</h1>
        <img src="./imgs/login.gif" alt="Cardiogen Pediatrics Logo" class="logo">

        <?php if ($action === 'register'): ?>
            <form action="./php/register.php" method="POST" class="col-md-6 mx-auto">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="Remail" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="Rpassword" required>
                </div>
                <button type="submit" class="btn btn-success w-100" name="registro">Registrarse</button>
                <p class="mt-3 text-center">
                    ¿Ya tienes cuenta? <a href="index.php?action=login">Inicia Sesión</a>
                </p>
            </form>
        <?php else: ?>
            <form action="./php/login.php" method="POST" class="col-md-6 mx-auto">
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="Lemail" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="Lpassword" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" name="inicio">Iniciar Sesión</button>
                <p class="mt-3 text-center">
                    ¿No tienes cuenta? <a href="index.php?action=register">Regístrate</a>
                </p>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>