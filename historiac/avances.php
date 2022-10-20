<?php
session_start();

//Recibimos el nombre del paciente directo desde pacientes.php
$nombre_px = $_GET['nombre'];
$_SESSION['nombre_px'] = $nombre_px;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>NutriPAES - Avances del Paciente</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/general/nav.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="javascript: history.go(-1)">Volver</a></li>
        </ul>
    </nav>
    <div class="text-center">
        <div>
            <h2>Avances del paciente según registros</h2>
            <input type="hidden" id="nombre_px" name="nombre_px" placeholder="Escribe el nombre del paciente" style="width:250px" value="<?php echo $_SESSION['nombre_px']; ?>">
        </div>
        <div class="btn-group" role="group" aria-label="">
            <button id="peso" name="peso" type="button" class="btn btn-primary">Peso</button>
            <button id="estatura" name="estatura" type="button" class="btn btn-primary">Estatura</button>
            <button id="imc" name="imc" type="button" class="btn btn-primary">IMC</button>
            <button id="grasa" name="grasa" type="button" class="btn btn-primary">Grasa Corporal</button>
            <button id="icc" name="icc" type="button" class="btn btn-primary">ICC</button>
            <button id="cintura" name="cintura" type="button" class="btn btn-primary">Cintura</button>
            <button id="cadera" name="cadera" type="button" class="btn btn-primary">Cadera</button>
        </div>
    </div>
    <br>

    <!-- En este div se muestran los gráficos -->
    <div id="contenedor" style="min-width: 320px; max-width: 800px; height: 400px; margin: 0 auto"></div>

    <script type="text/javascript" src="../jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- ARCHIVOS NECESARIOS PARA CREAR GRÁFICOS CON HIGHCHARTS -->
    <script src="../pluggins/highcharts/code/highcharts.js"></script>
    <script src="../pluggins/highcharts/code/modules/exporting.js"></script>
    <script src="../pluggins/highcharts/code/modules/export-data.js"></script>
    
    <script type="text/javascript">
        $("#peso").click(function(){
            var param ={ valor: "peso" }
            $.ajax({
                url:"../conex/graficos.php",
                data: param,
                type:"get",
                dataType:"json",
                success:function(data){
                    options.series[0].data = data;
                    chart = new Highcharts.Chart(options);
                }
            })

            options = {
                chart: {
                    renderTo: 'contenedor',
                    type: 'column'
                },
            
                title: {
                    text: 'Valoración del Paciente - Peso'
                },
            
                xAxis: {
                    type: 'Peso'
                },
            
                yAxis: {
                    title: {
                        text: 'Peso en Kg'
                    },
                    plotLines: [{value: 0,width: 1,color: '#808080'}]
                },

                plotOptions: {
                    series:{
                        borderWidth:1,
                        dataLabels:{
                            enabled:false,
                            format:'{point.y:.0f}'
                        }
                    }
                },

                tooltip: {
                    valueSuffix:' kg'
                },

                series: [{
                    name: "Avances",
                    colorByPoint:true,
                    data:[],
                }]
            }
        });

        $("#estatura").click(function(){
            var param ={ valor: "estatura" }
            $.ajax({
                url:"../conex/graficos.php",
                data: param,
                type:"get",
                dataType:"json",
                success:function(data){
                    options.series[0].data = data;
                    chart = new Highcharts.Chart(options);
                }
            })

            options = {
                chart: {
                    renderTo: 'contenedor',
                    type: 'column'
                },
            
                title: {
                    text: 'Valoración del Paciente - Estatura'
                },
            
                xAxis: {
                    type: 'Estatura'
                },
            
                yAxis: {
                    title: {
                        text: 'Talla en metros'
                    },
                    plotLines: [{value: 0,width: 1,color: '#808080'}]
                },

                plotOptions: {
                    series:{
                        borderWidth:1,
                        dataLabels:{
                            enabled:false,
                            format:'{point.y:.0f}'
                        }
                    }
                },

                tooltip: {
                    valueSuffix:' m'
                },

                series: [{
                    name: "Avances",
                    colorByPoint:true,
                    data:[],
                }]
            }
        });

        $("#imc").click(function(){
            var param ={ valor: "imc" }
            $.ajax({
                url:"../conex/graficos.php",
                data: param,
                type:"get",
                dataType:"json",
                success:function(data){
                    options.series[0].data = data;
                    chart = new Highcharts.Chart(options);
                }
            })

            options = {
                chart: {
                    renderTo: 'contenedor',
                    type: 'column'
                },
            
                title: {
                    text: 'Valoración del Paciente - IMC'
                },
            
                xAxis: {
                    type: 'IMC'
                },
            
                yAxis: {
                    title: {
                        text: 'IMC kg/m²'
                    },
                    plotLines: [{value: 0,width: 1,color: '#808080'}]
                },

                plotOptions: {
                    series:{
                        borderWidth:1,
                        dataLabels:{
                            enabled:false,
                            format:'{point.y:.0f}'
                        }
                    }
                },

                tooltip: {
                    valueSuffix:' kg/m²'
                },

                series: [{
                    name: "Avances",
                    colorByPoint:true,
                    data:[],
                }]
            }
        });

        $("#grasa").click(function(){
            var param ={ valor: "grasa" }
            $.ajax({
                url:"../conex/graficos.php",
                data: param,
                type:"get",
                dataType:"json",
                success:function(data){
                    options.series[0].data = data;
                    chart = new Highcharts.Chart(options);
                }
            })

            options = {
                chart: {
                    renderTo: 'contenedor',
                    type: 'column'
                },
            
                title: {
                    text: 'Valoración del Paciente - Grasa corporal'
                },
            
                xAxis: {
                    type: 'Grasa'
                },
            
                yAxis: {
                    title: {
                        text: 'Grasa en %'
                    },
                    plotLines: [{value: 0,width: 1,color: '#808080'}]
                },

                plotOptions: {
                    series:{
                        borderWidth:1,
                        dataLabels:{
                            enabled:false,
                            format:'{point.y:.0f}'
                        }
                    }
                },

                tooltip: {
                    valueSuffix:' %'
                },

                series: [{
                    name: "Avances",
                    colorByPoint:true,
                    data:[],
                }]
            }
        });

        $("#icc").click(function(){
            var param ={ valor: "icc" }
            $.ajax({
                url:"../conex/graficos.php",
                data: param,
                type:"get",
                dataType:"json",
                success:function(data){
                    options.series[0].data = data;
                    chart = new Highcharts.Chart(options);
                }
            })

            options = {
                chart: {
                    renderTo: 'contenedor',
                    type: 'column'
                },
            
                title: {
                    text: 'Valoración del Paciente - ICC'
                },
            
                xAxis: {
                    type: 'ICC'
                },
            
                yAxis: {
                    title: {
                        text: 'Índice Cintura - Cadera'
                    },
                    plotLines: [{value: 0,width: 1,color: '#808080'}]
                },

                plotOptions: {
                    series:{
                        borderWidth:1,
                        dataLabels:{
                            enabled:false,
                            format:'{point.y:.0f}'
                        }
                    }
                },

                series: [{
                    name: "Avances",
                    colorByPoint:true,
                    data:[],
                }]
            }
        });

        $("#cintura").click(function(){
            var param ={ valor: "cintura" }
            $.ajax({
                url:"../conex/graficos.php",
                data: param,
                type:"get",
                dataType:"json",
                success:function(data){
                    options.series[0].data = data;
                    chart = new Highcharts.Chart(options);
                }
            })

            options = {
                chart: {
                    renderTo: 'contenedor',
                    type: 'column'
                },
            
                title: {
                    text: 'Valoración del Paciente - Cintura'
                },
            
                xAxis: {
                    type: 'Cintura'
                },
            
                yAxis: {
                    title: {
                        text: 'Cintura en cm'
                    },
                    plotLines: [{value: 0,width: 1,color: '#808080'}]
                },

                plotOptions: {
                    series:{
                        borderWidth:1,
                        dataLabels:{
                            enabled:false,
                            format:'{point.y:.0f}'
                        }
                    }
                },

                tooltip: {
                    valueSuffix:' Cm'
                },

                series: [{
                    name: "Avances",
                    colorByPoint:true,
                    data:[],
                }]
            }
        });

        $("#cadera").click(function(){
            var param ={ valor: "cadera" }
            $.ajax({
                url:"../conex/graficos.php",
                data: param,
                type:"get",
                dataType:"json",
                success:function(data){
                    options.series[0].data = data;
                    chart = new Highcharts.Chart(options);
                }
            })

            options = {
                chart: {
                    renderTo: 'contenedor',
                    type: 'column'
                },
            
                title: {
                    text: 'Valoración del Paciente - Cadera'
                },
            
                xAxis: {
                    type: 'Cadera'
                },
            
                yAxis: {
                    title: {
                        text: 'Cadera en cm'
                    },
                    plotLines: [{value: 0,width: 1,color: '#808080'}]
                },

                plotOptions: {
                    series:{
                        borderWidth:1,
                        dataLabels:{
                            enabled:false,
                            format:'{point.y:.0f}'
                        }
                    }
                },

                tooltip: {
                    valueSuffix:' Cm'
                },

                series: [{
                    name: "Avances",
                    colorByPoint:true,
                    data:[],
                }]
            }
        });

    </script>
    
</body>
</html>