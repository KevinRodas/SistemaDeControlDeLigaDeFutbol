<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Descripción de Reporte</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">
    <link rel="stylesheet" href="../Assets/css/administrador.css">
    <link rel="stylesheet" href="../Assets/css/formulario.css">
    <link rel="stylesheet" href="../Assets/css/text-area.css">
    <link rel="stylesheet" href="../Assets/css/contener.css">


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
 <!--       <ul>
        <li><img class ="imagen" src="../Assets/img/imagen1.png" alt=""></li>
        </ul>-->
    </nav>
</div>




    <?php
        if(empty($data2[T_PARTIDO])){
        

        if (!empty($data[T_PARTIDO])) {
            echo "<div class='form'>";
        echo "<form class='formulario' method='post' action= '".BASE_DIR."/Partidos/showSolvencia'>"; 
            //echo "<form method='post' action= '". BASE_DIR."/Reporte/generar '".">";                 
            echo "<select name='partido' >";
            echo "<option value='0'>Seleccione el reporte</option>";
            foreach ($data[T_PARTIDO] as $dato) {
                 echo "<option value=".$dato[PART_ID].">".$dato[PART_NOM]."</option>";
            }
            echo "</select>";
            echo "<button type='submit'>Buscar</button>";           
            echo "</form>";
        echo "</div>";
        }
        else{
            echo "<div class='contenedor'>";
            echo "<h1 style='color:black'> No hay partidos con solvencias pendientes</h1>";
            echo "</div>";
        }
        
    }
    
        
    ?>

  
    <?php
   
        if(!empty($data2[T_PARTIDO])){
            echo "<div class='form'>";
            echo "<form class='formulario' method='post' action= '".BASE_DIR."/Partidos/actualizarSolvencia'>"; 
            foreach ($data2[T_PARTIDO] as $dato) {
                echo "<h1>PARTIDO ".$dato[PART_NOM]."</h1><br>";
                if($dato[PART_SOLV1] == 'Pendiente' && $dato[PART_SOLV1] == 'Pendiente'){
                    echo "<select name='solvencia1' >";
                    echo "<option value='0'>Seleccione si realizara solvencia del equipo ".$dato[PART_EQP1]."</option>";
                    echo "<option value='1'>Si </option>";
                    echo "<option value='2'>No </option>";
                    echo "</select>";

                    echo "<select name='solvencia2' >";
                    echo "<option value='0'>Seleccione si realizara solvencia del equipo ".$dato[PART_EQP2]."</option>";
                    echo "<option value='1'>Si </option>";
                    echo "<option value='2'>No </option>";
                    echo "</select>";
                    echo "<input type='hidden' name='partidoID' id='' value='".$dato[PART_ID]."' >";
                    echo "<button type='submit'>Guardar</button>";

                }
                else if($dato[PART_SOLV1] == 'Pendiente'){
                    echo "<select name='solvencia1' >";
                    echo "<option value='0'>Seleccione si realizara solvencia del equipo ".$dato[PART_EQP1]."</option>";
                    echo "<option value='1'>Si </option>";
                    echo "<option value='2'>No </option>";
                    echo "</select>";
                    echo "<input type='hidden' name='partidoID' id='' value='".$dato[PART_ID]."' >";
                    echo "<button type='submit'>Guardar</button>";

                }
                else if($dato[PART_SOLV2] == 'Pendiente'){
                    echo "<select name='solvencia2' >";
                    echo "<option value='0'>Seleccione si realizara solvencia del equipo ".$dato[PART_EQP2]."</option>";
                    echo "<option value='1'>Si </option>";
                    echo "<option value='2'>No </option>";
                    echo "</select>";
                    echo "<input type='hidden' name='partidoID' id='' value='".$dato[PART_ID]."' >";
                    echo "<button type='submit'>Guardar</button>";

                }
           }
            echo "</form>";
            echo "</div>";
        }
        
    ?>


<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>