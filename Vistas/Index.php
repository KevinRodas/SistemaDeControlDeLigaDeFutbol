<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Inicio</title>

    <link rel="stylesheet" href="../Assets/css/index.css">

</head>
<body>
<div class="menu">
    <nav class="nav">
        <ul>
            <a href="<?= BASE_DIR.'PanelAdministrador/showHome' ?>">
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li></a>
        </ul>
        <ul>       
            <a href="<?= BASE_DIR ?>"><li>Inicio </li></a>
            <a href="<?= BASE_DIR.'/Vistas/AcercaDe.php' ?>"><li>Acerca De</li></a>
            <a href="<?= BASE_DIR.'/Vistas/Partidos.php'?>"><li>Partidos</li></a>
            <a href="<?= BASE_DIR.'/Vistas/Noticias.php'?>"><li>Noticias</li></a> 
            <a href="<?= BASE_DIR.'/Vistas/Equipos.php'?>"><li>Equipos</li></a>

            <a href="http://localhost/SistemaDeControlDeLigaDeFutbol/Login/login"><li>Login</li></a>
        </ul>
    </nav>
</div>

<div class="container2">

<div class="slider">
    <ul>
        <li>
            <img src="../Assets/img/slider1.jpg" alt="">
        </li>
        <li>
            <img src="../Assets/img/slider2.jpg">
        </li>
        <li>
            <img src="../Assets/img/slider3.jpg">
        </li>
        <li>
            <img src="../Assets/img/slider4.jpg">
        </li>
    </ul>
</div>
</div>

<div class="container2">

<div class="card">
    <div class="face front">
        <img src="../Assets/img/noticias1.jpg" alt="">
        <h3>Noticia 1</h3>
    </div>
    <div class="face back">
        <h3>PROGRAMACION OFICIAL DE LOS JUEGOS</h3>
        <p>PROGRAMACION OFICIAL DE LOS JUEGOS DE FUTBOL DE LA SUB. COMISION ESPECIAL LIGA MAYOR DE EL TRANSITO, A JUGARCE ESTE SABADO 03 Y DOMINGO 04 DE DICIEMBRE DEL 2022.-</p>
        <div class="link">
            <a href=""></a>
        </div>
    </div>
</div>


<div class="card">
    <div class="face front">
        <img src="../Assets/img/noticias2.jpg" alt="">
        <h3>Noticia 2</h3>
    </div>
    <div class="face back">
        <h3>PROGRAMACION OFICIAL LIGA MENOR </h3>
        <p>Programación oficial de la liga menor tercera vuelta</p>
        <div class="link">
            <a href=""></a>
        </div>
    </div>
</div>

<div class="card">
    <div class="face front">
        <img src="../Assets/img/noticias3.jpg" alt="">
        <h3>Noticia 3</h3>
    </div>
    <div class="face back">
        <h3>PROGRAMACION OFICIAL DE LA SUB.</h3>
        <p>COMISION  LIGA MAYOR DE LOLOTIQUE A JUGADORCE 19 Y 20 DE NOVIEMBRE DEL 2022.-</p>
        <div class="link">
            <a href=""></a>
        </div>
    </div>
</div>

<div class="card">
    <div class="face front">
        <img src="../Assets/img/noticias4.jpg" alt="">
        <h3>Noticia 4</h3>
    </div>
    <div class="face back">
        <h3>PORGRAMACION OFICIAL SUB.</h3>
        <p>COMISION DE LOLOTIQUE.</p>
        <div class="link">
            <a href=""></a>
        </div>
    </div>
</div>

</div>

<footer class="footer">


    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>




</body>
</html>