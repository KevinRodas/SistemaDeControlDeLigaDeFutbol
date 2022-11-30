<?php
//Definicion de constantes para conexion a la base de datos
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','bd_sistema_futbol');
define('DB_CHARSET','utf8');

//Definicion de constantes para tabla usuario
define('T_USUARIO','tbl_usuario');
define('U_ID','id_usuario');
define('U_NOM','nombre');
define('U_LN','apellido');
define('U_AGE','edad');
define('U_TEL', 'telefono');
define('U_MAIL', 'correo');
define('U_PASS', 'password');
define('U_ROL','rol');

//Definicion de constantes para tabla torneo
define('T_TORNEO','tbl_torneo');
define('TOR_ID','id_torneo');
define('TOR_NOM','nombre');
define('TOR_INICIO','fecha_inicio');
define('TOR_FINAL','fecha_final');

//Definiciones de constantes para tabla equipo
define('T_EQUIPO','tbl_equipo');
define('EQP_ID','id_equipo');
define('EQP_NOM','nombre');
define('EQP_DIR','direccion');
define('EQP_DEP','departamento');
define('EQP_REPRE','id_representante');
define('EQP_INTEGRANTE','n_ integrantes');
define('EQP_INDUMENTARIA','id_indumentaria');
define('EQP_SANCIONES','n_sanciones');
define('EQP_ESTADO','estado');

//Definiciones de constantes para tabla estadio
define('T_ESTADIO','tbl_estadio');
define('EST_ID','id_estadio');
define('EST_NOM','nombre');
define('EST_DIR','direccion');
define('EST_DISP','disponibilidad');
define('EST_ENC','encargado');
define('EST_TEL','telefono');
//Definiciones de constantes para tabla partido

define('T_PARTIDO','tbl_partido');
define('PART_ID','id_partido');
define('PART_NOM','nombre');
define('PART_TORNEO','id_torneo');
define('PART_ESTADO','estado');
define('PART_EQP1','id_equipo1');
define('PART_EQP2','id_equipo2');
define('PART_SOLV1','sol_equipo1');
define('PART_SOLV2','sol_equipo2');
define('PART_ARB','id_arbitro');
define('PART_REPRE1','id_representante1');
define('PART_REPRE2','id_representante2');
define('PART_GOL1','n_goles1');
define('PART_GOL2','n_goles2');
define('PART_EST_R1','estado_repre1');
define('PART_EST_R2','estado_repre2');

//Definiciones de constantes para tabla horario
define('T_HORARIO','tbl_horario');
define('HOR_ID','id_horario');
define('HOR_PART','id_partido');
define('HOR_FECHA','fecha');
define('HOR_INICIO','h_inicio');
define('HOR_FINAL','h_final');

//Definiciones de constantes para tabla administrativo
define('T_ADMIN','tbl_administrativo');
define('ADMIN_ID','id_admin');
define('ADMIN_P','puesto');

//Definiciones de constantes para tabla arbitro
define('T_ARBITRO','tbl_arbitro');
define('ARB_ID','id_arbitro');
define('ARB_DIR','direccion');
define('ARB_DISP','disponibilidad');
define('ARB_PART','n_partidos');

//Definiciones de constantes para tabla representante
define('T_REPRE','tbl_representante');
define('REP_ID','id_representante');
define('REP_DIR','direccion');
define('REP_EQP','id_equipo');

//Definiciones de constantes para tabla jugador
define('T_JUGADOR','tbl_jugador');
define('JUG_ID','id_jugador');
define('JUG_EQP','id_equipo');
define('JUG_PART','n_partidos');
define('JUG_SANC','n_sanciones');
define('JUG_GOL','n_goles');

//Definiciones de constantes para tabla reporte
define('T_REPORTE','tbl_reporte');
define('REPORT_ID','id_reporte');
define('REPORT_PART','id_partido');
define('REPORT_TARJ','n_tarjetas');
define('REPORT_OBSERV','observaciones');

//Definiciones de constantes para tabla sanciones
define('T_SANCIONES','tbl_sanciones');
define('SANCION_ID','id_sancion');
define('SANCION_REPORTE','id_reporte');
define('SANCION_PART','id_partido');
define('SANCION_ARB','id_arbitro');
define('SANCION_ID_SAN','id_sancionado');
define('SANCION_CAT','categoria');
define('SANCION_DESCRIP','descripcion');
define('SANCION_INICIO','fecha_sancion');
define('SANCION_FIN','fecha_fin');
define('SANCION_DIA','dias_penalizado');
define('SANCION_PR','precio');
define('SANCION_EST','estado');

//Definiciones de constantes para tabla Detalle Sanciones
define('T_DETALLE','tbl_detalle_sancion');
define('DET_ID','id_detalle');
define('DET_REPORTE','id_reporte');
define('DET_SANCION','id_sancion');
define('DET_DESCRIP','descripcion');
define('DET_EST','estado');
?>