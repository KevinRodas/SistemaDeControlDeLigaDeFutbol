<?php 
require_once "config/configGeneral.php";
require_once "config/db_config.php";



//require_once "Vistas/Inicio.php";
/**************** CONTROLADOR FRONTAL *********************/

// Definimos un controlador por defecto
$controller = DEFAULT_CONTROLLER;

// Tomamos el controlador requerido por el usuario
// en caso de no especificarse seleccionamos el controlador por defecto.
if(!empty($_GET['controller']))
{
    $controller = $_GET['controller'];
}

// Definimos una acción por defecto
$action = DEFAULT_ACTION;

// Tomamos la accion requerida por el usuario
// en caso de no especificarse seleccionamos la acción por defecto.
if(!empty($_GET['action']))
{
    $action = $_GET['action'];
}

// Definimos parametro por defecto
$param = null;

// Tomamos la accion requerida por el usuario
// en caso de no especificarse seleccionamos la acción por defecto.
if(!empty($_GET['id']))
{
    $param = $_GET['id'];
}

// Ya tenemos el controlador y la accion
// Formamos el nombre del fichero que contiene nuestro controlador
$fullController = CONTROLLERS_DIR. strval($controller) . "Controller.php";

$controller = $controller."Controller";

$obj = null;

//Activamos todas las notificaciones de error posibles
error_reporting (E_ALL);

//Definimos el tratamiento de errores no controlados
set_error_handler(function () 
{
  throw new Exception("Error");
});

// Si la variable ($controller) es un fichero lo requerimos

