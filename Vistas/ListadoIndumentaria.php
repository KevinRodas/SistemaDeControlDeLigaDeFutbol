<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Listado Indumentaria</title>
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
            <a href="<?= BASE_DIR.'Indumentaria/showcreateInduentaria' ?>"><li>Registrar Indumentaria</li></a>
            <a href="<?= BASE_DIR.'Indumentaria/showIndumentaria'?>"><li>Listado Indumentaria</li></a>
            
        </ul>
        <ul>
        <li><img class ="imagen" src="../Assets/img/imagen1.png" alt=""></li>
        </ul>
    </nav>
</div>


<div class="container3">
    
    <?php
                if(!empty($data[T_INDUMENTARIA])){
                    echo "<table cellspacing=0 class='tb'>";
                    echo "<thead>";
                       echo "<tr>";
                            echo"<th>Id Indumentaria</th>";
                            echo"<th>Id Equipo</th>";
                            echo"<th>Logo</th>";
                            echo"<th>Uniforme</th>";
                            echo"<th>Color Primario</th>";
                            echo"<th>Color Secuendario</th>";
                            
                            
                            if ($_COOKIE["Rol"] == "Administrador") {
                                echo "<th>EDITAR</th>";
                                echo "<th>ELIMINAR</th>";
                            }

                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                            foreach ($data[T_INDUMENTARIA] as $dato) {
                                echo "<tr>";
                                echo "<td>" . $dato[INDUMT_ID] . "</td>";
                                echo "<td>" . $dato[INDUMT_EQP] . "</td>";
                                echo '<td> <img  src="../Assets/img/'.$dato[INDUMT_LOGO].'" width="50" height="50"></td>';
                                echo "<td>" . $dato[INDUMT_UNIF] . "</td>";
                                echo "<td>" . $dato[INDUMT_COLORP] . "</td>";
                                echo "<td>" . $dato[INDUMT_COLORS] . "</td>";
                                
                               
                                
                               
                                //echo "<td><a class='btn btn-prestar ' href='" . BASE_DIR . "Inventario/datosInventario&id=" . $dato[I_ID] . "'><span data-tooltip='Visualizar'><p class='fas fa-eye fa-lg'></p></span></a></td>";
                                //echo "<td><a class='btn btn-modificar' href='" . BASE_DIR . "Inventario/modificar&id=" . $dato[I_ID] . "'><span data-tooltip='Modificar'><p class='fas fa-pen-alt fa-lg'></p></span></a></td>";
                                if ($_COOKIE["Rol"] == "Administrador") {
                                    $_POST[INDUMT_ID]=$dato[INDUMT_ID];
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