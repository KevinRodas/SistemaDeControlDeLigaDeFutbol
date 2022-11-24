<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Registrar Jugadores</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">
</head>
<body>
<div class="menu">
    <nav>
        <ul>
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li>
        </ul>
        <ul>     
            <a href="<?= BASE_DIR.'/PanelAdministrador/showHome' ?>"><li>Inicio </li></a>  
            <a href="<?= BASE_DIR.'/Jugador/showRegistro' ?>"><li>Registrar Jugador</li></a>
            <a href="<?= BASE_DIR.'/Jugador/showUpdate' ?>"><li>Actualizar Jugador</li></a>
            <a href="<?= BASE_DIR.'/Jugador/showListado'?>"><li>Listado de Jugador</li></a>
        </ul>
        <ul>
        <li><img class ="imagen" src="../Assets/img/imagen1.png" alt=""></li>
        </ul>
    </nav>
</div>

<div class="formulario-registro">
<form action="<?= BASE_DIR.'/Jugador/createJugador'?>" method="post">
<h4>Registro de Jugadores</h4>
    <input class="controls" type="text" name="<?=U_ID  ?>" id="usuario" placeholder="Ingrese Nombre de Usuario">
    <input class="controls" type="text" name="<?= U_NOM ?>" id="nombres" placeholder="Ingrese el Nombre del Jugador">
    <input class="controls" type="text" name="<?= U_LN ?>" id="apellidos" placeholder="Ingrese el Apellido del Jugador">
    <input class="controls" type="email" name="<?= U_MAIL?>" id="correo" placeholder="Ingrese el Correo electronico">
    <input class="controls" type="text" name="<?= JUG_EQP ?>" id="equipo" placeholder="Ingrese el equipo al que pertenece">
    <input class="controls" type="text" name="<?= U_TEL ?>" id="numero" placeholder="Ingrese el numero de telefono">
    <input class="controls" type="text" name="<?= U_AGE ?>" id="edad" placeholder="Ingrese edad">
    <input class="controls" type="text" name="<?= U_PASS ?>" id="contraseña" placeholder="Ingrese contraseña para usuario">
    <input class="botons" type="submit" value="Registrar">
</form>
<?php
    if (!empty($m)) {
        echo '<h1>'.$m.'</h1>';
    }
?>
    
  
    
</div>


<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>