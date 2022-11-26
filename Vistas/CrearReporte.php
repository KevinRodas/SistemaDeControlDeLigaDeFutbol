<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Crear Reporte</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">

</head>
<body>
<div class="menu">
    <nav>
        <ul>
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li>
        </ul>
        <ul>       
            <li>Inicio</li>
            <li>Crear Reporte</li>
            <li>Descripción de Reporte</li>
            <li>Listado de Reportes</li>
        </ul>
        <ul>
        <li><img class ="imagen" src="../Assets/img/imagen1.png" alt=""></li>
        </ul>
    </nav>
</div>


<div class="formulario-registro">
<form action="<?= BASE_DIR.'/Reporte/createReporte'?>" method="post">
<h4>Registro de Reporte</h4>
    <input class="controls" type="text" name="<?=U_ID  ?>" id="usuario" placeholder="Ingrese Nombre de Usuario">
    <input class="controls" type="text" name="<?= U_NOM ?>" id="nombres" placeholder="Ingrese el Nombre del Jugador">
    <input class="controls" type="text" name="<?= U_LN ?>" id="apellidos" placeholder="Ingrese el Apellido del Jugador">
    <input class="controls" type="email" name="<?= U_MAIL?>" id="correo" placeholder="Ingrese el Correo electronico">
    
    <input class="botons" type="submit" value="Registrar">
</form>


<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>