<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Panel Arbitro</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">
    <link rel="stylesheet" href="../Assets/css/contener.css">
</head>
<body>
<div class="menu">
    <nav>
        <ul>
            <a href="<?= BASE_DIR.'/PanelJugador/showHome' ?>">
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li></a>        
        </ul>
        <ul>       
            <a href="<?= BASE_DIR.'PanelJugador/showPartidos' ?>"><li>Partidos</li></a>
            <a href="<?= BASE_DIR.'PanelJugador/showSanciones' ?>"><li>Sanciones</li></a>
        </ul>
        <ul>
            <a href="<?= BASE_DIR.'/Login/salir'?>"><img class="imagen" src="../Assets/img/imagen1.png" alt="" ><li></li></a>
        </ul>
    </nav>
    </nav>
</div>

<div class="contenedor">

<a href="<?= BASE_DIR.'PanelJugador/showPartidos' ?>">
    <button class="boton">Partidos</button>
</a>

<a href="<?= BASE_DIR.'PanelJugador/showSanciones' ?>">
    <button class="boton">Sanciones</button>
</a>
</div>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>