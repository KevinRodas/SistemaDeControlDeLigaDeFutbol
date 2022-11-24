<?php
 require_once "config/configGeneral.php";
 require_once "config/db_config.php";
 require_once "Modelos/Sanciones.php";
class SancionesController 
{
    public function createSancion(){
        if(!empty($_POST)){
            
            $s= new Sanciones();
            $s->setCodPartido($_POST[SANCION_PART]);
            $s->setCodArbitro($_POST[SANCION_ARB]);
            $s->setCodSancionado($_POST[SANCION_ID_SAN]);
            $s->setCategoria($_POST[SANCION_CAT]);
            $s->setFecha_Sancion($_POST[SANCION_INICIO]);
            $s->setFecha_Fin($_POST[SANCION_FIN]);
            $s->setDias_Penalizacion($_POST[SANCION_DIA]);
            $s->setPrecio($_POST[SANCION_PR]);
            $s->setEstado($_POST[SANCION_EST]);

            if($s->Crear_Sancion()){
                header("Location:".BASE_DIR.'/ ');
            }
            else{
                header("Location:".BASE_DIR.'Sanciones/' );
            }
        }
        else{
            echo "No hay datos";
        }

    }

  

    public function showcrearSancion(){
        require_once "Vistas/";
    }

    public function showUpdate(){
        require_once "Vistas/";
    }

    

   

}

?>