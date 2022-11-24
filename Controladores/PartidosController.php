<<<<<<< HEAD
<?php
 require_once "config/configGeneral.php";
 require_once "config/db_config.php";
 require_once "Modelos/Partido.php";
class PartidosController 
{
    public function crearPartido(){
        if(!empty($_POST)){
           
            $p= new Partido();
            $p->getIdPartido($_POST[PART_ID]);
            $p->getIdTorneo($_POST[PART_TORNEO]);
            $p->getEstado($_POST[PART_ESTADO]);
            $p->getIdEquipo1($_POST[PART_EQP1]);
            $p->getIdEquipo2($_POST[PART_EQP2]);
            $p->getSolvencia1($_POST[PART_SOLV1]);
            $p->getSolvencia2($_POST[PART_SOLV2]);
            $p->getIdArbitro($_POST[PART_ARB]);
            $p->getIdRepresentante1($_POST[PART_REPRE1]);
            $p->getIdRepresentante2($_POST[PART_REPRE2]);
            $p->getGoles1($_POST[PART_GOL1]);
            $p->getGoles2($_POST[PART_GOL2]);
            $p->getEstadoRepresentante1($_POST[PART_EST_R1]);
            $p->getEstadoRepresentante2($_POST[PART_EST_R2]);

            if($p->Crear_Partido()){
                header("Location:".BASE_DIR.'/PanelAdministrador/showAdminPartido');
            }
            else{
                header("Location:".BASE_DIR.'Partido/showcreatePartido' );
            }
            

        }
        else{
            echo "No hay datos";
        }

    }

    public function showcreatePartido(){
        require_once "Vistas/CrearPartido.php";
        
   }
   public function showPartidos(){
        $Partido = new Partido(); //Creamos una instancia de la clase Torneo

        $registros = $Partido->Ver_Partidos(); //Pedimos la lista de torneos
        $data[T_PARTIDO] = "";

        if ($registros != null) {
            $data[T_PARTIDO] = $registros;
            
        }

        require_once "Vistas/";
    
    }

  public function buscarDireccion($action){
    if ($action=='showcreatePartido') {
           $this->showcreatePartido();
    }
    elseif ($action=="showPartidos") {
        $this->showPartidos();
    }
    elseif ($action=="crearPartido") {
        $this->crearPartido();
    }
    else{
        return false;
    }
 }

}

=======
<?php
 require_once "config/configGeneral.php";
 require_once "config/db_config.php";
 require_once "Modelos/Partido.php";
class PartidosController 
{
    public function crearPartido(){
        if(!empty($_POST)){
           
            $p= new Partido();
            $p->getIdPartido($_POST[PART_ID]);
            $p->getIdTorneo($_POST[PART_TORNEO]);
            $p->getEstado($_POST[PART_ESTADO]);
            $p->getIdEquipo1($_POST[PART_EQP1]);
            $p->getIdEquipo2($_POST[PART_EQP2]);
            $p->getSolvencia1($_POST[PART_SOLV1]);
            $p->getSolvencia2($_POST[PART_SOLV2]);
            $p->getIdArbitro($_POST[PART_ARB]);
            $p->getIdRepresentante1($_POST[PART_REPRE1]);
            $p->getIdRepresentante2($_POST[PART_REPRE2]);
            $p->getGoles1($_POST[PART_GOL1]);
            $p->getGoles2($_POST[PART_GOL2]);
            $p->getEstadoRepresentante1($_POST[PART_EST_R1]);
            $p->getEstadoRepresentante2($_POST[PART_EST_R2]);

            if($p->Crear_Partido()){
                header("Location:".BASE_DIR.'/PanelAdministrador/showAdminPartido');
            }
            else{
                header("Location:".BASE_DIR.'Partido/showcreatePartido' );
            }
            

        }
        else{
            echo "No hay datos";
        }

    }

    public function showcreatePartido(){
        require_once "Vistas/CrearPartido.php";
        
   }
   public function showPartidos(){
        $Partido = new Partido(); //Creamos una instancia de la clase Torneo

        $registros = $Partido->Ver_Partidos(); //Pedimos la lista de torneos
        $data[T_PARTIDO] = "";

        if ($registros != null) {
            $data[T_PARTIDO] = $registros;
            
        }

        require_once "Vistas/";
    
    }

  public function buscarDireccion($action){
    if ($action=='showcreatePartido') {
           $this->showcreatePartido();
    }
    elseif ($action=="showPartidos") {
        $this->showPartidos();
    }
    elseif ($action=="crearPartido") {
        $this->crearPartido();
    }
    else{
        return false;
    }
 }

}

>>>>>>> 05c26e1b45488b9a6badd5ef42a2fcbf06b2cb1e
?>