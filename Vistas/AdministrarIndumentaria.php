<?php
require_once "./config/configGeneral.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Administrar Indumentaria de Equipos</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">
    <link rel="stylesheet" href="../Assets/css/tabla.css">

</head>
<body>
<div class="menu">
    <nav>
        <ul>
        <a href="<?= BASE_DIR.'PanelAdministrador/showHome' ?>">
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li></a>
        </ul>
        <ul>       
            <a href="<?= BASE_DIR ?>"><li>Registrar Indumentaria</li></a>
            <a href="<?= BASE_DIR ?>"><li>Listado Indumentaria</li></a>
            
            <a href="<?= BASE_DIR.'/Login/salir'?>"> <li>LogOut</li></a>
        </ul>
        <ul>
        <li><img class ="imagen" src="../Assets/img/imagen1.png" alt=""></li>
        </ul>
    </nav>
</div>

<div class="container2">

<<a href="<?= BASE_DIR.'Indumentaria/showcreateInduentaria' ?>">
<button class="boton">
    <p>Registrar Indumentaria</p>
</button>

<a href="<?= BASE_DIR.'Indumentaria/showIndumentaria' ?>">
<button class="boton">
    <p>Listado Indumentaria</p>
</button>

        

</div>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>