if(is_file($fullController))
{
    require_once ($fullController);
    
    $printController = new $controller();
    if(method_exists($printController, $action))
    {
        if($controller=='InicioController'){
            //echo 'Entro en el if';
                //echo 'valido funcion'; 
                $inicio= new InicioController();      
                $inicio->buscarDireccion($action);       
            
        }  
        elseif ($controller=='LoginController') {
            if ($action=='login') {
                $inicio= new LoginController();      
                $inicio->login();      
            }
            if ($action=='loginVerify') {
                $inicio= new LoginController();      
                $inicio->loginVerify();       
                
            }
            if($action=='salir') {
                $inicio= new LoginController();      
                $inicio->salir();      
            }
        }

        elseif ($controller=='PanelAdministradorController') { 
             if(!empty($_COOKIE["Rol"])){
                 if ($_COOKIE["Rol"] == ROL_ADMIN) {
                    $panelAdmin= new PanelAdministradorController();     
                    $panelAdmin->buscarDireccion($action);
                }
                 else{
                     //intento acceder a un area que no le corresponde
                    header('Location: '.BASE_DIR);
                 }
            }
            else{
                //no hay cookie
                header('Location: '.BASE_DIR);
            }
        }
        elseif ($controller=='PanelRepresentanteController') {
            if(!empty($_COOKIE["Rol"])){

                if ($_COOKIE["Rol"] == ROL_REP) {
                    if ($action='showHome') {
                        $inicio= new PanelRepresentanteController();     
                        $inicio->showHome();  
                        
                        
                    }
                    
                    else{
                        echo 'No existe esa accion';
                    }
                 }
                 else{
                    //intento acceder a un area que no le corresponde
                    header('Location: '.BASE_DIR);
                 }


                
            }
            else{
                //no hay cookie
                header('Location: '.BASE_DIR);
            }
        }
        elseif ($controller=='PanelArbitroController') {
            if(!empty($_COOKIE["Rol"])){

                if ($_COOKIE["Rol"] == ROL_ARB) {
                    if ($action='showHome') {
                        $inicio= new PanelArbitroController();     
                        $inicio->showHome();  
                        
                    }
                    else{
                        echo 'No existe esa accion';
                    }
                 }
                 //intento acceder a un area que no le corresponde
                 else{
                     header('Location: '.BASE_DIR);
                 }

            }
            else{
                //no hay cookie
                header('Location: '.BASE_DIR);
            }



            //require_once "config/loginVerify.php";
            
        }
        elseif ($controller=='AdministrarPartidosController') { //controlador vinculado al entorno administrador
            if(!empty($_COOKIE["Rol"])){
                if ($_COOKIE["Rol"] == ROL_ADMIN) {
                   $panelAdmin= new AdministrarPartidosController();     
                   $panelAdmin->buscarDireccion($action);
               }
                else{
                    //intento acceder a un area que no le corresponde
                   header('Location: '.BASE_DIR);
                }
           }
           else{
               //no hay cookie
               header('Location: '.BASE_DIR);
           }
       }

       elseif ($controller=='EquipoController') { //controlador vinculado al entorno administrador
        if(!empty($_COOKIE["Rol"])){
            if ($_COOKIE["Rol"] == ROL_ADMIN) {
            $j= new EquipoController();     
            $j->buscarDireccion($action);
        }
            else{
                //intento acceder a un area que no le corresponde
            header('Location: '.BASE_DIR);
            }
        }
        else{
            //no hay cookie
            header('Location: '.BASE_DIR);
        }
    }
       elseif ($controller=='TorneoController') { //controlador vinculado al entorno administrador
            if(!empty($_COOKIE["Rol"])){
                if ($_COOKIE["Rol"] == ROL_ADMIN) {
                $panelAdmin= new TorneoController();     
                $panelAdmin->buscarDireccion($action);
            }
                else{
                    //intento acceder a un area que no le corresponde
                header('Location: '.BASE_DIR);
                }
            }
            else{
                //no hay cookie
                header('Location: '.BASE_DIR);
            }
        }

        elseif ($controller=='EstadioController') { //controlador vinculado al entorno administrador
            if(!empty($_COOKIE["Rol"])){
                if ($_COOKIE["Rol"] == ROL_ADMIN) {
                $panelAdmin= new EstadioController();     
                $panelAdmin->buscarDireccion($action);
            }
                else{
                    //intento acceder a un area que no le corresponde
                header('Location: '.BASE_DIR);
                }
            }
            else{
                //no hay cookie
                header('Location: '.BASE_DIR);
            }
        }

        elseif ($controller=='AdministrarMiembrosController') { //controlador vinculado al entorno administrador
            if(!empty($_COOKIE["Rol"])){
                if ($_COOKIE["Rol"] == ROL_ADMIN) {
                    $j = new AdministrarMiembrosController();     
                    $j->buscarDireccion($action);
                }
                else{
                    //intento acceder a un area que no le corresponde
                header('Location: '.BASE_DIR);
                }
            }
            else{
                //no hay cookie
                header('Location: '.BASE_DIR);
            }
        }

        elseif ($controller=='JugadorController') { //controlador vinculado al entorno administrador
            if(!empty($_COOKIE["Rol"])){
                
                    $j = new JugadorController();     
                    $j->buscarDireccion($action);
                
                    //intento acceder a un area que no le corresponde
                
            }
            else{
                //no hay cookie
                header('Location: '.BASE_DIR);
            }
        }
        elseif ($controller=='ArbitroController') { //controlador vinculado al entorno administrador
            if(!empty($_COOKIE["Rol"])){
                if ($_COOKIE["Rol"] == ROL_ADMIN) {
                    $j = new ArbitroController();     
                    $j->buscarDireccion($action);
                }
                else{
                    //intento acceder a un area que no le corresponde
                header('Location: '.BASE_DIR);
                }
            }
            else{
                //no hay cookie
                header('Location: '.BASE_DIR);
            }
        }

        elseif ($controller=='PartidosController') { //controlador vinculado al entorno administrador
            if(!empty($_COOKIE["Rol"])){
                if ($_COOKIE["Rol"] == ROL_ADMIN || $_COOKIE["Rol"] == ROL_ARB) {
                    $j = new PartidosController();     
                    $j->buscarDireccion($action);
                }
                else{
                    //intento acceder a un area que no le corresponde
                header('Location: '.BASE_DIR);
                }
            }
            else{
                //no hay cookie
                header('Location: '.BASE_DIR);
            }
        }

        elseif ($controller=='AdministradorController') { //controlador vinculado al entorno administrador
            if(!empty($_COOKIE["Rol"])){
                if ($_COOKIE["Rol"] == ROL_ADMIN) {
                    $j = new AdministradorController();     
                    $j->buscarDireccion($action);
                }
                else{
                    //intento acceder a un area que no le corresponde
                header('Location: '.BASE_DIR);
                }
            }
            else{
                //no hay cookie
                header('Location: '.BASE_DIR);
            }
        }
        elseif ($controller=='RepresentanteController') { //controlador vinculado al entorno administrador
            if(!empty($_COOKIE["Rol"])){
                if ($_COOKIE["Rol"] == ROL_ADMIN) {
                    $j = new RepresentanteController();     
                    $j->buscarDireccion($action);
                }
                else{
                    //intento acceder a un area que no le corresponde
                header('Location: '.BASE_DIR);
                }
            }
            else{
                //no hay cookie
                header('Location: '.BASE_DIR);
            }
        }

        elseif ($controller=='ReporteController') { //controlador vinculado al entorno administrador
            if(!empty($_COOKIE["Rol"])){
                if ($_COOKIE["Rol"] == ROL_ARB) {
                    $j = new ReporteController();     
                    $j->buscarDireccion($action);
                }
                else{
                    //intento acceder a un area que no le corresponde
                header('Location: '.BASE_DIR);
                }
            }
            else{
                //no hay cookie
                header('Location: '.BASE_DIR);
            }
        }
        
        elseif ($controller=='SancionesController') { //controlador vinculado al entorno administrador
            if(!empty($_COOKIE["Rol"])){
                if ($_COOKIE["Rol"] == ROL_ADMIN ) {
                    $j = new SancionesController();     
                    $j->buscarDireccion($action);
                }
                else{
                    //intento acceder a un area que no le corresponde
                header('Location: '.BASE_DIR);
                }
            }
            else{
                //no hay cookie
                header('Location: '.BASE_DIR);
            }
        }

        else{
            echo 'No hay controlador';
        }
    }
    else
    {
        die("METODO NO EXISTE");
    }
}
else
{
    echo 'CONTROLADOR NO EXISTE';
    $_POST['error']="Controlador";
    //require_once "views/error404.php";
   
    
}
