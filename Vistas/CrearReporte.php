<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Crear Reporte</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">
    <link rel="stylesheet" href="../Assets/css/tabla.css">
</head>
<body>
<div class="menu">
    <nav>
        <ul>
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li>
        </ul>
        <ul>       
            <li>Inicio</li>
            <li>Crear Reporte</li>
            <li>Descripción de Reporte</li>
            <li>Listado de Reportes</li>
        </ul>
        <ul>
        <li><img class ="imagen" src="../Assets/img/imagen1.png" alt=""></li>
        </ul>
    </nav>
</div>
<div class="container3">
    <!--
    <p>N° de Partidos: <input type="text"></p>
        <select id="arbitro">
            <option value="0">Seleccione el partido</option>
            <option value="2">MIG_VS_RIO_26-11-2022</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <button onclick="ver()">Buscar</button> -->
       
        <?php 
            if (!empty($data_select[T_PARTIDO])) {
                echo "<form method='post' action= '' >"; 
                //echo "<form method='post' action= '". BASE_DIR."/Reporte/generar '".">";                 
                echo "<select name='partido' >";
                echo "<option value='0'>Seleccione el partido</option>";
                foreach ($data_select[T_PARTIDO] as $dato) {
                    //$dato1=$equipo1->setID(strval($dato[PART_EQP1]));
                    //$dato2=$equipo2->setID(strval($dato[PART_EQP2]));
                    echo "<option value=".$dato[PART_ID].">".$dato[PART_NOM]."</option>";
                   
                    //echo "<h1>" . $dato[PART_EQP1] . "</h1>";
                    //echo "<h1>" . $dato[PART_EQP2] . "</h1>";
                }
                echo "</select>";
                echo "<button type='submit'>Generar descripcion</button>";
                echo "</form";
            }

            /*
             <!--<form method="post" action="" >
            <h1>Reporte de partido</h1>
            

            <p>id partido: </p>
            <input name="partido" id="partido" type="text" value="" >
            <button type="submit">Generar descripcion</button>

<input type="datetime" name="" id="">
       
</div>
</form> 
-->
            */
        ?>

       
        <?php 
           /* if (!empty($data2[T_JUGADOR])) {
                echo "<h1>EQUIPO 1 </h1>";
                foreach ($data2[T_JUGADOR] as $dato) {
                    echo "<p>" . $dato[JUG_ID] . "</p>";
                    
                }    

                echo "<h1>EQUIPO 2 </h1>";
                foreach ($data3[T_JUGADOR] as $dato) {
                    echo "<p>" . $dato[JUG_ID] . "</p>";
                    
                }   
            }*/
        ?>
        
<!-- inicio tabla equipo1 -->
<div>
    
    <?php
        
        if(!empty($data2[T_JUGADOR])){
            echo "<h1>EQUIPO 1 </h1>";
            echo "<form action='".BASE_DIR."/Reporte/crearReporte"."' method='post' id='form_reporte'>";
            $reporte='REPORT_'.$nombrepartido;
            $IDpart = $IDpartido;
            echo  "ID Reporte: "."<input type='text' name='".REPORT_ID."' id='' value='".$reporte."'>";
            echo "<p>Nombre partido: ".$nombrepartido."</p>";
            echo "ID Arbitro: "."<input type='text' name='".SANCION_ARB."' id='' value='".$idArb."'>";
            $contador=0;
            foreach ($data2[T_JUGADOR] as $dato){
                $contador++;
            }

            echo "<input type='hidden' name='datos1' id='' value='".$contador."' >";
            echo "<input type='hidden' name='".PART_ID."' id='' value='".$IDpart."' >";
            
           
            echo "<table cellspacing=0>";
            echo "<thead class='theader'";
               echo "<tr>";
                    echo"<th>Jugador</th>";
                    echo"<th>Nombre</th>";
                    echo"<th>Apellido</th>";
                    echo"<th>Tarjetas Amarillas</th>";
                    echo"<th>Tarjetas Rojas</th>";
                    echo"<th>Motivo</th>";
                    echo"<th>Dias Penalizacion</th>";
                    echo"<th>Precio</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $i=1;
                    foreach ($data2[T_JUGADOR] as $dato) {
                        
                        echo "<tr>";
                        echo "<td>" . $dato[JUG_ID] ."<input type='hidden' name='e1-id".$i."' id='' value='".$dato[JUG_ID]."' >". "</td>";
                        echo "<td>" . "</td>";
                        echo "<td>" . "</td>";
                        echo "<td>" ."<input type='number' name='e1-amarilla".$i."' id=''>". "</td>";
                        echo "<td>" ."<input type='number' name='e1-roja".$i."' id=''>". "</td>";
                        //echo "<td>" ."<input style='height=30px' type='text' name='e1-motv".$i."' id=''>". "</td>";
                        echo "<td>" ."<textarea style='height: 100px; border:none;' form='form_reporte' id='' name='e1-motv".$i."' rows='2' cols='20'></textArea>". "</td>";
                        
                        echo "<td>" ."<input type='number' name='e1-dias".$i."' id=''>". "</td>";
                        echo "<td>" ."<input type='number' name='e1-precio".$i."' id='' >". "</td>";
                                   
                        //echo "<td><a class='btn btn-prestar ' href='" . BASE_DIR . "Inventario/datosInventario&id=" . $dato[I_ID] . "'><span data-tooltip='Visualizar'><p class='fas fa-eye fa-lg'></p></span></a></td>";
                        //echo "<td><a class='btn btn-modificar' href='" . BASE_DIR . "Inventario/modificar&id=" . $dato[I_ID] . "'><span data-tooltip='Modificar'><p class='fas fa-pen-alt fa-lg'></p></span></a></td>";
                       
                       echo "</tr>";
                    
                       $i++;
                    }
                echo "</tbody>";
                echo "</table>";  
                
                
        }
        else {
            echo "<h1>No hay datos</h1>";
        }
    


                    
