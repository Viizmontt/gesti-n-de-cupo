<?php 
    session_start();
	class Usuarios extends Controllers{
		public function __construct(){
			parent::__construct();
			if(empty($_SESSION['login'])){
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(4);
		}

		public function Usuarios(){
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Usuarios";
			$data['page_title'] = "Usuarios";
			$data['page_name'] = "Usuarios";
			$data['page_functions_js'] = "functions_usuarios.js";
			$this->views->getView($this,"usuarios",$data);
		}

		public function setUsuario(){
			if($_POST){			
				if(empty($_POST['txtNombre'])  || empty($_POST['txtApellido']) 
				|| empty($_POST['txtEmail']) || empty($_POST['listRolid']) 
				|| empty($_POST['listStatus']) || empty($_POST['listAreaid'])
				|| empty($_POST['listLocacionid']) || empty($_POST['txtPassword'])){
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					
					$idUsuario = intval($_POST['idUsuario']);
					$strNombre = ucwords(strClean($_POST['txtNombre']));
					$strApellido = ucwords(strClean($_POST['txtApellido']));
					$strEmail = strtolower(strClean($_POST['txtEmail']));
					$strPassword = strClean($_POST['txtPassword']);
					$strLocacion = ucwords(strClean($_POST['listLocacionid']));
					$intTipoId = intval(strClean($_POST['listRolid']));
					$intAreaId = intval(strClean($_POST['listAreaid']));
					$intStatus = intval(strClean($_POST['listStatus']));
					$request_user = "";

					if($idUsuario == 0){
						$option = 1;
						if($_SESSION['permisosMod']['w']){
							$request_user = $this->model->insertUsuario($strNombre, $strApellido, $strEmail, $strPassword, $strLocacion, $intTipoId, $intAreaId, $intStatus);
						}
					}else{
						$option = 2;
						if($_SESSION['permisosMod']['u']){
							$request_user = $this->model->updateUsuario($idUsuario, $strNombre, $strApellido, $strEmail, $strPassword, $strLocacion, $intTipoId, $intAreaId, $intStatus);
						}

					}					

					if($request_user > 0 )
					{
						if($option == 1){
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
						}else{
							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
						}
					}else if($request_user == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! el email o la identificación ya existe, ingrese otro.');		
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
					
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getUsuarios(){
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectUsuarios();
				for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
					$btnEdit = '';
					$btnDelete = '';

					if($arrData[$i]['status'] == 1){
						$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
					}else{
						$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
					}

					if($_SESSION['permisosMod']['r']){
						$btnView = '<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewUsuario('.$arrData[$i]['idpersona'].')" title="Ver usuario"><i class="far fa-eye"></i></button>';
					}else {
						$btnView = '<button class="btn btn-info btn-sm btnViewUsuario" title="Acceso denegado" disabled><i class="far fa-eye"></i></button>';
					}

					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditUsuario(this,'.$arrData[$i]['idpersona'].')" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>';
					}else {
						$btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" title="Acceso denegado" disabled><i class="fas fa-pencil-alt"></i></button>';
					}

					if($_SESSION['permisosMod']['d']){
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelUsuario('.$arrData[$i]['idpersona'].')" title="Eliminar usuario"><i class="far fa-trash-alt"></i></button>';
					}else {
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" title="Acceso denegado" disabled><i class="far fa-trash-alt"></i></button>';
					}

					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getUsuario($idpersona){
			if($_SESSION['permisosMod']['r']){
				$idusuario = intval($idpersona);
				if($idusuario > 0){
					$arrData = $this->model->selectUsuario($idusuario);
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

		public function delUsuario(){
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdpersona = intval($_POST['idUsuario']);
					$requestDelete = $this->model->deleteUsuario($intIdpersona);
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

	}
 ?>