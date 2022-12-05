<?php
require_once "config/configGeneral.php";
require_once "config/db_config.php";
require_once "Modelos/Partido.php";
require_once "Modelos/Reportes.php";
class AdministrarPartidosController{
    public function __construct()
    {
         
    }
     public function createPartido(){
          require_once "Vistas/CrearPartido.php";
          //require_once "Vistas/AdministrarPartidos.php";
     }
     
     public function showReporte(){
        $Reporte = new Reportes(); //Creamos una instancia de la clase reporte

        $registros = $Reporte->Ver_Reportes(); //Pedimos la lista de reporte
        $data[T_REPORTE] = "";

        if ($registros != null) {
            $data[T_REPORTE] = $registros;
            
        }
        require_once "Vistas/ListadoReportesPartidos.php";
        //require_once "Vistas/AdministrarPartidos.php";
   }
   public function showPartido(){
     $Partido = new Partido(); //Creamos una instancia de la clase Torneo

     $registros = $Partido->Ver_Partidos(); //Pedimos la lista de torneos
     $data[T_PARTIDO] = "";

     if ($registros != null) {
         $data[T_PARTIDO] = $registros;
         
     }

        require_once "Vistas/ListaPartidos.php";
    //require_once "Vistas/AdministrarPartidos.php";
    }

    public function buscarDireccion($action){
        if ($action=='createPartido') {
             $this->createPartido();
        }
         elseif ($action=="showReporte") {
             $this->showReporte();
        }
        elseif ($action=='showPartido') {
             $this->showPartido();
         }
        
         else{
             return false;
         }
   }

}

?>