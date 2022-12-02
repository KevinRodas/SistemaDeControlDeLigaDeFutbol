<?php
 require_once "config/configGeneral.php";
 require_once "config/db_config.php";
 require_once "Modelos/Partido.php";
 require_once "Modelos/Equipo.php";
require_once "Modelos/Torneo.php";
require_once "Modelos/Arbitro.php";
require_once "Modelos/Estadio.php";
require_once "Modelos/Horario.php";
require_once "Modelos/Mensaje.php";
class PartidosController 
{
    public function crearPartido(){
        require_once "Modelos/Equipo.php";

        if(!empty($_POST)){
           
            $p= new Partido();
            $e1 = new Equipo();
            $e2 = new Equipo();

            $nomPart="PART_".$_POST[PART_EQP1]."_VS_".$_POST[PART_EQP2];

            $p->setNomPartido($nomPart);
            $p->setIdTorneo($_POST[PART_TORNEO]);
            $p->setEstado('Pendiente');
            $p->setIdEquipo1($_POST[PART_EQP1]);
            $p->setIdEquipo2($_POST[PART_EQP2]);
            $p->setSolvencia1('Pendiente');
            $p->setSolvencia2('Pendiente');
            $p->setIdArbitro($_POST[PART_ARB]);
            $p->setGoles1(0);
            $p->setGoles2(0);
            $p->setEstadoRepresentante1('Sin Confirmar');
            $p->setEstadoRepresentante2('Sin Confirmar');

            


            //buscar representantes
            $datos1[T_EQUIPO]='';
            $datos2[T_EQUIPO]='';
            $e1->setID($_POST[PART_EQP1]);
            $datos1[T_EQUIPO]= $e1->buscar_Equipos();
            $repre1='';

            if ($datos1[T_EQUIPO] != null) {
                foreach ($datos1[T_EQUIPO] as $d) {
                    $repre1= $d[EQP_REPRE];
                }
            }

            $e2->setID($_POST[PART_EQP2]);
            $datos2[T_EQUIPO]= $e2->buscar_Equipos();
            $repre2='';
            if ($datos2[T_EQUIPO] != null) {
                foreach ($datos2[T_EQUIPO] as $d) {
                    $repre2= $d[EQP_REPRE];
                }
            }
           
            $p->setIdRepresentante1($repre1);
            $p->setIdRepresentante2($repre2);

            

          

                     


            //Establecer Horario
            if($p->Crear_Partido()){

                $datosP[T_PARTIDO]= $p->Buscar_ID_Partido();
                $idPartido='';
                if ($datosP[T_PARTIDO] != null) {
                    foreach ($datosP[T_PARTIDO] as $d) {
                        $idPartido= $d[PART_ID];
                    }
                }
                
               

                $h = new Horario();
                $h->setFecha($_POST[HOR_FECHA]);
                $h->setHoraInicio($_POST[HOR_INICIO]);
                $h->setIdPartido($idPartido);
                $h->setIdEstadio($_POST[HOR_ESTADIO]);
    
                $estadio = new Estadio();
                $estadio->setId($_POST[EST_ID]);
                $estadio->setDisponibilidad('No Disponible');

                $mensaje1 = "Buenas tardes /n
            Me comunico por este medio para solicitar su confirmacion de participacion
            en el partido ".$nomPart." el cual su equipo jugara contra el equipo ".$_POST[PART_EQP2]."
            el cual sera a las ".$_POST[HOR_INICIO]." el ". $_POST[HOR_FECHA]."\n\n
            Esperamos su pronta respuesta. Saludos\n
            Atte. ADFA San Miguel";

            $mensaje2 = "Buenas tardes /n
            Me comunico por este medio para solicitar su confirmacion de participacion
            en el partido ".$nomPart." el cual su equipo jugara contra el equipo ".$_POST[PART_EQP1]."
            el cual sera a las ".$_POST[HOR_INICIO]." el ". $_POST[HOR_FECHA]."\n\n
            Esperamos su pronta respuesta. Saludos\n
            Atte. ADFA San Miguel";

            $msj= new Mensaje();
            $msj->setIdPartido($idPartido);
            $msj->setIdEmisor($_COOKIE["User"]);
            $msj->setIdReceptor($repre1);
            $msj->setAsunto('Solicitud de confirmacion de participacion');
            $msj->setContenido($mensaje1);
            $msj->setTipo($_POST['Consulta']);
            $msj->setEstadoMensaje('No leido');

            $msj2= new Mensaje();
            $msj2->setIdPartido($_POST[MSJ_PART]);
            $msj2->setIdEmisor($_COOKIE["User"]);
            $msj2->setIdReceptor($_POST[$repre2]);
            $msj2->setAsunto('Solicitud de confirmacion de participacion');
            $msj2->setContenido($_POST[MSJ_CONTENIDO]);
            $msj2->setTipo($_POST['Consulta']);
            $msj2->setEstadoMensaje('No leido');
                
                if($h->Crear_Horario() && $estadio->Actualizar_Disponibilidad()){
                    if($msj->Crear_Mensaje() && $msj2->Crear_Mensaje()){
                        header("Location:".BASE_DIR.'/PanelAdministrador/showAdminPartido');
                    }
                    

                }
            }
            else{
                header("Location:".BASE_DIR.'Partido/showcreatePartido' );
            }
            

        }
        else{
            echo "No hay datos";
        }

    }

