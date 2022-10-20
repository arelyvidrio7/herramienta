//TABLAS APORTE NUTRIMENTAL PROMEDIO Y DISTRIBUCIÓN POR TIEMPO DE COMIDA

function calculo_dist(){
    //KCAL Y MACROS
    var valor_kcal = parseFloat(document.getElementById("valor_kcal").value) || 0,
    porc_carb = parseFloat(document.getElementById("porc_carb").value) || 0,
    porc_lip = parseFloat(document.getElementById("porc_lip").value) || 0,
    porc_prot = parseFloat(document.getElementById("porc_prot").value) || 0,
    //TABLAS DE DISTRIBUCIÓN
    eq1 = parseFloat(document.getElementById("eq1").value) || 0,
    energia_eq1 = parseFloat(document.getElementById("energia_eq1").innerHTML) || 0,
    proteina_eq1 = parseFloat(document.getElementById("proteina_eq1").innerHTML) || 0,
    lipidos_eq1 = parseFloat(document.getElementById("lipidos_eq1").innerHTML) || 0,
    carbos_eq1 = parseFloat(document.getElementById("carbos_eq1").innerHTML) || 0,
    eq2 = parseFloat(document.getElementById("eq2").value) || 0,
    energia_eq2 = parseFloat(document.getElementById("energia_eq2").innerHTML) || 0,
    proteina_eq2 = parseFloat(document.getElementById("proteina_eq2").innerHTML) || 0,
    lipidos_eq2 = parseFloat(document.getElementById("lipidos_eq2").innerHTML) || 0,
    carbos_eq2 = parseFloat(document.getElementById("carbos_eq2").innerHTML) || 0,
    eq3 = parseFloat(document.getElementById("eq3").value) || 0,
    energia_eq3 = parseFloat(document.getElementById("energia_eq3").innerHTML) || 0,
    proteina_eq3 = parseFloat(document.getElementById("proteina_eq3").innerHTML) || 0,
    lipidos_eq3 = parseFloat(document.getElementById("lipidos_eq3").innerHTML) || 0,
    carbos_eq3 = parseFloat(document.getElementById("carbos_eq3").innerHTML) || 0,
    eq4 = parseFloat(document.getElementById("eq4").value) || 0,
    energia_eq4 = parseFloat(document.getElementById("energia_eq4").innerHTML) || 0,
    proteina_eq4 = parseFloat(document.getElementById("proteina_eq4").innerHTML) || 0,
    lipidos_eq4 = parseFloat(document.getElementById("lipidos_eq4").innerHTML) || 0,
    carbos_eq4 = parseFloat(document.getElementById("carbos_eq4").innerHTML) || 0,
    eq5 = parseFloat(document.getElementById("eq5").value) || 0,
    energia_eq5 = parseFloat(document.getElementById("energia_eq5").innerHTML) || 0,
    proteina_eq5 = parseFloat(document.getElementById("proteina_eq5").innerHTML) || 0,
    lipidos_eq5 = parseFloat(document.getElementById("lipidos_eq5").innerHTML) || 0,
    carbos_eq5 = parseFloat(document.getElementById("carbos_eq5").innerHTML) || 0,
    eq6 = parseFloat(document.getElementById("eq6").value) || 0,
    energia_eq6 = parseFloat(document.getElementById("energia_eq6").innerHTML) || 0,
    proteina_eq6 = parseFloat(document.getElementById("proteina_eq6").innerHTML) || 0,
    lipidos_eq6 = parseFloat(document.getElementById("lipidos_eq6").innerHTML) || 0,
    carbos_eq6 = parseFloat(document.getElementById("carbos_eq6").innerHTML) || 0,
    eq7 = parseFloat(document.getElementById("eq7").value) || 0,
    energia_eq7 = parseFloat(document.getElementById("energia_eq7").innerHTML) || 0,
    proteina_eq7 = parseFloat(document.getElementById("proteina_eq7").innerHTML) || 0,
    lipidos_eq7 = parseFloat(document.getElementById("lipidos_eq7").innerHTML) || 0,
    carbos_eq7 = parseFloat(document.getElementById("carbos_eq7").innerHTML) || 0,
    eq8 = parseFloat(document.getElementById("eq8").value) || 0,
    energia_eq8 = parseFloat(document.getElementById("energia_eq8").innerHTML) || 0,
    proteina_eq8 = parseFloat(document.getElementById("proteina_eq8").innerHTML) || 0,
    lipidos_eq8 = parseFloat(document.getElementById("lipidos_eq8").innerHTML) || 0,
    carbos_eq8 = parseFloat(document.getElementById("carbos_eq8").innerHTML) || 0,
    eq9 = parseFloat(document.getElementById("eq9").value) || 0,
    energia_eq9 = parseFloat(document.getElementById("energia_eq9").innerHTML) || 0,
    proteina_eq9 = parseFloat(document.getElementById("proteina_eq9").innerHTML) || 0,
    lipidos_eq9 = parseFloat(document.getElementById("lipidos_eq9").innerHTML) || 0,
    carbos_eq9 = parseFloat(document.getElementById("carbos_eq9").innerHTML) || 0,
    eq10 = parseFloat(document.getElementById("eq10").value) || 0,
    energia_eq10 = parseFloat(document.getElementById("energia_eq10").innerHTML) || 0,
    proteina_eq10 = parseFloat(document.getElementById("proteina_eq10").innerHTML) || 0,
    lipidos_eq10 = parseFloat(document.getElementById("lipidos_eq10").innerHTML) || 0,
    carbos_eq10 = parseFloat(document.getElementById("carbos_eq10").innerHTML) || 0,
    eq11 = parseFloat(document.getElementById("eq11").value) || 0,
    energia_eq11 = parseFloat(document.getElementById("energia_eq11").innerHTML) || 0,
    proteina_eq11 = parseFloat(document.getElementById("proteina_eq11").innerHTML) || 0,
    lipidos_eq11 = parseFloat(document.getElementById("lipidos_eq11").innerHTML) || 0,
    carbos_eq11 = parseFloat(document.getElementById("carbos_eq11").innerHTML) || 0,
    eq12 = parseFloat(document.getElementById("eq12").value) || 0,
    energia_eq12 = parseFloat(document.getElementById("energia_eq12").innerHTML) || 0,
    proteina_eq12 = parseFloat(document.getElementById("proteina_eq12").innerHTML) || 0,
    lipidos_eq12 = parseFloat(document.getElementById("lipidos_eq12").innerHTML) || 0,
    carbos_eq12 = parseFloat(document.getElementById("carbos_eq12").innerHTML) || 0,
    eq13 = parseFloat(document.getElementById("eq13").value) || 0,
    energia_eq13 = parseFloat(document.getElementById("energia_eq13").innerHTML) || 0,
    proteina_eq13 = parseFloat(document.getElementById("proteina_eq13").innerHTML) || 0,
    lipidos_eq13 = parseFloat(document.getElementById("lipidos_eq13").innerHTML) || 0,
    carbos_eq13 = parseFloat(document.getElementById("carbos_eq13").innerHTML) || 0,
    eq14 = parseFloat(document.getElementById("eq14").value) || 0,
    energia_eq14 = parseFloat(document.getElementById("energia_eq14").innerHTML) || 0,
    proteina_eq14 = parseFloat(document.getElementById("proteina_eq14").innerHTML) || 0,
    lipidos_eq14 = parseFloat(document.getElementById("lipidos_eq14").innerHTML) || 0,
    carbos_eq14 = parseFloat(document.getElementById("carbos_eq14").innerHTML) || 0,
    eq15 = parseFloat(document.getElementById("eq15").value) || 0,
    energia_eq15 = parseFloat(document.getElementById("energia_eq15").innerHTML) || 0,
    proteina_eq15 = parseFloat(document.getElementById("proteina_eq15").innerHTML) || 0,
    lipidos_eq15 = parseFloat(document.getElementById("lipidos_eq15").innerHTML) || 0,
    carbos_eq15 = parseFloat(document.getElementById("carbos_eq15").innerHTML) || 0,
    eq16 = parseFloat(document.getElementById("eq16").value) || 0,
    energia_eq16 = parseFloat(document.getElementById("energia_eq16").innerHTML) || 0,
    proteina_eq16 = parseFloat(document.getElementById("proteina_eq16").innerHTML) || 0,
    lipidos_eq16 = parseFloat(document.getElementById("lipidos_eq16").innerHTML) || 0,
    carbos_eq16 = parseFloat(document.getElementById("carbos_eq16").innerHTML) || 0,
    eq17 = parseFloat(document.getElementById("eq17").value) || 0,
    energia_eq17 = parseFloat(document.getElementById("energia_eq17").innerHTML) || 0,
    proteina_eq17 = parseFloat(document.getElementById("proteina_eq17").innerHTML) || 0,
    lipidos_eq17 = parseFloat(document.getElementById("lipidos_eq17").innerHTML) || 0,
    carbos_eq17 = parseFloat(document.getElementById("carbos_eq17").innerHTML) || 0,
    eq18 = parseFloat(document.getElementById("eq18").value) || 0,
    energia_eq18 = parseFloat(document.getElementById("energia_eq18").innerHTML) || 0,
    proteina_eq18 = parseFloat(document.getElementById("proteina_eq18").innerHTML) || 0,
    lipidos_eq18 = parseFloat(document.getElementById("lipidos_eq18").innerHTML) || 0,
    carbos_eq18 = parseFloat(document.getElementById("carbos_eq18").innerHTML) || 0,
    eq19 = parseFloat(document.getElementById("eq19").value) || 0,
    energia_eq19 = parseFloat(document.getElementById("energia_eq19").innerHTML) || 0,
    proteina_eq19 = parseFloat(document.getElementById("proteina_eq19").innerHTML) || 0,
    lipidos_eq19 = parseFloat(document.getElementById("lipidos_eq19").innerHTML) || 0,
    carbos_eq19 = parseFloat(document.getElementById("carbos_eq19").innerHTML) || 0,
    eq20 = parseFloat(document.getElementById("eq20").value) || 0,
    energia_eq20 = parseFloat(document.getElementById("energia_eq20").value) || 0,
    proteina_eq20 = parseFloat(document.getElementById("proteina_eq20").value) || 0,
    lipidos_eq20 = parseFloat(document.getElementById("lipidos_eq20").value) || 0,
    carbos_eq20 = parseFloat(document.getElementById("carbos_eq20").value) || 0,
    otro_subgrupo = document.getElementById("otro_subgrupo").value || "";

    //Obteniendo el porcentaje en decimales
    porc_c = porc_carb/100;
    porc_l = porc_lip/100;
    porc_p = porc_prot/100;

    //Obteniendo los gramos de cada macro
    grs_c = (valor_kcal*porc_c)/4;
    grs_l = (valor_kcal*porc_l)/9;
    grs_p = (valor_kcal*porc_p)/4;

    document.getElementById("energia_r1").innerHTML = eq1*energia_eq1;
    document.getElementById("proteina_r1").innerHTML = eq1*proteina_eq1;
    document.getElementById("lipidos_r1").innerHTML = eq1*lipidos_eq1;
    document.getElementById("carbos_r1").innerHTML = eq1*carbos_eq1;
    document.getElementById("energia_r2").innerHTML = eq2*energia_eq2;
    document.getElementById("proteina_r2").innerHTML = eq2*proteina_eq2;
    document.getElementById("lipidos_r2").innerHTML = eq2*lipidos_eq2;
    document.getElementById("carbos_r2").innerHTML = eq2*carbos_eq2;
    document.getElementById("energia_r3").innerHTML = eq3*energia_eq3;
    document.getElementById("proteina_r3").innerHTML = eq3*proteina_eq3;
    document.getElementById("lipidos_r3").innerHTML = eq3*lipidos_eq3;
    document.getElementById("carbos_r3").innerHTML = eq3*carbos_eq3;
    document.getElementById("energia_r4").innerHTML = eq4*energia_eq4;
    document.getElementById("proteina_r4").innerHTML = eq4*proteina_eq4;
    document.getElementById("lipidos_r4").innerHTML = eq4*lipidos_eq4;
    document.getElementById("carbos_r4").innerHTML = eq4*carbos_eq4;
    document.getElementById("energia_r5").innerHTML = eq5*energia_eq5;
    document.getElementById("proteina_r5").innerHTML = eq5*proteina_eq5;
    document.getElementById("lipidos_r5").innerHTML = eq5*lipidos_eq5;
    document.getElementById("carbos_r5").innerHTML = eq5*carbos_eq5;
    document.getElementById("energia_r6").innerHTML = eq6*energia_eq6;
    document.getElementById("proteina_r6").innerHTML = eq6*proteina_eq6;
    document.getElementById("lipidos_r6").innerHTML = eq6*lipidos_eq6;
    document.getElementById("carbos_r6").innerHTML = eq6*carbos_eq6;
    document.getElementById("energia_r7").innerHTML = eq7*energia_eq7;
    document.getElementById("proteina_r7").innerHTML = eq7*proteina_eq7;
    document.getElementById("lipidos_r7").innerHTML = eq7*lipidos_eq7;
    document.getElementById("carbos_r7").innerHTML = eq7*carbos_eq7;
    document.getElementById("energia_r8").innerHTML = eq8*energia_eq8;
    document.getElementById("proteina_r8").innerHTML = eq8*proteina_eq8;
    document.getElementById("lipidos_r8").innerHTML = eq8*lipidos_eq8;
    document.getElementById("carbos_r8").innerHTML = eq8*carbos_eq8;
    document.getElementById("energia_r9").innerHTML = eq9*energia_eq9;
    document.getElementById("proteina_r9").innerHTML = eq9*proteina_eq9;
    document.getElementById("lipidos_r9").innerHTML = eq9*lipidos_eq9;
    document.getElementById("carbos_r9").innerHTML = eq9*carbos_eq9;
    document.getElementById("energia_r10").innerHTML = eq10*energia_eq10;
    document.getElementById("proteina_r10").innerHTML = eq10*proteina_eq10;
    document.getElementById("lipidos_r10").innerHTML = eq10*lipidos_eq10;
    document.getElementById("carbos_r10").innerHTML = eq10*carbos_eq10;
    document.getElementById("energia_r11").innerHTML = eq11*energia_eq11;
    document.getElementById("proteina_r11").innerHTML = eq11*proteina_eq11;
    document.getElementById("lipidos_r11").innerHTML = eq11*lipidos_eq11;
    document.getElementById("carbos_r11").innerHTML = eq11*carbos_eq11;
    document.getElementById("energia_r12").innerHTML = eq12*energia_eq12;
    document.getElementById("proteina_r12").innerHTML = eq12*proteina_eq12;
    document.getElementById("lipidos_r12").innerHTML = eq12*lipidos_eq12;
    document.getElementById("carbos_r12").innerHTML = eq12*carbos_eq12;
    document.getElementById("energia_r13").innerHTML = eq13*energia_eq13;
    document.getElementById("proteina_r13").innerHTML = eq13*proteina_eq13;
    document.getElementById("lipidos_r13").innerHTML = eq13*lipidos_eq13;
    document.getElementById("carbos_r13").innerHTML = eq13*carbos_eq13;
    document.getElementById("energia_r14").innerHTML = eq14*energia_eq14;
    document.getElementById("proteina_r14").innerHTML = eq14*proteina_eq14;
    document.getElementById("lipidos_r14").innerHTML = eq14*lipidos_eq14;
    document.getElementById("carbos_r14").innerHTML = eq14*carbos_eq14;
    document.getElementById("energia_r15").innerHTML = eq15*energia_eq15;
    document.getElementById("proteina_r15").innerHTML = eq15*proteina_eq15;
    document.getElementById("lipidos_r15").innerHTML = eq15*lipidos_eq15;
    document.getElementById("carbos_r15").innerHTML = eq15*carbos_eq15;
    document.getElementById("energia_r16").innerHTML = eq16*energia_eq16;
    document.getElementById("proteina_r16").innerHTML = eq16*proteina_eq16;
    document.getElementById("lipidos_r16").innerHTML = eq16*lipidos_eq16;
    document.getElementById("carbos_r16").innerHTML = eq16*carbos_eq16;
    document.getElementById("energia_r17").innerHTML = eq17*energia_eq17;
    document.getElementById("proteina_r17").innerHTML = eq17*proteina_eq17;
    document.getElementById("lipidos_r17").innerHTML = eq17*lipidos_eq17;
    document.getElementById("carbos_r17").innerHTML = eq17*carbos_eq17;
    document.getElementById("energia_r18").innerHTML = eq18*energia_eq18;
    document.getElementById("proteina_r18").innerHTML = eq18*proteina_eq18;
    document.getElementById("lipidos_r18").innerHTML = eq18*lipidos_eq18;
    document.getElementById("carbos_r18").innerHTML = eq18*carbos_eq18;
    document.getElementById("energia_r19").innerHTML = eq19*energia_eq19;
    document.getElementById("proteina_r19").innerHTML = eq19*proteina_eq19;
    document.getElementById("lipidos_r19").innerHTML = eq19*lipidos_eq19;
    document.getElementById("carbos_r19").innerHTML = eq19*carbos_eq19;
    document.getElementById("energia_r20").innerHTML = eq20*energia_eq20;
    document.getElementById("proteina_r20").innerHTML = eq20*proteina_eq20;
    document.getElementById("lipidos_r20").innerHTML = eq20*lipidos_eq20;
    document.getElementById("carbos_r20").innerHTML = eq20*carbos_eq20;
    //Copiamos los valores de la primera tabla a la tabla2
    document.getElementById("copiar1").innerHTML = eq1;
    document.getElementById("copiar2").innerHTML = eq2;
    document.getElementById("copiar3").innerHTML = eq3;
    document.getElementById("copiar4").innerHTML = eq4;
    document.getElementById("copiar5").innerHTML = eq5;
    document.getElementById("copiar6").innerHTML = eq6;
    document.getElementById("copiar7").innerHTML = eq7;
    document.getElementById("copiar8").innerHTML = eq8;
    document.getElementById("copiar9").innerHTML = eq9;
    document.getElementById("copiar10").innerHTML = eq10;
    document.getElementById("copiar11").innerHTML = eq11;
    document.getElementById("copiar12").innerHTML = eq12;
    document.getElementById("copiar13").innerHTML = eq13;
    document.getElementById("copiar14").innerHTML = eq14;
    document.getElementById("copiar15").innerHTML = eq15;
    document.getElementById("copiar16").innerHTML = eq16;
    document.getElementById("copiar17").innerHTML = eq17;
    document.getElementById("copiar18").innerHTML = eq18;
    document.getElementById("copiar19").innerHTML = eq19;
    document.getElementById("copiar20").innerHTML = eq20;
    document.getElementById("copiar_subgrupo").innerHTML = otro_subgrupo;

    //TOTALES
    var energia_r1 = parseFloat(document.getElementById("energia_r1").innerHTML) || 0,
    energia_r2 = parseFloat(document.getElementById("energia_r2").innerHTML) || 0,
    energia_r3 = parseFloat(document.getElementById("energia_r3").innerHTML) || 0,
    energia_r4 = parseFloat(document.getElementById("energia_r4").innerHTML) || 0,
    energia_r5 = parseFloat(document.getElementById("energia_r5").innerHTML) || 0,
    energia_r6 = parseFloat(document.getElementById("energia_r6").innerHTML) || 0,
    energia_r7 = parseFloat(document.getElementById("energia_r7").innerHTML) || 0,
    energia_r8 = parseFloat(document.getElementById("energia_r8").innerHTML) || 0,
    energia_r9 = parseFloat(document.getElementById("energia_r9").innerHTML) || 0,
    energia_r10 = parseFloat(document.getElementById("energia_r10").innerHTML) || 0,
    energia_r11 = parseFloat(document.getElementById("energia_r11").innerHTML) || 0,
    energia_r12 = parseFloat(document.getElementById("energia_r12").innerHTML) || 0,
    energia_r13 = parseFloat(document.getElementById("energia_r13").innerHTML) || 0,
    energia_r14 = parseFloat(document.getElementById("energia_r14").innerHTML) || 0,
    energia_r15 = parseFloat(document.getElementById("energia_r15").innerHTML) || 0,
    energia_r16 = parseFloat(document.getElementById("energia_r16").innerHTML) || 0,
    energia_r17 = parseFloat(document.getElementById("energia_r17").innerHTML) || 0,
    energia_r18 = parseFloat(document.getElementById("energia_r18").innerHTML) || 0,
    energia_r19 = parseFloat(document.getElementById("energia_r19").innerHTML) || 0,
    energia_r20 = parseFloat(document.getElementById("energia_r20").innerHTML) || 0,
    proteina_r1 = parseFloat(document.getElementById("proteina_r1").innerHTML) || 0,
    proteina_r2 = parseFloat(document.getElementById("proteina_r2").innerHTML) || 0,
    proteina_r3 = parseFloat(document.getElementById("proteina_r3").innerHTML) || 0,
    proteina_r4 = parseFloat(document.getElementById("proteina_r4").innerHTML) || 0,
    proteina_r5 = parseFloat(document.getElementById("proteina_r5").innerHTML) || 0,
    proteina_r6 = parseFloat(document.getElementById("proteina_r6").innerHTML) || 0,
    proteina_r7 = parseFloat(document.getElementById("proteina_r7").innerHTML) || 0,
    proteina_r8 = parseFloat(document.getElementById("proteina_r8").innerHTML) || 0,
    proteina_r9 = parseFloat(document.getElementById("proteina_r9").innerHTML) || 0,
    proteina_r10 = parseFloat(document.getElementById("proteina_r10").innerHTML) || 0,
    proteina_r11 = parseFloat(document.getElementById("proteina_r11").innerHTML) || 0,
    proteina_r12 = parseFloat(document.getElementById("proteina_r12").innerHTML) || 0,
    proteina_r13 = parseFloat(document.getElementById("proteina_r13").innerHTML) || 0,
    proteina_r14 = parseFloat(document.getElementById("proteina_r14").innerHTML) || 0,
    proteina_r15 = parseFloat(document.getElementById("proteina_r15").innerHTML) || 0,
    proteina_r16 = parseFloat(document.getElementById("proteina_r16").innerHTML) || 0,
    proteina_r17 = parseFloat(document.getElementById("proteina_r17").innerHTML) || 0,
    proteina_r18 = parseFloat(document.getElementById("proteina_r18").innerHTML) || 0,
    proteina_r19 = parseFloat(document.getElementById("proteina_r19").innerHTML) || 0,
    proteina_r20 = parseFloat(document.getElementById("proteina_r20").innerHTML) || 0,
    lipidos_r1 = parseFloat(document.getElementById("lipidos_r1").innerHTML) || 0,
    lipidos_r2 = parseFloat(document.getElementById("lipidos_r2").innerHTML) || 0,
    lipidos_r3 = parseFloat(document.getElementById("lipidos_r3").innerHTML) || 0,
    lipidos_r4 = parseFloat(document.getElementById("lipidos_r4").innerHTML) || 0,
    lipidos_r5 = parseFloat(document.getElementById("lipidos_r5").innerHTML) || 0,
    lipidos_r6 = parseFloat(document.getElementById("lipidos_r6").innerHTML) || 0,
    lipidos_r7 = parseFloat(document.getElementById("lipidos_r7").innerHTML) || 0,
    lipidos_r8 = parseFloat(document.getElementById("lipidos_r8").innerHTML) || 0,
    lipidos_r9 = parseFloat(document.getElementById("lipidos_r9").innerHTML) || 0,
    lipidos_r10 = parseFloat(document.getElementById("lipidos_r10").innerHTML) || 0,
    lipidos_r11 = parseFloat(document.getElementById("lipidos_r11").innerHTML) || 0,
    lipidos_r12 = parseFloat(document.getElementById("lipidos_r12").innerHTML) || 0,
    lipidos_r13 = parseFloat(document.getElementById("lipidos_r13").innerHTML) || 0,
    lipidos_r14 = parseFloat(document.getElementById("lipidos_r14").innerHTML) || 0,
    lipidos_r15 = parseFloat(document.getElementById("lipidos_r15").innerHTML) || 0,
    lipidos_r16 = parseFloat(document.getElementById("lipidos_r16").innerHTML) || 0,
    lipidos_r17 = parseFloat(document.getElementById("lipidos_r17").innerHTML) || 0,
    lipidos_r18 = parseFloat(document.getElementById("lipidos_r18").innerHTML) || 0,
    lipidos_r19 = parseFloat(document.getElementById("lipidos_r19").innerHTML) || 0,
    lipidos_r20 = parseFloat(document.getElementById("lipidos_r20").innerHTML) || 0,
    carbos_r1 = parseFloat(document.getElementById("carbos_r1").innerHTML) || 0,
    carbos_r2 = parseFloat(document.getElementById("carbos_r2").innerHTML) || 0,
    carbos_r3 = parseFloat(document.getElementById("carbos_r3").innerHTML) || 0,
    carbos_r4 = parseFloat(document.getElementById("carbos_r4").innerHTML) || 0,
    carbos_r5 = parseFloat(document.getElementById("carbos_r5").innerHTML) || 0,
    carbos_r6 = parseFloat(document.getElementById("carbos_r6").innerHTML) || 0,
    carbos_r7 = parseFloat(document.getElementById("carbos_r7").innerHTML) || 0,
    carbos_r8 = parseFloat(document.getElementById("carbos_r8").innerHTML) || 0,
    carbos_r9 = parseFloat(document.getElementById("carbos_r9").innerHTML) || 0,
    carbos_r10 = parseFloat(document.getElementById("carbos_r10").innerHTML) || 0,
    carbos_r11 = parseFloat(document.getElementById("carbos_r11").innerHTML) || 0,
    carbos_r12 = parseFloat(document.getElementById("carbos_r12").innerHTML) || 0,
    carbos_r13 = parseFloat(document.getElementById("carbos_r13").innerHTML) || 0,
    carbos_r14 = parseFloat(document.getElementById("carbos_r14").innerHTML) || 0,
    carbos_r15 = parseFloat(document.getElementById("carbos_r15").innerHTML) || 0,
    carbos_r16 = parseFloat(document.getElementById("carbos_r16").innerHTML) || 0,
    carbos_r17 = parseFloat(document.getElementById("carbos_r17").innerHTML) || 0,
    carbos_r18 = parseFloat(document.getElementById("carbos_r18").innerHTML) || 0,
    carbos_r19 = parseFloat(document.getElementById("carbos_r19").innerHTML) || 0,
    carbos_r20 = parseFloat(document.getElementById("carbos_r20").innerHTML) || 0;
    
    energia_t = energia_r1+energia_r2+energia_r3+energia_r4+energia_r5+energia_r6+energia_r7+energia_r8+energia_r9+energia_r10+energia_r11+energia_r12+energia_r13+energia_r14+energia_r15+energia_r16+energia_r17+energia_r18+energia_r19+energia_r20;
    proteina_t = proteina_r1+proteina_r2+proteina_r3+proteina_r4+proteina_r5+proteina_r6+proteina_r7+proteina_r8+proteina_r9+proteina_r10+proteina_r11+proteina_r12+proteina_r13+proteina_r14+proteina_r15+proteina_r16+proteina_r17+proteina_r18+proteina_r19+proteina_r20;
    lipidos_t = lipidos_r1+lipidos_r2+lipidos_r3+lipidos_r4+lipidos_r5+lipidos_r6+lipidos_r7+lipidos_r8+lipidos_r9+lipidos_r10+lipidos_r11+lipidos_r12+lipidos_r13+lipidos_r14+lipidos_r15+lipidos_r16+lipidos_r17+lipidos_r18+lipidos_r19+lipidos_r20;
    carbos_t = carbos_r1+carbos_r2+carbos_r3+carbos_r4+carbos_r5+carbos_r6+carbos_r7+carbos_r8+carbos_r9+carbos_r10+carbos_r11+carbos_r12+carbos_r13+carbos_r14+carbos_r15+carbos_r16+carbos_r17+carbos_r18+carbos_r19+carbos_r20;

    energia_p = (energia_t*100)/valor_kcal;
    proteina_p = (proteina_t*100)/grs_p;
    lipidos_p = (lipidos_t*100)/grs_l;
    carbos_p = (carbos_t*100)/grs_c;

    document.getElementById("energia_total").innerHTML = energia_t;
    document.getElementById("proteina_total").innerHTML = proteina_t;
    document.getElementById("lipidos_total").innerHTML = lipidos_t;
    document.getElementById("carbos_total").innerHTML = carbos_t;
    document.getElementById("energia_porcentaje").innerHTML = energia_p.toFixed(2);
    document.getElementById("proteina_porcentaje").innerHTML = proteina_p.toFixed(2);
    document.getElementById("lipidos_porcentaje").innerHTML = lipidos_p.toFixed(2);
    document.getElementById("carbos_porcentaje").innerHTML = carbos_p.toFixed(2);
}

