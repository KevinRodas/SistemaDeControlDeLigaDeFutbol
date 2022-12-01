<?php 
//session_start();
class PanelAdministradorController
{
public function __construct()
{
     
}
 public function showHome(){
      require_once "Vistas/PanelAdministrador.php";
      //require_once "Vistas/AdministrarPartidos.php";
 }

 public function showAdminPartido(){
     require_once "Vistas/AdministrarPartidos.php";
     
}
public function showAdminEquipo(){
     require_once "Vistas/AdministrarEquipos.php";

}
public function cancelarSancion(){
    require_once "Modelos/Partido.php";
    require_once "Modelos/Sanciones.php";

    $san = new Sanciones();
    $sanciones = $san->Buscar_Sanciones_Pendientes();
    $data[T_SANCIONES] = "";
    if ($sanciones != null) {
        $data[T_SANCIONES] = $sanciones;
    }
    

    if(isset($_POST['sancionado'])){
        if(!empty($_POST['sancionado']) && $_POST['sancionado'] != 0){
            $san2 = new Sanciones();
            $san2->setCodSancionado($_POST['sancionado']);
            $registro2=$san2->Buscar_Sanciones_Sancionado();
            $dataJugSanciones[T_SANCIONES] = "";

            if ($registro2 != null) {
                $dataJugSanciones[T_SANCIONES] = $registro2;
                $usuario= $_POST['sancionado'];
            }

        }
        else{
            header("Location:".BASE_DIR.'PanelAdministrador/cancelarSancion' );
        }

    }
    /*
    $Partido = new Partido(); //Creamos una instancia de la clase Torneo

        $registros = $Partido->Ver_Partidos(); //Pedimos la lista de torneos
        $data[T_PARTIDO] = "";

        if ($registros != null) {
            $data[T_PARTIDO] = $registros;
        }

        if(isset($_POST['partido'])){
            if(!empty($_POST['partido']) && $_POST['partido'] != 0){
                $san = new Sanciones();
                $san->setCodPartido($_POST['partido']);
                $registro2=$san->Buscar_Sanciones_Partido();
                $dataJugSanciones[T_SANCIONES] = "";

                if ($registro2 != null) {
                    $dataJugSanciones[T_SANCIONES] = $registro2;
                }

            }
            else{
                header("Location:".BASE_DIR.'PanelAdministrador/cancelarSancion' );
            }
            


        }*/

     require_once "Vistas/CancelacionSancion.php";


}


public function buscarPrecio_CancelarSancion($id){
    $san = new Sanciones();
    $san->setCodSancionado($id);
    $register=$san->Buscar_Sanciones_Partido();
    $datoSancionado[T_SANCIONES] = "";

    if ($register != null) {
        $datoSancionado[T_SANCIONES] = $register;
    }

    return $datoSancionado[T_SANCIONES];

}

public function showAdminNoticias(){
     //require_once "Vistas/";
}

 public function showAdminMiembro(){
     require_once "Vistas/AdministrarMiembros.php";
 }

 public function showAdminLocal(){
     require_once "Vistas/AdministrarEstadio.php";
}

public function showAdminTorneo(){
    require_once "Vistas/AdministrarTorneo.php";
}

public function buscarDireccion($action){
     if ($action=='showHome') {
          $this->showHome();
     }
      elseif ($action=="showAdminPartido") {
          $this->showAdminPartido();
     }
     elseif ($action=='showAdminEquipo') {
          $this->showAdminEquipo();
      }
      elseif ($action=='cancelarSancion') {
          $this->cancelarSancion();
      }
      elseif ($action=='showAdminNoticias') {
          $this->showAdminNoticias();
      }
      elseif ($action=='showAdminMiembro') {
          $this->showAdminMiembro();
      }
      elseif ($action == 'showAdminLocal') {
          $this->showAdminLocal();
      }
      elseif ($action == 'showAdminTorneo') {
        $this->showAdminTorneo();
      }
      elseif ($action == 'showAdminMiembro') {
        $this->showAdminMiembro();
      }
      else{
          return false;
      }
}

}

?>