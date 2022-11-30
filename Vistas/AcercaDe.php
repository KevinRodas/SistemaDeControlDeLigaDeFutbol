<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Acerca De</title>
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
        <a href="<?= BASE_DIR.'/Vistas/Inicio.php' ?>"><li>Inicio </li></a>
            <a href="<?= BASE_DIR.'/Vistas/AcercaDe.php' ?>"><li>Acaerca De</li></a>
            <a href="<?= BASE_DIR.'/Vistas/Partidos.php'?>"><li>Partidos</li></a>
            <a href="<?= BASE_DIR.'/Vistas/Noticias.php'?>"><li>Noticias</li></a> 
            <a href="<?= BASE_DIR.'/Vistas/Equipos.php'?>"><li>Equipos</li></a>

            <a href="http://localhost/SistemaDeControlDeLigaDeFutbol/Login/login"><li>Login</li></a>
        </ul>
    </nav>
</div>


<div class="caja">

    <h1>Mas sobre las ADFA's</h1>
    <br>
    <br>

    <h2></h2>

    <p>Las ADFAS forman parte de la estructura orgánica de la Federación Salvadoreña de Fútbol, reconocidas como Autoridad Deportiva, dentro de la circunscripción Departamental para promover, convocar, organizar, y dirigir los diferentes torneos y campeonatos de fútbol y sus modalidades en el sector aficionado.</p>

</div>
 
<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>