<?php
 require_once "config/configGeneral.php";
 require_once "config/db_config.php";
 require_once "Modelos/Reportes.php";
class ReporteController 
{
    public function crearReporte(){
        if(!empty($_POST)){
           
            if(!empty($_POST[REPORT_ID])){
                echo " funciono<br>";
                echo  $_POST[REPORT_ID]."<br>";
                echo  $_POST[ARB_ID]."<br>";
                echo "-------------------------<br>";
                echo $_POST["e1-id1"]."<br>";
                echo $_POST['e1-amarilla1']."<br>";
                echo $_POST['e1-roja1']."<br>";
                echo $_POST['e1-motv1']."<br>";
                echo $_POST['e1-dias1']."<br>";
                echo $_POST['e1-precio1']."<br>";
                echo "-------------------------<br>";
                echo $_POST['e1-id2']."<br>";
                echo $_POST['e1-amarilla2']."<br>";
                echo $_POST['e1-roja2']."<br>";
                echo $_POST['e1-motv2']."<br>";
                echo $_POST['e1-dias2']."<br>";
                echo $_POST['e1-precio2']."<br>";

                $r= new Reportes();
                $r->setIdReporte($_POST[REPORT_ID]);
                $r->setIdPartido($_POST[REPORT_PART]);
                $r->setNumTarjetas($_POST[REPORT_TARJ]);
                $r->setObservaciones('');
            }
           //echo $_POST[REPORT_ID];
            $r= new Reportes();
            //$r->setIdReporte($_POST[REPORT_ID]);
            //$r->setIdPartido($_POST[REPORT_PART]);
            //$r->setNumTarjetas($_POST[REPORT_TARJ]);
            //$r->setObservaciones($_POST[REPORT_OBSERV]);
            require_once "Vistas/prueba.php";
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

   public function generar(){
    require_once "Modelos/Jugador.php";
    require_once "Modelos/Partido.php";
    require_once "Modelos/Equipo.php";
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
   }
   
   public function generarSanciones($id_sancionado,$id_partido,$id_arbitro,$categoria,$dias,$precio){
        require_once "Modelos/Sanciones.php";
        $sancion= new Sanciones();

        $fecha_actual = date("d-m-Y");
        //sumo 1 día
        $fecha_final= date("d-m-Y",strtotime($fecha_actual."+".$dias. " days")); 
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

        $sancion->Crear_Sancion();


   }


   
   public function showReportes(){
        $Reporte = new Reportes(); //Creamos una instancia de la clase Torneo

        $registros = $Reporte->Ver_Reportes(); //Pedimos la lista de torneos
        $data[T_REPORTE] = "";

        if ($registros != null) {
            $data[T_REPORTE] = $registros;
            
        }

        require_once "Vistas/";
    
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
    elseif ($action=="generar") {
        $this->generar();
    }
    else{
        return false;
    }
 }

}

?>