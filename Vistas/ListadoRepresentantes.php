<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Listado de Representantes</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">
    <link rel="stylesheet" href="../Assets/css/tabla.css">
    <link rel="stylesheet" href="../Assets/css/contener.css">


</head>
<body>
<div class="menu">
    <nav>
        <ul>
            <a href="<?= BASE_DIR.'PanelAdministrador/showHome' ?>">
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li></a>        </ul>
        <ul>       
            <a href="<?= BASE_DIR.'/Representante/showRegistro' ?>"><li>Registrar Representante</li></a>
            <a href="<?= BASE_DIR.'/Representante/showUpdate' ?>"><li>Actualizar Representante</li></a>
            <a href="<?= BASE_DIR.'/Representante/showListado' ?>"><li>Listado de Representante</li></a>
        </ul>
        <ul>
        <a href="<?= BASE_DIR.'/Login/salir'?>"><img class="imagen" src="../Assets/img/imagen1.png" alt=""><li>   </li></a>
        </ul>
    </nav>
</div>

<div class="contenedor">
<?php
                if(!empty($data[T_REPRE])){
                    echo "<table cellspacing=0 class='tb'>";
                    echo "<thead>";
                       echo "<tr>";
                            echo"<th>Representante</th>";
                            echo"<th>Direccion</th>";
                            
                            
                            if ($_COOKIE["Rol"] == "Administrador") {
                                echo "<th>EDITAR</th>";
                                echo "<th>ELIMINAR</th>";
                            }

                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                            foreach ($data[T_REPRE] as $dato) {
                                echo "<tr>";
                                echo "<td>" . $dato[REP_ID] . "</td>";
                                echo "<td>" . $dato[REP_DIR] . "</td>";
                               
                                //echo "<td><a class='btn btn-prestar ' href='" . BASE_DIR . "Inventario/datosInventario&id=" . $dato[I_ID] . "'><span data-tooltip='Visualizar'><p class='fas fa-eye fa-lg'></p></span></a></td>";
                                //echo "<td><a class='btn btn-modificar' href='" . BASE_DIR . "Inventario/modificar&id=" . $dato[I_ID] . "'><span data-tooltip='Modificar'><p class='fas fa-pen-alt fa-lg'></p></span></a></td>";
                                if ($_COOKIE["Rol"] == "Administrador") {
                                    $_POST[REP_ID]=$dato[REP_ID];
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

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>