<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Actualizar Representante</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">

</head>
<body>
<div class="menu">
    <nav>
        <ul>
            <a href="<?= BASE_DIR.'PanelAdministrador/showHome' ?>">
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li></a>        </ul>
        <ul>       
            <li>Registrar Sanción</li>
            <li>Actualizar Sanción</li>
            <li>Listado de Sanciones</li>
        </ul>
        <ul>
        <a href="<?= BASE_DIR.'/Login/salir'?>"><img class="imagen" src="../Assets/img/imagen1.png" alt=""><li>   </li></a>
        </ul>
    </nav>
</div>
<div  class="formulario-registro" >
<form action="<?= BASE_DIR.'/Representante/createRepresentante'  ?>" method="post">
<h4>Registro de Representante</h4>
    <input class="controls" type="text" name="" id="tipo" placeholder="Ingrese tipo de sanción">
    <input class="controls" type="text" name="" id="duracion" placeholder="Ingrese la duración de la sanción">
    <input class="controls" type="text" name="" id="equipo" placeholder="Ingrese a que equipo se le aplicara la sanción">
    <input class="controls" type="text" name="" id="fecha" placeholder="Ingrese la fecha de finalización">

    <input class="botons" type="submit" value="Actualizar">
</form>
</div>

   

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>