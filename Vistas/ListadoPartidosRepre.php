<html>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Panel Representantes</title>
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
            <a href="<?= BASE_DIR.'Jugador/showRegistro'?>"><li> Registrar jugadores</li></a>
            <a href="<?= BASE_DIR.'PanelRepresentante/showListadoPartidos'?>"><li>Listado de Partidos</li></a>
            <a href="<?= BASE_DIR.'PanelRepresentante/showListadoJugadores'?>"><li>Listado de Jugadores</li></a>
            <a href="<?= BASE_DIR.'/Mensajeria/showMensajes' ?>"><li>Mensajeria</li></a>
        </ul>
        <ul>
            <a href="<?= BASE_DIR.'/Login/salir'?>"><img class="imagen" src="../Assets/img/imagen1.png" alt=""><li></li></a>
        </ul>
    </nav>
</div>

<div class="contenedor">

<?php
                if(!empty($data[T_PARTIDO])){
                    echo "<table cellspacing=0 style='width:100%; margin-left:0;  text-aling:center;'> ";
                    echo "<thead>";
                       echo "<tr>";
                            echo"<th style='width:5%;padding:10px;'>Partido</th>";
                            echo"<th style='width:10%;padding:10px;'>Nombre</th>";
                            echo"<th style='width:5%;padding:10px;'>Torneo</th>";
                            echo"<th style='width:10%;padding:10px;'>Estado</th>";
                            echo"<th style='width:10%;padding:10px;'>Equipo1</th>";
                            echo"<th style='width:10%;padding:10px;'>Equipo2</th>";
                            //echo"<th>SolvenciaEQ1</th>";
                            //echo"<th>SolvenciaEQ2</th>";
                            echo"<th style='width:10%;padding:10px;'>Arbitro</th>";
                            echo"<th style='width:10%;padding:10px;'>RepresentanteEQ1</th>";
                            echo"<th style='width:10%;padding:10px;'>RepresentanteEQ2</th>";
                            echo"<th style='width:10%;padding:10px;'>GolesEQ1</th>";
                            echo"<th style='width:10%;padding:10px;'>GolesEQ2</th>";
                            //echo"<th>EstadoRepreEQ1</th>";
                            //echo"<th>EstadoRepreEQ2</th>";
                            
                            
                            if ($_COOKIE["Rol"] == "Administrador") {
                                /*echo "<th>EDITAR</th>";
                                echo "<th>ELIMINAR</th>";*/
                            }

                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                            foreach ($data[T_PARTIDO] as $dato) {
                                echo "<tr>";
                                echo "<td>" . $dato[PART_ID] . "</td>";
                                echo "<td>" . $dato[PART_NOM] . "</td>";
                                echo "<td>" . $dato[PART_TORNEO] . "</td>";
                                echo "<td>" . $dato[PART_ESTADO] . "</td>";
                                echo "<td>" . $dato[PART_EQP1] . "</td>";
                                echo "<td>" . $dato[PART_EQP2] . "</td>";
                                //echo "<td>" . $dato[PART_SOLV1] . "</td>";
                                //echo "<td>" . $dato[PART_SOLV2] . "</td>";
                                echo "<td>" . $dato[PART_ARB] . "</td>";
                                echo "<td>" . $dato[PART_REPRE1] . "</td>";
                                echo "<td>" . $dato[PART_REPRE2] . "</td>";
                                echo "<td>" . $dato[PART_GOL1] . "</td>";
                                echo "<td>" . $dato[PART_GOL2] . "</td>";
                                //echo "<td>" . $dato[PART_EST_R1] . "</td>";
                                //echo "<td>" . $dato[PART_EST_R2] . "</td>";
                               
                                //echo "<td><a class='btn btn-prestar ' href='" . BASE_DIR . "Inventario/datosInventario&id=" . $dato[I_ID] . "'><span data-tooltip='Visualizar'><p class='fas fa-eye fa-lg'></p></span></a></td>";
                                //echo "<td><a class='btn btn-modificar' href='" . BASE_DIR . "Inventario/modificar&id=" . $dato[I_ID] . "'><span data-tooltip='Modificar'><p class='fas fa-pen-alt fa-lg'></p></span></a></td>";
                                if ($_COOKIE["Rol"] == "Administrador") {
                                    $_POST[PART_ID]=$dato[PART_ID];
                                    //echo "<td><button>Editar</button></td>";
                                    //echo "<td><button>Eliminar</button></td>";
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

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>