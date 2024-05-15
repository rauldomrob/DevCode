let pantalla1 = document.getElementById("pantalla1");
let pantalla2 = document.getElementById("pantalla2");
let pantalla3 = document.getElementById("pantalla3");

//Botones de moverse hacia atrás
function anterior1(){
    pantalla1.style.display = "block";
    pantalla2.style.display = "none";
}

function anterior2(){
    pantalla2.style.display = "block";
    pantalla1.style.display = "none";
    pantalla3.style.display = "none";
}

function anterior3(){
    pantalla3.style.display = "block";
    pantalla4.style.display = "none";
    pantalla2.style.display = "none";
    pantalla1.style.display = "none";
}

//Funciones que comprueban los inputs de cada pantalla.
function siguiente1(event){
    let mensaje1_2 = document.getElementById("mensaje1_2");
    let mensaje1 = document.getElementById("mensaje1");
    mensaje1_2.style.display = "none";
    mensaje1.style.display = "none";
    let input1 = document.getElementById("input1").value;
    let t_input1 = document.getElementById("input1");
    let input2 = document.getElementById("input2").value;
    let t_input2 = document.getElementById("input2");
    if(/^.{3,20}$/.test(input1)){
        if(/^[a-zA-ZñÑ\s-]{3,30}$/.test(input2)){
            pantalla1.style.display = "none";
            pantalla2.style.display = "block";
            event.preventDefault();
        }else{
            mensaje1_2.style.display = "block";
            t_input2.value = "";
        }
    }else{
        mensaje1.style.display = "block";
        t_input1.value = "";
    }
}

function siguiente2(event){
    let mensaje2 = document.getElementById("mensaje2");
    let mensaje3 = document.getElementById("mensaje3");
    let mensaje4 = document.getElementById("mensaje4");
    let mensaje5 = document.getElementById("mensaje5");
    mensaje2.style.display = "none";
    mensaje3.style.display = "none";
    mensaje4.style.display = "none";
    mensaje5.style.display = "none";
    let input3 = document.getElementById("input3").value;
    let input4 = document.getElementById("input4").value;
    let input5 = document.getElementById("input5").value;
    let input6 = document.getElementById("input6").value;
    let t_input3 = document.getElementById("input3");
    let t_input4 = document.getElementById("input4");
    let t_input5 = document.getElementById("input5");
    let t_input6 = document.getElementById("input6");
    if(input3.length==0 && input4.length==0 && input5.length==0 && input6.length==0){
        event.preventDefault();
    }
    if(/^[^\s]{3,14}$/.test(input3)){
        if(/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input4)){
            if((/^[^\s'\"=-]{5,16}$/.test(input5)) && (/^[^\s'\"=-]{5,16}$/.test(input6))){
                if(input5===input6){
                    pantalla1.style.display = "none";
                    pantalla2.style.display = "none";
                    pantalla3.style.display = "block";
                    event.preventDefault();
                }else{
                    mensaje5.style.display = "block";
                    pantalla1.style.display = "none";
                    pantalla2.style.display = "block";
                    t_input5.value = "";
                    t_input6.value = "";
                }
            }else{
                mensaje4.style.display = "block";
                pantalla1.style.display = "none";
                pantalla2.style.display = "block";
                t_input5.value = "";
                t_input6.value = "";
            }
        }else{
            mensaje3.style.display = "block";
            pantalla1.style.display = "none";
            pantalla2.style.display = "block";
            t_input4.value = "";
        }
    }else{
        mensaje2.style.display = "block";
        pantalla1.style.display = "none";
        pantalla2.style.display = "block";
        t_input3.value = "";
    }
}

function siguiente3(event){
    let mensaje6 = document.getElementById("mensaje6");
    let mensaje7 = document.getElementById("mensaje7");
    mensaje6.style.display = "none";
    mensaje7.style.display = "none";
    let input7 = document.getElementById("input7").value;
    let input8 = document.getElementById("input8").value;
    let t_input7 = document.getElementById("input7");
    let t_input8 = document.getElementById("input8");
    if(input7.length==0 && (input8.length==0 || input8 == "dd-mm-aaaa")){
        event.preventDefault();
    }
    if (/^[0-9]{9}$/.test(input7)){
        var fechaActual = new Date();
        var anoActual = fechaActual.getFullYear();
        var ano = parseInt(input8.split("-")[0], 10);
        if(/^(\d{4})-(\d{2})-(\d{2})$/.test(input8) && (ano >= 1900 && ano <= (anoActual - 14))){
            pantalla1.style.display = "none";
            pantalla2.style.display = "none";
            pantalla3.style.display = "none";
            pantalla4.style.display = "block";
            event.preventDefault();
        }else{
            mensaje7.style.display = "block";
            pantalla1.style.display = "none";
            pantalla2.style.display = "none";
            pantalla3.style.display = "block";
            t_input8.value = "";
        }
    }else{
        mensaje6.style.display = "block";
        pantalla1.style.display = "none";
        pantalla2.style.display = "none";
        pantalla3.style.display = "block";
        t_input7.value = "";
    }
}
//Deshabilitar la tecla de enter
document.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
      event.preventDefault();
    }
    });
//Deshabilitar la tecla de F5
document.addEventListener('keydown', function(event) {
    if (event.key === 'F5') {
        event.preventDefault();
    }
    });