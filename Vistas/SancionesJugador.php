<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Listado de partidos</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">
    <link rel="stylesheet" href="../Assets/css/tabla.css">
    <link rel="stylesheet" href="../Assets/css/contener.css">

</head>
<body>
<div class="menu">
    <nav>
    <ul>
            <a href="<?= BASE_DIR.'PanelJugador/showHome' ?>">
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li></a>        
        </ul>
        <ul>       
            <a href="<?= BASE_DIR.'PanelJugador/showPartidos' ?>"><li>Partidos</li></a>
            <a href="<?= BASE_DIR.'PanelJugador/showSanciones' ?>"><li>Sanciones</li></a>
        </ul>
        <ul>
            <a href="<?= BASE_DIR.'/Login/salir'?>"><img class="imagen" src="../Assets/img/imagen1.png" alt="" ><li></li></a>
        </ul>
    </nav>
</div>
<h2>Listado de Sanciones</h2>

<div class="contenedor">

<?php
                if(!empty($data[T_SANCIONES])){
                    $san = 0;
                    echo "<h1>SANCIONES DEL USUARIO ".$_COOKIE['User']. "</h1>";
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
                            foreach ($data[T_SANCIONES] as $dato) {
                                
                                echo "<tr>";
                                echo "<td>" . $dato[SANCION_ID_SAN]."</td>";
                                echo "<td>" . $dato[SANCION_PART] . "</td>";
                                echo "<td>" . $dato[SANCION_CAT] . "</td>";
                                echo "<td>" . $dato[SANCION_DESCRIP] . "</td>";
                                echo "<td>" . $dato[SANCION_PR] . "</td>";
                                echo "<td>" . $dato[SANCION_EST] . "</td>";
                                echo "</tr>";
                            }
                        echo "</tbody>";
                        echo "</table>";                     
                }
                else{
                    echo "<h2>Estimado usuario usted no tiene registrada ninguna sancion</h2>";
                }
                ?>
</div>


<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>