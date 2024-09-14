<?php
	class ReportesrjModel extends Mysql{

		public function __construct(){
			parent::__construct();
		}
		public $intCupo_id;
		public $strFechaInicio;
		public $strFechaFinal;

		/* REPORTES POR PLANTA Y TIPO */
		public function selectReportesrj() {
			$sql = "SELECT * FROM cupos_rastras WHERE tipo_transporte=2";
			$request = $this->select_all($sql);
			return $request;
		}

		/* OPCIONES PARA LOS CUPOS COTIZACION */
		public function selectEcuporj(int $idcupo){
			$this->intCupo_id = $idcupo;
			$sql = "SELECT * FROM cupos_rastras WHERE id_cupo = $this->intCupo_id";
			$request = $this->select($sql);
			return $request;
		}	
		
		public function selectConsultaRJ(string $fechaInicio, string $fechaFinal){
			$this->strFechaInicio = $fechaInicio;
			$this->strFechaFinal = $fechaFinal;
			$sql = "SELECT * FROM cupos_rastras WHERE tipo_transporte=2 AND fecha>='{$this->strFechaInicio}' AND fecha<='{$this->strFechaFinal}' ORDER BY dia";
			$request = $this->select_all($sql);
			return $request;
		}

		/* */
		/* *//* *//* */
		/* */

		public function select_finalizado(string $fechaInicio, string $fechaFinal){
			$this->strFechaInicio = $fechaInicio;
			$this->strFechaFinal = $fechaFinal;
			$sql = "SELECT COUNT(*) as total FROM cupos_rastras WHERE tipo_transporte=2 AND fecha>='{$this->strFechaInicio}' AND fecha<='{$this->strFechaFinal}' AND estado='Finalizado'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}
		public function cuposT(string $fechaInicio, string $fechaFinal){
			$this->strFechaInicio = $fechaInicio;
			$this->strFechaFinal = $fechaFinal;
			$sql = "SELECT COUNT(*) as totalT FROM cupos_rastras WHERE tipo_transporte=2 AND fecha>='{$this->strFechaInicio}' AND fecha<='{$this->strFechaFinal}'";
			$request = $this->select($sql);
			$total = $request['totalT']; 
			return $total;
		}

		public function cuposTPC(string $fechaInicio, string $fechaFinal){
			$this->strFechaInicio = $fechaInicio;
			$this->strFechaFinal = $fechaFinal;
			$sql = "SELECT COUNT(*) as totalT FROM cupos_rastras WHERE tipo_transporte=2 AND fecha>='{$this->strFechaInicio}' AND fecha<='{$this->strFechaFinal}'";
			$request = $this->select($sql);
			$total = $request['totalT']; 
			return $total;
		}
		/* */
		public function pagaCargaF(string $fechaInicio, string $fechaFinal){
			$this->strFechaInicio = $fechaInicio;
			$this->strFechaFinal = $fechaFinal;
			$sql = "SELECT COUNT(*) as totalPCF FROM cupos_rastras WHERE tipo_transporte=2 AND tipo_carga='Paga carga' AND fecha>='{$this->strFechaInicio}' AND fecha<='{$this->strFechaFinal}' AND estado='Finalizado'";
			$request = $this->select($sql);
			$total = $request['totalPCF']; 
			return $total;
		}
		public function NopagaCargaF(string $fechaInicio, string $fechaFinal){
			$this->strFechaInicio = $fechaInicio;
			$this->strFechaFinal = $fechaFinal;
			$sql = "SELECT COUNT(*) as totalNPCF FROM cupos_rastras WHERE tipo_transporte=2 AND tipo_carga='No paga carga' AND fecha>='{$this->strFechaInicio}' AND fecha<='{$this->strFechaFinal}' AND estado='Finalizado'";
			$request = $this->select($sql);
			$total = $request['totalNPCF']; 
			return $total;
		}
		/* */
		public function pagaCarga(string $fechaInicio, string $fechaFinal){
			$this->strFechaInicio = $fechaInicio;
			$this->strFechaFinal = $fechaFinal;
			$sql = "SELECT COUNT(*) as totalPC FROM cupos_rastras WHERE tipo_transporte=2 AND tipo_carga='Paga carga' AND fecha>='{$this->strFechaInicio}' AND fecha<='{$this->strFechaFinal}'";
			$request = $this->select($sql);
			$total = $request['totalPC']; 
			return $total;
		}
		public function NopagaCarga(string $fechaInicio, string $fechaFinal){
			$this->strFechaInicio = $fechaInicio;
			$this->strFechaFinal = $fechaFinal;
			$sql = "SELECT COUNT(*) as totalNPC FROM cupos_rastras WHERE tipo_transporte=2 AND tipo_carga='No paga carga' AND fecha>='{$this->strFechaInicio}' AND fecha<='{$this->strFechaFinal}'";
			$request = $this->select($sql);
			$total = $request['totalNPC']; 
			return $total;
		}

		public function promedioPagaCarga(string $fechaInicio, string $fechaFinal){
			$this->strFechaInicio = $fechaInicio;
			$this->strFechaFinal = $fechaFinal;
			$sql = "SELECT SEC_TO_TIME(AVG(TIME_TO_SEC(SUBTIME(hora_finalizacion, hora_inicio)))) as promedioPC 
			FROM cupos_rastras WHERE tipo_transporte=2 AND tipo_carga='Paga carga'  AND estado='Finalizado' AND fecha>='{$this->strFechaInicio}' AND fecha<='{$this->strFechaFinal}'";
			$request = $this->select($sql);
			$total = $request['promedioPC']; 
			return $total;
		}

		public function promedioNoPagaCarga(string $fechaInicio, string $fechaFinal){
			$this->strFechaInicio = $fechaInicio;
			$this->strFechaFinal = $fechaFinal;
			$sql = "SELECT SEC_TO_TIME(AVG(TIME_TO_SEC(SUBTIME(hora_finalizacion, hora_inicio)))) as promedioNPC 
			FROM cupos_rastras WHERE tipo_transporte=2 AND tipo_carga='No paga carga'  AND estado='Finalizado' AND fecha>='{$this->strFechaInicio}' AND fecha<='{$this->strFechaFinal}'";
			$request = $this->select($sql);
			$total = $request['promedioNPC']; 
			return $total;
		}

		public function promedioPagaCargaE(string $fechaInicio, string $fechaFinal){
			$this->strFechaInicio = $fechaInicio;
			$this->strFechaFinal = $fechaFinal;
			$sql = "SELECT SEC_TO_TIME(AVG(TIME_TO_SEC(SUBTIME(hora_salida, hora_entrada)))) as promedioPCE 
			FROM cupos_rastras WHERE tipo_transporte=2 AND tipo_carga='Paga carga'  AND estado='Finalizado' AND fecha>='{$this->strFechaInicio}' AND fecha<='{$this->strFechaFinal}'";
			$request = $this->select($sql);
			$total = $request['promedioPCE']; 
			return $total;
		}

		public function promedioNoPagaCargaS(string $fechaInicio, string $fechaFinal){
			$this->strFechaInicio = $fechaInicio;
			$this->strFechaFinal = $fechaFinal;
			$sql = "SELECT SEC_TO_TIME(AVG(TIME_TO_SEC(SUBTIME(hora_salida, hora_entrada)))) as promedioNPCS
			FROM cupos_rastras WHERE tipo_transporte=2 AND tipo_carga='No paga carga'  AND estado='Finalizado' AND fecha>='{$this->strFechaInicio}' AND fecha<='{$this->strFechaFinal}'";
			$request = $this->select($sql);
			$total = $request['promedioNPCS']; 
			return $total;
		}

	}
?>