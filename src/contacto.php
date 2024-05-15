<?php include_once "./inc/sesiones.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto | DevCode</title>
    <script src="https://kit.fontawesome.com/390edf9e42.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/contacto.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="./img/icon-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&family=Permanent+Marker&display=swap" rel="stylesheet">
</head>
<body>
    <?php include "inc/header.php";?>
    <div class="todo_soporte">
        <div class="preguntas"> 
            <div>
                <div class="divBoton">
                <div class="div1"><div class="texto texto1">¿Cómo puedo comenzar a utilizar el foro?</div><button onclick="mostrarOcultarDiv('divOculto1', 'divMov1'); girar('flechita1', 'flechita2', 'flechita3', 'flechita4', 'flechita5', 'flechita6');"><img id="flechita1" src="./img/arrow2.png"></button></div>
                </div>
                <div class="divOculto" id="divOculto1">Para comenzar, deberás registrarte. Una vez registrado, puedes iniciar sesión, personalizar tu perfil y empezar a participar en las comunidades.</div>
            </div>
            <div>
                <div class="divBoton">
                <div><div class="texto">¿Cómo puedo reportar un problema o bug en el foro?</div><button onclick="mostrarOcultarDiv('divOculto2', 'divMov2'); girar('flechita2', 'flechita3', 'flechita4', 'flechita5', 'flechita6', 'flechita1');"><img id="flechita2" src="./img/arrow2.png"></button></div>
                </div>
                <div class="divOculto" id="divOculto2">Si encuentras un problema o bug, por favor repórtalo utilizando nuestro formulario de contacto, proporciona una descripción detallada para que nuestro equipo técnico pueda investigarlo.</div>
            </div>
            <div>
                <div class="divBoton">
                <div><div class="texto">¿Cómo puedo contribuir al foro y a la comunidad?</div><button onclick="mostrarOcultarDiv('divOculto3', 'divMov3'); girar('flechita3', 'flechita4', 'flechita5', 'flechita6', 'flechita1', 'flechita2');"><img id="flechita3" src="./img/arrow2.png"></button></div>
                </div>
                <div class="divOculto" id="divOculto3">Puedes contribuir participando activamente en discusiones, compartiendo tus conocimientos, respondiendo preguntas de otros usuarios y creando contenido útil.</div>
            </div>
            <div>
                <div class="divBoton">
                <div><div class="texto">¿Cuál es la política de privacidad del foro y cómo se protegen mis datos?</div><button onclick="mostrarOcultarDiv('divOculto4', 'divMov4'); girar('flechita4', 'flechita5', 'flechita6', 'flechita1', 'flechita2', 'flechita3');"><img id="flechita4" src="./img/arrow2.png"></button></div>
                </div>
                <div class="divOculto" id="divOculto4">La privacidad y seguridad de tus datos son una prioridad. Podrás revisar nuestra política de privacidad siempre que desees o puedes preguntaernos por ella.</div>
            </div>
            <div>
                <div class="divBoton">
                <div><div class="texto">¿Qué lenguajes de programación son soportados por la comunidad?</div><button onclick="mostrarOcultarDiv('divOculto5', 'divMov5'); girar('flechita5', 'flechita6', 'flechita1', 'flechita2', 'flechita3', 'flechita4');"><img id="flechita5" src="./img/arrow2.png"></button></div>
                </div>
                <div class="divOculto" id="divOculto5">Nuestra comunidad es diversa y soporta una amplia gama de lenguajes de programación, incluyendo Java, Python, C++, JavaScript, entre otros.</div>
            </div>
            <div>
                <div class="divBoton">
                    <div class="div6"><div class="texto texto6">¿Qué normas debo seguir al participar en el foro?</div><button onclick="mostrarOcultarDiv('divOculto6', 'divMov6'); girar('flechita6', 'flechita1', 'flechita2', 'flechita3', 'flechita4', 'flechita5');"><img id="flechita6" src="./img/arrow2.png"></button></div>
                </div>
                <div class="divOculto" id="divOculto6">Es importante seguir las reglas de la comunidad, que incluyen respetar a los demás usuarios, no publicar spam y mantener un lenguaje adecuado.</div>
            </div>
            <script src="soporte.js"></script>
        </div>
        <div class="contacto_solicitar">
            <div class="contacto">
                <div class="tit">Mejoras o sugerencias</div>
                <div class="form1">
                <!-- El formulario nos redirige a "sesiones.php" para realizar las consultas de sugerencias con php -->
                    <form action="./inc/sesiones.php" method="post" enctype="multipart/form-data">
                        <div class="subtit">
                            <input class="input_asunto" type="text" name="asunto1" required maxlength="30" autocomplete="off">
                            <label class="asunto">Asunto:</label>
                        </div>
                        <div class="textarea"><textarea id="miTextarea" name="miTexto1" rows="4" cols="50" placeholder="Explica tus ideas de mejora o sugerencias aquí" autocomplete="off" required maxlength="250"></textarea></div>
                        <div class="iniciar">
                            <div class="caja1 caja"></div>
                            <div class="caja2 caja"></div>
                            <div class="caja3 caja"></div>
                            <div class="caja4 caja"></div>
                            <input type="submit" value="Enviar" name="enviar_form1" class="submit_iniciar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Incluimos el footer -->
    <?php include "inc/footer.php"; ?>
    <!-- script de contacto -->
    <script src="./js/contacto.js"></script>
</body>
</html>