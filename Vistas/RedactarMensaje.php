<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Descripción de Reporte</title>
    <link rel="stylesheet" href="../Assets/css/estilo.css">
    <link rel="stylesheet" href="../Assets/css/administrador.css">
    <link rel="stylesheet" href="../Assets/css/formulario.css">
    <link rel="stylesheet" href="../Assets/css/text-area.css">
    <link rel="stylesheet" href="../Assets/css/contener.css">
    <link rel="stylesheet" href="../Assets/css/tabla.css">
    <link rel="stylesheet" href="../Assets/css/botones.css">


</head>
<body>
<div class="menu">
    <nav>
        <ul>
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li>
        </ul>
        <ul>   
            <?php
            if($_COOKIE['Rol'] == ROL_ADMIN){
            ?>    
            <a href="<?= BASE_DIR.'/PanelAdministrador/showHome' ?>"><li>Inicio </li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminPartido' ?>"><li>Partidos</li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminEquipo'?>"><li>Equipos</li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminMiembro'?>"><li>Miembros</li></a> 
            <a href="<?= BASE_DIR.'/PanelAdministrador/cancelarSancion'?>"><li>Sanciones</li></a>
            <a href="<?= BASE_DIR.'/PanelAdministrador/showAdminLocal'?>"><li>Localidades</li></a>
            <a href=""><li>Noticias</li></a>
            <a href="<?= BASE_DIR.'/Mensajeria/showMensajes' ?>"><li>Mensajeria</li></a>

            <?php
            }
            else if($_COOKIE['Rol'] == ROL_REP){

            ?>

            <a href="<?= BASE_DIR.'Jugador/showRegistro'?>"><li> Registrar jugadores</li></a>
            <a href="<?= BASE_DIR.'PanelRepresentante/showListadoPartidos'?>"><li>Listado de Partidos</li></a>
            <a href="<?= BASE_DIR.'PanelRepresentante/showListadoJugadores'?>"><li>Listado de Jugadores</li></a>
            <a href="<?= BASE_DIR.'/Mensajeria/showMensajes' ?>"><li>Mensajeria</li></a>
            <?php
            }
            ?>

        </ul>

        <ul>
        <a href="<?= BASE_DIR.'/Login/salir'?>"><img class="imagen" src="../Assets/img/imagen1.png" alt=""><li>   </li></a>
        </ul>
    </nav>
</div>

<div class="form">
<form  class='formulario' method='POST' action='<?= BASE_DIR.'/Mensajeria/createMensaje'?>'>
<input type="text" name="<?=MSJ_ASUNTO  ?>" id="usuario" placeholder="Ingrese asunto">
<?php
    if(!empty($data[T_MENSAJERIA])){
        foreach ($data[T_MENSAJERIA] as $dato) {
            //echo "<form  class='formulario' method='POST' action=''>";
            if($dato[MSJ_TIPO] == 'Consulta' && $_COOKIE['Rol'] == ROL_REP){
                echo "<input type='text'  value='". $dato[MSJ_EMISOR]."' name=".MSJ_RECEPTOR." required readonly autocomplete='off'>";
                echo "<input type='text'  value='". $dato[MSJ_PART]."' name=".MSJ_PART." required readonly autocomplete='off'>";
                
                echo "<select name=".MSJ_TIPO.">";
                echo "<option value='0'>Seleccione respuesta de participacion</option>";
                echo "<option value='Confirmacion'>Confirmacion</option>";
                echo "<option value='Rechazo'>Rechazo</option>";
                echo "</select>";
            }
            else if($dato[MSJ_TIPO] == 'Rechazo' && $_COOKIE['Rol'] == ROL_ADMIN){
                if(!empty($data[T_EQUIPO])){
                    echo "<select name='".MSJ_RECEPTOR."' id=''>";
                    echo "<option value='0'>Seleccione el representante de equipo</option>";
                    foreach ($data[T_EQUIPO] as $d) {
                        echo "<option value='".$d[EQP_REPRE]."'>".$d[EQP_REPRE]." - ".$d[EQP_NOM]."</option>";
                    }


                    echo "</select>";
                    echo "<input type='text'  value='Consulta' name=".MSJ_TIPO." hidden>";
                    echo "<select name='repre' id=''>";
                    echo "<option value='0'>Seleccione puesto de equipo</option>";
                    echo "<option value='1'>Equipo1</option>";
                    echo "<option value='2'>Equipo2</option>";
                    echo "</select>";
                   

                    echo "<input type='hidden'  value='". $dato[MSJ_PART]."' name=".MSJ_PART." required readonly autocomplete='off'>";
                }
            }   
            else if($dato[MSJ_TIPO] == 'Confirmacion' && $_COOKIE['Rol'] == ROL_ADMIN){
                if(!empty($data[T_EQUIPO])){
                    echo "<input type='text'  value='". $dato[MSJ_EMISOR]."' name=".MSJ_RECEPTOR." required readonly autocomplete='off'>";
                echo "<input type='text'  value='". $dato[MSJ_PART]."' name=".MSJ_PART." required readonly autocomplete='off'>";
                echo "<input type='text'  value='". $dato[MSJ_EMISOR]."' name=".MSJ_RECEPTOR." required readonly autocomplete='off'>";
                echo "<input type='text'  value='". $dato[MSJ_TIPO]."' name=".MSJ_TIPO." required readonly autocomplete='off'>";
            }
            }    
        }
        echo "<textarea name='".MSJ_CONTENIDO."' id='' cols='50' rows='50'></textarea>";


            echo "<button type='submit'>Enviar</button>";
        
?>
    </form>
    <?php
    }
?>
</div>

<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>