    public function showcreatePartido(){
        require_once "Modelos/Equipo.php";
        require_once "Modelos/Torneo.php";
        require_once "Modelos/Arbitro.php";

        $equipo = new Equipo(); //Creamos una instancia de la clase reporte

        $registros = $equipo->Ver_Equipos_Activos(); //Pedimos la lista de reporte
        $data[T_EQUIPO] = "";

        if ($registros != null) {
            $data[T_EQUIPO] = $registros;
            
        }

        $arbitro= new Arbitro();
        $registro2= $arbitro->Ver_Arbitro();
        if ($registro2 != null) {
            $data[T_ARBITRO] = $registro2;
            
        }

        $torneo= new Torneo();
        $registro3= $torneo->get_Torneos();
        if ($registro3 != null) {
            $data[T_TORNEO] = $registro3;
            
        }

        $est= new Estadio();
        $registro4= $est->get_Estadios_Disponible();
        if ($registro4 != null) {
            $data[T_ESTADIO] = $registro4;
            
        }


        require_once "Vistas/CrearPartido.php";
        
   }
   public function showPartidos(){
        $Partido = new Partido(); //Creamos una instancia de la clase Torneo

        $registros = $Partido->Ver_Partidos(); //Pedimos la lista de torneos
        $data[T_PARTIDO] = "";

        if ($registros != null) {
            $data[T_PARTIDO] = $registros;
            
        }

        require_once "Vistas/ListaPartidos.php";
    
    }

    public function showSolvencia(){
        $Partido = new Partido(); //Creamos una instancia de la clase Torneo

        $registros = $Partido->Buscar_Partido_Solventar(); //Pedimos la lista de torneos
        $data[T_PARTIDO] = "";

        if ($registros != null) {
            $data[T_PARTIDO] = $registros;
        }

        if(!empty($_POST['partido'])){
            //echo $_POST['partido'];
            $Partido2 = new Partido();
            $Partido2->setIdPartido($_POST['partido']);
            $registro2 = $Partido2->Buscar_Partido();
            $data2[T_PARTIDO]="";
            if ($registro2 != null) {
                $data2[T_PARTIDO] = $registro2;
                //echo $_POST['partido'];
                

            }
        }
        require_once "Vistas/SolvenciaPartido.php";

    }

