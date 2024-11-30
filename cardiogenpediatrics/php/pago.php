<?php
session_start();
// Verifica si la sesión está activa
if (!isset($_SESSION['Ingresado'])) {
    // Si no está iniciada, redirige al usuario a la página de login
    header("Location:../index.php");
    exit();
}
?>
<?php
// Conexión a la base de datos
$servidor = "127.0.0.1";
$usuario = "root"; // Ajusta si usas otro usuario
$password = ""; // Ajusta si tienes contraseña configurada
$base_datos = "cardiogenpediatrics";

$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

// Verifica si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error al conectar a la base de datos: " . $conexion->connect_error);
}

// Realiza la consulta para obtener todos los registros de la tabla 'pagos'
$sql = "SELECT * FROM pagos";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos - Cardiogen Pediatrics</title>
    <link rel="stylesheet" href="../css/pago.css"> <!-- Opcional: si tienes estilos -->
    <link rel="stylesheet" href="../css/normalize.css">
</head>
<body>
<img src="../imgs/login.gif" alt="Cardiogen Pediatrics Logo" class="logo">
    <header>
        <h1>Pagos - Cardiogen Pediatrics</h1>
        <div class="back-button">
            <a href="inicio.php" class="btn-regresar">Regresar a Inicio</a>
        </div>
    </header>
    <div class="intro-container">
        <p>En nuestro hospital, nos dedicamos a brindar atención especializada en cardiología pediátrica. Sabemos lo importante que es la salud de tu pequeño, 
            por eso hemos diseñado servicios integrales que incluyen consulta, diagnóstico y tratamiento, adaptados a las necesidades de cada paciente.</p>
        <p>A continuación, te presentamos nuestras opciones y precios:</p>
    </div>
    <div class="pago-container">
        <?php if ($resultado->num_rows > 0): ?>
            <table >
                <tr>
                    
                    <th>Consulta</th>
                    <th>Diagnóstico</th>
                    <th>Tratamiento </th>
                   
                </tr>
                <?php while ($pago = $resultado->fetch_assoc()): ?>
                    <tr>
                    
                        <td><?php echo htmlspecialchars($pago['consulta_detalle']); ?></td>
                        <td><?php echo htmlspecialchars($pago['diagnostico_detalle']); ?></td>
                        <td><?php echo htmlspecialchars($pago['tratamiento_detalle']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron pagos.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
// Cierra la conexión
$conexion->close();
?>
