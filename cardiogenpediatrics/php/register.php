<?php
// Conexión a la base de datos con credenciales por defecto de XAMPP
$servername = "localhost";
$username = "root";
$dbname = "sistema_usuarios";

// Crear la conexión
$conn = new mysqli($servername, $username, "" , $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibe datos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['Remail'];
$password = password_hash($_POST['Rpassword'], PASSWORD_DEFAULT); // Hashea la contraseña

// Verificar si el usuario ya existe
$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "El usuario ya está registrado.";
} else {
    // Inserta el nuevo usuario
    $sql = "INSERT INTO usuarios (nombre, apellidos, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $apellidos, $email, $password);

    if ($stmt->execute()) {
        echo "Registro exitoso. Puedes iniciar sesión.";
        header("Location: ../index.php");
        exit(); 
    } else {
        echo "Error: " . $stmt->error;
    }
    
}

$stmt->close();
$conn->close();
?>
