<?php 
    session_start();
	class Motoristas extends Controllers{
		public function __construct(){
			parent::__construct();
			if(empty($_SESSION['login'])){
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(4);
		}

		public function Motoristas(){
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Motoristas";
			$data['page_title'] = "Motoristas";
			$data['page_name'] = "Motoristas";
			$data['page_functions_js'] = "functions_motoristas.js";
			$this->views->getView($this,"motoristas",$data);
		}

		public function getMotoristas(){
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectMotoristas();
				for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
					$btnEdit = '';
					$btnDelete = '';

					if($_SESSION['permisosMod']['r']){
						$btnView = '<button class="btn btn-info btn-sm btnViewMotorista" onClick="fntViewMotorista('.$arrData[$i]['idmotorista'].')" title="Ver motorista"><i class="far fa-eye"></i></button>';
					}
					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary  btn-sm btnEditMotorista" onClick="fntEditMotorista(this, '.$arrData[$i]['idmotorista'].')" title="Editar motorista"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelMotorista" onClick="fntDelMotorista('.$arrData[$i]['idmotorista'].')" title="Eliminar motorista"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.''.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getMotorista($idmotorista){
			if($_SESSION['permisosMod']['r']){
				$idmotorista = intval($idmotorista);
				if($idmotorista > 0){
					$arrData = $this->model->selectMotorista($idmotorista);
					if(empty($arrData)){
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

		public function setMotorista(){
			if($_POST){			
				if(empty($_POST['txtNombresMotorista']) || empty($_POST['txtApellidosMotorista']) 
				|| empty($_POST['txtDuiMotorista']) || empty($_POST['txtLicenciaMotorista'])
				|| empty($_POST['txtFinalizacionMotorista']) || empty($_POST['listPlantaMotorista'])
				|| empty($_POST['txtCalidadMotorista'])){
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					$idMotorista = intval($_POST['idMotorista']);
					$strNombres = strClean($_POST['txtNombresMotorista']);
					$strApellidos = strClean($_POST['txtApellidosMotorista']);
					$intDui = strClean($_POST['txtDuiMotorista']);
					$intLicencia = strClean($_POST['txtLicenciaMotorista']);
					$strFinalizacion = strClean($_POST['txtFinalizacionMotorista']);
					$intPlanta = strClean($_POST['listPlantaMotorista']);
					$strNota = $_POST['txtCalidadMotorista'];
					$strObservacion = strClean($_POST['txtDescripcionMotorista']);
					
					$request_user = "";
					if($idMotorista == 0){
						$option = 1;
						if($_SESSION['permisosMod']['w']){
							$request_user = $this->model->insertMotorista($strNombres, $strApellidos, $intDui, $intLicencia, $strFinalizacion, $intPlanta ,$strNota, $strObservacion);
						}
					}else{
						$option = 2;
						if($_SESSION['permisosMod']['u']){
							$request_user = $this->model->updateMotorista($idMotorista, $strNombres, $strApellidos, $intDui, $intLicencia, $strFinalizacion, $intPlanta ,$strNota, $strObservacion);
						}
					}					

					if($request_user > 0 ){
						if($option == 1){
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
						}else{
							$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
						}
					}else if($request_user == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! el motorista ya existe, ingrese otro.');		
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
					
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function delMotorista(){
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdmotorista = intval($_POST['idMotorista']);
					$requestDelete = $this->model->deleteMotorista($intIdmotorista);
					if($requestDelete){
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado al motorista');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar al motorista.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

		/* */

		public function getSelectMotoristas(){
			$htmlOptions = "";
			$arrData = $this->model->selectMotoristas();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					$htmlOptions .= '<option value="'.$arrData[$i]['nombres'].' '.$arrData[$i]['apellidos'].'">'.$arrData[$i]['nombres'].' '.$arrData[$i]['apellidos'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}

	}
?>