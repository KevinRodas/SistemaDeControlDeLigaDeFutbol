<?php 
//session_start();
require_once "config/configGeneral.php";
require_once "config/db_config.php";
require_once "Modelos/Representante.php";
require_once "Modelos/Representante.php";

class RepresentanteController
{
public function __construct()
{
     
}
public function createRepresentante(){
    $m=NULL;
    if(!empty($_POST)){
        $j= new Representante();
        $j->setIdRepre($_POST[U_ID]);
        $j->setCodEquipo($_POST[REP_EQP]);
        $j->setDireccion($_POST[REP_DIR]);

        $u = new Usuario();
        $u->setUsuario($_POST[U_ID]);
        $u->setNombre($_POST[U_NOM]);
        $u->setApellido($_POST[U_LN]);
        $u->setEdad($_POST[U_AGE]);
        $u->setNtelefono($_POST[U_TEL]);
        $u->setCorreo($_POST[U_MAIL]);
        $u->setContra($_POST[U_PASS]);
        $u->setRol("Representante");
        
        if ($u->Crear_Usuario() && $j->Crear_Representante()) {
            header("Location:".BASE_DIR.'/AdministrarMiembros/showAdminRepresentante');
                
         }
        else{
            $m = "Error al crear repre";
            header("Location:".BASE_DIR.'Representante/showRegistro');
        }
    

    }
    else{
        echo "No hay datos";
    }

}

public function updateRepresentante(){
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
   
    require_once "Vistas/RegistrarRepresentante.php";
    
}

public function showUpdate(){

        require_once "Vistas/ActualizarRepresentante.php";
}

public function showListado(){
    $Repre = new Representante(); //Creamos una instancia de la clase Torneo

    $registros = $Repre->Ver_Representante(); //Pedimos la lista de torneos
    $data[T_REPRE] = "";

    if ($registros != null) {
        $data[T_REPRE] = $registros;     
        require_once "Vistas/ListadoRepresentantes.php";
      
    }
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
    elseif ($action=="createRepresentante") {
        $this->createRepresentante();
    }
    elseif ($action=="updateRepresentante") {
        $this->updateRepresentante();
    }
    else{
        return false;
    }
}

}

?>