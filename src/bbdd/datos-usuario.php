<?php 
// Incluimos los archivos necesarios
include "bbdd.php"; // Archivo con la clase BBDD para la conexión con la base de datos
include_once "./inc/sesiones.php"; // Archivo con funciones relacionadas a sesiones de usuario

    // Función para registrar un nuevo usuario en la base de datos
    function registrar_usuario($MyBBDD){    
        try {
            $stmt1 = $MyBBDD->prepare("SELECT * FROM usuario WHERE email = :reg_email");
            $stmt1->bindParam(':reg_email', $_POST['reg-email'], PDO::PARAM_STR);
            $stmt1->execute();
            $filas = $stmt1->rowCount();
        
            $stmt2 = $MyBBDD->prepare("SELECT * FROM usuario WHERE user_name = :reg_user");
            $stmt2->bindParam(':reg_user', $_POST['reg-user'], PDO::PARAM_STR);
            $stmt2->execute();
            $filas2 = $stmt2->rowCount();
        
            $filas_tot = $filas + $filas2;

            // Comprobamos y gestionamos los resultados de las consultas
            if ($filas_tot > 0) {
                if($filas > 0 && $filas2 > 0){
                    return -2; // El correo electrónico y el nombre de usuario ya existen
                }else{
                    if($filas > 0){
                        return 0; // El correo electrónico ya existe
                    }else{
                        return -1; // El nombre de usuario ya existe
                    }
                } 
            }else{
                // Insertamos un nuevo usuario si no hay coincidencias en las consultas anteriores
                $reg_name = filter_var($_POST['reg-name'], FILTER_SANITIZE_STRING);
                $reg_surnames = filter_var($_POST['reg-surnames'], FILTER_SANITIZE_STRING);
                $reg_user = filter_var($_POST['reg-user'], FILTER_SANITIZE_STRING);
                $reg_password = filter_var($_POST['reg-password'], FILTER_SANITIZE_STRING);
                $reg_email = filter_var($_POST['reg-email'], FILTER_VALIDATE_EMAIL);
                $reg_phone = filter_var($_POST['reg-phone'], FILTER_SANITIZE_STRING);
                $reg_birth = filter_var($_POST['reg-birth'], FILTER_SANITIZE_STRING);
                $reg_pass_question = filter_var($_POST['reg-pass_question'], FILTER_SANITIZE_STRING);
                $reg_pass_answer = filter_var($_POST['reg-pass_answer'], FILTER_SANITIZE_STRING);

                if ($reg_email === false) {
                    return 0;
                }

                $stmt = $MyBBDD->prepare("INSERT INTO usuario VALUES (NULL, :reg_name, :reg_surnames, :reg_user, :reg_password, :reg_email, :reg_phone, :reg_birth, :reg_pass_question, :reg_pass_answer, '0', '0', './img-users/foto-perfil-predeterminada.jpg')");

                $stmt->bindParam(':reg_name', $reg_name, PDO::PARAM_STR);
                $stmt->bindParam(':reg_surnames', $reg_surnames, PDO::PARAM_STR);
                $stmt->bindParam(':reg_user', $reg_user, PDO::PARAM_STR);
                $stmt->bindParam(':reg_password', $reg_password, PDO::PARAM_STR);
                $stmt->bindParam(':reg_email', $reg_email, PDO::PARAM_STR);
                $stmt->bindParam(':reg_phone', $reg_phone, PDO::PARAM_STR);
                $stmt->bindParam(':reg_birth', $reg_birth, PDO::PARAM_STR);
                $stmt->bindParam(':reg_pass_question', $reg_pass_question, PDO::PARAM_STR);
                $stmt->bindParam(':reg_pass_answer', $reg_pass_answer, PDO::PARAM_STR);

                $stmt->execute();
                return 1; // Registro exitoso
            }
        } catch (Exception $e) {
            // Redirigir en caso de error
            header('Location: ../profile/login.php');
            exit;
        }
    }
    
    // Función para buscar un usuario en la base de datos al intentar iniciar sesión
    function buscar_usuario($MyBBDD){
        try{
            $stmt = $MyBBDD->prepare("SELECT * FROM usuario WHERE email = :log_email AND password = :log_password");
            
            $log_email = filter_var($_POST['log-email'], FILTER_VALIDATE_EMAIL);
            $log_password = filter_var($_POST['log-password'], FILTER_SANITIZE_STRING);

            // Verificar que el email sea válido
            if ($log_email === false) {
                header('Location: ../profile/login.php');
                exit;
            }

            $stmt->bindParam(':log_email', $log_email, PDO::PARAM_STR);
            $stmt->bindParam(':log_password', $log_password, PDO::PARAM_STR);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true; // El usuario existe
            } else {
                return false; // El usuario no existe
            }
        } catch (Exception $e) {
            // Redirigir en caso de error
            header('Location: ../profile/login.php');
            exit;
        }
    }


    // Función para cambiar datos del usuario (personales, digitales y pregunta de seguridad)
