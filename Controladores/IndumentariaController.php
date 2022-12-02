<?php
 require_once "config/configGeneral.php";
 require_once "config/db_config.php";
 require_once "Modelos/Indumentaria.php";
class IndumentariaController 
{
    public function crearIndumentaria(){
        if(!empty($_POST)){
           
            $p= new Indumentaria();
            
            $p->setIdEquipo($_POST[INDUMT_EQP]);
            $p->setCodLogo($_POST[INDUMT_LOGO]);
            $p->setCodUniforme($_POST[INDUMT_UNIF]);
            $p->setColorPrimario($_POST[INDUMT_COLORP]);
            $p->setColorSecundario($_POST[INDUMT_COLORS]);
            

            if($p->Crear_Indumentaria()){
                
                header("Location:".BASE_DIR.'/Equipo/showIndumentaria');
            }
            else{
                header("Location:".BASE_DIR.'Indumentaria/showcreateInduentaria' );
            }
            

        }
        else{
            echo "No hay datos";
        }

    }

    public function showcreateInduentaria(){
        require_once "Vistas/RegistrarIndumentaria.php";
        
   }
   public function showMostrarIndumentaria(){
    require_once "Vistas/ListadoIndumentaria.php";
    
    }
   public function showIndumentaria(){
        $Indumentaria = new Indumentaria(); //Creamos una instancia de la clase Torneo

        $registros = $Indumentaria->Ver_Indumentaria(); //Pedimos la lista de torneos
        $data[T_INDUMENTARIA] = "";

        if ($registros != null) {
            $data[T_INDUMENTARIA] = $registros;
            
        }

        require_once "Vistas/ListadoIndumentaria.php";
    
    }

  public function buscarDireccion($action){
    if ($action=='showcreateInduentaria') {
           $this->showcreateInduentaria();
    }
    if ($action=='showMostrarIndumentaria') {
        $this->showMostrarIndumentaria();
    }
    elseif ($action=="showIndumentaria") {
        $this->showIndumentaria();
    }
    elseif ($action=="crearIndumentaria") {
        $this->crearIndumentaria();
    }
    else{
        return false;
    }
 }

}

?>