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

// Inicializa la búsqueda
$busqueda = isset($_POST['busqueda']) ? $conexion->real_escape_string($_POST['busqueda']) : "";

// Variable para almacenar resultados
$resultado = null;

// Solo realiza la consulta si el usuario ingresó algo en el campo de búsqueda
if (!empty($busqueda)) {
    $sql = "SELECT * FROM medicos WHERE nombre LIKE '%$busqueda%' OR nombre_hospital LIKE '%$busqueda%'";
    $resultado = $conexion->query($sql);

    // Limpia el campo de búsqueda para que no se quede la información
    $busqueda = ""; 
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médicos - Cardiogen Pediatrics</title>
    <link rel="stylesheet" href="../css/medicos.css">
    <link rel="stylesheet" href="../css/normalize.css">
</head>
<body>
    <header>
        <h1>Médicos - Cardiogen Pediatrics</h1>
        <div class="back-button">
            <a href="inicio.php" class="btn-regresar">Regresar a Inicio</a>
        </div>
    </header>
    <img src="../imgs/login.gif" alt="Cardiogen Pediatrics Logo" class="logo">
    <!-- Barra de búsqueda -->
    <div class="search-bar">
        <form method="POST" action="">
            <input type="text" name="busqueda" placeholder="Buscar médico" value="<?php echo htmlspecialchars($busqueda); ?>">
            <button type="submit" name="buscar">Buscar</button>
        </form>
    </div>
    <div class="medico-containers">
  <p>Puedes buscar al médico que te atiende y consultar su horario fácilmente. Si lo prefieres, también puedes buscar por el nombre del hospital y ver a todos los médicos disponibles.</p>
  <p class="salud">¡Tu salud está en las mejores manos! 💙</p>
</div>

    <!-- Mostrar médicos -->
    <div class="medico-container">
        <?php if ($resultado !== null): ?>
            <?php if ($resultado->num_rows > 0): ?>
                <?php while ($medico = $resultado->fetch_assoc()): ?>
                    <?php 
                    // Ruta de la foto o imagen predeterminada
                    $foto = !empty($medico['foto']) ? '../foto/' . htmlspecialchars($medico['foto']) : '../foto/default.jpg';
                   
                    ?>
                   
                    <div class="medico-card">
                        <div class="medico-image">
                            <img src="<?php echo $foto; ?>" alt="Foto de <?php echo htmlspecialchars($medico['nombre']); ?>">
                        </div>
                        <h3><?php echo htmlspecialchars($medico['nombre']); ?></h3>
                        <p><strong>Cédula profesional:</strong> <?php echo htmlspecialchars($medico['cedula_profesional']); ?></p>
                        <p><strong>Hospital:</strong> <?php echo htmlspecialchars($medico['nombre_hospital']); ?></p>
                        <p><strong>Horario:</strong> <?php echo htmlspecialchars($medico['horario']); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No se encontraron médicos con el criterio de búsqueda.</p>
            <?php endif; ?>
        <?php else: ?>
            <!-- No mostrar nada si no se ha realizado una búsqueda -->
        <?php endif; ?>
    </div>

</body>
</html>
