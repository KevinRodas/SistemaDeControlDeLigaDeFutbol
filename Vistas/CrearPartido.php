<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Crear Partidos</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">

    <link rel="stylesheet" href="../Assets/css/formulario.css">

</head>
<body>
<div class="menu">
    <nav>
        <ul>

            <a href="<?= BASE_DIR.'PanelAdministrador/showHome' ?>">
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li></a>
            
        </ul>
        <ul>       
            
            <a href="<?= BASE_DIR.'AdministrarPartidos/createPartido' ?>"><li>Crear Partido</li></a>
            <a href="<?= BASE_DIR.'AdministrarPartidos/showReporte' ?>"><li>Listado de Reportes de Partidos</li></a>
            <a href="<?= BASE_DIR.'AdministrarPartidos/showPartido' ?>"><li>Lista de Partidos</li></a>
            
            

            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li>
        </ul>
        <ul>       
            <li>Crear Partido</li>
            <li>Listado de Reportes de Partidos</li>
            <li>Lista de Partidos</li>

        </ul>
        <ul>
        <li><img class ="imagen" src="../Assets/img/imagen1.png" alt=""></li>
        </ul>
    </nav>
</div>


<!--<div class="form">
    <form  class="formulario" method="POST" action="">
        <h1>Crear partido</h1><br>
        <input type="text"  placeholder="Torneo" name="id_torneo" required autocomplete="off">    
        <input type="text"  placeholder="Equipo 1" name="id_equipo1" required autocomplete="off"><-- cambiar a select ->
        <input type="text"  placeholder="Equipo 2" name="id_equipo2" required autocomplete="off">
        <input type="text"  placeholder="Representante 1" name="id_repre1" required ><--cambiar a autocomplementar->
        <input type="text"  placeholder="Representante 2" name="id_repre2" required ><--cambiar a autocomplementar->
        <select id="arbitro">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>

        <button>Guardar</button>

    </form>
</div>-->

<div class="formulario-registro">
<form action="<?= BASE_DIR.'/Partidos/crearPartido'?>" method="post">
    <h4>Registro Partido</h4>

    <input class="controls" type="text" name="<?=PART_TORNEO ?>" id="torneo" placeholder="Torneo">
    <input class="controls" type="text" name="<?= PART_EQP1 ?>" id="equipo1" placeholder="Equipo 1">
    <input class="controls" type="text" name="<?= PART_EQP2 ?>" id="equipo2" placeholder="Equipo 2">
    <input class="controls" type="email" name="<?= PART_REPRE1?>" id="representante1" placeholder="Representante 1">
    <input class="controls" type="text" name="<?= PART_REPRE2 ?>" id="representante2" placeholder="Representante 2">
    <input class="controls" type="text" name="<?= PART_ARB ?>" id="arbitro" placeholder="Arbitro">

    <input class="botons" type="submit" value="Registrar">

     
</div>

<div class="container3">




</div>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>