<?php
require 'conexion.php';
if (isset ($_POST ['inicio'])){
    // Recibe datos del formulario
    $email = $_POST['Lemail'];
    $passwordusr = $_POST['Lpassword'];

    // Verificar si el usuario existe en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email = '$email';";    

    $result = mysqli_query($connect, $sql);
    $num_reg = mysqli_num_rows($result);

    if($num_reg != 0){
        $usr = mysqli_fetch_assoc($result);
        $auth = password_verify($passwordusr, $usr['password']);

        if($auth){
            session_start();
            $_SESSION ['Ingresado'] = $usr['nombre'];
            $_SESSION ['Autentico'] = true;

            // Limpiar los datos del formulario
            unset($_POST['Lemail']);
            unset($_POST['Lpassword']);

            header("Location: ../php/inicio.php");
            exit();
        } else {
            // Contraseña incorrecta
            unset($_POST['Lemail']);
            unset($_POST['Lpassword']);
            header("Location: ../index.php?action=login&error=1"); // error=1: Contraseña incorrecta
            exit();
        }
    } else {
        // Usuario no encontrado
        unset($_POST['Lemail']);
        unset($_POST['Lpassword']);
        header("Location: ../index.php?action=login&error=2"); // error=2: Usuario no encontrado
        exit();
    }
}

