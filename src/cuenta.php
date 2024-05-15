<?php require_once "./inc/sesiones.php"; ?>
<?php require_once "./bbdd/datos-usuario.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi cuenta</title>
    <link rel="stylesheet" href="css/botones.css">
    <link rel="stylesheet" href="css/cuenta.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="shortcut icon" href="./img/icon-logo.png">
    <script src="./js/cuenta.js"></script>
        
    <script src="https://kit.fontawesome.com/390edf9e42.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&family=Permanent+Marker&display=swap" rel="stylesheet">
    
    <?php
        // Mensaje que se muestra dependiendo de que datos se hayan modificado
        $mensaje = "";

        // Dependiendo del formulario con el que se ineractúe se envía un dato diferente
        if (isset($_POST['sub-personales'])) {
            $mensaje = cambiar_dato($dato = "personales", $MyBBDD);
            echo "<style>h4{display: block;}</style>";
        }elseif (isset($_POST['sub-digitales'])) {
            $mensaje = cambiar_dato($dato = "digitales", $MyBBDD);
            echo "<style>h4{display: block;}</style>";
        }elseif (isset($_POST['sub-pregunta'])) {
            $mensaje = cambiar_dato($dato = "pregunta", $MyBBDD);
            echo "<style>h4{display: block;}</style>";
        }
    ?>
