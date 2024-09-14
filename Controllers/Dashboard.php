<?php 

	class Dashboard extends Controllers{
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
			getPermisos(1);
		}

		public function dashboard(){
			$data['page_id'] = 1;
			$data['page_tag'] = "Inicio";
			$data['page_title'] = "Inicio";
			$data['page_name'] = "Inicio";

			/* -PLANTA GUAZAPA- */
			
			/*rastras*/
			$data['libresRG'] = $this->model->select_libresRG();
			$data['programadoRG'] = $this->model->select_programadosRG();
			$data['procesoRG'] = $this->model->select_procesoRG();
			$data['canceladoRG'] = $this->model->select_canceladoRG();
			$data['finalizadoRG'] = $this->model->select_finalizadoRG();
			/*camiones*/
			$data['libresCG'] = $this->model->select_libresCG();
			$data['programadoCG'] = $this->model->select_programadosCG();
			$data['procesoCG'] = $this->model->select_procesoCG();
			$data['canceladoCG'] = $this->model->select_canceladoCG();
			$data['finalizadoCG'] = $this->model->select_finalizadoCG();

			/* -PLANTA JIBOA- */
			/*rastras*/
			$data['libresRJ'] = $this->model->select_libresRJ();
			$data['programadoRJ'] = $this->model->select_programadosRJ();
			$data['procesoRJ'] = $this->model->select_procesoRJ();
			$data['canceladoRJ'] = $this->model->select_canceladoRJ();
			$data['finalizadoRJ'] = $this->model->select_finalizadoRJ();
			/*camiones*/
			$data['libresCJ'] = $this->model->select_libresCJ();
			$data['programadoCJ'] = $this->model->select_programadosCJ();
			$data['procesoCJ'] = $this->model->select_procesoCG();
			$data['canceladoCJ'] = $this->model->select_canceladoCJ();
			$data['finalizadoCJ'] = $this->model->select_finalizadoCJ();

			$anio = date('Y');
			$mes = date('m');
		
			if( $_SESSION['userData']['idrol'] == RCLIENTES ){
			}else{
				$this->views->getView($this,"dashboard",$data);
			}
		}		

	}
 ?>