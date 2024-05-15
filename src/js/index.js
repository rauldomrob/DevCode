function detectarEnter(event) {
    // Verificar si la tecla presionada es "Enter"
    if (event.key === "Enter") {
        // Evitar la acción predeterminada del "Enter" en el formulario
        event.preventDefault();
        document.getElementById("busqueda").submit();
    }
}