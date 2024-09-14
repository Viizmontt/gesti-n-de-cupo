<?php 
    session_start();
	class Acuposcg extends Controllers{
		public function __construct(){
			parent::__construct();
			if(empty($_SESSION['login'])){
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(2);
		}

		public function Acuposcg(){
			$data['page_tag'] = "Asignación Cupos Camiones Guazapa";
			$data['page_name'] = "Asignación Cupos Camiones Planta Guazapa";
			$data['page_title'] = "Asignación Cupos Camiones Planta Guazapa";
			$data['page_functions_js'] = "functions_acuposcg.js";
			$this->views->getView($this,"acuposcg",$data);		
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
	
		/* -ASIGNACION DE CUPOS- */
		/* -TRAER LOS PRODUCTOS DEL CUPO- */
		public function getAcupocg($idcupo){
			$intCupo_Id = intval($idcupo);
			if($intCupo_Id > 0){
				$arrData = $this->model->selectAcupocg($intCupo_Id);
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
		public function setAcupocg(){
			$idcupo = intval($_POST['idAcuposC']);
			if ($_POST['listTipoLogisticaAC']=='Transporte propio') {
				/* transporte propio */
				if(empty($_POST['listHoraAC']) || empty($_POST['listMinutosAC'])){
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					$idAcupocg = intval($_POST['idAcuposC']);
					$strEstado = strClean($_POST['listEstadoAC']);
					$strCliente = strClean($_POST['listClienteAC']);
					$strTipo_Logistica = strClean($_POST['listTipoLogisticaAC']);
					$strTiempo_Estimado = '';
					/* */
					$strRuta = $idAcupocg;
					$strRuta = str_replace(" ","-",$strRuta);
					/* */
					$foto   	 	= $_FILES['foto'];
					$nombre_foto 	= $foto['name'];
					$type 		 	= $foto['type'];
					$url_temp    	= $foto['tmp_name'];
					$pdfCotizacion 	= 'portada_categoria.png';
					$request_user = "";
					if($nombre_foto != ''){
						$pdfCotizacion = 'cupo_'.md5(date('d-m-Y H:i:s')).'.pdf';
					}			
					/* foto */
					if($nombre_foto == ''){
						if($_POST['foto_actual'] != 'portada_categoria.png' && $_POST['foto_remove'] == 0 ){
							$pdfCotizacion = $_POST['foto_actual'];
						}
					}
					$strQuintales = 0;
					$strFlete = 0;
					$strNombre_receptor = '';
					$intContacto_receptor = 0;
					$strDepartamento_receptor = '';
					$strMunicipio_receptor = '';
					$strDireccion_receptor = '';
					$strObservacion_Asignacion = strClean($_POST['txtObservacionAC']);

					$tiempo = $_POST['txtTiempoACo'];
					$hora='';

					if ($tiempo=='PM') {
						if ($_POST['listHoraAC']=='01') {$hora = 13;}
						if ($_POST['listHoraAC']=='02') {$hora = 14;}
						if ($_POST['listHoraAC']=='03') {$hora = 15;}
						if ($_POST['listHoraAC']=='04') {$hora = 16;}
						if ($_POST['listHoraAC']=='05') {$hora = 17;}
						if ($_POST['listHoraAC']=='06') {$hora = 18;}
						if ($_POST['listHoraAC']=='07') {$hora = 19;}
						if ($_POST['listHoraAC']=='08') {$hora = 20;}
						if ($_POST['listHoraAC']=='09') {$hora = 21;}
					}else{
						$hora=$_POST['listHoraAC'];
					}

					$strHora_Asignada = $hora.':'.$_POST['listMinutosAC'];

					/* ingresar datos cupos */
					$request_user = $this->model->updateAcupocg($idAcupocg, $strEstado, $strCliente, $strTipo_Logistica, 
					$strNombre_receptor, $intContacto_receptor, $strDepartamento_receptor, $strMunicipio_receptor, $strDireccion_receptor, 
					$strHora_Asignada, $strTiempo_Estimado, $pdfCotizacion, $strRuta, $strQuintales, $strFlete, $strObservacion_Asignacion);
							
					if($request_user > 0 ){
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
						if($nombre_foto != ''){
							uploadFileC($foto,$pdfCotizacion);
						}
						if(($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_categoria.png')
							|| ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_categoria.png')){
							deleteFileC($_POST['foto_actual']);
						}
					}
				}
				/* transporte propio */
			}else{
				/* domicilio */
				if(empty($_POST['listHoraAC']) || empty($_POST['listMinutosAC']) || empty($_POST['txtNombreReceptorAC']) || empty($_POST['numContactoReceptorAC']) || 
				   empty($_POST['txtFleteAC']) || empty($_POST['txtQuintalesAC']) || empty($_POST['txtDireccionReceptorAC'])){
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos o faltantes.');
				}else{
					$idAcupocg = intval($_POST['idAcuposC']);
					$strEstado = strClean($_POST['listEstadoAC']);
					$strCliente = strClean($_POST['listClienteAC']);
					$strTipo_Logistica = strClean($_POST['listTipoLogisticaAC']);
					$strTiempo_Estimado = '';
					/* */
					$strRuta = $idAcupocg;
					$strRuta = str_replace(" ","-",$strRuta);
					/* */
					$foto   	 	= $_FILES['foto'];
					$nombre_foto 	= $foto['name'];
					$type 		 	= $foto['type'];
					$url_temp    	= $foto['tmp_name'];
					$pdfCotizacion 	= 'portada_categoria.png';
					$request_user = "";
					if($nombre_foto != ''){
						$pdfCotizacion = 'cupo_'.md5(date('d-m-Y H:i:s')).'.pdf';
					}			
					/* foto */
					if($nombre_foto == ''){
						if($_POST['foto_actual'] != 'portada_categoria.png' && $_POST['foto_remove'] == 0 ){
							$pdfCotizacion = $_POST['foto_actual'];
						}
					}
					$strQuintales = $_POST['txtFleteAC'];
					$strFlete = $_POST['txtQuintalesAC'];
					$strNombre_receptor = $_POST['txtNombreReceptorAC'];
					$intContacto_receptor = $_POST['numContactoReceptorAC'];
					$strDepartamento_receptor = $_POST['listDepartamentosReceptorAC'];
					$strMunicipio_receptor = $_POST['listMunicipiosReceptorAC'];
					$strDireccion_receptor = $_POST['txtDireccionReceptorAC'];
					$strObservacion_Asignacion = strClean($_POST['txtObservacionAC']);
					/* ingresar datos cupos */
					$tiempo = $_POST['txtTiempoACo'];
					$hora='';

					if ($tiempo=='PM') {
						if ($_POST['listHoraAC']=='01') {$hora = 13;}
						if ($_POST['listHoraAC']=='02') {$hora = 14;}
						if ($_POST['listHoraAC']=='03') {$hora = 15;}
						if ($_POST['listHoraAC']=='04') {$hora = 16;}
						if ($_POST['listHoraAC']=='05') {$hora = 17;}
						if ($_POST['listHoraAC']=='06') {$hora = 18;}
						if ($_POST['listHoraAC']=='07') {$hora = 19;}
						if ($_POST['listHoraAC']=='08') {$hora = 20;}
						if ($_POST['listHoraAC']=='09') {$hora = 21;}
					}else{
						$hora=$_POST['listHoraAC'];
					}

					$strHora_Asignada = $hora.':'.$_POST['listMinutosAC'];
					/* */
					$request_user = $this->model->updateAcupocg($idAcupocg, $strEstado, $strCliente, $strTipo_Logistica, 
					$strNombre_receptor, $intContacto_receptor, $strDepartamento_receptor, $strMunicipio_receptor, $strDireccion_receptor, 
					$strHora_Asignada, $strTiempo_Estimado, $pdfCotizacion, $strRuta, $strQuintales, $strFlete, $strObservacion_Asignacion);
							
					if($request_user > 0 ){
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
						if($nombre_foto != ''){
							uploadFileC($foto,$pdfCotizacion);
						}
						if(($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_categoria.png')
							|| ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_categoria.png')){
							deleteFileC($_POST['foto_actual']);
						}
					}
				}
				/* domicilio */
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}



		public function clientes(){
			$serverName = "BOC-SRV03";
			$base="BLOKI";
			$user="CUPOS";
			$pass="Password01!";
			$puerto="1433";
			$connectionInfo = array("Database"=>$base, "UID"=>$user, "PWD"=>$pass);
			$conn = sqlsrv_connect($serverName, $connectionInfo);
			if($conn) {
			}else {
				echo "FALLO LA CONEXION";
				die( print_r( sqlsrv_errors(), true));
			}
			$sql="SELECT CONCAT(CLIENTE,' - ',NOMBRE) FROM BLOKI.CLIENTE WHERE ACTIVO = 'S' ORDER BY NOMBRE ASC";
			$resultado = sqlsrv_query($conn, $sql);
			$datos = sqlsrv_fetch_array($resultado);
			echo json_encode($datos,JSON_UNESCAPED_UNICODE);
		}


		
	}
?>