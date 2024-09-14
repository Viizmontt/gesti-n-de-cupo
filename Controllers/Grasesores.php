<?php
    session_start();
	class Grasesores extends Controllers{
		public function __construct(){
			parent::__construct();
			
			if(empty($_SESSION['login'])){
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(4);
		}

		public function Grasesores(){
			$data['page_tag'] = "Asesores Rastras Guazapa";
			$data['page_name'] = "Asesores Cupos Rastras Planta Guazapa";
			$data['page_title'] = "Asesores Cupos Rastras Planta Guazapa";
			$data['page_functions_js'] = "functions_grasesores.js";
			$this->views->getView($this,"grasesores",$data);
		}	
		
		public function getSelectNombresPersona(){
			$htmlOptions = "";
			$arrData = $this->model->selectNombresPersona();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['nombres'].' '.$arrData[$i]['apellidos'].'">'.$arrData[$i]['nombres'].' '.$arrData[$i]['apellidos'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}

		/* ---------------------------------------------------------------------------------------------------------- */

		/* BUSCAR CANTIDAD DE CUPOS POR BLOQUE SEGUN EL DIA*/
		public function get_Cupos_RG($anio, $semana, $dia, $bloque){
			$arrData = $this->model->select_Cupos_RG($anio, $semana, $dia, $bloque);
			return $arrData;
		}

		/* BUSCAR los cupos por bloque*/
		public function get_SubBloque_RG($anio, $semana, $dia, $bloque){
			$arrData = $this->model->select_SubBloque_Cupos($anio, $semana, $dia, $bloque);
			return $arrData;
		}

		/* Datos del cupo: identificador, nombre asesor y tipo carga */
		public function get_DatosCupos($anio, $semana, $dia, $bloque, $sub_bloque){
			$arrData = $this->model->select_DatosCupos($anio, $semana, $dia, $bloque, $sub_bloque);
			return $arrData;
		}

		/* ---------------------------------------------------------------------------------------------------------- */
		/* ---------------------------------------------------------------------------------------------------------- */
		
		/*asignar asesor */
		public function updatec_Asesor_Cupo_RG(){
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$Cupo_asesor_id = intval($_POST['idCupo_Asesor']);
					$strNombre_asesor = $_POST['listNombresPersona'];
					$request_Update = $this->model->update_Asesor_Cupo_RG($Cupo_asesor_id, $strNombre_asesor);
					if($request_Update){
						$arrResponse = array('status' => true, 'msg' => 'Se ha actualizado el nombre del asesor');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al actualizar.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
		/* limpiar asesor */
		public function updatec_Asesor_Cupo_RG_Libre(){
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$Cupo_asesor_id = intval($_POST['idCupo_AsesorClean']);
					$strNombre_asesor = 'No Asignado';
					$request_Update = $this->model->update_Asesor_Cupo_RG($Cupo_asesor_id, $strNombre_asesor);
					if($request_Update){
						$arrResponse = array('status' => true, 'msg' => 'Se ha actualizado el nombre del asesor');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al actualizar.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
		/*asignar Tipo Carga*/
		public function tipoCarga_Cupo_RG(){
			if($_POST){
				if($_SESSION['permisosMod']['u']){
					$Cupo_id = intval($_POST['idCupo_Carga']);
					$strTipo_Carga = $_POST['listTipoCarga'];
					$request_Update = $this->model->update_tipoCargaRG($Cupo_id, $strTipo_Carga);
					if($request_Update){
						$arrResponse = array('status' => true, 'msg' => 'Se ha actualizado el nombre del asesor');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al actualizar.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
		/*Eliminar cupoa*/
		public function del_Cupo(){
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdcupo = intval($_POST['idCupo_Eliminar']);
					$requestDelete = $this->model->deleteCupo($intIdcupo);
					if($requestDelete){
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el cupo');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el cupo.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
		
		/* ---------------------------------------------------------------------------------------------------------- */

		public function set_Nuevo_Cupo(){
			if($_SESSION['permisosMod']['w']){
				$intTipo_transporte = 1;
     			$intAnio = strftime("%Y");
	    		$intMes = date("m");
		    	$intSemana = date("W");
    			$intDia = $_POST['listDiaAAC'];
	    		$intBloque = $_POST['listBloqueAAC'];
		    	$strNombre_asesor = 'No Asignado';
    			$strCotizacion = 'portada_categoria.png';

			    $Dia = date("N");

				if ($Dia==5 || $Dia==6 || $Dia==7) {
					$strFecha = date('Y-m-d', strtotime('01/01 +' . $intSemana . ' weeks first day +' . $intDia . ' day'));
					$intSemana = $intSemana + 1;
				}else {
					$strFecha = date('Y-m-d', strtotime('01/01 +' . $intSemana-1 . ' weeks first day +' . $intDia . ' day'));
				}

		    	$arrData = $this->model->select_UltimoCupo_RG($intAnio, $intSemana, $intDia, $intBloque);
    			$intSub_bloque = $arrData;
	    		$tuplas = $_POST['txtCantidadAAC'];
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
			die();
		}

	}
?>