</head>
<body>
    <?php  //Si el usuario no está registrado, se le redirige a index.
    if (!isset($_SESSION["DC"])) {
        header('Location: ./index.php');
    }
    include "./inc/header.php";// Incluimos el header 
    ?>
    <main>
        <div id="foto-perfil">
            <h2>Datos de usuario:</h2>
            <form action="inc/sesiones.php" method="post" enctype="multipart/form-data">
                <div id="imagen-contenedor">
                    <?php 
                        //Obtenemos la ruta de la foto de perfil del usuario para mostrarla
                        $consulta = "SELECT * FROM usuario WHERE id = " . $_SESSION['DC']['id'] . ";";
                        $res = mysqli_query($MyBBDD->descriptor, $consulta);
                        $fila = mysqli_fetch_array($res);
                        $carpeta = "./img-users/carpeta" . $fila['id'];
                        if(file_exists($carpeta)){
                            //Si existe la carpeta del usuario mostramos la imagen con la ruta obtenida en la consulta.
                            echo '<div class="foto_user"><img id="imagen" src="'.$fila['path_img_profile'].'"></div>';
                        }else{
                            //De lo contrario, mostramos una imagen predeterminada.
                            echo'<div class="foto_user foto_user_vacia"><img id="imagen" src="./img-users/foto-perfil-predeterminada.jpg"></div>';
                        }
                    ?>
                </div>
                <div class="todo_siguiente todo_siguiente_especial">
                <input type="file" id="imagen-publicacion" name="imagen" value="Agregar foto de perfil" class="imagen-publicacion" required><br>
                    <div class="centrar">
                        <div class="cont">
                            <div class="siguiente siguiente_esp">
                                <!--Botón para guardar la nueva foto que suba el usuario-->
                                <input type="submit" name="guardar_foto" id="submit" class="submit_siguiente" value="Guardar foto de perfil">
                            </div>
            </form>
            <form action="inc/sesiones.php" method="post" enctype="multipart/form-data" class="formulario2">
                            <div class="siguiente siguiente_esp">
                                <!--Botón para eliminar la foto de perfil-->
                                <input type="submit" name="eliminar_foto" id="submit" class="submit_siguiente" value="Eliminar foto de perfil">
                            </div>
                        </div>
                    </div>
                </div>
                <script src="js/cuenta.js"></script>
            </form>
        </div>
        <!--Cuando se pulsa cualquiera de los botones de editar datos, se muestran unos divs para poder editarlos.-->
        <div id="informacion-usuario">
            <div id="botones">
                <button id="btn-personal" onclick="vista_datos(event)">Información personal</button>
                <button id="btn-digital" onclick="vista_datos(event)">Información digital</button>
                <button id="btn-pregunta" onclick="vista_datos(event)">Pregunta de seguridad</button>
            </div>
            <div id="div-datos">
                <!--Se muestran los datos del usuario en diferentes secciones.-->
                <div class="datos" id="datos-personales">
                    <h3><b>Nombre:</b> <?php echo $_SESSION["DC"]["name"]?></h3>
                    <h3><b>Apellidos:</b> <?php echo $_SESSION["DC"]["surname"]?></h3>
                    <h3><b>Fecha de nacimiento:</b> <?php echo $_SESSION["DC"]["birth"]?></h3>
                    <div class="todo_siguiente">
                        <div class="siguiente">
                            <div class="caja1 caja"></div>
                            <div class="caja2 caja"></div>
                            <div class="caja3 caja"></div>
                            <div class="caja4 caja"></div>
                            <button id="btn-Epersonal" onclick="editar(event)">Editar datos</button>
                        </div>
                    </div>
                </div>
                <div class="datos" id="datos-digitales">
                    <h3><b>Usuario:</b> @<?php echo $_SESSION["DC"]["user_name"]?></h3>
                    <h3><b>Nº de teléfono:</b> <?php echo $_SESSION["DC"]["phone"]?></h3>
                    <h3><b>Correo:</b> <?php echo $_SESSION["DC"]["email"]?></h3>
                    <h3><b>Contraseña:</b> <?php echo $_SESSION["DC"]["password"]?></h3>
                    <div class="todo_siguiente">
                        <div class="siguiente">
                            <div class="caja1 caja"></div>
                            <div class="caja2 caja"></div>
                            <div class="caja3 caja"></div>
                            <div class="caja4 caja"></div>
                            <button id="btn-Edigital" onclick="editar(event)">Editar datos</button>
                        </div>
                    </div>
                </div>
                <div class="datos" id="datos-pregunta">
                    <h3><b>Pregunta para recuperar contraseña:</b><br> <div class="pass_question"><?php echo $_SESSION["DC"]["pass_question"]?></div></h3>
                    <h3><b>Respuesta:</b> <?php echo $_SESSION["DC"]["pass_answer"]?></h3>
                    <div class="todo_siguiente">
                        <div class="siguiente">
                            <div class="caja1 caja"></div>
                            <div class="caja2 caja"></div>
                            <div class="caja3 caja"></div>
                            <div class="caja4 caja"></div>
                            <button id="btn-Epregunta" onclick="editar(event)">Editar datos</button>
                        </div>
                    </div>
                </div>
                
                <h4 id="mensaje"><?php echo $mensaje;?></h4>
            </div>
        </div>
        <div id="capa" onclick="ocultarCapa(event)">
            <div id="modificar">
                <!--Se muestran los datos a editar por usuario.-->
                <div class="modificar-datos" id="modificar-personales">
                    <form action="#" method="post">
                        <h3>Nombre: </h3>
                        <input type="text" value="<?php echo $_SESSION["DC"]["name"]?>" name="mod-name" required class="texto">
                        <h3>Apellidos: </h3>
                        <input type="text" value="<?php echo $_SESSION["DC"]["surname"]?>" name="mod-surname" required class="texto">
                        <h3>Fecha de nacimiento: </h3>
                        <input type="date" value="<?php echo $_SESSION["DC"]["birth"]?>" name="mod-birth" required class="texto">
                        <div class="todo_siguiente">
                            <div class="siguiente">
                                <div class="caja1 caja"></div>
                                <div class="caja2 caja"></div>
                                <div class="caja3 caja"></div>
                                <div class="caja4 caja"></div>
                                <input type="submit" value="Guardar cambios" name="sub-personales" class="submit_siguiente">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modificar-datos" id="modificar-digitales">
                    <form action="#" method="post">
                        <h3>Usuario: </h3>
                        <input type="text" value="<?php echo $_SESSION["DC"]["user_name"]?>" name="mod-user_name" required class="texto">
                        <h3>Nº de teléfono: </h3>
                        <input type="number" value="<?php echo $_SESSION["DC"]["phone"]?>" name="mod-phone" required class="texto">
                        <h3>Correo: </h3>
                        <input type="email" value="<?php echo $_SESSION["DC"]["email"]?>" name="mod-email" required class="texto">
                        <h3>Contraseña: </h3>
                        <input type="text" value="<?php echo $_SESSION["DC"]["password"]?>" name="mod-password" required class="texto">
                        <div class="todo_siguiente">
                            <div class="siguiente">
                                <div class="caja1 caja"></div>
                                <div class="caja2 caja"></div>
                                <div class="caja3 caja"></div>
                                <div class="caja4 caja"></div>
                                <input type="submit" value="Guardar cambios" name="sub-digitales" class="submit_siguiente">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modificar-datos" id="modificar-pregunta">
                    <form action="#" method="post">
                        <h3>Pregunta de seguridad: </h3>
                        <select id="pass_question" required name="mod-question" class="texto">
                            <option value="<?php echo $_SESSION["DC"]["pass_question"]?>" selected="true">Actual: <?php echo $_SESSION["DC"]["pass_question"]?></option>
                            <option value="¿Cuál es el nombre de tu primera mascota?">¿Cuál es el nombre de tu primera mascota?</option>
                            <option value="¿Cuál es el segundo apellido de tu madre?">¿Cuál es el segundo apellido de tu madre?</option>
                            <option value="¿Cómo se llama la escuela en la que estudiaste?">¿Cómo se llama la escuela en la que estudiaste?</option>
                            <option value="¿Cuál es tu comida favorita?">¿Cuál es tu comida favorita?</option>
                        </select>
                        <h3>Respuesta: </h3>
                        <input type="text" value="<?php echo $_SESSION["DC"]["pass_answer"]?>" name="mod-answer" required class="texto">
                        <div class="todo_siguiente">
                            <div class="siguiente">
                                <div class="caja1 caja"></div>
                                <div class="caja2 caja"></div>
                                <div class="caja3 caja"></div>
                                <div class="caja4 caja"></div>
                                <input type="submit" value="Guardar cambios" name="sub-pregunta" class="submit_siguiente">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include "./inc/footer.php"; ?><!-- Incluimos el footer -->
</body>
</html>