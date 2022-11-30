<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Listado de partidos</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">
    <link rel="stylesheet" href="../Assets/css/tabla.css">

</head>
<body>
<div class="menu">
    <nav>
    <ul>
            <a href="<?= BASE_DIR.'PanelAdministrador/showHome' ?>">
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li></a>        
        </ul>
        <ul>       
            <a href="<?= BASE_DIR.'AdministrarPartidos/createPartido' ?>"><li>Crear Partido</li></a>
            <a href="<?= BASE_DIR.'AdministrarPartidos/showReporte' ?>"><li>Listado de Reportes de Partidos</li></a>
            <a href="<?= BASE_DIR.'AdministrarPartidos/showPartido' ?>"><li>Lista de Partidos</li></a>
        </ul>
        <ul>
            <a href="<?= BASE_DIR.'/Login/salir'?>"><img class="imagen" src="../Assets/img/imagen1.png" alt=""><li></li></a>
        </ul>
    </nav>
</div>
<h2>Listado de Partidos</h2>

<div class="container-filtrar">

<?php
                if(!empty($data[T_PARTIDO])){
                    echo "<table cellspacing=0 class='tb'>";
                    echo "<thead>";
                       echo "<tr>";
                            echo"<th>Partido</th>";
                            echo"<th>Torneo</th>";
                            echo"<th>Estado</th>";
                            echo"<th>Equipo1</th>";
                            echo"<th>Equipo2</th>";
                            echo"<th>SolvenciaEQ1</th>";
                            echo"<th>SolvenciaEQ2</th>";
                            echo"<th>Arbitro</th>";
                            echo"<th>RepresentanteEQ1</th>";
                            echo"<th>RepresentanteEQ2</th>";
                            echo"<th>GolesEQ1</th>";
                            echo"<th>GolesEQ2</th>";
                            echo"<th>EstadoRepreEQ1</th>";
                            echo"<th>EstadoRepreEQ2</th>";
                            
                            
                            if ($_COOKIE["Rol"] == "Administrador") {
                                echo "<th>EDITAR</th>";
                                echo "<th>ELIMINAR</th>";
                            }

                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                            foreach ($data[T_PARTIDO] as $dato) {
                                echo "<tr>";
                                echo "<td>" . $dato[PART_ID] . "</td>";
                                echo "<td>" . $dato[PART_TORNEO] . "</td>";
                                echo "<td>" . $dato[PART_ESTADO] . "</td>";
                                echo "<td>" . $dato[PART_EQP1] . "</td>";
                                echo "<td>" . $dato[PART_EQP2] . "</td>";
                                echo "<td>" . $dato[PART_SOLV1] . "</td>";
                                echo "<td>" . $dato[PART_SOLV2] . "</td>";
                                echo "<td>" . $dato[PART_ARB] . "</td>";
                                echo "<td>" . $dato[PART_REPRE1] . "</td>";
                                echo "<td>" . $dato[PART_REPRE2] . "</td>";
                                echo "<td>" . $dato[PART_GOL1] . "</td>";
                                echo "<td>" . $dato[PART_GOL2] . "</td>";
                                echo "<td>" . $dato[PART_EST_R1] . "</td>";
                                echo "<td>" . $dato[PART_EST_R2] . "</td>";
                               
                                //echo "<td><a class='btn btn-prestar ' href='" . BASE_DIR . "Inventario/datosInventario&id=" . $dato[I_ID] . "'><span data-tooltip='Visualizar'><p class='fas fa-eye fa-lg'></p></span></a></td>";
                                //echo "<td><a class='btn btn-modificar' href='" . BASE_DIR . "Inventario/modificar&id=" . $dato[I_ID] . "'><span data-tooltip='Modificar'><p class='fas fa-pen-alt fa-lg'></p></span></a></td>";
                                if ($_COOKIE["Rol"] == "Administrador") {
                                    $_POST[PART_ID]=$dato[PART_ID];
                                    echo "<td><button>Editar</button></td>";
                                    echo "<td><button>Eliminar</button></td>";
                                    //echo "<td><a class='btn btn-eliminar' onclick='return checkDelete()' href='" . BASE_DIR . "Inventario/eliminar&id=" . $dato[I_ID] . "'><span data-tooltip='Eliminar'><p class='fas fa-trash fa-lg'></p></span></a></td>";
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

<div class="">

    <textarea name="Comentarios" id="" cols="40" rows="10"></textarea>

</div>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>