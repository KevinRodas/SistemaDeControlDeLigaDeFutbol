<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Crear Partidos</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">

    <link rel="stylesheet" href="../Assets/css/formulario.css">

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
        <a href="<?= BASE_DIR.'/Login/salir'?>"><img class="imagen" src="../Assets/img/imagen1.png" alt=""><li>   </li></a>
        </ul>
    </nav>
</div>


<div class="form">

<?php
    if (!empty($data[T_TORNEO]) && !empty($data[T_EQUIPO]) && !empty($data[T_ARBITRO]) && !empty($data[T_ESTADIO]) ) {
?>

    <form  class="formulario" method="POST" action="<?= BASE_DIR."/Partidos/crearPartido"?>">
        <h1>Crear partido</h1><br>
        <?php
            echo "<select name='".PART_TORNEO."' required>";
            echo "<option value='0'>Seleccione el torneo</option>";
            foreach ($data[T_TORNEO] as $dato) {
                echo "<option value=".$dato[TOR_ID].">".$dato[TOR_NOM]."</option>";
            }
            echo "</select>";

            echo "<select name='".PART_EQP1."' required >";
            echo "<option value='0'>Seleccione el equipo 1</option>";
            foreach ($data[T_EQUIPO] as $dato) {
                echo "<option value=".$dato[EQP_ID].">".$dato[EQP_NOM]."</option>";
            }
            echo "</select>";

            echo "<select name='".PART_EQP2."' required>";
            echo "<option value='0'>Seleccione el equipo 2</option>";
            foreach ($data[T_EQUIPO] as $dato) {
                echo "<option value=".$dato[EQP_ID].">".$dato[EQP_NOM]."</option>";
            }
            echo "</select>";

            echo "<select name='".PART_ARB."' required>";
            echo "<option value='0'>Seleccione el arbitro</option>";
            foreach ($data[T_ARBITRO] as $dato) {
                echo "<option value=".$dato[ARB_ID].">".$dato[ARB_ID] ."</option>";
            }
            echo "</select>";

            echo "<select name='".EST_ID."' required>";
            echo "<option value='0'>Seleccione el lugar</option>";
            foreach ($data[T_ESTADIO] as $dato) {
                echo "<option value=".$dato[EST_ID].">".$dato[EST_NOM] ."</option>";
            }
            echo "</select>";
        ?>
        <input type="date" id="start" name="<?= HOR_FECHA?>" value="" placeholder="Fecha"> <br>
        <input type="time" id="appt" name="<?= HOR_INICIO?>" min="09:00" max="18:00" required>
        <h4>* Horario de partidos de 9am a 6pm</h4><br>
        <button>Guardar</button>

    </form>

<?php
    }
    else {
        echo "<div class='formulario' >";
        echo "<h1>Datos faltantes</h1>";
        echo "<p> Estimado usuario por el momento no se puede realizar ningun partido \n
        debido a que actualmente no estan los elementos necesarios para la creacion de un partido\n
        le aconsejamos que verifique la disponibilidad de los estadios y vuelva a ingresar mas tarde.";
        echo "</div>";
    }
?>    
</div>

<div class="container3">




</div>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>