function totales(){
    //KCAL Y MACROS
    var valor_kcal = parseFloat(document.getElementById("valor_kcal").value) || 0,
    porc_carb = parseFloat(document.getElementById("porc_carb").value) || 0,
    porc_lip = parseFloat(document.getElementById("porc_lip").value) || 0,
    porc_prot = parseFloat(document.getElementById("porc_prot").value) || 0,
    //TOTALES
    energia_r1 = parseFloat(document.getElementById("energia_r1").innerHTML) || 0,
    energia_r2 = parseFloat(document.getElementById("energia_r2").innerHTML) || 0,
    energia_r3 = parseFloat(document.getElementById("energia_r3").innerHTML) || 0,
    energia_r4 = parseFloat(document.getElementById("energia_r4").innerHTML) || 0,
    energia_r5 = parseFloat(document.getElementById("energia_r5").innerHTML) || 0,
    energia_r6 = parseFloat(document.getElementById("energia_r6").innerHTML) || 0,
    energia_r7 = parseFloat(document.getElementById("energia_r7").innerHTML) || 0,
    energia_r8 = parseFloat(document.getElementById("energia_r8").innerHTML) || 0,
    energia_r9 = parseFloat(document.getElementById("energia_r9").innerHTML) || 0,
    energia_r10 = parseFloat(document.getElementById("energia_r10").innerHTML) || 0,
    energia_r11 = parseFloat(document.getElementById("energia_r11").innerHTML) || 0,
    energia_r12 = parseFloat(document.getElementById("energia_r12").innerHTML) || 0,
    energia_r13 = parseFloat(document.getElementById("energia_r13").innerHTML) || 0,
    energia_r14 = parseFloat(document.getElementById("energia_r14").innerHTML) || 0,
    energia_r15 = parseFloat(document.getElementById("energia_r15").innerHTML) || 0,
    energia_r16 = parseFloat(document.getElementById("energia_r16").innerHTML) || 0,
    energia_r17 = parseFloat(document.getElementById("energia_r17").innerHTML) || 0,
    energia_r18 = parseFloat(document.getElementById("energia_r18").innerHTML) || 0,
    energia_r19 = parseFloat(document.getElementById("energia_r19").innerHTML) || 0,
    energia_r20 = parseFloat(document.getElementById("energia_r20").innerHTML) || 0,
    proteina_r1 = parseFloat(document.getElementById("proteina_r1").innerHTML) || 0,
    proteina_r2 = parseFloat(document.getElementById("proteina_r2").innerHTML) || 0,
    proteina_r3 = parseFloat(document.getElementById("proteina_r3").innerHTML) || 0,
    proteina_r4 = parseFloat(document.getElementById("proteina_r4").innerHTML) || 0,
    proteina_r5 = parseFloat(document.getElementById("proteina_r5").innerHTML) || 0,
    proteina_r6 = parseFloat(document.getElementById("proteina_r6").innerHTML) || 0,
    proteina_r7 = parseFloat(document.getElementById("proteina_r7").innerHTML) || 0,
    proteina_r8 = parseFloat(document.getElementById("proteina_r8").innerHTML) || 0,
    proteina_r9 = parseFloat(document.getElementById("proteina_r9").innerHTML) || 0,
    proteina_r10 = parseFloat(document.getElementById("proteina_r10").innerHTML) || 0,
    proteina_r11 = parseFloat(document.getElementById("proteina_r11").innerHTML) || 0,
    proteina_r12 = parseFloat(document.getElementById("proteina_r12").innerHTML) || 0,
    proteina_r13 = parseFloat(document.getElementById("proteina_r13").innerHTML) || 0,
    proteina_r14 = parseFloat(document.getElementById("proteina_r14").innerHTML) || 0,
    proteina_r15 = parseFloat(document.getElementById("proteina_r15").innerHTML) || 0,
    proteina_r16 = parseFloat(document.getElementById("proteina_r16").innerHTML) || 0,
    proteina_r17 = parseFloat(document.getElementById("proteina_r17").innerHTML) || 0,
    proteina_r18 = parseFloat(document.getElementById("proteina_r18").innerHTML) || 0,
    proteina_r19 = parseFloat(document.getElementById("proteina_r19").innerHTML) || 0,
    proteina_r20 = parseFloat(document.getElementById("proteina_r20").innerHTML) || 0,
    lipidos_r1 = parseFloat(document.getElementById("lipidos_r1").innerHTML) || 0,
    lipidos_r2 = parseFloat(document.getElementById("lipidos_r2").innerHTML) || 0,
    lipidos_r3 = parseFloat(document.getElementById("lipidos_r3").innerHTML) || 0,
    lipidos_r4 = parseFloat(document.getElementById("lipidos_r4").innerHTML) || 0,
    lipidos_r5 = parseFloat(document.getElementById("lipidos_r5").innerHTML) || 0,
    lipidos_r6 = parseFloat(document.getElementById("lipidos_r6").innerHTML) || 0,
    lipidos_r7 = parseFloat(document.getElementById("lipidos_r7").innerHTML) || 0,
    lipidos_r8 = parseFloat(document.getElementById("lipidos_r8").innerHTML) || 0,
    lipidos_r9 = parseFloat(document.getElementById("lipidos_r9").innerHTML) || 0,
    lipidos_r10 = parseFloat(document.getElementById("lipidos_r10").innerHTML) || 0,
    lipidos_r11 = parseFloat(document.getElementById("lipidos_r11").innerHTML) || 0,
    lipidos_r12 = parseFloat(document.getElementById("lipidos_r12").innerHTML) || 0,
    lipidos_r13 = parseFloat(document.getElementById("lipidos_r13").innerHTML) || 0,
    lipidos_r14 = parseFloat(document.getElementById("lipidos_r14").innerHTML) || 0,
    lipidos_r15 = parseFloat(document.getElementById("lipidos_r15").innerHTML) || 0,
    lipidos_r16 = parseFloat(document.getElementById("lipidos_r16").innerHTML) || 0,
    lipidos_r17 = parseFloat(document.getElementById("lipidos_r17").innerHTML) || 0,
    lipidos_r18 = parseFloat(document.getElementById("lipidos_r18").innerHTML) || 0,
    lipidos_r19 = parseFloat(document.getElementById("lipidos_r19").innerHTML) || 0,
    lipidos_r20 = parseFloat(document.getElementById("lipidos_r20").innerHTML) || 0,
    carbos_r1 = parseFloat(document.getElementById("carbos_r1").innerHTML) || 0,
    carbos_r2 = parseFloat(document.getElementById("carbos_r2").innerHTML) || 0,
    carbos_r3 = parseFloat(document.getElementById("carbos_r3").innerHTML) || 0,
    carbos_r4 = parseFloat(document.getElementById("carbos_r4").innerHTML) || 0,
    carbos_r5 = parseFloat(document.getElementById("carbos_r5").innerHTML) || 0,
    carbos_r6 = parseFloat(document.getElementById("carbos_r6").innerHTML) || 0,
    carbos_r7 = parseFloat(document.getElementById("carbos_r7").innerHTML) || 0,
    carbos_r8 = parseFloat(document.getElementById("carbos_r8").innerHTML) || 0,
    carbos_r9 = parseFloat(document.getElementById("carbos_r9").innerHTML) || 0,
    carbos_r10 = parseFloat(document.getElementById("carbos_r10").innerHTML) || 0,
    carbos_r11 = parseFloat(document.getElementById("carbos_r11").innerHTML) || 0,
    carbos_r12 = parseFloat(document.getElementById("carbos_r12").innerHTML) || 0,
    carbos_r13 = parseFloat(document.getElementById("carbos_r13").innerHTML) || 0,
    carbos_r14 = parseFloat(document.getElementById("carbos_r14").innerHTML) || 0,
    carbos_r15 = parseFloat(document.getElementById("carbos_r15").innerHTML) || 0,
    carbos_r16 = parseFloat(document.getElementById("carbos_r16").innerHTML) || 0,
    carbos_r17 = parseFloat(document.getElementById("carbos_r17").innerHTML) || 0,
    carbos_r18 = parseFloat(document.getElementById("carbos_r18").innerHTML) || 0,
    carbos_r19 = parseFloat(document.getElementById("carbos_r19").innerHTML) || 0,
    carbos_r20 = parseFloat(document.getElementById("carbos_r20").innerHTML) || 0;
    
    energia_t = energia_r1+energia_r2+energia_r3+energia_r4+energia_r5+energia_r6+energia_r7+energia_r8+energia_r9+energia_r10+energia_r11+energia_r12+energia_r13+energia_r14+energia_r15+energia_r16+energia_r17+energia_r18+energia_r19+energia_r20;
    proteina_t = proteina_r1+proteina_r2+proteina_r3+proteina_r4+proteina_r5+proteina_r6+proteina_r7+proteina_r8+proteina_r9+proteina_r10+proteina_r11+proteina_r12+proteina_r13+proteina_r14+proteina_r15+proteina_r16+proteina_r17+proteina_r18+proteina_r19+proteina_r20;
    lipidos_t = lipidos_r1+lipidos_r2+lipidos_r3+lipidos_r4+lipidos_r5+lipidos_r6+lipidos_r7+lipidos_r8+lipidos_r9+lipidos_r10+lipidos_r11+lipidos_r12+lipidos_r13+lipidos_r14+lipidos_r15+lipidos_r16+lipidos_r17+lipidos_r18+lipidos_r19+lipidos_r20;
    carbos_t = carbos_r1+carbos_r2+carbos_r3+carbos_r4+carbos_r5+carbos_r6+carbos_r7+carbos_r8+carbos_r9+carbos_r10+carbos_r11+carbos_r12+carbos_r13+carbos_r14+carbos_r15+carbos_r16+carbos_r17+carbos_r18+carbos_r19+carbos_r20;

    //Obteniendo el porcentaje en decimales
    porc_c = porc_carb/100;
    porc_l = porc_lip/100;
    porc_p = porc_prot/100;

    //Obteniendo los gramos de cada macro
    grs_c = (valor_kcal*porc_c)/4;
    grs_l = (valor_kcal*porc_l)/9;
    grs_p = (valor_kcal*porc_p)/4;

    //PORCENTAJES
    energia_p = (energia_t*100)/valor_kcal;
    proteina_p = (proteina_t*100)/grs_p;
    lipidos_p = (lipidos_t*100)/grs_l;
    carbos_p = (carbos_t*100)/grs_c;

    document.getElementById("energia_total").innerHTML = energia_t;
    document.getElementById("proteina_total").innerHTML = proteina_t;
    document.getElementById("lipidos_total").innerHTML = lipidos_t;
    document.getElementById("carbos_total").innerHTML = carbos_t;
    document.getElementById("energia_porcentaje").innerHTML = energia_p.toFixed(2);
    document.getElementById("proteina_porcentaje").innerHTML = proteina_p.toFixed(2);
    document.getElementById("lipidos_porcentaje").innerHTML = lipidos_p.toFixed(2);
    document.getElementById("carbos_porcentaje").innerHTML = carbos_p.toFixed(2);
}


