<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Partidos</title>
    <link rel="stylesheet" href="../Assets/css/partidos.css">
    <link rel="stylesheet" href="../Assets/css/contener.css">
</head>
<body>
<div class="menu">
    <nav>
        <ul>
            <a href="<?= BASE_DIR.'PanelAdministrador/showHome' ?>">
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li></a>        </ul>
        <ul>       
        <a href="<?= BASE_DIR ?>"><li>Inicio </li></a>
            <a href="<?= BASE_DIR.'/Inicio/showAcerca' ?>"><li>Acerca De</li></a>
            <a href="<?= BASE_DIR.'/Inicio/showPartidos'?>"><li>Partidos</li></a>
            <a href="<?= BASE_DIR.'/Inicio/showNoticias'?>"><li>Noticias</li></a> 
            <a href="<?= BASE_DIR.'/Inicio/showEquipos'?>"><li>Equipos</li></a>

            <a href="http://localhost/SistemaDeControlDeLigaDeFutbol/Login/login"><li>Login</li></a>
        </ul>
    </nav>
</div>
<!--
<div class="resultados">

<h1>resultados</h1>

<div class="container-resultados">
    <img class="logo-equipo" src="../Assets/img/chihuahua.png" alt="">
    <h1> 0 </h1>
    <h1> - </h1>
    <h1> 0 </h1>
    <img class="logo-equipo" src="../Assets/img/panteras.png" alt="">

</div>

<div class="container-resultados">
    <img class="logo-equipo" src="../Assets/img/belgica.png" alt="">
    <h1> 0 </h1>
    <h1> - </h1>
    <h1> 0 </h1>
    <img class="logo-equipo" src="../Assets/img/brasil.png" alt="">

</div>

<div class="container-resultados">
    <img class="logo-equipo" src="../Assets/img/colombia.png" alt="">
    <h1> 0 </h1>
    <h1> - </h1>
    <h1> 0 </h1>
    <img class="logo-equipo" src="../Assets/img/costarica.png" alt="">

</div>

<div class="container-resultados">
    <img class="logo-equipo" src="../Assets/img/portugal.png" alt="">
    <h1> 0 </h1>
    <h1> - </h1>
    <h1> 0 </h1>
    <img class="logo-equipo" src="../Assets/img/japon.png" alt="">

</div>

</div>

<div class="resultados">

<h1>resultados</h1>

<div class="container-resultados">
    <img class="logo-equipo" src="../Assets/img/chihuahua.png" alt="">
    <h1> 0 </h1>
    <h1> - </h1>
    <h1> 0 </h1>
    <img class="logo-equipo" src="../Assets/img/panteras.png" alt="">

</div>

<div class="container-resultados">
    <img class="logo-equipo" src="../Assets/img/belgica.png" alt="">
    <h1> 0 </h1>
    <h1> - </h1>
    <h1> 0 </h1>
    <img class="logo-equipo" src="../Assets/img/brasil.png" alt="">

</div>

<div class="container-resultados">
    <img class="logo-equipo" src="../Assets/img/colombia.png" alt="">
    <h1> 0 </h1>
    <h1> - </h1>
    <h1> 0 </h1>
    <img class="logo-equipo" src="../Assets/img/costarica.png" alt="">

</div>

<div class="container-resultados">
    <img class="logo-equipo" src="../Assets/img/portugal.png" alt="">
    <h1> 0 </h1>
    <h1> - </h1>
    <h1> 0 </h1>
    <img class="logo-equipo" src="../Assets/img/japon.png" alt="">

</div>
</div> -->
<div class="resultados" style="height: 80%;">

    <h1>RESULTADOS DE PARTIDOS</h1>
    <div class="container-resultados">
    <?php 
        foreach ($data[T_PARTIDO] as $k1) {
            foreach ($data2[T_PARTIDO] as $k2) {
                //echo '<div class="container-resultados">';
                echo '<img class="logo-equipo" src="../Assets/img/'.$k1[INDUMT_LOGO].'" width="50" height="50">';
                echo '<h2>'.$k1[EQP_NOM].'</h2>';
                echo '<h1>'.$k1[PART_GOL1].'</h1>';
                echo '<h1>-</h1>';
                echo '<h1>'.$k2[PART_GOL2].'</h1>';
                echo '<h2>'.$k2[EQP_NOM].'</h2>';
                echo '<img class="logo-equipo" src="../Assets/img/'.$k2[INDUMT_LOGO].'" width="50" height="50">';
                //echo '</div>';
            }
        }
    ?>
    </div>
</div>


<footer class="footer">
    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
</footer>

</body>
</html>