<?php 
	class Ecuposrg extends Controllers{		
		public function __construct(){
			parent::__construct();
			session_start();
			if(empty($_SESSION['login'])){
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(3);
		}

		public function Ecuposrg(){
			$data['page_tag'] = "Ejecución Cupos Rastras Guazapa";
			$data['page_name'] = "Ejecución Cupos Rastras Planta Guazapa";
			$data['page_title'] = "Ejecución Cupos Rastras Planta Guazapa";
			$data['page_functions_js'] = "functions_ecuposrg.js";
			$this->views->getView($this,"ecuposrg",$data);
		}

		public function getEcuposrg(){ 
			$btnView = '';
			$btnEdit = '';
			$btnCot = '';
			$btnCan = '';
			$arrData = $this->model->selectEcuposrg();

			for ($i=0; $i < count($arrData); $i++) {
				$arrCotiza = $this->model->selectEcuporg($arrData[$i]['id_cupo']);
				$arrCotiza['url_portada'] = media().'/cotizacion/rastras/'.$arrCotiza['cotizacion'];
				
				if($arrData[$i]['estado'] == "Libre"){
					$arrData[$i]['estado'] = '<span class="badge badge-primary">Libre</span>';
				}else if($arrData[$i]['estado'] == "Programado"){
					$arrData[$i]['estado'] = '<span class="badge badge-info">Programado</span>';
				}else if($arrData[$i]['estado'] == "En proceso"){
					$arrData[$i]['estado'] = '<span class="badge badge-warning">En proceso</span>';
			    }else if($arrData[$i]['estado'] == "Cancelado"){
					$arrData[$i]['estado'] = '<span class="badge badge-danger">Cancelado</span>';
				}else if($arrData[$i]['estado'] == "Finalizado"){
					$arrData[$i]['estado'] = '<span class="badge badge-success">Finalizado</span>';
				}
				/*bloque*/
				if($arrData[$i]['bloque'] == 1){
					$arrData[$i]['bloque'] = '6:00:AM - 9:00:AM';
				}elseif($arrData[$i]['bloque'] == 2){
					$arrData[$i]['bloque'] = '9:00:AM - 12:00:MD';
				}elseif($arrData[$i]['bloque'] == 3){
					$arrData[$i]['bloque'] = '12:00:MD - 3:00:PM';
				}elseif($arrData[$i]['bloque'] == 4){
					$arrData[$i]['bloque'] = '3:00:PM - 6:00:PM';
				}elseif($arrData[$i]['bloque'] == 5){
					$arrData[$i]['bloque'] = '6:00:PM - 9:00:PM';					
				}
				/*dia*/
				if($arrData[$i]['dia'] == 1){
					$arrData[$i]['dia'] = 'Lunes';
				}elseif($arrData[$i]['dia'] == 2){
					$arrData[$i]['dia'] = 'Martes';
				}elseif($arrData[$i]['dia'] == 3){
					$arrData[$i]['dia'] = 'Miércoles';
				}elseif($arrData[$i]['dia'] == 4){
					$arrData[$i]['dia'] = 'Jueves';
				}elseif($arrData[$i]['dia'] == 5){
					$arrData[$i]['dia'] = 'Viernes';
				}
				/* */
				if ($arrCotiza['cotizacion']=='portada_categoria.png') {
					$btnEdit = '<button class="btn btn-primary btn-sm" title="Datos de asignación no cargados" disabled ><i class="fas fa-pencil-alt"></i></button>';
     				$btnView = '<button class="btn btn-info btn-sm" title="Datos de asignación no cargados" disabled ><i class="far fa-eye"></i></button>';
					$btnCot = '<button class="btn btn-warning btn-sm" title="Datos de asignación no cargados" disabled ><i class="fa fa-file-text-o"></i></button>';
					$btnCan = '<button class="btn btn-danger btn-sm" title="Datos de asignación no cargados" disabled><i class="fa fa-times"></i></button>';
				}else{
					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary btn-sm" onClick="fntEditEcuposrg('.$arrData[$i]['id_cupo'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
						$btnCan = '<button class="btn btn-danger btn-sm" onClick="fntCanEcuposrg('.$arrData[$i]['id_cupo'].')" title="Cancelar"><i class="fa fa-times"></i></button>';
					}else{
						$btnEdit = '<button class="btn btn-primary btn-sm" title="Acceso denegado" disabled ><i class="fas fa-pencil-alt"></i></button>';
						$btnCan = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled ><i class="fa fa-times"></i></button>';
					}
					if($_SESSION['permisosMod']['r']){
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewEcuposrg('.$arrData[$i]['id_cupo'].')" title="Ver datos"><i class="far fa-eye"></i></button>';
						$btnCot = '<a href="'.$arrCotiza['url_portada'].' " target="_blank" class="btn btn-warning btn-sm"  title="Ver cotización"> <i class="fa fa-file-text-o"></i></a>';
					}else{
						$btnView = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled ><i class="far fa-eye"></i></button>';
					    $btnCot = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled ><i class="fa fa-file-text-o"></i></button>';
					}
				}
				$arrData[$i]['options'] = '<div class="text-center">'.$btnEdit.' '.$btnView.' '.$btnCot.' '.$btnCan.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function getEcuporg($idcupo){
			if($_SESSION['permisosMod']['r']){
				$intCupo_Id = intval($idcupo);
				if($intCupo_Id > 0){
					$arrData = $this->model->selectEcuporg($intCupo_Id);
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

		public function setEcuporg(){
			if($_POST){
				if(empty($_POST['txtHoraInicioER']))
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{ 
					$intCupo_id = $_POST['idEcuposR'];
					
					$intTendidos_Tarima = intval(strClean($_POST['listTendidosTarimaER']));
					$intCapacidad_Tarima = intval(strClean($_POST['listCapacidadTarimasER']));
					$intCantidad_Tarima = intval(strClean($_POST['txtCantidadTarimasER']));					
					
					$strHora_entrada = $_POST['txtHoraInicioERE'];
					$strHora_inicio = $_POST['txtHoraInicioER'];
					$strHora_finalizacion = $_POST['txtHoraFinalER'];
					$strHora_salida = $_POST['txtHoraFinalERS'];

					$strEstado = '';

					if($_POST['txtHoraInicioER']!='' && $_POST['txtHoraFinalER']==''){
						$strEstado = 'En proceso';
					}else{
						$strEstado = 'Finalizado';
					}
					
					$strObservacion_ejecucion = $_POST['txtDescripcionER'];

					$strTiempo_duracion = 2;

					if($_SESSION['permisosMod']['u']){
						$request_user = $this->model->updateEcuporg($intCupo_id, $strEstado, $intTendidos_Tarima, $intCapacidad_Tarima, $intCantidad_Tarima, 
						$strHora_entrada, $strHora_inicio, $strHora_finalizacion, $strHora_salida, $strTiempo_duracion, $strObservacion_ejecucion);
					}

					if($request_user > 0 ){
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados.');
					}else{
						$arrResponse = array('status' => true, 'msg' => 'Error al guardar datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function setEcuporgg(){
			if($_POST){
				if(empty($_POST['txtHoraInicioERG'])){
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{ 
					$intCupo_id = $_POST['idEcuposRG'];

				
					$strHora_entrada = $_POST['txtHoraInicioERGE'];
					$strHora_inicio = $_POST['txtHoraInicioERG'];
					$strHora_finalizacion = $_POST['txtHoraFinalERG'];
					$strHora_salida = $_POST['txtHoraFinalERGS'];

					$strObservacion_ejecucion = $_POST['txtDescripcionERG'];

					$strEstado = '';

					if($_POST['txtHoraInicioERG']!='' && $_POST['txtHoraFinalERG']==''){
						$strEstado = 'En proceso';
					}else{
						$strEstado = 'Finalizado';
					}

					$strTiempo_duracion = 2;

					if($_SESSION['permisosMod']['u']){
						$request_user = $this->model->updateEcuporgg($intCupo_id,$strEstado, $strHora_inicio, $strHora_finalizacion, $strHora_entrada, $strHora_salida, $strTiempo_duracion, $strObservacion_ejecucion);
					}

					if($request_user > 0 ){
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados.');
					}else{
						$arrResponse = array('status' => true, 'msg' => 'Error al guardar datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}	


		public function consultaRG(){
			$btnView = '';
			$btnEdit = '';
			$btnCot = '';
			$btnCan = '';
			$fechaInicio = ''.$_POST['from_date'];
			$fechaFinal = ''.$_POST['to_date'];

			$arrData = $this->model->selectConsultaRG($fechaInicio, $fechaFinal);

			for ($i=0; $i < count($arrData); $i++) {
				$arrCotiza = $this->model->selectEcuporg($arrData[$i]['id_cupo']);
				$arrCotiza['url_portada'] = media().'/cotizacion/rastras/'.$arrCotiza['cotizacion'];
				
				if($arrData[$i]['estado'] == "Libre"){
					$arrData[$i]['estado'] = '<span class="badge badge-primary">Libre</span>';
				}else if($arrData[$i]['estado'] == "Programado"){
					$arrData[$i]['estado'] = '<span class="badge badge-info">Programado</span>';
				}else if($arrData[$i]['estado'] == "En proceso"){
					$arrData[$i]['estado'] = '<span class="badge badge-warning">En proceso</span>';
			    }else if($arrData[$i]['estado'] == "Cancelado"){
					$arrData[$i]['estado'] = '<span class="badge badge-danger">Cancelado</span>';
				}else if($arrData[$i]['estado'] == "Finalizado"){
					$arrData[$i]['estado'] = '<span class="badge badge-success">Finalizado</span>';
				}
				/*bloque*/
				if($arrData[$i]['bloque'] == 1){
					$arrData[$i]['bloque'] = '6:00:AM - 9:00:AM';
				}elseif($arrData[$i]['bloque'] == 2){
					$arrData[$i]['bloque'] = '9:00:AM - 12:00:MD';
				}elseif($arrData[$i]['bloque'] == 3){
					$arrData[$i]['bloque'] = '12:00:MD - 3:00:PM';
				}elseif($arrData[$i]['bloque'] == 4){
					$arrData[$i]['bloque'] = '3:00:PM - 6:00:PM';
				}elseif($arrData[$i]['bloque'] == 5){
					$arrData[$i]['bloque'] = '6:00:PM - 9:00:PM';					
				}
				/*dia*/
				if($arrData[$i]['dia'] == 1){
					$arrData[$i]['dia'] = 'Lunes';
				}elseif($arrData[$i]['dia'] == 2){
					$arrData[$i]['dia'] = 'Martes';
				}elseif($arrData[$i]['dia'] == 3){
					$arrData[$i]['dia'] = 'Miércoles';
				}elseif($arrData[$i]['dia'] == 4){
					$arrData[$i]['dia'] = 'Jueves';
				}elseif($arrData[$i]['dia'] == 5){
					$arrData[$i]['dia'] = 'Viernes';
				}
				/* */
				$dia = date("N");
				if ($arrData[$i]['dia'] == $dia) {
					if ($arrCotiza['cotizacion']=='portada_categoria.png') {
						$btnEdit = '<button class="btn btn-primary btn-sm" title="Datos de asignación no cargados" disabled ><i class="fas fa-pencil-alt"></i></button>';
						$btnView = '<button class="btn btn-info btn-sm" title="Datos de asignación no cargados" disabled ><i class="far fa-eye"></i></button>';
						$btnCot = '<button class="btn btn-warning btn-sm" title="Datos de asignación no cargados" disabled ><i class="fa fa-file-text-o"></i></button>';
						$btnCan = '<button class="btn btn-danger btn-sm" title="Datos de asignación no cargados" disabled ><i class="fa fa-times"></i></button>';
					}else{
						if($_SESSION['permisosMod']['u']){
							$btnEdit = '<button class="btn btn-primary btn-sm" onClick="fntEditEcuposrg('.$arrData[$i]['id_cupo'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
							$btnCan = '<button class="btn btn-danger btn-sm" onClick="fntCanEcuposrg('.$arrData[$i]['id_cupo'].')" title="Cancelar"><i class="fa fa-times"></i></button>';
						}else{
							$btnEdit = '<button class="btn btn-primary btn-sm" title="Acceso denegado" disabled ><i class="fas fa-pencil-alt"></i></button>';
							$btnCan = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="fa fa-times" ></i></button>';
						}
						if($_SESSION['permisosMod']['r']){
							$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewEcuposrg('.$arrData[$i]['id_cupo'].')" title="Ver datos"><i class="far fa-eye"></i></button>';
							$btnCot = '<a href="'.$arrCotiza['url_portada'].' " target="_blank" class="btn btn-warning btn-sm"  title="Ver cotización"> <i class="fa fa-file-text-o"></i></a>';
						}else{
							$btnView = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled ><i class="far fa-eye"></i></button>';
							$btnCot = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled ><i class="fa fa-file-text-o"></i></button>';
						}
					}
				}else{
					$btnEdit = '<button class="btn btn-primary btn-sm" title="Acceso denegado" disabled ><i class="fas fa-pencil-alt"></i></button>';
					$btnView = '<button class="btn btn-info btn-sm" title="Acceso denegado" disabled ><i class="far fa-eye"></i></button>';
					$btnCot = '<button class="btn btn-warning btn-sm" title="Acceso denegado" disabled ><i class="fa fa-file-text-o"></i></button>';
					$btnCan = '<button class="btn btn-danger btn-sm" title="Acceso denegado" disabled><i class="fa fa-times"></i></button>';
				}
				$arrData[$i]['options'] = '<div class="text-center">'.$btnEdit.' '.$btnView.' '.$btnCot.' '.$btnCan.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

		/* cancelar cupo */
		public function cancelarCuporg(){
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$idcupo = intval($_POST['idCupo']);
					$requestDelete = $this->model->cancelarCuporg($idcupo);
					if($requestDelete){
						$arrResponse = array('status' => true, 'msg' => 'Se ha cancelado el cupo');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar al cancelar el cupo.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

	}

?>