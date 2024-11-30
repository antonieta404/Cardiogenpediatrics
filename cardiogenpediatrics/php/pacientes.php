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
    $sql = "SELECT * FROM pacientes WHERE nombre LIKE '%$busqueda%' OR apellido_paterno LIKE '%$busqueda%' OR apellido_materno LIKE '%$busqueda%'";
    $resultado = $conexion->query($sql);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes - Cardiogen Pediatrics</title>
    <link rel="stylesheet" href="../css/pacientes.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <script src="../js/pacientes.js" defer></script> <!-- Archivo JavaScript externo -->
</head>
<body>
    <header>
    <img src="../imgs/login.gif" alt="Cardiogen Pediatrics Logo" class="logo">
        <h1>Pacientes - Cardiogen Pediatrics</h1>
        <div class="back-button">
            <a href="inicio.php" class="btn-regresar">Regresar a Inicio</a>
        </div>
    </header>

    <div class="search-bar">
        <form method="POST" action="">
            <input type="text" name="busqueda" placeholder="Buscar paciente" value="<?php echo htmlspecialchars($busqueda); ?>">
            <button type="submit" name="buscar">Buscar</button>
        </form>
    </div>

    <div class="paciente-container">
        <?php if (!empty($busqueda)): ?>
            <?php if ($resultado !== null && $resultado->num_rows > 0): ?>
                <?php while ($paciente = $resultado->fetch_assoc()): ?>
                    <div class="paciente-card">
                        <h3><?php echo htmlspecialchars($paciente['nombre'] . " " . $paciente['apellido_paterno'] . " " . $paciente['apellido_materno']); ?></h3>
                        <p><strong>Fecha de nacimiento:</strong> <?php echo htmlspecialchars($paciente['fecha_de_nacimiento']); ?></p>
                        <p><strong>Género:</strong> <?php echo htmlspecialchars($paciente['genero']); ?></p>
                        <p><strong>Hospital:</strong> <?php echo htmlspecialchars($paciente['id_hospital']); ?></p>

                        <!-- Botones para mostrar información adicional -->
                        <button onclick="mostrarSeccion(<?php echo $paciente['id_paciente']; ?>, 'consultas')">Ver Consultas</button>
                        <button onclick="mostrarSeccion(<?php echo $paciente['id_paciente']; ?>, 'diagnostico')">Ver Diagnóstico</button>
                        <button onclick="mostrarSeccion(<?php echo $paciente['id_paciente']; ?>, 'tratamiento')">Ver Tratamiento</button>

                        <!-- Contenedor para la información adicional -->
                        <div id="consultas-<?php echo $paciente['id_paciente']; ?>" class="seccion-datos" style="display:none;">
                            <?php
                            $consultaSql = "SELECT * FROM consultas WHERE id_paciente = " . $paciente['id_paciente'];
                            $consultas = $conexion->query($consultaSql);
                            if ($consultas->num_rows > 0) {
                                while ($consulta = $consultas->fetch_assoc()) {
                                    echo "<p>Edad: " . htmlspecialchars($consulta['edad']) . "</p>";
                                    echo "<p>Género: " . htmlspecialchars($consulta['genero']) . "</p>";
                                    echo "<p>Peso: " . htmlspecialchars($consulta['peso']) . "</p>";
                                }
                            } else {
                                echo "<p>No hay consultas registradas.</p>";
                            }
                            ?>
                        </div>

                        <div id="diagnostico-<?php echo $paciente['id_paciente']; ?>" class="seccion-datos" style="display:none;">
                            <?php
                            $diagnosticoSql = "SELECT d.* FROM diagnosticos d INNER JOIN consultas c ON d.id_consulta = c.id_consulta WHERE c.id_paciente = " . $paciente['id_paciente'];
                            $diagnosticos = $conexion->query($diagnosticoSql);
                            if ($diagnosticos->num_rows > 0) {
                                while ($diagnostico = $diagnosticos->fetch_assoc()) {
                                    echo "<p>Historial clínico: " . htmlspecialchars($diagnostico['historial_clinico']) . "</p>";
                                    echo "<p>Síntomas: " . htmlspecialchars($diagnostico['sintomas']) . "</p>";
                                    echo "<p>Datos estadísticos: " . htmlspecialchars($diagnostico['datos_estadisticos']) . "</p>";
                                }
                            } else {
                                echo "<p>No hay diagnósticos registrados.</p>";
                            }
                            ?>
                        </div>

                        <div id="tratamiento-<?php echo $paciente['id_paciente']; ?>" class="seccion-datos" style="display:none;">
                            <?php
                            $tratamientoSql = "SELECT t.* FROM tratamientos t INNER JOIN diagnosticos d ON t.id_diag = d.id_diag INNER JOIN consultas c ON d.id_consulta = c.id_consulta WHERE c.id_paciente = " . $paciente['id_paciente'];
                            $tratamientos = $conexion->query($tratamientoSql);
                            if ($tratamientos->num_rows > 0) {
                                while ($tratamiento = $tratamientos->fetch_assoc()) {
                                    echo "<p>Medicamento: " . htmlspecialchars($tratamiento['medicamento']) . "</p>";
                                    echo "<p>Monitoreo de síntomas: " . htmlspecialchars($tratamiento['monitoreo_de_sintomas']) . "</p>";
                                    echo "<p>Seguimiento médico: " . htmlspecialchars($tratamiento['seguimiento_medico']) . "</p>";
                                }
                            } else {
                                echo "<p>No hay tratamientos registrados.</p>";
                            }
                            ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No se encontraron pacientes con el criterio de búsqueda.</p>
            <?php endif; ?>
        <?php else: ?>
            <p>Aún no se ha realizado una búsqueda.</p> <!-- Mensaje cuando no hay búsqueda -->
        <?php endif; ?>
    </div>

</body>
</html>
