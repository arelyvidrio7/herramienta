function calculo_formulas(){
    var sexo = document.getElementById("sexo").value,
    edad = parseInt(document.getElementById("edad").value) || 0,
    talla = parseFloat(document.getElementById("talla").value) || 0,
    peso = parseFloat(document.getElementById("peso").value) || 0,
    cintura = parseFloat(document.getElementById("cintura").value) || 0,
    cadera = parseFloat(document.getElementById("cadera").value) || 0,
    cmu = parseFloat(document.getElementById("cmu").value) || 0,
    abdominal = parseFloat(document.getElementById("abdominal").value) || 0,
    bicipital = parseFloat(document.getElementById("bicipital").value) || 0,
    tricipital = parseFloat(document.getElementById("tricipital").value) || 0,
    suprailiaco = parseFloat(document.getElementById("suprailiaco").value) || 0,
    subescapular = parseFloat(document.getElementById("subescapular").value) || 0,
    porc_grasa = document.getElementById("porc_grasa").value,
    select_geb = document.getElementById("select_geb").value,
    eta = parseFloat(document.getElementById("eta").value) || 0,
    af = parseFloat(document.getElementById("af").value) || 0;

    /*PESO IDEAL*/
    formula = (edad*0.17)+(talla*100-100);
    pesoi_hombre = formula-6.78;
    pesoi_mujer = formula-7.71;

    /*GEB Mifflin*/
    mifflin = (peso*9.99)+(talla*100*6.25)-(edad*4.92);
    mifflin_hombre = mifflin+5;
    mifflin_mujer = mifflin-161;

    if(sexo === "hombre" && select_geb === "mifflin" && edad > 0 && talla > 0){
        document.getElementById("valor_pesoideal").innerHTML = pesoi_hombre.toFixed(2)+" kg";
        document.getElementById("valor_geb").innerHTML = mifflin_hombre.toFixed(2)+" kcal";
    }else if(sexo === "mujer" && select_geb === "mifflin" && edad > 0 && talla > 0){
        document.getElementById("valor_pesoideal").innerHTML = pesoi_mujer.toFixed(2)+" kg";
        document.getElementById("valor_geb").innerHTML = mifflin_mujer.toFixed(2)+" kcal";
    }

    /*GEB Harris*/
    harris_h = 65.5+(13.75*peso)+(5.08*(talla*100))-(6.78*edad);
    harris_m = 655.1+(9.56*peso)+(1.85*(talla*100))-(4.68*edad);
    
    if(sexo === "hombre" && select_geb === "harris" && edad > 0 && talla > 0){
        document.getElementById("valor_pesoideal").innerHTML = pesoi_hombre.toFixed(2)+" kg";
        document.getElementById("valor_geb").innerHTML = harris_h.toFixed(2)+" kcal";
    }else if(sexo === "mujer" && select_geb === "harris" && edad > 0 && talla > 0){
        document.getElementById("valor_pesoideal").innerHTML = pesoi_mujer.toFixed(2)+" kg";
        document.getElementById("valor_geb").innerHTML = harris_m.toFixed(2)+" kcal";
    }

    /*ETA mifflin*/
    v_eta = eta/100;
    eta_hombre = mifflin_hombre*v_eta;
    eta_mujer = mifflin_mujer*v_eta;
    if(sexo === "hombre" && select_geb === "mifflin"){
        document.getElementById("valor_eta").innerHTML = eta_hombre.toFixed(2)+" kcal";
    }else if(sexo === "mujer" && select_geb === "mifflin"){
        document.getElementById("valor_eta").innerHTML = eta_mujer.toFixed(2)+" kcal";
    }

    /*ETA Harris*/ 
    eta_h = harris_h*v_eta;
    eta_m = harris_m*v_eta;
    if(sexo === "hombre" && select_geb === "harris"){
        document.getElementById("valor_eta").innerHTML = eta_h.toFixed(2)+" kcal";
    }else if(sexo === "mujer" && select_geb === "harris"){
        document.getElementById("valor_eta").innerHTML = eta_m.toFixed(2)+" kcal";
    }

    /*AF && GET Mifflin*/
    afh10 = mifflin_hombre*.10;
    afh20 = mifflin_hombre*.20;
    afh30 = mifflin_hombre*.30;

    afm10 = mifflin_mujer*.10;
    afm20 = mifflin_mujer*.20;
    afm30 = mifflin_mujer*.30;
    if(sexo === "hombre" && select_geb === "mifflin" && af === 10){
        document.getElementById("valor_af").innerHTML = afh10.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (afh10+mifflin_hombre+eta_hombre).toFixed(2)+" kcal";
    }else if(sexo === "hombre" && select_geb === "mifflin" && af === 20){
        document.getElementById("valor_af").innerHTML = afh20.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (afh20+mifflin_hombre+eta_hombre).toFixed(2)+" kcal";
    }else if(sexo === "hombre" && select_geb === "mifflin" && af === 30){
        document.getElementById("valor_af").innerHTML = afh30.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (afh30+mifflin_hombre+eta_hombre).toFixed(2)+" kcal";
    }

    if(sexo === "mujer" && select_geb === "mifflin" &&  af === 10){
        document.getElementById("valor_af").innerHTML = afm10.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (afm10+mifflin_mujer+eta_mujer).toFixed(2)+" kcal";

    }else if(sexo === "mujer" && select_geb === "mifflin" &&  af === 20){
        document.getElementById("valor_af").innerHTML = afh20.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (afm20+mifflin_mujer+eta_mujer).toFixed(2)+" kcal";
    }else if(sexo === "mujer" && select_geb === "mifflin" &&  af === 30){
        document.getElementById("valor_af").innerHTML = afm30.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (afm30+mifflin_mujer+eta_mujer).toFixed(2)+" kcal";
    }


    /*AF && GET Harris*/
    af_h10 = harris_h*.10;
    af_h20 = harris_h*.20;
    af_h30 = harris_h*.30;

    af_m10 = harris_m*.10;
    af_m20 = harris_m*.20;
    af_m30 = harris_m*.30;
    if(sexo === "hombre" && select_geb === "harris" && af === 10){
        document.getElementById("valor_af").innerHTML = af_h10.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (af_h10+harris_h+eta_h).toFixed(2)+" kcal";
    }else if(sexo === "hombre" && select_geb === "harris" && af === 20){
        document.getElementById("valor_af").innerHTML = af_h20.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (af_h20+harris_h+eta_h).toFixed(2)+" kcal";
    }else if(sexo === "hombre" && select_geb === "harris" && af === 30){
        document.getElementById("valor_af").innerHTML = af_h30.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (af_h30+harris_h+eta_h).toFixed(2)+" kcal";
    }

    if(sexo === "mujer" && select_geb === "harris" && af === 10){
        document.getElementById("valor_af").innerHTML = af_m10.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (af_m10+harris_m+eta_m).toFixed(2)+" kcal";
    }else if(sexo === "mujer" && select_geb === "harris" && af === 20){
        document.getElementById("valor_af").innerHTML = af_m20.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (af_m20+harris_m+eta_m).toFixed(2)+" kcal";
    }else if(sexo === "mujer" && select_geb === "harris" && af === 30){
        document.getElementById("valor_af").innerHTML = af_m30.toFixed(2)+" kcal";
        document.getElementById("valor_get").innerHTML = (af_m30+harris_m+eta_m).toFixed(2)+" kcal";
    }


    /*IMC*/
    imc = peso/(talla*talla);

    if(talla > 0 && peso > 0 && imc < 16){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Delgadez (desnutrición) severa";
    }else if(talla > 0 && peso > 0 && imc < 17){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Delgadez (desnutrición) moderada";
    }else if(talla > 0 && peso > 0 && imc < 18.5){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Delgadez (desnutrición) leve";
    }else if(talla > 0 && peso > 0 && imc < 25){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Normopeso";
    }else if(talla > 0 && peso > 0 && imc < 30){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Sobrepeso";
    }else if(talla > 0 && peso > 0 && imc < 35){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Obesidad clase l";
    }else if(talla > 0 && peso > 0 && imc < 40){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Obesidad clase ll";
    }else if(talla > 0 && peso > 0 && imc >= 40){
        document.getElementById("valor_imc").innerHTML = imc.toFixed(2)+" kg/m²";
        document.getElementById("interpretacion_imc").innerHTML = "Obesidad clase lll";
    }

    /*PESO TEÓRICO*/
    pesoT = 50+0.75+(talla*100-150);

    if(talla > 1.5 && imc > 29.9){
        document.getElementById("valor_pesoteorico").innerHTML = pesoT.toFixed(2)+" kg";
    }

    /*PESO AJUSTADO*/
    pesoA = (peso-pesoT)*0.25+pesoT;

    if(talla > 1.5 && imc > 29.9){
        document.getElementById("valor_pesoajustado").innerHTML = pesoA.toFixed(2)+" kg";
    }


    /*COMPLEXIÓN*/
    complexion = (talla*100)/cmu;

    if(sexo === "hombre" && talla > 0 && cmu > 0 && complexion < 9.6){
        document.getElementById("valor_complexion").innerHTML = complexion.toFixed(2);
        document.getElementById("interpretacion_complexion").innerHTML = "Grande";
    }else if(sexo === "hombre" && talla > 0 && cmu > 0 && complexion <= 10.4){
        document.getElementById("valor_complexion").innerHTML = complexion.toFixed(2);
        document.getElementById("interpretacion_complexion").innerHTML = "Mediana";
    }else if(sexo === "hombre" && talla > 0 && cmu > 0 && complexion > 10.4){
        document.getElementById("valor_complexion").innerHTML = complexion.toFixed(2);
        document.getElementById("interpretacion_complexion").innerHTML = "Pequeña";
    }

    if(sexo === "mujer" && talla > 0 && cmu > 0 && complexion < 9.9){
        document.getElementById("valor_complexion").innerHTML = complexion.toFixed(2);
        document.getElementById("interpretacion_complexion").innerHTML = "Grande";
    }else if(sexo === "mujer" && talla > 0 && cmu > 0 && complexion <= 10.9){
        document.getElementById("valor_complexion").innerHTML = complexion.toFixed(2);
        document.getElementById("interpretacion_complexion").innerHTML = "Mediana";
    }else if(sexo === "mujer" && talla > 0 && cmu > 0 && complexion > 10.9){
        document.getElementById("valor_complexion").innerHTML = complexion.toFixed(2);
        document.getElementById("interpretacion_complexion").innerHTML = "Pequeña";
    }

    /*ICC*/
    icc = cintura/cadera;

    if(sexo === "hombre" && cintura > 0 && cadera > 0 && icc < 0.78){
        document.getElementById("valor_icc").innerHTML = icc.toFixed(2);
        document.getElementById("interpretacion_icc").innerHTML = "Síndrome ginecoide (cuerpo de pera)";
    }else if(sexo === "hombre" && cintura > 0 && cadera > 0 && icc <= 0.94){
        document.getElementById("valor_icc").innerHTML = icc.toFixed(2);
        document.getElementById("interpretacion_icc").innerHTML = "Valor normal";
    }else if(sexo === "hombre" && cintura > 0 && cadera > 0 && icc > 0.94){
        document.getElementById("valor_icc").innerHTML = icc.toFixed(2);
        document.getElementById("interpretacion_icc").innerHTML = "Síndrome androide (cuerpo de manzana)";
    }

    if(sexo === "mujer" && cintura > 0 && cadera > 0 && icc < 0.71){
        document.getElementById("valor_icc").innerHTML = icc.toFixed(2);
        document.getElementById("interpretacion_icc").innerHTML = "Síndrome ginecoide (cuerpo de pera)";
    }else if(sexo === "mujer" && cintura > 0 && cadera > 0 && icc <= 0.84){
        document.getElementById("valor_icc").innerHTML = icc.toFixed(2);
        document.getElementById("interpretacion_icc").innerHTML = "Valor normal";
    }else if(sexo === "mujer" && cintura > 0 && cadera > 0 && icc > 0.84){
        document.getElementById("valor_icc").innerHTML = icc.toFixed(2);
        document.getElementById("interpretacion_icc").innerHTML = "Síndrome androide (cuerpo de manzana)";
    }


    /*PORCENTAJE DE GRASA*/
    grasa1 = (abdominal+tricipital+suprailiaco+subescapular)*0.153+5.783;
    pln = Math.log(bicipital+tricipital+suprailiaco+subescapular);
    grasa2_mujer = -29.4+(pln*14.71);
    grasa2_hombre = -36.45+(pln*14.83);

    if(porc_grasa === "faulkner" && abdominal > 0 && tricipital > 0 && suprailiaco > 0 && subescapular > 0){
        document.getElementById("valor_grasa").innerHTML = grasa1.toFixed(2)+" %";
    }else if(porc_grasa === "ledesma" && sexo === "mujer" && bicipital > 0 && tricipital > 0 && suprailiaco > 0 && subescapular > 0){
        document.getElementById("valor_grasa").innerHTML = grasa2_mujer.toFixed(2)+" %";
    }else if(porc_grasa === "ledesma" && sexo === "hombre" && bicipital > 0 && tricipital > 0 && suprailiaco > 0 && subescapular > 0){
        document.getElementById("valor_grasa").innerHTML = grasa2_hombre.toFixed(2)+" %";
    }else{
        document.getElementById("valor_grasa").innerHTML = " ";
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