?>

</div>
<!-- fin tabla equipo 1-->

<!-- Inicio tabla equipo 2 -->
    <?php
        echo "<h1>EQUIPO 2 </h1>";

        if(!empty($data3[T_JUGADOR])){
            echo "<table cellspacing=0 class='tb'>";
            echo "<thead class='theader'";
               echo "<tr>";
                    echo"<th>Juagador</th>";
                    echo"<th>Nombre</th>";
                    echo"<th>Apellido</th>";
                    echo"<th>Tarjetas Amarillas</th>";
                    echo"<th>Tarjetas Rojas</th>";
                    echo"<th>Motivo</th>";
                    echo"<th>Dias Penalizacion</th>";
                    echo"<th>Precio</th>";
                    //echo"<th>Faltas</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<form>";
                echo "<tbody>";
                $i=1;
                    foreach ($data3[T_JUGADOR] as $dato) {
                        echo "<tr>";
                        echo "<td>" . $dato[JUG_ID] ."<input type='hidden' name='e1-id".$i."' id='' value='".$dato[JUG_ID]."' >". "</td>";
                        echo "<td>" . "</td>";
                        echo "<td>" . "</td>";
                        echo "<td>" ."<input type='number' name='e1-amarilla".$i."' id=''>". "</td>";
                        echo "<td>" ."<input type='number' name='e1-roja".$i."' id=''>". "</td>";
                        //echo "<td>" ."<input style='height=30px' type='text' name='e1-motv".$i."' id=''>". "</td>";
                        echo "<td>" ."<textarea style='height: 100px; border:none;' form='form_reporte' id='' name='e1-motv".$i."' rows='2' cols='20'></textArea>". "</td>";
                        
                        echo "<td>" ."<input type='number' name='e1-dias".$i."' id=''>". "</td>";
                        echo "<td>" ."<input type='number' name='e1-precio".$i."' id='' >". "</td>";
                                   
                        //echo "<td><a class='btn btn-prestar ' href='" . BASE_DIR . "Inventario/datosInventario&id=" . $dato[I_ID] . "'><span data-tooltip='Visualizar'><p class='fas fa-eye fa-lg'></p></span></a></td>";
                        //echo "<td><a class='btn btn-modificar' href='" . BASE_DIR . "Inventario/modificar&id=" . $dato[I_ID] . "'><span data-tooltip='Modificar'><p class='fas fa-pen-alt fa-lg'></p></span></a></td>";
                       
                       echo "</tr>";
                    
                       $i++;
                    }
                    
                echo "</tbody>";
                echo "</table>";  
                
        }
        else {
            echo "<h1>No hay datos</h1>";
        }
        echo "<button type='submit'>Crear Reporte</button>";
        echo "</form>";


                    
?>
<!-- Fin tabla equipo 2 -->

<?php
/*
<div class="">
    <textarea name="Comentarios" id="" cols="40" rows="10"></textarea>
</div>
<div class="container3">
  
    <p>Equipo 2: <input id="equipo2" type="text"></p>
</div>
<div class="">
    <textarea name="Comentarios" id="" cols="40" rows="10"></textarea>
</div>
<div class="container-resultados">
<img class="logo-equipo" src="../Assets/img/portugal.png" alt="">
    <input type="text" name="" id="">
    <h1> - </h1>
    <input type="text">
    <img class="logo-equipo" src="../Assets/img/japon.png" alt="">
</div>
<div class="container3">
<button class="boton-enviar">
    <p>Enviar</p>
</button>
</div>
*/ ?>


<script src="../Assets/js/select_reporte_equipo.js"></script>
</body>
</html>