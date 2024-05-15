<section id="menu-der">
        <ul>
            <li id="btn-publicar">
                 <!-- El formulario nos redirige a "publicar.php" para realizar la publicación -->
                <form action="publicar.php" method="post" enctype="multipart/form-data">
                    <button type="submit" name="publicar"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                </form>
            </li>
            <li id="log-out">
                <button onclick="mostrarTapar()"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
            </li>
            <div class="tapar" id="tapar" onclick="cerrarTapar()">
                <div class="seguroYRespuesta">
                    <p>¿Estás seguro que deseas cerrar sesión?</p>
                    <!-- El formulario nos redirige a "sesiones.php" para cerrar la sesión -->
                    <form action="./inc/sesiones.php" method="post" enctype="multipart/form-data">
                        <div>No</div>
                        <button type="submit" name="cerrar-sesion">Sí</button>
                    </form>
                </div>
            </div>
            <script src="./js/menu-derecho.js"></script>
        </ul>
    
</section>