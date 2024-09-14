<?php 
	class CuposModel extends Mysql{
		public function __construct(){
			parent::__construct();
		}

		private $intId_cantidad_cupos;
		private $intTipo_transporte;
		private $intAnio;
		private $intMes;
		private $intSemana;
		private $intDia;
		private $intBloque;
		private $intSub_bloque;
		private $strNombre_asesor;
		private $strCotizacion;

		public function selectCantidadCupos(int $id_cantidad_cupos){
			$this->intId_cantidad_cupos = $id_cantidad_cupos;
			$sql = "SELECT * FROM cantidadcuposbloque WHERE cantidad_cupos_id = $this->intId_cantidad_cupos";
			$request = $this->select($sql);
			return $request;
		}

		public function buscarCuposT(){
			$tipo = $_POST['cantidad_cupos_Id'];
			$anio = strftime("%Y");
			$semana = date("W");
			$semana = $semana + 1;
						
			if ($tipo==1 || $tipo==2) {
				$sql = "SELECT id_cupo FROM cupos_rastras WHERE tipo_transporte=$tipo AND anio=$anio AND semana=$semana";
			}else if($tipo==3 || $tipo==4){
				$sql = "SELECT id_cupo FROM cupos_camiones WHERE tipo_transporte=$tipo AND anio=$anio AND semana=$semana";
			}
			$request = $this->select_all($sql);	
			$return = $request;
			return $return;
		}

		public function buscarCupos($dia){
			$this->intDia = $dia;
			$tipo = $_POST['cantidad_cupos_Id'];
			$anio = strftime("%Y");
			$semana = date("W");
			$semana = $semana + 1;

			if ($tipo==1 || $tipo==2) {
				$sql = "SELECT id_cupo FROM cupos_rastras WHERE tipo_transporte=$tipo AND anio=$anio AND semana=$semana AND dia=$this->intDia";
			}else if($tipo==3 || $tipo==4){
				$sql = "SELECT id_cupo FROM cupos_camiones WHERE tipo_transporte=$tipo AND anio=$anio AND semana=$semana AND dia=$this->intDia";
			}
			$request = $this->select_all($sql);	
			$return = $request;
			return $return;			
		}

		public function inserCupos(int $tipo_transporte, int $anio, int $mes, int $semana, int $dia, int $bloque, int $sub_bloque, string $nombre_asesor, string $cotizacion, string $fecha){
			$this->intTipo_transporte = $tipo_transporte;
			$this->intAnio = $anio;
			$this->intMes = $mes;
			$this->intSemana = $semana;
			$this->intDia = $dia;
			$this->intBloque = $bloque;
			$this->intSub_bloque = $sub_bloque;
			$this->strNombre = $nombre;
			$this->strCotizacion = $cotizacion;
			$this->strNombre_asesor = $nombre_asesor;
			$this->strFecha = $fecha;
			$tipo = $_POST['cantidad_cupos_Id'];

			if ($tipo==1 || $tipo==2){
				$query_insert  = "INSERT INTO cupos_rastras(tipo_transporte, anio, mes, semana, dia, bloque, sub_bloque, nombre_asesor, cotizacion, fecha) VALUES(?,?,?,?,?,?,?,?,?,?)";
			}else if($tipo==3 || $tipo==4){
				$query_insert  = "INSERT INTO cupos_camiones(tipo_transporte, anio, mes, semana, dia, bloque, sub_bloque, nombre_asesor, cotizacion, fecha) VALUES(?,?,?,?,?,?,?,?,?,?)";
			}
			$arrData = array($this->intTipo_transporte, $this->intAnio, $this->intMes, $this->intSemana, $this->intDia, $this->intBloque, $this->intSub_bloque, $this->strNombre_asesor, $this->strCotizacion, $this->strFecha);
			$request_insert = $this->insert($query_insert,$arrData);
			$return = $request_insert;
			return $return;	
		}

		public function selectCuposR(int $tipo_transporte){
			$this->intTipo_transporte = $tipo_transporte;
			$anio = strftime("%Y");
			$semana = date("W") + 1;
			$sql = "SELECT id_cupo FROM cupos_rastras WHERE tipo_transporte = $this->intTipo_transporte AND anio=$anio AND semana=$semana";
			$request = $this->select_all($sql);	
			$return = $request;
			return $return;	
		}

		public function selectCuposC(int $tipo_transporte){
			$this->intTipo_transporte = $tipo_transporte;
			$anio = strftime("%Y");
			$semana = date("W") + 1;
			$sql = "SELECT id_cupo FROM cupos_camiones WHERE tipo_transporte = $this->intTipo_transporte AND anio=$anio AND semana=$semana";
			$request = $this->select_all($sql);	
			$return = $request;
			return $return;	
		}

		public function deleteCuposR(int $tipo_transporte){
			$this->intTipo_transporte = $tipo_transporte;
			$anio = strftime("%Y");
			$semana = date("W");
			$semana = $semana + 1;
			$sql = "DELETE FROM cupos_rastras WHERE tipo_transporte = $this->intTipo_transporte AND anio=$anio AND semana=$semana";
			$request = $this->delete($sql);
			return $request;
		}
				
		public function deleteCuposC(int $tipo_transporte){
			$this->intTipo_transporte = $tipo_transporte;
			$anio = strftime("%Y");
			$semana = date("W");
			$semana = $semana + 1;
			$sql = "DELETE FROM cupos_camiones WHERE tipo_transporte = $this->intTipo_transporte AND anio=$anio AND semana=$semana";
			$request = $this->delete($sql);
			return $request;
		}		
	
	}
?>