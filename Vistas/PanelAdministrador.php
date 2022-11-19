<?php
require_once "./config/configGeneral.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="../Assets/css/administrador.css">
</head>
<body> 
<div class="menu">
    <nav>
        <ul>
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li>
        </ul>
        <ul>       
            <li><a href="<?= BASE_DIR.'/PanelAdministrador/showHome' ?>">Inicio</a> </li>
            <li><a href="<?= BASE_DIR.'PanelAdministrador/showAdminPartido' ?>">Partidos</a> </li>
            <li><a href="<?= BASE_DIR.'/PanelAdministrador/showAdminEquipo'?>">Equipos</a> </li>
            <li><a href="">Miembros</a> </li>
            <li><a href="">Sanciones</a> </li>
            <li><a href="">Localidades</a> </li>
            <li><a href="">Noticias</a> </li>
            <li><a href="http://localhost/SistemaDeControlDeLigaDeFutbol/Login/salir"> LogOut</a></li>
            
        </ul>
        <ul>
        <li><img class ="imagen" src="../Assets/img/imagen1.png" alt=""></li>
        </ul>
    </nav>
</div>

<div class="container3">

<button class="boton">
    <a href="<?= BASE_DIR.'PanelAdministrador/showAdminPartido' ?>">
    Administrar Partidos
</a>

</button>

<button class="boton" >
   <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminEquipo'?>"><p>Administrar Equipos</p></a> 
</button>

<button class="boton" >
<a href="<?= BASE_DIR.'/PanelAdministrador/cancelarSancion'?>">
Cancelación de sanciones</a> 
    
</button>

</div>

<div class="container3">

<button class="boton">
<a href="<?= BASE_DIR.'PanelAdministrador/showAdminNoticias' ?>" >
<p>Administrar Noticias</p></a> 
    
   
</button>

<button class="boton">
    <a href="<?= BASE_DIR.'PanelAdministrador/showAdminMiembro' ?>" >
    <p>Administrar Miembros</p></a> 
</button>

<button class="boton">
    <a href="<?= BASE_DIR.'PanelAdministrador/showAdminLocal' ?>" >
    <p>Administrar Localidades</p></a> 
</button>

</div>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>