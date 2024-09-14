<?php 

class CantidadCupos extends Controllers{
	public function __construct(){
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

	public function CantidadCupos(){
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location:".base_url().'/dashboard');
		}
		$data['page_tag'] = "Cantidad cupos";
		$data['page_title'] = "Cantidad cupos";
		$data['page_name'] = "Cantidad cupos";
		$data['page_functions_js'] = "functions_cantidadcupos.js";
		$this->views->getView($this,"cantidadcupos",$data);
	}
 
	public function setCantidadCupo(){
		if($_POST){
			if(
				($_POST['lunes_bloque_I']=="")     || ($_POST['lunes_bloque_II']=="")     || ($_POST['lunes_bloque_III']=="")     || ($_POST['lunes_bloque_IV']=="")     || ($_POST['lunes_bloque_V']=="") ||
				($_POST['martes_bloque_I']=="")    || ($_POST['martes_bloque_II']=="")    || ($_POST['martes_bloque_III']=="")    || ($_POST['martes_bloque_IV']=="")    || ($_POST['martes_bloque_V']=="") ||
				($_POST['miercoles_bloque_I']=="") || ($_POST['miercoles_bloque_II']=="") || ($_POST['miercoles_bloque_III']=="") || ($_POST['miercoles_bloque_IV']=="") || ($_POST['miercoles_bloque_V']=="") ||
				($_POST['jueves_bloque_I']=="")    || ($_POST['jueves_bloque_II']=="")    || ($_POST['jueves_bloque_III']=="")    || ($_POST['jueves_bloque_IV']=="")    || ($_POST['jueves_bloque_V']=="") ||
				($_POST['viernes_bloque_I']=="")   || ($_POST['viernes_bloque_II']=="")   || ($_POST['viernes_bloque_III']=="")   || ($_POST['viernes_bloque_IV']=="")   || ($_POST['viernes_bloque_V']=="")
			)
			{				
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos, por favor verficar.');
			}else{
				$intcantidad_cupos_Id    = intval($_POST['cantidad_cupos_Id']);
				$intLunes_bloque_I       = intval($_POST['lunes_bloque_I']);
				$intLunes_bloque_II      = intval($_POST['lunes_bloque_II']);
				$intLunes_bloque_III     = intval($_POST['lunes_bloque_III']);
				$intLunes_bloque_IV      = intval($_POST['lunes_bloque_IV']);
				$intLunes_bloque_V       = intval($_POST['lunes_bloque_V']);
				$intMartes_bloque_I      = intval($_POST['martes_bloque_I']);
				$intMartes_bloque_II     = intval($_POST['martes_bloque_II']);
				$intMartes_bloque_III    = intval($_POST['martes_bloque_III']);
				$intMartes_bloque_IV     = intval($_POST['martes_bloque_IV']);
				$intMartes_bloque_V      = intval($_POST['martes_bloque_V']);
				$intMiercoles_bloque_I   = intval($_POST['miercoles_bloque_I']);
				$intMiercoles_bloque_II  = intval($_POST['miercoles_bloque_II']);
				$intMiercoles_bloque_III = intval($_POST['miercoles_bloque_III']);
				$intMiercoles_bloque_IV  = intval($_POST['miercoles_bloque_IV']);
				$intMiercoles_bloque_V   = intval($_POST['miercoles_bloque_V']);
				$intJueves_bloque_I      = intval($_POST['jueves_bloque_I']);
				$intJueves_bloque_II     = intval($_POST['jueves_bloque_II']);
				$intJueves_bloque_III    = intval($_POST['jueves_bloque_III']);
				$intJueves_bloque_IV     = intval($_POST['jueves_bloque_IV']);
				$intJueves_bloque_V      = intval($_POST['jueves_bloque_V']);
				$intViernes_bloque_I     = intval($_POST['viernes_bloque_I']);
				$intViernes_bloque_II    = intval($_POST['viernes_bloque_II']);
				$intViernes_bloque_III   = intval($_POST['viernes_bloque_III']);
				$intViernes_bloque_IV    = intval($_POST['viernes_bloque_IV']);
				$intViernes_bloque_V     = intval($_POST['viernes_bloque_V']);
				$request_cantidadcupo="";
				if($_SESSION['permisosMod']['u']){					
					$request_cantidadcupo = $this->model->updateCantidadCupo($intcantidad_cupos_Id, 
					$intLunes_bloque_I, $intLunes_bloque_II, $intLunes_bloque_III, $intLunes_bloque_IV, 
					$intLunes_bloque_V, $intMartes_bloque_I, $intMartes_bloque_II, $intMartes_bloque_III, 
					$intMartes_bloque_IV, $intMartes_bloque_V, $intMiercoles_bloque_I, $intMiercoles_bloque_II, 
					$intMiercoles_bloque_III, $intMiercoles_bloque_IV, $intMiercoles_bloque_V, $intJueves_bloque_I, 
					$intJueves_bloque_II, $intJueves_bloque_III, $intJueves_bloque_IV, $intJueves_bloque_V, $intViernes_bloque_I, 
					$intViernes_bloque_II, $intViernes_bloque_III, $intViernes_bloque_IV, $intViernes_bloque_V
				    );
				}				
				if($request_cantidadcupo ){
					$arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
				}
			}
		    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
	    }		
		die();
	}

	public function getCantidadCupos(){
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectCantidadCupos();
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				if($_SESSION['permisosMod']['r']){
					$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['cantidad_cupos_id'].')" title="Ver Cantidad cupos"><i class="far fa-eye"></i></button>';
				}
				if($_SESSION['permisosMod']['u']){
					$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['cantidad_cupos_id'].')" title="Editar Cantidad cupos"><i class="fas fa-pencil-alt"></i></button>';
				}
				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getCantidadCupo($cantidad_cupos_id){
		if($_SESSION['permisosMod']['r']){
			$intcantidad_cupos_Id = intval($cantidad_cupos_id);
			if($intcantidad_cupos_Id > 0)
			{
				$arrData = $this->model->selectCantidadCupo($intcantidad_cupos_Id);
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
		
}

?>