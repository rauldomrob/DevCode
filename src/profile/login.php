<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="../css/login-register.css">
    <link rel="shortcut icon" href="../img/icon-logo.png">
    <script src="https://kit.fontawesome.com/390edf9e42.js" crossorigin="anonymous"></script>
</head>
<body>
    <script>
        //Función para evitar SQL injection básica verificando los caracteres ingresados.
    function validarInput(input) {
        var invalidChars = ["'", '"', '=', '-'];  // Caracteres no permitidos
        for (var i = 0; i < invalidChars.length; i++) {
            if (input.value.includes(invalidChars[i])) {
                input.value = input.value.replace(invalidChars[i], '');  // Eliminar el carácter no permitido
            }
        }
    }
    </script>
    <!-- Sección de volver atrás -->
    <div class="volver"><a href="../index.php"><i class="fa-solid fa-circle-arrow-left" style="color: #defcdd;"></i></a></div>
     <!-- Contenedor principal del formulario de inicio de sesión -->
    <div class="todo">
        <h2>Iniciar sesión</h2>
        <!-- El formulario nos redirige a "sesiones.php" para realizar el login con php -->
        <form action="../inc/sesiones.php" method="post">
            <!-- Campo de entrada para el correo electrónico -->
            <div class="usuario">
                <input type="text" class="input_usuario" id="input_usuario" required name="log-email" autocomplete="off">
                <label class="label_usuario">Email</label>
            </div>
            <!-- Campo de entrada para la contraseña -->
            <div class="contrasena">
                <input type="password" class="input_contrasena" id="input_contrasena" name="log-password" required oninput="validarInput(this)">
                <label class="label_contrasena">Contraseña</label>
            </div>
             <!-- Mensaje de error si las credenciales son inválidas -->
            <div class="mensaje-error">
                <?php if (isset($_GET['error'])) {
                    echo "<p>Credenciales inválidas.</p>";
                }?>
                <!-- Script para mostrar el mensaje de error si es necesario -->
                <script>
                    window.onload = function() {
                        var error = "<?php echo isset($_GET['error']) ? $_GET['error'] : 'false'; ?>";
                        if (error === 'true') {
                            document.querySelector('.mensaje-error').style.visibility = 'visible';
                        }
                    };
                </script>
            </div>
            <!-- Botón para iniciar sesión -->
            <div class="todo_iniciar">
                <div class="iniciar">
                    <div class="caja1 caja"></div>
                    <div class="caja2 caja"></div>
                    <div class="caja3 caja"></div>
                    <div class="caja4 caja"></div>
                    <input type="submit" value="Iniciar sesión" name="sub-login" id="submit_iniciar" class="submit_iniciar">
                </div>
            </div>
            <!-- Enlace para registrarse si no tiene una cuenta -->
            <div class="registrarse">
                <label class="label_registarse">¿No tienes una cuenta? <a href="register.php" class="a_registrarse">Regístrate</a></label>
            </div>
        </form>
    </div>
</body>
</html>