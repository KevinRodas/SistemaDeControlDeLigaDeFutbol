<?php
require_once "database/Database.php";
require_once "config/db_config.php";
require_once "config/configGeneral.php";
class Partido extends Database{
    public $cod_partido;
    public $cod_torneo;
    public $estado;
    public $solvencia_eq1;
    public $solvencia_eq2;
    public $cod_equipo1;
    public $cod_equipo2;
    public $cod_arbitro;
    public $cod_repre1;
    public $cod_repre2;
    public $ngoles_eq1;
    public $ngoles_eq2;
    public $estado_repre_eq1;
    public $estado_repre_eq2;
    
    public function setIdPartido($id){
        $this->cod_partido = $id;
        return $this;
    }
    public function getIdPartido(){
        return $this->cod_partido;
    }

    public function setIdTorneo($id){
        $this->cod_torneo = $id;
        return $this;
    }
    public function getIdTorneo(){
        return $this->cod_torneo;
    }

    public function setEstado($est){
        $this->estado = $est;
        return $this;
    }
    public function getEstado(){
        return $this->estado;
    }

    public function setSolvencia1($solv){
        $this->solvencia_eq1 = $solv;
        return $this;
    }
    public function getSolvencia1(){
        return $this->solvencia_eq1;
    }

    public function setSolvencia2($solv){
        $this->solvencia_eq2 = $solv;
        return $this;
    }
    public function getSolvencia2(){
        return $this->solvencia_eq2;
    }

    public function setIdEquipo1($id){
        $this->cod_equipo1 = $id;
        return $this;
    }
    public function getIdEquipo1(){
        return $this->cod_equipo1;
    }

    public function setIdEquipo2($id){
        $this->cod_equipo2 = $id;
        return $this;
    }
    public function getIdEquipo2(){
        return $this->cod_equipo2;
    }

    public function setIdArbitro($id){
        $this->cod_arbitro = $id;
        return $this;
    }
    public function getIdArbitro(){
        return  $this->cod_arbitro;
    }

    public function setIdRepresentante1($id){
        $this->cod_repre1 = $id;
        return $this;
    }
    public function getIdRepresentante1(){
        return $this->cod_repre1;
    }

    public function setIdRepresentante2($id){
        $this->cod_repre2 = $id;
        return $this;
    }
    public function getIdRepresentante2(){
        return $this->cod_repre2;
    }

    public function setGoles1($n){
        $this->ngoles_eq1 = $n;
        return $this;
    }
    public function getGoles1(){
        return  $this->ngoles_eq1;
    }

    public function setGoles2($n){
        $this->ngoles_eq2 = $n;
        return $this;
    }
    public function getGoles2(){
        return $this->ngoles_eq2;
    }

    public function setEstadoRepresentante1($e1){
        $this->estado_repre_eq1 = $e1;
        return $this;
    }
    public function getEstadoRepresentante1(){
        return $this->estado_repre_eq1;
    }

    public function setEstadoRepresentante2($e2){
        $this->estado_repre_eq2 = $e2;
        return $this;
    }
    public function getEstadoRepresentante2(){
        return $this->estado_repre_eq2;
    }

