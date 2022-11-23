<?php
require_once "./config/db_config.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Administrador Partidos</title>
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
            <a href="<?= BASE_DIR.'Estadio/showRegistro' ?>"><li>Registrar Estadio</li></a>
            <a href="<?= BASE_DIR.'Estadio/showUpdate' ?>"><li>Actualizar Estadio</li></a>
            <a href="<?= BASE_DIR.'Estadio/showEstadios' ?>"><li>Listado de Estadios</li></a>
            <a href="<?= BASE_DIR.'/Login/salir'?>"> <li>LogOut</li></a>
        </ul>
        <ul>
        <li><img class ="imagen" src="../Assets/img/imagen1.png" alt=""></li>
        </ul>
    </nav>
</div>

<div class="container2">

<table cellspacing="0">
    <thead>
        <tr>
            <th>Estadio</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Disponibilidad</th>
            
            <?php
            if ($_COOKIE["Rol"] == "Administrador") {
                echo "<th>EDITAR</th>";
                echo "<th>ELIMINAR</th>";
            }
            ?>
        </tr>
        </thead>
        <tbody>
        <?php
        if(!empty($data[T_ESTADIO])){
            foreach ($data[T_ESTADIO] as $dato) {
                echo "<tr>";
                echo "<td>" . $dato[EST_ID] . "</td>";
                echo "<td>" . $dato[EST_NOM] . "</td>";
                echo "<td>" . $dato[EST_DIR] . "</td>";
                echo "<td>" . $dato[EST_TEL] . "</td>";
                echo "<td>" . $dato[EST_DISP] . "</td>";
                //echo "<td><a class='btn btn-prestar ' href='" . BASE_DIR . "Inventario/datosInventario&id=" . $dato[I_ID] . "'><span data-tooltip='Visualizar'><p class='fas fa-eye fa-lg'></p></span></a></td>";
                //echo "<td><a class='btn btn-modificar' href='" . BASE_DIR . "Inventario/modificar&id=" . $dato[I_ID] . "'><span data-tooltip='Modificar'><p class='fas fa-pen-alt fa-lg'></p></span></a></td>";
                if ($_COOKIE["Rol"] == "Administrador") {
                    echo "<td>Editar</td>";
                    echo "<td>Eliminar</td>";
                    //echo "<td><a class='btn btn-eliminar' onclick='return checkDelete()' href='" . BASE_DIR . "Inventario/eliminar&id=" . $dato[I_ID] . "'><span data-tooltip='Eliminar'><p class='fas fa-trash fa-lg'></p></span></a></td>";
                }
                echo "</tr>";
            }
        }
        ?>
        </tbody>
</table>
        

</div>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>