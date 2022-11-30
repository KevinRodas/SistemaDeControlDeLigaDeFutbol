<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Crear Partidos</title>
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
            
            <a href="<?= BASE_DIR.'AdministrarPartidos/createPartido' ?>"><li>Crear Partido</li></a>
            <a href="<?= BASE_DIR.'AdministrarPartidos/showReporte' ?>"><li>Listado de Reportes de Partidos</li></a>
            <a href="<?= BASE_DIR.'AdministrarPartidos/showPartido' ?>"><li>Lista de Partidos</li></a>
            
            

            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li>
        </ul>
        <ul>       
            <li>Crear Partido</li>
            <li>Listado de Reportes de Partidos</li>
            <li>Lista de Partidos</li>

        </ul>
        <ul>
            <a href="<?= BASE_DIR.'/Login/salir'?>"><img class="imagen" src="../Assets/img/imagen1.png" alt=""><li></li></a>
        </ul>
    </nav>
</div>

<div class="container3">



</div>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>