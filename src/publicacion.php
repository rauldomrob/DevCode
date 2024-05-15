<?php 
    require "./inc/sesiones.php"; // Archivo con funciones relacionadas a sesiones de usuario
    //Cuando se pulsa una publicación, obtenemos los datos procedentes de los inputs ocultos y los almacenamos en la sesión.
    if(isset($_POST['mi_submit'])){
        $_SESSION['DC']['user_namee'] = $_POST['user_name'];
        $_SESSION['DC']['namee'] = $_POST['name'];
        $_SESSION['DC']['textt'] = $_POST['text'];
        $_SESSION['DC']['path_imagee'] = $_POST['path_image'];
        $_SESSION['DC']['user_imgg'] = $_POST['user_img'];
        $_SESSION['DC']['id_user'] = $_POST['id_user'];
        $_SESSION['DC']['fecha_horaa'] = $_POST['fecha_hora'];
        $_SESSION['DC']['id_feedd'] = $_POST['id_feed'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizando publicación | DevCode</title>
    <link rel="stylesheet" href="css/publicacion.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="shortcut icon" href="./img/icon-logo.png">
    <script src="https://kit.fontawesome.com/390edf9e42.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="volver"><a href="destacados.php"><i class="fa-solid fa-circle-arrow-left" style="color: #defcdd;"></i></a></div>
    <div class="todo">
        <div class="contenedor">
            <?php
            //Mostramos los detalles de la publicación.
                echo '<div>
                    <div class="parteDeArriba">
                        <div class="fotoYNombre">';
                            $carpeta = "./img-users/carpeta" . $_SESSION['DC']['id_user'];
                            if(file_exists($carpeta)){
                                //Si el usuario tiene foto de perfil se muestra, de lo contrario se muestra una por defecto.
                                echo '<div class="foto_user"><img src="'.$_SESSION['DC']['user_imgg'].'"></div>';
                            }else{
                                echo'<div class="foto_user"><img src="./img-users/foto-perfil-predeterminada.jpg"></div>';
                            }
                        echo'<div class="nombre">@' . $_SESSION['DC']["user_namee"] . '</div>
                        </div>
                        <div class="tema">' . $_SESSION['DC']["namee"] . '</div>
                    </div>
                    <div class="max_contenido">
                        <div class="contenido">
                            '.$_SESSION['DC']["textt"].'
                        </div>
                    </div>
                    <div class="foto_publicacion"><img src="' . $_SESSION['DC']["path_imagee"] . '"></div>
                    <div class="fechaYHora">' . $_SESSION['DC']["fecha_horaa"] . '</div>
                </div>';
            ?>
         </div>
         <?php
         //Se muestran los inputs para filtrar los comentarios y crear nuevos comentarios.
         echo '<div class="todo_comentarios">
                        <div class="anadir_comentario">
                            <form method="post" enctype="multipart/form-data" class="form_inputs_comentario_nuevo">
                                <div class="inputs_comentario_nuevo">
                                    <textarea class="nuevo_comentario" id="nuevo_comentario" name="nuevo_comentario" placeholder="Añadir comentario" required></textarea>
                                    <input type="submit" class="comentar" name="comentar" value="Comentar">
                                </div>
                            </form>
                            <form method="post">
                                <div class="ordenar">
                                    <button type="submit" name="orden" value="ASC">Más antiguo primero</button>
                                    <button type="submit" name="orden" value="DESC">Más reciente primero</button>
                                </div>
                            </form>
                        </div>
                        <div class="mostrar_comentarios">';
                        
                        $orden = "ASC";
                        if (isset($_POST['orden']) && ($_POST['orden'] == "ASC" || $_POST['orden'] == "DESC")){
                            $orden = $_POST['orden'];
                        }
                        //Obtengo todos los comentarios de la publicación en el orden seleccionado o en su defecto los más antiguos primero.
                        $consulta = "SELECT * FROM threads WHERE id_feed = '" . $_SESSION['DC']["id_feedd"] . "' ORDER BY id " . $orden;
                        $res = mysqli_query($MyBBDD->descriptor, $consulta);

                        // Imprimo todos los comentarios de la publicación.
                        echo '<div class="comentarios">';
                        while ($fila = mysqli_fetch_assoc($res)) {
                            $id_user = $fila['id_user'];
                            /*Hago una consulta para obtener el nombre del usuario que ha publicado el comentario.*/
                            $consultaNombreUsuario = "SELECT user_name FROM usuario WHERE id = '" . $id_user . "'";
                            $resultadoNombreUsuario = mysqli_query($MyBBDD->descriptor, $consultaNombreUsuario);
                            $nombre_usuario = mysqli_fetch_assoc($resultadoNombreUsuario);

                            // Imprimir los detalles del comentario solo si tiene texto.
                            if($fila['text'] != ''){
                                echo '<div class="comentario">
                                    <div class="nombre_usuario">@'.$nombre_usuario['user_name'].'</div>
                                    <div class="texto_comentario">'.$fila['text'].'</div>
                                </div>';
                            }
                        }

                    echo '</div>
                    </div>
                </div>';
            ?>
    </div>
    <?php include "./inc/footer.php"; ?> <!-- Incluimos el footer -->
</body>
</html>