<?php
	class MotoristasModel extends Mysql{

		private $intIdMotorista;
		private $intDuiMotorista;
		private $intLicenciaMotorista;
		private $strFinalizacionMotorista;
		private $intPlantaMotorista;
		private $strNotaMotorista;
		private $strNombresMotorista;
		private $strApellidosMotorista;
		private $strObservacionMotorista;

		public function __construct(){
			parent::__construct();
		}

		public function selectMotoristas() {
			$sql = "SELECT * FROM motoristas ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectMotorista(int $idmotorista){
			$this->intIdMotorista = $idmotorista;
			$sql = "SELECT * FROM motoristas WHERE idmotorista = $this->intIdMotorista";
			$request = $this->select($sql);
			return $request;
		}

		public function insertMotorista(string $nombres, string $apellidos, int $dui, int $licencia, string $finalizacion, int $planta, string $nota, string $observacion){
			$this->strNombresMotorista = $nombres;
			$this->strApellidosMotorista = $apellidos;
			$this->intDuiMotorista = $dui;
			$this->intLicenciaMotorista = $licencia;
			$this->strFinalizacionMotorista = $finalizacion;
			$this->intPlantaMotorista = $planta;
			$this->strNotaMotorista = $nota;
			$this->strObservacionMotorista = $observacion;

			$return = 0;
			$sql = "SELECT dui FROM motoristas WHERE dui = $this->intDuiMotorista AND licencia = $this->intLicenciaMotorista";
			$request = $this->select_all($sql);
			if(empty($request)){
				$query_insert  = "INSERT INTO motoristas (nombres,apellidos,dui,licencia,finalizacion,planta,nota,observacion) VALUES(?,?,?,?,?,?,?,?)";
	        	$arrData = array($this->strNombresMotorista,$this->strApellidosMotorista,$this->intDuiMotorista,$this->intLicenciaMotorista,$this->strFinalizacionMotorista,$this->intPlantaMotorista,$this->strNotaMotorista,$this->strObservacionMotorista);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}

		public function updateMotorista(int $idmotorista, string $nombres, string $apellidos, int $dui, int $licencia, string $finalizacion, int $planta, string $nota, string $observacion){
			$this->intIdMotorista = $idmotorista;
			$this->strNombresMotorista = $nombres;
			$this->strApellidosMotorista = $apellidos;
			$this->intDuiMotorista = $dui;
			$this->intLicenciaMotorista = $licencia;
			$this->strFinalizacionMotorista = $finalizacion;
			$this->intPlantaMotorista = $planta;
			$this->strNotaMotorista = $nota;
			$this->strObservacionMotorista = $observacion;

			$sql = "SELECT * FROM motoristas WHERE (idmotorista = $this->intIdMotorista AND dui != $this->intDuiMotorista)
				OR (idmotorista = $this->intIdMotorista AND licencia != $this->intLicenciaMotorista) ";
			$request = $this->select_all($sql);

			if(empty($request)){
				$sql = "UPDATE motoristas SET nombres=?, apellidos=?, dui=?, licencia=?, finalizacion=?, planta=?, nota=?observacion=? WHERE idmotorista = $this->intIdMotorista";
				$arrData = array($this->strNombresMotorista,$this->strApellidosMotorista,$this->intDuiMotorista,$this->intLicenciaMotorista,$this->strFinalizacionMotorista,$this->intPlantaMotorista,$this->strNotaMotorista,$this->strObservacionMotorista);				
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
			return $request;
		
		}

		public function deleteMotorista(int $idmotorista){
			$this->intIdMotorista = $idmotorista;
			$sql = "DELETE FROM motoristas WHERE idmotorista = $this->intIdMotorista";
			$request = $this->delete($sql);
			return $request;
		}
		
	}
?>