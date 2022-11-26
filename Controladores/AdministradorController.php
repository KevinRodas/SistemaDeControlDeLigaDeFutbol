<?php 
//session_start();
require_once "Modelos/Administrativo.php";
require_once "Modelos/Usuario.php";
class AdministradorController
{
public function __construct()
{
     
}
public function createAdmin(){
    $m=NULL;
    if(!empty($_POST)){
        $j= new Administrativo();
        $j->setId($_POST[U_ID]);
        $j->setPuesto($_POST[ADMIN_P]);
       

        $u = new Usuario();
        $u->setUsuario($_POST[U_ID]);
        $u->setNombre($_POST[U_NOM]);
        $u->setApellido($_POST[U_LN]);
        $u->setEdad($_POST[U_AGE]);
        $u->setNtelefono($_POST[U_TEL]);
        $u->setCorreo($_POST[U_MAIL]);
        $u->setContra($_POST[U_PASS]);
        $u->setRol("Arbitro");
        
        if ($u->Crear_Usuario() ) {
            if($j->Crear_Administrativo()){
                header("Location:".BASE_DIR.'/AdministrarMiembros/showAdminArbitro');

            }
                
         }
        else{
            $m = "Error al crear repre";
            header("Location:".BASE_DIR.'Arbitro/showRegistro');
        }
    }
    else{
        echo "No hay datos";
    }

}

public function updateAdmin(){
     /*if(!empty($_POST)){
       
        $j= new Jugador();
        $j->setDisponibilidad("Disponible");
        if($j->Actualizar_Disponibilidad()){
            header("Location:".BASE_DIR.'/PanelAdministrador/showAdminLocal');
        }
        else{
            header("Location:".BASE_DIR.'Estadio/updateEstadio' );
        }
    }
    else{
        echo "No hay datos";
    }*/

}

public function showRegistro(){
   
    require_once "Vistas/RegistrarAdministrador.php";
    
}

public function showUpdate(){

       // require_once "Vistas/ListadoAdmin.php";
}

public function showListado(){
    $a = new Administrativo(); //Creamos una instancia de la clase Torneo

    $registros = $a->Ver_Administrativo(); //Pedimos la lista de torneos
    $data[T_ADMIN] = "";

    if ($registros != null) {
        $data[T_ADMIN] = $registros;           
    }
    require_once "Vistas/ListadoAdmin.php";
}

//public function showDelete()

public function buscarDireccion($action){
    if ($action=='showRegistro') {
        $this->showRegistro();
    }
    elseif ($action=="showListado") {
        $this->showListado();
    }
    elseif ($action=="showUpdate") {
        $this->showUpdate();
    }
    elseif ($action=="createAdmin") {
        $this->createAdmin();
    }
    elseif ($action=="updateAdmin") {
        $this->updateAdmin();
    }
    else{
        return false;
    }
}

}

?>