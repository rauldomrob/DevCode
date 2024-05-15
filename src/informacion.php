<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información Legal | DevCode</title>
    <script src="https://kit.fontawesome.com/390edf9e42.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/botones.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="./img/icon-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&family=Permanent+Marker&display=swap" rel="stylesheet">
    <style>
        :root {
            --verde-oscuro-degradado: #0a1609;
            --verde-degradado: #24552c;
            --verde-complementario: #499656;
            --verde-muy-oscuro: #070f06;
            --verde-oscuro-complementario: #2a5e25;
            --verde-oscuro: #1e4b25;
            --verde-muy-claro-letras: #defcdd;
            --verde-claro-letras: #67b46e;
            --verde-claro-complementario: #55b94c;
        }

        .info {
            font-family: 'Times New Roman', Times, serif;
            background-color: var(--verde-muy-oscuro);
            color: var(--verde-muy-claro-letras);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container_info {
            width: 80%;
            margin: 20px 20px 40px 20px;
            padding: 20px;
            background-color: var(--verde-oscuro);
            border-radius: 5px;
            margin: 40px auto;
            box-shadow: 0 2px 5px var(--verde-oscuro-degradado);
            border: 3px solid rgba(223, 252, 222, 0.25);
        }

        .container_info h1 {
            color: var(--verde-claro-letras);
            text-align: center;
            margin-bottom: 20px;
        }

        .container_info h2 {
            color: var(--verde-claro-complementario);
            margin-top: 20px;
        }

        .container_info p, .container_info li {
            color: var(--verde-muy-claro-letras);
            line-height: 1.6;
        }
    </style>
</head>
<!-- Información de DevCode -->
<body class="info">
    <div class="container_info">
        <h1>Información Legal de DevCode</h1>
        <p>Fecha efectiva: 1 de enero, 2023</p>

        <h2>1. Términos de Uso</h2>
        <p>El acceso y uso de DevCode implica la aceptación de estos términos y condiciones. No está permitido el uso del sitio para actividades ilegales, 
            fraudulentas, o que infrinjan los derechos de autor. Cualquier contenido publicado en los foros de DevCode es responsabilidad de los usuarios, y 
            DevCode se reserva el derecho de eliminar contenido que considere inapropiado o que infrinja estos términos.</p>

        <h2>2. Derechos de Autor y Propiedad Intelectual</h2>
        <p>Todos los contenidos de DevCode, incluyendo textos, gráficos, logos, y software son propiedad de DevCode o 
            de sus respectivos autores y están protegidos por las leyes de derechos de autor. Se prohíbe cualquier uso que no esté expresamente
            autorizado por DevCode o por los titulares de los derechos.</p>

        <h2>3. Uso de los Foros y Comunidad</h2>
        <p>Los foros de DevCode son espacios para el intercambio de información y experiencias entre programadores. 
            Se espera que los usuarios mantengan un ambiente respetuoso y constructivo. No se tolerará el acoso, el spam, ni el uso de lenguaje ofensivo.</p>

        <h2>4. Responsabilidades de los Usuarios</h2>
        <p>Los usuarios son responsables de mantener la confidencialidad de sus cuentas y contraseñas. 
            DevCode no será responsable de los daños causados por el uso indebido de cuentas de usuario. 
            Se espera que los usuarios informen inmediatamente sobre cualquier uso no autorizado de sus cuentas.</p>

        <h2>5. Procedimiento para Reclamos de Derechos de Autor</h2>
        <p>Si un usuario o un tercero considera que su trabajo ha sido copiado de una manera que constituye una violación de los derechos de autor, 
            puede contactar a DevCode a través de legal@devcode.com con la información detallada del material en cuestión y la prueba de propiedad del derecho de autor.</p>

        <h2>6. Limitación de Responsabilidad</h2>
        <p>DevCode no asume responsabilidad por los daños que puedan derivarse del acceso o uso del sitio, incluyendo pero no limitado a interrupciones del servicio, 
            virus informáticos, o fallos en el sistema. Asimismo, DevCode no garantiza la exactitud, integridad o utilidad de la información proporcionada en el sitio.</p>

        <h2>7. Política de Enlaces a Terceros</h2>
        <p>DevCode puede contener enlaces a sitios web de terceros. Estos enlaces se proporcionan únicamente como una comodidad y 
            no implican un aval o aprobación por parte de DevCode de los contenidos de dichos sitios externos.</p>

        <h2>8. Cambios en la Información Legal</h2>
        <p>DevCode se reserva el derecho de modificar esta información legal en cualquier momento. 
            Los cambios serán publicados en esta página y serán efectivos inmediatamente. Se aconseja a los usuarios revisar 
            periódicamente esta sección para estar informados de cualquier cambio.</p>

        <h2>9. Jurisdicción y Ley Aplicable</h2>
        <p>Los conflictos legales relacionados con el uso de DevCode estarán sujetos a las leyes del país sede de DevCode, y 
            cualquier disputa será resuelta en los tribunales competentes de dicho país.</p>

        <h2>10. Contacto</h2>
        <p>Para cualquier consulta o inquietud relacionada con esta información legal, por favor contacta con nosotros en legal@devcode.com.</p>
        <div class="todo_siguiente">
            <div class="siguiente">
                <div class="caja1 caja"></div>
                <div class="caja2 caja"></div>
                <div class="caja3 caja"></div>
                <div class="caja4 caja"></div>
                <button class="submit_siguiente1" onclick="window.location.href='index.php'">Volver</button>
            </div>
        </div>
    </div>
    <!-- Incluimos el footer -->
    <?php include "inc/footer.php"; ?>
</body>
</html>
