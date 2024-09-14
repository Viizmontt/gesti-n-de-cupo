<?php 

	class EcuposcjModel extends Mysql{
		public $strDia;

		public function __construct(){
			parent::__construct();
		}

		public $intCupo_id;
		public $strEstado;
		public $strTiempo_duracion;
		public $strHora_inicio;
		public $strHora_finalizacion;
		public $strObservacion_ejecucion;
		public $strMotorista;
		public $strCamion;
		public $strHora_entrada;
		public $strHora_salida;
		public $strFechaInicio;
		public $strFechaFinal;

		public function selectEcupocj(int $idcupo){
			$this->intCupo_id = $idcupo;
			$sql = "SELECT * FROM cupos_camiones WHERE id_cupo = $this->intCupo_id";
			$request = $this->select($sql);
			return $request;
		}

		public function selectEcuposcj(){
			$anio = strftime("%Y");
			$mes = date("m");
			$semana = date("W");
			$dia = date("N");
			$sql = "SELECT * FROM cupos_camiones WHERE tipo_transporte=4 AND anio=$anio  AND mes=$mes AND semana=$semana AND dia=$dia";
			$request = $this->select_all($sql);
			return $request;
		}

		public function updateEcupocj(int $idcupo, string $estado, string $motorista, string $camion, string $hora_entrada, string $hora_inicio, string $hora_finalizacion, string $hora_salida, string $tiempo_duracion, string $observacion_ejecucion){
			$this->intCupo_id = $idcupo;
			$this->strEstado = $estado;
			$this->strTiempo_duracion = $tiempo_duracion;
			$this->strHora_inicio = $hora_inicio;
			$this->strHora_finalizacion = $hora_finalizacion;
			$this->strObservacion_ejecucion = $observacion_ejecucion;
			$this->strMotorista = $motorista;
			$this->strCamion = $camion;
				
			$sql = "UPDATE cupos_camiones SET estado=?, motorista=?, camion=?, hora_entrada=?, hora_inicio=?, hora_finalizacion=?, hora_salida=?, tiempo_duracion=?, observacion_ejecucion=?
					WHERE tipo_transporte=4 AND id_cupo = $this->intCupo_id ";
				$arrData = array($this->strEstado, $this->strMotorista, $this->strCamion, $this->strHora_entrada, $this->strHora_inicio, $this->strHora_finalizacion, $this->strHora_salida, $this->strTiempo_duracion, $this->strObservacion_ejecucion);
				$request = $this->update($sql,$arrData);
			return $request;
		}

		public function updateEcupocj_TP(int $idcupo, string $estado, string $hora_entrada, string $hora_inicio, string $hora_finalizacion, string $hora_salida, string $tiempo_duracion, string $observacion_ejecucion){
			$this->intCupo_id = $idcupo;
			$this->strEstado = $estado;
			$this->strTiempo_duracion = $tiempo_duracion;
			$this->strHora_inicio = $hora_inicio;
			$this->strHora_finalizacion = $hora_finalizacion;
			$this->strObservacion_ejecucion = $observacion_ejecucion;
				
			$sql = "UPDATE cupos_camiones SET estado=?, hora_entrada=?, hora_inicio=?, hora_finalizacion=?, hora_salida=?, tiempo_duracion=?, observacion_ejecucion=?
					WHERE tipo_transporte=4 AND id_cupo = $this->intCupo_id ";
				$arrData = array($this->strEstado, $this->strHora_entrada, $this->strHora_inicio, $this->strHora_finalizacion, $this->strHora_salida, $this->strTiempo_duracion, $this->strObservacion_ejecucion);
				$request = $this->update($sql,$arrData);
			return $request;
		}

		/* consulta cupos por rango de fechas */ 
		public function selectConsultaCJ(string $fechaInicio, string $fechaFinal){
			$this->strFechaInicio = $fechaInicio;
			$this->strFechaFinal = $fechaFinal;
			$sql = "SELECT * FROM cupos_camiones WHERE tipo_transporte=4 AND fecha>='{$this->strFechaInicio}' AND fecha<='{$this->strFechaFinal}' ORDER BY dia";
			$request = $this->select_all($sql);
			return $request;
		}

		/* cancelar cupo */
		public function cancelarCupocj(int $idcupo){
			$this->intCupo_id = $idcupo;
			$sql = "UPDATE cupos_camiones SET estado = ? WHERE id_cupo = $this->intCupo_id ";
			$arrData = array('Cancelado');
			$request = $this->update($sql,$arrData);
			return $request;
		}

		/* */
		public function selectCamiones() {
			$sql = "SELECT * FROM camiones WHERE planta=2";
			$request = $this->select_all($sql);
			return $request;
		}
		public function selectMotoristas() {
			$sql = "SELECT * FROM motoristas WHERE planta=2 AND nota>=6";
			$request = $this->select_all($sql);
			return $request;
		}	

	}
	
?> 