function cambiar_dato($dato, $MyBBDD) {
    $mensaje = ""; // Variable para almacenar mensajes de éxito o error
    $id = $_SESSION['DC']['id'];

    switch ($dato) {
        case "personales":
            // Sanitizar las entradas del usuario
            $name = filter_var($_POST['mod-name'], FILTER_SANITIZE_STRING);
            $surname = filter_var($_POST['mod-surname'], FILTER_SANITIZE_STRING);
            $birth = filter_var($_POST['mod-birth'], FILTER_SANITIZE_STRING);

            // Actualizamos datos personales en la base de datos
            $stmt = $MyBBDD->prepare("UPDATE usuario SET name = :name, surname = :surname, birth = :birth WHERE id = :id");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
            $stmt->bindParam(':birth', $birth, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $mensaje = "Datos personales actualizados con éxito";
            break;

        case "digitales":
            // Sanitizar las entradas del usuario
            $user_name = filter_var($_POST['mod-user_name'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['mod-email'], FILTER_VALIDATE_EMAIL);
            $password = filter_var($_POST['mod-password'], FILTER_SANITIZE_STRING);
            $phone = filter_var($_POST['mod-phone'], FILTER_SANITIZE_STRING);

            if ($email === false) {
                $mensaje = "Email inválido";
                break;
            }

            // Consultamos la base de datos para verificar si el nombre de usuario y el correo electrónico ya existen
            $stmt = $MyBBDD->prepare("SELECT id FROM usuario WHERE user_name = :user_name OR email = :email");
            $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $user_name_exists = false;
            $email_exists = false;
            foreach ($results as $result) {
                if ($result['id'] != $id) {
                    if ($result['user_name'] == $user_name) {
                        $user_name_exists = true;
                    }
                    if ($result['email'] == $email) {
                        $email_exists = true;
                    }
                }
            }

            // Modificamos los datos según la disponibilidad
            if (!$user_name_exists && !$email_exists) {
                $stmt = $MyBBDD->prepare("UPDATE usuario SET user_name = :user_name, email = :email, password = :password, phone = :phone WHERE id = :id");
                $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $mensaje = "Datos digitales actualizados con éxito";
            } elseif ($user_name_exists && !$email_exists) {
                $stmt = $MyBBDD->prepare("UPDATE usuario SET email = :email, password = :password, phone = :phone WHERE id = :id");
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $mensaje = "El nombre de usuario no está disponible, el resto de datos se han actualizado con éxito";
            } elseif (!$user_name_exists && $email_exists) {
                $stmt = $MyBBDD->prepare("UPDATE usuario SET user_name = :user_name, password = :password, phone = :phone WHERE id = :id");
                $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $mensaje = "El email no está disponible, el resto de datos se han actualizado con éxito";
            } else {
                $stmt = $MyBBDD->prepare("UPDATE usuario SET password = :password, phone = :phone WHERE id = :id");
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $mensaje = "El nombre de usuario y el email no están disponibles, el resto de datos se han actualizado con éxito";
            }
            break;

        case "pregunta":
            // Sanitizar las entradas del usuario
            $question = filter_var($_POST['mod-question'], FILTER_SANITIZE_STRING);
            $answer = filter_var($_POST['mod-answer'], FILTER_SANITIZE_STRING);

            // Actualizamos la pregunta de seguridad y la respuesta en la base de datos
            $stmt = $MyBBDD->prepare("UPDATE usuario SET pass_question = :question, pass_answer = :answer WHERE id = :id");
            $stmt->bindParam(':question', $question, PDO::PARAM_STR);
            $stmt->bindParam(':answer', $answer, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $mensaje = "Pregunta de seguridad actualizada con éxito";
            break;

        default:
            $mensaje = "Ha ocurrido un error";
            break;
    }

    // Actualizamos la sesión con los nuevos datos del usuario
    $stmt = $MyBBDD->prepare("SELECT * FROM usuario WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    actualizar_sesion($MyBBDD);

    return $mensaje;
}

    // Función para enviar una sugerencia a la base de datos
    function sugerencia($MyBBDD) {
        $asunto = filter_var($_POST['asunto1'], FILTER_SANITIZE_STRING);
        $miTexto = filter_var($_POST['miTexto1'], FILTER_SANITIZE_STRING);

        $stmt = $MyBBDD->prepare("INSERT INTO sugerencias (asunto, texto) VALUES (:asunto, :miTexto)");
        
        $stmt->bindParam(':asunto', $asunto, PDO::PARAM_STR);
        $stmt->bindParam(':miTexto', $miTexto, PDO::PARAM_STR);

        $result = $stmt->execute();

        if ($result) {
            return true;
        }
        return false;
    }
    
    // Función para publicar una nueva publicación
    function publicar($MyBBDD, $ruta_completa, $id) {
        $ruta_completa = substr($ruta_completa, 1);
        // Obtenemos la fecha y la hora
        $fechaHoraActual = date('Y-m-d H:i:s');

        $tematicas = filter_var($_POST['tematicas'], FILTER_SANITIZE_STRING);
        $contenido = filter_var($_POST['contenido'], FILTER_SANITIZE_STRING);

        $stmt = $MyBBDD->prepare("INSERT INTO feed (tematicas, ruta, contenido, likes, usuario_id, fecha_hora) VALUES (:tematicas, :ruta_completa, :contenido, 0, :id, :fechaHoraActual)");

        $stmt->bindParam(':tematicas', $tematicas, PDO::PARAM_STR);
        $stmt->bindParam(':ruta_completa', $ruta_completa, PDO::PARAM_STR);
        $stmt->bindParam(':contenido', $contenido, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':fechaHoraActual', $fechaHoraActual, PDO::PARAM_STR);

        $result = $stmt->execute();

        if ($result) {
            return true;
        }
        return false;
    }
    
    // Función para agregar un nuevo comentario a una publicación
    function comentar($MyBBDD) {
        $nuevo_comentario = filter_var($_POST['nuevo_comentario'], FILTER_SANITIZE_STRING);
        $id_feedd = $_SESSION['DC']['id_feedd'];
        $id_usuario = $_SESSION['DC']['id'];
        
        $stmt = $MyBBDD->prepare("INSERT INTO threads (column_name1, column_name2, column_name3) VALUES (NULL, :nuevo_comentario, :id_feedd, :id_usuario)");
        
        $stmt->bindParam(':nuevo_comentario', $nuevo_comentario, PDO::PARAM_STR);
        $stmt->bindParam(':id_feedd', $id_feedd, PDO::PARAM_INT);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        
        $result = $stmt->execute();

        if ($result) {
            return true;
        }
        return false;
    }
    
    // Función para guardar una nueva foto de perfil
    function guardarFoto($MyBBDD, $ruta_completa, $id) {
        // Eliminación del punto inicial de la ruta para que esta se guarde de manera correcta y así poder ser utilizada más adelante
        $ruta_completa = substr($ruta_completa, 1);
        
        $stmt = $MyBBDD->prepare("UPDATE usuario SET path_img_profile = :ruta_completa WHERE id = :id");

        $stmt->bindParam(':ruta_completa', $ruta_completa, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        $result = $stmt->execute();
        if ($result) {
            return true;
        }
        return false;
    }

    // Función para eliminar la foto de perfil
    function eliminarFoto($MyBBDD, $id) {
        try {
            // Eliminación de la ruta de la foto de perfil
            $stmt = $MyBBDD->prepare("UPDATE usuario SET path_img_profile = '' WHERE id = :id");
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            $result = $stmt->execute();
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }
?>