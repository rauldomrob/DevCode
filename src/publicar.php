<?php include_once "./inc/sesiones.php"; ?><!--Archivo con funciones relacionadas a sesiones de usuario-->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Publicar | DevCode</title>
        <script src="https://kit.fontawesome.com/390edf9e42.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/contacto.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/botones.css">
        <link rel="stylesheet" href="css/publicar.css">
        <link rel="shortcut icon" href="./img/icon-logo.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&family=Permanent+Marker&display=swap" rel="stylesheet">
    </head>
    <body>
        <!-- Incluimos el header -->
        <?php include "./inc/header.php";?>
        <div class="todo_publicar">
            <!-- Formulario para la publicación -->
            <form action="inc/sesiones.php" method="post" enctype="multipart/form-data"> <!-- El formulario nos redirige a "sesiones.php" para realizar las consultas con php -->
                <h1>Publicar</h1>
                <div class="centrar">
                    <div class="tematica">
                        <label >Selecciona una temática</label>
                        <select name="tematicas" id="tematicas" size="9" required>
                            <option value="Desarrollo Backend">Desarrollo Backend</option>
                            <option value="Desarrollo Frontend">Desarrollo Frontend</option>
                            <option value="Desarrollo de Aplicaciones Móviles">Desarrollo de Aplicaciones Móviles</option>
                            <option value="Frameworks y Bibliotecas">Frameworks y Bibliotecas</option>
                            <option value="Herramientas y Entorno de Desarrollo">Herramientas y Entorno de Desarrollo</option>
                            <option value="Desarrollo Ágil y Metodologías">Desarrollo Ágil y Metodologías</option>
                            <option value="Problemas de código y depuración">Problemas de código y depuración</option>
                            <option value="Carrera y Desarrollo Profesional">Carrera y Desarrollo Profesional</option>
                            <option value="Nuevas tecnologías">Nuevas tecnologías</option>
                        </select>
                    </div>
                    <!-- Sección para el contenido de la publicación -->
                    <div class="contenido">
                        <label for="">Contenido de la publicación:</label>
                        <textarea id="contenido" name="contenido" rows="4" cols="50" placeholder="Escribe aquí el contenido de tu publicación" autocomplete="off" required maxlength="700" minlength="10"></textarea>
                    </div>
                    <!-- Sección para subir una imagen -->
                    <div class="subir_imagen">
                        <label class="label1">Selecciona una imagen</label>
                        <label class="label2">(.jpg, .jpeg o .png)</label>
                        <input type="file" name="imagen" class="imagen-publicacion" id="imagen-publicacion">
                        <div id="imagen-contenedor">
                            <img id="imagen">
                        </div>
                        <script src="js/subir-imagen.js"></script>
                    </div>
                </div>
                <div class="todo_siguiente">
                    <div class="siguiente">
                        <div class="caja1 caja"></div>
                        <div class="caja2 caja"></div>
                        <div class="caja3 caja"></div>
                        <div class="caja4 caja"></div>
                        <input type="submit" name="publicar_fin" id="submit" class="submit_siguiente" value="Publicar">
                    </div>
                </div>
            </form>
        </div>
        <!-- Incluimos el footer -->
        <?php include "inc/footer.php"; ?>
    </body>
</html>