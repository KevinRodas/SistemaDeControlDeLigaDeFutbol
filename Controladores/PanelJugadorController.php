<?php
require_once "Modelos/Partido.php";
require_once "Modelos/Jugador.php";
require_once "Modelos/Sanciones.php";
class PanelJugadorController{
public function __construct(){

}

 public function showHome(){
    require_once "Vistas/PanelJugador.php";
 }

 public function showSanciones(){
    $u = $_COOKIE['User'];
    $sanciones = new Sanciones();
    $sanciones->setCodSancionado($u);
    $registros = $sanciones->Buscar_Sanciones_Jugador();

    $data[T_SANCIONES] = "";

    if ($registros != null) {
        $data[T_SANCIONES] = $registros;           
    }

    require_once "Vistas/SancionesJugador.php";
 }

 public function showPartidos(){
    $Jug = new Jugador();
    $equipoJug='';
    $Jug->setIdJugador($_COOKIE['User']);
    $registroJug = $Jug->Buscar_Jugador();
    $data[T_JUGADOR] = "";
    if ($registroJug != null) {
        $data[T_JUGADOR] = $registroJug;           
    }

    foreach ($data[T_JUGADOR]  as $k) {
        $equipoJug = $k[JUG_EQP];
    }

    $p = new Partido();
    $p->setIdEquipo1($equipoJug);
    $registros = $p->Buscar_Partido_Equipo(); //Pedimos la lista de torneos
        $data[T_PARTIDO] = "";

    if ($registros != null) {
        $data[T_PARTIDO] = $registros;           
    }

    require_once "Vistas/PartidosJugador.php";
 }

 public function buscarDireccion($action){
   if ($action=='showHome') {
       $this->showHome();
   }
   elseif ($action=='showPartidos') {
       $this->showPartidos();
   }
   elseif ($action=='showSanciones') {
    $this->showSanciones();
}
   else{
       return false;
   }
}

}
?>