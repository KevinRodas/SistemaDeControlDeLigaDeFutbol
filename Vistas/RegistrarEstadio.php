
<?php
require_once "./config/db_config.php";
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Registrar Estadio</title>
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
            <a href="<?= BASE_DIR.'Estadio/showRegistro' ?>"><li>Registrar Estadio</li></a>
            <a href="<?= BASE_DIR.'Estadio/showUpdate' ?>"><li>Actualizar Estadio</li></a>
            <a href="<?= BASE_DIR.'Estadio/showEstadios' ?>"><li>Listado de Estadios</li></a>
            <a href="<?= BASE_DIR.'/Login/salir'?>"> <li>LogOut</li></a>            

            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li>
        </ul>
        <ul>       
            <li>Registrar Estadio</li>
            <li>Actualizar Estadio</li>
            <li>Listado de Estadio</li>

        </ul>
        <ul>
        <li><img class ="imagen" src="../Assets/img/imagen1.png" alt=""></li>
        </ul>
    </nav>
</div>

<div class="formulario-registro">

    <form action="<?= BASE_DIR.'Estadio/createEstadio' ?>" method="post">
    <h4>Registro de Estadio</h4>
    <input class="controls" type="text" name="<?= EST_NOM ?>" id="nombres" placeholder="Ingrese el Nombre del Estadio">
    <input class="controls" type="text" name="<?= EST_ENC ?>" id="nombreencargado" placeholder="Ingrese el Nombre del encargado de estadio">
    <input class="controls" type="text" name="<?= EST_DIR ?>" id="direccion" placeholder="Ingrese la dirección del estadio">
    <input class="controls" type="number" name="<?= EST_TEL ?>" id="numero" placeholder="Ingrese el numero de telefono">
    <input class="botons" type="submit" value="Registrar">
    </form>
</div>
<br>


    <h4>Registro de Estadio</h4>
    <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese el Nombre del Estadio">
    <input class="controls" type="text" name="nombreencargado" id="nombreencargado" placeholder="Ingrese el Nombre del encargado de estadio">
    <input class="controls" type="text" name="direccion" id="direccion" placeholder="Ingrese la dirección del estadio">
    <input class="controls" type="text" name="equipo" id="equipo" placeholder="Ingrese el equipo al que pertenece">
    <input class="controls" type="text" name="numero" id="numero" placeholder="Ingrese el numero de telefono">
    <input class="botons" type="submit" value="Registrar">
  
</div>

<div class="container-filtrar">
    <button class="boton-regresar">Regresar</button>
</div>


<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>