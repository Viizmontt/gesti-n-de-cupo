<?php 
    session_start();
	class Camiones extends Controllers{
		public function __construct(){
			parent::__construct();
			if(empty($_SESSION['login'])){
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(4);
		}

		public function Camiones(){
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Camiones";
			$data['page_title'] = "Camiones";
			$data['page_name'] = "Camiones";
			$data['page_functions_js'] = "functions_camiones.js";
			$this->views->getView($this,"camiones",$data);
		}

		public function setCamion(){
			if($_POST){			
				if(empty($_POST['txtCodigoCamion']) || empty($_POST['txtMarcaCamion']) 
				|| empty($_POST['txtModeloCamion']) || empty($_POST['txtColorCamion'])
				|| empty($_POST['txtCapacidadCamion'])){
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					$idCamion = intval($_POST['idCamion']);
					$strCodigo = strClean($_POST['txtCodigoCamion']);
					$strMarca = strClean($_POST['txtMarcaCamion']);
					$strModelo = strClean($_POST['txtModeloCamion']);
					$strColor = strClean($_POST['txtColorCamion']);
					$strCapacidad = strClean($_POST['txtCapacidadCamion']);
					$intPlanta = strClean($_POST['txtPlantaCamion']);
					
					$request_user = "";
					if($idCamion == 0){
						$option = 1;
						if($_SESSION['permisosMod']['w']){
							$request_user = $this->model->insertCamion($strCodigo, $strMarca, $strModelo, $strColor, $strCapacidad,$intPlanta);
						}
					}else{
						$option = 2;
						if($_SESSION['permisosMod']['u']){
							$request_user = $this->model->updateCamion($idCamion, $strCodigo, $strMarca, $strModelo, $strColor, $strCapacidad,$intPlanta);
						}
					}					

					if($request_user > 0 ){
						if($option == 1){
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
						}else{
							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
						}
					}else if($request_user == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! el código ya existe, ingrese otro.');		
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
					
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getCamiones(){
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectCamiones();
				for ($i=0; $i < count($arrData); $i++) {
					$btnEdit = '';
					$btnDelete = '';

					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary  btn-sm btnEditCamion" onClick="fntEditCamion(this, '.$arrData[$i]['idcamion'].')" title="Editar camión"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelCamion" onClick="fntDelCamion('.$arrData[$i]['idcamion'].')" title="Eliminar camión"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getCamion($idcamion){
			if($_SESSION['permisosMod']['r']){
				$idcamion = intval($idcamion);
				if($idcamion > 0){
					$arrData = $this->model->selectCamion($idcamion);
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

		public function delCamion(){
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdcamion = intval($_POST['idCamion']);
					$requestDelete = $this->model->deleteCamion($intIdcamion);
					if($requestDelete){
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el usuario');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el usuario.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

		public function getSelectCamiones(){
			$htmlOptions = "";
			$arrData = $this->model->selectCamiones();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					$htmlOptions .= '<option value="'.$arrData[$i]['marca'].' '.$arrData[$i]['modelo'].'">'.$arrData[$i]['marca'].' '.$arrData[$i]['modelo'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}

	}
 ?>