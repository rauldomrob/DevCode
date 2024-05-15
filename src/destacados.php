<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feeds | DevCode</title>
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


        <?php require "./inc/sesiones.php" ?>
        <link rel="stylesheet" href="css/destacados.css">
        <script>
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
        <!-- Incluimos el header -->
        <?php include "./inc/header.php"; 
            // Si no hay una sesión activa nos redirige a la página de login
            if(!isset($_SESSION['DC'])){
                header('Location: ./profile/login.php');
            }
        ?>
        <main>
        <div id="portada">
            <img src="img\logo.png" alt="" srcset="" id="img-logo">
            <div id="texto-portada">
                <h1>DevCode</h1>
                <span>Conectando mentes!</span>
            </div>
        </div>
            <h2 class="ult">Feed</h2>
                <div id="publicaciones">
                    <?php
                        //Lógica de paginación
                        $publicacionesPorPagina = 10;
                        $mostrar = true;
                        $dato = "";
                        //Si no hay ningún valor de la página en la url nos encontramos en la primera página
                        if (isset($_GET['pagina'])) {
                            //Obtenemos la página actual
                            $paginaActual = (int)$_GET['pagina'];
                        } else {
                            $paginaActual = 1;
                        }
                        $indicePrimeraPublicacion = ($paginaActual - 1) * $publicacionesPorPagina;
                        //Si el usuario desea filtrar las publicaciones, buscaremos coincidencias en las publicaciones de la base de datos.
                        if (isset($_POST["search"])) {
                            $busqueda = true;
                            $dato = $_POST["search"];
                            //Vulnerable a SQL injection, corregir
                            $consulta = "
                                SELECT * FROM feed WHERE name LIKE '%$dato%'
                                UNION 
                                SELECT * FROM feed WHERE text LIKE '%$dato%' LIMIT $publicacionesPorPagina OFFSET $indicePrimeraPublicacion;";
                               
                            $res = mysqli_query($MyBBDD->descriptor, $consulta);
                            $count = 0;
                            //Si el numero de filas encontradas es mayor a 0 muestra las publicaciones filtradas, sino muestra un mensaje.
                            if (mysqli_num_rows($res) > 0) {
                                echo '<div class="columnas">';
                                while ($fila = mysqli_fetch_array($res)) {
                                    if ($count % 5 == 0) {
                                        if ($count > 0) {
                                            echo '</div>';
                                        } else {
                                            echo '';
                                        }// Cierra el div anterior si no es el primero
                                        echo '<div class="columna">'; // Inicia un nuevo div para cada columna.
                                    }
                                    //Obtenemos los datos del usuario 
                                    $MyBBDD->consulta("SELECT * FROM usuario WHERE id = ".$fila['id_user'].";");
                                    $filaUsuario = $MyBBDD->extraer_registro();
                                    //Mostramos los detalles de cada publicación y creamos inputs ocultos para poder utilizar la información en la visualización completa.
                                    echo '<form method="post" action="publicacion.php" enctype="multipart/form-data">
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
                                echo '</div></div>'; // Cierra el último div de columna
                            }else{
                                echo '<h3 class="no_hay">No se han encontrado coincidencias</h3>';
                                $mostrar = false;
                            }
                        }else{
                            $busqueda = false;
                            //Consulta ordenando por likes (no implementado), los likes se establecen de manera manual en la base de datos y solo sirven para que se mezclen las publicaciones.
                            //Se muestran de 10 en 10
                            $consulta = "SELECT * FROM feed ORDER BY likes DESC LIMIT $publicacionesPorPagina OFFSET $indicePrimeraPublicacion";
                            $res = mysqli_query($MyBBDD->descriptor, $consulta);
                            $count = 0;
                            echo '<div class="columnas">';
                            while ($fila = mysqli_fetch_array($res)) {
                                /*Mostramos en dos columnas diferentes las publicaciones.*/
                                //A la quinta publicación se cambia de columna
                                if ($count % 5 == 0) {
                                    if ($count > 0) { 
                                        echo '</div>';
                                    } else {
                                        echo '';
                                    }// Cierra el div anterior si no es el primero
                                    echo '<div class="columna">'; // Inicia un nuevo div para cada columna
                                }
                                //Obtenemos los datos del usuario 
                                $MyBBDD->consulta("SELECT * FROM usuario WHERE id = ".$fila['id_user'].";");
                                $filaUsuario = $MyBBDD->extraer_registro();
                                //Mostramos los detalles de cada publicación y creamos inputs ocultos para poder utilizar la información en la visualización completa.
                                echo '<form method="post" action="publicacion.php" enctype="multipart/form-data">
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
                            echo '</div></div>'; // Cierra el último div de columna
                        }
                        // Agregar enlaces de paginación
                        if($mostrar){
                            $consultaPaginacion = "";
                            //Para la paginación se tendrá en cuenta si el usuario ha realizado una búsqueda o no.
                            if($busqueda){
                                $consultaPaginacion = "SELECT COUNT(*) as total 
                                                    FROM (
                                                        SELECT * FROM feed WHERE name LIKE '%$dato%'
                                                        UNION 
                                                        SELECT * FROM feed WHERE text LIKE '%$dato%'
                                                    ) AS total";
                            }else{
                                //total almacena la cantidad de registros encontrados en la consulta.
                                $consultaPaginacion = "SELECT COUNT(*) as total FROM feed";
                            }
                            $resultadoPaginacion = mysqli_query($MyBBDD->descriptor, $consultaPaginacion);
                            $filaTotal = mysqli_fetch_assoc($resultadoPaginacion);
                            $totalRegistros = $filaTotal['total'];
                            $totalPaginas = ceil($totalRegistros / $publicacionesPorPagina);
                            //Se muestran los enlaces de la paginación.
                            echo '<div class="paginacion">';
                            for ($i = 1; $i <= $totalPaginas; $i++) {
                                echo "<a href='?pagina=".$i."'>".$i."</a> ";
                            }
                            echo '</div>';
                        }
                    ?>
            </div>
            <!-- Incluimos el menu derecho -->
            <?php include "./inc/menu-derecho.php";?>
        </main>
        <!-- Incluimos el footer -->
        <?php include "./inc/footer.php"; ?>
    </body>
</html>



        