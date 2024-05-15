//Funciones utilizadas para mostrar la imagen subida de una publicación en el momento.
document.addEventListener('DOMContentLoaded', function () {
    var inputImagen = document.getElementById('imagen-publicacion');
    var imagenPreview = document.getElementById('imagen');
    var formularioImagen = document.getElementById('formulario-imagen');

    inputImagen.addEventListener('change', function () {
    var file = inputImagen.files[0];
    if (file) {
        // Validar en el lado del cliente si es una imagen
        if (file.type.startsWith('image/')) {
            mostrarImagen(file);
            subirImagen(file);
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
