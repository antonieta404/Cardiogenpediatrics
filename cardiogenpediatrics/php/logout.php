<?php
session_start();
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión
header("Location: ../index.php?mensaje=cerrado"); // Redirige a index.php con el mensaje
exit(); // Asegúrate de detener la ejecución después de redirigir
?>
