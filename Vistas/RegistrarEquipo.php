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
            <a href="<?= BASE_DIR.'/Jugador/showRegistro' ?>"><li>Registrar Equipo</li></a>
            <a href="<?= BASE_DIR.'/Jugador/showUpdate' ?>"><li>Listado de Equipos</li></a>
            <a href="<?= BASE_DIR.'/Jugador/showListado'?>"><li>Listado de Jugador</li></a>
        </ul>
        <ul>
        <a href="<?= BASE_DIR.'/Login/salir'?>"><img class="imagen" src="../Assets/img/imagen1.png" alt=""><li>   </li></a>
        </ul>
    </nav>
</div>

<div class="form">
    <form  class="formulario" method="POST" action="<?= BASE_DIR."/Equipo/createEquipo"?>">
        <h1>Registrar Equipo</h1><br>
        <input type="text"  placeholder="ID equipo" name="<?= EQP_ID?>" required autocomplete="off">    
        <input type="text"  placeholder="Nombre" name="<?= EQP_NOM?>" required autocomplete="off"><!-- cambiar a select -->
        <input type="text"  placeholder="Departamento" name="<?= EQP_DEP?>" required autocomplete="off"><!-- cambiar a select -->
        <input type="text"  placeholder="Direccion" name="<?= EQP_DIR?>" required autocomplete="off">
        <?php
            echo "<select name='".EQP_REPRE."'>";
            foreach ($data[T_REPRE] as $k) {
                echo "<option value='". $k[REP_ID]."'>". $k[REP_ID]."</option>";
            }
            echo "</select>";
        ?>
        <input type="number"  placeholder="Cantidad jugadores" name="<?=EQP_INTEGRANTE?>" required ><!--cambiar a autocomplementar-->
        <button type="submit">Guardar</button>

    </form>

</div>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>