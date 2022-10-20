function sumartablas(){
    //Variables de los select
    var opcion1 = document.getElementById("opcion1").value,
    opcion2 = document.getElementById("opcion2").value,
    opcion3 = document.getElementById("opcion3").value,
    opcion4 = document.getElementById("opcion4").value,
    opcion5 = document.getElementById("opcion5").value,
    opcion6 = document.getElementById("opcion6").value;

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

    nut5_f1 = parseFloat(document.getElementById("nut5_f1").value) || 0,
    nut5_f2 = parseFloat(document.getElementById("nut5_f2").value) || 0,
    nut5_f3 = parseFloat(document.getElementById("nut5_f3").value) || 0,
    nut5_f4 = parseFloat(document.getElementById("nut5_f4").value) || 0,
    nut5_f5 = parseFloat(document.getElementById("nut5_f5").value) || 0,
    nut5_f6 = parseFloat(document.getElementById("nut5_f6").value) || 0,
    nut5_f7 = parseFloat(document.getElementById("nut5_f7").value) || 0,
    nut5_f8 = parseFloat(document.getElementById("nut5_f8").value) || 0,
    nut5_f9 = parseFloat(document.getElementById("nut5_f9").value) || 0,
    nut5_f10 = parseFloat(document.getElementById("nut5_f10").value) || 0,

    nut6_f1 = parseFloat(document.getElementById("nut6_f1").value) || 0,
    nut6_f2 = parseFloat(document.getElementById("nut6_f2").value) || 0,
    nut6_f3 = parseFloat(document.getElementById("nut6_f3").value) || 0,
    nut6_f4 = parseFloat(document.getElementById("nut6_f4").value) || 0,
    nut6_f5 = parseFloat(document.getElementById("nut6_f5").value) || 0,
    nut6_f6 = parseFloat(document.getElementById("nut6_f6").value) || 0,
    nut6_f7 = parseFloat(document.getElementById("nut6_f7").value) || 0,
    nut6_f8 = parseFloat(document.getElementById("nut6_f8").value) || 0,
    nut6_f9 = parseFloat(document.getElementById("nut6_f9").value) || 0,
    nut6_f10 = parseFloat(document.getElementById("nut6_f10").value) || 0,


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

    nut5_f11 = parseFloat(document.getElementById("nut5_f11").value) || 0,
    nut5_f12 = parseFloat(document.getElementById("nut5_f12").value) || 0,
    nut5_f13 = parseFloat(document.getElementById("nut5_f13").value) || 0,
    nut5_f14 = parseFloat(document.getElementById("nut5_f14").value) || 0,
    nut5_f15 = parseFloat(document.getElementById("nut5_f15").value) || 0,

    nut6_f11 = parseFloat(document.getElementById("nut6_f11").value) || 0,
    nut6_f12 = parseFloat(document.getElementById("nut6_f12").value) || 0,
    nut6_f13 = parseFloat(document.getElementById("nut6_f13").value) || 0,
    nut6_f14 = parseFloat(document.getElementById("nut6_f14").value) || 0,
    nut6_f15 = parseFloat(document.getElementById("nut6_f15").value) || 0,


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

    nut5_f16 = parseFloat(document.getElementById("nut5_f16").value) || 0,
    nut5_f17 = parseFloat(document.getElementById("nut5_f17").value) || 0,
    nut5_f18 = parseFloat(document.getElementById("nut5_f18").value) || 0,
    nut5_f19 = parseFloat(document.getElementById("nut5_f19").value) || 0,
    nut5_f20 = parseFloat(document.getElementById("nut5_f20").value) || 0,
    nut5_f21 = parseFloat(document.getElementById("nut5_f21").value) || 0,
    nut5_f22 = parseFloat(document.getElementById("nut5_f22").value) || 0,
    nut5_f23 = parseFloat(document.getElementById("nut5_f23").value) || 0,
    nut5_f24 = parseFloat(document.getElementById("nut5_f24").value) || 0,
    nut5_f25 = parseFloat(document.getElementById("nut5_f25").value) || 0,

    nut6_f16 = parseFloat(document.getElementById("nut6_f16").value) || 0,
    nut6_f17 = parseFloat(document.getElementById("nut6_f17").value) || 0,
    nut6_f18 = parseFloat(document.getElementById("nut6_f18").value) || 0,
    nut6_f19 = parseFloat(document.getElementById("nut6_f19").value) || 0,
    nut6_f20 = parseFloat(document.getElementById("nut6_f20").value) || 0,
    nut6_f21 = parseFloat(document.getElementById("nut6_f21").value) || 0,
    nut6_f22 = parseFloat(document.getElementById("nut6_f22").value) || 0,
    nut6_f23 = parseFloat(document.getElementById("nut6_f23").value) || 0,
    nut6_f24 = parseFloat(document.getElementById("nut6_f24").value) || 0,
    nut6_f25 = parseFloat(document.getElementById("nut6_f25").value) || 0,


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

    nut5_f26 = parseFloat(document.getElementById("nut5_f26").value) || 0,
    nut5_f27 = parseFloat(document.getElementById("nut5_f27").value) || 0,
    nut5_f28 = parseFloat(document.getElementById("nut5_f28").value) || 0,
    nut5_f29 = parseFloat(document.getElementById("nut5_f29").value) || 0,
    nut5_f30 = parseFloat(document.getElementById("nut5_f30").value) || 0,

    nut6_f26 = parseFloat(document.getElementById("nut6_f26").value) || 0,
    nut6_f27 = parseFloat(document.getElementById("nut6_f27").value) || 0,
    nut6_f28 = parseFloat(document.getElementById("nut6_f28").value) || 0,
    nut6_f29 = parseFloat(document.getElementById("nut6_f29").value) || 0,
    nut6_f30 = parseFloat(document.getElementById("nut6_f30").value) || 0,


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
    nut4_f40 = parseFloat(document.getElementById("nut4_f40").value) || 0,

    nut5_f31 = parseFloat(document.getElementById("nut5_f31").value) || 0,
    nut5_f32 = parseFloat(document.getElementById("nut5_f32").value) || 0,
    nut5_f33 = parseFloat(document.getElementById("nut5_f33").value) || 0,
    nut5_f34 = parseFloat(document.getElementById("nut5_f34").value) || 0,
    nut5_f35 = parseFloat(document.getElementById("nut5_f35").value) || 0,
    nut5_f36 = parseFloat(document.getElementById("nut5_f36").value) || 0,
    nut5_f37 = parseFloat(document.getElementById("nut5_f37").value) || 0,
    nut5_f38 = parseFloat(document.getElementById("nut5_f38").value) || 0,
    nut5_f39 = parseFloat(document.getElementById("nut5_f39").value) || 0,
    nut5_f40 = parseFloat(document.getElementById("nut5_f40").value) || 0,

    nut6_f31 = parseFloat(document.getElementById("nut6_f31").value) || 0,
    nut6_f32 = parseFloat(document.getElementById("nut6_f32").value) || 0,
    nut6_f33 = parseFloat(document.getElementById("nut6_f33").value) || 0,
    nut6_f34 = parseFloat(document.getElementById("nut6_f34").value) || 0,
    nut6_f35 = parseFloat(document.getElementById("nut6_f35").value) || 0,
    nut6_f36 = parseFloat(document.getElementById("nut6_f36").value) || 0,
    nut6_f37 = parseFloat(document.getElementById("nut6_f37").value) || 0,
    nut6_f38 = parseFloat(document.getElementById("nut6_f38").value) || 0,
    nut6_f39 = parseFloat(document.getElementById("nut6_f39").value) || 0,
    nut6_f40 = parseFloat(document.getElementById("nut6_f40").value) || 0;


    //SUMA DE FILAS
    //Tabla1
    var total1_opcion1 = (nut1_f1 + nut1_f2 + nut1_f3 + nut1_f4 + nut1_f5 + nut1_f6 + nut1_f7 + nut1_f8 + nut1_f9 + nut1_f10).toFixed(1),
    total1_opcion2 = (nut2_f1 + nut2_f2 + nut2_f3 + nut2_f4 + nut2_f5 + nut2_f6 + nut2_f7 + nut2_f8 + nut2_f9 + nut2_f10).toFixed(1),
    total1_opcion3 = (nut3_f1 + nut3_f2 + nut3_f3 + nut3_f4 + nut3_f5 + nut3_f6 + nut3_f7 + nut3_f8 + nut3_f9 + nut3_f10).toFixed(1),
    total1_opcion4 = (nut4_f1 + nut4_f2 + nut4_f3 + nut4_f4 + nut4_f5 + nut4_f6 + nut4_f7 + nut4_f8 + nut4_f9 + nut4_f10).toFixed(1),
    total1_opcion5 = (nut5_f1 + nut5_f2 + nut5_f3 + nut5_f4 + nut5_f5 + nut5_f6 + nut5_f7 + nut5_f8 + nut5_f9 + nut5_f10).toFixed(1),
    total1_opcion6 = (nut6_f1 + nut6_f2 + nut6_f3 + nut6_f4 + nut6_f5 + nut6_f6 + nut6_f7 + nut6_f8 + nut6_f9 + nut6_f10).toFixed(1),

    total2_opcion1 = (nut1_f11 + nut1_f12 + nut1_f13 + nut1_f14 + nut1_f15).toFixed(1),
    total2_opcion2 = (nut2_f11 + nut2_f12 + nut2_f13 + nut2_f14 + nut2_f15).toFixed(1),
    total2_opcion3 = (nut3_f11 + nut3_f12 + nut3_f13 + nut3_f14 + nut3_f15).toFixed(1),
    total2_opcion4 = (nut4_f11 + nut4_f12 + nut4_f13 + nut4_f14 + nut4_f15).toFixed(1),
    total2_opcion5 = (nut5_f11 + nut5_f12 + nut5_f13 + nut5_f14 + nut5_f15).toFixed(1),
    total2_opcion6 = (nut6_f11 + nut6_f12 + nut6_f13 + nut6_f14 + nut6_f15).toFixed(1),

    total3_opcion1 = (nut1_f16 + nut1_f17 + nut1_f18 + nut1_f19 + nut1_f20 + nut1_f21 + nut1_f22 + nut1_f23 + nut1_f24 + nut1_f25).toFixed(1),
    total3_opcion2 = (nut2_f16 + nut2_f17 + nut2_f18 + nut2_f19 + nut2_f20 + nut2_f21 + nut2_f22 + nut2_f23 + nut2_f24 + nut2_f25).toFixed(1),
    total3_opcion3 = (nut3_f16 + nut3_f17 + nut3_f18 + nut3_f19 + nut3_f20 + nut3_f21 + nut3_f22 + nut3_f23 + nut3_f24 + nut3_f25).toFixed(1),
    total3_opcion4 = (nut4_f16 + nut4_f17 + nut4_f18 + nut4_f19 + nut4_f20 + nut4_f21 + nut4_f22 + nut4_f23 + nut4_f24 + nut4_f25).toFixed(1),
    total3_opcion5 = (nut5_f16 + nut5_f17 + nut5_f18 + nut5_f19 + nut5_f20 + nut5_f21 + nut5_f22 + nut5_f23 + nut5_f24 + nut5_f25).toFixed(1),
    total3_opcion6 = (nut6_f16 + nut6_f17 + nut6_f18 + nut6_f19 + nut6_f20 + nut6_f21 + nut6_f22 + nut6_f23 + nut6_f24 + nut6_f25).toFixed(1),

    total4_opcion1 = (nut1_f26 + nut1_f27 + nut1_f28 + nut1_f29 + nut1_f30).toFixed(1),
    total4_opcion2 = (nut2_f26 + nut2_f27 + nut2_f28 + nut2_f29 + nut2_f30).toFixed(1),
    total4_opcion3 = (nut3_f26 + nut3_f27 + nut3_f28 + nut3_f29 + nut3_f30).toFixed(1),
    total4_opcion4 = (nut4_f26 + nut4_f27 + nut4_f28 + nut4_f29 + nut4_f30).toFixed(1),
    total4_opcion5 = (nut5_f26 + nut5_f27 + nut5_f28 + nut5_f29 + nut5_f30).toFixed(1),
    total4_opcion6 = (nut6_f26 + nut6_f27 + nut6_f28 + nut6_f29 + nut6_f30).toFixed(1),

    total5_opcion1 = (nut1_f31 + nut1_f32 + nut1_f33 + nut1_f34 + nut1_f35 + nut1_f36 + nut1_f37 + nut1_f38 + nut1_f39 + nut1_f40).toFixed(1),
    total5_opcion2 = (nut2_f31 + nut2_f32 + nut2_f33 + nut2_f34 + nut2_f35 + nut2_f36 + nut2_f37 + nut2_f38 + nut2_f39 + nut2_f40).toFixed(1),
    total5_opcion3 = (nut3_f31 + nut3_f32 + nut3_f33 + nut3_f34 + nut3_f35 + nut3_f36 + nut3_f37 + nut3_f38 + nut3_f39 + nut3_f40).toFixed(1),
    total5_opcion4 = (nut4_f31 + nut4_f32 + nut4_f33 + nut4_f34 + nut4_f35 + nut4_f36 + nut4_f37 + nut4_f38 + nut4_f39 + nut4_f40).toFixed(1),
    total5_opcion5 = (nut5_f31 + nut5_f32 + nut5_f33 + nut5_f34 + nut5_f35 + nut5_f36 + nut5_f37 + nut5_f38 + nut5_f39 + nut5_f40).toFixed(1),
    total5_opcion6 = (nut6_f31 + nut6_f32 + nut6_f33 + nut6_f34 + nut6_f35 + nut6_f36 + nut6_f37 + nut6_f38 + nut6_f39 + nut6_f40).toFixed(1);

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

        if(opcion5 === "pb" || opcion5 === "pn" || opcion5 === "ig" || opcion5 === "cg"){
            document.getElementById("total1_opcion5").value = "";
            document.getElementById("total2_opcion5").value = "";
            document.getElementById("total3_opcion5").value = "";
            document.getElementById("total4_opcion5").value = "";
            document.getElementById("total5_opcion5").value = "";
            document.getElementById("total6_opcion5").value = "";
        }else{
            document.getElementById("total1_opcion5").value = total1_opcion5;
            document.getElementById("total2_opcion5").value = total2_opcion5;
            document.getElementById("total3_opcion5").value = total3_opcion5;
            document.getElementById("total4_opcion5").value = total4_opcion5;
            document.getElementById("total5_opcion5").value = total5_opcion5;
            document.getElementById("total6_opcion5").value = (nut5_f1 + nut5_f2 + nut5_f3 + nut5_f4 + nut5_f5 + nut5_f6 + nut5_f7 + nut5_f8 + nut5_f9 + nut5_f10 +
            nut5_f11 + nut5_f12 + nut5_f13 + nut5_f14 + nut5_f15 + nut5_f16 + nut5_f17 + nut5_f18 + nut5_f19 + nut5_f20 + nut5_f21 + nut5_f22 + nut5_f23 + nut5_f24 + nut5_f25
            + nut5_f26 + nut5_f27 + nut5_f28 + nut5_f29 + nut5_f30 + nut5_f31 + nut5_f32 + nut5_f33 + nut5_f34 + nut5_f35 + nut5_f36 + nut5_f37 + nut5_f38 + nut5_f39 + nut5_f40).toFixed(1);
        }

        if(opcion6 === "pb" || opcion6 === "pn" || opcion6 === "ig" || opcion6 === "cg"){
            document.getElementById("total1_opcion6").value = "";
            document.getElementById("total2_opcion6").value = "";
            document.getElementById("total3_opcion6").value = "";
            document.getElementById("total4_opcion6").value = "";
            document.getElementById("total5_opcion6").value = "";
            document.getElementById("total6_opcion6").value = "";
        }else{
            document.getElementById("total1_opcion6").value = total1_opcion6;
            document.getElementById("total2_opcion6").value = total2_opcion6;
            document.getElementById("total3_opcion6").value = total3_opcion6;
            document.getElementById("total4_opcion6").value = total4_opcion6;
            document.getElementById("total5_opcion6").value = total5_opcion6;
            document.getElementById("total6_opcion6").value = (nut6_f1 + nut6_f2 + nut6_f3 + nut6_f4 + nut6_f5 + nut6_f6 + nut6_f7 + nut6_f8 + nut6_f9 + nut6_f10 +
            nut6_f11 + nut6_f12 + nut6_f13 + nut6_f14 + nut6_f15 + nut6_f16 + nut6_f17 + nut6_f18 + nut6_f19 + nut6_f20 + nut6_f21 + nut6_f22 + nut6_f23 + nut6_f24 + nut6_f25
            + nut6_f26 + nut6_f27 + nut6_f28 + nut6_f29 + nut6_f30 + nut6_f31 + nut6_f32 + nut6_f33 + nut6_f34 + nut6_f35 + nut6_f36 + nut6_f37 + nut6_f38 + nut6_f39 + nut6_f40).toFixed(1);
        }
        
}