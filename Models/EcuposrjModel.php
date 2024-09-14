<?php 

	class EcuposrjModel extends Mysql{
		public $strDia;

		public function __construct(){
			parent::__construct();
		}

		public $intCupo_id;
		public $strEstado;
		
		public $strTiempo_duracion;
		public $strHora_entrada;
		public $strHora_inicio;
		public $strHora_finalizacion;
		public $strHora_salida;
		public $strObservacion_ejecucion;
		public $strTipo_Carga;
		public $intTendidos_Tarimas;
		public $intCapacidad_Tarimas;
		public $intCantidad_Tarimas;

		public $strFechaInicio;
		public $strFechaFinal;

		public function selectEcuporj(int $idcupo){
			$this->intCupo_id = $idcupo;
			$sql = "SELECT * FROM cupos_rastras WHERE id_cupo = $this->intCupo_id";
			$request = $this->select($sql);
			return $request;
		}

		public function selectEcuposrj(){
			$anio = strftime("%Y");
			$mes = date("m");
			$semana = date("W");
			$dia = date("N");
			$sql = "SELECT * FROM cupos_rastras WHERE tipo_transporte=2 AND anio=$anio  AND mes=$mes AND semana=$semana AND dia=$dia";
			$request = $this->select_all($sql);
			return $request;
		}

		public function updateEcuporj(int $idcupo, string $estado, int $tendidos_tarimas, int $capacidad_tarimas, int $cantidad_tarimas, string $hora_entrada, string $hora_inicio, string $hora_finalizacion, string $hora_salida, string $tiempo_duracion, string $observacion_ejecucion){
			$this->intCupo_id = $idcupo;
			$this->strTipo_Carga = $tipo_carga;
			$this->intTendidos_Tarimas = $tendidos_tarimas;
			$this->intCapacidad_Tarimas = $capacidad_tarimas;
			$this->intCantidad_Tarimas = $cantidad_tarimas;
			$this->strHora_entrada = $hora_entrada;
			$this->strHora_inicio = $hora_inicio;
			$this->strHora_finalizacion = $hora_finalizacion;
			$this->strHora_salida = $hora_salida;
			$this->strTiempo_duracion = $tiempo_duracion;
			$this->strEstado = $estado;
			$this->strObservacion_ejecucion = $observacion_ejecucion;
				
			$sql = "UPDATE cupos_rastras SET estado=?, tipo_carga=?, tendidos_tarimas=?, capacidad_tarimas=?, cantidad_tarimas=?, hora_entrada=?, hora_inicio=?, hora_finalizacion=?, hora_salida=?, tiempo_duracion=?, observacion_ejecucion=?
					WHERE tipo_transporte=2 AND id_cupo = $this->intCupo_id ";
				$arrData = array($this->strEstado, $this->strTipo_Carga, $this->intTendidos_Tarimas, $this->intCapacidad_Tarimas, $this->intCantidad_Tarimas, $this->strHora_entrada, $this->strHora_inicio, $this->strHora_finalizacion, $this->strHora_salida, $this->strTiempo_duracion, $this->strObservacion_ejecucion);
				$request = $this->update($sql,$arrData);
			return $request;
		}

		public function updateEcuporjg(int $idcupo, string $estado, string $hora_entrada, string $hora_inicio, string $hora_finalizacion, string $hora_salida, string $tiempo_duracion, string $observacion_ejecucion){
			$this->intCupo_id = $idcupo;
			$this->strHora_entrada = $hora_entrada;
			$this->strHora_inicio = $hora_inicio;
			$this->strHora_finalizacion = $hora_finalizacion;
			$this->strHora_salida = $hora_salida;
			$this->strTiempo_duracion = $tiempo_duracion;
			$this->strEstado = $estado;
			$this->strObservacion_ejecucion = $observacion_ejecucion;
				
			$sql = "UPDATE cupos_rastras SET estado=?, hora_entrada=?, hora_inicio=?, hora_finalizacion=?, hora_salida=?, tiempo_duracion=?, observacion_ejecucion=?
					WHERE tipo_transporte=2 AND id_cupo = $this->intCupo_id ";
				$arrData = array($this->strEstado, $this->strHora_entrada, $this->strHora_inicio, $this->strHora_finalizacion, $this->strHora_salida, $this->strTiempo_duracion, $this->strObservacion_ejecucion);
				$request = $this->update($sql,$arrData);
			return $request;
		}

		/* consulta de cupos por rango de fechas */
		public function selectConsultaRJ(string $fechaInicio, string $fechaFinal){
			$this->strFechaInicio = $fechaInicio;
			$this->strFechaFinal = $fechaFinal;
			$sql = "SELECT * FROM cupos_rastras WHERE tipo_transporte=2 AND fecha>='{$this->strFechaInicio}' AND fecha<='{$this->strFechaFinal}' ORDER BY dia";
			$request = $this->select_all($sql);
			return $request;
		}

		/* cancelar cupo */
		public function cancelarCuporj(int $idcupo){
			$this->intCupo_id = $idcupo;
			$sql = "UPDATE cupos_rastras SET estado = ? WHERE id_cupo = $this->intCupo_id ";
			$arrData = array('Cancelado');
			$request = $this->update($sql,$arrData);
			return $request;
		}

	}

?>