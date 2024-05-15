<header>
<div id="header_div-1">
        <a href="index.php">
            <div class="foto">
                <img src="img/logo.png" alt="logo">
            </div>
            <div class="tit">
                <h1>DevCode</h1>
            </div>
        </a>
    </div>
    <nav>
        <?php 
            // Si el usuario no ha iniciado sesión y pulsa Feed se le redirige a iniciar sesión.
            if (!isset($_SESSION["DC"])) {
                ?>
                    <a href="./profile/login.php">Feed</a>
                <?php
            }else{
                // Si el usuario ha iniciado sesión, se le redirige a Feed para ver todas las publicaciones del foro.
                ?>
                    <a href="destacados.php">Feed</a>
                <?php
            }
        ?>
        <a href="nosotros.php">Sobre nosotros</a>
        <a href="contacto.php">Contacto</a>
        <!--Si el usuario ingresa alguna palabra o letra y pulsa Enter, se realiza una búsqueda con una consulta a la BDD.-->
        <label>
            <i class="fa fa-search" aria-hidden="true"></i>
            <form action="./destacados.php" method="post" id="busqueda">
                <input type="search" id="search" name="search" onkeydown="detectarEnter(event)" required>
            </form>
        </label>
    </nav>
    <div id="header_div-2">
        <?php
        // Si el usuario no ha iniciado sesión, se le muestran dos botones uno para iniciar sesión y otro para registrarse.
            if (!isset($_SESSION["DC"])) {
                ?>
                    <div class="no-cuenta">
                        <div class="login">
                            <a href="./profile/login.php">Log In</a>
                        </div>
                        <div class="register">
                            <a href="./profile/register.php">Registrarse</a>
                        </div>
                    </div>
                <?php
            }else{
                // Si el usuario ha iniciado sesión, se le muestra el botón "Mi cuenta" para acceder a su información.
                ?>
                    <div class="no-cuenta">
                        <div class="login">
                            <a href="cuenta.php">Mi cuenta</a>
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>
 </header>
 