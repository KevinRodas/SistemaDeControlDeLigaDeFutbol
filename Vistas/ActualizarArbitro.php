<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Actualizar Arbitro</title>
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
            <li>Registrar Arbitro</li>
            <li>Actualizar Arbitro</li>
            <li>Listado de Arbitro</li>
        </ul>
        <ul>
        <a href="<?= BASE_DIR.'/Login/salir'?>"><img class="imagen" src="../Assets/img/imagen1.png" alt=""><li></li></a>
        </ul>
    </nav>
</div>

<div class="formulario-registro">

    <h4>Actualizar de Arbitro</h4>
    <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese el Nombre del Arbitro">
    <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese el apellido del Arbitro">
    <input class="controls" type="text" name="direccion" id="direccion" placeholder="Ingrese la dirección del Arbitro">
    <input class="controls" type="text" name="numero" id="numero" placeholder="Ingrese el numero de telefono">
    <input class="botons" type="submit" value="Actualizar">
  
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