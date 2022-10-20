<?php
session_start();

if(isset($_POST['guardar_menu'])){
    $con = mysqli_connect("localhost", "root", "", "registro");

    $usuario_r = $_POST['usuario_db'];
    
    $valores = $_POST['equivalentes'];
    $hoy = $_POST['hoy'];
    $nombre_menu = $_POST['n_menu'] ? $_POST['n_menu'] : '';
    $n_descripcion = $_POST['n_descripcion'] ? $_POST['n_descripcion'] : '';

    $desayuno_lunes = $_POST['desayuno_lunes'] ? $_POST['desayuno_lunes'] : '';
    $colacion1_lunes = $_POST['colacion1_lunes'] ? $_POST['colacion1_lunes'] : '';
    $comida_lunes = $_POST['comida_lunes'] ? $_POST['comida_lunes'] : '';
    $colacion2_lunes = $_POST['colacion2_lunes'] ? $_POST['colacion2_lunes'] : '';
    $cena_lunes = $_POST['cena_lunes'] ? $_POST['cena_lunes'] : '';

    $desayuno_martes = $_POST['desayuno_martes'] ? $_POST['desayuno_martes'] : '';
    $colacion1_martes = $_POST['colacion1_martes'] ? $_POST['colacion1_martes'] : '';
    $comida_martes = $_POST['comida_martes'] ? $_POST['comida_martes'] : '';
    $colacion2_martes = $_POST['colacion2_martes'] ? $_POST['colacion2_martes'] : '';
    $cena_martes = $_POST['cena_martes'] ? $_POST['cena_martes'] : '';

    $desayuno_miercoles = $_POST['desayuno_miercoles'] ? $_POST['desayuno_miercoles'] : '';
    $colacion1_miercoles = $_POST['colacion1_miercoles'] ? $_POST['colacion1_miercoles'] : '';
    $comida_miercoles = $_POST['comida_miercoles'] ? $_POST['comida_miercoles'] : '';
    $colacion2_miercoles = $_POST['colacion2_miercoles'] ? $_POST['colacion2_miercoles'] : '';
    $cena_miercoles = $_POST['cena_miercoles'] ? $_POST['cena_miercoles'] : '';

    $desayuno_jueves = $_POST['desayuno_jueves'] ? $_POST['desayuno_jueves'] : '';
    $colacion1_jueves = $_POST['colacion1_jueves'] ? $_POST['colacion1_jueves'] : '';
    $comida_jueves = $_POST['comida_jueves'] ? $_POST['comida_jueves'] : '';
    $colacion2_jueves = $_POST['colacion2_jueves'] ? $_POST['colacion2_jueves'] : '';
    $cena_jueves = $_POST['cena_jueves'] ? $_POST['cena_jueves'] : '';

    $desayuno_viernes = $_POST['desayuno_viernes'] ? $_POST['desayuno_viernes'] : '';
    $colacion1_viernes = $_POST['colacion1_viernes'] ? $_POST['colacion1_viernes'] : '';
    $comida_viernes = $_POST['comida_viernes'] ? $_POST['comida_viernes'] : '';
    $colacion2_viernes = $_POST['colacion2_viernes'] ? $_POST['colacion2_viernes'] : '';
    $cena_viernes = $_POST['cena_viernes'] ? $_POST['cena_viernes'] : '';

    $desayuno_sabado = $_POST['desayuno_sabado'] ? $_POST['desayuno_sabado'] : '';
    $colacion1_sabado = $_POST['colacion1_sabado'] ? $_POST['colacion1_sabado'] : '';
    $comida_sabado = $_POST['comida_sabado'] ? $_POST['comida_sabado'] : '';
    $colacion2_sabado = $_POST['colacion2_sabado'] ? $_POST['colacion2_sabado'] : '';
    $cena_sabado = $_POST['cena_sabado'] ? $_POST['cena_sabado'] : '';

    $desayuno_domingo = $_POST['desayuno_domingo'] ? $_POST['desayuno_domingo'] : '';
    $colacion1_domingo = $_POST['colacion1_domingo'] ? $_POST['colacion1_domingo'] : '';
    $comida_domingo = $_POST['comida_domingo'] ? $_POST['comida_domingo'] : '';
    $colacion2_domingo = $_POST['colacion2_domingo'] ? $_POST['colacion2_domingo'] : '';
    $cena_domingo = $_POST['cena_domingo'] ? $_POST['cena_domingo'] : '';

    
    $result = "INSERT INTO guardar_menus(id,n_usuario,nombre_menu,descripcion,fecha,
    desayuno_lunes,colacion1_lunes,comida_lunes,colacion2_lunes,cena_lunes,
    desayuno_martes,colacion1_martes,comida_martes,colacion2_martes,cena_martes,
    desayuno_miercoles,colacion1_miercoles,comida_miercoles,colacion2_miercoles,cena_miercoles,
    desayuno_jueves,colacion1_jueves,comida_jueves,colacion2_jueves,cena_jueves,
    desayuno_viernes,colacion1_viernes,comida_viernes,colacion2_viernes,cena_viernes,
    desayuno_sabado,colacion1_sabado,comida_sabado,colacion2_sabado,cena_sabado,
    desayuno_domingo,colacion1_domingo,comida_domingo,colacion2_domingo,cena_domingo,equivalentes)
    VALUES('','$usuario_r','$nombre_menu','$n_descripcion','$hoy',
    '$desayuno_lunes','$colacion1_lunes','$comida_lunes','$colacion2_lunes','$cena_lunes',
    '$desayuno_martes','$colacion1_martes','$comida_martes','$colacion2_martes','$cena_martes',
    '$desayuno_miercoles','$colacion1_miercoles','$comida_miercoles','$colacion2_miercoles','$cena_miercoles',
    '$desayuno_jueves','$colacion1_jueves','$comida_jueves','$colacion2_jueves','$cena_jueves',
    '$desayuno_viernes','$colacion1_viernes','$comida_viernes','$colacion2_viernes','$cena_viernes',
    '$desayuno_sabado','$colacion1_sabado','$comida_sabado','$colacion2_sabado','$cena_sabado',
    '$desayuno_domingo','$colacion1_domingo','$comida_domingo','$colacion2_domingo','$cena_domingo','$valores')";
    
    //Ejecutar la query
    $ejecutar = mysqli_query($con, $result) or die(mysqli_error() . " ($result)");  
    //Si logramos guardar los datos del menú
    if($user=1){
        header("location: menus.php");
    }
}else if(isset($_POST['btnPdf'])){
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

    $data = ['{"dia":"Lunes", "desayuno":"'.$_POST['desayuno_lunes'].'", "colacion1":"'.$_POST['colacion1_lunes'].'", "comida":"'.$_POST['comida_lunes'].'", "colacion2":"'.$_POST['colacion2_lunes'].'", "cena":"'.$_POST['cena_lunes'].'"},
    {"dia":"Martes", "desayuno":"'.$_POST['desayuno_martes'].'", "colacion1":"'.$_POST['colacion1_martes'].'", "comida":"'.$_POST['comida_martes'].'", "colacion2":"'.$_POST['colacion2_martes'].'", "cena":"'.$_POST['cena_martes'].'"},
    {"dia":"Miércoles", "desayuno":"'.$_POST['desayuno_miercoles'].'", "colacion1":"'.$_POST['colacion1_miercoles'].'", "comida":"'.$_POST['comida_miercoles'].'", "colacion2":"'.$_POST['colacion2_miercoles'].'", "cena":"'.$_POST['cena_miercoles'].'"},
    {"dia":"Jueves", "desayuno":"'.$_POST['desayuno_jueves'].'", "colacion1":"'.$_POST['colacion1_jueves'].'", "comida":"'.$_POST['comida_jueves'].'", "colacion2":"'.$_POST['colacion2_jueves'].'", "cena":"'.$_POST['cena_jueves'].'"},
    {"dia":"Viernes", "desayuno":"'.$_POST['desayuno_viernes'].'", "colacion1":"'.$_POST['colacion1_viernes'].'", "comida":"'.$_POST['comida_viernes'].'", "colacion2":"'.$_POST['colacion2_viernes'].'", "cena":"'.$_POST['cena_viernes'].'"},
    {"dia":"Sábado", "desayuno":"'.$_POST['desayuno_sabado'].'", "colacion1":"'.$_POST['colacion1_sabado'].'", "comida":"'.$_POST['comida_sabado'].'", "colacion2":"'.$_POST['colacion2_sabado'].'", "cena":"'.$_POST['cena_sabado'].'"},
    {"dia":"Domingo", "desayuno":"'.$_POST['desayuno_domingo'].'", "colacion1":"'.$_POST['colacion1_domingo'].'", "comida":"'.$_POST['comida_domingo'].'", "colacion2":"'.$_POST['colacion2_domingo'].'", "cena":"'.$_POST['cena_domingo'].'"},'];

    //set width for each column (6 columns)
    $pdf->SetWidths(Array(16,60,.5,25,.5,60,.5,25,.5,60));

    foreach ($data as $dat) {
        //set alignment
        $pdf->SetAligns(Array('C','C','J','C','J','C','J','C','J','C'));

        //set line height
        $pdf->SetLineHeight(5);

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
            utf8_decode($_POST['desayuno_lunes']),
            "",
            utf8_decode($_POST['colacion1_lunes']),
            "",
            utf8_decode($_POST['comida_lunes']),
            "",
            utf8_decode($_POST['colacion2_lunes']),
            "",
            utf8_decode($_POST['cena_lunes']),
        ));
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Row(Array(
            "Martes",
            utf8_decode($_POST['desayuno_martes']),
            "",
            utf8_decode($_POST['colacion1_martes']),
            "",
            utf8_decode($_POST['comida_martes']),
            "",
            utf8_decode($_POST['colacion2_martes']),
            "",
            utf8_decode($_POST['cena_martes']),
        ));
        $pdf->SetFillColor(230, 230, 230);
        $pdf->Row(Array(
            utf8_decode("Miércoles"),
            utf8_decode($_POST['desayuno_miercoles']),
            "",
            utf8_decode($_POST['colacion1_miercoles']),
            "",
            utf8_decode($_POST['comida_miercoles']),
            "",
            utf8_decode($_POST['colacion2_miercoles']),
            "",
            utf8_decode($_POST['cena_miercoles']),
        ));
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Row(Array(
            "Jueves",
            utf8_decode($_POST['desayuno_jueves']),
            "",
            utf8_decode($_POST['colacion1_jueves']),
            "",
            utf8_decode($_POST['comida_jueves']),
            "",
            utf8_decode($_POST['colacion2_jueves']),
            "",
            utf8_decode($_POST['cena_jueves']),
        ));
        $pdf->SetFillColor(230, 230, 230);
        $pdf->Row(Array(
            "Viernes",
            utf8_decode($_POST['desayuno_viernes']),
            "",
            utf8_decode($_POST['colacion1_viernes']),
            "",
            utf8_decode($_POST['comida_viernes']),
            "",
            utf8_decode($_POST['colacion2_viernes']),
            "",
            utf8_decode($_POST['cena_viernes']),
        ));
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Row(Array(
            utf8_decode("Sábado"),
            utf8_decode($_POST['desayuno_sabado']),
            "",
            utf8_decode($_POST['colacion1_sabado']),
            "",
            utf8_decode($_POST['comida_sabado']),
            "",
            utf8_decode($_POST['colacion2_sabado']),
            "",
            utf8_decode($_POST['cena_sabado']),
        ));
        $pdf->SetFillColor(230, 230, 230);
        $pdf->Row(Array(
            "Domingo",
            utf8_decode($_POST['desayuno_domingo']),
            "",
            utf8_decode($_POST['colacion1_domingo']),
            "",
            utf8_decode($_POST['comida_domingo']),
            "",
            utf8_decode($_POST['colacion2_domingo']),
            "",
            utf8_decode($_POST['cena_domingo']),
        ));

    }

$pdf->Output('I','Menú Semanal.pdf', true);
} 
?>