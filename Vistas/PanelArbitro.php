<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Panel Arbitro</title>
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
            <li>Crear Reporte</li>
            <li>Detalle Reporte</li>
            <li>Listado de reportes</li>
            <li>Sanciones</li>
        </ul>
        <ul>
            <a href="<?= BASE_DIR.'/Login/salir'?>"><img class="imagen" src="../Assets/img/imagen1.png" alt=""><li></li></a>
        </ul>
    </nav>
</div>

<div class="container2">

<a href="<?= BASE_DIR.'Reporte/showcreateReporte' ?>">
    <button class="boton">Crear Reportes </button>
</a>

<a href="<?= BASE_DIR.'PanelArbitro/showAdminRepote' ?>">
    <button class="boton">Detalle Reporte</button>
</a>

<a href="<?= BASE_DIR.'PanelArbitro/showAdminRepote' ?>">
    <button class="boton">Listado de reportes</button>
</a>



</div>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>