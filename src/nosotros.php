<?php include_once "./inc/sesiones.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros | DevCode</title>
    <script src="https://kit.fontawesome.com/390edf9e42.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="shortcut icon" href="./img/icon-logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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

        body{
            overflow-x: hidden;
            background-color: var(--verde-muy-oscuro);
        }

        body::-webkit-scrollbar{
            display: none;
        }

        .todo{
            height: auto;
            width: 100vw;
        }

        header{
            top: 0px;
        }

        .sobre-nosotros {
            background-color: var(--verde-degradado);
            color: var(--verde-muy-claro-letras);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px var(--verde-oscuro-degradado);
            margin: 140px auto 40px auto;
            width: 80%;
            border: 3px solid rgba(223, 252, 222, 0.25);
        }

        .sobre-nosotros h2 {
            color: var(--verde-claro-letras);
            text-align: center;
            font-size: 2.5em; 
            margin-bottom: 20px; 
        }

        .sobre-nosotros h3 {
            color: var(--verde-claro-letras);
            font-size: 1.5em;           
            margin-top: 20px; 
            margin-bottom: 10px; 
        }

        .sobre-nosotros p {
            line-height: 1.8;
            margin-top: 10px;
        }

        .sobre-nosotros img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-top: 15px;
        }

        @media(max-width: 1200px){
            .todo:before {
                height: 225%;
            }
        }
        @media(max-width: 975px){
            .todo:before {
                height: 243%;
            }
        }

        @media(max-width: 820px){
            .todo:before {
                height: 262%;
            }
        }
        @media(max-width: 665px){
            .todo:before {
                height: 296%;
            }
        }
    </style>
</head>
<body>
    <!-- Incluimos el header -->
    <?php include "inc/header.php";?>
    <div class="todo">
        <!-- Sobre nosotros de DevCode -->
        <div class="sobre-nosotros">
            <h2>Sobre DevCode</h2>
            <h3>Información General</h3>
            <p><b>1. Descripción de la Empresa:</b></p>
            <p> DevCode se inició en 2023 como un pequeño foro de discusión en línea, 
                concebido por un grupo de programadores entusiastas con el objetivo de crear un espacio donde las ideas y experiencias en 
                el campo de la programación pudieran compartirse libremente. Con el paso del tiempo, DevCode ha crecido y evolucionado, 
                convirtiéndose en una comunidad vibrante y diversa, que abarca desde estudiantes y aficionados hasta profesionales experimentados 
                en el mundo de la programación y el desarrollo de software.</p>
            
            <p>Desde nuestros inicios, hemos estado en la vanguardia de la tecnología, adaptándonos y evolucionando con las tendencias actuales
                en el mundo del desarrollo de software. Nuestros foros cubren una amplia gama de temas, desde lenguajes de programación fundamentales
                como Python y JavaScript, hasta tecnologías emergentes como la inteligencia artificial y el aprendizaje automático. Además, 
                proporcionamos una plataforma para que los miembros de la comunidad compartan sus proyectos personales, busquen colaboradores y reciban retroalimentación constructiva.</p>

            <p>En DevCode, nos esforzamos por mantener un ambiente en el que el aprendizaje sea accesible, interactivo y, sobre todo, divertido. 
                Organizamos regularmente eventos virtuales como hackatones, seminarios web y debates en grupo que facilitan el intercambio de conocimientos y la 
                construcción de una red profesional sólida. Nuestro enfoque se centra no solo en el desarrollo técnico sino también en fomentar habilidades blandas, 
                como la resolución de problemas, el trabajo en equipo y la comunicación efectiva.</p>
            
            <p><b>2. Identidad Corporativa:</b></p>
            <p> Nos diferenciamos por nuestro enfoque en la comunidad, un servicio al cliente personalizado y una calidad 
                inigualable en contenido y recursos. Nuestros usuarios eligen DevCode por su ambiente colaborativo y la riqueza de información y experiencia compartida.</p>

            <p><b>3. Valores de la Empresa:</b></p>
            <p> En DevCode, valoramos la colaboración, el respeto, la innovación y el compromiso con el aprendizaje continuo. 
                Estos valores nos definen y guían nuestra misión de empoderar a los programadores en su desarrollo profesional.</p>

            <p><b>4. Visión desde el Exterior:</b></p>
            <p> Aspiramos a ser reconocidos por nuestro liderazgo en el ámbito de la programación, 
                nuestra capacidad de innovar y adaptarnos a las nuevas tecnologías, y nuestro fuerte sentido de comunidad.</p>

            <p><b>5. Sector de Operación:</b></p>
            <p> Operamos en el sector de la tecnología y la educación, específicamente en el ámbito de la programación y 
                el desarrollo de software.</p>

            <p><b>6. Competidores Directos:</b></p>
            <p> Entre nuestros competidores se encuentran otros foros de programación y plataformas educativas online, 
                pero nos destacamos por nuestra activa comunidad y enfoque en el crecimiento conjunto.</p>

            <p><b>7. Clientes Potenciales:</b> </p>
            <p> Nuestros clientes potenciales son programadores, estudiantes de tecnología y entusiastas de la informática que 
                buscan mejorar sus habilidades. Nos enfocamos en segmentos de mercado que valoran el aprendizaje colaborativo y el apoyo mutuo.</p>
        </div>
    </div>
    <!-- Incluimos el footer -->
    <?php include "inc/footer.php"; ?>
</body>
</html>
