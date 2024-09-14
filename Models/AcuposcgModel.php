<?php 
	class AcuposcgModel extends Mysql{
		public function __construct(){
			parent::__construct();
		}

		public $intCupo_id;
		public $intAnio;
		public $intSemana;
		public $intDia;
		public $intBloque;
		public $intSub_bloque;
		public $intCupo_bloque;
		public $strEstado;
		public $strCliente;
		public $strAsesor;
		public $strTipo_Logistica;
		public $strCapacidad;
		public $strTiempo_Estimado;
		public $strQuintales;
		public $strFlete;
		public $strHora_Asignada;
		public $strCotizacion;
		public $strRuta;
		public $strObservacion_Asignacion;
		/* RECEPTOR */
		public $strNombre_receptor;
		public $intContacto_receptor;
		public $strDepartamento_receptor;
		public $strMunicipio_receptor;
		public $strDireccion_receptor;

		/* ---------------------------------------------------------------------------------------------------------------- */
		/* ---------------------------------------------------------------------------------------------------------------- */

		public function select_Cupos(int $anio, int $semana, int $dia, int $bloque){
			$this->intAnio = $anio;
			$this->intSemana = $semana;
			$this->intDia = $dia;
			$this->intBloque = $bloque;
			$sql = "SELECT COUNT(*) as total FROM `cupos_camiones` WHERE tipo_transporte=3 AND anio=$this->intAnio AND semana=$this->intSemana AND dia=$this->intDia AND bloque=$this->intBloque";
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
			$sql = "SELECT sub_bloque FROM `cupos_camiones` WHERE tipo_transporte=3 AND anio=$this->intAnio AND semana=$this->intSemana AND dia=$this->intDia AND bloque=$this->intBloque";
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
			$sql = "SELECT id_cupo, nombre_asesor, tipo_logistica, estado FROM `cupos_camiones`
					WHERE tipo_transporte=3 AND anio=$this->intAnio AND semana=$this->intSemana AND dia=$this->intDia AND bloque=$this->intBloque AND sub_bloque = $this->intSub_bloque";
			$request = $this->select($sql);
			return $request;
		}

		/* ---------------------------------------------------------------------------------------------------------------- */
		/* ---------------------------------------------------------------------------------------------------------------- */

		/* - MANEJO DE DATOS - */
		public function updateAcupocg(int $id_cupo, string $estado, string $nombre_cliente, string $tipo_logistica, 
		string $nombre_receptor, int $contacto_receptor, string $departamento_receptor, string $municipio_receptor, string $direccion_receptor, 
		string $hora_asignada, string $tiempo_estimado, string $cotizacion , string $ruta, string $quintales, string $flete, string $observacion_asignacion){
			$this->intCupo_id = $id_cupo;
			$this->strEstado = $estado;
			$this->strCliente = $nombre_cliente;
			$this->strTipo_Logistica = $tipo_logistica;
			$this->strNombre_receptor = $nombre_receptor;
			$this->intContacto_receptor = $contacto_receptor;
			$this->strDepartamento_receptor = $departamento_receptor;
			$this->strMunicipio_receptor = $municipio_receptor;
			$this->strDireccion_receptor = $direccion_receptor;
			$this->strHora_Asignada = $hora_asignada;
			$this->strTiempo_Estimado = $tiempo_estimado;
			$this->strCotizacion = $cotizacion;
			$this->strRuta = $ruta;
			$this->strQuintales = $quintales;
			$this->strFlete = $flete;
			$this->strObservacion_Asignacion = $observacion_asignacion;
				
			$sql = "UPDATE cupos_camiones SET estado=?, nombre_cliente=?, tipo_logistica=?, nombre_receptor=?, contacto_receptor=?, departamento_receptor=?, 
			municipio_receptor=?, direccion_receptor=?, hora_asignada=?, tiempo_estimado=?, cotizacion=?, ruta=?, quintales=?, flete=?, observacion_asignacion=?
					WHERE tipo_transporte=3 AND id_cupo = $this->intCupo_id ";
				$arrData = array($this->strEstado, $this->strCliente,  $this->strTipo_Logistica, $this->strNombre_receptor, $this->intContacto_receptor, 
				$this->strDepartamento_receptor, $this->strMunicipio_receptor, $this->strDireccion_receptor, $this->strHora_Asignada, 
				$this->strTiempo_Estimado, $this->strCotizacion, $this->strRuta, $this->strQuintales, $this->strFlete, $this->strObservacion_Asignacion);
				$request = $this->update($sql,$arrData);
			return $request;
		}

		public function selectAcupocg(int $idcupo){
			$this->intCupo_id = $idcupo;
			$sql = "SELECT * FROM cupos_camiones WHERE id_cupo = $this->intCupo_id";
			$request = $this->select($sql);
			return $request;
		}

		public function selectCotizacion(int $idcupo){
			$this->intCupo_id = $idcupo;
			$sql = "SELECT cotizacion FROM cupos_camiones WHERE id_cupo = $this->intCupo_id";
			$request = $this->select_all($sql);	
			$return = $request;
			return $return;	
		}

	}
?>