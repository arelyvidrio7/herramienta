<?php
session_start(); 

include 'navbar.php';
//Obteniendo las listas de alimentos
include 'conex/tag.php';
include 'conex/tag2.php';

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <tittle></tittle>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" type="text/css" href="jquery-ui.css">
        <link rel="stylesheet" href="assets/general/estilo_rec24.css">
        <title>NutriPAES (Minuta)</title>

        <script src="https://kit.fontawesome.com/336ceace9e.js" crossorigin="anonymous"></script>
        <style type="text/css">
        input[type=button] {
                font-family: FontAwesome, 'Open Sans', sans-serif;
        }
        </style>
    </head>
    <body>

    <section class="elaborar_menu" id="elaborar_menu">
    <div id="lunes" onclick="sumartablas()" style="margin: 0 auto;">
    <br><br><br>
        <form style="text-align:center">
        <div class="btn-group">
            <input type="radio" class="btn-check" name="bdAlim" id="smae4" value="smae4" checked>
            <label class="btn btn-outline-primary" for="smae4">Smae 4ta Edición</label>

            <input type="radio" class="btn-check" name="bdAlim" id="smae5" value="smae5">
            <label class="btn btn-outline-primary" for="smae5">Smae 5ta Edición</label>
        </div>
        </form>
    <br>  
    
    <div style="text-align:center">
        <h1><input id="titulo" name="titulo" value="Recordatorio 24 hrs" onkeyup="titulo()"></h1>
        <p>Elige los nutrientes que deseas calcular...</p>
        <select id="opcion1" name="opcion1" style="width:150px;" onchange="rellenar()">
            <option value="" disabled>Selecciona el nutriente</option>
            <option value="vacio"></option>
            <option value="pb">Peso Bruto (g)</option>
            <option value="pn">Peso Neto (g)</option>
            <option value="h2o">Agua (ml)</option>
            <option value="kcal" selected>Energía (Kcal)</option>
            <option value="prot">Proteína (g)</option>
            <option value="lip">Lípidos (g)</option>
            <option value="carb">Carbohidratos (g)</option>
            <option value="fibra">Fibra (g)</option>
            <option value="vitA">Vitamina A (µg-RE)</option>
            <option value="a_asc">Ácido ascorbico (mg)</option>
            <option value="a_fol">Ácido Folico (µg)</option>
            <option value="fe">Hierro (mg)</option>
            <option value="k">Potasio (mg)</option>
            <option value="ig">Índice glucémico</option>
            <option value="cg">Carga glucémica</option>
            <option value="azucar">Azúcar (g)</option>
            <option value="ca">Calcio (mg)</option>
            <option value="na">Sodio (mg)</option>
            <option value="se">Selenio (µg)</option>
            <option value="p">Fosforo (mg)</option>
            <option value="col">Colesterol (mg)</option>
            <option value="ag_sat">ÁG saturados (g)</option>
            <option value="ag_mono">ÁG monoinsaturados (g)</option>
            <option value="ag_poli">ÁG poliinsaturados (g)</option>
            <option value="etoh">Etanol (g)</option>
        </select>
        
        <select id="opcion2" name="opcion2" style="width:150px;" onchange="rellenar()">
            <option value="" disabled>Selecciona el nutriente</option>
            <option value="vacio"></option>
            <option value="pb">Peso Bruto (g)</option>
            <option value="pn">Peso Neto (g)</option>
            <option value="h2o">Agua (ml)</option>
            <option value="kcal">Energía (Kcal)</option>
            <option value="prot" selected>Proteína (g)</option>
            <option value="lip">Lípidos (g)</option>
            <option value="carb">Carbohidratos (g)</option>
            <option value="fibra">Fibra (g)</option>
            <option value="vitA">Vitamina A (µg-RE)</option>
            <option value="a_asc">Ácido ascorbico (mg)</option>
            <option value="a_fol">Ácido Folico (µg)</option>
            <option value="fe">Hierro (mg)</option>
            <option value="k">Potasio (mg)</option>
            <option value="ig">Índice glucémico</option>
            <option value="cg">Carga glucémica</option>
            <option value="azucar">Azúcar (g)</option>
            <option value="ca">Calcio (mg)</option>
            <option value="na">Sodio (mg)</option>
            <option value="se">Selenio (µg)</option>
            <option value="p">Fosforo (mg)</option>
            <option value="col">Colesterol (mg)</option>
            <option value="ag_sat">ÁG saturados (g)</option>
            <option value="ag_mono">ÁG monoinsaturados (g)</option>
            <option value="ag_poli">ÁG poliinsaturados (g)</option>
            <option value="etoh">Etanol (g)</option>
        </select>

        <select id="opcion3" name="opcion3" style="width:150px;" onchange="rellenar()">
            <option value="" disabled>Selecciona el nutriente</option>
            <option value="vacio"></option>
            <option value="pb">Peso Bruto (g)</option>
            <option value="pn">Peso Neto (g)</option>
            <option value="h2o">Agua (ml)</option>
            <option value="kcal">Energía (Kcal)</option>
            <option value="prot">Proteína (g)</option>
            <option value="lip" selected>Lípidos (g)</option>
            <option value="carb">Carbohidratos (g)</option>
            <option value="fibra">Fibra (g)</option>
            <option value="vitA">Vitamina A (µg-RE)</option>
            <option value="a_asc">Ácido ascorbico (mg)</option>
            <option value="a_fol">Ácido Folico (µg)</option>
            <option value="fe">Hierro (mg)</option>
            <option value="k">Potasio (mg)</option>
            <option value="ig">Índice glucémico</option>
            <option value="cg">Carga glucémica</option>
            <option value="azucar">Azúcar (g)</option>
            <option value="ca">Calcio (mg)</option>
            <option value="na">Sodio (mg)</option>
            <option value="se">Selenio (µg)</option>
            <option value="p">Fosforo (mg)</option>
            <option value="col">Colesterol (mg)</option>
            <option value="ag_sat">ÁG saturados (g)</option>
            <option value="ag_mono">ÁG monoinsaturados (g)</option>
            <option value="ag_poli">ÁG poliinsaturados (g)</option>
            <option value="etoh">Etanol (g)</option>
        </select>
        <select id="opcion4" name="opcion4" style="width:150px;" onchange="rellenar()">
            <option value="" disabled>Selecciona el nutriente</option>
            <option value="vacio"></option>
            <option value="pb">Peso Bruto (g)</option>
            <option value="pn">Peso Neto (g)</option>
            <option value="h2o">Agua (ml)</option>
            <option value="kcal">Energía (Kcal)</option>
            <option value="prot">Proteína (g)</option>
            <option value="lip">Lípidos (g)</option>
            <option value="carb" selected>Carbohidratos (g)</option>
            <option value="fibra">Fibra (g)</option>
            <option value="vitA">Vitamina A (µg-RE)</option>
            <option value="a_asc">Ácido ascorbico (mg)</option>
            <option value="a_fol">Ácido Folico (µg)</option>
            <option value="fe">Hierro (mg)</option>
            <option value="k">Potasio (mg)</option>
            <option value="ig">Índice glucémico</option>
            <option value="cg">Carga glucémica</option>
            <option value="azucar">Azúcar (g)</option>
            <option value="ca">Calcio (mg)</option>
            <option value="na">Sodio (mg)</option>
            <option value="se">Selenio (µg)</option>
            <option value="p">Fosforo (mg)</option>
            <option value="col">Colesterol (mg)</option>
            <option value="ag_sat">ÁG saturados (g)</option>
            <option value="ag_mono">ÁG monoinsaturados (g)</option>
            <option value="ag_poli">ÁG poliinsaturados (g)</option>
            <option value="etoh">Etanol (g)</option>
        </select>
    </div>
        
        <button id="eliminar_datos" name="eliminar_datos" class="eliminar_datos" onclick="eliminar_d()">Borrar datos</button>
        <form action="convertirPDF.php" method="POST" onkeypress="return anular(event)">
        <!-- Obtener el texto de los select con javascript -->
        <input type="hidden" id="opc1" name="opc1" value="Energía (Kcal)">
        <input type="hidden" id="opc2" name="opc2" value="Proteína (g)">
        <input type="hidden" id="opc3" name="opc3" value="Lípidos (g)">
        <input type="hidden" id="opc4" name="opc4" value="Carbohidratos (g)">
        <input type="hidden" id="titulo2" name="titulo2" value="Recordatorio 24 hrs">

        <div id="eliminar_desayuno" name="eliminar_desayuno" class="eliminar_comidas">
        <input type="button" class="btn-xs btn-danger" onclick="eliminar_desayuno()" value="&#xf2ed;">
        <h2> Desayuno</h2>
        </div>
        <table class="nombre_com" id="nombre_desayuno">
        <thead>
        <tr>
        <th></th>
        <th></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td>Nombre del platillo: </td>
        <td><input id="n_desayuno" name="n_desayuno" placeholder="Escribe un nombre para el desayuno" style="width:300px"></td>
        </tr>
        </tbody>
        </table>
        <table class="tabla1" id="tabla1">
            <thead>
                <tr>
                    <th>Alimento</th>
                    <th>Cant.</th>
                    <th>Unidad</th>
                    <th>Grupo</th>
                    <th>Porción</th>
                    <th class="seleccion1" style="width:60px">Energía (Kcal)</th>
                    <th class="seleccion2" style="width:60px">Proteína (g)</th>
                    <th class="seleccion3" style="width:60px">Lípidos (g)</th>
                    <th class="seleccion4" style="width:60px">Carbohidratos (g)</th>
                    <th></th>
                </tr>
            <thead>

            <tbody>
                <tr>
                    <td><input id="tag1" name="tag1" placeholder="Elige un alimento" class="tag" onkeyup="calcular1()"></td>
                    <td><input id="cantidad1" name="cantidad1" placeholder="Cant." class="cant" onkeyup="calc1()"></td>
                    <td><input id="unidad1" name="unidad1" class="unidad"></td>
                    <td><input id="grupo1" name="grupo1" class="grupo"></td>
                    <td><input id="porcion1" name="porcion1" class="porcion"></td>
                    <td><input id="nut1_f1" name="nut1_f1" class="nut1"></td>
                    <td><input id="nut2_f1" name="nut2_f1" class="nut2"></td>
                    <td><input id="nut3_f1" name="nut3_f1" class="nut3"></td>
                    <td><input id="nut4_f1" name="nut4_f1" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag2" name="tag2" placeholder="Elige un alimento" class="tag" onkeyup="calcular2()"></td>
                    <td><input id="cantidad2" name="cantidad2" placeholder="Cant." class="cant" onkeyup="calc2()"></td>
                    <td><input id="unidad2" name="unidad2" class="unidad"></td>
                    <td><input id="grupo2" name="grupo2" class="grupo"></td>
                    <td><input id="porcion2" name="porcion2" class="porcion"></td>
                    <td><input id="nut1_f2" name="nut1_f2" class="nut1"></td>
                    <td><input id="nut2_f2" name="nut2_f2" class="nut2"></td>
                    <td><input id="nut3_f2" name="nut3_f2" class="nut3"></td>
                    <td><input id="nut4_f2" name="nut4_f2" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag3" name="tag3" placeholder="Elige un alimento" class="tag" onkeyup="calcular3()"></td>
                    <td><input id="cantidad3" name="cantidad3" placeholder="Cant." class="cant" onkeyup="calc3()"></td>
                    <td><input id="unidad3" name="unidad3" class="unidad"></td>
                    <td><input id="grupo3" name="grupo3" class="grupo"></td>
                    <td><input id="porcion3" name="porcion3" class="porcion"></td>
                    <td><input id="nut1_f3" name="nut1_f3" class="nut1"></td>
                    <td><input id="nut2_f3" name="nut2_f3" class="nut2"></td>
                    <td><input id="nut3_f3" name="nut3_f3" class="nut3"></td>
                    <td><input id="nut4_f3" name="nut4_f3" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag4" name="tag4" placeholder="Elige un alimento" class="tag" onkeyup="calcular4()"></td>
                    <td><input id="cantidad4" name="cantidad4" placeholder="Cant." class="cant" onkeyup="calc4()"></td>
                    <td><input id="unidad4" name="unidad4" class="unidad"></td>
                    <td><input id="grupo4" name="grupo4" class="grupo"></td>
                    <td><input id="porcion4" name="porcion4" class="porcion"></td>
                    <td><input id="nut1_f4" name="nut1_f4" class="nut1"></td>
                    <td><input id="nut2_f4" name="nut2_f4" class="nut2"></td>
                    <td><input id="nut3_f4" name="nut3_f4" class="nut3"></td>
                    <td><input id="nut4_f4" name="nut4_f4" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag5" name="tag5" placeholder="Elige un alimento" class="tag" onkeyup="calcular5()"></td>
                    <td><input id="cantidad5" name="cantidad5" placeholder="Cant." class="cant" onkeyup="calc5()"></td>
                    <td><input id="unidad5" name="unidad5" class="unidad"></td>
                    <td><input id="grupo5" name="grupo5" class="grupo"></td>
                    <td><input id="porcion5" name="porcion5" class="porcion"></td>
                    <td><input id="nut1_f5" name="nut1_f5" class="nut1"></td>
                    <td><input id="nut2_f5" name="nut2_f5" class="nut2"></td>
                    <td><input id="nut3_f5" name="nut3_f5" class="nut3"></td>
                    <td><input id="nut4_f5" name="nut4_f5" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag6" name="tag6" placeholder="Elige un alimento" class="tag" onkeyup="calcular6()"></td>
                    <td><input id="cantidad6" name="cantidad6" placeholder="Cant." class="cant" onkeyup="calc6()"></td>
                    <td><input id="unidad6" name="unidad6" class="unidad"></td>
                    <td><input id="grupo6" name="grupo6" class="grupo"></td>
                    <td><input id="porcion6" name="porcion6" class="porcion"></td>
                    <td><input id="nut1_f6" name="nut1_f6" class="nut1"></td>
                    <td><input id="nut2_f6" name="nut2_f6" class="nut2"></td>
                    <td><input id="nut3_f6" name="nut3_f6" class="nut3"></td>
                    <td><input id="nut4_f6" name="nut4_f6" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag7" name="tag7" placeholder="Elige un alimento" class="tag" onkeyup="calcular7()"></td>
                    <td><input id="cantidad7" name="cantidad7" placeholder="Cant." class="cant" onkeyup="calc7()"></td>
                    <td><input id="unidad7" name="unidad7" class="unidad"></td>
                    <td><input id="grupo7" name="grupo7" class="grupo"></td>
                    <td><input id="porcion7" name="porcion7" class="porcion"></td>
                    <td><input id="nut1_f7" name="nut1_f7" class="nut1"></td>
                    <td><input id="nut2_f7" name="nut2_f7" class="nut2"></td>
                    <td><input id="nut3_f7" name="nut3_f7" class="nut3"></td>
                    <td><input id="nut4_f7" name="nut4_f7" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag8" name="tag8" placeholder="Elige un alimento" class="tag" onkeyup="calcular8()"></td>
                    <td><input id="cantidad8" name="cantidad8" placeholder="Cant." class="cant" onkeyup="calc8()"></td>
                    <td><input id="unidad8" name="unidad8" class="unidad"></td>
                    <td><input id="grupo8" name="grupo8" class="grupo"></td>
                    <td><input id="porcion8" name="porcion8" class="porcion"></td>
                    <td><input id="nut1_f8" name="nut1_f8" class="nut1"></td>
                    <td><input id="nut2_f8" name="nut2_f8" class="nut2"></td>
                    <td><input id="nut3_f8" name="nut3_f8" class="nut3"></td>
                    <td><input id="nut4_f8" name="nut4_f8" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag9" name="tag9" placeholder="Elige un alimento" class="tag" onkeyup="calcular9()"></td>
                    <td><input id="cantidad9" name="cantidad9" placeholder="Cant." class="cant" onkeyup="calc9()"></td>
                    <td><input id="unidad9" name="unidad9" class="unidad"></td>
                    <td><input id="grupo9" name="grupo9" class="grupo"></td>
                    <td><input id="porcion9" name="porcion9" class="porcion"></td>
                    <td><input id="nut1_f9" name="nut1_f9" class="nut1"></td>
                    <td><input id="nut2_f9" name="nut2_f9" class="nut2"></td>
                    <td><input id="nut3_f9" name="nut3_f9" class="nut3"></td>
                    <td><input id="nut4_f9" name="nut4_f9" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag10" name="tag10" placeholder="Elige un alimento" class="tag" onkeyup="calcular10()"></td>
                    <td><input id="cantidad10" name="cantidad10" placeholder="Cant." class="cant" onkeyup="calc10()"></td>
                    <td><input id="unidad10" name="unidad10" class="unidad"></td>
                    <td><input id="grupo10" name="grupo10" class="grupo"></td>
                    <td><input id="porcion10" name="porcion10" class="porcion"></td>
                    <td><input id="nut1_f10" name="nut1_f10" class="nut1"></td>
                    <td><input id="nut2_f10" name="nut2_f10" class="nut2"></td>
                    <td><input id="nut3_f10" name="nut3_f10" class="nut3"></td>
                    <td><input id="nut4_f10" name="nut4_f10" class="nut4"></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total =</td>
                    <td><input id="total1_opcion1" name="total1_opcion1" class="total"></td>
                    <td><input id="total1_opcion2" name="total1_opcion2" class="total"></td>
                    <td><input id="total1_opcion3" name="total1_opcion3" class="total"></td>
                    <td><input id="total1_opcion4" name="total1_opcion4" class="total"></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <br>
        
        <div id="eliminar_c1" name="eliminar_c1" class="eliminar_comidas">
        <input type="button" class="btn-xs btn-danger" onclick="eliminar_c1()" value="&#xf2ed;">
        <h2> Almuerzo</h2>
        </div>
        <table class="nombre_com" id="nombre_colacion1">
        <thead>
        <tr>
        <th></th>
        <th></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td>Nombre del platillo: </td>
        <td><input id="n_colacion1" name="n_colacion1" placeholder="Escribe un nombre para la colación" style="width:300px"></td>
        </tr>
        </tbody>
        </table>
        <table class="tabla1">
            <thead>
                <tr>
                    <th>Alimento</th>
                    <th>Cant.</th>
                    <th>Unidad</th>
                    <th>Grupo</th>
                    <th>Porción</th>
                    <th class="seleccion1" style="width:60px">Energía (Kcal)</th>
                    <th class="seleccion2" style="width:60px">Proteína (g)</th>
                    <th class="seleccion3" style="width:60px">Lípidos (g)</th>
                    <th class="seleccion4" style="width:60px">Carbohidratos (g)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input id="tag11" name="tag11" placeholder="Elige un alimento" class="tag" onkeyup="calcular11()"></td>
                    <td><input id="cantidad11" name="cantidad11" placeholder="Cant." class="cant" onkeyup="calc11()"></td>
                    <td><input id="unidad11" name="unidad11" class="unidad"></td>
                    <td><input id="grupo11" name="grupo11" class="grupo"></td>
                    <td><input id="porcion11" name="porcion11" class="porcion"></td>
                    <td><input id="nut1_f11" name="nut1_f11" class="nut1"></td>
                    <td><input id="nut2_f11" name="nut2_f11" class="nut2"></td>
                    <td><input id="nut3_f11" name="nut3_f11" class="nut3"></td>
                    <td><input id="nut4_f11" name="nut4_f11" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag12" name="tag12" placeholder="Elige un alimento" class="tag" onkeyup="calcular12()"></td>
                    <td><input id="cantidad12" name="cantidad12" placeholder="Cant." class="cant" onkeyup="calc12()"></td>
                    <td><input id="unidad12" name="unidad12" class="unidad"></td>
                    <td><input id="grupo12" name="grupo12" class="grupo"></td>
                    <td><input id="porcion12" name="porcion12" class="porcion"></td>
                    <td><input id="nut1_f12" name="nut1_f12" class="nut1"></td>
                    <td><input id="nut2_f12" name="nut2_f12" class="nut2"></td>
                    <td><input id="nut3_f12" name="nut3_f12" class="nut3"></td>
                    <td><input id="nut4_f12" name="nut4_f12" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag13" name="tag13" placeholder="Elige un alimento" class="tag" onkeyup="calcular13()"></td>
                    <td><input id="cantidad13" name="cantidad13" placeholder="Cant." class="cant" onkeyup="calc13()"></td>
                    <td><input id="unidad13" name="unidad13" class="unidad"></td>
                    <td><input id="grupo13" name="grupo13" class="grupo"></td>
                    <td><input id="porcion13" name="porcion13" class="porcion"></td>
                    <td><input id="nut1_f13" name="nut1_f13" class="nut1"></td>
                    <td><input id="nut2_f13" name="nut2_f13" class="nut2"></td>
                    <td><input id="nut3_f13" name="nut3_f13" class="nut3"></td>
                    <td><input id="nut4_f13" name="nut4_f13" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag14" name="tag14" placeholder="Elige un alimento" class="tag" onkeyup="calcular14()"></td>
                    <td><input id="cantidad14" name="cantidad14" placeholder="Cant." class="cant" onkeyup="calc14()"></td>
                    <td><input id="unidad14" name="unidad14" class="unidad"></td>
                    <td><input id="grupo14" name="grupo14" class="grupo"></td>
                    <td><input id="porcion14" name="porcion14" class="porcion"></td>
                    <td><input id="nut1_f14" name="nut1_f14" class="nut1"></td>
                    <td><input id="nut2_f14" name="nut2_f14" class="nut2"></td>
                    <td><input id="nut3_f14" name="nut3_f14" class="nut3"></td>
                    <td><input id="nut4_f14" name="nut4_f14" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag15" name="tag15" placeholder="Elige un alimento" class="tag" onkeyup="calcular15()"></td>
                    <td><input id="cantidad15" name="cantidad15" placeholder="Cant." class="cant" onkeyup="calc15()"></td>
                    <td><input id="unidad15" name="unidad15" class="unidad"></td>
                    <td><input id="grupo15" name="grupo15" class="grupo"></td>
                    <td><input id="porcion15" name="porcion15" class="porcion"></td>
                    <td><input id="nut1_f15" name="nut1_f15" class="nut1"></td>
                    <td><input id="nut2_f15" name="nut2_f15" class="nut2"></td>
                    <td><input id="nut3_f15" name="nut3_f15" class="nut3"></td>
                    <td><input id="nut4_f15" name="nut4_f15" class="nut4"></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total =</td>
                    <td><input id="total2_opcion1" name="total2_opcion1" class="total"></td>
                    <td><input id="total2_opcion2" name="total2_opcion2" class="total"></td>
                    <td><input id="total2_opcion3" name="total2_opcion3" class="total"></td>
                    <td><input id="total2_opcion4" name="total2_opcion4" class="total"></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <br>

        <div id="eliminar_comida" name="eliminar_comida" class="eliminar_comidas">
        <input type="button" class="btn-xs btn-danger" onclick="eliminar_comida()" value="&#xf2ed;">
        <h2> Comida</h2>
        </div>
        <table class="nombre_com" id="nombre_comida">
        <thead>
        <tr>
        <th></th>
        <th></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td>Nombre del platillo: </td>
        <td><input id="n_comida" name="n_comida" placeholder="Escribe un nombre para la comida" style="width:300px"></td>
        </tr>
        </tbody>
        </table>
        <table class="tabla1">
        <thead>
                <tr>
                    <th>Alimento</th>
                    <th>Cant.</th>
                    <th>Unidad</th>
                    <th>Grupo</th>
                    <th>Porción</th>
                    <th class="seleccion1" style="width:60px">Energía (Kcal)</th>
                    <th class="seleccion2" style="width:60px">Proteína (g)</th>
                    <th class="seleccion3" style="width:60px">Lípidos (g)</th>
                    <th class="seleccion4" style="width:60px">Carbohidratos (g)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input id="tag16" name="tag16" placeholder="Elige un alimento" class="tag" onkeyup="calcular16()"></td>
                    <td><input id="cantidad16" name="cantidad16" placeholder="Cant." class="cant" onkeyup="calc16()"></td>
                    <td><input id="unidad16" name="unidad16" class="unidad"></td>
                    <td><input id="grupo16" name="grupo16" class="grupo"></td>
                    <td><input id="porcion16" name="porcion16" class="porcion"></td>
                    <td><input id="nut1_f16" name="nut1_f16" class="nut1"></td>
                    <td><input id="nut2_f16" name="nut2_f16" class="nut2"></td>
                    <td><input id="nut3_f16" name="nut3_f16" class="nut3"></td>
                    <td><input id="nut4_f16" name="nut4_f16" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag17" name="tag17" placeholder="Elige un alimento" class="tag" onkeyup="calcular17()"></td>
                    <td><input id="cantidad17" name="cantidad17" placeholder="Cant." class="cant" onkeyup="calc17()"></td>
                    <td><input id="unidad17" name="unidad17" class="unidad"></td>
                    <td><input id="grupo17" name="grupo17" class="grupo"></td>
                    <td><input id="porcion17" name="porcion17" class="porcion"></td>
                    <td><input id="nut1_f17" name="nut1_f17" class="nut1"></td>
                    <td><input id="nut2_f17" name="nut2_f17" class="nut2"></td>
                    <td><input id="nut3_f17" name="nut3_f17" class="nut3"></td>
                    <td><input id="nut4_f17" name="nut4_f17" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag18" name="tag18" placeholder="Elige un alimento" class="tag" onkeyup="calcular18()"></td>
                    <td><input id="cantidad18" name="cantidad18" placeholder="Cant." class="cant" onkeyup="calc18()"></td>
                    <td><input id="unidad18" name="unidad18" class="unidad"></td>
                    <td><input id="grupo18" name="grupo18" class="grupo"></td>
                    <td><input id="porcion18" name="porcion18" class="porcion"></td>
                    <td><input id="nut1_f18" name="nut1_f18" class="nut1"></td>
                    <td><input id="nut2_f18" name="nut2_f18" class="nut2"></td>
                    <td><input id="nut3_f18" name="nut3_f18" class="nut3"></td>
                    <td><input id="nut4_f18" name="nut4_f18" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag19" name="tag19" placeholder="Elige un alimento" class="tag" onkeyup="calcular19()"></td>
                    <td><input id="cantidad19" name="cantidad19" placeholder="Cant." class="cant" onkeyup="calc19()"></td>
                    <td><input id="unidad19" name="unidad19" class="unidad"></td>
                    <td><input id="grupo19" name="grupo19" class="grupo"></td>
                    <td><input id="porcion19" name="porcion19" class="porcion"></td>
                    <td><input id="nut1_f19" name="nut1_f19" class="nut1"></td>
                    <td><input id="nut2_f19" name="nut2_f19" class="nut2"></td>
                    <td><input id="nut3_f19" name="nut3_f19" class="nut3"></td>
                    <td><input id="nut4_f19" name="nut4_f19" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag20" name="tag20" placeholder="Elige un alimento" class="tag" onkeyup="calcular20()"></td>
                    <td><input id="cantidad20" name="cantidad20" placeholder="Cant." class="cant" onkeyup="calc20()"></td>
                    <td><input id="unidad20" name="unidad20" class="unidad"></td>
                    <td><input id="grupo20" name="grupo20" class="grupo"></td>
                    <td><input id="porcion20" name="porcion20" class="porcion"></td>
                    <td><input id="nut1_f20" name="nut1_f20" class="nut1"></td>
                    <td><input id="nut2_f20" name="nut2_f20" class="nut2"></td>
                    <td><input id="nut3_f20" name="nut3_f20" class="nut3"></td>
                    <td><input id="nut4_f20" name="nut4_f20" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag21" name="tag21" placeholder="Elige un alimento" class="tag" onkeyup="calcular21()"></td>
                    <td><input id="cantidad21" name="cantidad21" placeholder="Cant." class="cant" onkeyup="calc21()"></td>
                    <td><input id="unidad21" name="unidad21" class="unidad"></td>
                    <td><input id="grupo21" name="grupo21" class="grupo"></td>
                    <td><input id="porcion21" name="porcion21" class="porcion"></td>
                    <td><input id="nut1_f21" name="nut1_f21" class="nut1"></td>
                    <td><input id="nut2_f21" name="nut2_f21" class="nut2"></td>
                    <td><input id="nut3_f21" name="nut3_f21" class="nut3"></td>
                    <td><input id="nut4_f21" name="nut4_f21" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag22" name="tag22" placeholder="Elige un alimento" class="tag" onkeyup="calcular22()"></td>
                    <td><input id="cantidad22" name="cantidad22" placeholder="Cant." class="cant" onkeyup="calc22()"></td>
                    <td><input id="unidad22" name="unidad22" class="unidad"></td>
                    <td><input id="grupo22" name="grupo22" class="grupo"></td>
                    <td><input id="porcion22" name="porcion22" class="porcion"></td>
                    <td><input id="nut1_f22" name="nut1_f22" class="nut1"></td>
                    <td><input id="nut2_f22" name="nut2_f22" class="nut2"></td>
                    <td><input id="nut3_f22" name="nut3_f22" class="nut3"></td>
                    <td><input id="nut4_f22" name="nut4_f22" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag23" name="tag23" placeholder="Elige un alimento" class="tag" onkeyup="calcular23()"></td>
                    <td><input id="cantidad23" name="cantidad23" placeholder="Cant." class="cant" onkeyup="calc23()"></td>
                    <td><input id="unidad23" name="unidad23" class="unidad"></td>
                    <td><input id="grupo23" name="grupo23" class="grupo"></td>
                    <td><input id="porcion23" name="porcion23" class="porcion"></td>
                    <td><input id="nut1_f23" name="nut1_f23" class="nut1"></td>
                    <td><input id="nut2_f23" name="nut2_f23" class="nut2"></td>
                    <td><input id="nut3_f23" name="nut3_f23" class="nut3"></td>
                    <td><input id="nut4_f23" name="nut4_f23" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag24" name="tag24" placeholder="Elige un alimento" class="tag" onkeyup="calcular24()"></td>
                    <td><input id="cantidad24" name="cantidad24" placeholder="Cant." class="cant" onkeyup="calc24()"></td>
                    <td><input id="unidad24" name="unidad24" class="unidad"></td>
                    <td><input id="grupo24" name="grupo24" class="grupo"></td>
                    <td><input id="porcion24" name="porcion24" class="porcion"></td>
                    <td><input id="nut1_f24" name="nut1_f24" class="nut1"></td>
                    <td><input id="nut2_f24" name="nut2_f24" class="nut2"></td>
                    <td><input id="nut3_f24" name="nut3_f24" class="nut3"></td>
                    <td><input id="nut4_f24" name="nut4_f24" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag25" name="tag25" placeholder="Elige un alimento" class="tag" onkeyup="calcular25()"></td>
                    <td><input id="cantidad25" name="cantidad25" placeholder="Cant." class="cant" onkeyup="calc25()"></td>
                    <td><input id="unidad25" name="unidad25" class="unidad"></td>
                    <td><input id="grupo25" name="grupo25" class="grupo"></td>
                    <td><input id="porcion25" name="porcion25" class="porcion"></td>
                    <td><input id="nut1_f25" name="nut1_f25" class="nut1"></td>
                    <td><input id="nut2_f25" name="nut2_f25" class="nut2"></td>
                    <td><input id="nut3_f25" name="nut3_f25" class="nut3"></td>
                    <td><input id="nut4_f25" name="nut4_f25" class="nut4"></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total =</td>
                    <td><input id="total3_opcion1" name="total3_opcion1" class="total"></td>
                    <td><input id="total3_opcion2" name="total3_opcion2" class="total"></td>
                    <td><input id="total3_opcion3" name="total3_opcion3" class="total"></td>
                    <td><input id="total3_opcion4" name="total3_opcion4" class="total"></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <br>

        <div id="eliminar_c2" name="eliminar_c2" class="eliminar_comidas">
        <input type="button" class="btn-xs btn-danger" onclick="eliminar_c2()" value="&#xf2ed;">
        <h2> Merienda</h2>
        </div>
        <table class="nombre_com" id="nombre_colacion2">
        <thead>
        <tr>
        <th></th>
        <th></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td>Nombre del platillo: </td>
        <td><input id="n_colacion2" name="n_colacion2" placeholder="Escribe un nombre para la colación" style="width:300px"></td>
        </tr>
        </tbody>
        </table>
        <table class="tabla1">
        <thead>
                <tr>
                    <th>Alimento</th>
                    <th>Cant.</th>
                    <th>Unidad</th>
                    <th>Grupo</th>
                    <th>Porción</th>
                    <th class="seleccion1" style="width:60px">Energía (Kcal)</th>
                    <th class="seleccion2" style="width:60px">Proteína (g)</th>
                    <th class="seleccion3" style="width:60px">Lípidos (g)</th>
                    <th class="seleccion4" style="width:60px">Carbohidratos (g)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input id="tag26" name="tag26" placeholder="Elige un alimento" class="tag" onkeyup="calcular26()"></td>
                    <td><input id="cantidad26" name="cantidad26" placeholder="Cant." class="cant" onkeyup="calc26()"></td>
                    <td><input id="unidad26" name="unidad26" class="unidad"></td>
                    <td><input id="grupo26" name="grupo26" class="grupo"></td>
                    <td><input id="porcion26" name="porcion26" class="porcion"></td>
                    <td><input id="nut1_f26" name="nut1_f26" class="nut1"></td>
                    <td><input id="nut2_f26" name="nut2_f26" class="nut2"></td>
                    <td><input id="nut3_f26" name="nut3_f26" class="nut3"></td>
                    <td><input id="nut4_f26" name="nut4_f26" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag27" name="tag27" placeholder="Elige un alimento" class="tag" onkeyup="calcular27()"></td>
                    <td><input id="cantidad27" name="cantidad27" placeholder="Cant." class="cant" onkeyup="calc27()"></td>
                    <td><input id="unidad27" name="unidad27" class="unidad"></td>
                    <td><input id="grupo27" name="grupo27" class="grupo"></td>
                    <td><input id="porcion27" name="porcion27" class="porcion"></td>
                    <td><input id="nut1_f27" name="nut1_f27" class="nut1"></td>
                    <td><input id="nut2_f27" name="nut2_f27" class="nut2"></td>
                    <td><input id="nut3_f27" name="nut3_f27" class="nut3"></td>
                    <td><input id="nut4_f27" name="nut4_f27" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag28" name="tag28" placeholder="Elige un alimento" class="tag" onkeyup="calcular28()"></td>
                    <td><input id="cantidad28" name="cantidad28" placeholder="Cant." class="cant" onkeyup="calc28()"></td>
                    <td><input id="unidad28" name="unidad28" class="unidad"></td>
                    <td><input id="grupo28" name="grupo28" class="grupo"></td>
                    <td><input id="porcion28" name="porcion28" class="porcion"></td>
                    <td><input id="nut1_f28" name="nut1_f28" class="nut1"></td>
                    <td><input id="nut2_f28" name="nut2_f28" class="nut2"></td>
                    <td><input id="nut3_f28" name="nut3_f28" class="nut3"></td>
                    <td><input id="nut4_f28" name="nut4_f28" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag29" name="tag29" placeholder="Elige un alimento" class="tag" onkeyup="calcular29()"></td>
                    <td><input id="cantidad29" name="cantidad29" placeholder="Cant." class="cant" onkeyup="calc29()"></td>
                    <td><input id="unidad29" name="unidad29" class="unidad"></td>
                    <td><input id="grupo29" name="grupo29" class="grupo"></td>
                    <td><input id="porcion29" name="porcion29" class="porcion"></td>
                    <td><input id="nut1_f29" name="nut1_f29" class="nut1"></td>
                    <td><input id="nut2_f29" name="nut2_f29" class="nut2"></td>
                    <td><input id="nut3_f29" name="nut3_f29" class="nut3"></td>
                    <td><input id="nut4_f29" name="nut4_f29" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag30" name="tag30" placeholder="Elige un alimento" class="tag" onkeyup="calcular30()"></td>
                    <td><input id="cantidad30" name="cantidad30" placeholder="Cant." class="cant" onkeyup="calc30()"></td>
                    <td><input id="unidad30" name="unidad30" class="unidad"></td>
                    <td><input id="grupo30" name="grupo30" class="grupo"></td>
                    <td><input id="porcion30" name="porcion30" class="porcion"></td>
                    <td><input id="nut1_f30" name="nut1_f30" class="nut1"></td>
                    <td><input id="nut2_f30" name="nut2_f30" class="nut2"></td>
                    <td><input id="nut3_f30" name="nut3_f30" class="nut3"></td>
                    <td><input id="nut4_f30" name="nut4_f30" class="nut4"></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total =</td>
                    <td><input id="total4_opcion1" name="total4_opcion1" class="total"></td>
                    <td><input id="total4_opcion2" name="total4_opcion2" class="total"></td>
                    <td><input id="total4_opcion3" name="total4_opcion3" class="total"></td>
                    <td><input id="total4_opcion4" name="total4_opcion4" class="total"></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <br>

        <div id="eliminar_cena" name="eliminar_cena" class="eliminar_comidas">
        <input type="button" class="btn-xs btn-danger" onclick="eliminar_cena()" value="&#xf2ed;">
        <h2> Cena</h2>
        </div>
        <table class="nombre_com" id="nombre_cena">
        <thead>
        <tr>
        <th></th>
        <th></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td>Nombre del platillo: </td>
        <td><input id="n_cena" name="n_cena" placeholder="Escribe un nombre para la cena" style="width:300px"></td>
        </tr>
        </tbody>
        </table>
        <table class="tabla1">
        <thead>
                <tr>
                    <th>Alimento</th>
                    <th>Cant.</th>
                    <th>Unidad</th>
                    <th>Grupo</th>
                    <th>Porción</th>
                    <th class="seleccion1" style="width:60px">Energía (Kcal)</th>
                    <th class="seleccion2" style="width:60px">Proteína (g)</th>
                    <th class="seleccion3" style="width:60px">Lípidos (g)</th>
                    <th class="seleccion4" style="width:60px">Carbohidratos (g)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input id="tag31" name="tag31" placeholder="Elige un alimento" class="tag" onkeyup="calcular31()"></td>
                    <td><input id="cantidad31" name="cantidad31" placeholder="Cant." class="cant" onkeyup="calc31()"></td>
                    <td><input id="unidad31" name="unidad31" class="unidad"></td>
                    <td><input id="grupo31" name="grupo31" class="grupo"></td>
                    <td><input id="porcion31" name="porcion31" class="porcion"></td>
                    <td><input id="nut1_f31" name="nut1_f31" class="nut1"></td>
                    <td><input id="nut2_f31" name="nut2_f31" class="nut2"></td>
                    <td><input id="nut3_f31" name="nut3_f31" class="nut3"></td>
                    <td><input id="nut4_f31" name="nut4_f31" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag32" name="tag32" placeholder="Elige un alimento" class="tag" onkeyup="calcular32()"></td>
                    <td><input id="cantidad32" name="cantidad32" placeholder="Cant." class="cant" onkeyup="calc32()"></td>
                    <td><input id="unidad32" name="unidad32" class="unidad"></td>
                    <td><input id="grupo32" name="grupo32" class="grupo"></td>
                    <td><input id="porcion32" name="porcion32" class="porcion"></td>
                    <td><input id="nut1_f32" name="nut1_f32" class="nut1"></td>
                    <td><input id="nut2_f32" name="nut2_f32" class="nut2"></td>
                    <td><input id="nut3_f32" name="nut3_f32" class="nut3"></td>
                    <td><input id="nut4_f32" name="nut4_f32" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag33" name="tag33" placeholder="Elige un alimento" class="tag" onkeyup="calcular33()"></td>
                    <td><input id="cantidad33" name="cantidad33" placeholder="Cant." class="cant" onkeyup="calc33()"></td>
                    <td><input id="unidad33" name="unidad33" class="unidad"></td>
                    <td><input id="grupo33" name="grupo33" class="grupo"></td>
                    <td><input id="porcion33" name="porcion33" class="porcion"></td>
                    <td><input id="nut1_f33" name="nut1_f33" class="nut1"></td>
                    <td><input id="nut2_f33" name="nut2_f33" class="nut2"></td>
                    <td><input id="nut3_f33" name="nut3_f33" class="nut3"></td>
                    <td><input id="nut4_f33" name="nut4_f33" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag34" name="tag34" placeholder="Elige un alimento" class="tag" onkeyup="calcular34()"></td>
                    <td><input id="cantidad34" name="cantidad34" placeholder="Cant." class="cant" onkeyup="calc34()"></td>
                    <td><input id="unidad34" name="unidad34" class="unidad"></td>
                    <td><input id="grupo34" name="grupo34" class="grupo"></td>
                    <td><input id="porcion34" name="porcion34" class="porcion"></td>
                    <td><input id="nut1_f34" name="nut1_f34" class="nut1"></td>
                    <td><input id="nut2_f34" name="nut2_f34" class="nut2"></td>
                    <td><input id="nut3_f34" name="nut3_f34" class="nut3"></td>
                    <td><input id="nut4_f34" name="nut4_f34" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag35" name="tag35" placeholder="Elige un alimento" class="tag" onkeyup="calcular35()"></td>
                    <td><input id="cantidad35" name="cantidad35" placeholder="Cant." class="cant" onkeyup="calc35()"></td>
                    <td><input id="unidad35" name="unidad35" class="unidad"></td>
                    <td><input id="grupo35" name="grupo35" class="grupo"></td>
                    <td><input id="porcion35" name="porcion35" class="porcion"></td>
                    <td><input id="nut1_f35" name="nut1_f35" class="nut1"></td>
                    <td><input id="nut2_f35" name="nut2_f35" class="nut2"></td>
                    <td><input id="nut3_f35" name="nut3_f35" class="nut3"></td>
                    <td><input id="nut4_f35" name="nut4_f35" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag36" name="tag36" placeholder="Elige un alimento" class="tag" onkeyup="calcular36()"></td>
                    <td><input id="cantidad36" name="cantidad36" placeholder="Cant." class="cant" onkeyup="calc36()"></td>
                    <td><input id="unidad36" name="unidad36" class="unidad"></td>
                    <td><input id="grupo36" name="grupo36" class="grupo"></td>
                    <td><input id="porcion36" name="porcion36" class="porcion"></td>
                    <td><input id="nut1_f36" name="nut1_f36" class="nut1"></td>
                    <td><input id="nut2_f36" name="nut2_f36" class="nut2"></td>
                    <td><input id="nut3_f36" name="nut3_f36" class="nut3"></td>
                    <td><input id="nut4_f36" name="nut4_f36" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag37" name="tag37" placeholder="Elige un alimento" class="tag" onkeyup="calcular37()"></td>
                    <td><input id="cantidad37" name="cantidad37" placeholder="Cant." class="cant" onkeyup="calc37()"></td>
                    <td><input id="unidad37" name="unidad37" class="unidad"></td>
                    <td><input id="grupo37" name="grupo37" class="grupo"></td>
                    <td><input id="porcion37" name="porcion37" class="porcion"></td>
                    <td><input id="nut1_f37" name="nut1_f37" class="nut1"></td>
                    <td><input id="nut2_f37" name="nut2_f37" class="nut2"></td>
                    <td><input id="nut3_f37" name="nut3_f37" class="nut3"></td>
                    <td><input id="nut4_f37" name="nut4_f37" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag38" name="tag38" placeholder="Elige un alimento" class="tag" onkeyup="calcular38()"></td>
                    <td><input id="cantidad38" name="cantidad38" placeholder="Cant." class="cant" onkeyup="calc38()"></td>
                    <td><input id="unidad38" name="unidad38" class="unidad"></td>
                    <td><input id="grupo38" name="grupo38" class="grupo"></td>
                    <td><input id="porcion38" name="porcion38" class="porcion"></td>
                    <td><input id="nut1_f38" name="nut1_f38" class="nut1"></td>
                    <td><input id="nut2_f38" name="nut2_f38" class="nut2"></td>
                    <td><input id="nut3_f38" name="nut3_f38" class="nut3"></td>
                    <td><input id="nut4_f38" name="nut4_f38" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag39" name="tag39" placeholder="Elige un alimento" class="tag" onkeyup="calcular39()"></td>
                    <td><input id="cantidad39" name="cantidad39" placeholder="Cant." class="cant" onkeyup="calc39()"></td>
                    <td><input id="unidad39" name="unidad39" class="unidad"></td>
                    <td><input id="grupo39" name="grupo39" class="grupo"></td>
                    <td><input id="porcion39" name="porcion39" class="porcion"></td>
                    <td><input id="nut1_f39" name="nut1_f39" class="nut1"></td>
                    <td><input id="nut2_f39" name="nut2_f39" class="nut2"></td>
                    <td><input id="nut3_f39" name="nut3_f39" class="nut3"></td>
                    <td><input id="nut4_f39" name="nut4_f39" class="nut4"></td>
                </tr>

                <tr>
                    <td><input id="tag40" name="tag40" placeholder="Elige un alimento" class="tag" onkeyup="calcular40()"></td>
                    <td><input id="cantidad40" name="cantidad40" placeholder="Cant." class="cant" onkeyup="calc40()"></td>
                    <td><input id="unidad40" name="unidad40" class="unidad"></td>
                    <td><input id="grupo40" name="grupo40" class="grupo"></td>
                    <td><input id="porcion40" name="porcion40" class="porcion"></td>
                    <td><input id="nut1_f40" name="nut1_f40" class="nut1"></td>
                    <td><input id="nut2_f40" name="nut2_f40" class="nut2"></td>
                    <td><input id="nut3_f40" name="nut3_f40" class="nut3"></td>
                    <td><input id="nut4_f40" name="nut4_f40" class="nut4"></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total =</td>
                    <td><input id="total5_opcion1" name="total5_opcion1" class="total"></td>
                    <td><input id="total5_opcion2" name="total5_opcion2" class="total"></td>
                    <td><input id="total5_opcion3" name="total5_opcion3" class="total"></td>
                    <td><input id="total5_opcion4" name="total5_opcion4" class="total"></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <br>
        
        <table class="tabla6">
        <thead>
                <tr>
                    <th></th>
                    <th class="seleccion1" style="width:60px">Energía (Kcal)</th>
                    <th class="seleccion2" style="width:60px">Proteína (g)</th>
                    <th class="seleccion3" style="width:60px">Lípidos (g)</th>
                    <th class="seleccion4" style="width:60px">Carbohidratos (g)</th>
                    <th></th>
                </tr>
        </thead>

        <tbody>
                <tr>
                    <td>Total/día =</td>
                    <td><input id="total6_opcion1" name="total6_opcion1" class="total"></td>
                    <td><input id="total6_opcion2" name="total6_opcion2" class="total"></td>
                    <td><input id="total6_opcion3" name="total6_opcion3" class="total"></td>
                    <td><input id="total6_opcion4" name="total6_opcion4" class="total"></td>
                    <td></td>
                </tr>
        </tbody>
        </table>
        <input type="submit" id="enviar_datos" name="enviar_datos" class="enviar_menu" value="Generar PDF">
        </form>
        </div>
        <br>
        <br>
        <br>
        </section>
        
        <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="jquery-ui.js"></script>
        <script type="text/javascript">

        function calcular1(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag1').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad1').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad1').val(json.unidad), $('#grupo1').val(json.grupo), $('#porcion1').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f1').val(json.opcion1);
                        }else{$('#nut1_f1').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f1').val(json.opcion2);
                        }else{$('#nut2_f1').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f1').val(json.opcion3);
                        }else{$('#nut3_f1').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f1').val(json.opcion4);
                        }else{$('#nut4_f1').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc1(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag1').val(), cant = $('#cantidad1').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad1').val(json.unidad), $('#grupo1').val(json.grupo), $('#porcion1').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f1').val(json.opcion1);
                        }else{$('#nut1_f1').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f1').val(json.opcion2);
                        }else{$('#nut2_f1').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f1').val(json.opcion3);
                        }else{$('#nut3_f1').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f1').val(json.opcion4);
                        }else{$('#nut4_f1').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular2(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag2').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad2').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad2').val(json.unidad), $('#grupo2').val(json.grupo), $('#porcion2').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f2').val(json.opcion1);
                        }else{$('#nut1_f2').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f2').val(json.opcion2);
                        }else{$('#nut2_f2').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f2').val(json.opcion3);
                        }else{$('#nut3_f2').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f2').val(json.opcion4);
                        }else{$('#nut4_f2').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc2(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag2').val(), cant = $('#cantidad2').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad2').val(json.unidad), $('#grupo2').val(json.grupo), $('#porcion2').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f2').val(json.opcion1);
                        }else{$('#nut1_f2').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f2').val(json.opcion2);
                        }else{$('#nut2_f2').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f2').val(json.opcion3);
                        }else{$('#nut3_f2').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f2').val(json.opcion4);
                        }else{$('#nut4_f2').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular3(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag3').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad3').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad3').val(json.unidad), $('#grupo3').val(json.grupo), $('#porcion3').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f3').val(json.opcion1);
                        }else{$('#nut1_f3').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f3').val(json.opcion2);
                        }else{$('#nut2_f3').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f3').val(json.opcion3);
                        }else{$('#nut3_f3').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f3').val(json.opcion4);
                        }else{$('#nut4_f3').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc3(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag3').val(), cant = $('#cantidad3').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad3').val(json.unidad), $('#grupo3').val(json.grupo), $('#porcion3').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f3').val(json.opcion1);
                        }else{$('#nut1_f3').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f3').val(json.opcion2);
                        }else{$('#nut2_f3').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f3').val(json.opcion3);
                        }else{$('#nut3_f3').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f3').val(json.opcion4);
                        }else{$('#nut4_f3').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular4(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag4').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad4').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad4').val(json.unidad), $('#grupo4').val(json.grupo), $('#porcion4').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f4').val(json.opcion1);
                        }else{$('#nut1_f4').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f4').val(json.opcion2);
                        }else{$('#nut2_f4').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f4').val(json.opcion3);
                        }else{$('#nut3_f4').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f4').val(json.opcion4);
                        }else{$('#nut4_f4').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc4(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag4').val(), cant = $('#cantidad4').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad4').val(json.unidad), $('#grupo4').val(json.grupo), $('#porcion4').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f4').val(json.opcion1);
                        }else{$('#nut1_f4').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f4').val(json.opcion2);
                        }else{$('#nut2_f4').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f4').val(json.opcion3);
                        }else{$('#nut3_f4').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f4').val(json.opcion4);
                        }else{$('#nut4_f4').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular5(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag5').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad5').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad5').val(json.unidad), $('#grupo5').val(json.grupo), $('#porcion5').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f5').val(json.opcion1);
                        }else{$('#nut1_f5').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f5').val(json.opcion2);
                        }else{$('#nut2_f5').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f5').val(json.opcion3);
                        }else{$('#nut3_f5').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f5').val(json.opcion4);
                        }else{$('#nut4_f5').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc5(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag5').val(), cant = $('#cantidad5').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad5').val(json.unidad), $('#grupo5').val(json.grupo), $('#porcion5').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f5').val(json.opcion1);
                        }else{$('#nut1_f5').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f5').val(json.opcion2);
                        }else{$('#nut2_f5').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f5').val(json.opcion3);
                        }else{$('#nut3_f5').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f5').val(json.opcion4);
                        }else{$('#nut4_f5').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular6(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag6').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad6').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad6').val(json.unidad), $('#grupo6').val(json.grupo), $('#porcion6').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f6').val(json.opcion1);
                        }else{$('#nut1_f6').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f6').val(json.opcion2);
                        }else{$('#nut2_f6').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f6').val(json.opcion3);
                        }else{$('#nut3_f6').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f6').val(json.opcion4);
                        }else{$('#nut4_f6').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc6(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag6').val(), cant = $('#cantidad6').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad6').val(json.unidad), $('#grupo6').val(json.grupo), $('#porcion6').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f6').val(json.opcion1);
                        }else{$('#nut1_f6').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f6').val(json.opcion2);
                        }else{$('#nut2_f6').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f6').val(json.opcion3);
                        }else{$('#nut3_f6').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f6').val(json.opcion4);
                        }else{$('#nut4_f6').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular7(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag7').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad7').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad7').val(json.unidad), $('#grupo7').val(json.grupo), $('#porcion7').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f7').val(json.opcion1);
                        }else{$('#nut1_f7').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f7').val(json.opcion2);
                        }else{$('#nut2_f7').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f7').val(json.opcion3);
                        }else{$('#nut3_f7').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f7').val(json.opcion4);
                        }else{$('#nut4_f7').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc7(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag7').val(), cant = $('#cantidad7').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad7').val(json.unidad), $('#grupo7').val(json.grupo), $('#porcion7').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f7').val(json.opcion1);
                        }else{$('#nut1_f7').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f7').val(json.opcion2);
                        }else{$('#nut2_f7').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f7').val(json.opcion3);
                        }else{$('#nut3_f7').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f7').val(json.opcion4);
                        }else{$('#nut4_f7').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular8(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag8').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad8').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad8').val(json.unidad), $('#grupo8').val(json.grupo), $('#porcion8').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f8').val(json.opcion1);
                        }else{$('#nut1_f8').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f8').val(json.opcion2);
                        }else{$('#nut2_f8').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f8').val(json.opcion3);
                        }else{$('#nut3_f8').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f8').val(json.opcion4);
                        }else{$('#nut4_f8').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc8(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag8').val(), cant = $('#cantidad8').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad8').val(json.unidad), $('#grupo8').val(json.grupo), $('#porcion8').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f8').val(json.opcion1);
                        }else{$('#nut1_f8').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f8').val(json.opcion2);
                        }else{$('#nut2_f8').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f8').val(json.opcion3);
                        }else{$('#nut3_f8').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f8').val(json.opcion4);
                        }else{$('#nut4_f8').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular9(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag9').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad9').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad9').val(json.unidad), $('#grupo9').val(json.grupo), $('#porcion9').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f9').val(json.opcion1);
                        }else{$('#nut1_f9').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f9').val(json.opcion2);
                        }else{$('#nut2_f9').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f9').val(json.opcion3);
                        }else{$('#nut3_f9').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f9').val(json.opcion4);
                        }else{$('#nut4_f9').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc9(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag9').val(), cant = $('#cantidad9').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad9').val(json.unidad), $('#grupo9').val(json.grupo), $('#porcion9').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f9').val(json.opcion1);
                        }else{$('#nut1_f9').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f9').val(json.opcion2);
                        }else{$('#nut2_f9').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f9').val(json.opcion3);
                        }else{$('#nut3_f9').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f9').val(json.opcion4);
                        }else{$('#nut4_f9').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular10(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag10').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad10').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad10').val(json.unidad), $('#grupo10').val(json.grupo), $('#porcion10').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f10').val(json.opcion1);
                        }else{$('#nut1_f10').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f10').val(json.opcion2);
                        }else{$('#nut2_f10').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f10').val(json.opcion3);
                        }else{$('#nut3_f10').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f10').val(json.opcion4);
                        }else{$('#nut4_f10').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc10(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag10').val(), cant = $('#cantidad10').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad10').val(json.unidad), $('#grupo10').val(json.grupo), $('#porcion10').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f10').val(json.opcion1);
                        }else{$('#nut1_f10').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f10').val(json.opcion2);
                        }else{$('#nut2_f10').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f10').val(json.opcion3);
                        }else{$('#nut3_f10').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f10').val(json.opcion4);
                        }else{$('#nut4_f10').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular11(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag11').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad11').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad11').val(json.unidad), $('#grupo11').val(json.grupo), $('#porcion11').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f11').val(json.opcion1);
                        }else{$('#nut1_f11').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f11').val(json.opcion2);
                        }else{$('#nut2_f11').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f11').val(json.opcion3);
                        }else{$('#nut3_f11').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f11').val(json.opcion4);
                        }else{$('#nut4_f11').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc11(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag11').val(), cant = $('#cantidad11').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad11').val(json.unidad), $('#grupo11').val(json.grupo), $('#porcion11').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f11').val(json.opcion1);
                        }else{$('#nut1_f11').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f11').val(json.opcion2);
                        }else{$('#nut2_f11').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f11').val(json.opcion3);
                        }else{$('#nut3_f11').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f11').val(json.opcion4);
                        }else{$('#nut4_f11').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular12(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag12').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad12').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad12').val(json.unidad), $('#grupo12').val(json.grupo), $('#porcion12').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f12').val(json.opcion1);
                        }else{$('#nut1_f12').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f12').val(json.opcion2);
                        }else{$('#nut2_f12').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f12').val(json.opcion3);
                        }else{$('#nut3_f12').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f12').val(json.opcion4);
                        }else{$('#nut4_f12').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc12(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag12').val(), cant = $('#cantidad12').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad12').val(json.unidad), $('#grupo12').val(json.grupo), $('#porcion12').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f12').val(json.opcion1);
                        }else{$('#nut1_f12').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f12').val(json.opcion2);
                        }else{$('#nut2_f12').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f12').val(json.opcion3);
                        }else{$('#nut3_f12').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f12').val(json.opcion4);
                        }else{$('#nut4_f12').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular13(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag13').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad13').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad13').val(json.unidad), $('#grupo13').val(json.grupo), $('#porcion13').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f13').val(json.opcion1);
                        }else{$('#nut1_f13').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f13').val(json.opcion2);
                        }else{$('#nut2_f13').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f13').val(json.opcion3);
                        }else{$('#nut3_f13').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f13').val(json.opcion4);
                        }else{$('#nut4_f13').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc13(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag13').val(), cant = $('#cantidad13').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad13').val(json.unidad), $('#grupo13').val(json.grupo), $('#porcion13').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f13').val(json.opcion1);
                        }else{$('#nut1_f13').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f13').val(json.opcion2);
                        }else{$('#nut2_f13').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f13').val(json.opcion3);
                        }else{$('#nut3_f13').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f13').val(json.opcion4);
                        }else{$('#nut4_f13').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular14(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag14').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad14').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad14').val(json.unidad), $('#grupo14').val(json.grupo), $('#porcion14').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f14').val(json.opcion1);
                        }else{$('#nut1_f14').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f14').val(json.opcion2);
                        }else{$('#nut2_f14').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f14').val(json.opcion3);
                        }else{$('#nut3_f14').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f14').val(json.opcion4);
                        }else{$('#nut4_f14').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc14(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag14').val(), cant = $('#cantidad14').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad14').val(json.unidad), $('#grupo14').val(json.grupo), $('#porcion14').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f14').val(json.opcion1);
                        }else{$('#nut1_f14').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f14').val(json.opcion2);
                        }else{$('#nut2_f14').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f14').val(json.opcion3);
                        }else{$('#nut3_f14').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f14').val(json.opcion4);
                        }else{$('#nut4_f14').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular15(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag15').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad15').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad15').val(json.unidad), $('#grupo15').val(json.grupo), $('#porcion15').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f15').val(json.opcion1);
                        }else{$('#nut1_f15').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f15').val(json.opcion2);
                        }else{$('#nut2_f15').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f15').val(json.opcion3);
                        }else{$('#nut3_f15').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f15').val(json.opcion4);
                        }else{$('#nut4_f15').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc15(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag15').val(), cant = $('#cantidad15').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad15').val(json.unidad), $('#grupo15').val(json.grupo), $('#porcion15').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f15').val(json.opcion1);
                        }else{$('#nut1_f15').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f15').val(json.opcion2);
                        }else{$('#nut2_f15').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f15').val(json.opcion3);
                        }else{$('#nut3_f15').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f15').val(json.opcion4);
                        }else{$('#nut4_f15').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular16(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag16').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad16').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad16').val(json.unidad), $('#grupo16').val(json.grupo), $('#porcion16').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f16').val(json.opcion1);
                        }else{$('#nut1_f16').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f16').val(json.opcion2);
                        }else{$('#nut2_f16').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f16').val(json.opcion3);
                        }else{$('#nut3_f16').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f16').val(json.opcion4);
                        }else{$('#nut4_f16').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc16(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag16').val(), cant = $('#cantidad16').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad16').val(json.unidad), $('#grupo16').val(json.grupo), $('#porcion16').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f16').val(json.opcion1);
                        }else{$('#nut1_f16').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f16').val(json.opcion2);
                        }else{$('#nut2_f16').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f16').val(json.opcion3);
                        }else{$('#nut3_f16').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f16').val(json.opcion4);
                        }else{$('#nut4_f16').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular17(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag17').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad17').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad17').val(json.unidad), $('#grupo17').val(json.grupo), $('#porcion17').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f17').val(json.opcion1);
                        }else{$('#nut1_f17').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f17').val(json.opcion2);
                        }else{$('#nut2_f17').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f17').val(json.opcion3);
                        }else{$('#nut3_f17').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f17').val(json.opcion4);
                        }else{$('#nut4_f17').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc17(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag17').val(), cant = $('#cantidad17').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad17').val(json.unidad), $('#grupo17').val(json.grupo), $('#porcion17').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f17').val(json.opcion1);
                        }else{$('#nut1_f17').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f17').val(json.opcion2);
                        }else{$('#nut2_f17').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f17').val(json.opcion3);
                        }else{$('#nut3_f17').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f17').val(json.opcion4);
                        }else{$('#nut4_f17').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular18(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag18').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad18').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad18').val(json.unidad), $('#grupo18').val(json.grupo), $('#porcion18').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f18').val(json.opcion1);
                        }else{$('#nut1_f18').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f18').val(json.opcion2);
                        }else{$('#nut2_f18').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f18').val(json.opcion3);
                        }else{$('#nut3_f18').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f18').val(json.opcion4);
                        }else{$('#nut4_f18').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc18(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag18').val(), cant = $('#cantidad18').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad18').val(json.unidad), $('#grupo18').val(json.grupo), $('#porcion18').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f18').val(json.opcion1);
                        }else{$('#nut1_f18').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f18').val(json.opcion2);
                        }else{$('#nut2_f18').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f18').val(json.opcion3);
                        }else{$('#nut3_f18').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f18').val(json.opcion4);
                        }else{$('#nut4_f18').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular19(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag19').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad19').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad19').val(json.unidad), $('#grupo19').val(json.grupo), $('#porcion19').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f19').val(json.opcion1);
                        }else{$('#nut1_f19').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f19').val(json.opcion2);
                        }else{$('#nut2_f19').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f19').val(json.opcion3);
                        }else{$('#nut3_f19').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f19').val(json.opcion4);
                        }else{$('#nut4_f19').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc19(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag19').val(), cant = $('#cantidad19').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad19').val(json.unidad), $('#grupo19').val(json.grupo), $('#porcion19').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f19').val(json.opcion1);
                        }else{$('#nut1_f19').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f19').val(json.opcion2);
                        }else{$('#nut2_f19').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f19').val(json.opcion3);
                        }else{$('#nut3_f19').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f19').val(json.opcion4);
                        }else{$('#nut4_f19').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular20(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag20').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad20').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad20').val(json.unidad), $('#grupo20').val(json.grupo), $('#porcion20').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f20').val(json.opcion1);
                        }else{$('#nut1_f20').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f20').val(json.opcion2);
                        }else{$('#nut2_f20').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f20').val(json.opcion3);
                        }else{$('#nut3_f20').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f20').val(json.opcion4);
                        }else{$('#nut4_f20').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc20(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag20').val(), cant = $('#cantidad20').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad20').val(json.unidad), $('#grupo20').val(json.grupo), $('#porcion20').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f20').val(json.opcion1);
                        }else{$('#nut1_f20').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f20').val(json.opcion2);
                        }else{$('#nut2_f20').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f20').val(json.opcion3);
                        }else{$('#nut3_f20').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f20').val(json.opcion4);
                        }else{$('#nut4_f20').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular21(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag21').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad21').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad21').val(json.unidad), $('#grupo21').val(json.grupo), $('#porcion21').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f21').val(json.opcion1);
                        }else{$('#nut1_f21').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f21').val(json.opcion2);
                        }else{$('#nut2_f21').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f21').val(json.opcion3);
                        }else{$('#nut3_f21').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f21').val(json.opcion4);
                        }else{$('#nut4_f21').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc21(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag21').val(), cant = $('#cantidad21').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad21').val(json.unidad), $('#grupo21').val(json.grupo), $('#porcion21').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f21').val(json.opcion1);
                        }else{$('#nut1_f21').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f21').val(json.opcion2);
                        }else{$('#nut2_f21').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f21').val(json.opcion3);
                        }else{$('#nut3_f21').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f21').val(json.opcion4);
                        }else{$('#nut4_f21').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular22(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag22').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad22').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad22').val(json.unidad), $('#grupo22').val(json.grupo), $('#porcion22').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f22').val(json.opcion1);
                        }else{$('#nut1_f22').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f22').val(json.opcion2);
                        }else{$('#nut2_f22').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f22').val(json.opcion3);
                        }else{$('#nut3_f22').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f22').val(json.opcion4);
                        }else{$('#nut4_f22').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc22(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag22').val(), cant = $('#cantidad22').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad22').val(json.unidad), $('#grupo22').val(json.grupo), $('#porcion22').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f22').val(json.opcion1);
                        }else{$('#nut1_f22').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f22').val(json.opcion2);
                        }else{$('#nut2_f22').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f22').val(json.opcion3);
                        }else{$('#nut3_f22').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f22').val(json.opcion4);
                        }else{$('#nut4_f22').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular23(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag23').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad23').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad23').val(json.unidad), $('#grupo23').val(json.grupo), $('#porcion23').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f23').val(json.opcion1);
                        }else{$('#nut1_f23').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f23').val(json.opcion2);
                        }else{$('#nut2_f23').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f23').val(json.opcion3);
                        }else{$('#nut3_f23').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f23').val(json.opcion4);
                        }else{$('#nut4_f23').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc23(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag23').val(), cant = $('#cantidad23').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad23').val(json.unidad), $('#grupo23').val(json.grupo), $('#porcion23').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f23').val(json.opcion1);
                        }else{$('#nut1_f23').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f23').val(json.opcion2);
                        }else{$('#nut2_f23').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f23').val(json.opcion3);
                        }else{$('#nut3_f23').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f23').val(json.opcion4);
                        }else{$('#nut4_f23').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular24(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag24').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad24').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad24').val(json.unidad), $('#grupo24').val(json.grupo), $('#porcion24').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f24').val(json.opcion1);
                        }else{$('#nut1_f24').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f24').val(json.opcion2);
                        }else{$('#nut2_f24').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f24').val(json.opcion3);
                        }else{$('#nut3_f24').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f24').val(json.opcion4);
                        }else{$('#nut4_f24').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc24(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag24').val(), cant = $('#cantidad24').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad24').val(json.unidad), $('#grupo24').val(json.grupo), $('#porcion24').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f24').val(json.opcion1);
                        }else{$('#nut1_f24').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f24').val(json.opcion2);
                        }else{$('#nut2_f24').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f24').val(json.opcion3);
                        }else{$('#nut3_f24').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f24').val(json.opcion4);
                        }else{$('#nut4_f24').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular25(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag25').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad25').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad25').val(json.unidad), $('#grupo25').val(json.grupo), $('#porcion25').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f25').val(json.opcion1);
                        }else{$('#nut1_f25').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f25').val(json.opcion2);
                        }else{$('#nut2_f25').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f25').val(json.opcion3);
                        }else{$('#nut3_f25').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f25').val(json.opcion4);
                        }else{$('#nut4_f25').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc25(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag25').val(), cant = $('#cantidad25').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad25').val(json.unidad), $('#grupo25').val(json.grupo), $('#porcion25').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f25').val(json.opcion1);
                        }else{$('#nut1_f25').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f25').val(json.opcion2);
                        }else{$('#nut2_f25').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f25').val(json.opcion3);
                        }else{$('#nut3_f25').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f25').val(json.opcion4);
                        }else{$('#nut4_f25').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular26(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag26').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad26').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad26').val(json.unidad), $('#grupo26').val(json.grupo), $('#porcion26').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f26').val(json.opcion1);
                        }else{$('#nut1_f26').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f26').val(json.opcion2);
                        }else{$('#nut2_f26').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f26').val(json.opcion3);
                        }else{$('#nut3_f26').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f26').val(json.opcion4);
                        }else{$('#nut4_f26').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc26(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag26').val(), cant = $('#cantidad26').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad26').val(json.unidad), $('#grupo26').val(json.grupo), $('#porcion26').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f26').val(json.opcion1);
                        }else{$('#nut1_f26').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f26').val(json.opcion2);
                        }else{$('#nut2_f26').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f26').val(json.opcion3);
                        }else{$('#nut3_f26').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f26').val(json.opcion4);
                        }else{$('#nut4_f26').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular27(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag27').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad27').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad27').val(json.unidad), $('#grupo27').val(json.grupo), $('#porcion27').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f27').val(json.opcion1);
                        }else{$('#nut1_f27').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f27').val(json.opcion2);
                        }else{$('#nut2_f27').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f27').val(json.opcion3);
                        }else{$('#nut3_f27').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f27').val(json.opcion4);
                        }else{$('#nut4_f27').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc27(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag27').val(), cant = $('#cantidad27').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad27').val(json.unidad), $('#grupo27').val(json.grupo), $('#porcion27').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f27').val(json.opcion1);
                        }else{$('#nut1_f27').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f27').val(json.opcion2);
                        }else{$('#nut2_f27').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f27').val(json.opcion3);
                        }else{$('#nut3_f27').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f27').val(json.opcion4);
                        }else{$('#nut4_f27').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular28(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag28').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad28').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad28').val(json.unidad), $('#grupo28').val(json.grupo), $('#porcion28').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f28').val(json.opcion1);
                        }else{$('#nut1_f28').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f28').val(json.opcion2);
                        }else{$('#nut2_f28').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f28').val(json.opcion3);
                        }else{$('#nut3_f28').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f28').val(json.opcion4);
                        }else{$('#nut4_f28').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc28(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag28').val(), cant = $('#cantidad28').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad28').val(json.unidad), $('#grupo28').val(json.grupo), $('#porcion28').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f28').val(json.opcion1);
                        }else{$('#nut1_f28').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f28').val(json.opcion2);
                        }else{$('#nut2_f28').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f28').val(json.opcion3);
                        }else{$('#nut3_f28').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f28').val(json.opcion4);
                        }else{$('#nut4_f28').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular29(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag29').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad29').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad29').val(json.unidad), $('#grupo29').val(json.grupo), $('#porcion29').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f29').val(json.opcion1);
                        }else{$('#nut1_f29').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f29').val(json.opcion2);
                        }else{$('#nut2_f29').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f29').val(json.opcion3);
                        }else{$('#nut3_f29').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f29').val(json.opcion4);
                        }else{$('#nut4_f29').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc29(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag29').val(), cant = $('#cantidad29').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad29').val(json.unidad), $('#grupo29').val(json.grupo), $('#porcion29').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f29').val(json.opcion1);
                        }else{$('#nut1_f29').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f29').val(json.opcion2);
                        }else{$('#nut2_f29').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f29').val(json.opcion3);
                        }else{$('#nut3_f29').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f29').val(json.opcion4);
                        }else{$('#nut4_f29').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular30(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag30').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad30').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad30').val(json.unidad), $('#grupo30').val(json.grupo), $('#porcion30').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f30').val(json.opcion1);
                        }else{$('#nut1_f30').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f30').val(json.opcion2);
                        }else{$('#nut2_f30').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f30').val(json.opcion3);
                        }else{$('#nut3_f30').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f30').val(json.opcion4);
                        }else{$('#nut4_f30').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc30(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag30').val(), cant = $('#cantidad30').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad30').val(json.unidad), $('#grupo30').val(json.grupo), $('#porcion30').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f30').val(json.opcion1);
                        }else{$('#nut1_f30').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f30').val(json.opcion2);
                        }else{$('#nut2_f30').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f30').val(json.opcion3);
                        }else{$('#nut3_f30').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f30').val(json.opcion4);
                        }else{$('#nut4_f30').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular31(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag31').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad31').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad31').val(json.unidad), $('#grupo31').val(json.grupo), $('#porcion31').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f31').val(json.opcion1);
                        }else{$('#nut1_f31').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f31').val(json.opcion2);
                        }else{$('#nut2_f31').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f31').val(json.opcion3);
                        }else{$('#nut3_f31').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f31').val(json.opcion4);
                        }else{$('#nut4_f31').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc31(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag31').val(), cant = $('#cantidad31').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad31').val(json.unidad), $('#grupo31').val(json.grupo), $('#porcion31').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f31').val(json.opcion1);
                        }else{$('#nut1_f31').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f31').val(json.opcion2);
                        }else{$('#nut2_f31').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f31').val(json.opcion3);
                        }else{$('#nut3_f31').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f31').val(json.opcion4);
                        }else{$('#nut4_f31').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular32(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag32').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad32').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad32').val(json.unidad), $('#grupo32').val(json.grupo), $('#porcion32').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f32').val(json.opcion1);
                        }else{$('#nut1_f32').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f32').val(json.opcion2);
                        }else{$('#nut2_f32').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f32').val(json.opcion3);
                        }else{$('#nut3_f32').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f32').val(json.opcion4);
                        }else{$('#nut4_f32').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc32(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag32').val(), cant = $('#cantidad32').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad32').val(json.unidad), $('#grupo32').val(json.grupo), $('#porcion32').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f32').val(json.opcion1);
                        }else{$('#nut1_f32').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f32').val(json.opcion2);
                        }else{$('#nut2_f32').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f32').val(json.opcion3);
                        }else{$('#nut3_f32').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f32').val(json.opcion4);
                        }else{$('#nut4_f32').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular33(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag33').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad33').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad33').val(json.unidad), $('#grupo33').val(json.grupo), $('#porcion33').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f33').val(json.opcion1);
                        }else{$('#nut1_f33').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f33').val(json.opcion2);
                        }else{$('#nut2_f33').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f33').val(json.opcion3);
                        }else{$('#nut3_f33').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f33').val(json.opcion4);
                        }else{$('#nut4_f33').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc33(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag33').val(), cant = $('#cantidad33').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad33').val(json.unidad), $('#grupo33').val(json.grupo), $('#porcion33').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f33').val(json.opcion1);
                        }else{$('#nut1_f33').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f33').val(json.opcion2);
                        }else{$('#nut2_f33').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f33').val(json.opcion3);
                        }else{$('#nut3_f33').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f33').val(json.opcion4);
                        }else{$('#nut4_f33').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular34(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag34').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad34').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad34').val(json.unidad), $('#grupo34').val(json.grupo), $('#porcion34').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f34').val(json.opcion1);
                        }else{$('#nut1_f34').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f34').val(json.opcion2);
                        }else{$('#nut2_f34').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f34').val(json.opcion3);
                        }else{$('#nut3_f34').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f34').val(json.opcion4);
                        }else{$('#nut4_f34').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc34(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag34').val(), cant = $('#cantidad34').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad34').val(json.unidad), $('#grupo34').val(json.grupo), $('#porcion34').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f34').val(json.opcion1);
                        }else{$('#nut1_f34').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f34').val(json.opcion2);
                        }else{$('#nut2_f34').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f34').val(json.opcion3);
                        }else{$('#nut3_f34').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f34').val(json.opcion4);
                        }else{$('#nut4_f34').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular35(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag35').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad35').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad35').val(json.unidad), $('#grupo35').val(json.grupo), $('#porcion35').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f35').val(json.opcion1);
                        }else{$('#nut1_f35').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f35').val(json.opcion2);
                        }else{$('#nut2_f35').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f35').val(json.opcion3);
                        }else{$('#nut3_f35').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f35').val(json.opcion4);
                        }else{$('#nut4_f35').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc35(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag35').val(), cant = $('#cantidad35').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad35').val(json.unidad), $('#grupo35').val(json.grupo), $('#porcion35').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f35').val(json.opcion1);
                        }else{$('#nut1_f35').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f35').val(json.opcion2);
                        }else{$('#nut2_f35').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f35').val(json.opcion3);
                        }else{$('#nut3_f35').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f35').val(json.opcion4);
                        }else{$('#nut4_f35').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular36(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag36').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad36').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad36').val(json.unidad), $('#grupo36').val(json.grupo), $('#porcion36').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f36').val(json.opcion1);
                        }else{$('#nut1_f36').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f36').val(json.opcion2);
                        }else{$('#nut2_f36').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f36').val(json.opcion3);
                        }else{$('#nut3_f36').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f36').val(json.opcion4);
                        }else{$('#nut4_f36').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc36(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag36').val(), cant = $('#cantidad36').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad36').val(json.unidad), $('#grupo36').val(json.grupo), $('#porcion36').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f36').val(json.opcion1);
                        }else{$('#nut1_f36').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f36').val(json.opcion2);
                        }else{$('#nut2_f36').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f36').val(json.opcion3);
                        }else{$('#nut3_f36').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f36').val(json.opcion4);
                        }else{$('#nut4_f36').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular37(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag37').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad37').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad37').val(json.unidad), $('#grupo37').val(json.grupo), $('#porcion37').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f37').val(json.opcion1);
                        }else{$('#nut1_f37').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f37').val(json.opcion2);
                        }else{$('#nut2_f37').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f37').val(json.opcion3);
                        }else{$('#nut3_f37').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f37').val(json.opcion4);
                        }else{$('#nut4_f37').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc37(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag37').val(), cant = $('#cantidad37').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad37').val(json.unidad), $('#grupo37').val(json.grupo), $('#porcion37').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f37').val(json.opcion1);
                        }else{$('#nut1_f37').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f37').val(json.opcion2);
                        }else{$('#nut2_f37').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f37').val(json.opcion3);
                        }else{$('#nut3_f37').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f37').val(json.opcion4);
                        }else{$('#nut4_f37').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular38(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag38').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad38').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad38').val(json.unidad), $('#grupo38').val(json.grupo), $('#porcion38').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f38').val(json.opcion1);
                        }else{$('#nut1_f38').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f38').val(json.opcion2);
                        }else{$('#nut2_f38').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f38').val(json.opcion3);
                        }else{$('#nut3_f38').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f38').val(json.opcion4);
                        }else{$('#nut4_f38').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc38(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag38').val(), cant = $('#cantidad38').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad38').val(json.unidad), $('#grupo38').val(json.grupo), $('#porcion38').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f38').val(json.opcion1);
                        }else{$('#nut1_f38').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f38').val(json.opcion2);
                        }else{$('#nut2_f38').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f38').val(json.opcion3);
                        }else{$('#nut3_f38').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f38').val(json.opcion4);
                        }else{$('#nut4_f38').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular39(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag39').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad39').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad39').val(json.unidad), $('#grupo39').val(json.grupo), $('#porcion39').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f39').val(json.opcion1);
                        }else{$('#nut1_f39').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f39').val(json.opcion2);
                        }else{$('#nut2_f39').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f39').val(json.opcion3);
                        }else{$('#nut3_f39').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f39').val(json.opcion4);
                        }else{$('#nut4_f39').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc39(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag39').val(), cant = $('#cantidad39').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad39').val(json.unidad), $('#grupo39').val(json.grupo), $('#porcion39').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f39').val(json.opcion1);
                        }else{$('#nut1_f39').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f39').val(json.opcion2);
                        }else{$('#nut2_f39').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f39').val(json.opcion3);
                        }else{$('#nut3_f39').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f39').val(json.opcion4);
                        }else{$('#nut4_f39').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }

        function calcular40(){
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

            $('#tag40').autocomplete({source: items1,
            select: function (event, item){
                let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
                var cant = $('#cantidad40').val();
                var params ={
                    alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                };
                $.get("conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad40').val(json.unidad), $('#grupo40').val(json.grupo), $('#porcion40').val(porcion); 
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f40').val(json.opcion1);
                        }else{$('#nut1_f40').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f40').val(json.opcion2);
                        }else{$('#nut2_f40').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f40').val(json.opcion3);
                        }else{$('#nut3_f40').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f40').val(json.opcion4);
                        }else{$('#nut4_f40').val((json.opcion4*porcion).toFixed(1));}          
                });
            }
            });
            });
        }

        function calc40(){
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                opc5 = "vacio", opc6 = "vacio", bdAlim = $('input[name=bdAlim]:checked').val();
            var alim1 = $('#tag40').val(), cant = $('#cantidad40').val();
                var parametros ={
                    alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim 
                }
                $.get("conex/micronut.php", parametros, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200) var porcion = ((cant/(json.cantidad)).toFixed(2));

                        $('#unidad40').val(json.unidad), $('#grupo40').val(json.grupo), $('#porcion40').val(porcion);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f40').val(json.opcion1);
                        }else{$('#nut1_f40').val((json.opcion1*porcion).toFixed(1));}

                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f40').val(json.opcion2);
                        }else{$('#nut2_f40').val((json.opcion2*porcion).toFixed(1));}
                                
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f40').val(json.opcion3);
                        }else{$('#nut3_f40').val((json.opcion3*porcion).toFixed(1));}
                                
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f40').val(json.opcion4);
                        }else{$('#nut4_f40').val((json.opcion4*porcion).toFixed(1));}
                }); 
        }
        
        function titulo(){
        $("#titulo2").val($("#titulo").val());
        }

        $("#opcion1").change(function() {
            var opcion1 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado

            $("#opc1").val(opcion1);
        });

        $("#opcion2").change(function() {
            var opcion2 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado

            $("#opc2").val(opcion2);
        });

        $("#opcion3").change(function() {
            var opcion3 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado

            $("#opc3").val(opcion3);
        });

        $("#opcion4").change(function() {
            var opcion4 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado

            $("#opc4").val(opcion4);
        });

    //Anulamos que se envie información del form al hacer enter
    function anular(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        return (tecla != 13);
    }
    </script>
    <script src="assets/js/rec24.js"></script>
    </body>

</html>