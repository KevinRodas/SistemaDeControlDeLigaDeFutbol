<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Listado de Administradores</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">
    <link rel="stylesheet" href="../Assets/css/administrador.css">
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
            <a href="<?= BASE_DIR.'/Administrador/showRegistro' ?>"><li>Registrar Administrador</li></a>
            <a href="<?= BASE_DIR.'/Administrador/showListado'?>"><li>Listado de Administrador</li></a>
        </ul>
        <ul>
            <a href="<?= BASE_DIR.'/Login/salir'?>"><img class="imagen" src="../Assets/img/imagen1.png" alt=""><li>   </li></a>
        </ul>
    </nav>
</div>


<div class="container3">
<?php
                if(!empty($data[T_ADMIN])){
                    echo "<table cellspacing=0 class='tb'>";
                    echo "<thead class='theader'";
                       echo "<tr>";
                            echo"<th>Administrador</th>";
                            echo"<th>Puesto</th>";
                            echo "<th>Acciones</th>";
                            
                          
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                            foreach ($data[T_ADMIN] as $dato) {
                                echo "<tr>";
                                echo "<td>" . $dato[ADMIN_ID] . "</td>";
                                echo "<td>" . $dato[ADMIN_P] . "</td>";
                               
                                //echo "<td><a class='btn btn-prestar ' href='" . BASE_DIR . "Inventario/datosInventario&id=" . $dato[I_ID] . "'><span data-tooltip='Visualizar'><p class='fas fa-eye fa-lg'></p></span></a></td>";
                                //echo "<td><a class='btn btn-modificar' href='" . BASE_DIR . "Inventario/modificar&id=" . $dato[I_ID] . "'><span data-tooltip='Modificar'><p class='fas fa-pen-alt fa-lg'></p></span></a></td>";
                                if ($_COOKIE["Rol"] == "Administrador") {
                                    $_POST[ADMIN_ID]=$dato[ADMIN_ID];
                                    echo "<td>
                                        <button class='boton-ver'>
                                            <img class='img-boton' src='".BASE_DIR."/Assets/img/ver.png'  alt=''>
                                        </button>
                                        <button class='boton-edit'>
                                            <img class='img-boton' src='".BASE_DIR."/Assets/img/editar.png'  alt=''>
                                        </button>

                                        <button class='boton-delete'>
                                            <img class='img-boton' src='".BASE_DIR."/Assets/img/eliminar.png'  alt=''>
                                        </button>
                                    </td>";
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