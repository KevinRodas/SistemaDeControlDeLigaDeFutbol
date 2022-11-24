
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Listado de Jugadores</title>
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
            <a href="<?= BASE_DIR.'/PanelAdministrador/showHome' ?>"><li>Inicio </li></a> 
            <a href="<?= BASE_DIR.'/Jugador/showRegistro' ?>"><li>Registrar Jugador</li></a>
            <a href="<?= BASE_DIR.'/Jugador/showUpdate' ?>"><li>Actualizar Jugador</li></a>
            <a href="<?= BASE_DIR.'/Jugador/showListado'?>"><li>Listado de Jugador</li></a>
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
                if(!empty($data[T_JUGADOR])){
                    echo "<table cellspacing=0 class='tb'>";
                    echo "<thead>";
                       echo "<tr>";
                            echo"<th>Jugador</th>";
                            echo"<th>Equipo</th>";
                            echo"<th>Nº partidos</th>";
                            echo"<th>Nº sanciones</th>";
                            echo"<th>Nº goles</th>";
                            
                            if ($_COOKIE["Rol"] == "Administrador") {
                                echo "<th>EDITAR</th>";
                                echo "<th>ELIMINAR</th>";
                            }

                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                            foreach ($data[T_JUGADOR] as $dato) {
                                echo "<tr>";
                                echo "<td>" . $dato[JUG_ID] . "</td>";
                                echo "<td>" . $dato[JUG_EQP] . "</td>";
                                echo "<td>" . $dato[JUG_PART] . "</td>";
                                echo "<td>" . $dato[JUG_SANC] . "</td>";
                                echo "<td>" . $dato[JUG_GOL] . "</td>";
                                //echo "<td><a class='btn btn-prestar ' href='" . BASE_DIR . "Inventario/datosInventario&id=" . $dato[I_ID] . "'><span data-tooltip='Visualizar'><p class='fas fa-eye fa-lg'></p></span></a></td>";
                                //echo "<td><a class='btn btn-modificar' href='" . BASE_DIR . "Inventario/modificar&id=" . $dato[I_ID] . "'><span data-tooltip='Modificar'><p class='fas fa-pen-alt fa-lg'></p></span></a></td>";
                                if ($_COOKIE["Rol"] == "Administrador") {
                                    $_POST[JUG_ID]=$dato[JUG_ID];
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

<br><br><br><br><br><br>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>