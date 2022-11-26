<?php

class PanelArbitroController
{
public function __construct()
{
   
}
 public function showHome(){
    require_once "Vistas/PanelArbitro.php";
 }
 public function buscarDireccion($action){
   if ($action=='showHome') {
       $this->showHome();
   }
   
   else{
       return false;
   }
}

}
?>