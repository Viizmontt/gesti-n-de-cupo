<?php 
	class AcuposrjModel extends Mysql{
		public function __construct(){
			parent::__construct();
		}

		public $intCupo_id;
		public $intAnio;
		public $intMes;
		public $intSemana;
		public $intDia;
		public $intBloque;
		public $intSub_bloque;
		public $intCupo_bloque;
		public $strEstado;
		public $strCliente;
		public $strAsesor;
		public $strTipo_Carga;
		public $strMetodo_Carga;
		public $intTendidos_Tarimas;
		public $intCapacidad_Tarimas;
		public $intCantidad_Tarimas;
		public $strPeso;		
		public $strHora_Asignada;
		public $intProducto;
		public $strCotizacion;
		public $strRuta;
		public $strObservacion_Asignacion;

		/* ---------------------------------------------------------------------------------------------------------------- */
		/* ---------------------------------------------------------------------------------------------------------------- */

		public function select_Cupos(int $anio, int $semana, int $dia, int $bloque){
			$this->intAnio = $anio;
			$this->intSemana = $semana;
			$this->intDia = $dia;
			$this->intBloque = $bloque;
			$sql = "SELECT COUNT(*) as total FROM `cupos_rastras` WHERE tipo_transporte=2 AND anio=$this->intAnio AND semana=$this->intSemana AND dia=$this->intDia AND bloque=$this->intBloque";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}
		/* sub_bloque o cupos */
		public function select_SubBloque_Cupos(int $anio, int $semana, int $dia, int $bloque){
			$this->intAnio = $anio;
			$this->intSemana = $semana;
			$this->intDia = $dia;
			$this->intBloque = $bloque;
			$sql = "SELECT sub_bloque FROM `cupos_rastras` WHERE tipo_transporte=2 AND anio=$this->intAnio AND semana=$this->intSemana AND dia=$this->intDia AND bloque=$this->intBloque";
			$request = $this->select_all($sql);
			return $request;
		}
		/* seleccionar el id de asesor en [cupo_asesor] para mandarlo por onclick*/
		public function select_DatosCupos(int $anio, int $semana, int $dia, int $bloque, int $sub_bloque){
			$this->intAnio = $anio;
			$this->intSemana = $semana;
			$this->intDia = $dia;
			$this->intBloque = $bloque;
			$this->intSub_bloque = $sub_bloque;
			$sql = "SELECT id_cupo, nombre_asesor, tipo_carga, estado FROM `cupos_rastras`
					WHERE tipo_transporte=2 AND anio=$this->intAnio AND semana=$this->intSemana AND dia=$this->intDia AND bloque=$this->intBloque AND sub_bloque = $this->intSub_bloque";
			$request = $this->select($sql);
			return $request;
		}

		/* ---------------------------------------------------------------------------------------------------------------- */
		/* ---------------------------------------------------------------------------------------------------------------- */

		public function updateAcuporj(int $idcupo, string $hora_asignada, string $cliente, string $metodo_carga, string $cotizacion , string $ruta, string $estado, int $tendidos_tarimas, int $capacidad_tarimas, int $cantidad_tarimas, string $observacion_asignacion){
			$this->intCupo_id = $idcupo;
			$this->strHora_Asignada = $hora_asignada;
			$this->strCliente = $cliente;
			$this->strMetodo_Carga = $metodo_carga;
			$this->strCotizacion = $cotizacion;
			$this->strRuta = $ruta;
			$this->strEstado = $estado;
			$this->intTendidos_Tarimas = $tendidos_tarimas;
			$this->intCapacidad_Tarimas = $capacidad_tarimas;
			$this->intCantidad_Tarimas = $cantidad_tarimas;
			$this->strObservacion_Asignacion = $observacion_asignacion;
				
			$sql = "UPDATE cupos_rastras SET hora_asignada=?, nombre_cliente=?, metodo_carga=?, cotizacion=?, ruta=?, estado=?, tendidos_tarimas=?, capacidad_tarimas=?, cantidad_tarimas=?, observacion_cupo=?
					WHERE tipo_transporte=2 AND id_cupo = $this->intCupo_id ";
				$arrData = array($this->strHora_Asignada, $this->strCliente, $this->strMetodo_Carga, $this->strCotizacion, $this->strRuta, $this->strEstado, $this->intTendidos_Tarimas, $this->intCapacidad_Tarimas, $this->intCantidad_Tarimas, $this->strObservacion_Asignacion);
				$request = $this->update($sql,$arrData);
			return $request;
		}

		public function selectAcuporj(int $idcupo){
			$this->intCupo_id = $idcupo;
			$sql = "SELECT * FROM cupos_rastras WHERE id_cupo = $this->intCupo_id";
			$request = $this->select($sql);
			return $request;
		}

		public function selectCotizacion(int $idcupo){
			$this->intCupo_id = $idcupo;
			$sql = "SELECT cotizacion FROM cupos_rastras WHERE id_cupo = $this->intCupo_id";
			$request = $this->select_all($sql);	
			$return = $request;
			return $return;	

		}

	}

?>