    public function Crear_Partido(){
        $query = "INSERT INTO " . T_PARTIDO . "(". PART_ID. ','. PART_TORNEO.','.PART_ESTADO.','.PART_EQP1.','.PART_EQP2.','.
        PART_SOLV1.','.PART_SOLV2.','.PART_ARB.','.PART_REPRE1.','.PART_REPRE2.','.PART_GOL1.','.PART_GOL2.','.PART_EST_R1.','.PART_EST_R2.")" . 
        " VALUES(:" . PART_ID. ', :'. PART_TORNEO.', :'.PART_ESTADO.', :'.PART_EQP1.', :'.PART_EQP2.', :'.
        PART_SOLV1.', :'.PART_SOLV2.', :'.PART_ARB.', :'.PART_REPRE1.', :'.PART_REPRE2.', :'.PART_GOL1.', :'.PART_GOL2.', :'.PART_EST_R1.', :'.PART_EST_R2.")";
               
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . PART_ID, $this->getIdPartido());
        $statement->bindValue(':' . PART_TORNEO, $this->getIdTorneo());
        $statement->bindValue(':' . PART_ESTADO, $this->getEstado());
        $statement->bindValue(':' . PART_EQP1, $this->getIdEquipo1());
        $statement->bindValue(':' . PART_EQP2, $this->getIdEquipo2());
        $statement->bindValue(':' . PART_SOLV1, $this->getSolvencia1());
        $statement->bindValue(':' . PART_SOLV2, $this->getSolvencia2());
        $statement->bindValue(':' . PART_ARB, $this->getIdArbitro());
        $statement->bindValue(':' . PART_REPRE1, $this->getIdRepresentante1());
        $statement->bindValue(':' . PART_REPRE2, $this->getIdRepresentante2());
        $statement->bindValue(':' . PART_GOL1, $this->getGoles1());
        $statement->bindValue(':' . PART_GOL2, $this->getGoles2());
        $statement->bindValue(':' . PART_EST_R1, $this->getEstadoRepresentante1());
        $statement->bindValue(':' . PART_EST_R2, $this->getEstadoRepresentante2());

        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos ingresados con éxito!</h1>";
        }
        return $message;
    }

    public function Ver_Partidos(){
        $rows=false;
        $query = "SELECT * FROM " .T_PARTIDO;
        $statement = $this->conexion->prepare($query);
        if ($statement->execute()) {
           $rows= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }
        return $rows;
    }

    public function Editar_Partido(){
        $query = " UPDATE " . T_PARTIDO . "SET(". PART_ID. ','. PART_TORNEO.','.PART_ESTADO.','.PART_EQP1.','.PART_EQP2.','.
        PART_SOLV1.','.PART_SOLV2.','.PART_ARB.','.PART_REPRE1.','.PART_REPRE2.','.PART_GOL1.','.PART_GOL2.','.PART_EST_R1.','.PART_EST_R2.")" . 
        " VALUES(:" . PART_ID. ', :'. PART_TORNEO.', :'.PART_ESTADO.', :'.PART_EQP1.', :'.PART_EQP2.', :'.
        PART_SOLV1.', :'.PART_SOLV2.', :'.PART_ARB.', :'.PART_REPRE1.', :'.PART_REPRE2.', :'.PART_GOL1.', :'.PART_GOL2.', :'.PART_EST_R1.', :'.PART_EST_R2.
        ") WHERE " . PART_ID . "= :" . PART_ID;

        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . PART_ID, $this->getIdPartido());
        $statement->bindValue(':' . PART_TORNEO, $this->getIdTorneo());
        $statement->bindValue(':' . PART_ESTADO, $this->getEstado());
        $statement->bindValue(':' . PART_EQP1, $this->getIdEquipo1());
        $statement->bindValue(':' . PART_EQP2, $this->getIdEquipo2());
        $statement->bindValue(':' . PART_SOLV1, $this->getSolvencia1());
        $statement->bindValue(':' . PART_SOLV2, $this->getSolvencia2());
        $statement->bindValue(':' . PART_ARB, $this->getIdArbitro());
        $statement->bindValue(':' . PART_REPRE1, $this->getIdRepresentante1());
        $statement->bindValue(':' . PART_REPRE2, $this->getIdRepresentante2());
        $statement->bindValue(':' . PART_GOL1, $this->getGoles1());
        $statement->bindValue(':' . PART_GOL2, $this->getGoles2());
        $statement->bindValue(':' . PART_EST_R1, $this->getEstadoRepresentante1());
        $statement->bindValue(':' . PART_EST_R2, $this->getEstadoRepresentante2());

        $message = "<h1>Error al modificar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos modificados con éxito!</h1>";
        }
        return $message;
    }

    public function Eliminar_Partido(){
        $query = "DELETE FROM " . T_PARTIDO . " WHERE " . PART_ID . "= :" . PART_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . PART_ID, $this->getIdPartido());

        $message = "<h1>Error al ELIMINAR estadio!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos eliminados con éxito!</h1>";
        }
        return $message;
    }

    public function Buscar_Partido(){
        $row=false;
        $query = "SELECT * FROM " .T_PARTIDO . "WHERE " . PART_ID . "= :" . PART_ID ;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . PART_ID, $this->getIdPartido());

        if ($statement->execute()) {
           $row= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return $row;
    }

    public function Generar_Horario_Partido($hi,$hf,$f,$estadio){
        require_once "Horario.php";
        $horario = new Horario();
        $horario->setIdPartido($this->cod_partido);
        $horario->setIdEstadio($estadio);
        $horario->setHoraInicio($hi);
        $horario->setHoraFinal($hf);
        $horario->setFecha($f);

        $horario->Crear_Horario();
    }
    
    public function Actualizar_Estado_Partido(){
        $query = " UPDATE " . T_PARTIDO . "SET(". PART_ESTADO.")" . " VALUES(:" .PART_ESTADO.") WHERE " . PART_ID . "= :" . PART_ID;
        $statement = $this->conexion->prepare($query);
        $statement->bindValue(':' . PART_ID, $this->getIdPartido());
        $statement->bindValue(':' . PART_ESTADO, $this->getEstado());
        
        $message = "<h1>Error al modificar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos modificados con éxito!</h1>";
        }
        return $message;
    }
}