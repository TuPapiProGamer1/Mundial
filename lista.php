<?php
    include "data.php";
    include "combos.php";

    $titlePage = "Resumen";

    // Obtener datos del formulario
    $idMundial = isset($_POST["idSedes"]) ? $_POST["idSedes"] : "";
    $idPestaña = isset($_POST["nombre"]) ? $_POST["nombre"] : "";

    // Obtener nombre del mundial
    $nombreMundial = "";
    foreach($listaMundiales as $mundial){
        if ($mundial["idMundial"] == $idMundial){
            $nombreMundial = $mundial["nombre"];
        }
    }

    // Obtener nombre de la pestaña
    $nombrePestaña = "";
    foreach($listaPestaña as $pestaña){
        if ($pestaña["idPestaña"] == $idPestaña){
            $nombrePestaña = $pestaña["nombre"];
        }
    }

    // Filtrar sedes por mundial
    $sedesFiltradas = array();
    foreach($listaSedes as $sede){
        if ($sede["mundial"] == $nombreMundial){
            $sedesFiltradas[] = $sede;
        }
    }
?>

<html>
    <head>
        <title><?php echo $titlePage ?></title>
        <style>
            body{
                margin:0px;
                border:0px;
                background: #d7d7d7;
            }
            *{
                box-sizing: border-box;
            }
            .frm{
                position: relative;                
                width:500px;
                min-height:300px;
                height:auto;
                margin:100px auto;
                background: #ffffff;
                border-radius:10px;
                padding:50px 40px 40px 40px;
                box-shadow:0px 0px 10px rgba(0,0,0,0.4);
            }
            .title{
                position: absolute;
                top:-35px;
                left:50px;
                width:300px;
                height:70px;
                background: #444444;
                border-radius:10px;
                font-family:arial;
                font-size:14px;
                text-align: left;
                line-height: 20px;
                padding-top:25px;
                padding-left:80px;
                color:#ffffff;
            }
            .title .ico{
                position:absolute;
                top:10px;
                left:10px;
                width:50px;
                height:50px;
                background: #ddeeaa;
                border-radius:50%;
            }
            .ctn-control{
                width:100%;
                margin-top:10px;
                text-align: left
            }
            .text{
                font-family:arial;
                font-size:14px;
                text-align: left;
                line-height: 20px;
                color:#000000;
            }
            input{
                width:100%;
                height:40px;
                border:2px solid #d7d7d7;
                border-radius:10px 5px 10px 5px;
                padding-left:10px;
                outline: none;
            }
            input:focus{
                background: #f7f7f7;
                border-bottom:2px solid #444444;
            }
            select{
                width:100%;
                height:40px;
                border:2px solid #d7d7d7;
                border-radius:10px 5px 10px 5px;
                outline: none;
                padding-left:10px;
            }
            select:focus{
                background: #f7f7f7;
                border-bottom:2px solid #444444;
            }
            input[type=submit]{
                cursor:pointer;
            }
            input[type=submit]:hover{
                background: #444444;
                color:#ffffff;
            }

            .x-1{
                float:left;
                width:100%;
            }
            .x-2{
                float:left;
                width:50%;
            }
            .clear{
                clear:both;
            }

            .card{
                position: relative;
                width:100%;
                min-height:70px;
                height:auto;
                margin-bottom:10px;
                background: rgba(0,0,0,0.1);
                border-radius:10px;
                box-shadow:0px 0px 2px rgba(0,0,0,0.4);
            }
            .card .pic{
                position:absolute;
                top:10px;
                left:10px;
                width:50px;
                height:50px;
                border-radius:10px;
                background: #ddeeaa;
            }            
            .card .card-title{
                font-family:arial;
                font-size:14px;
                font-weight: bold;
                line-height:20px;
                padding-top:10px;
                padding-left:70px;
            }
            .card .card-subtitle{
                font-family:arial;
                font-size:12px;
                font-weight: normal;
                line-height:20px;
                padding-left:70px;
            }
            .card .card-total{
                position:absolute;
                top:10px;
                right:10px;
                font-family:arial;
                font-size:14px;
                font-weight: bold;
                line-height:20px;
            }
            .subtitle {
                font-family:arial;
                font-size:16px;
                font-weight: bold;
                margin:15px 0 10px 0;
                padding-bottom:5px;
                border-bottom:1px solid #dddddd;
            }
            .btn-back {
                display: inline-block;
                padding: 10px 20px;
                background: #444444;
                color: #ffffff;
                text-decoration: none;
                border-radius: 5px;
                font-family: arial;
                margin-top: 20px;
            }
            .sede-info {
                margin-bottom: 5px;
                padding: 5px 0;
                border-bottom: 1px dotted #e0e0e0;
            }
        </style>
    </head>
    <body>
        <div class="frm">
            <div class="title"><div class="ico"></div><?php echo $titlePage ?></div>
            
            <!-- Resumen del Mundial -->
            <div class="x-1">
                <div class='card'>
                    <div class='pic'></div>
                    <div class='card-title'><?php echo $nombreMundial ?></div>
                    <div class='card-subtitle'><?php echo $nombrePestaña ?></div>
                </div>
            </div>
            
            <!-- Listado de Sedes -->
            <?php if($idPestaña == "1"): ?>
                <div class="subtitle">Listado de Sedes</div>
                
                <?php if(count(value: $sedesFiltradas) > 0): ?>
                    <?php foreach($sedesFiltradas as $sede): ?>
                        <div class="sede-info">
                            <div class="card-title" style="display: inline-block; padding-left: 0;"><?php echo $sede["nombre"] ?></div>
                            <div class="card-total">Capacidad: <?php echo number_format(num: $sede["capacidad"]) ?> personas</div>
                            <div class="clear"></div>
                        </div>
                    <?php endforeach; ?>
                
                    
                    <!-- Resumen Estadístico -->
                    <div class="subtitle">Estadísticas</div>
                    <?php 
                        $totalEstadios = count(value: $sedesFiltradas);
                        $totalCapacidad = 0;
                        $mayorCapacidad = 0;
                        $nombreMayorCapacidad = "";
                        
                        foreach($sedesFiltradas as $sede) {
                            $totalCapacidad += (int)$sede["capacidad"];
                            if((int)$sede["capacidad"] > $mayorCapacidad) {
                                $mayorCapacidad = (int)$sede["capacidad"];
                                $nombreMayorCapacidad = $sede["nombre"];
                            }
                        }
                        $capacidadPromedio = $totalCapacidad / $totalEstadios;
                    ?>
                    <div class="sede-info">Total de estadios: <b><?php echo $totalEstadios ?></b></div>
                    <div class="sede-info">Capacidad total: <b><?php echo number_format(num: $totalCapacidad) ?> personas</b></div>
                    <div class="sede-info">Capacidad promedio: <b><?php echo number_format(num: $capacidadPromedio, decimals: 0) ?> personas</b></div>
                    <div class="sede-info">Estadio con mayor capacidad: <b><?php echo $nombreMayorCapacidad ?> (<?php echo number_format(num: $mayorCapacidad) ?> personas)</b></div>
                    
                <?php else: ?>
                    <div class="text">No se encontraron sedes para este mundial.</div>
                <?php endif; ?>
                
                <?php elseif($idPestaña == "2"): ?>
                <div class="subtitle">Información de Campeón/Subcampeón</div>
                <?php 
                $campeonInfo = null;
                // Asumiendo que $nombreMundial está definido anteriormente en tu código
                foreach($listaCampeones as $campeon) {
                    if($campeon["mundial"] == $nombreMundial) {
                        $campeonInfo = $campeon;
                        break;
                    }
                }
                
                if($campeonInfo): ?>
                    <div class="x-1">
                        <div class='card'>
                            <div class='pic'></div>
                            <div class='card-title'>Campeón: <?php echo $campeonInfo["campeon"] ?></div>
                            <div class='card-subtitle'>Subcampeón: <?php echo $campeonInfo["subcampeon"] ?></div>
                            <div class='card-total'>Resultado: <?php echo $campeonInfo["resultado_final"] ?></div>
                        </div>
                    </div>
                    
                    <div class="subtitle">Detalles del Torneo</div>
                    <div class="sede-info">Tercer lugar: <b><?php echo $campeonInfo["tercer_lugar"] ?></b></div>
                    <div class="sede-info">Goleador: <b><?php echo $campeonInfo["goleador"] ?> (<?php echo $campeonInfo["goles_goleador"] ?> goles)</b></div>
                    <div class="sede-info">Mejor jugador: <b><?php echo $campeonInfo["mejor_jugador"] ?></b></div>
                <?php else: ?>
                    <div class="text">No se encontró información de campeones para este mundial.</div>
                <?php endif; 
             endif; ?>
            <div class="clear"></div>
            <a href="index.php" class="btn-back">Volver al inicio</a>
        </div>
    </body>
</html>