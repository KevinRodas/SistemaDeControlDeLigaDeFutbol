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


</head>
<body>
<div class="menu">
    <nav>
        <ul>
            <a href="<?= BASE_DIR.'PanelAdministrador/showHome' ?>">
            <li><img class ="imagen" src="../Assets/img/logo.jpg" alt=""></li></a>           
        </ul>
        <ul>       
            <li>Crear Reporte</li>
            <li>Descripción de Reporte</li>
            <li>Listado de Reportes</li>
        </ul>

        <ul>
            <a href="<?= BASE_DIR.'/Login/salir'?>"><img class="imagen" src="../Assets/img/imagen1.png" alt=""><li></li></a>
        </ul>
    </nav>
</div>


<div class="form">

    <?php
    
        if (!empty($dataSelectReporte[T_REPORTE])) {
            echo "<form class='formulario' method='post' action= '".BASE_DIR."/Reporte/actualizarObservacion"."' id='descripcion'>"; 
            //echo "<form method='post' action= '". BASE_DIR."/Reporte/generar '".">";                 
            echo "<select name='reporte' >";
            echo "<option value='0'>Seleccione el reporte</option>";
            foreach ($dataSelectReporte[T_REPORTE] as $dato) {
                 echo "<option value=".$dato[REPORT_ID].">".$dato[REPORT_ID]."</option>";
            }
            echo "</select>";
            echo "<textarea   form='descripcion' name='observacion' id='' cols='20' rows='10' placeholder='Ingrese observaciones del partido'></textarea>";
            echo "<button type='submit'>Guardar</button>";
            echo "</form>";
        }
        
    ?>

    

</div>


<footer class="footer">

    <p>©2022 Grupo # 1 Administracion de proyectos | Todos los derechos reservados</p>
    <p>Políticas de Privacidad | Desarrollado por Grupo #1 API Sistema Web </p>
    
</footer>

</body>
</html>