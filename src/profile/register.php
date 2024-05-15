<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="../css/login-register.css">
    <link rel="shortcut icon" href="../img/icon-logo.png">
    <script src="https://kit.fontawesome.com/390edf9e42.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Enlace para volver a la página principal -->
    <div class="volver"><a href="../index.php"><i class="fa-solid fa-circle-arrow-left" style="color: #defcdd;"></i></a></div>
    <!-- Primera pantalla del formulario de registro -->
    <div class="pantalla1" id="pantalla1">
        <div class="todo">
            <h2>Introduce tu nombre</h2>
            <form action="../inc/sesiones.php" method="post"> <!-- El formulario nos redirige a "sesiones.php" para realizar el registro con php -->
                <!-- Campos para el nombre y apellidos -->
                <div class="maincaja1">
                    <input type="text" class="input1" id="input1" name="reg-name" required autocomplete="off" maxlength="20">
                    <label class="label1">Nombre</label>
                </div>
                <div class="maincaja2">
                    <input type="text" class="input2" id="input2" name="reg-surnames" required autocomplete="off" maxlength="30">
                    <label class="label2">Apellidos</label>
                </div>
                <!-- Mensajes de error y botón para avanzar -->
                <div class="mensaje1" id="mensaje1">
                    <label>Ingresa un nombre de al menos 3 caracteres.</label>
                </div>
                <div class="mensaje1" id="mensaje1_2">
                    <label>Ingresa al menos un apellido de 3 caracteres.</label>
                </div>
                <div class="todo_siguiente">
                    <div class="siguiente">
                        <div class="caja1 caja"></div>
                        <div class="caja2 caja"></div>
                        <div class="caja3 caja"></div>
                        <div class="caja4 caja"></div>
                        <button name="submit_siguiente1" id="submit_siguiente1" class="submit_siguiente1" onclick="siguiente1(event)">Siguiente</button>
                    </div>
                </div>
                <div class="login">
                    <label class="label_login">¿Tienes una cuenta? <a href="login.php" class="a_login">Entrar</a></label>
                </div>
        </div>
    </div>
    <!-- Segunda pantalla del formulario de registro -->
    <div class="pantalla2" id="pantalla2">
        <div class="todo">
            <h2>Más información</h2>
                <div class="maincaja1">
                    <!-- Campos para el usuario, email y contraseña -->
                    <input type="text" class="input1" id="input3" name="reg-user" required autocomplete="off" maxlength="14">
                    <label class="label1">Usuario</label>
                </div>
                <div class="maincaja1">
                    <input type="text" class="input1" id="input4" name="reg-email" required autocomplete="off" maxlength="30">
                    <label class="label1">Email</label>
                </div>
                <div class="maincaja1">
                    <input type="password" class="input1" id="input5" name="reg-password" required maxlength="16">
                    <label class="label1">Contraseña</label>
                </div>
                <div class="maincaja2">
                    <input type="password" class="input1" id="input6" name="rep_password" required maxlength="16">
                    <label class="label1">Repetir contraseña</label>
                </div>
                <!-- Mensajes de error y botones para avanzar y retroceder -->
                <div class="mensaje1" id="mensaje2">
                    <label>Ingresa un nombre de usuario de al menos 3 caracteres y sin espacios.</label>
                </div>
                <div class="mensaje1" id="mensaje3">
                    <label>Dirección de correo electrónico inválida.</label>
                </div>
                <div class="mensaje1" id="mensaje4">
                    <label>Ingresa una contraseña que tenga entre 5 y 16 caracteres y sin caracteres especiales.</label>
                </div>
                <div class="mensaje1" id="mensaje5">
                    <label>Las contraseñas no coinciden.</label>
                </div>
                <div class="todo_siguiente todo_siguiente2">
                    <div class="siguiente anterior">
                        <div class="caja1 caja"></div>
                        <div class="caja2 caja"></div>
                        <div class="caja3 caja"></div>
                        <div class="caja4 caja"></div>
                        <button name="submit_anterior2" id="submit_anterior1" class="submit_siguiente" onclick="anterior1()">Anterior</button>
                    </div>
                    <div class="siguiente">
                        <div class="caja1 caja"></div>
                        <div class="caja2 caja"></div>
                        <div class="caja3 caja"></div>
                        <div class="caja4 caja"></div>
                        <button name="submit_siguiente2" id="submit_siguiente2" class="submit_siguiente" onclick="siguiente2(event)">Siguiente</button>
                    </div>
                </div>
        </div>
    </div>
    <!-- Tercera pantalla del formulario de registro -->
    <div class="pantalla3" id="pantalla3">
        <div class="todo">
            <h2>Más información</h2>
            <!-- Campos para el número de teléfono y fecha de nacimiento -->
                <div class="maincaja1">
                    <input type="text" class="input1" id="input7" name="reg-phone" required autocomplete="off">
                    <label class="label1">Número de teléfono: </label>
                </div>
                <div class="maincaja1">
                    <input type="date" class="input1" id="input8" name="reg-birth" required autocomplete="off">
                    <label class="label1">Fecha de nacimiento:</label>
                </div>
                <div class="mensaje1" id="mensaje6">
                    <label>Número de teléfono inválido.</label>
                </div>
                <div class="mensaje1" id="mensaje7">
                    <label>Fecha de nacimiento inválida.</label>
                </div>
                <!-- Mensajes de error y botones para avanzar y retroceder -->
                <div class="todo_siguiente todo_siguiente2">
                    <div class="siguiente anterior">
                        <div class="caja1 caja"></div>
                        <div class="caja2 caja"></div>
                        <div class="caja3 caja"></div>
                        <div class="caja4 caja"></div>
                        <button name="submit_anterior3" id="submit_anterior2" class="submit_siguiente" onclick="anterior2()">Anterior</button>
                    </div>
                    <div class="siguiente">
                        <div class="caja1 caja"></div>
                        <div class="caja2 caja"></div>
                        <div class="caja3 caja"></div>
                        <div class="caja4 caja"></div>
                        <button name="submit_siguiente3" id="submit_siguiente3" class="submit_siguiente" onclick="siguiente3(event)">Siguiente</button>
                    </div>
                </div>
        </div>
    </div>
    <!-- Cuarta pantalla del formulario de registro -->
    <div class="pantalla4" id="pantalla4">
        <div class="todo">
            <h2>Pregunta de seguridad</h2>
             <!-- Selección de pregunta de seguridad y campo para la respuesta -->
                <div class="maincaja1 maincaja3">
                    <label class="label1">Pregunta de seguridad: </label>
                    <select name="reg-pass_question" id="pass_question" required>
                        <option value="¿Cuál es el nombre de tu primera mascota?">¿Cuál es el nombre de tu primera mascota?</option>
                        <option value="¿Cuál es el segundo apellido de tu madre?">¿Cuál es el segundo apellido de tu madre?</option>
                        <option value="¿Cómo se llama la escuela en la que estudiaste?">¿Cómo se llama la escuela en la que estudiaste?</option>
                        <option value="¿Cuál es tu comida favorita?">¿Cuál es tu comida favorita?</option>
                    </select>
                </div>
                <div class="maincaja1">
                    <input type="text" class="input1" id="input9" name="reg-pass_answer" required autocomplete="off" maxlength="30">
                    <label class="label1">Respuesta:</label>
                </div>
                 <!-- Botones para avanzar y retroceder, y enviar el formulario -->
                <div class="todo_siguiente todo_siguiente2">
                    <div class="siguiente anterior">
                        <div class="caja1 caja"></div>
                        <div class="caja2 caja"></div>
                        <div class="caja3 caja"></div>
                        <div class="caja4 caja"></div>
                        <button name="submit_anterior3" id="submit_anterior3" class="submit_siguiente" onclick="anterior3()">Anterior</button>
                    </div>
                    <div class="siguiente">
                        <div class="caja1 caja"></div>
                        <div class="caja2 caja"></div>
                        <div class="caja3 caja"></div>
                        <div class="caja4 caja"></div>
                        <input type="submit" name="sub-registro" id="submit" class="submit_siguiente" value="Registrarse">
                    </div>
                </div>
        </div>
    </div>
        </form>
    </div>
    <!-- Inclusión del script JavaScript para el formulario -->
    <script src="../js/login-register.js"></script>
</body>
</html>