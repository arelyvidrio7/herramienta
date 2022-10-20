//Rellenar los titulos de las tablas
function rellenar(){
    var op1 = document.getElementById("opcion1"), op2 = document.getElementById("opcion2"), op3 = document.getElementById("opcion3"),
    op4 = document.getElementById("opcion4");

    var opc1 = op1.options[op1.selectedIndex].text, opc2 = op2.options[op2.selectedIndex].text,
    opc3 = op3.options[op3.selectedIndex].text, opc4 = op4.options[op4.selectedIndex].text;

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
}

function sumartablas(){
    //Variables de los select
    var opcion1 = document.getElementById("opcion1").value,
    opcion2 = document.getElementById("opcion2").value,
    opcion3 = document.getElementById("opcion3").value,
    opcion4 = document.getElementById("opcion4").value;

    //Columna 1, tabla 1
    var nut1_f1 = parseFloat(document.getElementById("nut1_f1").value) || 0,
    nut1_f2 = parseFloat(document.getElementById("nut1_f2").value) || 0,
    nut1_f3 = parseFloat(document.getElementById("nut1_f3").value) || 0,
    nut1_f4 = parseFloat(document.getElementById("nut1_f4").value) || 0,
    nut1_f5 = parseFloat(document.getElementById("nut1_f5").value) || 0,
    nut1_f6 = parseFloat(document.getElementById("nut1_f6").value) || 0,
    nut1_f7 = parseFloat(document.getElementById("nut1_f7").value) || 0,
    nut1_f8 = parseFloat(document.getElementById("nut1_f8").value) || 0,
    nut1_f9 = parseFloat(document.getElementById("nut1_f9").value) || 0,
    nut1_f10 = parseFloat(document.getElementById("nut1_f10").value) || 0,

    nut2_f1 = parseFloat(document.getElementById("nut2_f1").value) || 0,
    nut2_f2 = parseFloat(document.getElementById("nut2_f2").value) || 0,
    nut2_f3 = parseFloat(document.getElementById("nut2_f3").value) || 0,
    nut2_f4 = parseFloat(document.getElementById("nut2_f4").value) || 0,
    nut2_f5 = parseFloat(document.getElementById("nut2_f5").value) || 0,
    nut2_f6 = parseFloat(document.getElementById("nut2_f6").value) || 0,
    nut2_f7 = parseFloat(document.getElementById("nut2_f7").value) || 0,
    nut2_f8 = parseFloat(document.getElementById("nut2_f8").value) || 0,
    nut2_f9 = parseFloat(document.getElementById("nut2_f9").value) || 0,
    nut2_f10 = parseFloat(document.getElementById("nut2_f10").value) || 0,
 
    nut3_f1 = parseFloat(document.getElementById("nut3_f1").value) || 0,
    nut3_f2 = parseFloat(document.getElementById("nut3_f2").value) || 0,
    nut3_f3 = parseFloat(document.getElementById("nut3_f3").value) || 0,
    nut3_f4 = parseFloat(document.getElementById("nut3_f4").value) || 0,
    nut3_f5 = parseFloat(document.getElementById("nut3_f5").value) || 0,
    nut3_f6 = parseFloat(document.getElementById("nut3_f6").value) || 0,
    nut3_f7 = parseFloat(document.getElementById("nut3_f7").value) || 0,
    nut3_f8 = parseFloat(document.getElementById("nut3_f8").value) || 0,
    nut3_f9 = parseFloat(document.getElementById("nut3_f9").value) || 0,
    nut3_f10 = parseFloat(document.getElementById("nut3_f10").value) || 0,

    nut4_f1 = parseFloat(document.getElementById("nut4_f1").value) || 0,
    nut4_f2 = parseFloat(document.getElementById("nut4_f2").value) || 0,
    nut4_f3 = parseFloat(document.getElementById("nut4_f3").value) || 0,
    nut4_f4 = parseFloat(document.getElementById("nut4_f4").value) || 0,
    nut4_f5 = parseFloat(document.getElementById("nut4_f5").value) || 0,
    nut4_f6 = parseFloat(document.getElementById("nut4_f6").value) || 0,
    nut4_f7 = parseFloat(document.getElementById("nut4_f7").value) || 0,
    nut4_f8 = parseFloat(document.getElementById("nut4_f8").value) || 0,
    nut4_f9 = parseFloat(document.getElementById("nut4_f9").value) || 0,
    nut4_f10 = parseFloat(document.getElementById("nut4_f10").value) || 0,

    //Columna 1, tabla 2
    nut1_f11 = parseFloat(document.getElementById("nut1_f11").value) || 0,
    nut1_f12 = parseFloat(document.getElementById("nut1_f12").value) || 0,
    nut1_f13 = parseFloat(document.getElementById("nut1_f13").value) || 0,
    nut1_f14 = parseFloat(document.getElementById("nut1_f14").value) || 0,
    nut1_f15 = parseFloat(document.getElementById("nut1_f15").value) || 0,

    nut2_f11 = parseFloat(document.getElementById("nut2_f11").value) || 0,
    nut2_f12 = parseFloat(document.getElementById("nut2_f12").value) || 0,
    nut2_f13 = parseFloat(document.getElementById("nut2_f13").value) || 0,
    nut2_f14 = parseFloat(document.getElementById("nut2_f14").value) || 0,
    nut2_f15 = parseFloat(document.getElementById("nut2_f15").value) || 0,

    nut3_f11 = parseFloat(document.getElementById("nut3_f11").value) || 0,
    nut3_f12 = parseFloat(document.getElementById("nut3_f12").value) || 0,
    nut3_f13 = parseFloat(document.getElementById("nut3_f13").value) || 0,
    nut3_f14 = parseFloat(document.getElementById("nut3_f14").value) || 0,
    nut3_f15 = parseFloat(document.getElementById("nut3_f15").value) || 0,

    nut4_f11 = parseFloat(document.getElementById("nut4_f11").value) || 0,
    nut4_f12 = parseFloat(document.getElementById("nut4_f12").value) || 0,
    nut4_f13 = parseFloat(document.getElementById("nut4_f13").value) || 0,
    nut4_f14 = parseFloat(document.getElementById("nut4_f14").value) || 0,
    nut4_f15 = parseFloat(document.getElementById("nut4_f15").value) || 0,

    //Columna 1, tabla 3
    nut1_f16 = parseFloat(document.getElementById("nut1_f16").value) || 0,
    nut1_f17 = parseFloat(document.getElementById("nut1_f17").value) || 0,
    nut1_f18 = parseFloat(document.getElementById("nut1_f18").value) || 0,
    nut1_f19 = parseFloat(document.getElementById("nut1_f19").value) || 0,
    nut1_f20 = parseFloat(document.getElementById("nut1_f20").value) || 0,
    nut1_f21 = parseFloat(document.getElementById("nut1_f21").value) || 0,
    nut1_f22 = parseFloat(document.getElementById("nut1_f22").value) || 0,
    nut1_f23 = parseFloat(document.getElementById("nut1_f23").value) || 0,
    nut1_f24 = parseFloat(document.getElementById("nut1_f24").value) || 0,
    nut1_f25 = parseFloat(document.getElementById("nut1_f25").value) || 0,

    nut2_f16 = parseFloat(document.getElementById("nut2_f16").value) || 0,
    nut2_f17 = parseFloat(document.getElementById("nut2_f17").value) || 0,
    nut2_f18 = parseFloat(document.getElementById("nut2_f18").value) || 0,
    nut2_f19 = parseFloat(document.getElementById("nut2_f19").value) || 0,
    nut2_f20 = parseFloat(document.getElementById("nut2_f20").value) || 0,
    nut2_f21 = parseFloat(document.getElementById("nut2_f21").value) || 0,
    nut2_f22 = parseFloat(document.getElementById("nut2_f22").value) || 0,
    nut2_f23 = parseFloat(document.getElementById("nut2_f23").value) || 0,
    nut2_f24 = parseFloat(document.getElementById("nut2_f24").value) || 0,
    nut2_f25 = parseFloat(document.getElementById("nut2_f25").value) || 0,
 
    nut3_f16 = parseFloat(document.getElementById("nut3_f16").value) || 0,
    nut3_f17 = parseFloat(document.getElementById("nut3_f17").value) || 0,
    nut3_f18 = parseFloat(document.getElementById("nut3_f18").value) || 0,
    nut3_f19 = parseFloat(document.getElementById("nut3_f19").value) || 0,
    nut3_f20 = parseFloat(document.getElementById("nut3_f20").value) || 0,
    nut3_f21 = parseFloat(document.getElementById("nut3_f21").value) || 0,
    nut3_f22 = parseFloat(document.getElementById("nut3_f22").value) || 0,
    nut3_f23 = parseFloat(document.getElementById("nut3_f23").value) || 0,
    nut3_f24 = parseFloat(document.getElementById("nut3_f24").value) || 0,
    nut3_f25 = parseFloat(document.getElementById("nut3_f25").value) || 0,

    nut4_f16 = parseFloat(document.getElementById("nut4_f16").value) || 0,
    nut4_f17 = parseFloat(document.getElementById("nut4_f17").value) || 0,
    nut4_f18 = parseFloat(document.getElementById("nut4_f18").value) || 0,
    nut4_f19 = parseFloat(document.getElementById("nut4_f19").value) || 0,
    nut4_f20 = parseFloat(document.getElementById("nut4_f20").value) || 0,
    nut4_f21 = parseFloat(document.getElementById("nut4_f21").value) || 0,
    nut4_f22 = parseFloat(document.getElementById("nut4_f22").value) || 0,
    nut4_f23 = parseFloat(document.getElementById("nut4_f23").value) || 0,
    nut4_f24 = parseFloat(document.getElementById("nut4_f24").value) || 0,
    nut4_f25 = parseFloat(document.getElementById("nut4_f25").value) || 0,

    //Columna 1, tabla 4
    nut1_f26 = parseFloat(document.getElementById("nut1_f26").value) || 0,
    nut1_f27 = parseFloat(document.getElementById("nut1_f27").value) || 0,
    nut1_f28 = parseFloat(document.getElementById("nut1_f28").value) || 0,
    nut1_f29 = parseFloat(document.getElementById("nut1_f29").value) || 0,
    nut1_f30 = parseFloat(document.getElementById("nut1_f30").value) || 0,

    nut2_f26 = parseFloat(document.getElementById("nut2_f26").value) || 0,
    nut2_f27 = parseFloat(document.getElementById("nut2_f27").value) || 0,
    nut2_f28 = parseFloat(document.getElementById("nut2_f28").value) || 0,
    nut2_f29 = parseFloat(document.getElementById("nut2_f29").value) || 0,
    nut2_f30 = parseFloat(document.getElementById("nut2_f30").value) || 0,
 
    nut3_f26 = parseFloat(document.getElementById("nut3_f26").value) || 0,
    nut3_f27 = parseFloat(document.getElementById("nut3_f27").value) || 0,
    nut3_f28 = parseFloat(document.getElementById("nut3_f28").value) || 0,
    nut3_f29 = parseFloat(document.getElementById("nut3_f29").value) || 0,
    nut3_f30 = parseFloat(document.getElementById("nut3_f30").value) || 0,

    nut4_f26 = parseFloat(document.getElementById("nut4_f26").value) || 0,
    nut4_f27 = parseFloat(document.getElementById("nut4_f27").value) || 0,
    nut4_f28 = parseFloat(document.getElementById("nut4_f28").value) || 0,
    nut4_f29 = parseFloat(document.getElementById("nut4_f29").value) || 0,
    nut4_f30 = parseFloat(document.getElementById("nut4_f30").value) || 0,

    //Columna 1, tabla 5
    nut1_f31 = parseFloat(document.getElementById("nut1_f31").value) || 0,
    nut1_f32 = parseFloat(document.getElementById("nut1_f32").value) || 0,
    nut1_f33 = parseFloat(document.getElementById("nut1_f33").value) || 0,
    nut1_f34 = parseFloat(document.getElementById("nut1_f34").value) || 0,
    nut1_f35 = parseFloat(document.getElementById("nut1_f35").value) || 0,
    nut1_f36 = parseFloat(document.getElementById("nut1_f36").value) || 0,
    nut1_f37 = parseFloat(document.getElementById("nut1_f37").value) || 0,
    nut1_f38 = parseFloat(document.getElementById("nut1_f38").value) || 0,
    nut1_f39 = parseFloat(document.getElementById("nut1_f39").value) || 0,
    nut1_f40 = parseFloat(document.getElementById("nut1_f40").value) || 0,

    nut2_f31 = parseFloat(document.getElementById("nut2_f31").value) || 0,
    nut2_f32 = parseFloat(document.getElementById("nut2_f32").value) || 0,
    nut2_f33 = parseFloat(document.getElementById("nut2_f33").value) || 0,
    nut2_f34 = parseFloat(document.getElementById("nut2_f34").value) || 0,
    nut2_f35 = parseFloat(document.getElementById("nut2_f35").value) || 0,
    nut2_f36 = parseFloat(document.getElementById("nut2_f36").value) || 0,
    nut2_f37 = parseFloat(document.getElementById("nut2_f37").value) || 0,
    nut2_f38 = parseFloat(document.getElementById("nut2_f38").value) || 0,
    nut2_f39 = parseFloat(document.getElementById("nut2_f39").value) || 0,
    nut2_f40 = parseFloat(document.getElementById("nut2_f40").value) || 0,
 
    nut3_f31 = parseFloat(document.getElementById("nut3_f31").value) || 0,
    nut3_f32 = parseFloat(document.getElementById("nut3_f32").value) || 0,
    nut3_f33 = parseFloat(document.getElementById("nut3_f33").value) || 0,
    nut3_f34 = parseFloat(document.getElementById("nut3_f34").value) || 0,
    nut3_f35 = parseFloat(document.getElementById("nut3_f35").value) || 0,
    nut3_f36 = parseFloat(document.getElementById("nut3_f36").value) || 0,
    nut3_f37 = parseFloat(document.getElementById("nut3_f37").value) || 0,
    nut3_f38 = parseFloat(document.getElementById("nut3_f38").value) || 0,
    nut3_f39 = parseFloat(document.getElementById("nut3_f39").value) || 0,
    nut3_f40 = parseFloat(document.getElementById("nut3_f40").value) || 0,

    nut4_f31 = parseFloat(document.getElementById("nut4_f31").value) || 0,
    nut4_f32 = parseFloat(document.getElementById("nut4_f32").value) || 0,
    nut4_f33 = parseFloat(document.getElementById("nut4_f33").value) || 0,
    nut4_f34 = parseFloat(document.getElementById("nut4_f34").value) || 0,
    nut4_f35 = parseFloat(document.getElementById("nut4_f35").value) || 0,
    nut4_f36 = parseFloat(document.getElementById("nut4_f36").value) || 0,
    nut4_f37 = parseFloat(document.getElementById("nut4_f37").value) || 0,
    nut4_f38 = parseFloat(document.getElementById("nut4_f38").value) || 0,
    nut4_f39 = parseFloat(document.getElementById("nut4_f39").value) || 0,
    nut4_f40 = parseFloat(document.getElementById("nut4_f40").value) || 0;

    //SUMA DE FILAS
    //Tabla1
    var total1_opcion1 = (nut1_f1 + nut1_f2 + nut1_f3 + nut1_f4 + nut1_f5 + nut1_f6 + nut1_f7 + nut1_f8 + nut1_f9 + nut1_f10).toFixed(1),
    total1_opcion2 = (nut2_f1 + nut2_f2 + nut2_f3 + nut2_f4 + nut2_f5 + nut2_f6 + nut2_f7 + nut2_f8 + nut2_f9 + nut2_f10).toFixed(1),
    total1_opcion3 = (nut3_f1 + nut3_f2 + nut3_f3 + nut3_f4 + nut3_f5 + nut3_f6 + nut3_f7 + nut3_f8 + nut3_f9 + nut3_f10).toFixed(1),
    total1_opcion4 = (nut4_f1 + nut4_f2 + nut4_f3 + nut4_f4 + nut4_f5 + nut4_f6 + nut4_f7 + nut4_f8 + nut4_f9 + nut4_f10).toFixed(1),

    total2_opcion1 = (nut1_f11 + nut1_f12 + nut1_f13 + nut1_f14 + nut1_f15).toFixed(1),
    total2_opcion2 = (nut2_f11 + nut2_f12 + nut2_f13 + nut2_f14 + nut2_f15).toFixed(1),
    total2_opcion3 = (nut3_f11 + nut3_f12 + nut3_f13 + nut3_f14 + nut3_f15).toFixed(1),
    total2_opcion4 = (nut4_f11 + nut4_f12 + nut4_f13 + nut4_f14 + nut4_f15).toFixed(1),

    total3_opcion1 = (nut1_f16 + nut1_f17 + nut1_f18 + nut1_f19 + nut1_f20 + nut1_f21 + nut1_f22 + nut1_f23 + nut1_f24 + nut1_f25).toFixed(1),
    total3_opcion2 = (nut2_f16 + nut2_f17 + nut2_f18 + nut2_f19 + nut2_f20 + nut2_f21 + nut2_f22 + nut2_f23 + nut2_f24 + nut2_f25).toFixed(1),
    total3_opcion3 = (nut3_f16 + nut3_f17 + nut3_f18 + nut3_f19 + nut3_f20 + nut3_f21 + nut3_f22 + nut3_f23 + nut3_f24 + nut3_f25).toFixed(1),
    total3_opcion4 = (nut4_f16 + nut4_f17 + nut4_f18 + nut4_f19 + nut4_f20 + nut4_f21 + nut4_f22 + nut4_f23 + nut4_f24 + nut4_f25).toFixed(1),

    total4_opcion1 = (nut1_f26 + nut1_f27 + nut1_f28 + nut1_f29 + nut1_f30).toFixed(1),
    total4_opcion2 = (nut2_f26 + nut2_f27 + nut2_f28 + nut2_f29 + nut2_f30).toFixed(1),
    total4_opcion3 = (nut3_f26 + nut3_f27 + nut3_f28 + nut3_f29 + nut3_f30).toFixed(1),
    total4_opcion4 = (nut4_f26 + nut4_f27 + nut4_f28 + nut4_f29 + nut4_f30).toFixed(1),

    total5_opcion1 = (nut1_f31 + nut1_f32 + nut1_f33 + nut1_f34 + nut1_f35 + nut1_f36 + nut1_f37 + nut1_f38 + nut1_f39 + nut1_f40).toFixed(1),
    total5_opcion2 = (nut2_f31 + nut2_f32 + nut2_f33 + nut2_f34 + nut2_f35 + nut2_f36 + nut2_f37 + nut2_f38 + nut2_f39 + nut2_f40).toFixed(1),
    total5_opcion3 = (nut3_f31 + nut3_f32 + nut3_f33 + nut3_f34 + nut3_f35 + nut3_f36 + nut3_f37 + nut3_f38 + nut3_f39 + nut3_f40).toFixed(1),
    total5_opcion4 = (nut4_f31 + nut4_f32 + nut4_f33 + nut4_f34 + nut4_f35 + nut4_f36 + nut4_f37 + nut4_f38 + nut4_f39 + nut4_f40).toFixed(1);

        if(opcion1 === "pb" || opcion1 === "pn" || opcion1 === "ig" || opcion1 === "cg"){
            document.getElementById("total1_opcion1").value = "";
            document.getElementById("total2_opcion1").value = "";
            document.getElementById("total3_opcion1").value = "";
            document.getElementById("total4_opcion1").value = "";
            document.getElementById("total5_opcion1").value = "";
            document.getElementById("total6_opcion1").value = "";
        }else{
            document.getElementById("total1_opcion1").value = total1_opcion1;
            document.getElementById("total2_opcion1").value = total2_opcion1;
            document.getElementById("total3_opcion1").value = total3_opcion1;
            document.getElementById("total4_opcion1").value = total4_opcion1;
            document.getElementById("total5_opcion1").value = total5_opcion1;
            document.getElementById("total6_opcion1").value = (nut1_f1 + nut1_f2 + nut1_f3 + nut1_f4 + nut1_f5 + nut1_f6 + nut1_f7 + nut1_f8 + nut1_f9 + nut1_f10 +
            nut1_f11 + nut1_f12 + nut1_f13 + nut1_f14 + nut1_f15 + nut1_f16 + nut1_f17 + nut1_f18 + nut1_f19 + nut1_f20 + nut1_f21 + nut1_f22 + nut1_f23 + nut1_f24 + nut1_f25
            + nut1_f26 + nut1_f27 + nut1_f28 + nut1_f29 + nut1_f30 + nut1_f31 + nut1_f32 + nut1_f33 + nut1_f34 + nut1_f35 + nut1_f36 + nut1_f37 + nut1_f38 + nut1_f39 + nut1_f40).toFixed(1);
        }

        if(opcion2 === "pb" || opcion2 === "pn" || opcion2 === "ig" || opcion2 === "cg"){
            document.getElementById("total1_opcion2").value = "";
            document.getElementById("total2_opcion2").value = "";
            document.getElementById("total3_opcion2").value = "";
            document.getElementById("total4_opcion2").value = "";
            document.getElementById("total5_opcion2").value = "";
            document.getElementById("total6_opcion2").value = "";
        }else{
            document.getElementById("total1_opcion2").value = total1_opcion2;
            document.getElementById("total2_opcion2").value = total2_opcion2;
            document.getElementById("total3_opcion2").value = total3_opcion2;
            document.getElementById("total4_opcion2").value = total4_opcion2;
            document.getElementById("total5_opcion2").value = total5_opcion2;
            document.getElementById("total6_opcion2").value = (nut2_f1 + nut2_f2 + nut2_f3 + nut2_f4 + nut2_f5 + nut2_f6 + nut2_f7 + nut2_f8 + nut2_f9 + nut2_f10 + 
            nut2_f11 + nut2_f12 + nut2_f13 + nut2_f14 + nut2_f15 + nut2_f16 + nut2_f17 + nut2_f18 + nut2_f19 + nut2_f20 + nut2_f21 + nut2_f22 + nut2_f23 + nut2_f24 + nut2_f25
            + nut2_f26 + nut2_f27 + nut2_f28 + nut2_f29 + nut2_f30 + nut2_f31 + nut2_f32 + nut2_f33 + nut2_f34 + nut2_f35 + nut2_f36 + nut2_f37 + nut2_f38 + nut2_f39 + nut2_f40).toFixed(1);
        }
        
        if(opcion3 === "pb" || opcion3 === "pn" || opcion3 === "ig" || opcion3 === "cg"){
            document.getElementById("total1_opcion3").value = "";
            document.getElementById("total2_opcion3").value = "";
            document.getElementById("total3_opcion3").value = "";
            document.getElementById("total4_opcion3").value = "";
            document.getElementById("total5_opcion3").value = "";
            document.getElementById("total6_opcion3").value = "";
        }else{
            document.getElementById("total1_opcion3").value = total1_opcion3;
            document.getElementById("total2_opcion3").value = total2_opcion3;
            document.getElementById("total3_opcion3").value = total3_opcion3;
            document.getElementById("total4_opcion3").value = total4_opcion3;
            document.getElementById("total5_opcion3").value = total5_opcion3;
            document.getElementById("total6_opcion3").value = (nut3_f1 + nut3_f2 + nut3_f3 + nut3_f4 + nut3_f5 + nut3_f6 + nut3_f7 + nut3_f8 + nut3_f9 + nut3_f10 +
            nut3_f11 + nut3_f12 + nut3_f13 + nut3_f14 + nut3_f15 + nut3_f16 + nut3_f17 + nut3_f18 + nut3_f19 + nut3_f20 + nut3_f21 + nut3_f22 + nut3_f23 + nut3_f24 + nut3_f25
            + nut3_f26 + nut3_f27 + nut3_f28 + nut3_f29 + nut3_f30 + nut3_f31 + nut3_f32 + nut3_f33 + nut3_f34 + nut3_f35 + nut3_f36 + nut3_f37 + nut3_f38 + nut3_f39 + nut3_f40).toFixed(1);
        }

        if(opcion4 === "pb" || opcion4 === "pn" || opcion4 === "ig" || opcion4 === "cg"){
            document.getElementById("total1_opcion4").value = "";
            document.getElementById("total2_opcion4").value = "";
            document.getElementById("total3_opcion4").value = "";
            document.getElementById("total4_opcion4").value = "";
            document.getElementById("total5_opcion4").value = "";
            document.getElementById("total6_opcion4").value = "";
        }else{
            document.getElementById("total1_opcion4").value = total1_opcion4;
            document.getElementById("total2_opcion4").value = total2_opcion4;
            document.getElementById("total3_opcion4").value = total3_opcion4;
            document.getElementById("total4_opcion4").value = total4_opcion4;
            document.getElementById("total5_opcion4").value = total5_opcion4;
            document.getElementById("total6_opcion4").value = (nut4_f1 + nut4_f2 + nut4_f3 + nut4_f4 + nut4_f5 + nut4_f6 + nut4_f7 + nut4_f8 + nut4_f9 + nut4_f10 +
            nut4_f11 + nut4_f12 + nut4_f13 + nut4_f14 + nut4_f15 + nut4_f16 + nut4_f17 + nut4_f18 + nut4_f19 + nut4_f20 + nut4_f21 + nut4_f22 + nut4_f23 + nut4_f24 + nut4_f25
            + nut4_f26 + nut4_f27 + nut4_f28 + nut4_f29 + nut4_f30 + nut4_f31 + nut4_f32 + nut4_f33 + nut4_f34 + nut4_f35 + nut4_f36 + nut4_f37 + nut4_f38 + nut4_f39 + nut4_f40).toFixed(1);
        }

}

