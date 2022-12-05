<?php
 require_once "config/configGeneral.php";
 require_once "config/db_config.php";
 require_once "Modelos/Reportes.php";
 require_once "Modelos/Sanciones.php";
 require_once "Modelos/Partido.php";
 require_once "Modelos/Jugador.php";

class ReporteController 
{

    public function generarSanciones($id_sancionado,$id_partido,$id_arbitro,$categoria,$dias,$precio,$id_reporte,$descripcion){
        $result = false;
        $sancion= new Sanciones();

        $fecha=date("d").'-'. date("m") .'-'.date("Y");
        echo "la fecha actual es " . $fecha;
        $fecha_actual = date("Y-m-d");
        //sumo 1 día
        $fecha_final= date("Y-m-d",strtotime($fecha_actual."+ ".$dias. " days")); 
        //resto 1 día
       // echo date("d-m-Y",strtotime($fecha_actual."- 1 days")); 

        $sancion->setCodSancionado($id_sancionado);
        $sancion->setCodPartido($id_partido);
        $sancion->setCodArbitro($id_arbitro);
        $sancion->setCategoria($categoria);
        $sancion->setDias_Penalizacion($dias);
        $sancion->setFecha_Sancion($fecha_actual);
        $sancion->setFecha_Fin($fecha_final);
        $sancion->setEstado('Pendiente');
        $sancion->setPrecio($precio);
        $sancion->setIdReporte($id_reporte);
        $sancion->setDescripcion($descripcion);

        if($sancion->Crear_Sancion()){
            $result=true;
        }

        return $result;
   }

