<?php 
	class DashboardModel extends Mysql{
		public function __construct(){
			parent::__construct();
		}		

		public function select_libresRG(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_rastras WHERE tipo_transporte=1 AND anio=$anio AND semana=$semana AND estado=''";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function select_programadosRG(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_rastras WHERE tipo_transporte=1 AND anio=$anio AND semana=$semana AND estado='Programado'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function select_procesoRG(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_rastras WHERE tipo_transporte=1 AND anio=$anio AND semana=$semana AND estado='En proceso'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function select_canceladoRG(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_rastras WHERE tipo_transporte=1 AND anio=$anio AND semana=$semana AND estado='Cancelado'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function select_finalizadoRG(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_rastras WHERE tipo_transporte=1 AND anio=$anio AND semana=$semana AND estado='Finalizado'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		/*camiones*/
		public function select_libresCG(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_camiones WHERE tipo_transporte=3 AND anio=$anio AND semana=$semana AND estado=''";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function select_programadosCG(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_camiones WHERE tipo_transporte=3 AND anio=$anio AND semana=$semana AND estado='Programado'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function select_procesoCG(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_camiones WHERE tipo_transporte=3 AND anio=$anio AND semana=$semana AND estado='En proceso'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function select_canceladoCG(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_camiones WHERE tipo_transporte=3 AND anio=$anio AND semana=$semana AND estado='Cancelado'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function select_finalizadoCG(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_camiones WHERE tipo_transporte=3 AND anio=$anio AND semana=$semana AND estado='Finalizado'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		/******************************************************************************************************************************************************************/
		/*                                                                                                                                                                */
		/*--------------------------------------------------------------------------PLANTA JIBOA--------------------------------------------------------------------------*/
		/*                                                                                                                                                                */
		/******************************************************************************************************************************************************************/
		/* -RJ - */
		public function select_libresRJ(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_rastras WHERE tipo_transporte=2 AND anio=$anio AND semana=$semana AND estado=''";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function select_programadosRJ(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_rastras WHERE tipo_transporte=2 AND anio=$anio AND semana=$semana AND estado='Programado'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function select_procesoRJ(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_rastras WHERE tipo_transporte=2 AND anio=$anio AND semana=$semana AND estado='En proceso'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function select_canceladoRJ(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_rastras WHERE tipo_transporte=2 AND anio=$anio AND semana=$semana AND estado='Cancelado'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function select_finalizadoRJ(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_rastras WHERE tipo_transporte=2 AND anio=$anio AND semana=$semana AND estado='Finalizado'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		/*camiones*/
		public function select_libresCJ(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_camiones WHERE tipo_transporte=4 AND anio=$anio AND semana=$semana AND estado=''";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function select_programadosCJ(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_camiones WHERE tipo_transporte=4 AND anio=$anio AND semana=$semana AND estado='Programado'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function select_procesoCJ(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_camiones WHERE tipo_transporte=4 AND anio=$anio AND semana=$semana AND estado='En proceso'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function select_canceladoCJ(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_camiones WHERE tipo_transporte=4 AND anio=$anio AND semana=$semana AND estado='Cancelado'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}

		public function select_finalizadoCJ(){
			$anio = strftime("%Y");
			$semana = date("W");
			$sql = "SELECT COUNT(*) as total FROM cupos_camiones WHERE tipo_transporte=4 AND anio=$anio AND semana=$semana AND estado='Finalizado'";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}
				
	}
 ?>