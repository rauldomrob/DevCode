<?php 
    if (isset($_POST["sub-login"]) or isset($_POST["sub-registro"]) or isset($_POST["enviar_form1"]) or isset($_POST["publicar_fin"]) or (isset($_POST["guardar_foto"])) or  (isset($_POST["eliminar_foto"]))) {
        include "../bbdd/datos-usuario.php";
    }else{
        include "./bbdd/datos-usuario.php";
    }
    
    session_start();

    // Función para actualizar la información de la sesión
    function actualizar_sesion($MyBBDD){
        $fila = $MyBBDD->extraer_registro();
        $_SESSION["DC"] = array(
            "id" => $fila['id'],
            "name" => $fila['name'],
            "surname" => $fila['surname'],
            "user_name" => $fila['user_name'],
            "password" => $fila['password'],
            "email" => $fila['email'],
            "phone" => $fila['phone'],
            "birth" => $fila['birth'],
            "pass_question" => $fila['pass_question'],
            "pass_answer" => $fila['pass_answer'],
            "followers" => $fila['followers'],
            "follows" => $fila['follows'],
            "path_img_profile" => $fila['path_img_profile']
        ); 
    }
    
    // Función para el login del usuario
    if (isset($_POST["sub-login"])) {
        $res = buscar_usuario($MyBBDD);
        if ($res) {
            //Si las credenciales ingresadas son válidas, se actualiza la sesión y se redirige al usuario al index.
            $MyBBDD->consulta("SELECT * FROM usuario WHERE email = '".$_POST['log-email']."';");
            actualizar_sesion($MyBBDD);
            header('Location: ../index.php');
            exit();
        }else{
            //Si las credenciales ingresadas no son válidas se avisará al usuario.
            header('Location: ../profile/login.php?error=true');
            exit();
        }  
    }

    //Función para el registro del usuario
    if (isset($_POST["sub-registro"])) {
        $res = registrar_usuario($MyBBDD);
        if ($res == 1) {
            $MyBBDD->consulta("SELECT * FROM usuario WHERE email = '".$_POST['reg-email']."';");
            $fila = $MyBBDD->extraer_registro();

            $_SESSION["DC"] = array(
                "id" => $fila['id'],
                "name" => $fila['name'],
                "surname" => $fila['surname'],
                "user_name" => $fila['user_name'],
                "password" => $fila['password'],
                "email" => $fila['email'],
                "phone" => $fila['phone'],
                "birth" => $fila['birth'],
                "pass_question" => $fila['pass_question'],
                "pass_answer" => $fila['pass_answer'],
                "followers" => $fila['followers'],
                "follows" => $fila['follows'],
                "path_img_profile" => $fila['path_img_profile']
            ); 
            header('Location: ../index.php');
            exit();
        }else{
            echo $res;
            if($res == -2){//email y nombre de usuario no disponibles, ya están usados
                header('Location: emailynombre-usados.html');
                exit();
            }else{
                if($res == 0){ //email no disponible, ya está usado
                    header('Location: email-usado.html');
                    exit();
                }else{//nombre de usuario no disponible, ya está usado
                    header('Location: nombre-usuario-usado.html');
                    exit();
                }
            }
        }
    }
    
    if (isset($_POST["enviar_form1"])) {
        //Llamada al método para enviar mensaje de sugerencia a la base de datos.
        sugerencia($MyBBDD);
        header('Location: ../contacto.php');
        exit();
    }

    if(isset($_POST['comentar'])){
        //Llamada al método para añadir un comentario a una publicación.
        if(comentar($MyBBDD)){
            header('Location: ./publicacion.php');
            exit();
        }else{
            header('Location: ./publicacion.php');
            exit();
        }
    }

    //Publicación nueva
    if(isset($_POST['publicar_fin'])){
        $id = $_SESSION['DC']['id'];
        $tematica = $_POST['tematicas'];
        $contenido = $_POST['contenido'];
        $carpeta_destino = "../img-publicaciones-usuario/" . $id;
        $nombre_img_base = "/img-publicacion";
        $ruta_completa = "";
        //Compruebo si existe una carpeta con el id del usuario
        if (!file_exists($carpeta_destino)) {
            //Si no existe la creo
            mkdir($carpeta_destino, 0777, true);
        }
        //Compruebo si se ha ingresado algún archivo.
        if(isset($_FILES['imagen'])){
            //Obtengo la extensión del archivo ingresado por el usuario.
            $extension_letras = str_split($_FILES['imagen']['type']);
            $extension = "";
            for($i=0; $i<count($extension_letras); $i++){
                if($i>5){
                    $extension.=$extension_letras[$i];
                }
            }
            //Declaro las extensiones permitidas para el archivo ingresado por el usuario.
            $extensiones = array("jpg", "jpeg", "png");
            if(in_array($extension, $extensiones)){
                //Se ha ingresado un archivo válido
                $ruta_completa = $carpeta_destino . $nombre_img_base . '1.' . $extension;
                $contador = 1;
                //Verifico si existe algún archivo con ese nombre
                while (file_exists($ruta_completa)) {
                    //Si existe algún archivo con ese nombre, cambiamos el nombre hasta que no exista una imagen con ese nombre.
                    $contador++;
                    $ruta_completa = $carpeta_destino . $nombre_img_base . $contador . '.' . $extension;
                }
                //Muevo la imagen ingresada a la carpeta del usuario.
                move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_completa);
            }else{
                //Se ha ingresado un archivo inválido
                $ruta_completa = $carpeta_destino . $nombre_img_base . '1.png';
                $contador = 1;
                //Verifico si existe algún archivo con ese nombre
                while (file_exists($ruta_completa)) {
                    //Si existe algún archivo con ese nombre, cambiamos el nombre hasta que no exista una imagen con ese nombre.
                    $contador++;
                    $ruta_completa = $carpeta_destino . $nombre_img_base . $contador . '.png';
                }
                //Copio una imagen predeterminada en la carpeta del usuario.
                copy("../img/logo.png", $ruta_completa);
            }
        }else{
            //No se ha ingresado ningún archivo
            $ruta_completa = $carpeta_destino . $nombre_img_base . '1.png';
            $contador = 1;
            //Verifico si existe algún archivo con ese nombre.
            while (file_exists($ruta_completa)) {
                $contador++;
                //Si existe algún archivo con ese nombre, cambiamos el nombre hasta que no exista una imagen con ese nombre.
                $ruta_completa = $carpeta_destino . $nombre_img_base . $contador . '.png';
            }
            //Copio una imagen predeterminada en la carpeta del usuario.
            copy("../img/logo.png", $ruta_completa);
        }
        //Llamo a la función de publicar para guardar la publicación en la base de datos.
        publicar($MyBBDD, $ruta_completa, $id);
        header('Location: ../index.php');
        exit();
    }

    if(isset($_POST['guardar_foto'])){
        $id = $_SESSION['DC']['id'];
        $carpeta_destino = "../img-users/carpeta" . $id;
        $nombre_img_base = "/foto-perfil" . $id;
        $ruta_completa = $carpeta_destino . $nombre_img_base;
        //Declaro las extensiones permitidas para el archivo ingresado por el usuario.
        $extensiones = array("jpg", "jpeg", "png");
        //Compruebo si existe una carpeta con el id del usuario
        if (file_exists($carpeta_destino)) {
            //Si existe la carpeta, borro su contenido
            foreach ($extensiones as $ext) {
                if(file_exists($ruta_completa . '.' . $ext)){
                    unlink($ruta_completa . '.' . $ext);
                }
            }
        }else{
            //Si no existe la carpeta la creo
            mkdir($carpeta_destino, 0777, true);
        }
        //Compruebo si se ha ingresado algún archivo.
        if(isset($_FILES['imagen'])){
            //Obtengo la extensión del archivo que ingresado por el usuario.
            $extension_letras = str_split($_FILES['imagen']['type']);
            $extension = "";
            for($i=0; $i<count($extension_letras); $i++){
                if($i>5){
                    $extension.=$extension_letras[$i];
                }
            }
            if(in_array($extension, $extensiones)){
                //Se ha ingresado un archivo válido
                $ruta_completa = $carpeta_destino . $nombre_img_base . '.' .$extension;
                //Muevo la imagen ingresada a la carpeta del usuario.
                move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_completa);
            }else{
                //Se ha ingresado un archivo inválido
                $ruta_completa = $carpeta_destino . $nombre_img_base . ".jpg";
                //Copio una imagen predeterminada en la carpeta del usuario.
                copy("../img-users/foto-perfil-predeterminada.jpg", $ruta_completa);
            }
        }else{
            //No se ha ingresado ningún archivo
            $ruta_completa = $carpeta_destino . $nombre_img_base . ".jpg";
            //Copio una imagen predeterminada en la carpeta del usuario.
            copy("../img-users/foto-perfil-predeterminada.jpg", $ruta_completa);
        }
        guardarFoto($MyBBDD, $ruta_completa, $id);
        header('Location: ../cuenta.php');
        exit();
    }

    if(isset($_POST['eliminar_foto'])){
        $id = $_SESSION['DC']['id'];
        $carpeta_destino = "../img-users/carpeta" . $id;
        $nombre_img_base = "/foto-perfil" . $id;
        $ruta_completa = $carpeta_destino . $nombre_img_base;
        $extensiones = array("jpg", "jpeg", "png");
        //Compruebo si existe una carpeta con el id del usuario
        if (file_exists($carpeta_destino)) {
            //Si existe la carpeta, borro su contenido
            foreach ($extensiones as $ext) {
                if(file_exists($ruta_completa . '.' . $ext)){
                    unlink($ruta_completa . '.' . $ext);
                }
            }
        }else{
            //Si no existe una carpeta con el id del usuario redirijo a la propia página.
            header('Location: ../cuenta.php');
        }
        //Elimino la carpeta del usuario.
        rmdir($carpeta_destino);
        //Llamo a la función que eliminará la ruta de la imagen de la base de datos.
        eliminarFoto($MyBBDD, $id);
        header('Location: ../cuenta.php');
        exit();
    }

    //Cerrar sesión
    if (isset($_POST['cerrar-sesion'])) {
        $_SESSION = array();
        session_regenerate_id();
        session_destroy();
        header('Location: ../index.php');
        exit();
    }