function eliminar_desayuno(){
    document.getElementById("n_desayuno").value = "";

    document.getElementById("grupo1").value = "";
    document.getElementById("porcion1").value = "";
    document.getElementById("tag1").value = "";
    document.getElementById("cantidad1").value = "";
    document.getElementById("unidad1").value = "";
    document.getElementById("nut1_f1").value = "";
    document.getElementById("nut2_f1").value = "";
    document.getElementById("nut3_f1").value = "";
    document.getElementById("nut4_f1").value = "";

    document.getElementById("grupo2").value = "";
    document.getElementById("porcion2").value = "";
    document.getElementById("tag2").value = "";
    document.getElementById("cantidad2").value = "";
    document.getElementById("unidad2").value = "";
    document.getElementById("nut1_f2").value = "";
    document.getElementById("nut2_f2").value = "";
    document.getElementById("nut3_f2").value = "";
    document.getElementById("nut4_f2").value = "";

    document.getElementById("grupo3").value = "";
    document.getElementById("porcion3").value = "";
    document.getElementById("tag3").value = "";
    document.getElementById("cantidad3").value = "";
    document.getElementById("unidad3").value = "";
    document.getElementById("nut1_f3").value = "";
    document.getElementById("nut2_f3").value = "";
    document.getElementById("nut3_f3").value = "";
    document.getElementById("nut4_f3").value = "";

    document.getElementById("grupo4").value = "";
    document.getElementById("porcion4").value = "";
    document.getElementById("tag4").value = "";
    document.getElementById("cantidad4").value = "";
    document.getElementById("unidad4").value = "";
    document.getElementById("nut1_f4").value = "";
    document.getElementById("nut2_f4").value = "";
    document.getElementById("nut3_f4").value = "";
    document.getElementById("nut4_f4").value = "";

    document.getElementById("grupo5").value = "";
    document.getElementById("porcion5").value = "";
    document.getElementById("tag5").value = "";
    document.getElementById("cantidad5").value = "";
    document.getElementById("unidad5").value = "";
    document.getElementById("nut1_f5").value = "";
    document.getElementById("nut2_f5").value = "";
    document.getElementById("nut3_f5").value = "";
    document.getElementById("nut4_f5").value = "";

    document.getElementById("grupo6").value = "";
    document.getElementById("porcion6").value = "";
    document.getElementById("tag6").value = "";
    document.getElementById("cantidad6").value = "";
    document.getElementById("unidad6").value = "";
    document.getElementById("nut1_f6").value = "";
    document.getElementById("nut2_f6").value = "";
    document.getElementById("nut3_f6").value = "";
    document.getElementById("nut4_f6").value = "";

    document.getElementById("grupo7").value = "";
    document.getElementById("porcion7").value = "";
    document.getElementById("tag7").value = "";
    document.getElementById("cantidad7").value = "";
    document.getElementById("unidad7").value = "";
    document.getElementById("nut1_f7").value = "";
    document.getElementById("nut2_f7").value = "";
    document.getElementById("nut3_f7").value = "";
    document.getElementById("nut4_f7").value = "";

    document.getElementById("grupo8").value = "";
    document.getElementById("porcion8").value = "";
    document.getElementById("tag8").value = "";
    document.getElementById("cantidad8").value = "";
    document.getElementById("unidad8").value = "";
    document.getElementById("nut1_f8").value = "";
    document.getElementById("nut2_f8").value = "";
    document.getElementById("nut3_f8").value = "";
    document.getElementById("nut4_f8").value = "";

    document.getElementById("grupo9").value = "";
    document.getElementById("porcion9").value = "";
    document.getElementById("tag9").value = "";
    document.getElementById("cantidad9").value = "";
    document.getElementById("unidad9").value = "";
    document.getElementById("nut1_f9").value = "";
    document.getElementById("nut2_f9").value = "";
    document.getElementById("nut3_f9").value = "";
    document.getElementById("nut4_f9").value = "";

    document.getElementById("grupo10").value = "";
    document.getElementById("porcion10").value = "";
    document.getElementById("tag10").value = "";
    document.getElementById("cantidad10").value = "";
    document.getElementById("unidad10").value = "";
    document.getElementById("nut1_f10").value = "";
    document.getElementById("nut2_f10").value = "";
    document.getElementById("nut3_f10").value = "";
    document.getElementById("nut4_f10").value = "";

    document.getElementById("total1_opcion1").value = "";
    document.getElementById("total1_opcion2").value = "";
    document.getElementById("total1_opcion3").value = "";
    document.getElementById("total1_opcion4").value = "";
}

