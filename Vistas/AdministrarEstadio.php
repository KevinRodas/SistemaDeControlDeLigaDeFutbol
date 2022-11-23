<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Administrar Estadios</title>
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
        <a href="<?= BASE_DIR.'/PanelAdministrador/showHome' ?>"><li>Inicio </li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminPartido' ?>"><li>Partidos</li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminEquipo'?>"><li>Equipos</li></a>
            <a href=""><li>Miembros</li></a> 
            <a href=""><li>Sanciones</li></a>
            <a href=""><li>Localidades</li></a>
            <a href=""><li>Noticias</li></a>
            <a href="<?= BASE_DIR.'Login/salir'?>"><li> LogOut</li></a></li>
        </ul>
        <ul>
        <li><img class ="imagen" src="../Assets/img/imagen1.png" alt=""></li>
        </ul>
    </nav>
</div>

<div class="container2">

<a href="<?= BASE_DIR.'Estadio/showRegistro' ?>">
    <button class="boton">Registrar Estadio</button>
</a>

<a href="<?= BASE_DIR.'Estadio/showUpdate' ?>">
    <button class="boton">Actualizar Estadio</button>
</a>

<a href="<?= BASE_DIR.'Estadio/showEstadios' ?>">
    <button class="boton">Listado de Estadios</button>
</a>

</div>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>