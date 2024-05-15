//Se muestran los divs que nos permitirán editar los datos
function vista_datos(event) {
    etiqueta = event.target;
    id_boton = etiqueta.getAttribute("id");

    document.querySelector("#datos-digitales").style.display = "none";
    document.querySelector("#datos-pregunta").style.display = "none";
    document.querySelector("#datos-personales").style.display = "none";
    document.querySelector("#mensaje").style.display = "none";

    document.querySelector("#botones :nth-child(1)").style.background = "white";
    document.querySelector("#botones :nth-child(1)").style.color = "black";
    document.querySelector("#botones :nth-child(2)").style.background = "white";
    document.querySelector("#botones :nth-child(2)").style.color = "black";
    document.querySelector("#botones :nth-child(3)").style.background = "white";
    document.querySelector("#botones :nth-child(3)").style.color = "black";
    switch (id_boton) {
        case "btn-personal":
                document.querySelector("#datos-personales").style.display = "block";
                document.querySelector("#botones :nth-child(1)").style.background = "black";
                document.querySelector("#botones :nth-child(1)").style.color = "white";
                
            break;
    
        case "btn-digital":
                document.querySelector("#datos-digitales").style.display = "block";
                document.querySelector("#botones :nth-child(2)").style.background = "black";
                document.querySelector("#botones :nth-child(2)").style.color = "white";
            break;
    
        case "btn-pregunta":
                document.querySelector("#datos-pregunta").style.display = "block";

                document.querySelector("#botones :nth-child(3)").style.background = "black";
                document.querySelector("#botones :nth-child(3)").style.color = "white";
            break;
    
        default:
            break;
    }
}

//Cuando se están mostrando los divs para editar los datos, no se podrá utilizar la rueda.
function editar(event) {
    etiqueta = event.target;
    id_boton = etiqueta.getAttribute("id");
    var capa = document.querySelector("#capa");
    capa.style.display = "block";
    //Comprobación del ancho del div #capa
    if (capa.offsetWidth < 1200) {
        //Si el ancho es menor a 1200px se desplaza a la parte inferior
        capa.scrollIntoView({ behavior: 'smooth', block: 'end' });
        //para que se desplace más abajo
        setTimeout(function() {
            window.scrollBy(0, 400); 
        }, 500);
    } else {
        //De lo contrario se desplaza a la parte superior
        capa.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    switch (id_boton) {
        case "btn-Epersonal":
            document.querySelector("#modificar-personales").style.display = "block";
            document.querySelector("#modificar-digitales").style.display = "none";
            document.querySelector("#modificar-pregunta").style.display = "none";
            break;
        case "btn-Edigital":
            document.querySelector("#modificar-personales").style.display = "none";
            document.querySelector("#modificar-digitales").style.display = "block";
            document.querySelector("#modificar-pregunta").style.display = "none";
            break;
        case "btn-Epregunta":
            document.querySelector("#modificar-personales").style.display = "none";
            document.querySelector("#modificar-digitales").style.display = "none";
            document.querySelector("#modificar-pregunta").style.display = "block";
            break;
        default:
            break;
    }
    window.addEventListener('wheel', preventScroll, { passive: false });
}

function preventScroll(event) {
    event.preventDefault();
}

//Función que oculta la capa de editar datos.
function ocultarCapa(event){
    etiqueta = event.target;
    id_boton = etiqueta.getAttribute("id");
    //Cuando se pulsen los divs con la clase modificar-datos no se ocultara el div con id #capa.
    if ((etiqueta.tagName === 'DIV' && etiqueta.classList.contains('modificar-datos')) || etiqueta.tagName === 'INPUT' || etiqueta.tagName === 'H3'|| etiqueta.tagName === 'FORM' || etiqueta.tagName === 'SELECT' || etiqueta.tagName === 'OPTION') {
        return;
    }
    var capa = document.querySelector("#capa");
    capa.style.display = "none";

    switch (id_boton) {
        case "btn-Epersonal":
            document.querySelector("#modificar-personales").style.display = "none";
            break;
        case "btn-Edigital":
            document.querySelector("#modificar-digitales").style.display = "none";
            break;
        case "btn-Epregunta":
            document.querySelector("#modificar-pregunta").style.display = "none";
            break;
        default:
            break;
    }
    window.removeEventListener('wheel', preventScroll);
    capa.scrollIntoView({ behavior: 'smooth', block: 'start' });
}
//Funciones para mostrar la imagen en cuenta cuando se añade una imagen
document.addEventListener('DOMContentLoaded', function () {
    var inputImagen = document.getElementById('imagen-publicacion');
    var imagenPreview = document.getElementById('imagen');
    var formularioImagen = document.getElementById('formulario-imagen');

    inputImagen.addEventListener('change', function () {
    var file = inputImagen.files[0];
    if (file) {
        // Validar en el lado del cliente si es una imagen (puedes hacer más validaciones)
        if (file.type.startsWith('image/')) {
            mostrarImagen(file);
        } else {
            alert('Selecciona una imagen válida.');
            inputImagen.value = ''; // Limpiar el input
        }
    }
});

function mostrarImagen(file) {
    var reader = new FileReader();
    reader.onload = function (e) {
        imagenPreview.src = e.target.result;
        imagenPreview.style.display = 'block';
    };
    reader.readAsDataURL(file);
}
});