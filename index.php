<?php
    include "data.php";
    include "combos.php";

    $titlePage = "Mundiales";

    $cboMundiales = Cbo(lista: $listaMundiales, cboName: "nombre", cboValue: "idMundial", cboText: "nombre");
    
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
                width:400px;
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
        </style>
    </head>
    <body>
        <div class="frm">
            <div class="title"><div class="ico"></div><?php echo $titlePage ?></div>
            <form action="sedes.php" method="POST">
                <div class="x-1">
                    <div class="ctn-control">
                        <div class="text">Seleccionar Mundial</div>
                        <?php echo $cboMundiales ?>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="ctn-control">
                    <input type="submit" value="Continuar..." />
                </div>
            </form>
        </div>
    </body>
</html>