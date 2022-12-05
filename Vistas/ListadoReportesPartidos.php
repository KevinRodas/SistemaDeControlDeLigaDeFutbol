<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Listado de Reportes de Partidos</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">
    <link rel="stylesheet" href="../Assets/css/tabla.css">
    <link rel="stylesheet" href="../Assets/css/contener.css">

</head>
<body>
<div class="menu">
    <nav>
        <ul>
            <a href="<?= BASE_DIR.'PanelAdministrador/showHome' ?>">
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li></a>        
        </ul>
        <ul>       
            <a href="<?= BASE_DIR.'Partidos/showcreatePartido' ?>"><li>Crear Partido</li></a>
            <a href="<?= BASE_DIR.'AdministrarPartidos/showReporte' ?>"><li>Listado de Reportes de Partidos</li></a>
            <a href="<?= BASE_DIR.'AdministrarPartidos/showPartido' ?>"><li>Lista de Partidos</li></a>
        </ul>
        <ul>
            <a href="<?= BASE_DIR.'/Login/salir'?>"><img class="imagen" src="../Assets/img/imagen1.png" alt=""><li></li></a>
        </ul>
    </nav>
</div>


<div class="contenedor">

    <?php 
        if(!empty($data[T_REPORTE])){
            echo "<table cellspacing=0 class='tb'>";
            echo "<thead>";
               echo "<tr>";
                    echo"<th>Reporte</th>";
                    echo"<th>id artido</th>";
                    echo"<th>Nº tarjetas</th>";
                    echo"<th style='width:40%'>Observaciones</th>";
                    
                    if ($_COOKIE["Rol"] == ROL_ADMIN) {
                        echo "<th>Acciones</th>";
                    }

                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    foreach ($data[T_REPORTE] as $dato) {
                        echo "<tr>";
                        echo "<td>" . $dato[REPORT_ID] . "</td>";
                        echo "<td>" . $dato[REPORT_PART] . "</td>";
                        echo "<td>" . $dato[REPORT_TARJ] . "</td>";
                        echo "<td>" . $dato[REPORT_OBSERV] . "</td>";
                        //echo "<td><a class='btn btn-prestar ' href='" . BASE_DIR . "Inventario/datosInventario&id=" . $dato[I_ID] . "'><span data-tooltip='Visualizar'><p class='fas fa-eye fa-lg'></p></span></a></td>";
                        //echo "<td><a class='btn btn-modificar' href='" . BASE_DIR . "Inventario/modificar&id=" . $dato[I_ID] . "'><span data-tooltip='Modificar'><p class='fas fa-pen-alt fa-lg'></p></span></a></td>";
                        if ($_COOKIE["Rol"] == ROL_ADMIN ) {
                            echo "<td>
                                <form method='post' action='".BASE_DIR."Reporte/VerDetalleReporte'>";
                                echo "<input type='hidden' name='idR' id='' value='".$dato[REPORT_ID]."' >";
                                echo "<button class='boton-ver'>
                                        <img class='img-boton' src='".BASE_DIR."/Assets/img/ver.png'  alt=''>
                                    </button>
                               </form>
                            </td>";
                        }
                       echo "</tr>";
                    }
                echo "</tbody>";
                echo "</table>";  
        }
        else {
            echo "<h1>No hay datos</h1>";
        }

    ?>

</div>


<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>