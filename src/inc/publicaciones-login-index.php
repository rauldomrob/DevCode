<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="./css/publicaciones-login-index.css">
        <script>
            /*Se establece un máximo de 95 caracteres a mostrar por publicación visible*/
            document.addEventListener("DOMContentLoaded", function() {
            var elementos = document.getElementsByClassName("contenido");
            Array.from(elementos).forEach(function(elemento) {
                var texto = elemento.innerText;
                if (texto.length > 95) {
                    texto = texto.substring(0, 95) + "...";
                    elemento.innerText = texto;
                }
            });
        });

        </script>
    </head>
    <body>
    <h2 class="ult">Últimas publicaciones</h2>
        <div id="publicaciones">
            <?php
            if (isset($_POST["search"])) {
                $dato = $_POST["search"];
                /*Si el usuario pulsa ENTER para buscar alguna letra o palabra, realizamos una consulta a la base de datos*/
                $consulta = "
                    SELECT name FROM feed WHERE name LIKE '%$dato%' DESC LIMIT 10
                    UNION 
                    SELECT text FROM feed WHERE text LIKE '%$dato%' DESC LIMIT 10;";
                $res = mysqli_query($MyBBDD->descriptor, $consulta);

                /*Mostramos las publicaciones de 10 en 10 para la paginación*/
                $consulta = "SELECT * FROM feed ORDER BY id DESC LIMIT 10";
                $res = mysqli_query($MyBBDD->descriptor, $consulta);
                $count = 0;
                while ($fila = mysqli_fetch_array($res)) {
                    /*Mostramos en dos columnas diferentes las publicaciones.*/
                    //A la quinta publicación se cambia de columna
                    if ($count % 5 == 0) {
                        if ($count > 0) { // Cierra el div anterior si no es el primero
                            echo '</div>';
                        } else {
                            echo '';
                        }
                        echo '<div class="columna">'; // Inicia un nuevo div para cada columna
                    }
                    //Obtenemos los datos del usuario 
                    $MyBBDD->consulta("SELECT * FROM usuario WHERE id = ".$fila['id_user'].";");
                    $filaUsuario = $MyBBDD->extraer_registro();
                    //Mostramos los detalles de cada publicación y creamos inputs ocultos para poder utilizar la información en la visualización completa.
                    echo '<form method="post" action="./publicacion.php" enctype="multipart/form-data">
                            <input type="hidden" value="'.$filaUsuario['user_name'].'" name="user_name">
                            <input type="hidden" value="'.$filaUsuario['path_img_profile'].'" name="user_img">
                            <input type="hidden" value="'.$fila['name'].'" name="name">
                            <input type="hidden" value="'.$fila['text'].'" name="text">
                            <input type="hidden" value="'.$fila['fecha_hora'].'" name="fecha_hora">
                            <input type="hidden" value="'.$fila['path_image'].'" name="path_image">
                            <input type="hidden" value="'.$fila['id'].'" name="id_feed">
                            <div class="publicacion" style="cursor:pointer;">
                                <button type="submit" class="mi_submit" name="mi_submit" id="mi_submit">
                                    <div class="cosas_usuario">
                                        <div class="cosas_usuario_">';
                                        $carpeta = "./img-users/carpeta" . $filaUsuario['id'];
                                        if(file_exists($carpeta)){
                                            //Si el usuario tiene foto de perfil se muestra, de lo contrario se muestra una por defecto.
                                            echo '<div class="foto_user"><img src="'.$filaUsuario['path_img_profile'].'"></div>';
                                        }else{
                                            echo'<div class="foto_user"><img src="./img-users/foto-perfil-predeterminada.jpg"></div>';
                                        }
                                        echo'<div class="user_name">'.$filaUsuario['user_name'].'</div>
                                        </div>
                                        <div class="tematica">'.$fila['name'].'</div>
                                    </div>
                                    <div class="contenido">'.$fila['text'].'</div>
                                    <div class="fecha">'.$fila['fecha_hora'].'</div>
                                </button>
                                <div class="likesYcomment">
                                    <input type="hidden" value="'.$fila['id_user'].'" name="id_usuario">
                                    <input type="hidden" value="'.$fila['id'].'" name="id_feed">
                                    <button type="submit" class="mi_submit3" name="mi_submit" id="comentar">
                                        <div class="comentario"><i class="fa-regular fa-comment"></i></div>
                                    </button>
                            </form>
                                </div>
                            </div>';

                    $count++;
                }

            }else{
                /*Mostramos las publicaciones de 10 en 10 para la paginación*/
                $consulta = "SELECT * FROM feed ORDER BY id DESC LIMIT 10";
                $res = mysqli_query($MyBBDD->descriptor, $consulta);
                $count = 0;
                while ($fila = mysqli_fetch_array($res)) {
                    /*Mostramos en dos columnas diferentes las publicaciones.*/
                    //A la quinta publicación se cambia de columna
                    if ($count % 5 == 0) {
                        if ($count > 0) {
                            echo '</div>';
                        } else {
                            echo '';
                        }//Se cierra el div anterior si este no es el primero
                        echo '<div class="columna">'; // Inicia un nuevo div para cada columna
                    }
                    //Obtenemos los datos del usuario 
                    $MyBBDD->consulta("SELECT * FROM usuario WHERE id = ".$fila['id_user'].";");
                    $filaUsuario = $MyBBDD->extraer_registro();
                    //Mostramos los detalles de cada publicación y creamos inputs ocultos para poder utilizar la información en la visualización completa.
                    echo '<form method="post" action="./publicacion.php" enctype="multipart/form-data">
                            <input type="hidden" value="'.$filaUsuario['user_name'].'" name="user_name">
                            <input type="hidden" value="'.$filaUsuario['path_img_profile'].'" name="user_img">
                            <input type="hidden" value="'.$fila['name'].'" name="name">
                            <input type="hidden" value="'.$fila['id_user'].'" name="id_user">
                            <input type="hidden" value="'.$fila['text'].'" name="text">
                            <input type="hidden" value="'.$fila['fecha_hora'].'" name="fecha_hora">
                            <input type="hidden" value="'.$fila['path_image'].'" name="path_image">
                            <input type="hidden" value="'.$fila['id'].'" name="id_feed">
                            <div class="publicacion" style="cursor:pointer;">
                                <button type="submit" class="mi_submit" name="mi_submit" id="mi_submit">
                                    <div class="cosas_usuario">
                                        <div class="cosas_usuario_">';
                                        $carpeta = "./img-users/carpeta" . $filaUsuario['id'];
                                        if(file_exists($carpeta)){
                                            //Si el usuario tiene foto de perfil se muestra, de lo contrario se muestra una por defecto.
                                            echo '<div class="foto_user"><img src="'.$filaUsuario['path_img_profile'].'"></div>';
                                        }else{
                                            echo'<div class="foto_user"><img src="./img-users/foto-perfil-predeterminada.jpg"></div>';
                                        }
                                        echo '<div class="user_name">'.$filaUsuario['user_name'].'</div>
                                        </div>
                                        <div class="tematica">'.$fila['name'].'</div>
                                    </div>
                                    <div class="contenido">'.$fila['text'].'</div>
                                    <div class="fecha">'.$fila['fecha_hora'].'</div>
                                </button>
                                <div class="likesYcomment">
                                    <input type="hidden" value="'.$fila['id_user'].'" name="id_usuario">
                                    <input type="hidden" value="'.$fila['id'].'" name="id_feed">
                                    <button type="submit" class="mi_submit3" name="mi_submit" id="comentar">
                                        <div class="comentario"><i class="fa-regular fa-comment"></i></div>
                                    </button>
                            </form>
                                </div>
                            </div>';
                    $count++;
                }
                echo '</div>'; //Cierra el div columna
            }    
            ?>
        </div>
    </body>
</html>