function eliminar_c1(){
    document.getElementById("n_colacion1").value = "";

    document.getElementById("grupo11").value = "";
    document.getElementById("porcion11").value = "";
    document.getElementById("tag11").value = "";
    document.getElementById("cantidad11").value = "";
    document.getElementById("unidad11").value = "";
    document.getElementById("nut1_f11").value = "";
    document.getElementById("nut2_f11").value = "";
    document.getElementById("nut3_f11").value = "";
    document.getElementById("nut4_f11").value = "";

    document.getElementById("grupo12").value = "";
    document.getElementById("porcion12").value = "";
    document.getElementById("tag12").value = "";
    document.getElementById("cantidad12").value = "";
    document.getElementById("unidad12").value = "";
    document.getElementById("nut1_f12").value = "";
    document.getElementById("nut2_f12").value = "";
    document.getElementById("nut3_f12").value = "";
    document.getElementById("nut4_f12").value = "";

    document.getElementById("grupo13").value = "";
    document.getElementById("porcion13").value = "";
    document.getElementById("tag13").value = "";
    document.getElementById("cantidad13").value = "";
    document.getElementById("unidad13").value = "";
    document.getElementById("nut1_f13").value = "";
    document.getElementById("nut2_f13").value = "";
    document.getElementById("nut3_f13").value = "";
    document.getElementById("nut4_f13").value = "";

    document.getElementById("grupo14").value = "";
    document.getElementById("porcion14").value = "";
    document.getElementById("tag14").value = "";
    document.getElementById("cantidad14").value = "";
    document.getElementById("unidad14").value = "";
    document.getElementById("nut1_f14").value = "";
    document.getElementById("nut2_f14").value = "";
    document.getElementById("nut3_f14").value = "";
    document.getElementById("nut4_f14").value = "";

    document.getElementById("grupo15").value = "";
    document.getElementById("porcion15").value = "";
    document.getElementById("tag15").value = "";
    document.getElementById("cantidad15").value = "";
    document.getElementById("unidad15").value = "";
    document.getElementById("nut1_f15").value = "";
    document.getElementById("nut2_f15").value = "";
    document.getElementById("nut3_f15").value = "";
    document.getElementById("nut4_f15").value = "";

    document.getElementById("total2_opcion1").value = "";
    document.getElementById("total2_opcion2").value = "";
    document.getElementById("total2_opcion3").value = "";
    document.getElementById("total2_opcion4").value = "";
}

