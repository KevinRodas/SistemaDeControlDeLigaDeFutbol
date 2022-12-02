<?php
 require_once "config/configGeneral.php";
 require_once "config/db_config.php";
 require_once "Modelos/Mensaje.php";
 require_once "Modelos/Usuario.php";
class MensajeriaController 
{
    public function createMensaje(){
        $m=NULL;
        if(!empty($_POST)){
            $msj= new Mensaje();
            $msj->setIdPartido($_POST[MSJ_PART]);
            $msj->setIdEmisor($_COOKIE["User"]);
            $msj->setIdReceptor($_POST[MSJ_RECEPTOR]);
            $msj->setAsunto($_POST[MSJ_ASUNTO]);
            $msj->setContenido($_POST[MSJ_CONTENIDO]);
            $msj->setTipo($_POST[MSJ_TIPO]);
            $msj->setEstadoMensaje('No leido');

                
            if ($msj->Crear_Mensaje()) {
                header("Location:".BASE_DIR);
                    
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

    public function updateEstadoMensaje($id){
        $result=false;
        $m=NULL;
        if(!empty($_POST)){
            $msj= new Mensaje();
            $msj->setIdMensaje($id);
            $msj->setEstadoMensaje('Leido');

                
            if ($msj->Actualizar_Estado_Mensaje()) {
                $result=true;
                    
             }
        return $result;

        }
    }
    public function showRedactar(){
        require_once "Modelos/Equipo.php";
        if(isset($_POST) && !empty($_POST[MSJ_ID])){
            $Mensaje = new Mensaje();
            $Mensaje->setIdMensaje($_POST[MSJ_ID]);
            $registros = $Mensaje->Ver_Mensaje(); //Pedimos la lista de torneos
            $data[T_MENSAJERIA] = "";

            if ($registros != null) {
                $data[T_MENSAJERIA] = $registros;           
            }

            foreach ($data[T_MENSAJERIA] as $d) {
                if($d[MSJ_EST]=='No leido' && $d[MSJ_RECEPTOR]==$_COOKIE['User']){
                    $this->updateEstadoMensaje($_POST[MSJ_ID]);
                }
            }

            $Equipo = new Equipo();
            $registros2 = $Equipo->Ver_Equipos_Activos(); //Pedimos la lista de torneos
            $data[T_EQUIPO] = "";

            if ($registros != null) {
                $data[T_EQUIPO] = $registros2;           
            }

            require_once "Vistas/RedactarMensaje.php";
        }
    }

    public function showMensaje(){
        if(isset($_POST) && !empty($_POST[MSJ_ID])){
            $Mensaje = new Mensaje();
            $Mensaje->setIdMensaje($_POST[MSJ_ID]);
            $registros = $Mensaje->Ver_Mensaje(); //Pedimos la lista de torneos
            $data[T_MENSAJERIA] = "";

        if ($registros != null) {
            $data[T_MENSAJERIA] = $registros;           
        }

        foreach ($data[T_MENSAJERIA] as $d) {
            if($d[MSJ_EST]=='No leido' && $d[MSJ_RECEPTOR]==$_COOKIE['User']){
                $this->updateEstadoMensaje($_POST[MSJ_ID]);
            }
        }
        /*require_once "Controladores/EquipoController.php";
        $e = new EquipoController();
        $e->showEquipos();*/
        require_once "Vistas/VerMensaje.php";
        
    }
}

    public function showMensajes(){
        $Mensaje = new Mensaje();
        $Mensaje->setIdEmisor($_COOKIE['User']);
        $registros = $Mensaje->Mostrar_Mensajes(); //Pedimos la lista de torneos
        $data[T_MENSAJERIA] = "";

        if ($registros != null) {
            $data[T_MENSAJERIA] = $registros;           
        }
        
        require_once "Vistas/ListaMensajes.php";
    }

    public function showMensajesRecibidos(){
        $Mensaje = new Mensaje();
        $Mensaje->setIdReceptor($_COOKIE['User']);
        $registros = $Mensaje->Mostrar_Mensajes_Recibidos(); //Pedimos la lista de torneos
        $data[T_MENSAJERIA] = "";

        if ($registros != null) {
            $data[T_MENSAJERIA] = $registros; 
        }    
        require_once "Vistas/ListaMensajes.php";
    }

    public function showMensajesEnviados(){
        $Mensaje = new Mensaje();
        $Mensaje->setIdEmisor($_COOKIE['User']);
        $registros = $Mensaje->Mostrar_Mensajes_Enviados(); //Pedimos la lista de torneos
        $data[T_MENSAJERIA] = "";

        if ($registros != null) {
            $data[T_MENSAJERIA] = $registros; 
        }    

        require_once "Vistas/ListaMensajes.php";
    }

    //public function showDelete()

    public function buscarDireccion($action){
        if ($action=='createMensaje') {
            $this->createMensaje();
        }
        elseif ($action=="showRedactar") {
            $this->showRedactar();
        }
        elseif ($action=="showMensajes") {
            $this->showMensajes();
        }
        elseif ($action=="showMensaje") {
            $this->showMensaje();
        }
        elseif ($action=="showMensajesRecibidos") {
            $this->showMensajesRecibidos();
        }
        elseif ($action=="showMensajesEnviados") {
            $this->showMensajesEnviados();
        }
        else{
            return false;
        }
    }

}