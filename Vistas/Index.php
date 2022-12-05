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
            <img src="../Assets/img/noticia1.jpg" alt="">
        </li>
        <li>
            <img src="../Assets/img/noticia6.jpg">
        </li>
        <li>
            <img src="../Assets/img/noticia7.jpg">
        </li>
        <li>
            <img src="../Assets/img/noticia8.jpg">
        </li>
    </ul>
</div>
</div>

<div class="container2">

<div class="card">
    <div class="face front">
        <img src="../Assets/img/noticia6.jpg" alt="">

        <h3>Tarjeta Uno</h3>
    </div>
    <div class="face back">
        <h3>Tarjeta Uno</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo veritatis voluptatum cupiditate assumenda, ut praesentium.</p>
        <div class="link">
        </div>
    </div>
</div>

<div class="card">
    <div class="face front">
        <img src="../Assets/img/noticia7.jpg" alt="">
        <h3>Tarjeta Uno</h3>
    </div>
    <div class="face back">
        <h3>Tarjeta Uno</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo veritatis voluptatum cupiditate assumenda, ut praesentium.</p>
        <div class="link">
        </div>
    </div>
</div>

<div class="card">
    <div class="face front">
        <img src="../Assets/img/noticia8.jpg" alt="">
        <h3>Tarjeta Uno</h3>
    </div>
    <div class="face back">
        <h3>Tarjeta Uno</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo veritatis voluptatum cupiditate assumenda, ut praesentium.</p>
        <div class="link">
        </div>
    </div>
</div>

<div class="card">
    <div class="face front">
        <img src="../Assets/img/noticia1.jpg" alt="">
        <h3>Tarjeta Uno</h3>
    </div>
    <div class="face back">
        <h3>Tarjeta Uno</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo veritatis voluptatum cupiditate assumenda, ut praesentium.</p>
        <div class="link">
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