function eliminar_comida(){
    document.getElementById("n_comida").value = "";

    document.getElementById("grupo16").value = "";
    document.getElementById("porcion16").value = "";
    document.getElementById("tag16").value = "";
    document.getElementById("cantidad16").value = "";
    document.getElementById("unidad16").value = "";
    document.getElementById("nut1_f16").value = "";
    document.getElementById("nut2_f16").value = "";
    document.getElementById("nut3_f16").value = "";
    document.getElementById("nut4_f16").value = "";

    document.getElementById("grupo17").value = "";
    document.getElementById("porcion17").value = "";
    document.getElementById("tag17").value = "";
    document.getElementById("cantidad17").value = "";
    document.getElementById("unidad17").value = "";
    document.getElementById("nut1_f17").value = "";
    document.getElementById("nut2_f17").value = "";
    document.getElementById("nut3_f17").value = "";
    document.getElementById("nut4_f17").value = "";

    document.getElementById("grupo18").value = "";
    document.getElementById("porcion18").value = "";
    document.getElementById("tag18").value = "";
    document.getElementById("cantidad18").value = "";
    document.getElementById("unidad18").value = "";
    document.getElementById("nut1_f18").value = "";
    document.getElementById("nut2_f18").value = "";
    document.getElementById("nut3_f18").value = "";
    document.getElementById("nut4_f18").value = "";

    document.getElementById("grupo19").value = "";
    document.getElementById("porcion19").value = "";
    document.getElementById("tag19").value = "";
    document.getElementById("cantidad19").value = "";
    document.getElementById("unidad19").value = "";
    document.getElementById("nut1_f19").value = "";
    document.getElementById("nut2_f19").value = "";
    document.getElementById("nut3_f19").value = "";
    document.getElementById("nut4_f19").value = "";

    document.getElementById("grupo20").value = "";
    document.getElementById("porcion20").value = "";
    document.getElementById("tag20").value = "";
    document.getElementById("cantidad20").value = "";
    document.getElementById("unidad20").value = "";
    document.getElementById("nut1_f20").value = "";
    document.getElementById("nut2_f20").value = "";
    document.getElementById("nut3_f20").value = "";
    document.getElementById("nut4_f20").value = "";

    document.getElementById("grupo21").value = "";
    document.getElementById("porcion21").value = "";
    document.getElementById("tag21").value = "";
    document.getElementById("cantidad21").value = "";
    document.getElementById("unidad21").value = "";
    document.getElementById("nut1_f21").value = "";
    document.getElementById("nut2_f21").value = "";
    document.getElementById("nut3_f21").value = "";
    document.getElementById("nut4_f21").value = "";

    document.getElementById("grupo22").value = "";
    document.getElementById("porcion22").value = "";
    document.getElementById("tag22").value = "";
    document.getElementById("cantidad22").value = "";
    document.getElementById("unidad22").value = "";
    document.getElementById("nut1_f22").value = "";
    document.getElementById("nut2_f22").value = "";
    document.getElementById("nut3_f22").value = "";
    document.getElementById("nut4_f22").value = "";

    document.getElementById("grupo23").value = "";
    document.getElementById("porcion23").value = "";
    document.getElementById("tag23").value = "";
    document.getElementById("cantidad23").value = "";
    document.getElementById("unidad23").value = "";
    document.getElementById("nut1_f23").value = "";
    document.getElementById("nut2_f23").value = "";
    document.getElementById("nut3_f23").value = "";
    document.getElementById("nut4_f23").value = "";

    document.getElementById("grupo24").value = "";
    document.getElementById("porcion24").value = "";
    document.getElementById("tag24").value = "";
    document.getElementById("cantidad24").value = "";
    document.getElementById("unidad24").value = "";
    document.getElementById("nut1_f24").value = "";
    document.getElementById("nut2_f24").value = "";
    document.getElementById("nut3_f24").value = "";
    document.getElementById("nut4_f24").value = "";

    document.getElementById("grupo25").value = "";
    document.getElementById("porcion25").value = "";
    document.getElementById("tag25").value = "";
    document.getElementById("cantidad25").value = "";
    document.getElementById("unidad25").value = "";
    document.getElementById("nut1_f25").value = "";
    document.getElementById("nut2_f25").value = "";
    document.getElementById("nut3_f25").value = "";
    document.getElementById("nut4_f25").value = "";

    document.getElementById("total3_opcion1").value = "";
    document.getElementById("total3_opcion2").value = "";
    document.getElementById("total3_opcion3").value = "";
    document.getElementById("total3_opcion4").value = "";
}

