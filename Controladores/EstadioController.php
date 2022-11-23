<?php
 require_once "config/configGeneral.php";
 require_once "config/db_config.php";
 require_once "Modelos/Estadio.php";
class EstadioController 
{
    public function createEstadio(){
        if(!empty($_POST)){
            /*echo $_POST[TOR_NOM].'<br>';
            echo $_POST[TOR_INICIO].'<br>';
            echo $_POST[TOR_FINAL].'<br>';*/
            $e= new Estadio();
            $e->setNom($_POST[EST_NOM]);
            $e->setDir($_POST[EST_DIR]);
            $e->setEncargado($_POST[EST_ENC]);
            $e->setTel($_POST[EST_TEL]);
            $e->setDisponibilidad("Disponible");
            if($e->Crear_Estadio()){
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

    public function updateEstadio(){
        if(!empty($_POST)){
            /*echo $_POST[TOR_NOM].'<br>';
            echo $_POST[TOR_INICIO].'<br>';
            echo $_POST[TOR_FINAL].'<br>';*/
            $e= new Estadio();
            $e->setDisponibilidad("Disponible");
            if($e->Actualizar_Disponibilidad()){
                header("Location:".BASE_DIR.'/PanelAdministrador/showAdminLocal');
            }
            else{
                header("Location:".BASE_DIR.'Estadio/updateEstadio' );
            }
        }
        else{
            echo "No hay datos";
        }

    }

    public function showRegistro(){
        require_once "Vistas/RegistrarEstadio.php";
    }

    public function showUpdate(){
        require_once "Vistas/ActualizarEstadio.php";
    }

    public function showEstadios(){
        $Estadio = new Estadio(); //Creamos una instancia de la clase Torneo

        $registros = $Estadio->get_Estadios(); //Pedimos la lista de torneos
        $data[T_ESTADIO] = "";

        if ($registros != null) {
            $data[T_ESTADIO] = $registros;           
        }
        require_once "Vistas/VerEstadios.php";
    }

    public function buscarDireccion($action){
        if ($action=='showRegistro') {
            $this->showRegistro();
        }
        elseif ($action=="showEstadios") {
            $this->showEstadios();
        }
        elseif ($action=="showUpdate") {
            $this->showUpdate();
        }
        elseif ($action=="createEstadio") {
            $this->createEstadio();
        }
        elseif ($action=="updateEstadio") {
            $this->updateEstadio();
        }
        else{
            return false;
        }
    }

}

?>