    public function crearReporte(){
        $idR='';
        try {
            
        
            if(!empty($_POST)){
            
                if(!empty($_POST[REPORT_ID])){
                    echo " funciono<br>";
                    echo $_POST[REPORT_ID]."<br>";
                    echo $_POST[ARB_ID]."<br>";
                    echo $_POST[PART_ID]."<br>";

                    $idR = $_POST[REPORT_ID];
                    $r= new Reportes();
                    $r->setIdReporte($_POST[REPORT_ID]);
                    $r->setIdPartido($_POST[REPORT_PART]);
                    $r->setNumTarjetas(0);
                    $r->setObservaciones('');
                    $r->Crear_Reporte();

                    echo "-------------------------<br>";
                    $tarjetasE1 = 0;
                    $tarjetasE2 = 0;
                    $golesE1 = 0;
                    $golesE2 = 0;

                    if(isset($_POST["datos1"]) && !empty($_POST["datos1"])){
                            
                        $rows= $_POST["datos1"];
                        echo $rows;
                        $y = $rows + 1;
                        for ($i=1; $i < $y; $i++) { 
                            $cadenaId ="e1-id".$i;
                            $cadenaAmarilla ="e1-amarilla".$i;
                            $cadenaRoja ="e1-roja".$i;
                            $cadenaMotv ="e1-motv".$i;
                            $cadenaDias ="e1-dias".$i;
                            $cadenaPrecio ="e1-precio".$i;
                            $cadenaGol ="e1-gol".$i; 

                            if(isset($_POST[$cadenaId])){

                                //if(!empty($_POST[$cadenaAmarilla]) && !empty($_POST[$cadenaRoja]) && !empty($_POST[$cadenaMotv]) && !empty($_POST[$cadenaDias]) && !empty($_POST[$cadenaPrecio]) && !empty($_POST[$cadenaGol])){
                                    $categoria = "";
                                    echo "----JUGADOR".$i." EQUIPO 1------<br>";
                                    echo $_POST[$cadenaId]."<br>";
                                    echo $_POST[$cadenaAmarilla]."<br>";
                                    echo $_POST[$cadenaRoja]."<br>";
                                    echo $_POST[$cadenaMotv]."<br>";
                                    echo $_POST[$cadenaDias]."<br>";
                                    echo $_POST[$cadenaPrecio]."<br>";
                                    echo $_POST[$cadenaGol]."<br>";

                                    if($_POST[$cadenaAmarilla] == 0 && $_POST[$cadenaRoja] == 0){
                                        echo "----NO hay sancion------<br>";
                                        

                                    }
                                    else{
                                        if($_POST[$cadenaAmarilla] >= 1 && $_POST[$cadenaRoja] == 0){
                                            $categoria = "Leve";
                                        }
                                        elseif ($_POST[$cadenaAmarilla] < 1 && $_POST[$cadenaRoja]>1) {
                                            $categoria = "Grave";
                                        }
                                        elseif ($_POST[$cadenaAmarilla] >= 1 && $_POST[$cadenaRoja]>=1) {
                                            $categoria = "Grave";
                                        }
                                        
                                        $createSan = $this->generarSanciones($_POST[$cadenaId],$_POST[PART_ID],$_POST[ARB_ID],$categoria,$_POST[$cadenaDias],$_POST[$cadenaPrecio],$_POST[REPORT_ID],$_POST[$cadenaMotv]);
                                        //$this->actualizarSancionJugador($_POST[$cadenaId],1);
                                        if($createSan == true){
                                            $this->actualizarSancionJugador($_POST[$cadenaId],1);
                                        }
                                    }
                                    $tarjetasE1 = $tarjetasE1 + $_POST[$cadenaAmarilla] + $_POST[$cadenaRoja];
                                    $golesE1 = $golesE1 +$_POST[$cadenaGol];

                                    $this->actualizarGolesJugador($_POST[$cadenaId],$_POST[$cadenaGol]);
                                    $this->actualizarPartidoJugador($_POST[$cadenaId],1);
                                /*}
                                else{
                                    echo "----NO LLENARON LOS CAMPOS------<br>";
                                }*/
                            }
                            else{
                                echo "----NO HAY JUGADORES EN EL EQUIPO 1------<br>";
                            }
                        }
                    }

                    //CONDICIONES DE SANCIONES 2
                    if(isset($_POST["datos2"]) && !empty($_POST["datos2"])){
                            
                        $rows= $_POST["datos2"];
                        $y = $rows + 1;
                        for ($i=1; $i < $y; $i++) { 
                            $cadenaId ="e2-id".$i;
                            $cadenaAmarilla ="e2-amarilla".$i;
                            $cadenaRoja ="e2-roja".$i;
                            $cadenaMotv ="e2-motv".$i;
                            $cadenaDias ="e2-dias".$i;
                            $cadenaPrecio ="e2-precio".$i;
                            $cadenaGol ="e2-gol".$i;

                            if(isset($_POST[$cadenaId])){

                                //if(!empty($_POST[$cadenaAmarilla]) && !empty($_POST[$cadenaRoja]) && !empty($_POST[$cadenaMotv]) && !empty($_POST[$cadenaDias]) && !empty($_POST[$cadenaPrecio]) && !empty($_POST[$cadenaGol])){
                                    echo "----JUGADOR".$i." EQUIPO 1------<br>";
                                    echo $_POST[$cadenaId]."<br>";
                                    echo $_POST[$cadenaAmarilla]."<br>";
                                    echo $_POST[$cadenaRoja]."<br>";
                                    echo $_POST[$cadenaMotv]."<br>";
                                    echo $_POST[$cadenaDias]."<br>";
                                    echo $_POST[$cadenaPrecio]."<br>";
                                    echo $_POST[$cadenaGol]."<br>";
                                
                                    if($_POST[$cadenaAmarilla] == 0 && $_POST[$cadenaRoja] == 0){
                                        echo "----NO hay sancion------<br>";
                                        
                                    }
                                    else{
                                        if($_POST[$cadenaAmarilla] >= 1 && $_POST[$cadenaRoja] == 0){
                                            $categoria = "Leve";
                                        }
                                        elseif ($_POST[$cadenaAmarilla] < 1 && $_POST[$cadenaRoja]>1) {
                                            $categoria = "Grave";
                                        }
                                        elseif ($_POST[$cadenaAmarilla] >= 1 && $_POST[$cadenaRoja]>=1) {
                                            $categoria = "Grave";
                                        }
        
                                        $this->generarSanciones($_POST[$cadenaId],$_POST[PART_ID],$_POST[ARB_ID],$categoria,$_POST[$cadenaDias],$_POST[$cadenaPrecio],$_POST[REPORT_ID],$_POST[$cadenaMotv]);
                                        $this->actualizarSancionJugador($_POST[$cadenaId],1);
                                    }
                                    $tarjetasE2 = $tarjetasE2 + $_POST[$cadenaAmarilla] + $_POST[$cadenaRoja];
                                    $golesE2 = $golesE2 +$_POST[$cadenaGol];

                                    $this->actualizarGolesJugador($_POST[$cadenaId],$_POST[$cadenaGol]);
                                    $actPart = $this->actualizarPartidoJugador($_POST[$cadenaId],1);
                                //}
                                /*else{
                                    echo "----NO LLENARON LOS CAMPOS------<br>";
                                    echo $_POST[$cadenaId]."<br>";
                                    echo $_POST[$cadenaAmarilla]."<br>";
                                    echo $_POST[$cadenaRoja]."<br>";
                                    echo $_POST[$cadenaMotv]."<br>";
                                    echo $_POST[$cadenaDias]."<br>";
                                    echo $_POST[$cadenaPrecio]."<br>";
                                    echo $_POST[$cadenaGol]."<br>";
                                }*/
                            }
                            else{
                                echo "----NO HAY JUGADORES EN EL EQUIPO 2------<br>";
                            }
                        }
                    }
                    /////
                    
                    echo "Tarjetas E1: ".$tarjetasE1;
                    echo "Tarjetas E2: ".$tarjetasE2;
                    $totalTarjetas = $tarjetasE1 + $tarjetasE2;

                    echo "goles E1: ".$golesE1;
                    echo "goles E2: ".$golesE2;
                   $rm= new Reportes();
                    $rm->setIdReporte($_POST[REPORT_ID]);
                    $rm->setNumTarjetas($totalTarjetas);
                    $rm-> Actualizar_Reporte_NumTarjetas();

                    $partGol = new Partido();
                    $partGol->setIdPartido($_POST[PART_ID]);
                    $partGol->setGoles1($golesE1);
                    $partGol->setGoles2($golesE2);
                    $partGol->Actualizar_Gol1();
                    $partGol->Actualizar_Gol2();
                    
                   
                }
                //require_once "Vistas/prueba.php";
                header('Location: '.BASE_DIR);
    /*
                if($r->Crear_Reporte()){
                    header("Location:".BASE_DIR.'/PanelArbitro/showAdminReporte');
                }
                else{
                    header("Location:".BASE_DIR.'Reporte/showcreateReporte' );
                }
                */

            }
            else{
                echo "No hay datos";
            }
    } catch (Exception $th) {
        $idR = $_POST[REPORT_ID];
        $mensaje = 'Estimado usuario hay un error en la creacion de las sanciones';
        $this->eliminar_reporte($idR);
        require_once "Vistas/Error.php";
        //require_once "Vistas/prueba.php";
    }
    }

