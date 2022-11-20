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
</head>
<body>
<div class="menu">
    <nav>
        <ul>
        <a href="<?= BASE_DIR.'PanelAdministrador/showHome' ?>">
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li></a>
        </ul>
        <ul>       
        <li><a href="<?= BASE_DIR.'/PanelAdministrador/showHome' ?>">Inicio</a> </li>
            <li><a href="<?= BASE_DIR.'PanelAdministrador/showAdminPartido' ?>">Partidos</a> </li>
            <li><a href="<?= BASE_DIR.'/PanelAdministrador/showAdminEquipo'?>">Equipos</a> </li>
            <li><a href="">Miembros</a> </li>
            <li><a href="">Sanciones</a> </li>
            <li><a href="">Localidades</a> </li>
            <li><a href="">Noticias</a> </li>
            <li><a href="<?= BASE_DIR.'/Login/salir'?>"> LogOut</a></li>
        </ul>
        <ul>
        <li><img class ="imagen" src="../Assets/img/imagen1.png" alt=""></li>
        </ul>
    </nav>
</div>

<div class="container2">

<button class="boton">
<a href="<?= BASE_DIR.'Torneo/showcreateTorneo' ?>">Crear Torneo</a>
</button>

<button class="boton">
<a href="<?= BASE_DIR.'Torneo/showTorneos' ?>">Listado de torneos</a>
</button>

</div>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>