<?php 
	class Cupos extends Controllers{
		public function __construct(){
			parent::__construct();
			session_start();
			if(empty($_SESSION['login'])){
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(4);
		}

		public function cupos(){
			$data['page_tag'] = "Creación cupos";
			$data['page_title'] = "Creación cupos";
			$data['page_name'] = "Creación cupos";
			$data['page_functions_js'] = "functions_cupos.js";
			$this->views->getView($this,"cupos",$data);
		}
		
		public function getCantidadCupo($cantidad_cupos_id){
			if($_SESSION['permisosMod']['r']){
				$intcantidad_cupos_Id = intval($cantidad_cupos_id);
				if($intcantidad_cupos_Id > 0){
					$arrData = $this->model->selectCantidadCupos($intcantidad_cupos_Id);
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

		public function CreacionCupos(){
			$arrData = $this->model->buscarCuposT();
			if(empty($arrData)){
				$arrResponse = array('status' => true, 'data' => 'Cupos creados');
			}else {
				$arrResponse = array('status' => false, 'msg' => 'Cupos no creados, ya se habian creado antes ');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}

		public function setLunes(){
			$arrData = $this->model->buscarCupos(1);
			if(empty($arrData)){
				$bloques = array($_POST['lunes_bloque_I'], $_POST['lunes_bloque_II'], $_POST['lunes_bloque_III'], $_POST['lunes_bloque_IV'], $_POST['lunes_bloque_V']);
				$intAnio = strftime("%Y");
				$intMes = date("n");
				$intSemana = date("W");
				$intDia = 1;
				$strCotizacion = 'portada_categoria.png';
				$strNombre_asesor = 'No Asignado';
				$intTipo_transporte = intval($_POST['cantidad_cupos_Id']);
				
				$dia = date("j");
				$mes = date("t");

				if ($dia==$mes) {
					$intMes = $intMes + 1;
				}else {
					$intMes = date("n");
				}

				if ($intSemana==53){
					$intSemana = 1;
					$intAnio = $intAnio + 1;
					$intMes = 1;
				}elseif($intSemana==52){
					$intSemana = 1;
					$intAnio = $intAnio + 1;
					$intMes = 1;
				}else{
					$intSemana = $intSemana+1;
				}
				
				$strFecha = date('Y-m-d', strtotime('01/01 +' . $intSemana-1 . ' weeks first day +' . 1 . ' day'));
				for ($l=0; $l<5; $l++) { 
					$intBloque = $l+1;
					$intSub_bloque = 0;
					$tuplas = $bloques[$l];
					$request_addac = "";
					for ($i=0; $i<$tuplas; $i++) {
						$intSub_bloque = $intSub_bloque+1;
						$request_addac = $this->model->inserCupos($intTipo_transporte,$intAnio,$intMes,$intSemana,$intDia,$intBloque,$intSub_bloque,$strNombre_asesor,$strCotizacion,$strFecha);
					}
					if($request_addac  || $request_addaca){
						$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}else {
				die();
			}			
		}

		public function setMartes(){
			$arrData = $this->model->buscarCupos(2);
			if(empty($arrData)){
				$bloques = array($_POST['martes_bloque_I'], $_POST['martes_bloque_II'], $_POST['martes_bloque_III'], $_POST['martes_bloque_IV'], $_POST['martes_bloque_V']);
				$intAnio = strftime("%Y");
				$intMes = date("n");
				$intSemana = date("W");
				$intDia = 2;				
				$strCotizacion = 'portada_categoria.png';
				$intTipo_transporte = intval($_POST['cantidad_cupos_Id']);
				$strNombre_asesor = 'No Asignado';
				
				$dia = date("j");
				$mes = date("t");
				if ($dia==$mes) {
					$intMes = $intMes + 1;
				}else {
					$intMes = date("n");
				}

				if ($intSemana==53){
					$intSemana = 1;
					$intAnio = $intAnio + 1;
					$intMes = 1;
				}elseif($intSemana==52){
					$intSemana = 1;
					$intAnio = $intAnio + 1;
					$intMes = 1;
				}else{
					$intSemana = $intSemana+1;
				}
				
				$strFecha = date('Y-m-d', strtotime('01/01 +' . $intSemana-1 . ' weeks first day +' . 1 . ' day'));
				for ($l=0; $l<5; $l++) { 
					$intBloque = $l+1;
					$intSub_bloque = 0;
					$tuplas = $bloques[$l];
					$request_addac = "";
					for ($i=0; $i<$tuplas; $i++) {
						$intSub_bloque = $intSub_bloque+1;
						$request_addac = $this->model->inserCupos($intTipo_transporte,$intAnio,$intMes,$intSemana,$intDia,$intBloque,$intSub_bloque,$strNombre_asesor,$strCotizacion,$strFecha);
					}
					if($request_addac){
						$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}else{
				die();
			}
		}

		public function setMiercoles(){
			$arrData = $this->model->buscarCupos(3);
			if(empty($arrData)){
				$bloques = array($_POST['miercoles_bloque_I'], $_POST['miercoles_bloque_II'], $_POST['miercoles_bloque_III'], $_POST['miercoles_bloque_IV'], $_POST['miercoles_bloque_V']);
				$intAnio = strftime("%Y");
				$intMes = date("n");
				$intSemana = date("W");
				$intDia = 3;				
				$strCotizacion = 'portada_categoria.png';
				$strNombre_asesor = 'No Asignado';
				$intTipo_transporte = intval($_POST['cantidad_cupos_Id']);
				
				$dia = date("j");
				$mes = date("t");
				if ($dia==$mes) {
					$intMes = $intMes + 1;
				}else {
					$intMes = date("n");
				}

				if ($intSemana==53){
					$intSemana = 1;
					$intAnio = $intAnio + 1;
					$intMes = 1;
				}elseif($intSemana==52){
					$intSemana = 1;
					$intAnio = $intAnio + 1;
					$intMes = 1;
				}else{
					$intSemana = $intSemana+1;
				}
				
				$strFecha = date('Y-m-d', strtotime('01/01 +' . $intSemana-1 . ' weeks first day +' . 1 . ' day'));
				for ($l=0; $l<5; $l++) { 
					$intBloque = $l+1;
					$intSub_bloque = 0;
					$tuplas = $bloques[$l];
					$request_addac = "";
					for ($i=0; $i<$tuplas; $i++) {
						$intSub_bloque = $intSub_bloque+1;
						$request_addac = $this->model->inserCupos($intTipo_transporte,$intAnio,$intMes,$intSemana,$intDia,$intBloque,$intSub_bloque,$strNombre_asesor,$strCotizacion,$strFecha);
					}
					if($request_addac){
						$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}else{
				die();
			}
		}

		public function setJueves(){
			$arrData = $this->model->buscarCupos(4);
			if(empty($arrData)){
				$bloques = array($_POST['jueves_bloque_I'], $_POST['jueves_bloque_II'], $_POST['jueves_bloque_III'], $_POST['jueves_bloque_IV'], $_POST['jueves_bloque_V']);
				$intAnio = strftime("%Y");
				$intMes = date("n");
				$intSemana = date("W");
				$intDia = 4;
				$strCotizacion = 'portada_categoria.png';
				$strNombre_asesor = 'No Asignado';
				$intTipo_transporte = intval($_POST['cantidad_cupos_Id']);
				
				$dia = date("j");
				$mes = date("t");
				if ($dia==$mes) {
					$intMes = $intMes + 1;
				}else {
					$intMes = date("M");
				}

				if ($intSemana==53){
					$intSemana = 1;
					$intAnio = $intAnio + 1;
					$intMes = 1;
				}elseif($intSemana==52){
					$intSemana = 1;
					$intAnio = $intAnio + 1;
					$intMes = 1;
				}else{
					$intSemana = $intSemana+1;
				}

				$strFecha = date('Y-m-d', strtotime('01/01 +' . $intSemana-1 . ' weeks first day +' . 1 . ' day'));
				for ($l=0; $l<5; $l++) { 
					$intBloque = $l+1;
					$intSub_bloque = 0;
					$tuplas = $bloques[$l];
					$request_addac = "";
					for ($i=0; $i<$tuplas; $i++) {
						$intSub_bloque = $intSub_bloque+1;
						$request_addac = $this->model->inserCupos($intTipo_transporte,$intAnio,$intMes,$intSemana,$intDia,$intBloque,$intSub_bloque,$strNombre_asesor,$strCotizacion,$strFecha);
					}
					if($request_addac){
						$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}else{
				die();
			}
		}

		public function setViernes(){
			$arrData = $this->model->buscarCupos(5);
			if(empty($arrData)){
				$bloques = array($_POST['viernes_bloque_I'], $_POST['viernes_bloque_II'], $_POST['viernes_bloque_III'], $_POST['viernes_bloque_IV'], $_POST['viernes_bloque_V']);
				$intAnio = strftime("%Y");
				$intMes = date("n");
				$intSemana = date("W");
				$intDia = 5;
				$strCotizacion = 'portada_categoria.png';
				$strNombre_asesor = 'No Asignado';
				$intTipo_transporte = intval($_POST['cantidad_cupos_Id']);

				$dia = date("j");
				$mes = date("t");
				if ($dia==$mes) {
					$intMes = $intMes + 1;
				}else {
					$intMes = date("n");
				}

				if ($intSemana==53){
					$intSemana = 1;
					$intAnio = $intAnio + 1;
					$intMes = 1;
				}elseif($intSemana==52){
					$intSemana = 1;
					$intAnio = $intAnio + 1;
					$intMes = 1;
				}else{
					$intSemana = $intSemana+1;
				}

				$strFecha = date('Y-m-d', strtotime('01/01 +' . $intSemana-1 . ' weeks first day +' . 1 . ' day'));
				for ($l=0; $l<5; $l++) { 
					$intBloque = $l+1;
					$intSub_bloque = 0;
					$tuplas = $bloques[$l];
					$request_addac = "";
					for ($i=0; $i<$tuplas; $i++) {
						$intSub_bloque = $intSub_bloque+1;
						$request_addac = $this->model->inserCupos($intTipo_transporte,$intAnio,$intMes,$intSemana,$intDia,$intBloque,$intSub_bloque,$strNombre_asesor,$strCotizacion,$strFecha);
					}
					if($request_addac){
						$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}else{
				die();
			}
		}

		public function delCupos(){
			if($_POST){
				if($_SESSION['permisosMod']['d']){

					$intTipo_transporte = intval($_POST['tipo_transporte']);

					if ($intTipo_transporte==1 || $intTipo_transporte==2) {

						$requestSelect = $this->model->selectCuposR($intTipo_transporte);
						if(empty($requestSelect)){
							$arrResponse = array('status' => false, 'msg' => 'Error al eliminar los cupos, no habian asignados para la siguiente semana.');
						}else{
							$requestDelete = $this->model->deleteCuposR($intTipo_transporte);
							$arrResponse = array('status' => true, 'msg' => 'Se han eliminado los cupos');
						}	
											
					}else if($intTipo_transporte==3 || $intTipo_transporte==4){ 

						$requestSelect = $this->model->selectCuposC($intTipo_transporte);
						if(empty($requestSelect)){
							$arrResponse = array('status' => false, 'msg' => 'Error al eliminar los cupos, no habian asignados para la siguiente semana.');
						}else{
							$requestDelete = $this->model->deleteCuposC($intTipo_transporte);
							$arrResponse = array('status' => true, 'msg' => 'Se han eliminado los cupos');
						}
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

	}
?>