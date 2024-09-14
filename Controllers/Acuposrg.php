<?php 
    session_start();
	class Acuposrg extends Controllers{
		public function __construct(){
			parent::__construct();
			if(empty($_SESSION['login'])){
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(2);
		}

		public function Acuposrg(){
			$data['page_tag'] = "Asignación Cupos Rastras Guazapa";
			$data['page_name'] = "Asignación Cupos Rastra Planta Guazapa";
			$data['page_title'] = "Asignación Cupos Rastra Planta Guazapa";
			$data['page_functions_js'] = "functions_acuposrg.js";
			$this->views->getView($this,"acuposrg",$data);
		}

		/* -------------------------------------------------------------------------------------------------------------------- */
		/* -------------------------------------------------------------------------------------------------------------------- */

		/* BUSCAR CANTIDAD DE CUPOS */
		public function get_Cupos($anio, $semana, $dia, $bloque){
			$arrData = $this->model->select_Cupos($anio, $semana, $dia, $bloque);
			return $arrData;
		}
		/* Buscar los cupos por bloque*/
		public function get_SubBloque($anio, $semana, $dia, $bloque){
			$arrData = $this->model->select_SubBloque_Cupos($anio, $semana, $dia, $bloque);
			return $arrData;
		}
		/* Datos del cupo: identificador, nombre asesor y tipo carga */
		public function get_DatosCupos($anio, $semana, $dia, $bloque, $sub_bloque){
			$arrData = $this->model->select_DatosCupos($anio, $semana, $dia, $bloque, $sub_bloque);
			return $arrData;
		}

		/* -------------------------------------------------------------------------------------------------------------------- */
		/* -------------------------------------------------------------------------------------------------------------------- */

		/* - CUPOS ASIGNACION- */
		/* -INGRESAR LOS DATOS DEL CUPO Y SU COTIZACION- */
		public function setAcuporg(){
			$idcupo = intval($_POST['idAcuposR']);
			if($_POST['listMetodoCargaAR']=='Granel') {
					$idAcuposrg = intval($_POST['idAcuposR']);
					$strMetodo_Carga = strClean($_POST['listMetodoCargaAR']);
					$strCliente = strClean($_POST['listClienteAR']);
		
					$foto   	 	= $_FILES['foto'];
					$nombre_foto 	= $foto['name'];
					$type 		 	= $foto['type'];
					$url_temp    	= $foto['tmp_name'];
					$pdfCotizacion 	= 'portada_categoria.png';
					$request_user = "";
					if($nombre_foto != ''){
						$pdfCotizacion = 'cupo_'.md5(date('d-m-Y H:i:s')).'.pdf';
					}
		
					$strRuta = $idAcuposrg;
					$strRuta = str_replace(" ","-",$strRuta);
					$strEstado = strClean($_POST['listEstadoAR']);

					$intTendidos_Tarima = 0;
					$intCapacidad_Tarima = 0;
					$intCantidad_Tarima = 0;
					$strObservacion_Asignacion = strClean($_POST['txtDescripcionAR']);
					/* foto */
					if($nombre_foto == ''){
						if($_POST['foto_actual'] != 'portada_categoria.png' && $_POST['foto_remove'] == 0 ){
							$pdfCotizacion = $_POST['foto_actual'];
						}
					}

					$tiempo = $_POST['txtTiempoARo'];
					$hora='';

					if ($tiempo=='PM') {
						if ($_POST['listHoraAR']=='01') { $hora = 13; }
						if ($_POST['listHoraAR']=='02') { $hora = 14; }
						if ($_POST['listHoraAR']=='03') { $hora = 15; }
						if ($_POST['listHoraAR']=='4') { $hora = 16; }
						if ($_POST['listHoraAR']=='05') { $hora = 17; }
						if ($_POST['listHoraAR']=='06') { $hora = 18; }
						if ($_POST['listHoraAR']=='07') { $hora = 19; }
						if ($_POST['listHoraAR']=='08') { $hora = 20; }
						if ($_POST['listHoraAR']=='09') { $hora = 21; }
					}else{
						$hora=$_POST['listHoraAR'];
					}

					$strHora_Asignada = $hora.':'.$_POST['listMinutosAR'];


					/* ingresar datos cupos */
					$request_user = $this->model->updateAcuporg($idAcuposrg, $strHora_Asignada, $strCliente, $strMetodo_Carga, $pdfCotizacion, $strRuta, $strEstado, $intTendidos_Tarima, $intCapacidad_Tarima, $intCantidad_Tarima, $strObservacion_Asignacion);
					
					if($request_user > 0 ){
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados.');
						if($nombre_foto != ''){ uploadFileR($foto,$pdfCotizacion); }
		
						if(($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_categoria.png')
						|| ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_categoria.png')){
							deleteFileR($_POST['foto_actual']);
						}
					}
			}else{
				if(empty($_POST['txtCantidadTarimasAR'])){
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos. Debe incluir la Cotización');
				}else{
					$idAcuposrg = intval($_POST['idAcuposR']);
					$strCliente = strClean($_POST['listClienteAR']);
					$strMetodo_Carga = strClean($_POST['listMetodoCargaAR']);
		
					$foto   	 	= $_FILES['foto'];
					$nombre_foto 	= $foto['name'];
					$type 		 	= $foto['type'];
					$url_temp    	= $foto['tmp_name'];
					$pdfCotizacion 	= 'portada_categoria.png';
					$request_user = "";
					if($nombre_foto != ''){
						$pdfCotizacion = 'cupo_'.md5(date('d-m-Y H:i:s')).'.pdf';
					}
		
					$strRuta = $idAcuposrg;
					$strRuta = str_replace(" ","-",$strRuta);
		
					$strEstado = strClean($_POST['listEstadoAR']);


					$intTendidos_Tarima = intval(strClean($_POST['listTendidosTarimaAR']));
					$intCapacidad_Tarima = intval(strClean($_POST['listCapacidadTarimasAR']));
					$intCantidad_Tarima = intval(strClean($_POST['txtCantidadTarimasAR']));
					$strObservacion_Asignacion = strClean($_POST['txtDescripcionAR']);
		
					/* foto */
					if($nombre_foto == ''){
						if($_POST['foto_actual'] != 'portada_categoria.png' && $_POST['foto_remove'] == 0 ){
							$pdfCotizacion = $_POST['foto_actual'];
						}
					}

					$tiempo = $_POST['txtTiempoARo'];
					$hora='';

					if ($tiempo=='PM') {
						if ($_POST['listHoraAR']=='01') {$hora = 13;}
						if ($_POST['listHoraAR']=='02') {$hora = 14;}
						if ($_POST['listHoraAR']=='03') {$hora = 15;}
						if ($_POST['listHoraAR']=='4') {$hora = 16;}
						if ($_POST['listHoraAR']=='05') {$hora = 17;}
						if ($_POST['listHoraAR']=='06') {$hora = 18;}
						if ($_POST['listHoraAR']=='07') {$hora = 19;}
						if ($_POST['listHoraAR']=='08') {$hora = 20;}
						if ($_POST['listHoraAR']=='09') {$hora = 21;}
					}else{
						$hora=$_POST['listHoraAR'];
					}

					$strHora_Asignada = $hora.':'.$_POST['listMinutosAR'];

					/* ingresar datos cupos */
					$request_user = $this->model->updateAcuporg($idAcuposrg, $strHora_Asignada, $strCliente, $strMetodo_Carga, $pdfCotizacion, $strRuta, $strEstado, $intTendidos_Tarima, $intCapacidad_Tarima, $intCantidad_Tarima, $strObservacion_Asignacion);

					if($request_user > 0 ){
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados.');
						if($nombre_foto != ''){
							uploadFileR($foto,$pdfCotizacion);
						}
						if(($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_categoria.png')
						|| ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_categoria.png')){
							deleteFileR($_POST['foto_actual']);
						}
					}
				}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}

		/* -DATOS DE UN CUPO EN PARTICULAR- */
		public function getAcuporg($idcupo){
			$intCupo_Id = intval($idcupo);
			if($intCupo_Id > 0){
				$arrData = $this->model->selectAcuporg($intCupo_Id);
				if(empty($arrData)){
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrData['url_portada'] = media().'/images/uploads/'.$arrData['cotizacion'];
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		
	}
?>