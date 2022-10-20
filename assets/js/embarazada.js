function calculo_formulas(){
    var sexo = document.getElementById("sexo").value,
    edad = parseInt(document.getElementById("edad").value) || 0,
    talla = parseFloat(document.getElementById("talla").value) || 0,
    tipo_emb = document.getElementById("tipo_emb").value,
    peso = parseFloat(document.getElementById("peso").value) || 0,
    peso_actual = parseFloat(document.getElementById("peso_actual").value) || 0,
    semanas = parseFloat(document.getElementById("semanas").value) || 0,
    eta = parseFloat(document.getElementById("eta").value) || 0,
    af = parseFloat(document.getElementById("af").value) || 0;


    /*GEB*/
    mult = (peso_actual*9.99)+(talla*100*6.25)-(edad*4.92);
    mifflin_mujer = mult-161;

    if(sexo === "mujer" && edad > 0 && talla > 0){
        document.getElementById("valor_geb").innerHTML = mifflin_mujer.toFixed(2)+" kcal";
    }

    /*ETA*/
    v_eta = eta/100;
    eta_mujer = mifflin_mujer*v_eta;

    if(sexo === "mujer"){
        document.getElementById("valor_eta").innerHTML = eta_mujer.toFixed(2)+" kcal";
    }

    /*AF && GET*/
    afm10 = mifflin_mujer*.10;
    afm20 = mifflin_mujer*.20;
    afm30 = mifflin_mujer*.30;

    if(sexo === "mujer"  && af === 10){
        document.getElementById("valor_af").innerHTML = afm10.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (afm10+mifflin_mujer+eta_mujer).toFixed(2)+" kcal";

    }else if(sexo === "mujer"  && af === 20){
        document.getElementById("valor_af").innerHTML = afm20.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (afm20+mifflin_mujer+eta_mujer).toFixed(2)+" kcal";
    }else if(sexo === "mujer"  && af === 30){
        document.getElementById("valor_af").innerHTML = afm30.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (afm30+mifflin_mujer+eta_mujer).toFixed(2)+" kcal";
    }


    /*IMC PRE-GESTACIONAL*/
    imc = peso/(talla*talla);

    if(talla > 0 && peso > 0 && imc < 18.5){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Peso Bajo";
    }else if(talla > 0 && peso > 0 && imc < 25){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Normopeso";
    }else if(talla > 0 && peso > 0 && imc < 30){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Sobrepeso";
    }else if(talla > 0 && peso > 0 && imc < 35){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Obesidad l";
    }else if(talla > 0 && peso > 0 && imc < 40){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Obesidad ll";
    }else if(talla > 0 && peso > 0 && imc >= 40){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Obesidad lll";
    }


    /*PESO ESPERADO SEGÚN SEMANAS DE GESTACIÓN*/
    uno = peso+(0.322*semanas);
    dos = peso+(0.267*semanas);
    tres = peso+(0.237*semanas);
    cuatro = peso+(0.183*semanas);

    if(tipo_emb == "unico" && peso > 0 && imc < 18.5){
        document.getElementById("peso_esperado").innerHTML = uno.toFixed(2)+" kg";
    }else if(tipo_emb == "unico" && peso > 0 && imc < 25){
        document.getElementById("peso_esperado").innerHTML = dos.toFixed(2)+" kg";
    }else if(tipo_emb == "unico" && peso > 0 && imc < 30){
        document.getElementById("peso_esperado").innerHTML = tres.toFixed(2)+" kg";
    }else if(tipo_emb == "unico" && peso > 0 && imc >= 30){
        document.getElementById("peso_esperado").innerHTML = cuatro.toFixed(2)+" kg";
    }


    /*GANANCIA DE PESO TOTAL SEGÚN IMC PREGESTACIONAL*/
    if(tipo_emb == "unico" && imc < 18.5){
        document.getElementById("peso_total").innerHTML = "12.5 a 18 kg";
    }else if(tipo_emb == "unico" && imc < 25){
        document.getElementById("peso_total").innerHTML = "11.5 a 16 kg";
    }else if(tipo_emb == "unico" && imc < 30){
        document.getElementById("peso_total").innerHTML = "7 a 11.5 kg";
    }else if(tipo_emb == "unico" && imc >= 30){
        document.getElementById("peso_total").innerHTML = "5 a 9 kg";
    }

    if(tipo_emb == "gemelar" && imc < 18.5){
        document.getElementById("peso_total").innerHTML = "No disponible";
    }else if(tipo_emb == "gemelar" && imc < 25){
        document.getElementById("peso_total").innerHTML = "17 a 25 kg";
    }else if(tipo_emb == "gemelar" && imc < 30){
        document.getElementById("peso_total").innerHTML = "14 a 23 kg";
    }else if(tipo_emb == "gemelar" && imc >= 30){
        document.getElementById("peso_total").innerHTML = "11 a 19 kg";
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
    var peso_actual = parseFloat(document.getElementById("peso_actual").value) || 0,
    valor_kcal = parseFloat(document.getElementById("valor_kcal").value) || 0,
    gr_carb2 = parseFloat(document.getElementById("gr_carb2").value) || 0,
    gr_lip2 = parseFloat(document.getElementById("gr_lip2").value) || 0,
    gr_prot2 = parseFloat(document.getElementById("gr_prot2").value) || 0;

    gr_peso1 = peso_actual*gr_carb2;
    document.getElementById("grxpeso1").innerHTML = gr_peso1.toFixed(2);

    kcal1 = 4*gr_peso1;
    document.getElementById("total_kc").innerHTML = kcal1.toFixed(2);

    porc1 = kcal1*100/valor_kcal;
    document.getElementById("total_%c").innerHTML = porc1.toFixed(2);

    /*LÍPIDOS*/
    gr_peso2 = peso_actual*gr_lip2;
    document.getElementById("grxpeso2").innerHTML = gr_peso2.toFixed(2);

    kcal2 = 9*gr_peso2;
    document.getElementById("total_kl").innerHTML = kcal2.toFixed(2);

    porc2 = kcal2*100/valor_kcal;
    document.getElementById("total_%l").innerHTML = porc2.toFixed(2);

    /*PROTEÍNA*/
    gr_peso3 = peso_actual*gr_prot2;
    document.getElementById("grxpeso3").innerHTML = gr_peso3.toFixed(2);

    kcal3 = 4*gr_peso3;
    document.getElementById("total_kp").innerHTML = kcal3.toFixed(2);

    porc3 = kcal3*100/valor_kcal;
    document.getElementById("total_%p").innerHTML = porc3.toFixed(2);
}