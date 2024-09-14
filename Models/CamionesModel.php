<?php 

	class CamionesModel extends Mysql{
		private $intIdCamion;
		private $strCodigoCamion;
		private $strMarcaCamion;
		private $strModeloCamion;
		private $strColorCamion;
		private $strPlantaCamion;
		private $strCapacidadCamion;

		public function __construct(){
			parent::__construct();
		}	

		public function insertCamion(string $codigo, string $marca, string $modelo, string $color, string $capacidad, int $planta){
			$this->strCodigoCamion = $codigo;
			$this->strMarcaCamion = $marca;
			$this->strModeloCamion = $modelo;
			$this->strColorCamion = $color;
			$this->strCapacidadCamion = $capacidad;
			$this->intPlantaCamion = $planta;
			$return = 0;
			$sql = "SELECT codigo FROM camiones WHERE codigo = '{$this->strCodigoCamion}' ";
			$request = $this->select_all($sql);
			if(empty($request)){
				$query_insert  = "INSERT INTO camiones (codigo,marca,modelo,color,capacidad,planta) VALUES(?,?,?,?,?,?)";
	        	$arrData = array($this->strCodigoCamion,$this->strMarcaCamion,$this->strModeloCamion,$this->strColorCamion,$this->strCapacidadCamion,$this->intPlantaCamion);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}

		public function selectCamiones() {
			$sql = "SELECT * FROM camiones";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectCamion(int $idcamion){
			$this->intIdCamion = $idcamion;
			$sql = "SELECT * FROM camiones WHERE idcamion = $this->intIdCamion";
			$request = $this->select($sql);
			return $request;
		}

		public function updateCamion(int $idcamion, string $codigo, string $marca, string $modelo, string $color, string $capacidad, int $planta){
			$this->intIdCamion = $idcamion;
			$this->strCodigoCamion = $codigo;
			$this->strMarcaCamion = $marca;
			$this->strModeloCamion = $modelo;
			$this->strColorCamion = $color;
			$this->strCapacidadCamion = $capacidad;
			$this->intPlantaCamion = $planta;

			$sql = "SELECT * FROM camiones WHERE (codigo = '{$this->strCodigoCamion}' AND idcamion != $this->intIdCamion)
										  OR (codigo = '{$this->strCodigoCamion}' AND idcamion != $this->intIdCamion) ";
			$request = $this->select_all($sql);

			if(empty($request)){
				$sql = "UPDATE camiones SET codigo=?, marca=?, modelo=?, color=?, capacidad=?, planta=? WHERE idcamion = $this->intIdCamion";
					$arrData = array($this->strCodigoCamion, $this->strMarcaCamion, $this->strModeloCamion, $this->strColorCamion, $this->strCapacidadCamion,$this->intPlantaCamion);
				
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
			return $request;
		
		}

		public function deleteCamion(int $idcamion){
			$this->intIdCamion = $idcamion;
			$sql = "DELETE FROM camiones WHERE idcamion = $this->intIdCamion";
			$request = $this->delete($sql);
			return $request;
		}

	}
 ?>
