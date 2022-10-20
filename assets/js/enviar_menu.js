function enviar_menu(){
    var tiempo = document.getElementById("tiempo").value, dia = document.getElementById("dia").value,

    n_desayuno = document.getElementById("n_desayuno").value,
    tag1 = document.getElementById("tag1").value, cantidad1 = document.getElementById("cantidad1").value,
    tag2 = document.getElementById("tag2").value, cantidad2 = document.getElementById("cantidad2").value,
    tag3 = document.getElementById("tag3").value, cantidad3 = document.getElementById("cantidad3").value,
    tag4 = document.getElementById("tag4").value, cantidad4 = document.getElementById("cantidad4").value,
    tag5 = document.getElementById("tag5").value, cantidad5 = document.getElementById("cantidad5").value,
    tag6 = document.getElementById("tag6").value, cantidad6 = document.getElementById("cantidad6").value,
    tag7 = document.getElementById("tag7").value, cantidad7 = document.getElementById("cantidad7").value,
    tag8 = document.getElementById("tag8").value, cantidad8 = document.getElementById("cantidad8").value,
    tag9 = document.getElementById("tag9").value, cantidad9 = document.getElementById("cantidad9").value,
    tag10 = document.getElementById("tag10").value, cantidad10 = document.getElementById("cantidad10").value,

    n_colacion1 = document.getElementById("n_colacion1").value,
    tag11 = document.getElementById("tag11").value, cantidad11 = document.getElementById("cantidad11").value,
    tag12 = document.getElementById("tag12").value, cantidad12 = document.getElementById("cantidad12").value,
    tag13 = document.getElementById("tag13").value, cantidad13 = document.getElementById("cantidad13").value,
    tag14 = document.getElementById("tag14").value, cantidad14 = document.getElementById("cantidad14").value,
    tag15 = document.getElementById("tag15").value, cantidad15 = document.getElementById("cantidad15").value,

    n_comida = document.getElementById("n_comida").value,
    tag16 = document.getElementById("tag16").value, cantidad16 = document.getElementById("cantidad16").value,
    tag17 = document.getElementById("tag17").value, cantidad17 = document.getElementById("cantidad17").value,
    tag18 = document.getElementById("tag18").value, cantidad18 = document.getElementById("cantidad18").value,
    tag19 = document.getElementById("tag19").value, cantidad19 = document.getElementById("cantidad19").value,
    tag20 = document.getElementById("tag20").value, cantidad20 = document.getElementById("cantidad20").value,
    tag21 = document.getElementById("tag21").value, cantidad21 = document.getElementById("cantidad21").value,
    tag22 = document.getElementById("tag22").value, cantidad22 = document.getElementById("cantidad22").value,
    tag23 = document.getElementById("tag23").value, cantidad23 = document.getElementById("cantidad23").value,
    tag24 = document.getElementById("tag24").value, cantidad24 = document.getElementById("cantidad24").value,
    tag25 = document.getElementById("tag25").value, cantidad25 = document.getElementById("cantidad25").value,

    n_colacion2 = document.getElementById("n_colacion2").value,
    tag26 = document.getElementById("tag26").value, cantidad26 = document.getElementById("cantidad26").value,
    tag27 = document.getElementById("tag27").value, cantidad27 = document.getElementById("cantidad27").value,
    tag28 = document.getElementById("tag28").value, cantidad28 = document.getElementById("cantidad28").value,
    tag29 = document.getElementById("tag29").value, cantidad29 = document.getElementById("cantidad29").value,
    tag30 = document.getElementById("tag30").value, cantidad30 = document.getElementById("cantidad30").value,

    n_cena = document.getElementById("n_cena").value,
    tag31 = document.getElementById("tag31").value, cantidad31 = document.getElementById("cantidad31").value,
    tag32 = document.getElementById("tag32").value, cantidad32 = document.getElementById("cantidad32").value,
    tag33 = document.getElementById("tag33").value, cantidad33 = document.getElementById("cantidad33").value,
    tag34 = document.getElementById("tag34").value, cantidad34 = document.getElementById("cantidad34").value,
    tag35 = document.getElementById("tag35").value, cantidad35 = document.getElementById("cantidad35").value,
    tag36 = document.getElementById("tag36").value, cantidad36 = document.getElementById("cantidad36").value,
    tag37 = document.getElementById("tag37").value, cantidad37 = document.getElementById("cantidad37").value,
    tag38 = document.getElementById("tag38").value, cantidad38 = document.getElementById("cantidad38").value,
    tag39 = document.getElementById("tag39").value, cantidad39 = document.getElementById("cantidad39").value,
    tag40 = document.getElementById("tag40").value, cantidad40 = document.getElementById("cantidad40").value;

    var desayuno = n_desayuno + " " + 
    tag1 + cantidad1 + tag2 + cantidad2 + tag3 + cantidad3 + tag4 + cantidad4 + tag5 + cantidad5 +
    tag6 + cantidad6 + tag7 + cantidad7 + tag8 + cantidad8 + tag9 + cantidad9 + tag10 + cantidad10;

    var colacion1 = n_colacion1 + " " +
    tag11 + cantidad11 + tag12 + cantidad12 + tag13 + cantidad13 + tag14 + cantidad14 + tag15 + cantidad15;

    var comida = n_comida + " " +
    tag16 + cantidad16 + tag17 + cantidad17 + tag18 + cantidad18 + tag19 + cantidad19 + tag20 + cantidad20 +
    tag21 + cantidad21 + tag22 + cantidad22 + tag23 + cantidad23 + tag24 + cantidad24 + tag25 + cantidad25;

    var colacion2 = n_colacion2 + " " +
    tag26 + cantidad26 + tag27 + cantidad27 + tag28 + cantidad28 + tag29 + cantidad29 + tag30 + cantidad30;

    var cena = n_cena + " " +
    tag31 + cantidad31 + tag32 + cantidad32 + tag33 + cantidad33 + tag34 + cantidad34 + tag35 + cantidad35 +
    tag36 + cantidad36 + tag37 + cantidad37 + tag38 + cantidad38 + tag39 + cantidad39 + tag40 + cantidad40;

    if(dia == "lunes" && tiempo == "todo"){
        document.getElementById("desayuno_lunes").value = desayuno;
        document.getElementById("colacion1_lunes").value = colacion1;
        document.getElementById("comida_lunes").value = comida;
        document.getElementById("colacion2_lunes").value = colacion2;
        document.getElementById("cena_lunes").value = cena;
    }else if(dia == "lunes" && tiempo == "desayuno"){
        document.getElementById("desayuno_lunes").value = desayuno;
    }else if(dia == "lunes" && tiempo == "almuerzo"){
        document.getElementById("colacion1_lunes").value = colacion1;
    }else if(dia == "lunes" && tiempo == "comida"){
        document.getElementById("comida_lunes").value = comida;
    }else if(dia == "lunes" && tiempo == "merienda"){
        document.getElementById("colacion2_lunes").value = colacion2;
    }else if(dia == "lunes" && tiempo == "cena"){
        document.getElementById("cena_lunes").value = cena;
    }

    if(dia == "martes" && tiempo == "todo"){
        document.getElementById("desayuno_martes").value = desayuno;
        document.getElementById("colacion1_martes").value = colacion1;
        document.getElementById("comida_martes").value = comida;
        document.getElementById("colacion2_martes").value = colacion2;
        document.getElementById("cena_martes").value = cena;
    }else if(dia == "martes" && tiempo == "desayuno"){
        document.getElementById("desayuno_martes").value = desayuno;
    }else if(dia == "martes" && tiempo == "almuerzo"){
        document.getElementById("colacion1_martes").value = colacion1;
    }else if(dia == "martes" && tiempo == "comida"){
        document.getElementById("comida_martes").value = comida;
    }else if(dia == "martes" && tiempo == "merienda"){
        document.getElementById("colacion2_martes").value = colacion2;
    }else if(dia == "martes" && tiempo == "cena"){
        document.getElementById("cena_martes").value = cena;
    }

    if(dia == "miercoles" && tiempo == "todo"){
        document.getElementById("desayuno_miercoles").value = desayuno;
        document.getElementById("colacion1_miercoles").value = colacion1;
        document.getElementById("comida_miercoles").value = comida;
        document.getElementById("colacion2_miercoles").value = colacion2;
        document.getElementById("cena_miercoles").value = cena;
    }else if(dia == "miercoles" && tiempo == "desayuno"){
        document.getElementById("desayuno_miercoles").value = desayuno;
    }else if(dia == "miercoles" && tiempo == "almuerzo"){
        document.getElementById("colacion1_miercoles").value = colacion1;
    }else if(dia == "miercoles" && tiempo == "comida"){
        document.getElementById("comida_miercoles").value = comida;
    }else if(dia == "miercoles" && tiempo == "merienda"){
        document.getElementById("colacion2_miercoles").value = colacion2;
    }else if(dia == "miercoles" && tiempo == "cena"){
        document.getElementById("cena_miercoles").value = cena;
    }

    if(dia == "jueves" && tiempo == "todo"){
        document.getElementById("desayuno_jueves").value = desayuno;
        document.getElementById("colacion1_jueves").value = colacion1;
        document.getElementById("comida_jueves").value = comida;
        document.getElementById("colacion2_jueves").value = colacion2;
        document.getElementById("cena_jueves").value = cena;
    }else if(dia == "jueves" && tiempo == "desayuno"){
        document.getElementById("desayuno_jueves").value = desayuno;
    }else if(dia == "jueves" && tiempo == "almuerzo"){
        document.getElementById("colacion1_jueves").value = colacion1;
    }else if(dia == "jueves" && tiempo == "comida"){
        document.getElementById("comida_jueves").value = comida;
    }else if(dia == "jueves" && tiempo == "merienda"){
        document.getElementById("colacion2_jueves").value = colacion2;
    }else if(dia == "jueves" && tiempo == "cena"){
        document.getElementById("cena_jueves").value = cena;
    }

    if(dia == "viernes" && tiempo == "todo"){
        document.getElementById("desayuno_viernes").value = desayuno;
        document.getElementById("colacion1_viernes").value = colacion1;
        document.getElementById("comida_viernes").value = comida;
        document.getElementById("colacion2_viernes").value = colacion2;
        document.getElementById("cena_viernes").value = cena;
    }else if(dia == "viernes" && tiempo == "desayuno"){
        document.getElementById("desayuno_viernes").value = desayuno;
    }else if(dia == "viernes" && tiempo == "almuerzo"){
        document.getElementById("colacion1_viernes").value = colacion1;
    }else if(dia == "viernes" && tiempo == "comida"){
        document.getElementById("comida_viernes").value = comida;
    }else if(dia == "viernes" && tiempo == "merienda"){
        document.getElementById("colacion2_viernes").value = colacion2;
    }else if(dia == "viernes" && tiempo == "cena"){
        document.getElementById("cena_viernes").value = cena;
    }

    if(dia == "sabado" && tiempo == "todo"){
        document.getElementById("desayuno_sabado").value = desayuno;
        document.getElementById("colacion1_sabado").value = colacion1;
        document.getElementById("comida_sabado").value = comida;
        document.getElementById("colacion2_sabado").value = colacion2;
        document.getElementById("cena_sabado").value = cena;
    }else if(dia == "sabado" && tiempo == "desayuno"){
        document.getElementById("desayuno_sabado").value = desayuno;
    }else if(dia == "sabado" && tiempo == "almuerzo"){
        document.getElementById("colacion1_sabado").value = colacion1;
    }else if(dia == "sabado" && tiempo == "comida"){
        document.getElementById("comida_sabado").value = comida;
    }else if(dia == "sabado" && tiempo == "merienda"){
        document.getElementById("colacion2_sabado").value = colacion2;
    }else if(dia == "sabado" && tiempo == "cena"){
        document.getElementById("cena_sabado").value = cena;
    }

    if(dia == "domingo" && tiempo == "todo"){
        document.getElementById("desayuno_domingo").value = desayuno;
        document.getElementById("colacion1_domingo").value = colacion1;
        document.getElementById("comida_domingo").value = comida;
        document.getElementById("colacion2_domingo").value = colacion2;
        document.getElementById("cena_domingo").value = cena;
    }else if(dia == "domingo" && tiempo == "desayuno"){
        document.getElementById("desayuno_domingo").value = desayuno;
    }else if(dia == "domingo" && tiempo == "almuerzo"){
        document.getElementById("colacion1_domingo").value = colacion1;
    }else if(dia == "domingo" && tiempo == "comida"){
        document.getElementById("comida_domingo").value = comida;
    }else if(dia == "domingo" && tiempo == "merienda"){
        document.getElementById("colacion2_domingo").value = colacion2;
    }else if(dia == "domingo" && tiempo == "cena"){
        document.getElementById("cena_domingo").value = cena;
    }
}