//Rellenar los titulos de las tablas
function rellenar(){
    var op1 = document.getElementById("opcion1"), op2 = document.getElementById("opcion2"), op3 = document.getElementById("opcion3"),
    op4 = document.getElementById("opcion4"), op5 = document.getElementById("opcion5"), op6 = document.getElementById("opcion6");

    var opc1 = op1.options[op1.selectedIndex].text, opc2 = op2.options[op2.selectedIndex].text,
    opc3 = op3.options[op3.selectedIndex].text, opc4 = op4.options[op4.selectedIndex].text,
    opc5 = op5.options[op5.selectedIndex].text, opc6 = op6.options[op6.selectedIndex].text;

    document.getElementsByClassName("seleccion1")[0].innerHTML = opc1; document.getElementsByClassName("seleccion1")[1].innerHTML = opc1;
    document.getElementsByClassName("seleccion1")[2].innerHTML = opc1; document.getElementsByClassName("seleccion1")[3].innerHTML = opc1;
    document.getElementsByClassName("seleccion1")[4].innerHTML = opc1; document.getElementsByClassName("seleccion1")[5].innerHTML = opc1;

    document.getElementsByClassName("seleccion2")[0].innerHTML = opc2; document.getElementsByClassName("seleccion2")[1].innerHTML = opc2;
    document.getElementsByClassName("seleccion2")[2].innerHTML = opc2; document.getElementsByClassName("seleccion2")[3].innerHTML = opc2;
    document.getElementsByClassName("seleccion2")[4].innerHTML = opc2; document.getElementsByClassName("seleccion2")[5].innerHTML = opc2;

    document.getElementsByClassName("seleccion3")[0].innerHTML = opc3; document.getElementsByClassName("seleccion3")[1].innerHTML = opc3;
    document.getElementsByClassName("seleccion3")[2].innerHTML = opc3; document.getElementsByClassName("seleccion3")[3].innerHTML = opc3;
    document.getElementsByClassName("seleccion3")[4].innerHTML = opc3; document.getElementsByClassName("seleccion3")[5].innerHTML = opc3;

    document.getElementsByClassName("seleccion4")[0].innerHTML = opc4; document.getElementsByClassName("seleccion4")[1].innerHTML = opc4;
    document.getElementsByClassName("seleccion4")[2].innerHTML = opc4; document.getElementsByClassName("seleccion4")[3].innerHTML = opc4;
    document.getElementsByClassName("seleccion4")[4].innerHTML = opc4; document.getElementsByClassName("seleccion4")[5].innerHTML = opc4;

    document.getElementsByClassName("seleccion5")[0].innerHTML = opc5; document.getElementsByClassName("seleccion5")[1].innerHTML = opc5;
    document.getElementsByClassName("seleccion5")[2].innerHTML = opc5; document.getElementsByClassName("seleccion5")[3].innerHTML = opc5;
    document.getElementsByClassName("seleccion5")[4].innerHTML = opc5; document.getElementsByClassName("seleccion5")[5].innerHTML = opc5;

    document.getElementsByClassName("seleccion6")[0].innerHTML = opc6; document.getElementsByClassName("seleccion6")[1].innerHTML = opc6;
    document.getElementsByClassName("seleccion6")[2].innerHTML = opc6; document.getElementsByClassName("seleccion6")[3].innerHTML = opc6;
    document.getElementsByClassName("seleccion6")[4].innerHTML = opc6; document.getElementsByClassName("seleccion6")[5].innerHTML = opc6;   
}