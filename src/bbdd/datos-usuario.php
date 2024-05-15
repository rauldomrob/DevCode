<?php 
// Incluimos los archivos necesarios
include "bbdd.php"; // Archivo con la clase BBDD para la conexión con la base de datos
include_once "./inc/sesiones.php"; // Archivo con funciones relacionadas a sesiones de usuario

    // Función para registrar un nuevo usuario en la base de datos
    function registrar_usuario($MyBBDD){
        // Consultas para verificar si el correo electrónico o el nombre de usuario ya existen
        $consulta = "SELECT * FROM usuario WHERE email = '".$_POST['reg-email']."';";
        $consulta2 = "SELECT * FROM usuario WHERE user_name = '".$_POST['reg-user']."';";

        $MyBBDD->consulta($consulta);
        $filas = $MyBBDD->numero_filas();
        $MyBBDD->consulta($consulta2);
        $filas2 = $MyBBDD->numero_filas();
        $filas_tot = $filas + $filas2;

        // Comprobamos y gestionamos los resultados de las consultas
        if ($filas_tot > 0) {
            if($filas > 0 && $filas2 > 0){
                return -2; // El correo electrónico y el nombre de usuario ya existen
            }else{
                if($filas >0){
                    return 0; // El correo electrónico ya existe
                }else{
                    return -1; // El nombre de usuario ya existe
                }
            } 
        }else{
             // Insertamos un nuevo usuario si no hay coincidencias en las consultas anteriores
            $consulta = "INSERT INTO
            usuario 
            VALUES (NULL, '".$_POST['reg-name']."', '".$_POST['reg-surnames']."', '".$_POST['reg-user']."', '".$_POST['reg-password']."', '".$_POST['reg-email']."',
            '".$_POST['reg-phone']."', '".$_POST['reg-birth']."', '".$_POST['reg-pass_question']."', '".$_POST['reg-pass_answer']."', '0', '0', './img-users/foto-perfil-predeterminada.jpg')";

            $MyBBDD->consulta($consulta); 
            return 1; // Registro exitoso
        }
    }
    
    // Función para buscar un usuario en la base de datos al intentar iniciar sesión
    function buscar_usuario($MyBBDD){
        //Nos ayudará a controlar el error en caso de intento de SQL injection básica.
        try{
            $consulta = "SELECT * FROM usuario WHERE email = '".$_POST['log-email']."' AND password = '".$_POST['log-password']."';";
            $MyBBDD->consulta($consulta);
            if ($MyBBDD->numero_filas() > 0) {
                return true; // El usuario existe
            } else{
                return false; // El usuario no existe
            }
        } catch (Exception $e) {
            // Redirigir en caso de error
            header('Location: ../profile/login.php');
            exit;
        }
    }


    // Función para cambiar datos del usuario (personales, digitales y pregunta de seguridad)
    function cambiar_dato($dato, $MyBBDD){
        $mensaje = ""; // Variable para almacenar mensajes de éxito o error
        switch ($dato) {
            case "personales":
                // Actualizamos datos personales en la base de datos
                $MyBBDD->consulta("UPDATE usuario SET name = '".$_POST['mod-name']."', surname = '".$_POST['mod-surname']."', birth = '".$_POST['mod-birth']."' 
                WHERE id = '".$_SESSION['DC']['id']."';");
                $mensaje = "Datos personales actualizada con éxito";
                break;
            case "digitales":
                // Consultamos la base de datos para verificar si el nombre de usuario y el correo electrónico ya existen
                $MyBBDD->consulta("SELECT * FROM usuario WHERE user_name = '".$_POST['mod-user_name']."';");
                $registroUsuario = $MyBBDD->extraer_registro();
                $filasUsuario = $MyBBDD->numero_filas();

                $MyBBDD->consulta("SELECT * FROM usuario WHERE email = '".$_POST['mod-email']."';");
                $registroEmail = $MyBBDD->extraer_registro();
                $filasEmail = $MyBBDD->numero_filas();

                // Modificamos los datos si todo está disponible
                if (($filasUsuario == 0 and $filasEmail == 0)) {
                    $MyBBDD->consulta("UPDATE usuario SET user_name = '".$_POST['mod-user_name']."', email = '".$_POST['mod-email']."', password = '".$_POST['mod-password']."' 
                    , phone = '".$_POST['mod-phone']."' WHERE id = '".$_SESSION['DC']['id']."';");

                    $mensaje = "Datos digitales actualizados con éxito";
                }else if ($filasUsuario >= 1 and $filasEmail == 0) {
                    // Modificamos todos los datos menos el nombre de usuario
                    $MyBBDD->consulta("UPDATE usuario SET email = '".$_POST['mod-email']."', password = '".$_POST['mod-password']."' 
                    , phone = '".$_POST['mod-phone']."' WHERE id = '".$_SESSION['DC']['id']."';");

                    $mensaje = "El nombre de usuario no está disponible, el resto de datos se han actualizados con éxito";
                }else if ($filasUsuario == 0 and $filasEmail >= 1) {
                    //Modificamos todos los datos menos el email
                    $MyBBDD->consulta("UPDATE usuario SET user_name = '".$_POST['mod-user_name']."', password = '".$_POST['mod-password']."' 
                    , phone = '".$_POST['mod-phone']."' WHERE id = '".$_SESSION['DC']['id']."';");

                    $mensaje = "El email no está disponible, el resto de datos se han actualizados con éxito";
                }else{
                    //Else para cuando ambas filas sean >= 1
                    if ($registroUsuario['id'] == $_SESSION['DC']['id'] and $registroEmail['id'] == $_SESSION['DC']['id']) {
                        $MyBBDD->consulta("UPDATE usuario SET user_name = '".$_POST['mod-user_name']."', email = '".$_POST['mod-email']."', password = '".$_POST['mod-password']."' 
                        , phone = '".$_POST['mod-phone']."' WHERE id = '".$_SESSION['DC']['id']."';");
    
                        $mensaje = "Datos actualizados con éxito";
                    }else{
                        //Modificamos todos los datos menos el nombre de usuario y el email
                        $MyBBDD->consulta("UPDATE usuario SET password = '".$_POST['mod-password']."' , phone = '".$_POST['mod-phone']."' 
                        WHERE id = '".$_SESSION['DC']['id']."';");
                        $mensaje = "El nombre de usuario y email no están disponibles, el resto de datos se han actualizados con éxito";
                    }
                }

                break;
            case "pregunta":
                // Actualizamos la pregunta de seguridad y la respuesta en la base de datos
                $MyBBDD->consulta("UPDATE usuario SET pass_question = '".$_POST['mod-question']."', pass_answer = '".$_POST['mod-answer']."'
                WHERE id = '".$_SESSION['DC']['id']."';");
                $mensaje = "Pregunta de seguridad actualizada con éxito";
                break;
            default:
                $mensaje = "Ha ocurrido un error";
                break;
        }
        // Actualizamos la sesión con los nuevos datos del usuario
        $MyBBDD->consulta("SELECT * FROM usuario WHERE  id = '".$_SESSION['DC']['id']."';");
        actualizar_sesion($MyBBDD);
        return $mensaje;
    }

    // Función para enviar una sugerencia a la base de datos
    function sugerencia($MyBBDD){
        $consulta = "INSERT INTO sugerencias 
            VALUES (NULL, '".$_POST['asunto1']."', '".$_POST['miTexto1']."')";

            $MyBBDD->consulta($consulta); 
            return true;
    }  

    // Función para publicar una nueva publicación
    function publicar($MyBBDD, $ruta_completa, $id){
        $ruta_completa = substr($ruta_completa, 1);
        // Obtenemos la fecha y la hora
        $fechaHoraActual = date('Y-m-d H:i:s');
        // Consulta para insertar la nueva publicación en la tabla de feed
        $consulta = "INSERT INTO feed 
            VALUES (NULL, '".$_POST['tematicas']."', '".$ruta_completa."', '".$_POST['contenido']."', '0', '".$id."', '".$fechaHoraActual."')";
            $MyBBDD->consulta($consulta); 
            return true;
    }
    
    // Función para agregar un nuevo comentario a una publicación
    function comentar($MyBBDD){
        $nuevo_comentario = $_POST['nuevo_comentario'];
        // Consulta para insertar el nuevo comentario en la tabla de threads
        $consulta = "INSERT INTO threads VALUES (NULL, '".$nuevo_comentario."', '".$_SESSION['DC']['id_feedd']."', '".$_SESSION['DC']['id']."')";
        $MyBBDD->consulta($consulta); 
        if($consulta){
            return true;
        }
        return false;
    }

    // Función para guardar una nueva foto de perfil
    function guardarFoto($MyBBDD, $ruta_completa, $id){
        // Eliminación del punto inicial de de la ruta para que esta se guarde de manera correcta y así poder ser utilizada más adelante
        $ruta_completa = substr($ruta_completa, 1);
        // Actualización de la ruta de la foto de perfil
        $consulta = "UPDATE usuario SET path_img_profile = '$ruta_completa' WHERE id = $id";
        $MyBBDD->consulta($consulta);
        if($consulta){
            return true;
        }
        return false;
    }

    // Función para eliminar la foto de perfil
    function eliminarFoto($MyBBDD, $id){
        // Eliminación de la ruta de la foto de perfil
        $consulta = "UPDATE usuario SET path_img_profile = '' WHERE id = $id";
        $MyBBDD->consulta($consulta);
        if($consulta){
            return true;
        }
        return false;
    }
?>