<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Registrar Equipo</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">
    <link rel="stylesheet" href="../Assets/css/formulario.css">
    <link rel="stylesheet" href="../Assets/css/administrador.css">

</head>
<body>
<div class="menu">
    <nav>
        <ul>
            <a href="<?= BASE_DIR.'PanelAdministrador/showHome' ?>">
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li></a>
            
        </ul>
        <ul>       
            
            <a href="<?= BASE_DIR?>"><li>Registrar Equipo</li></a>
            <a href="<?= BASE_DIR?>"><li>Listado de Equipos </li></a>
            <!-- <a href=""><li>Administrar Indumentaria de Equipo</li></a> -->
            
            <a href="<?= BASE_DIR.'/PanelAdministrador/showHome' ?>"><li>Inicio </li></a>  
            <a href="<?= BASE_DIR.'/Jugador/showRegistro' ?>"><li>Registrar Equipo</li></a>
            <a href="<?= BASE_DIR.'/Jugador/showUpdate' ?>"><li>Listado de Equipos</li></a>
            <a href="<?= BASE_DIR.'/Jugador/showListado'?>"><li>Listado de Jugador</li></a>
            
        </ul>
        <ul>
        <li><img class ="imagen" src="../Assets/img/imagen1.png" alt=""></li>
        </ul>
    </nav>
</div>

<!--<div class="form">
    <form  class="formulario" method="POST" action="">
        <h1>Registrar Equipo</h1><br>
        <input type="text"  placeholder="nombre_equipo" name="id_equipo" required autocomplete="off">    
        <input type="text"  placeholder="direccion_equipo" name="id_direccion_equipo" required autocomplete="off"><-- cambiar a select ->
        <input type="text"  placeholder="telefono" name="id_telefono" required autocomplete="off">
        <input type="text"  placeholder="nombre_representante" name="id_repre" required ><--cambiar a autocomplementar->
        <input type="text"  placeholder="Cantidad_jugadores" name="id_cant_jugadores" required ><--cambiar a autocomplementar->

        <button>Guardar</button>

    </form>

</div>-->

<div class="formulario-registro">
<form action="<?= BASE_DIR.'/Equipo/showCreatePartido'?>" method="post">
    <h4>Registro de Equipo</h4>

    <input class="controls" type="text" name="<?=EQP_NOM  ?>" id="nombre_equipo" placeholder="Ingrese Nombre de Equipo">
    <input class="controls" type="text" name="<?= EQP_DIR ?>" id="direccion_equipo" placeholder="Ingrese direccion del equipo">
    <input class="controls" type="text" name="<?= EQP_DEP ?>" id="departamento" placeholder="Ingrese el departamento del equipo">
    <input class="controls" type="email" name="<?= EQP_REPRE?>" id="representante" placeholder="Ingrese representante">
    <input class="controls" type="text" name="<?= EQP_INTEGRANTE ?>" id="cantidad_jugadores" placeholder="Ingrese cantidad de jugadores">
    
    <input class="botons" type="submit" value="Registrar">

     
</div>
<br><br><br>
<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>