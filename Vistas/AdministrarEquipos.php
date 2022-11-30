<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Administrar Equipos</title>
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
            <a href="<?= BASE_DIR.'/Jugador/showRegistro' ?>"><li>Registrar Equipo</li></a>
            <a href="<?= BASE_DIR.'/Jugador/showUpdate' ?>"><li>Listado de Equipos</li></a>
            <a href="<?= BASE_DIR.'/Jugador/showListado'?>"><li>Listado de Jugador</li></a>     
        </ul>
        <ul>
        <a href="<?= BASE_DIR.'/Login/salir'?>"><img class="imagen" src="../Assets/img/imagen1.png" alt=""><li>   </li></a>
        </ul>
    </nav>
</div>

<div class="container2">

<a href="<?= BASE_DIR.'Equipo/showCreatePartido' ?>">
<button class="boton">
    <p>Registrar Equipo</p>
</button>

<a href="<?= BASE_DIR.'Equipo/showEquipos' ?>">
<button class="boton">
    <p>Listado de Equipos</p>
</button>

<button class="boton">
    <p>Administrar Indumentaria de Equipos</p>
</button>

</div>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>