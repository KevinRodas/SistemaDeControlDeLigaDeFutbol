<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Lista Reporte</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">
    <link rel="stylesheet" href="../Assets/css/administrador.css">
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


<div class="container-filtrar">

    <button class="boton-filtrar">Filtrar</button>
    <input type="text">

</div>

<?php
                if(!empty($data[T_REPORTE]) && !empty($data2[T_SANCIONES])){
                    echo "<h1>DETALLE DE REPORTE</h1>";
                    foreach ($data[T_REPORTE] as $dato) {
                    echo "ID REPORTE: ".$dato[REPORT_ID];
                    echo "ID PARTIDO: ".$dato[REPORT_PART];
                    echo "<h2>OBSERVACIONES DEL PARTIDO</h2>";
                    echo $dato[REPORT_OBSERV]."<br>";
                    
                    }

                    echo "<table cellspacing=0 class='tb'>";
                    echo "<thead>";
                       echo "<tr>";
                            echo"<th>Sancionado</th>";
                            echo"<th>Categoria</th>";
                            echo"<th>Descripcion</th>";
                            echo"<th>Estado</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                            foreach ($data2[T_SANCIONES] as $dato) {
                                echo "<tr>";
                                echo "<td>" . $dato[SANCION_ID_SAN] . "</td>";
                                echo "<td>" . $dato[SANCION_CAT] . "</td>";
                                echo "<td>" . $dato[SANCION_DESCRIP] . "</td>";
                                echo "<td>" . $dato[SANCION_EST] . "</td>";
                               echo "</tr>";
                            }
                        echo "</tbody>";
                        echo "</table>";  
                }
                else {
                    echo "<h1>No hay datos</h1>";
                }
                ?>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>