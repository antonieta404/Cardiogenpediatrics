<?php
// Conexión a la base de datos con credenciales por defecto de XAMPP
$servername = "localhost";
$username = "root";
$dbname = "sistema_usuarios";

$connect = mysqli_connect($servername, $username, "", $dbname );

if(!$connect){
    die("Error de Conexión: ".mysqli_connect_errno());
    header('Location:../index.php');
    exit();
}