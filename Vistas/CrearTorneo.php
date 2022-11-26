<?php
require_once "./config/configGeneral.php";
require_once "./config/db_config.php";
?>
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
            <a class="enlace" href="<?= BASE_DIR.'Torneo/showcreateTorneo' ?>"><li>Crear Torneo</li></a>
            <a class="enlace" href="<?= BASE_DIR.'Torneo/showTorneos' ?>"><li>Listado de Torneos</li></a>            
        </ul>
        <ul>
        <li><img class ="imagen" src="../Assets/img/imagen1.png" alt=""></li>
        </ul>
    </nav>
</div>

<div class="form">
    <form  class="formulario" method="POST" action="<?= BASE_DIR.'/Torneo/crearTorneo'?>">
        <h1>Crear Torneo</h1><br>
        <input type="text"  placeholder="Nombre" name="<?= TOR_NOM ?>" required autocomplete="off">    
        <input type="text"  placeholder="Fecha inicio" name="<?= TOR_INICIO ?>" required autocomplete="off"><!-- cambiar a select -->
        <input type="text"  placeholder="Fecha Final" name="<?= TOR_FINAL ?>" required autocomplete="off">

        <button type="submit">Guardar</button>

    </form>

</div>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>