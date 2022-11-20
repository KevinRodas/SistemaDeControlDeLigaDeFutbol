<?php
require_once "./config/configGeneral.php";
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
            <a href="<?= BASE_DIR.'Torneo/showcreateTorneo' ?>"><li>Crear Torneo</li></a>
            <a href="<?= BASE_DIR.'Torneo/showTorneos' ?>"><li>Listado de Torneos</li></a>
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
                    <th></th>
                    <th>Torneo</th>
                    <th>Nombre</th>
                    <th>Inicio</th>
                    <th>Final</th>
                    
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
                if(!empty($data[T_TORNEO])){
                    foreach ($data[T_TORNEO] as $dato) {
                        echo "<tr>";
                        echo "<td><img src='../assets/img/box.svg' alt=''/>" . "</td>";
                        echo "<td>" . $dato[TOR_ID] . "</td>";
                        echo "<td>" . $dato[TOR_NOM] . "</td>";
                        echo "<td>" . $dato[TOR_INICIO] . "</td>";
                        echo "<td>" . $dato[TOR_FINAL] . "</td>";
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