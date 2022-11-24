<?php 
//session_start();
class ArbitroController
{
public function __construct()
{
     
}
public function createArbitro(){
    $m=NULL;
    if(!empty($_POST)){
        $j= new Arbitro();
        $j->setId($_POST[ARB_ID]);
        $j->setDireccion($_POST[ARB_DIR]);
        $j->setDisponibilidad ('Disponible');
        $j->setNpartidos(0);

        $u = new Usuario();
        $u->setUsuario($_POST[U_ID]);
        $u->setNombre($_POST[U_NOM]);
        $u->setApellido($_POST[U_LN]);
        $u->setEdad($_POST[U_AGE]);
        $u->setNtelefono($_POST[U_TEL]);
        $u->setCorreo($_POST[U_MAIL]);
        $u->setContra($_POST[U_PASS]);
        $u->setRol("Representante");
        
        if ($u->Crear_Usuario() && $j->Crear_Arbitro()) {
            header("Location:".BASE_DIR.'/AdministrarMiembros/showAdminArbitro');
                
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

public function updateArbitro(){
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
    }
    require_once "Vistas/ListadoRepresentantes.php";
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
    elseif ($action=="createArbitro") {
        $this->createArbitro();
    }
    elseif ($action=="updateArbitro") {
        $this->updateArbitro();
    }
    else{
        return false;
    }
}

}

?>