<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="./css/publicaciones-no-login-index.css">
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

                    $MyBBDD->consulta("SELECT user_name FROM usuario WHERE id = ".$fila['id_user'].";");
                    $filaUsuario = $MyBBDD->extraer_registro();
                    //Mostramos los detalles de cada publicación. Si se pulsa cualquier publicación el usuario deberá iniciar sesión para visualizarla de manera completa.
                    echo '<div class="publicacion" onclick="window.location=\'profile/login.php\';" style="cursor:pointer;">
                            <div class="cosas_usuario">
                                <div class="cosas_usuario_">
                                    <div class="foto_user"><img src="./img-users/foto-perfil-predeterminada.jpg"></div>
                                    <div class="user_name">'.$filaUsuario['user_name'].'</div>
                                </div>
                                <div class="tematica">'.$fila['name'].'</div>
                            </div>
                            <div class="contenido">'.$fila['text'].'</div>
                            <div class="fecha">'.$fila['fecha_hora'].'</div>
                            <div class="likesYcomment">
                                <div class="comentario"><i class="fa-regular fa-comment"></i></div>
                            </div>
                        </div>';
                    $count++;
                }
                echo '</div>'; // Cierra el último div de columna
            ?>
        </div>
    </body>
</html>