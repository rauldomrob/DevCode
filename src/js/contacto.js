var currentOpenDivId = null;

//Mostrar y ocultar divs cuando se pulsan los signos de más
function mostrarOcultarDiv(divOcultoId, divMovClass){
    var divOculto = document.getElementById(divOcultoId);
    var divsMov = document.querySelectorAll('.' + divMovClass);

    if(currentOpenDivId && currentOpenDivId !== divOcultoId){
        var currentlyOpenDiv = document.getElementById(currentOpenDivId);
        currentlyOpenDiv.style.display = 'none';
        var currentlyOpendivsMov = document.querySelectorAll('.' + currentOpenDivId.replace('hidden', 'moving'));
        currentlyOpendivsMov.forEach(function(div) {
            div.style.marginTop = '5px';
        });
        currentOpenDivId = null;
    }
    if(divOculto.style.display === 'none' || divOculto.style.display === ''){
        
        divOculto.style.display = 'block';
        divsMov.forEach(function(div) {
            div.style.marginTop = '40px';
        });
        currentOpenDivId = divOcultoId;
        }else {
        divOculto.style.display = 'none';
        divsMov.forEach(function(div){
            div.style.marginTop = '5px';
        });
        currentOpenDivId = null;
    }
}

//Rotar el signo de más pulsado.
const rotatedImages = {};
function girar(flechita, flechita1, flechita2, flechita3, flechita4, flechita5) {
  const flechitas = [flechita, flechita1, flechita2, flechita3, flechita4, flechita5];
  flechitas.forEach(id => {
    const flecha = document.getElementById(id);
    if (flecha) {
      rotatedImages[id] = false;
      flecha.style.transform = 'rotate(0deg)';
    }
  });
  const flecha = document.getElementById(flechitas[0]);
  if (flecha) {
    rotatedImages[flechitas[0]] = !rotatedImages[flechitas[0]];

    if (rotatedImages[flechitas[0]]) {
      flecha.style.transform = 'rotate(180deg)';
    } else {
      flecha.style.transform = 'rotate(0deg)';
    }
  }
}
