
function colocar_valor(){
    var sexo = document.getElementById("sexo");
    var selected = sexo.options[sexo.selectedIndex].value;
    document.getElementById("resultado_sexo").value = selected;
}

function colocar_valor2(){
    var estado_civil = document.getElementById("estado_civil");
    var selected = estado_civil.options[estado_civil.selectedIndex].value;
    document.getElementById("resultado_civil").value = selected;
}

function colocar_valor3(){
    var escolaridad = document.getElementById("escolaridad");
    var selected = escolaridad.options[escolaridad.selectedIndex].value;
    document.getElementById("resultado_escolaridad").value = selected;
}

function colocar_valor4(){
    var actividad = document.getElementById("actividad");
    var selected = actividad.options[actividad.selectedIndex].value;
    document.getElementById("resultado_actividad").value = selected;
}

function colocar_valor5(){
    var apetito = document.getElementById("apetito");
    var selected = apetito.options[apetito.selectedIndex].value;
    document.getElementById("resultado_apetito").value = selected;
}