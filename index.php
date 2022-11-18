<?php 
require_once "config/configGeneral.php";
require_once "config/db_config.php";



//require_once "Vistas/Inicio.php";
/**************** CONTROLADOR FRONTAL *********************/
//$i=new InicioController();
  
//$i->show();

// Definimos un ontrolador por defecto
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
            if ($action='showInicio') {
                //echo 'valido funcion'; 
                $inicio= new InicioController();      
                $inicio->showInicio();       
            }
        }  
        elseif ($controller=='LoginController') {
            if ($action='login') {
                $inicio= new LoginController();      
                $inicio->login();      
            }
            if ($action='loginVerify') {
                $inicio= new LoginController();      
                $inicio->loginVerify();       
                
            }
            if($action='salir') {
                $inicio= new LoginController();      
                $inicio->salir();      
            }
        }




       
        elseif ($controller=='PanelAdministradorController') {
             //require_once "config/loginVerify.php";
             
             if(!empty($_COOKIE["Rol"])){
                 if ($_COOKIE["Rol"] == ROL_ADMIN) {
                    if ($action='showHome') {
                        $inicio= new PanelAdministradorController();     
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

                if ($_COOKIE["Rol"] == ROL_REP) {
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