function eliminar_c2(){
    document.getElementById("n_colacion2").value = "";

    document.getElementById("grupo26").value = "";
    document.getElementById("porcion26").value = "";
    document.getElementById("tag26").value = "";
    document.getElementById("cantidad26").value = "";
    document.getElementById("unidad26").value = "";
    document.getElementById("nut1_f26").value = "";
    document.getElementById("nut2_f26").value = "";
    document.getElementById("nut3_f26").value = "";
    document.getElementById("nut4_f26").value = "";

    document.getElementById("grupo27").value = "";
    document.getElementById("porcion27").value = "";
    document.getElementById("tag27").value = "";
    document.getElementById("cantidad27").value = "";
    document.getElementById("unidad27").value = "";
    document.getElementById("nut1_f27").value = "";
    document.getElementById("nut2_f27").value = "";
    document.getElementById("nut3_f27").value = "";
    document.getElementById("nut4_f27").value = "";

    document.getElementById("grupo28").value = "";
    document.getElementById("porcion28").value = "";
    document.getElementById("tag28").value = "";
    document.getElementById("cantidad28").value = "";
    document.getElementById("unidad28").value = "";
    document.getElementById("nut1_f28").value = "";
    document.getElementById("nut2_f28").value = "";
    document.getElementById("nut3_f28").value = "";
    document.getElementById("nut4_f28").value = "";

    document.getElementById("grupo29").value = "";
    document.getElementById("porcion29").value = "";
    document.getElementById("tag29").value = "";
    document.getElementById("cantidad29").value = "";
    document.getElementById("unidad29").value = "";
    document.getElementById("nut1_f29").value = "";
    document.getElementById("nut2_f29").value = "";
    document.getElementById("nut3_f29").value = "";
    document.getElementById("nut4_f29").value = "";

    document.getElementById("grupo30").value = "";
    document.getElementById("porcion30").value = "";
    document.getElementById("tag30").value = "";
    document.getElementById("cantidad30").value = "";
    document.getElementById("unidad30").value = "";
    document.getElementById("nut1_f30").value = "";
    document.getElementById("nut2_f30").value = "";
    document.getElementById("nut3_f30").value = "";
    document.getElementById("nut4_f30").value = "";
    
    document.getElementById("total4_opcion1").value = "";
    document.getElementById("total4_opcion2").value = "";
    document.getElementById("total4_opcion3").value = "";
    document.getElementById("total4_opcion4").value = "";
}

