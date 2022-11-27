<?php
 require_once "config/configGeneral.php";
 require_once "config/db_config.php";
 require_once "Modelos/Reportes.php";
class ReporteController 
{
    public function crearReporte(){
        if(!empty($_POST)){
           
            $r= new Reportes();
            $r->setIdReporte($_POST[REPORT_ID]);
            $r->setIdPartido($_POST[REPORT_PART]);
            $r->setNumTarjetas($_POST[REPORT_TARJ]);
            $r->setObservaciones($_POST[REPORT_OBSERV]);

            if($r->Crear_Reporte()){
                header("Location:".BASE_DIR.'/PanelArbitro/showAdminReporte');
            }
            else{
                header("Location:".BASE_DIR.'Reporte/showcreateReporte' );
            }
            

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