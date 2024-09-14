<?php 

	class UsuariosModel extends Mysql
	{
		private $intIdUsuario;
		private $strNombre;
		private $strApellido;
		private $strEmail;
		private $strPassword;
		private $strToken;
		private $strLocacion;
		private $intTipoId;
		private $intAreaId;
		private $intStatus;
		private $strNit;
		private $strNomFiscal;
		private $strDirFiscal;

		public function __construct(){
			parent::__construct();
		}	

		public function insertUsuario(string $nombre, string $apellido, string $email, string $password, string $locacion, int $tipoid, int $areaid, int $status){
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->strEmail = $email;
			$this->strPassword = $password;
			$this->strLocacion = $locacion;
			$this->intTipoId = $tipoid;
			$this->intAreaId = $areaid;
			$this->intStatus = $status;
			$return = 0;

			$sql = "SELECT * FROM persona WHERE email_user = '{$this->strEmail}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO persona (nombres, apellidos, email_user, password, locacion, rolid, areaid, status) 
								  VALUES(?,?,?,?,?,?,?,?)";
	        	$arrData = array(
        						$this->strNombre,
        						$this->strApellido,
        						$this->strEmail,
        						$this->strPassword,
								$this->strLocacion,
        						$this->intTipoId,
								$this->intAreaId,
        						$this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}

		public function selectUsuarios(){
			$sql = "SELECT p.idpersona, p.nombres, p.apellidos, p.email_user, p.status, a.idarea, a.nombrearea, r.idrol, r.nombrerol, p.locacion
			        FROM persona p 
			        INNER JOIN area a
			        ON p.areaid = a.idarea
			        INNER JOIN rol r
			        ON p.rolid = r.idrol
			        WHERE p.idpersona != 1";
					$request = $this->select_all($sql);
					return $request;
		}

		public function selectUsuario(int $idpersona){
			$this->intIdUsuario = $idpersona;
			$sql = "SELECT p.idpersona, p.nombres, p.apellidos, p.email_user, p.password, r.idrol, r.nombrerol, a.idarea, a.nombrearea, p.locacion, p.status, 
			DATE_FORMAT(p.datecreated, '%d-%m-%Y') as fechaRegistro 
			FROM persona p
			INNER JOIN rol r
			ON p.rolid = r.idrol
			INNER JOIN area a
			ON p.areaid = a.idarea
			WHERE p.idpersona = $this->intIdUsuario";
			$request = $this->select($sql);
			return $request;
		}

		public function updateUsuario(int $idUsuario, string $nombre, string $apellido, string $email, string $password, string $locacion, int $tipoid, int $areaid, int $status){
			$this->intIdUsuario = $idUsuario;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->strEmail = $email;
			$this->strPassword = $password;
			$this->strLocacion = $locacion;
			$this->intTipoId = $tipoid;
			$this->intAreaId = $areaid;
			$this->intStatus = $status;

			$sql = "SELECT * FROM persona WHERE (email_user = '{$this->strEmail}' AND idpersona != $this->intIdUsuario) ";
			$request = $this->select_all($sql);

			if(empty($request)){
				if($this->strPassword  != ""){
					$sql = "UPDATE persona SET nombres=?, apellidos=?, email_user=?, password=?, locacion=?, rolid=?, areaid=?, status=? 
							WHERE idpersona = $this->intIdUsuario ";
					$arrData = array($this->strNombre, $this->strApellido, $this->strEmail, $this->strPassword, $this->strLocacion, $this->intTipoId, $this->intAreaId, $this->intStatus);
				}else{
					$sql = "UPDATE persona SET nombres=?, apellidos=?, email_user=?, locacion=?, rolid=?, areaid=?, status=? 
							WHERE idpersona = $this->intIdUsuario ";
					$arrData = array($this->strNombre, $this->strApellido, $this->strEmail, $this->strLocacion, $this->intTipoId, $this->intAreaId, $this->intStatus);
				}
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
			return $request;
		
		}
		public function deleteUsuario(int $intIdpersona){
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE persona SET status = ? WHERE idpersona = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}

	}
 ?>