    public function actualizarSolvencia(){
        //echo $_POST['solvencia1']."<br>";
        echo $_POST['solvencia2']."<br>";

        if(isset($_POST['solvencia1']) && isset($_POST['solvencia2'])){
            if(!empty($_POST['solvencia1']) && !empty($_POST['solvencia2'])){
                if($_POST['solvencia1'] == 1 && $_POST['solvencia2'] == 1){
                    echo "El equipo 1 esta solvente\n";
                    $part= new Partido();
                    $part->setIdPartido($_POST['partidoID']);
                    $part->setSolvencia1('Solventada');
                    //$part->Actualizar_Solvencia1();
    
                    echo "El equipo 2 esta solvente\n";
                    $part2= new Partido();
                    $part2->setIdPartido($_POST['partidoID']);
                    $part2->setSolvencia1('Solventada');
                    
    
                    if($part->Actualizar_Solvencia1() ){
                        if($part2->Actualizar_Solvencia2()){
                            header("Location:".BASE_DIR.'/PanelArbitro/showHome');
                            //require_once "Vistas/prueba.php";
                        }
                        else{
                            header("Location:".BASE_DIR.'/Partidos/showSolvencia');
                        }
                        
                    }
                }

                else if($_POST['solvencia1'] == 1 && $_POST['solvencia2'] != 1){
                    echo "El equipo 1 esta solvente\n";
                    $part= new Partido();
                    $part->setIdPartido($_POST['partidoID']);
                    $part->setSolvencia1('Solventada');
                    //$part->Actualizar_Solvencia1();
    
                    if($part->Actualizar_Solvencia1() ){
                            header("Location:".BASE_DIR.'/PanelArbitro/showHome');
                            //require_once "Vistas/prueba.php";                        
                    }
                    else {
                        header("Location:".BASE_DIR.'/Partidos/showSolvencia');
                    }
                }

                else if($_POST['solvencia2'] == 1 && $_POST['solvencia1'] != 1){
                   
                    echo "El equipo 2 esta solvente\n";
                    $part2= new Partido();
                    $part2->setIdPartido($_POST['partidoID']);
                    $part2->setSolvencia1('Solventada');
                    
                        if($part2->Actualizar_Solvencia2()){
                            header("Location:".BASE_DIR.'/PanelArbitro/showHome');
                            //require_once "Vistas/prueba.php";
                        }
                        else {
                            header("Location:".BASE_DIR.'/Partidos/showSolvencia');
                        }
                }
    
            }
            else{
                header("Location:".BASE_DIR.'/Partidos/showSolvencia');

            }
        }
        else if(isset($_POST['solvencia1'])){
            if(!empty($_POST['solvencia1'])){
                if($_POST['solvencia1']==1){
                    echo "El equipo 1 esta solvente\n";
                    $part= new Partido();
                    $part->setSolvencia1('Solventada');
                    $part->setIdPartido($_POST['partidoID']);
    
                    if($part->Actualizar_Solvencia1()){
                        header("Location:".BASE_DIR.'/PanelArbitro/showHome');
                        //require_once "Vistas/prueba.php";
                    }
                    else {
                        header("Location:".BASE_DIR.'/´Partidos/showSolvencia');

                    }
                }
    
            }
            else{
                header("Location:".BASE_DIR.'/Partidos/showSolvencia');

            }
        }
        else if(isset($_POST['solvencia2'])){
            if(!empty($_POST['solvencia2'])){
                if($_POST['solvencia2']==1){
                    echo "El equipo 2 esta solvente\n";
                    $part= new Partido();
                    $part->setSolvencia2('Solventada');
                    $part->setIdPartido($_POST['partidoID']);
    
                    if($part->Actualizar_Solvencia2()){
                        //require_once "Vistas/prueba.php";
                        header("Location:".BASE_DIR.'/PanelArbitro/showHome');
                    }
                    else{
                        header("Location:".BASE_DIR.'/Partidos/showSolvencia');
                    }
                }
                else{
                    header("Location:".BASE_DIR.'/Partidos/showSolvencia');

                }
            }
        }
        else{
            header("Location:".BASE_DIR.'/Partidos/showSolvencia');

        }


        

        //require_once "Vistas/prueba.php";
    }

  public function buscarDireccion($action){
    if ($action=='showcreatePartido') {
           $this->showcreatePartido();
    }
    elseif ($action=="showPartidos") {
        $this->showPartidos();
    }
    elseif ($action=="crearPartido") {
        $this->crearPartido();
    }
    elseif ($action=="showSolvencia") {
        $this->showSolvencia();
    }
    elseif ($action=="actualizarSolvencia") {
        $this->actualizarSolvencia();
    }
    else{
        return false;
    }
 }

}

?>