<?php
 require_once "config/configGeneral.php";
 require_once "config/db_config.php";
 require_once "Modelos/Mensaje.php";
 require_once "Modelos/Usuario.php";
 require_once "Modelos/Equipo.php";
 require_once "Modelos/Partido.php";
class MensajeriaController 
{
    public function actualizarNomPart($id){
        $ActPart = new Partido();
        $ActPart->setIdPartido($id);
        $register = $ActPart->Buscar_Partido();
        $dato[T_PARTIDO]='';
        $nombre='';

        if($register != null){
            $dato[T_PARTIDO]= $register;
        }

        foreach ($dato[T_PARTIDO] as $k) {
            $nombre = 'PART_'.$k[PART_EQP1].'_VS_'.$k[PART_EQP2];
        }
        $ActPart->setNomPartido($nombre);
        $ActPart->Actualizar_NombrePartido();

        //return $nombre;
    }


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

            if($_POST[MSJ_TIPO]=='Confirmacion'){
                                
                if($this->actualizar_EstadoRepresentante($_POST[MSJ_PART],$_COOKIE["User"]) &&  $this->actualizarNomPart($_POST[MSJ_PART])){
                    if($msj->Crear_Mensaje()){
                        header("Location:".BASE_DIR);
                    }
                }
                
                
            }

            if($_POST[MSJ_TIPO]=='Rechazo'){
                echo "Rechazo";
                if($msj->Crear_Mensaje()){
                    header("Location:".BASE_DIR);
                }
            }

            if($_POST[MSJ_TIPO]=='Consulta'){

                if ($_POST['repre']== 1) {

                    $idEquipo='';
                    $Eq= new Equipo();
                    $Eq->setIdRepre($_POST[MSJ_RECEPTOR]);
                    $busq= $Eq->buscar_Equipo_repre();
                    $dataT[T_EQUIPO]='';

                    if($busq != null){
                        $dataT[T_EQUIPO]=$busq;
                    }

                    foreach ($dataT[T_EQUIPO] as $r) {
                        $idEquipo = $r[EQP_ID];
                    }

                    $ActPart = new Partido();
                    $ActPart->setIdPartido($_POST[MSJ_PART]);
                    $ActPart->setIdRepresentante1($_POST[MSJ_RECEPTOR]);
                    $ActPart->setIdEquipo1($idEquipo);
                    
                    

                    if($ActPart->Actualizar_ID_Equipo1() && $ActPart->Actualizar_Repre_Equipo1() ){
                        if($msj->Crear_Mensaje()){
                            header("Location:".BASE_DIR);
                        }
                        else{
                            $mensaje = "Error al crear Mensaje";
                            header("Location:".BASE_DIR.'Vistas/Error.php;');
                        }
                    }
                    
                }
                else if ($_POST['repre']== 2) {

                    $idEquipo='';
                    $Eq= new Equipo();
                    $Eq->setIdRepre($_POST[MSJ_RECEPTOR]);
                    $busq= $Eq->buscar_Equipo_repre();
                    $dataT[T_EQUIPO]='';

                    if($busq != null){
                        $dataT[T_EQUIPO]=$busq;
                    }

                    foreach ($dataT[T_EQUIPO] as $r) {
                        $idEquipo = $r[EQP_ID];
                    }

                    $ActPart = new Partido();
                    $ActPart->setIdPartido($_POST[MSJ_PART]);
                    $ActPart->setIdRepresentante2($_POST[MSJ_RECEPTOR]);
                    $ActPart->setIdEquipo2($idEquipo);

                    $name = $this->actualizarNomPart($_POST[MSJ_PART]);
                    
                    if($ActPart->Actualizar_ID_Equipo2() && $ActPart->Actualizar_Repre_Equipo2() ){
                        if($msj->Crear_Mensaje()){
                            header("Location:".BASE_DIR);
                        }
                        else{
                            $mensaje = "Error al crear Mensaje";
                            header("Location:".BASE_DIR.'Vistas/Error.php;');
                        }
                    }
                }

                //$this->actualizar_EstadoRepresentante($_POST[MSJ_PART],$_COOKIE["User"]);
            }
                    
        }
        else{
            echo "No hay datos";
        }

    }
    public function actualizar_EstadoRepresentante($idPartido,$repre){
        $r1='';
        $r2='';
        $M=new Partido();
        $M->setIdPartido($idPartido);
        $registro=$M->Buscar_Partido();
        $data[T_PARTIDO]='';

        if($registro!=null){
            $data[T_PARTIDO]=$registro;
        }

        foreach ($data[T_PARTIDO] as $d) {
            $r1= $d[PART_REPRE1];
            $r2= $d[PART_REPRE2];
        }
        if($repre == $r1){
            $M->setEstadoRepresentante1('Confirmado');
            $M->Actualizar_Representante1();
        }
        elseif ($repre == $r2) {
            $M->setEstadoRepresentante2('Confirmado');
            $M->Actualizar_Representante2();
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