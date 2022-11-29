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

    public function showSolvencia(){
        $Partido = new Partido(); //Creamos una instancia de la clase Torneo

        $registros = $Partido->Buscar_Partido_Solventar(); //Pedimos la lista de torneos
        $data[T_PARTIDO] = "";

        if ($registros != null) {
            $data[T_PARTIDO] = $registros;
        }

        if(!empty($_POST['partido'])){
            //echo $_POST['partido'];
            $Partido2 = new Partido();
            $Partido2->setIdPartido($_POST['partido']);
            $registro2 = $Partido2->Buscar_Partido();
            $data2[T_PARTIDO]="";
            if ($registro2 != null) {
                $data2[T_PARTIDO] = $registro2;
                //echo $_POST['partido'];
                

            }
        }
        require_once "Vistas/SolvenciaPartido.php";

    }

    public function actualizarSolvencia(){
        //echo $_POST['solvencia1']."<br>";
        echo $_POST['solvencia2']."<br>";

        if(isset($_POST['solvencia1']) && isset($_POST['solvencia2'])){
            if(!empty($_POST['solvencia1']) && !empty($_POST['solvencia2'])){
                if($_POST['solvencia1'] == 1 && $_POST['solvencia2'] == 1){
                    echo "El equipo 1 esta solvente\n";
                    $part= new Partido();
                    $part->setIdPartido($_POST['partidoID']);
                    $part->setSolvencia1('Solventada');
                    //$part->Actualizar_Solvencia1();
    
                    echo "El equipo 2 esta solvente\n";
                    $part2= new Partido();
                    $part2->setIdPartido($_POST['partidoID']);
                    $part2->setSolvencia1('Solventada');
                    
    
                    if($part->Actualizar_Solvencia1() ){
                        if($part2->Actualizar_Solvencia2()){
                            header("Location:".BASE_DIR.'/PanelArbitro/showHome');
                            //require_once "Vistas/prueba.php";
                        }
                        else{
                            header("Location:".BASE_DIR.'/Partidos/showSolvencia');
                        }
                        
                    }
                }

                else if($_POST['solvencia1'] == 1 && $_POST['solvencia2'] != 1){
                    echo "El equipo 1 esta solvente\n";
                    $part= new Partido();
                    $part->setIdPartido($_POST['partidoID']);
                    $part->setSolvencia1('Solventada');
                    //$part->Actualizar_Solvencia1();
    
                    if($part->Actualizar_Solvencia1() ){
                            header("Location:".BASE_DIR.'/PanelArbitro/showHome');
                            //require_once "Vistas/prueba.php";                        
                    }
                    else {
                        header("Location:".BASE_DIR.'/Partidos/showSolvencia');
                    }
                }

                else if($_POST['solvencia2'] == 1 && $_POST['solvencia1'] != 1){
                   
                    echo "El equipo 2 esta solvente\n";
                    $part2= new Partido();
                    $part2->setIdPartido($_POST['partidoID']);
                    $part2->setSolvencia1('Solventada');
                    
                        if($part2->Actualizar_Solvencia2()){
                            header("Location:".BASE_DIR.'/PanelArbitro/showHome');
                            //require_once "Vistas/prueba.php";
                        }
                        else {
                            header("Location:".BASE_DIR.'/Partidos/showSolvencia');
                        }
                }
    
            }
            else{
                header("Location:".BASE_DIR.'/Partidos/showSolvencia');

            }
        }
        else if(isset($_POST['solvencia1'])){
            if(!empty($_POST['solvencia1'])){
                if($_POST['solvencia1']==1){
                    echo "El equipo 1 esta solvente\n";
                    $part= new Partido();
                    $part->setSolvencia1('Solventada');
                    $part->setIdPartido($_POST['partidoID']);
    
                    if($part->Actualizar_Solvencia1()){
                        header("Location:".BASE_DIR.'/PanelArbitro/showHome');
                        //require_once "Vistas/prueba.php";
                    }
                    else {
                        header("Location:".BASE_DIR.'/´Partidos/showSolvencia');

                    }
                }
    
            }
            else{
                header("Location:".BASE_DIR.'/Partidos/showSolvencia');

            }
        }
        else if(isset($_POST['solvencia2'])){
            if(!empty($_POST['solvencia2'])){
                if($_POST['solvencia2']==1){
                    echo "El equipo 2 esta solvente\n";
                    $part= new Partido();
                    $part->setSolvencia2('Solventada');
                    $part->setIdPartido($_POST['partidoID']);
    
                    if($part->Actualizar_Solvencia2()){
                        //require_once "Vistas/prueba.php";
                        header("Location:".BASE_DIR.'/PanelArbitro/showHome');
                    }
                    else{
                        header("Location:".BASE_DIR.'/Partidos/showSolvencia');
                    }
                }
                else{
                    header("Location:".BASE_DIR.'/Partidos/showSolvencia');

                }
            }
        }
        else{
            header("Location:".BASE_DIR.'/Partidos/showSolvencia');

        }


        

        //require_once "Vistas/prueba.php";
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
    elseif ($action=="showSolvencia") {
        $this->showSolvencia();
    }
    elseif ($action=="actualizarSolvencia") {
        $this->actualizarSolvencia();
    }
    else{
        return false;
    }
 }

}

?>