<?php
 require_once "config/configGeneral.php";
 require_once "config/db_config.php";
 require_once "Modelos/Reportes.php";
class ReporteController 
{
    public function crearReporte(){
        if(!empty($_POST)){
           
            $r= new Reportes();
            $r->setIdReporte($_POST[REPORT_ID]);
            $r->setIdPartido($_POST[REPORT_PART]);
            $r->setNumTarjetas($_POST[REPORT_TARJ]);
            $r->setObservaciones($_POST[REPORT_OBSERV]);

            if($r->Crear_Reporte()){
                header("Location:".BASE_DIR.'/PanelArbitro/showAdminRepote');
            }
            else{
                header("Location:".BASE_DIR.'Reportes/showcreateReporte' );
            }
            

        }
        else{
            echo "No hay datos";
        }

    }

    public function showcreateReporte(){
        require_once "Vistas/CrearReporte.php";
        
   }
   public function showReportes(){
        $Reporte = new Reportes(); //Creamos una instancia de la clase Torneo

        $registros = $Reporte->Ver_Reportes(); //Pedimos la lista de torneos
        $data[T_REPORTE] = "";

        if ($registros != null) {
            $data[T_REPORTE] = $registros;
            
        }

        require_once "Vistas/";
    
    }

  public function buscarDireccion($action){
    if ($action=='showcreateReporte') {
           $this->showcreateReporte();
    }
    elseif ($action=="showReportes") {
        $this->showReportes();
    }
    elseif ($action=="crearReporte") {
        $this->crearReporte();
    }
    else{
        return false;
    }
 }

}

?>