<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Descripción de Reporte</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">
    <link rel="stylesheet" href="../Assets/css/administrador.css">
    <link rel="stylesheet" href="../Assets/css/formulario.css">
    <link rel="stylesheet" href="../Assets/css/text-area.css">
    <link rel="stylesheet" href="../Assets/css/contener.css">
    <link rel="stylesheet" href="../Assets/css/tabla.css">
    <link rel="stylesheet" href="../Assets/css/botones.css">


</head>
<body>
<div class="menu">
    <nav>
        <ul>
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li>
        </ul>
        <ul>       
            <a href="<?= BASE_DIR.'/PanelAdministrador/showHome' ?>"><li>Inicio </li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminPartido' ?>"><li>Partidos</li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminEquipo'?>"><li>Equipos</li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminMiembro'?>"><li>Miembros</li></a> 
            <a href=""><li>Sanciones</li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminLocal'?>"><li>Localidades</li></a>
            <a href=""><li>Noticias</li></a>
            <a href="<?= BASE_DIR.'Login/salir'?>"><li> LogOut</li></a></li>
        </ul>
 <!--       <ul>
        <li><img class ="imagen" src="../Assets/img/imagen1.png" alt=""></li>
        </ul>-->
    </nav>
</div>

<div class="enc-mesj">
    
        <button class='btn-mensajes' type='submit' onclick="vertodos()">
            <div  class="div-btn">
                <img class='img-msj' src="<?=BASE_DIR."/Assets/img/todos.png" ?>">
                <h3>Todos los mensajes</h3>
            </div>
        </button>

        <button class='btn-mensajes'  type='submit' onclick="verRecibidos()">
            <div  class="div-btn">
                <img class='img-msj' src="<?=BASE_DIR."/Assets/img/Recibido2.png"?>">
                <h3>Recibidos</h3>
            </div>
        </button>

        <button class='btn-mensajes'  type='submit' onclick="verEnviados()">
            <div class="div-btn">
                <img class='img-msj' src="<?=BASE_DIR."/Assets/img/enviado2.png"?>">
                <h3>Enviados</h3>
            </div>
        </button>    
   
    </div>
    <?php
   
        if(!empty($data[T_MENSAJERIA])){
            echo "<div class='contenedor'>";

            
            //echo "<input type='hidden' name='".SANCION_ID_SAN."' id='' value='".$usuario."' >";
        
           
            echo "<table cellspacing=0 style='margin=10%'>";
            echo "<thead class='theader'";
               echo "<tr>";
                    echo"<th>Mensaje</th>";
                    echo"<th>Emisor</th>";
                    echo"<th>Receptor</th>";
                    echo"<th>Asunto</th>";
                    echo"<th>Estado</th>";
                    echo"<th style='width:30%'>Acciones</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $i=1;
                    foreach ($data[T_MENSAJERIA] as $dato) {
                        
                        echo "<tr>";
                        echo "<td>" . $dato[MSJ_ID] . "</td>";
                        echo "<td>" . $dato[MSJ_EMISOR] . "</td>";
                        echo "<td>" . $dato[MSJ_RECEPTOR] . "</td>";
                        echo "<td>" . $dato[MSJ_ASUNTO] . "</td>";
                        echo "<td>" . $dato[MSJ_EST] . "</td>";
                        echo "<form method='post' action='".BASE_DIR."/Mensajeria/showMensaje'>";

                        if(isset($_COOKIE["Rol"])){
                            echo "<input type='hidden' name='".MSJ_ID."' id='' value='".$dato[MSJ_ID]."' >";
                            echo "<td style='display:inline-flex'><button class='boton-ver'  type='submit'>
                                        <img class='img-boton' src='".BASE_DIR."/Assets/img/ver.png'  alt=''>
                                    </button>";
                                    echo "</form>";
                            echo "<form method='post' action='".BASE_DIR."/Mensajeria/showRedactar'>"; 
                            echo "<input type='hidden' name='".MSJ_ID."' id='' value='".$dato[MSJ_ID]."' >";       
                            echo "<button class='boton-ver'  type='submit'>
                            <img class='img-boton' src='".BASE_DIR."/Assets/img/redactar.png'  alt=''>
                            </button>
                            </td>";
                        }
                        echo "</form>";

                        echo "</tr>";
                    }
                echo "</tbody>";
                echo "</table>";  
                echo "</div>";
                
        }
        else{
            echo "<div class='contenedor'>";
            echo "<table cellspacing=0 style='margin=10%'>";
            echo "<thead class='theader'";
               echo "<tr>";
                    echo"<th>Mensaje</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
               
                        echo "<tr>";
                        echo "<td> No hay mensajes </td>";
                        echo "</tr>";
                    
                echo "</tbody>";
                echo "</table>"; 
            echo "</div>";    
        }
                
    ?>


<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>
<script src="../Assets/js/select_reporte_equipo.js"></script>
</body>
</html>