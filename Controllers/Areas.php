<?php 

	class Areas extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			//session_regenerate_id(true);
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(4);
		}

		public function Areas()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Area";
			$data['page_name'] = "Area";
			$data['page_title'] = "Área";
			$data['page_functions_js'] = "functions_areas.js";
			$this->views->getView($this,"area",$data);
		}

		public function getAreas(){
			if($_SESSION['permisosMod']['r']){
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				$arrData = $this->model->selectAreas();

				for ($i=0; $i < count($arrData); $i++) {
					if($_SESSION['permisosMod']['u']){						
						$btnEdit = '<button class="btn btn-primary btn-sm btnEditArea" onClick="fntEditArea('.$arrData[$i]['idarea'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
					}else {
						$btnEdit = '<button class="btn btn-primary btn-sm" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelArea" onClick="fntDelArea('.$arrData[$i]['idarea'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
					}else {
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelArea"  title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getSelectAreas(){
			$htmlOptions = "";
			$arrData = $this->model->selectAreas();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) {
					$htmlOptions .= '<option value="'.$arrData[$i]['idarea'].'">'.$arrData[$i]['nombrearea'].'</option>';
				}
			}
			echo $htmlOptions;
			die();		
		}

		public function getArea(int $idarea){
			if($_SESSION['permisosMod']['r']){
				$intIdarea = intval(strClean($idarea));
				if($intIdarea > 0)
				{
					$arrData = $this->model->selectArea($intIdarea);
					if(empty($arrData))
					{
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

		public function setArea(){
				$intIdarea = intval($_POST['idArea']);
				$strArea =  strClean($_POST['txtNombre']);
				$strDescipcion = strClean($_POST['txtDescripcion']);
				$request_area = "";
				if($intIdarea == 0){
					//Crear
					if($_SESSION['permisosMod']['w']){
						$request_area = $this->model->insertArea($strArea, $strDescipcion);
						$option = 1;
					}
				}else{
					//Actualizar
					if($_SESSION['permisosMod']['u']){
						$request_area = $this->model->updateArea($intIdarea, $strArea, $strDescipcion);
						$option = 2;
					}
				}

				if($request_area > 0 ){
					if($option == 1){
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					}else{
						$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
					}
				}else if($request_area == 'exist'){
					$arrResponse = array('status' => false, 'msg' => '¡Atención! El area ya existe.');
				}else{
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function delArea(){
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdarea = intval($_POST['idArea']);
					$requestDelete = $this->model->deleteArea($intIdarea);
					if($requestDelete == 'ok')
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el área');
					}else if($requestDelete == 'exist'){
						$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un área con usuarios asociados.');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la área.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

	}
 ?>