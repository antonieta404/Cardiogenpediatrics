<?php
session_start();

// Verifica si la sesión está activa
if (!isset($_SESSION['Ingresado'])) {
    // Si no está iniciada, redirige al usuario a la página de login
    header("Location:../index.php");
    exit();
}
echo '<p class="bienvenida">Saludos, ' . $_SESSION['Ingresado'] . '. Es un placer tenerte con nosotros.</p>';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - Cardiogen Pediatrics</title>
    <link rel="stylesheet" href="../css/inicio.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <script src="../js/alarmas.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert -->

</head>
<body>
    <!-- Imagen del logo en el cuerpo -->
    <img src="../imgs/login.gif" alt="Cardiogen Pediatrics Logo" class="logo">

    <img 
        src="../imgs/ambulancia.gif" 
        alt="Cardiogen Pediatrics ambulancia" 
        class="ambulancia" 
        onmouseover="playSound()" 
        onmouseout="stopSound()">
    <p class="ambulancia-texto">4424879076</p>
<audio id="ambulanciaSound" src="../audio/ambulancia.mp3"></audio>
<script src="../js/script.js"></script>


<img src="../imgs/inicio.gif" alt="Cardiogen Pediatrics" class="inicio">

    <div class="container">
        <div class="content">       
            <h1 class="titulo">¿Qué es un cardiocirujano pediátrico?</h1>
            <p class="texto">Si tu hijo necesita atención especializada para un problema cardíaco, en CardioGen Pediatrics contamos con un equipo de cardiocirujanos pediátricos altamente calificados. Estos médicos, como el Dr. Juan Fernando Perez del Corral y la Dra. Julieta Ponce de León, tienen el conocimiento y la experiencia para tratar condiciones complejas del corazón en recién nacidos, niños y adolescentes. Además de tratar problemas cardíacos congénitos, cuentan con la capacitación y la práctica en hospitales pediátricos como CardioGen Pediatrics.</p>
            <p class="texto">Nuestros especialistas, que incluyen al Dr. Martín Elías de los Ríos Acosta y el Dr. Efraín de las Casas Mejía, tienen una formación extensa en cirugía cardíaca pediátrica, desde la escuela de medicina hasta programas de residencia especializados en cirugía torácica y cardíaca. Su capacitación incluye al menos 4 años en la escuela de medicina, seguidos de residencias quirúrgicas y subespecializaciones en cardiocirugía pediátrica, en donde adquieren habilidades únicas para tratar corazones en cuerpos pequeños.</p>
            <h1 class="titulo">Atención integral para niños y sus familias</h1>
            <p class="texto">En CardioGen Pediatrics, la atención se extiende más allá de la cirugía. Los niños son tratados en un ambiente adaptado a sus necesidades, con el apoyo de un equipo multidisciplinario que incluye cardiólogos pediátricos, anestesiólogos especializados en pediatría, enfermeras, terapeutas y trabajadores sociales. El equipo de especialistas está enfocado en ofrecer una atención segura y personalizada, asegurándose de que cada pequeño paciente y su familia se sientan seguros y respaldados en cada paso del tratamiento.</p>
        </div>

        <nav class="sidebar">
            <ul>
                <li><a href="diccionario.php">Médicos</a></li> <!-- Enlace para el diccionario médico -->
                <li><a href="pacientes.php">Pacientes </a></li>
                <li><a href="pago.php">Tipos de pago</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li> <!-- Enlace para cerrar sesión -->
            </ul>
        </nav>
    </div>
    <footer class="footer">
    <p>COPYRIGHT 2024 CARDIOGEN PEDIATRICS, TODOS LOS DERECHOS RESERVADOS</p>
</footer>

</body>
</html>