//Colocar los equivalentes en el input invisible del form
function equiv(){
    var valor_kcal = document.getElementById("valor_kcal").value,
    porc_prot = document.getElementById("porc_prot").value,
    porc_lip = document.getElementById("porc_lip").value,
    porc_carb = document.getElementById("porc_carb").value,
    eq1 = document.getElementById("eq1").value,
    eq2 = document.getElementById("eq2").value,
    eq3 = document.getElementById("eq3").value,
    eq4 = document.getElementById("eq4").value,
    eq5 = document.getElementById("eq5").value,
    eq6 = document.getElementById("eq6").value,
    eq7 = document.getElementById("eq7").value,
    eq8 = document.getElementById("eq8").value,
    eq9 = document.getElementById("eq9").value,
    eq10 = document.getElementById("eq10").value,
    eq11 = document.getElementById("eq11").value,
    eq12 = document.getElementById("eq12").value,
    eq13 = document.getElementById("eq13").value,
    eq14 = document.getElementById("eq14").value,
    eq15 = document.getElementById("eq15").value,
    eq16 = document.getElementById("eq16").value,
    eq17 = document.getElementById("eq17").value,
    eq18 = document.getElementById("eq18").value,
    eq19 = document.getElementById("eq19").value,
    otro_subgrupo = document.getElementById("otro_subgrupo").value,
    eq20 = document.getElementById("eq20").value,
    energia_eq20 = document.getElementById("energia_eq20").value,
    proteina_eq20 = document.getElementById("proteina_eq20").value,
    lipidos_eq20 = document.getElementById("lipidos_eq20").value,
    carbos_eq20 = document.getElementById("carbos_eq20").value,

    desayuno_f1 = document.getElementById("desayuno_f1").value,
    colacionm_f1 = document.getElementById("colacionm_f1").value,
    comida_f1 = document.getElementById("comida_f1").value,
    colacionv_f1 = document.getElementById("colacionv_f1").value,
    cena_f1 = document.getElementById("cena_f1").value,

    desayuno_f2 = document.getElementById("desayuno_f2").value,
    colacionm_f2 = document.getElementById("colacionm_f2").value,
    comida_f2 = document.getElementById("comida_f2").value,
    colacionv_f2 = document.getElementById("colacionv_f2").value,
    cena_f2 = document.getElementById("cena_f2").value,

    desayuno_f3 = document.getElementById("desayuno_f3").value,
    colacionm_f3 = document.getElementById("colacionm_f3").value,
    comida_f3 = document.getElementById("comida_f3").value,
    colacionv_f3 = document.getElementById("colacionv_f3").value,
    cena_f3 = document.getElementById("cena_f3").value,

    desayuno_f4 = document.getElementById("desayuno_f4").value,
    colacionm_f4 = document.getElementById("colacionm_f4").value,
    comida_f4 = document.getElementById("comida_f4").value,
    colacionv_f4 = document.getElementById("colacionv_f4").value,
    cena_f4 = document.getElementById("cena_f4").value,

    desayuno_f5 = document.getElementById("desayuno_f5").value,
    colacionm_f5 = document.getElementById("colacionm_f5").value,
    comida_f5 = document.getElementById("comida_f5").value,
    colacionv_f5 = document.getElementById("colacionv_f5").value,
    cena_f5 = document.getElementById("cena_f5").value,

    desayuno_f6 = document.getElementById("desayuno_f6").value,
    colacionm_f6 = document.getElementById("colacionm_f6").value,
    comida_f6 = document.getElementById("comida_f6").value,
    colacionv_f6 = document.getElementById("colacionv_f6").value,
    cena_f6 = document.getElementById("cena_f6").value,

    desayuno_f7 = document.getElementById("desayuno_f7").value,
    colacionm_f7 = document.getElementById("colacionm_f7").value,
    comida_f7 = document.getElementById("comida_f7").value,
    colacionv_f7 = document.getElementById("colacionv_f7").value,
    cena_f7 = document.getElementById("cena_f7").value,

    desayuno_f8 = document.getElementById("desayuno_f8").value,
    colacionm_f8 = document.getElementById("colacionm_f8").value,
    comida_f8 = document.getElementById("comida_f8").value,
    colacionv_f8 = document.getElementById("colacionv_f8").value,
    cena_f8 = document.getElementById("cena_f8").value,

    desayuno_f9 = document.getElementById("desayuno_f9").value,
    colacionm_f9 = document.getElementById("colacionm_f9").value,
    comida_f9 = document.getElementById("comida_f9").value,
    colacionv_f9 = document.getElementById("colacionv_f9").value,
    cena_f9 = document.getElementById("cena_f9").value,

    desayuno_f10 = document.getElementById("desayuno_f10").value,
    colacionm_f10 = document.getElementById("colacionm_f10").value,
    comida_f10 = document.getElementById("comida_f10").value,
    colacionv_f10 = document.getElementById("colacionv_f10").value,
    cena_f10 = document.getElementById("cena_f10").value,

    desayuno_f11 = document.getElementById("desayuno_f11").value,
    colacionm_f11 = document.getElementById("colacionm_f11").value,
    comida_f11 = document.getElementById("comida_f11").value,
    colacionv_f11 = document.getElementById("colacionv_f11").value,
    cena_f11 = document.getElementById("cena_f11").value,

    desayuno_f12 = document.getElementById("desayuno_f12").value,
    colacionm_f12 = document.getElementById("colacionm_f12").value,
    comida_f12 = document.getElementById("comida_f12").value,
    colacionv_f12 = document.getElementById("colacionv_f12").value,
    cena_f12 = document.getElementById("cena_f12").value,

    desayuno_f13 = document.getElementById("desayuno_f13").value,
    colacionm_f13 = document.getElementById("colacionm_f13").value,
    comida_f13 = document.getElementById("comida_f13").value,
    colacionv_f13 = document.getElementById("colacionv_f13").value,
    cena_f13 = document.getElementById("cena_f13").value,

    desayuno_f14 = document.getElementById("desayuno_f14").value,
    colacionm_f14 = document.getElementById("colacionm_f14").value,
    comida_f14 = document.getElementById("comida_f14").value,
    colacionv_f14 = document.getElementById("colacionv_f14").value,
    cena_f14 = document.getElementById("cena_f14").value,

    desayuno_f15 = document.getElementById("desayuno_f15").value,
    colacionm_f15 = document.getElementById("colacionm_f15").value,
    comida_f15 = document.getElementById("comida_f15").value,
    colacionv_f15 = document.getElementById("colacionv_f15").value,
    cena_f15 = document.getElementById("cena_f15").value,

    desayuno_f16 = document.getElementById("desayuno_f16").value,
    colacionm_f16 = document.getElementById("colacionm_f16").value,
    comida_f16 = document.getElementById("comida_f16").value,
    colacionv_f16 = document.getElementById("colacionv_f16").value,
    cena_f16 = document.getElementById("cena_f16").value,

    desayuno_f17 = document.getElementById("desayuno_f17").value,
    colacionm_f17 = document.getElementById("colacionm_f17").value,
    comida_f17 = document.getElementById("comida_f17").value,
    colacionv_f17 = document.getElementById("colacionv_f17").value,
    cena_f17 = document.getElementById("cena_f17").value,

    desayuno_f18 = document.getElementById("desayuno_f18").value,
    colacionm_f18 = document.getElementById("colacionm_f18").value,
    comida_f18 = document.getElementById("comida_f18").value,
    colacionv_f18 = document.getElementById("colacionv_f18").value,
    cena_f18 = document.getElementById("cena_f18").value,

    desayuno_f19 = document.getElementById("desayuno_f19").value,
    colacionm_f19 = document.getElementById("colacionm_f19").value,
    comida_f19 = document.getElementById("comida_f19").value,
    colacionv_f19 = document.getElementById("colacionv_f19").value,
    cena_f19 = document.getElementById("cena_f19").value,

    desayuno_f20 = document.getElementById("desayuno_f20").value,
    colacionm_f20 = document.getElementById("colacionm_f20").value,
    comida_f20 = document.getElementById("comida_f20").value,
    colacionv_f20 = document.getElementById("colacionv_f20").value,
    cena_f20 = document.getElementById("cena_f20").value;

    document.getElementById("equivalentes").value = valor_kcal + "," + porc_prot + "," + porc_lip + "," + porc_carb + "," + 
    eq1 + "," + eq2 + "," + eq3 + "," + eq4 + "," + eq5 + "," + eq6 + "," + eq7 + "," + eq8 + "," + eq9 + "," + eq10 + "," + eq11 + "," 
    + eq12 + "," + eq13 + "," + eq14 + "," + eq15 + "," + eq16 + "," + eq17 + "," + eq18 + "," + eq19 + "," + otro_subgrupo + "," + eq20 + "," + 
    energia_eq20 + "," + proteina_eq20 + "," + lipidos_eq20 + "," + carbos_eq20 + "," +
    desayuno_f1 + "," + colacionm_f1 + "," + comida_f1 + "," + colacionv_f1 + "," + cena_f1 + "," +
    desayuno_f2 + "," + colacionm_f2 + "," + comida_f2 + "," + colacionv_f2 + "," + cena_f2 + "," +
    desayuno_f3 + "," + colacionm_f3 + "," + comida_f3 + "," + colacionv_f3 + "," + cena_f3 + "," +
    desayuno_f4 + "," + colacionm_f4 + "," + comida_f4 + "," + colacionv_f4 + "," + cena_f4 + "," +
    desayuno_f5 + "," + colacionm_f5 + "," + comida_f5 + "," + colacionv_f5 + "," + cena_f5 + "," +
    desayuno_f6 + "," + colacionm_f6 + "," + comida_f6 + "," + colacionv_f6 + "," + cena_f6 + "," +
    desayuno_f7 + "," + colacionm_f7 + "," + comida_f7 + "," + colacionv_f7 + "," + cena_f7 + "," +
    desayuno_f8 + "," + colacionm_f8 + "," + comida_f8 + "," + colacionv_f8 + "," + cena_f8 + "," +
    desayuno_f9 + "," + colacionm_f9 + "," + comida_f9 + "," + colacionv_f9 + "," + cena_f9 + "," +
    desayuno_f10 + "," + colacionm_f10 + "," + comida_f10 + "," + colacionv_f10 + "," + cena_f10 + "," +
    desayuno_f11 + "," + colacionm_f11 + "," + comida_f11 + "," + colacionv_f11 + "," + cena_f11 + "," +
    desayuno_f12 + "," + colacionm_f12 + "," + comida_f12 + "," + colacionv_f12 + "," + cena_f12 + "," +
    desayuno_f13 + "," + colacionm_f13 + "," + comida_f13 + "," + colacionv_f13 + "," + cena_f13 + "," +
    desayuno_f14 + "," + colacionm_f14 + "," + comida_f14 + "," + colacionv_f14 + "," + cena_f14 + "," +
    desayuno_f15 + "," + colacionm_f15 + "," + comida_f15 + "," + colacionv_f15 + "," + cena_f15 + "," +
    desayuno_f16 + "," + colacionm_f16 + "," + comida_f16 + "," + colacionv_f16 + "," + cena_f16 + "," +
    desayuno_f17 + "," + colacionm_f17 + "," + comida_f17 + "," + colacionv_f17 + "," + cena_f17 + "," +
    desayuno_f18 + "," + colacionm_f18 + "," + comida_f18 + "," + colacionv_f18 + "," + cena_f18 + "," +
    desayuno_f19 + "," + colacionm_f19 + "," + comida_f19 + "," + colacionv_f19 + "," + cena_f19 + "," +
    desayuno_f20 + "," + colacionm_f20 + "," + comida_f20 + "," + colacionv_f20 + "," + cena_f20 + ",";

}