    public function showcreateReporte(){
        require_once "Modelos/Jugador.php";
        require_once "Modelos/Partido.php";
        require_once "Modelos/Equipo.php";
        $part= new Partido();
        $d= $part->Ver_Partidos();

        $data_select[T_PARTIDO] = "";

        if ($d != null) {
            $data_select[T_PARTIDO] = $d;           
        }

        if(isset($_POST["partido"])){

            $partido =new Partido();
            $equipo1 = new Equipo();
            $equipo2 = new Equipo();
            $jugadores_e1 = new Jugador();
            $jugadores_e2 = new Jugador();
    
    
    
            //buscamos el partido
            $partido->setIdPartido($_POST['partido']);
            $datos=$partido->Buscar_Partido();
    
            if ($datos != null) {
                $data[T_PARTIDO]=$partido->Buscar_Partido();
                $dato1='';
                $dato2='';
                foreach ($data[T_PARTIDO] as $dato) {
                    $nombrepartido = $dato[PART_NOM];
                    $IDpartido = $dato[PART_ID];
                    $idArb= $dato[PART_ARB];
                    $dato1=$equipo1->setID(strval($dato[PART_EQP1]));
                    $dato2=$equipo2->setID(strval($dato[PART_EQP2]));
                    //echo "<h1>" . $dato[PART_EQP1] . "</h1>";
                    //echo "<h1>" . $dato[PART_EQP2] . "</h1>";
                }
    
                foreach ($data[T_PARTIDO] as $dato) {
                    $dato1=$dato[PART_EQP1];
                    $dato2=$dato[PART_EQP2];
                   // echo "<h1>" . $dato[PART_EQP1] . "</h1>";
                    //echo "<h1>" . $dato[PART_EQP2] . "</h1>";
                }
    
                //$dato1=$equipo1->setID($datos[PART_EQP1]);
                //$dato2=$equipo2->setID($datos[PART_EQP2]);
                $jugadores_e1->setCodEquipo(strval($dato1));
                $jugadores_e2->setCodEquipo(strval($dato2));
    
                $data2[T_JUGADOR]=$jugadores_e1->Buscar_Jugadores_Equipo();
                $data3[T_JUGADOR] = $jugadores_e2->Buscar_Jugadores_Equipo(); 
                require_once "Vistas/CrearReporte.php";
                //header("Location:".BASE_DIR.'Reporte/showcreateReporte' );
    
            }
    
        }      

        require_once "Vistas/CrearReporte.php";

   }

   public function eliminar_reporte($id){
        $san = new Sanciones(); //Creamos una instancia de la clase reporte

        $register_san = $san->Buscar_Sanciones(); //Pedimos la lista de reporte
        //$data[T_SANCIONES] = "";

        if ($register_san  == null) {
            $Reporte = new Reportes();
            $Reporte->Eliminar_Reporte();
            
        }
    
   }
   
