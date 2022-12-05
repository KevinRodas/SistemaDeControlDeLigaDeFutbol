<?php
require_once "Modelos/Equipo.php";
require_once "Modelos/Jugador.php";
require_once "Modelos/Partido.php";
class PanelRepresentanteController
{

 public function showHome(){
      require_once "Vistas/PanelRepresentante.php";
  
 }
 
 public function showListadoPartidos(){
     $eq='';
     $e = new Equipo();
        $e->setIdRepre($_COOKIE['User']);
        $registros = $e->buscar_Equipo_repre();
        $data[T_EQUIPO] = "";

        if ($registros != null) {
            $data[T_EQUIPO] = $registros; 
        }    

        foreach ( $data[T_EQUIPO] as $k) {
             $eq = $k[EQP_ID];
        }
     
     $Partido = new Partido(); //Creamos una instancia de la clase Torneo
     $Partido->setIdEquipo1($eq);
     $registro2 = $Partido->Buscar_Partido_Equipo(); //Pedimos la lista de torneos
     $data[T_PARTIDO] = "";

     if ($registro2 != null) {
         $data[T_PARTIDO] = $registro2;
         
     }

     require_once "Vistas/ListadoPartidosRepre.php";
 }

 public function showListadoJugadores(){
      $eq='';
     $e = new Equipo();
        $e->setIdRepre($_COOKIE['User']);
        $registros = $e->buscar_Equipo_repre();
        $data[T_EQUIPO] = "";

        if ($registros != null) {
            $data[T_EQUIPO] = $registros; 
        }    

        foreach ( $data[T_EQUIPO] as $k) {
             $eq = $k[EQP_ID];
        }
        
        $Jugador = new Jugador(); //Creamos una instancia de la clase Torneo
        $Jugador->setCodEquipo($eq);
        $registros = $Jugador->Buscar_Jugadores_Equipo(); //Pedimos la lista de torneos
        $data[T_JUGADOR] = "";

        if ($registros != null) {
            $data[T_JUGADOR] = $registros;           
        }


        require_once "Vistas/ListadoJugadores.php";
 }

 public function buscarDireccion($action){
     if ($action=='showHome') {
         $this->showHome();
     }
     elseif ($action=="showListadoJugadores") {
         $this->showListadoJugadores();
     }
     elseif ($action=="showListadoPartidos") {
         $this->showListadoPartidos();
     }
     else{
         return false;
     }
 }
}
?>