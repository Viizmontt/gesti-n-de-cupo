<?php 

	class Conexionsql extends Controllers{
		public function __construct(){
			parent::__construct();
			session_start();
			if(empty($_SESSION['login'])){
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(2);
		}

		public function Conexionsql(){
			
		}
        
        public function getClientesSQL(){
			$arrData = $this->model->selectClientesSQL();
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}

		public function getClientSQL(){
			$serverName = "SERVIDOR-BK";
            $base="BLOKI";
            $user="CUPOS";
            $pass="Password01!";
            $puerto="1433";            
            $connectionInfo = array("Database"=>$base, "UID"=>$user, "PWD"=>$pass);
            $conn = sqlsrv_connect($serverName, $connectionInfo);
			if($con) {
			}else {
				echo "FALLO LA CONEXION PAPU";
				die( print_r( sqlsrv_errors(), true));
			}
			$sql="SELECT NOMBRE FROM BLOKI.CLIENTE";
			$resultado = sqlsrv_query($conn, $sql);
			$row=sqlsrv_fetch_array($resultado);
			echo json_encode($resultado,JSON_UNESCAPED_UNICODE);
		}

	}
 ?>