<?php
 require_once "config/configGeneral.php";
 require_once "config/db_config.php";
 require_once "Modelos/Jugador.php";
 require_once "Modelos/Usuario.php";
class JugadorController 
{
    public function createMensaje(){
        $m=NULL;
        if(!empty($_POST)){
            $j= new Jugador();
            $j->setIdJugador($_POST[U_ID]);
            $j->setCodEquipo($_POST[JUG_EQP]);
            $j->setNpartidos(0);
            $j->setNsanciones(0);
            $j->setNgoles(0);

            $u = new Usuario();
            $u->setUsuario($_POST[U_ID]);
            $u->setNombre($_POST[U_NOM]);
            $u->setApellido($_POST[U_LN]);
            $u->setEdad($_POST[U_AGE]);
            $u->setNtelefono($_POST[U_TEL]);
            $u->setCorreo($_POST[U_MAIL]);
            $u->setContra($_POST[U_PASS]);
            $u->setRol("Jugador");
            
            if ($u->Crear_Usuario() && $j->Crear_Jugador()) {
                header("Location:".BASE_DIR.'/AdministrarMiembros/showAdminJugador');
                    
             }
            else{
                $m = "Error al crear jugador";
                header("Location:".BASE_DIR.'Jugador/showRegistro');
            }
        

        }
        else{
            echo "No hay datos";
        }

    }

    public function updateJugador(){
         /*if(!empty($_POST)){
           
            $j= new Jugador();
            $j->setDisponibilidad("Disponible");
            if($j->Actualizar_Disponibilidad()){
                header("Location:".BASE_DIR.'/PanelAdministrador/showAdminLocal');
            }
            else{
                header("Location:".BASE_DIR.'Estadio/updateEstadio' );
            }
        }
        else{
            echo "No hay datos";
        }*/

    }

    public function showRedactar(){
        require_once "Controladores/EquipoController.php";
        $e = new EquipoController();
        $e->showEquipos();
        require_once "Vistas/RegistrarJugadores.php";
        
    }

    public function showUpdate(){
        require_once "Vistas/ActualizarJugadores.php";
    }

    public function showListado(){
        $Jugador = new Jugador(); //Creamos una instancia de la clase Torneo

        $registros = $Jugador->Ver_Jugadores(); //Pedimos la lista de torneos
        $data[T_JUGADOR] = "";

        if ($registros != null) {
            $data[T_JUGADOR] = $registros;           
        }
        require_once "Vistas/ListadoJugadores.php";
    }

    public function showListadoEquipo($equipo){
        $Jugador = new Jugador(); //Creamos una instancia de la clase Torneo

        $registros = $Jugador->Ver_Jugadores(); //Pedimos la lista de torneos
        $data[T_JUGADOR] = "";

        if ($registros != null) {
            $data[T_JUGADOR] = $registros;           
        }
        require_once "Vistas/ListadoJugadores.php";
    }

    //public function showDelete()

    public function buscarDireccion($action){
        if ($action=='showRegistro') {
            $this->showRegistro();
        }
        elseif ($action=="showListado") {
            $this->showListado();
        }
        elseif ($action=="showUpdate") {
            $this->showUpdate();
        }
        elseif ($action=="createJugador") {
            $this->createJugador();
        }
        elseif ($action=="updateJugador") {
            $this->updateJugador();
        }
        else{
            return false;
        }
    }

}