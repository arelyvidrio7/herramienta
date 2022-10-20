//Mostrar y ocultar divs según el botón de comida seleccionado
function mostrarDesayuno(){
    document.getElementById('desayuno').style.display = 'block';
    document.getElementById('almuerzo').style.display = 'none';
    document.getElementById('comida').style.display = 'none';
    document.getElementById('merienda').style.display = 'none';
    document.getElementById('cena').style.display = 'none';
}

function mostrarAlmuerzo(){
    document.getElementById('desayuno').style.display = 'none';
    document.getElementById('almuerzo').style.display = 'block';
    document.getElementById('comida').style.display = 'none';
    document.getElementById('merienda').style.display = 'none';
    document.getElementById('cena').style.display = 'none';
}

function mostrarComida(){
    document.getElementById('desayuno').style.display = 'none';
    document.getElementById('almuerzo').style.display = 'none';
    document.getElementById('comida').style.display = 'block';
    document.getElementById('merienda').style.display = 'none';
    document.getElementById('cena').style.display = 'none';
}

function mostrarMerienda(){
    document.getElementById('desayuno').style.display = 'none';
    document.getElementById('almuerzo').style.display = 'none';
    document.getElementById('comida').style.display = 'none';
    document.getElementById('merienda').style.display = 'block';
    document.getElementById('cena').style.display = 'none';
}

function mostrarCena(){
    document.getElementById('desayuno').style.display = 'none';
    document.getElementById('almuerzo').style.display = 'none';
    document.getElementById('comida').style.display = 'none';
    document.getElementById('merienda').style.display = 'none';
    document.getElementById('cena').style.display = 'block';
}