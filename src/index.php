<?php require "./inc/sesiones.php" ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevCode</title>
    <link rel="shortcut icon" href="./img/icon-logo.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/menu-derecho.css">
    <link rel="stylesheet" href="css/publicar-no-login.css">
    <link rel="stylesheet" href="css/footer.css">

    <script src="js/index.js"></script>
    <script src="https://kit.fontawesome.com/390edf9e42.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&family=Permanent+Marker&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/390edf9e42.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Incluimos el header -->
    <?php include "./inc/header.php";?>
    <main>
    <div id="portada">
        <img src="img\logo.png" alt="" srcset="" id="img-logo">
        <div id="texto-portada">
            <h1>DevCode</h1>
            <span>Conectando mentes!</span>
        </div>
    </div>
    <?php
    // Verificamos si hay una sesión activa
    if (isset($_SESSION["DC"])) {
        // Incluimos secciones para usuarios con sesión iniciada
        include "./inc/publicaciones-login-index.php";
        include "./inc/menu-derecho.php";
    }else{
        // Incluimos secciones para usuarios sin sesión iniciada
        include "./inc/publicaciones-no-login-index.php";
        include "./inc/publicar-no-login.php";
    }
    ?>
    </main>
    <!-- Incluimos el footer -->
    <?php include "./inc/footer.php"; ?>
</body>
</html>
