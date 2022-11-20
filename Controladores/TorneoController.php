<?php
 require_once "config/configGeneral.php";
 require_once "config/db_config.php";
 require_once "Modelos/Torneo.php";
class TorneoController 
{
    public function crearTorneo(){
        if(!empty($_POST)){
            /*echo $_POST[TOR_NOM].'<br>';
            echo $_POST[TOR_INICIO].'<br>';
            echo $_POST[TOR_FINAL].'<br>';*/
            $t= new Torneo();
            $t->setNombre($_POST[TOR_NOM]);
            $t->setFecha_inicio($_POST[TOR_INICIO]);
            $t->setFecha_final($_POST[TOR_FINAL]);
            if($t->Crear_Torneo()){
                header("Location:".BASE_DIR.'/PanelAdministrador/showAdminTorneo');
            }
            else{
                header("Location:".BASE_DIR.'Torneo/showcreateTorneo' );
            }
            

        }
        else{
            echo "No hay datos";
        }

    }

    public function showcreateTorneo(){
        require_once "Vistas/CrearTorneo.php";
        //require_once "Vistas/AdministrarPartidos.php";
   }
   public function showTorneos(){
        $Torneo = new Torneo(); //Creamos una instancia de la clase Torneo

        $registros = $Torneo->get_Torneos(); //Pedimos la lista de torneos
        $data[T_TORNEO] = "";

        if ($registros != null) {
            $data[T_TORNEO] = $registros;
            
        }

        require_once "Vistas/VerTorneos.php";
    
    }

  public function buscarDireccion($action){
    if ($action=='showcreateTorneo') {
           $this->showcreateTorneo();
    }
    elseif ($action=="showTorneos") {
        $this->showTorneos();
    }
    elseif ($action=="crearTorneo") {
        $this->crearTorneo();
    }
    else{
        return false;
    }
 }

}

?>