<?php     
	class Reportesrg extends Controllers{
		public function __construct(){
			parent::__construct();
			session_start();
			if(empty($_SESSION['login'])){
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(5);
		}

		public function reportesrg(){
			$data['page_tag'] = "Reportes Rastras Guazapa";
			$data['page_title'] = "Reportes Rastras Planta Guazapa";
			$data['page_name'] = "Reportes Rastras Planta Guazapa";
			$data['page_functions_js'] = "functions_reportesrg.js";
			$this->views->getView($this,"reportesrg",$data);
		}


		public function FinalizadoRG($fi){
			$fechaInicio = ''.$fi;
			$fechaFinal = ''.$_POST['f'];
			$arrData = $this->model->select_finalizadoRG($fechaInicio, $fechaFinal);
			$arrQuintal['total'] = $arrData;
			/* */
			$arrData1 = $this->model->cuposTRG($fechaInicio, $fechaFinal);
			$arrQuintal['totalT'] = $arrData1;
			/* */
			$arrData2 = $this->model->pagaCarga_RGF($fechaInicio, $fechaFinal);
			$arrQuintal['totalPCF'] = $arrData2;
			
			$arrData3 = $this->model->NopagaCarga_RGF($fechaInicio, $fechaFinal);
			$arrQuintal['totalNPCF'] = $arrData3;
			/* */
			$arrData4 = $this->model->pagaCarga_RG($fechaInicio, $fechaFinal);
			$arrQuintal['totalPC'] = $arrData4;
			
			$arrData5 = $this->model->NopagaCarga_RG($fechaInicio, $fechaFinal);
			$arrQuintal['totalNPC'] = $arrData5;
			/* */
			$arrData6 = $this->model->promedioPagaCarga_RG($fechaInicio, $fechaFinal);
			$arrQuintal['promedioPC'] = $arrData6;
			/* */
			$arrData7 = $this->model->promedioNoPagaCarga_RG($fechaInicio, $fechaFinal);
			$arrQuintal['promedioNPC'] = $arrData7;
			/* */
			$arrData8 = $this->model->promedioPagaCargaE_RG($fechaInicio, $fechaFinal);
			$arrQuintal['promedioPCE'] = $arrData8;
			/* */
			$arrData9 = $this->model->promedioNoPagaCargaS_RG($fechaInicio, $fechaFinal);
			$arrQuintal['promedioNPCS'] = $arrData9;
			/* */
			$arrResponse = array('status' => true, 'data' => $arrQuintal);
			/* ------------------ */
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}

		public function getReportesrg(){
			if($_SESSION['permisosMod']['r']){
				$btnView = '';
				$btnCot = '';
				$arrData = $this->model->selectReportesrg();
				for ($i=0; $i < count($arrData); $i++) {
					/*bloque*/
					if($arrData[$i]['bloque'] == 1){
						$arrData[$i]['bloque'] = '<span class="badge">6:00:AM - 9:00:AM</span>';
					}elseif($arrData[$i]['bloque'] == 2){
						$arrData[$i]['bloque'] = '<span class="badge">9:00:AM - 12:00:MD</span>';
					}elseif($arrData[$i]['bloque'] == 3){
						$arrData[$i]['bloque'] = '<span class="badge">12:00:MD - 3:00:PM</span>';
					}elseif($arrData[$i]['bloque'] == 4){
						$arrData[$i]['bloque'] = '<span class="badge">3:00:PM - 6:00:PM</span>';
					}elseif($arrData[$i]['bloque'] == 5){
						$arrData[$i]['bloque'] = '<span class="badge">6:00:PM - 9:00:PM</span>';
					}
					
					$arrCotiza = $this->model->selectEcuporg($arrData[$i]['id_cupo']);
					$arrCotiza['url_portada'] = media().'/cotizacion/rastras/'.$arrCotiza['cotizacion'];
					$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewReportesrg('.$arrData[$i]['id_cupo'].')" title="Ver datos"><i class="far fa-eye"></i></button>';
					if ($arrCotiza['cotizacion']=='portada_categoria.png') {
						$btnCot = '<button class="btn btn-warning btn-sm" title="Cotización no disponible" disabled ><i class="fa fa-file-text-o"></i></button>';
					}else{
						$btnCot = '<a href="'.$arrCotiza['url_portada'].' " target="_blank" class="btn btn-warning btn-sm"  title="Ver cotización"> <i class="fa fa-file-text-o"></i></a>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnCot.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function consultaRG(){
			$btnView = '';
			$btnCot = '';
			$fechaInicio = ''.$_POST['from_date'];
			$fechaFinal = ''.$_POST['to_date'];
			$arrData = $this->model->selectConsultaRG($fechaInicio, $fechaFinal);
			for ($i=0; $i < count($arrData); $i++) {
				/*bloque*/
				if($arrData[$i]['bloque'] == 1){
					$arrData[$i]['bloque'] = '<span class="badge">6:00:AM - 9:00:AM</span>';
				}elseif($arrData[$i]['bloque'] == 2){
					$arrData[$i]['bloque'] = '<span class="badge">9:00:AM - 12:00:MD</span>';
				}elseif($arrData[$i]['bloque'] == 3){
					$arrData[$i]['bloque'] = '<span class="badge">12:00:MD - 3:00:PM</span>';
				}elseif($arrData[$i]['bloque'] == 4){
					$arrData[$i]['bloque'] = '<span class="badge">3:00:PM - 6:00:PM</span>';
				}elseif($arrData[$i]['bloque'] == 5){
					$arrData[$i]['bloque'] = '<span class="badge">6:00:PM - 9:00:PM</span>';
				}
				
				$arrCotiza = $this->model->selectEcuporg($arrData[$i]['id_cupo']);
				$arrCotiza['url_portada'] = media().'/cotizacion/rastras/'.$arrCotiza['cotizacion'];
				$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewReportesrg('.$arrData[$i]['id_cupo'].')" title="Ver datos"><i class="far fa-eye"></i></button>';
				if ($arrCotiza['cotizacion']=='portada_categoria.png') {
					$btnCot = '<button class="btn btn-warning btn-sm" title="Cotización no disponible" disabled ><i class="fa fa-file-text-o"></i></button>';
				}else{
					$btnCot = '<a href="'.$arrCotiza['url_portada'].' " target="_blank" class="btn btn-warning btn-sm"  title="Ver cotización"> <i class="fa fa-file-text-o"></i></a>';
				}
				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnCot.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

	}
?>