<?php 
$data1 = ConsultarNombre($_GET['id']);

function ConsultarNombre($id_user){
    $con = mysqli_connect("localhost", "root", "", "registro");

    $sent = "SELECT * FROM guardar_menus WHERE id='".$id_user."' ";
    $resultado = mysqli_query($con, $sent) or die (mysqli_error());
    $filas=mysqli_fetch_assoc($resultado);
    return[
        $filas['desayuno_lunes'],$filas['colacion1_lunes'],$filas['comida_lunes'],$filas['colacion2_lunes'],$filas['cena_lunes'],
        $filas['desayuno_martes'],$filas['colacion1_martes'],$filas['comida_martes'],$filas['colacion2_martes'],$filas['cena_martes'],
        $filas['desayuno_miercoles'],$filas['colacion1_miercoles'], $filas['comida_miercoles'],$filas['colacion2_miercoles'],$filas['cena_miercoles'],
        $filas['desayuno_jueves'],$filas['colacion1_jueves'],$filas['comida_jueves'],$filas['colacion2_jueves'],$filas['cena_jueves'],
        $filas['desayuno_viernes'],$filas['colacion1_viernes'],$filas['comida_viernes'],$filas['colacion2_viernes'],$filas['cena_viernes'],
        $filas['desayuno_sabado'],$filas['colacion1_sabado'],$filas['comida_sabado'],$filas['colacion2_sabado'],$filas['cena_sabado'],
        $filas['desayuno_domingo'],$filas['colacion1_domingo'],$filas['comida_domingo'],$filas['colacion2_domingo'],$filas['cena_domingo']
    ];

}
    include ('../fpdf/codigo_pdf.php');

    //make new object
    $pdf = new PDF_MC_Table();
    //Establecemos los márgenes izquierda, arriba y derecha:
    $pdf->SetMargins(25, 19, 25);
    //Establecemos el margen inferior:
    $pdf->SetAutoPageBreak(true,19);

    $pdf->SetFillColor(230, 230, 230);

    //add page, set font
    $pdf->AddPage('L'); 

    $data = ['{"dia":"Lunes", "desayuno":"'.$data1[0].'", "colacion1":"'.$data1[1].'", "comida":"'.$data1[2].'", "colacion2":"'.$data1[3].'", "cena":"'.$data1[4].'"},
    {"dia":"Martes", "desayuno":"'.$data1[5].'", "colacion1":"'.$data1[6].'", "comida":"'.$data1[7].'", "colacion2":"'.$data1[8].'", "cena":"'.$data1[9].'"},
    {"dia":"Miércoles", "desayuno":"'.$data1[10].'", "colacion1":"'.$data1[11].'", "comida":"'.$data1[12].'", "colacion2":"'.$data1[13].'", "cena":"'.$data1[14].'"},
    {"dia":"Jueves", "desayuno":"'.$data1[15].'", "colacion1":"'.$data1[16].'", "comida":"'.$data1[17].'", "colacion2":"'.$data1[18].'", "cena":"'.$data1[19].'"},
    {"dia":"Viernes", "desayuno":"'.$data1[20].'", "colacion1":"'.$data1[21].'", "comida":"'.$data1[22].'", "colacion2":"'.$data1[23].'", "cena":"'.$data1[24].'"},
    {"dia":"Sábado", "desayuno":"'.$data1[25].'", "colacion1":"'.$data1[26].'", "comida":"'.$data1[27].'", "colacion2":"'.$data1[28].'", "cena":"'.$data1[29].'"},
    {"dia":"Domingo", "desayuno":"'.$data1[30].'", "colacion1":"'.$data1[31].'", "comida":"'.$data1[32].'", "colacion2":"'.$data1[33].'", "cena":"'.$data1[34].'"},'];

        //set width for each column (6 columns)
        $pdf->SetWidths(Array(16,60,.5,25,.5,60,.5,25,.5,60));

        foreach ($data as $dat) {
            //set alignment
            $pdf->SetAligns(Array('C','C','J','C','J','C','J','C','J','C'));

            //set line height
            $pdf->SetLineHeight(6);

            $pdf->SetFont('Helvetica', 'B', 12);
            $pdf->SetTextColor(255, 255, 255);

            $pdf->SetFillColor(177, 34, 78);
            $pdf->Row(Array(
                "",
                "Desayuno",
                "",
                "Almuerzo",
                "",
                "Comida",
                "",
                "Merienda",
                "",
                "Cena",
            ));
            //set alignment
            $pdf->SetAligns(Array('J','J','J','J','J','J','J','J','J','J'));

            //set line height
            $pdf->SetLineHeight(3.5);

            $pdf->SetFont('Arial', '', 9);
            $pdf->SetTextColor(0, 0, 0);

            $pdf->SetFillColor(230, 230, 230);
            $pdf->Row(Array(
                "Lunes",
                utf8_decode($data1[0]),
                "",
                utf8_decode($data1[1]),
                "",
                utf8_decode($data1[2]),
                "",
                utf8_decode($data1[3]),
                "",
                utf8_decode($data1[4]),
            ));
            $pdf->SetFillColor(255, 255, 255);
            $pdf->Row(Array(
                "Martes",
                utf8_decode($data1[5]),
                "",
                utf8_decode($data1[6]),
                "",
                utf8_decode($data1[7]),
                "",
                utf8_decode($data1[8]),
                "",
                utf8_decode($data1[9]),
            ));
            $pdf->SetFillColor(230, 230, 230);
            $pdf->Row(Array(
                utf8_decode("Miércoles"),
                utf8_decode($data1[10]),
                "",
                utf8_decode($data1[11]),
                "",
                utf8_decode($data1[12]),
                "",
                utf8_decode($data1[13]),
                "",
                utf8_decode($data1[14]),
            ));
            $pdf->SetFillColor(255, 255, 255);
            $pdf->Row(Array(
                "Jueves",
                utf8_decode($data1[15]),
                "",
                utf8_decode($data1[16]),
                "",
                utf8_decode($data1[17]),
                "",
                utf8_decode($data1[18]),
                "",
                utf8_decode($data1[19]),
            ));
            $pdf->SetFillColor(230, 230, 230);
            $pdf->Row(Array(
                "Viernes",
                utf8_decode($data1[20]),
                "",
                utf8_decode($data1[21]),
                "",
                utf8_decode($data1[22]),
                "",
                utf8_decode($data1[23]),
                "",
                utf8_decode($data1[24]),
            ));
            $pdf->SetFillColor(255, 255, 255);
            $pdf->Row(Array(
                utf8_decode("Sábado"),
                utf8_decode($data1[25]),
                "",
                utf8_decode($data1[26]),
                "",
                utf8_decode($data1[27]),
                "",
                utf8_decode($data1[28]),
                "",
                utf8_decode($data1[29]),
            ));
            $pdf->SetFillColor(230, 230, 230);
            $pdf->Row(Array(
                "Domingo",
                utf8_decode($data1[30]),
                "",
                utf8_decode($data1[31]),
                "",
                utf8_decode($data1[32]),
                "",
                utf8_decode($data1[33]),
                "",
                utf8_decode($data1[34]),
            ));

        }

    $pdf->Output();

?>