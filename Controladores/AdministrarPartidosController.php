<?php
class AdministrarPartidosController{
    public function __construct()
    {
         
    }
     public function createPartido(){
          require_once "Vistas/CrearPartido.php";
          //require_once "Vistas/AdministrarPartidos.php";
     }
     public function showReporte(){
        require_once "Vistas/lista-reportes.php";
        //require_once "Vistas/AdministrarPartidos.php";
   }
   public function showPartido(){
        require_once "Vistas/partidos.php";
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