function eliminar_cena(){
    document.getElementById("n_cena").value = "";

    document.getElementById("grupo31").value = "";
    document.getElementById("porcion31").value = "";
    document.getElementById("tag31").value = "";
    document.getElementById("cantidad31").value = "";
    document.getElementById("unidad31").value = "";
    document.getElementById("nut1_f31").value = "";
    document.getElementById("nut2_f31").value = "";
    document.getElementById("nut3_f31").value = "";
    document.getElementById("nut4_f31").value = "";

    document.getElementById("grupo32").value = "";
    document.getElementById("porcion32").value = "";
    document.getElementById("tag32").value = "";
    document.getElementById("cantidad32").value = "";
    document.getElementById("unidad32").value = "";
    document.getElementById("nut1_f32").value = "";
    document.getElementById("nut2_f32").value = "";
    document.getElementById("nut3_f32").value = "";
    document.getElementById("nut4_f32").value = "";

    document.getElementById("grupo33").value = "";
    document.getElementById("porcion33").value = "";
    document.getElementById("tag33").value = "";
    document.getElementById("cantidad33").value = "";
    document.getElementById("unidad33").value = "";
    document.getElementById("nut1_f33").value = "";
    document.getElementById("nut2_f33").value = "";
    document.getElementById("nut3_f33").value = "";
    document.getElementById("nut4_f33").value = "";

    document.getElementById("grupo34").value = "";
    document.getElementById("porcion34").value = "";
    document.getElementById("tag34").value = "";
    document.getElementById("cantidad34").value = "";
    document.getElementById("unidad34").value = "";
    document.getElementById("nut1_f34").value = "";
    document.getElementById("nut2_f34").value = "";
    document.getElementById("nut3_f34").value = "";
    document.getElementById("nut4_f34").value = "";

    document.getElementById("grupo35").value = "";
    document.getElementById("porcion35").value = "";
    document.getElementById("tag35").value = "";
    document.getElementById("cantidad35").value = "";
    document.getElementById("unidad35").value = "";
    document.getElementById("nut1_f35").value = "";
    document.getElementById("nut2_f35").value = "";
    document.getElementById("nut3_f35").value = "";
    document.getElementById("nut4_f35").value = "";

    document.getElementById("grupo36").value = "";
    document.getElementById("porcion36").value = "";
    document.getElementById("tag36").value = "";
    document.getElementById("cantidad36").value = "";
    document.getElementById("unidad36").value = "";
    document.getElementById("nut1_f36").value = "";
    document.getElementById("nut2_f36").value = "";
    document.getElementById("nut3_f36").value = "";
    document.getElementById("nut4_f36").value = "";

    document.getElementById("grupo37").value = "";
    document.getElementById("porcion37").value = "";
    document.getElementById("tag37").value = "";
    document.getElementById("cantidad37").value = "";
    document.getElementById("unidad37").value = "";
    document.getElementById("nut1_f37").value = "";
    document.getElementById("nut2_f37").value = "";
    document.getElementById("nut3_f37").value = "";
    document.getElementById("nut4_f37").value = "";

    document.getElementById("grupo38").value = "";
    document.getElementById("porcion38").value = "";
    document.getElementById("tag38").value = "";
    document.getElementById("cantidad38").value = "";
    document.getElementById("unidad38").value = "";
    document.getElementById("nut1_f38").value = "";
    document.getElementById("nut2_f38").value = "";
    document.getElementById("nut3_f38").value = "";
    document.getElementById("nut4_f38").value = "";

    document.getElementById("grupo39").value = "";
    document.getElementById("porcion39").value = "";
    document.getElementById("tag39").value = "";
    document.getElementById("cantidad39").value = "";
    document.getElementById("unidad39").value = "";
    document.getElementById("nut1_f39").value = "";
    document.getElementById("nut2_f39").value = "";
    document.getElementById("nut3_f39").value = "";
    document.getElementById("nut4_f39").value = "";

    document.getElementById("grupo40").value = "";
    document.getElementById("porcion40").value = "";
    document.getElementById("tag40").value = "";
    document.getElementById("cantidad40").value = "";
    document.getElementById("unidad40").value = "";
    document.getElementById("nut1_f40").value = "";
    document.getElementById("nut2_f40").value = "";
    document.getElementById("nut3_f40").value = "";
    document.getElementById("nut4_f40").value = "";

    document.getElementById("total5_opcion1").value = "";
    document.getElementById("total5_opcion2").value = "";
    document.getElementById("total5_opcion3").value = "";
    document.getElementById("total5_opcion4").value = "";
}
    
function eliminar_d(){
    eliminar_desayuno();
    eliminar_c1();
    eliminar_comida();
    eliminar_c2();
    eliminar_cena();
    
    document.getElementById("total6_opcion1").value = "";
    document.getElementById("total6_opcion2").value = "";
    document.getElementById("total6_opcion3").value = "";
    document.getElementById("total6_opcion4").value = "";
}