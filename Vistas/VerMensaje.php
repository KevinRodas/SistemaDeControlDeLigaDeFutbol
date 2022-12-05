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
            <?php
            if($_COOKIE['Rol'] == ROL_ADMIN){
            ?>    
            <a href="<?= BASE_DIR.'/PanelAdministrador/showHome' ?>"><li>Inicio </li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminPartido' ?>"><li>Partidos</li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminEquipo'?>"><li>Equipos</li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminMiembro'?>"><li>Miembros</li></a> 
            <a href=""><li>Sanciones</li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminLocal'?>"><li>Localidades</li></a>
            <a href=""><li>Noticias</li></a>
            <a href="<?= BASE_DIR.'/Mensajeria/showMensajes' ?>"><li>Mensajeria</li></a>

            <?php
            }
            else if($_COOKIE['Rol'] == ROL_REP){

            ?>

            <a href="<?= BASE_DIR.'Jugador/showRegistro'?>"><li> Registrar jugadores</li></a></li>
            <li>Lista de partidos</li>
            <li>Listado de Jugadores</li>
            <a href="<?= BASE_DIR.'/Mensajeria/showMensajes' ?>"><li>Mensajeria</li></a>
            <?php
            }
            ?>

        </ul>

        <ul>
        <a href="<?= BASE_DIR.'/Login/salir'?>"><img class="imagen" src="../Assets/img/imagen1.png" alt=""><li>   </li></a>
        </ul>
    </nav>
</div>
<div class="form">
<?php
    if(!empty($data[T_MENSAJERIA])){
        foreach ($data[T_MENSAJERIA] as $dato) {
            echo "<form  class='formulario' method='POST' action=''>";
            echo "<input type='text'  value='Asunto: ". $dato[MSJ_ASUNTO]."' name=".MSJ_ASUNTO." readonly >";
            echo "<textarea readonly name='' id='' cols='50' rows='50'>".$dato[MSJ_CONTENIDO]."</textarea>";
        }

        if($_COOKIE['Rol'] == ROL_REP){
            echo "<button>Responder</button>";
        }
?>
    </form>
    <?php
    }
?>
</div>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>