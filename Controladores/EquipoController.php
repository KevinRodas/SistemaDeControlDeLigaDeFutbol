<?php
require_once "config/configGeneral.php";
require_once "config/db_config.php"; 
require_once "Modelos/Equipo.php";
require_once "Modelos/Representante.php";
//session_start();
class EquipoController
{
public function __construct()
{
     
}

public function createEquipo(){
    if(!empty($_POST)){
        /*echo $_POST[TOR_NOM].'<br>';
        echo $_POST[TOR_INICIO].'<br>';
        echo $_POST[TOR_FINAL].'<br>';*/
        //echo $_POST[EQP_INTEGRANTE];
        $e= new Equipo();
        $e->setID($_POST[EQP_ID]);
        $e->setNom($_POST[EQP_NOM]);
        $e->setDir($_POST[EQP_DIR]);
        $e->setDep($_POST[EQP_DEP]);
        $e->setIdRepre($_POST[EQP_REPRE]);
        $e->setN_Integrantes($_POST[EQP_INTEGRANTE]);
        $e->setN_Sanciones(0);
        $e->setEstado('Activo');

        
        if($e->Crear_Equipo()){
            header("Location:".BASE_DIR.'/PanelAdministrador/showAdminLocal');
        }
        else{
            header("Location:".BASE_DIR.'Estadio/showRegistro' );
        }
    }
    else{
        echo "No hay datos";
    }

}
 public function showHome(){
      require_once "Vistas/PanelAdministrador.php";
      //require_once "Vistas/AdministrarPartidos.php";
 }

 public function showAdminPartido(){
     require_once "Vistas/AdministrarPartidos.php";
     
}
public function showAdminEquipo(){
     require_once "Vistas/AdministrarEquipos.php";

}
public function cancelarSancion(){
     //require_once "Vistas/";


}
public function showAdminNoticias(){
     //require_once "Vistas/";
}

 public function showAdminMiembro(){
     require_once "Vistas/AdministrarMiembros.php";
 }

 public function showIndumentaria(){
     require_once "Vistas/AdministrarIndumentaria.php";
}

public function showCreateEquipo(){
    $repre = new Representante();
        $register =$repre->Ver_Representante();
        $data[T_REPRE] = '';
        if ($register != null) {
            $data[T_REPRE] = $register;           
        }
    require_once "Vistas/RegistrarEquipo.php";
}

public function showEquipos(){
    $e = new Equipo();
    
    $registros = $e->Mostrar_Equipos(); //Pedimos la lista de torneos
        $data[T_EQUIPO] = "";

        if ($registros != null) {
            $data[T_EQUIPO] = $registros;           
        }
        require_once "Vistas/ListadoEquipos.php";
}

public function buscarDireccion($action){
     if ($action=='showEquipos') {
          $this->showEquipos();
     }
     
      elseif ($action=="showCreateEquipo") {
          $this->showCreateEquipo();
     }
     elseif ($action=="createEquipo") {
        $this->createEquipo();
   }
     elseif ($action=='showIndumentaria') {
          $this->showIndumentaria();
      }
      /*elseif ($action=='cancelarSancion') {
          $this->cancelarSancion();
      }
      elseif ($action=='showAdminNoticias') {
          $this->showAdminNoticias();
      }
      elseif ($action=='showAdminMiembro') {
          $this->showAdminMiembro();
      }
      elseif ($action == 'showAdminLocal') {
          $this->showAdminLocal();
      }
      elseif ($action == 'showAdminTorneo') {
        $this->showAdminTorneo();
      }
      elseif ($action == 'showAdminMiembro') {
        $this->showAdminMiembro();
      }
      */
      else{
          return false;
      }
}

}

?>