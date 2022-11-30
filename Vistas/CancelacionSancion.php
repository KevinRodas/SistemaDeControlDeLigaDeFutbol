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
    <link rel="stylesheet" href="../Assets/css/tabla.css">
    <link rel="stylesheet" href="../Assets/css/botones.css">


</head>
<body>
<div class="menu">
    <nav>
        <ul>
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li>
        </ul>
        <ul>       
            <a href="<?= BASE_DIR.'/PanelAdministrador/showHome' ?>"><li>Inicio </li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminPartido' ?>"><li>Partidos</li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminEquipo'?>"><li>Equipos</li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminMiembro'?>"><li>Miembros</li></a> 
            <a href=""><li>Sanciones</li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminLocal'?>"><li>Localidades</li></a>
            <a href=""><li>Noticias</li></a>
            <a href="<?= BASE_DIR.'Login/salir'?>"><li> LogOut</li></a></li>
        </ul>
 <!--       <ul>
        <li><img class ="imagen" src="../Assets/img/imagen1.png" alt=""></li>
        </ul>-->
    </nav>
</div>

 
    <?php
   
        if(!empty($data[T_SANCIONES])){
            echo "<div class='form' style='margin-left:10%'>";
            echo "<form class='formulario' method='post' action= ''>";
            echo "<h1>CANCELAR SANCION</h1><br>";
            echo "<select name='sancionado' id='id_sancionado'>";
            echo "<option value='0'>Seleccione el sancionado</option>";
            foreach ($data[T_SANCIONES] as $dato) {
                    echo "<option value=".$dato[SANCION_ID_SAN].">".$dato[SANCION_ID_SAN]."</option>";

            }
            echo "</select>";
            echo "<button type='submit'>Buscar Sancion</button>";
            echo "</form>";
            echo "</div>";
        }
        else{
            echo "<div class='contenedor'>";
            echo "<h1>No hay sanciones pendientes</h1><br>";
            echo "</div>";
        }

        if(!empty($dataJugSanciones[T_SANCIONES])){
            echo "<div class='contenedor'>";

            echo "<h1>SANCIONES DEL USUARIO ".$usuario. "</h1>";

            echo "<form action='".BASE_DIR."/Sanciones/cancelarSancion "."' method='post' id='form_sancion'>";
            
            echo "<input type='hidden' name='".SANCION_ID_SAN."' id='' value='".$usuario."' >";
        
           
            echo "<table cellspacing=0>";
            echo "<thead class='theader'";
               echo "<tr>";
                    echo"<th>Sancionado</th>";
                    echo"<th>Partido</th>";
                    echo"<th>Categoria</th>";
                    echo"<th>Descripcion</th>";
                    echo"<th>Precio</th>";
                    echo"<th>Estado</th>";
                    echo"<th>Acciones</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $i=1;
                    foreach ($dataJugSanciones[T_SANCIONES] as $dato) {
                        
                        echo "<tr>";
                        echo "<td>" . $dato[SANCION_ID_SAN] ."<input type='hidden' name='".SANCION_ID_SAN."' id='' value='".$dato[SANCION_ID_SAN]."' >". "</td>";
                        echo "<td>" . $dato[SANCION_PART] ."<input type='hidden' name='".SANCION_PART."' id='' value='".$dato[SANCION_PART]."' >". "</td>";
                        echo "<td>" . $dato[SANCION_CAT] . "</td>";
                        echo "<td>" . $dato[SANCION_DESCRIP] . "</td>";
                        echo "<td>" . $dato[SANCION_PR] . "</td>";
                        echo "<td>" . $dato[SANCION_EST] . "</td>";

                        if($_COOKIE["Rol"] == ROL_ADMIN){
                            echo "<td><button class='btn-cancelarSancion' type='submit'>Cancelar</button></td>";
                        }

                        echo "</tr>";
                    }
                echo "</tbody>";
                echo "</table>";  
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