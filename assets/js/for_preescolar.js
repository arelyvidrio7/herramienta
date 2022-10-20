const fechaNacimiento = document.getElementById("fechaNacimiento");
const edad = document.getElementById("edad");

const calcularEdad=(fechaNacimiento)=>{
    const fechaActual = new Date();
    const anoActual = parseInt(fechaActual.getFullYear());
    const mesActual = parseInt(fechaActual.getMonth()) +1;
    const diaActual = parseInt(fechaActual.getDate());

    const anoNacimiento = parseInt(String(fechaNacimiento).substring(0, 4));
    const mesNacimiento = parseInt(String(fechaNacimiento).substring(5, 7));
    const diaNacimiento = parseInt(String(fechaNacimiento).substring(8, 10));

    let anos = anoActual - anoNacimiento;
    let meses = mesActual - mesNacimiento;
    let restantes = 12 - mesNacimiento;
    let edad;

    if(anoActual === anoNacimiento){
        anos = 0;
        edad = anos + "," + meses;
    }else if(diaNacimiento > diaActual){
        meses--;
        edad = anos + "," + meses;
    }

    if(anoActual > anoNacimiento && mesActual < mesNacimiento){
        anos--;
        meses = 0;
        meses = restantes + mesActual;
        edad = anos + "," + meses;
    }else if(mesActual === mesNacimiento){
        if(diaNacimiento > diaActual){
            anos--;
            meses = 0;
            meses = (restantes + mesActual) -1;
            edad = anos + "," + meses;
        }
    }

    if(anoActual > anoNacimiento && mesActual > mesNacimiento){
        edad = anos + "," + meses;
    }else if(mesActual === mesNacimiento){
        if(diaNacimiento > diaActual){
            meses = (mesActual - mesNacimiento) -1;
            edad = anos + "," + meses;
        }
    }

    return edad;
};

window.addEventListener('load', function() {
    fechaNacimiento.addEventListener('change', function() {
        if(this.value){
            edad.value = `${calcularEdad(this.value)}`;
        }
    });
});


function calcularFormulas(){
    var talla = parseFloat(document.getElementById("talla").value) || 0,
    peso = parseFloat(document.getElementById("peso").value) || 0;

    /*IMC*/
    talla_m = talla / 100;
    imc = peso/(talla_m*talla_m);

    if(talla > 0 && peso > 0){
        document.getElementById("valor_imc").value = imc.toFixed(2);
    }
}

function macros(){
    /*MACROS*/
    var valor_kcal = parseFloat(document.getElementById("valor_kcal").value) || 0,
    porc_carb = parseFloat(document.getElementById("porc_carb").value) || 0,
    porc_lip = parseFloat(document.getElementById("porc_lip").value) || 0,
    porc_prot = parseFloat(document.getElementById("porc_prot").value) || 0;

        porc_c = porc_carb/100;
        porc_l = porc_lip/100;
        porc_p = porc_prot/100;
    
        kcal_c = valor_kcal*porc_c;
        kcal_l = valor_kcal*porc_l;
        kcal_p = valor_kcal*porc_p;
    
        document.getElementById("kcal_carb").innerHTML = kcal_c.toFixed(2);
        document.getElementById("kcal_lip").innerHTML = kcal_l.toFixed(2);
        document.getElementById("kcal_prot").innerHTML = kcal_p.toFixed(2);
    
        document.getElementById("gr_carb").innerHTML = (kcal_c/4).toFixed(2);
        document.getElementById("gr_lip").innerHTML = (kcal_l/9).toFixed(2);
        document.getElementById("gr_prot").innerHTML = (kcal_p/4).toFixed(2);
        
    
}

function porciento_macros(){
    /*PORCENTAJE*/
    var peso = parseFloat(document.getElementById("peso").value) || 0,
    valor_kcal = parseFloat(document.getElementById("valor_kcal").value) || 0,
    gr_carb2 = parseFloat(document.getElementById("gr_carb2").value) || 0,
    gr_lip2 = parseFloat(document.getElementById("gr_lip2").value) || 0,
    gr_prot2 = parseFloat(document.getElementById("gr_prot2").value) || 0;

    /*CARBOHIDRATOS*/
    gr_peso1 = peso*gr_carb2;
    document.getElementById("grxpeso1").innerHTML = gr_peso1.toFixed(2);

    kcal1 = 4*gr_peso1;
    document.getElementById("total_kc").innerHTML = kcal1.toFixed(2);

    porc1 = kcal1*100/valor_kcal;
    document.getElementById("total_%c").innerHTML = porc1.toFixed(2);

    /*LÍPIDOS*/
    gr_peso2 = peso*gr_lip2;
    document.getElementById("grxpeso2").innerHTML = gr_peso2.toFixed(2);

    kcal2 = 9*gr_peso2;
    document.getElementById("total_kl").innerHTML = kcal2.toFixed(2);

    porc2 = kcal2*100/valor_kcal;
    document.getElementById("total_%l").innerHTML = porc2.toFixed(2);

    /*PROTEÍNAS*/
    gr_peso3 = peso*gr_prot2;
    document.getElementById("grxpeso3").innerHTML = gr_peso3.toFixed(2);

    kcal3 = 4*gr_peso3;
    document.getElementById("total_kp").innerHTML = kcal3.toFixed(2);

    porc3 = kcal3*100/valor_kcal;
    document.getElementById("total_%p").innerHTML = porc3.toFixed(2);

} 
