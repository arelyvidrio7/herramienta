function calculo_formulas(){
    var sexo = document.getElementById("sexo").value,
    edad = parseInt(document.getElementById("edad").value) || 0,
    talla = parseFloat(document.getElementById("talla").value) || 0,
    peso = parseFloat(document.getElementById("peso").value) || 0,
    altRodilla = parseFloat(document.getElementById("altRodilla").value) || 0,
    mediaBrazada = parseFloat(document.getElementById("mediaBrazada").value) || 0,
    select_geb = document.getElementById("select_geb").value,
    af = parseFloat(document.getElementById("af").value) || 0;

    /*GEB OMS*/
    oms_hombre = (13.5*peso)+487;
    oms_mujer = (10.5*peso)+596;

    if(sexo === "hombre" && select_geb === "oms" && peso > 0){
        document.getElementById("valor_geb").innerHTML = oms_hombre.toFixed(2)+" kcal";
    }else if(sexo === "mujer" && select_geb === "oms" && peso > 0){
        document.getElementById("valor_geb").innerHTML = oms_mujer.toFixed(2)+" kcal";
    }

    /*AF && GET OMS*/
    af1_h = (oms_hombre*1.2)-oms_hombre;
    af2_h = (oms_hombre*1.3)-oms_hombre;
    af3_h = (oms_hombre*1.5)-oms_hombre;
    af4_h = (oms_hombre*1.8)-oms_hombre;

    af1_m = (oms_mujer*1.2)-oms_mujer;
    af2_m = (oms_mujer*1.3)-oms_mujer;
    af3_m = (oms_mujer*1.5)-oms_mujer;
    af4_m = (oms_mujer*1.8)-oms_mujer;
    if(sexo === "hombre" && select_geb === "oms" && af === 1.2){
        document.getElementById("valor_af").innerHTML = af1_h.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (af1_h+oms_hombre).toFixed(2)+" kcal";
    }else if(sexo === "hombre" && select_geb === "oms" && af === 1.3){
        document.getElementById("valor_af").innerHTML = af2_h.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (af2_h+oms_hombre).toFixed(2)+" kcal";
    }else if(sexo === "hombre" && select_geb === "oms" && af === 1.5){
        document.getElementById("valor_af").innerHTML = af3_h.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (af3_h+oms_hombre).toFixed(2)+" kcal";
    }else if(sexo === "hombre" && select_geb === "oms" && af === 1.8){
        document.getElementById("valor_af").innerHTML = af4_h.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (af4_h+oms_hombre).toFixed(2)+" kcal";
    }

    if(sexo === "mujer" && select_geb === "oms" &&  af === 1.2){
        document.getElementById("valor_af").innerHTML = af1_m.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (af1_m+oms_mujer).toFixed(2)+" kcal";
    }else if(sexo === "mujer" && select_geb === "oms" &&  af === 1.3){
        document.getElementById("valor_af").innerHTML = af2_m.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (af2_m+oms_mujer).toFixed(2)+" kcal";
    }else if(sexo === "mujer" && select_geb === "oms" &&  af === 1.5){
        document.getElementById("valor_af").innerHTML = af3_m.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (af3_m+oms_mujer).toFixed(2)+" kcal";
    }else if(sexo === "mujer" && select_geb === "oms" &&  af === 1.8){
        document.getElementById("valor_af").innerHTML = af4_m.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (af4_m+oms_mujer).toFixed(2)+" kcal";
    }

    /*IMC*/
    imc = peso/(talla*talla);

    if(talla > 0 && peso > 0 && imc < 16){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Desnutrición severa";
    }else if(talla > 0 && peso > 0 && imc < 17){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Desnutrición moderada";
    }else if(talla > 0 && peso > 0 && imc < 18.5){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Desnutrición leve";
    }else if(talla > 0 && peso > 0 && imc < 22){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Peso insuficiente";
    }else if(talla > 0 && peso > 0 && imc < 27){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Peso normal";
    }else if(talla > 0 && peso > 0 && imc < 30){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Sobrepeso";
    }else if(talla > 0 && peso > 0 && imc < 35){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Obesidad grado I";
    }else if(talla > 0 && peso > 0 && imc < 40){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Obesidad grado II";
    }else if(talla > 0 && peso > 0 && imc < 50){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Obesidad grado III";
    }else if(talla > 0 && peso > 0 && imc >= 50){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Obesidad grado IV (Extrema)";
    }

    /* Talla x altura de rodilla */
    altRodilla_m = 84.88-(0.24*edad)+(1.83*altRodilla);
    altRodilla_h = 64.19-(0.04*edad)+(2.02*altRodilla);
    if(sexo === "mujer" && edad > 0 && altRodilla > 0){
        document.getElementById("valor_altRodilla").innerHTML = altRodilla_m.toFixed(2)+" Cm";
    }else if(sexo === "hombre" && edad > 0 && altRodilla > 0){
        document.getElementById("valor_altRodilla").innerHTML = altRodilla_h.toFixed(2)+" Cm";
    }

    /* Talla x media brazada */
    if(mediaBrazada > 0){
        document.getElementById("valor_mediaBrazada").innerHTML = (mediaBrazada*2).toFixed(2)+" Cm";
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