   public function actualizarPartidoJugador($id,$n){
        $partidosActuales = 0;
        $jug = new Jugador();
        $jug->setIdJugador($id);
        $registro = $jug->Buscar_Jugador();
        $data[T_JUGADOR]='';

        if($registro != null){
            $data[T_JUGADOR]= $registro;
        }

        foreach ($data[T_JUGADOR] as $k) {
            $partidosActuales = $k[JUG_PART];
        }

        $p = $partidosActuales + $n;
        $jug->setNpartidos($p);
        $jug->Actualizar_Partido();
        
   }

   public function actualizarSancionJugador($id,$s){
    $result = false;
    $sancionesActuales = 0;
        $jug = new Jugador();
        $jug->setIdJugador($id);
        $registro = $jug->Buscar_Jugador();
        $data[T_JUGADOR]='';

        if($registro != null){
            $data[T_JUGADOR]= $registro;
        }

        foreach ($data[T_JUGADOR] as $k) {
            $sancionesActuales = $k[JUG_SANC];
        }

        $p = $sancionesActuales + $s;
        $jug->setNsanciones($p);
        if($jug->Actualizar_Sancion()){
            $result = true;
        }

        return $result;
}

public function actualizarGolesJugador($id,$g){
        $result = false;
        $golesActuales = 0;
        $jug = new Jugador();
        $jug->setIdJugador($id);
        $registro = $jug->Buscar_Jugador();
        $data[T_JUGADOR]='';

        if($registro != null){
            $data[T_JUGADOR]= $registro;
        }

        foreach ($data[T_JUGADOR] as $k) {
            $golesActuales = $k[JUG_GOL];
        }

        $p = $golesActuales + $g;
        $jug->setNgoles($p);
        
        if($jug->Actualizar_Gol()){
            $result = true;
        }
    return $result;
}



   
   public function showReportes(){
        $Reporte = new Reportes(); //Creamos una instancia de la clase reporte

        $registros = $Reporte->Ver_Reportes(); //Pedimos la lista de reporte
        $data[T_REPORTE] = "";

        if ($registros != null) {
            $data[T_REPORTE] = $registros;
            
        }

        require_once "Vistas/lista-reportes.php";
    
    }

    public function showDescripcionReporte(){
        $Reporte = new Reportes(); //Creamos una instancia de la clase Torneo

        $registros = $Reporte->Ver_Reportes(); //Pedimos la lista de torneos
        $dataSelectReporte[T_REPORTE] = "";

        if ($registros != null) {
            $dataSelectReporte[T_REPORTE] = $registros;
            
        }

        require_once "Vistas/DescripcionReporte.php";
    
    }

    public function actualizarObservacion(){
        if(isset($_POST) && !empty($_POST["reporte"]) && !empty($_POST["observacion"])){
            $Reporte = new Reportes();
            $Reporte->setIdReporte($_POST["reporte"]);
            $Reporte->setObservaciones($_POST["observacion"]);
            if($Reporte->Actualizar_Reporte_Observacion()){
                header("Location:".BASE_DIR.'/PanelArbitro/showHome');
            }
            else{
               echo $Reporte->setIdReporte($_POST["reporte"]);
               echo $Reporte->setObservaciones($_POST["observacion"]);
                require_once('Vistas/prueba.php');
                //header("Location:".BASE_DIR.'/Reporte/showDescripcionReporte');
            }
        }
    }

    public function VerDetalleReporte(){
        if(!empty($_POST['idR'])){
            $Reporte = new Reportes();
            $Reporte->setIdReporte($_POST['idR']);
            $registros = $Reporte->Buscar_Reporte(); //Pedimos la lista de reporte
            $data[T_REPORTE] = "";
    
            if ($registros != null) {
                $data[T_REPORTE] = $registros;
                
            }

            $SancionesR = new Sanciones();
            $SancionesR->setIdReporte($_POST['idR']);
            $registros2 = $SancionesR->Buscar_Sanciones(); //Pedimos la lista de reporte
            $data2[T_SANCIONES] = "";
    
            if ($registros2 != null) {
                $data2[T_SANCIONES] = $registros2;
                
            }
        }
        require_once "Vistas/VerDetalleReporte.php";
    }

  public function buscarDireccion($action){
    if ($action=='showcreateReporte') {
           $this->showcreateReporte();
    }
    elseif ($action=="showReportes") {
        $this->showReportes();
    }
    elseif ($action=="crearReporte") {
        $this->crearReporte();
    }
    elseif ($action == "showDescripcionReporte") {
        $this->showDescripcionReporte();
    }
    elseif ($action == "actualizarObservacion") {
        $this->actualizarObservacion();
    }
    elseif ($action == "VerDetalleReporte") {
        $this->VerDetalleReporte();
    }
    else{
        return false;
    }
 }

}

?>