<?php 
    class CantidadCuposModel extends Mysql{	
		
		public function __construct(){
			parent::__construct();
		}

		private $intcantidad_cupos_Id;
	    private $intLunes_Bloque_I;
	    private $intLunes_Bloque_II;
  	    private $intLunes_Bloque_III;
  	    private $intLunes_Bloque_IV;
	    private $intLunes_Bloque_V;
	    private $intMartes_Bloque_I;
	    private $intMartes_Bloque_II;
	    private $intMartes_Bloque_III;
	    private $intMartes_Bloque_IV;
	    private $intMartes_Bloque_V;
	    private $intMiercoles_Bloque_I;
	    private $intMiercoles_Bloque_II;
	    private $intMiercoles_Bloque_III;
	    private $intMiercoles_Bloque_IV;
	    private $intMiercoles_Bloque_V;
	    private $intJueves_Bloque_I;
	    private $intJueves_Bloque_II;
	    private $intJueves_Bloque_III;
	    private $intJueves_Bloque_IV;
	    private $intJueves_Bloque_V;
	    private $intViernes_Bloque_I;
	    private $intViernes_Bloque_II;
	    private $intViernes_Bloque_III;
	    private $intViernes_Bloque_IV;
	    private $intViernes_Bloque_V;

	    private $intTipo_transporte;
	    private $intDia;
	    private $intBloque;
	    private $intCupo_bloque;
	    private $strNombre;

	    private $strBloque_dia_db;
	    private $strBloque_dia_txt;

		public function selectCantidadCupos(){
			$sql = "SELECT * FROM cantidadcuposbloque";
			$request = $this->select_all($sql);
			return $request;
	    }

		public function selectCantidadCupoBloque(int $cantidad_cupos_id, string $bloque_dia_db, string $bloque_dia_txt){
			$this->intcantidad_cupos_Id = $cantidad_cupos_id;
			$this->strBloque_dia_txt = $bloque_dia_txt;
			$this->strBloque_dia_db = $bloque_dia_db;
			$sql = "SELECT * FROM cantidadcuposbloque
				WHERE cantidad_cupos_id = $this->intcantidad_cupos_Id AND $this->strBloque_dia_db = $this->strBloque_dia_txt";
			$request = $this->select($sql);
			return $request;
		}
	
		public function selectCantidadCupo(int $cantidad_cupos_id){		
			$this->intcantidad_cupos_Id = $cantidad_cupos_id;
			$sql = "SELECT * FROM cantidadcuposbloque WHERE cantidad_cupos_id = $this->intcantidad_cupos_Id";
			$request = $this->select($sql);
			return $request;
		}

		public function updateCantidadCupo(int $cantidad_cupos_id,
     		int $lunes_bloque_I,
	        int $lunes_bloque_II,
		    int $lunes_bloque_III,
		    int $lunes_bloque_IV,
		    int $lunes_bloque_V,
		    int $martes_bloque_I,
		    int $martes_bloque_II,
		    int $martes_bloque_III,
		    int $martes_bloque_IV,
		    int $martes_bloque_V,
		    int $miercoles_bloque_I,
		    int $miercoles_bloque_II,
		    int $miercoles_bloque_III,
		    int $miercoles_bloque_IV,
		    int $miercoles_bloque_V,
		    int $jueves_bloque_I,
		    int $jueves_bloque_II,
		    int $jueves_bloque_III,
		    int $jueves_bloque_IV,
		    int $jueves_bloque_V,
		    int $viernes_bloque_I,
		    int $viernes_bloque_II,
		    int $viernes_bloque_III,
		    int $viernes_bloque_IV,
		    int $viernes_bloque_V){$this->intcantidad_cupos_Id = $cantidad_cupos_id;
		        $this->intLunes_Bloque_I = $lunes_bloque_I;
			    $this->intLunes_Bloque_II = $lunes_bloque_II;
			    $this->intLunes_Bloque_III = $lunes_bloque_III;
			    $this->intLunes_Bloque_IV  = $lunes_bloque_IV;
			    $this->intLunes_Bloque_V   = $lunes_bloque_V;
    		    $this->intMartes_Bloque_I   = $martes_bloque_I;
			    $this->intMartes_Bloque_II  = $martes_bloque_II;
			    $this->intMartes_Bloque_III = $martes_bloque_III;
			    $this->intMartes_Bloque_IV  = $martes_bloque_IV;
			    $this->intMartes_Bloque_V   = $martes_bloque_V;
		        $this->intMiercoles_Bloque_I   = $miercoles_bloque_I;
			    $this->intMiercoles_Bloque_II  = $miercoles_bloque_II;
			    $this->intMiercoles_Bloque_III = $miercoles_bloque_III;
			    $this->intMiercoles_Bloque_IV  = $miercoles_bloque_IV;
			    $this->intMiercoles_Bloque_V   = $miercoles_bloque_V;
		        $this->intJueves_Bloque_I   = $jueves_bloque_I;
			    $this->intJueves_Bloque_II  = $jueves_bloque_II;
			    $this->intJueves_Bloque_III = $jueves_bloque_III;
			    $this->intJueves_Bloque_IV  = $jueves_bloque_IV;
			    $this->intJueves_Bloque_V   = $jueves_bloque_V;
		        $this->intViernes_Bloque_I   = $viernes_bloque_I;
			    $this->intViernes_Bloque_II  = $viernes_bloque_II;
			    $this->intViernes_Bloque_III = $viernes_bloque_III;
			    $this->intViernes_Bloque_IV  = $viernes_bloque_IV;
			    $this->intViernes_Bloque_V   = $viernes_bloque_V;
		    $sql = "UPDATE cantidadcuposbloque
		            SET lunes_bloque_I=?,
				        lunes_bloque_II=?,
				        lunes_bloque_III=?,
				        lunes_bloque_IV=?,
				        lunes_bloque_V=?,
				        martes_bloque_I=?,
					    martes_bloque_II=?,
					    martes_bloque_III=?,
					    martes_bloque_IV=?,
					    martes_bloque_V=?,
					    miercoles_bloque_I=?,
					    miercoles_bloque_II=?,
					    miercoles_bloque_III=?,
					    miercoles_bloque_IV=?,
					    miercoles_bloque_V=?,
					    jueves_bloque_I=?,
					    jueves_bloque_II=?,
					    jueves_bloque_III=?,
					    jueves_bloque_IV=?,
					    jueves_bloque_V=?,
					    viernes_bloque_I=?,
					    viernes_bloque_II=?,
					    viernes_bloque_III=?,
					    viernes_bloque_IV=?,
					    viernes_bloque_V=?
					WHERE cantidad_cupos_id = $this->intcantidad_cupos_Id ";
		    $arrData = array($this->intLunes_Bloque_I,
		                   $this->intLunes_Bloque_II,
						   $this->intLunes_Bloque_III,
						   $this->intLunes_Bloque_IV,
						   $this->intLunes_Bloque_V,
						   $this->intMartes_Bloque_I,
						   $this->intMartes_Bloque_II,
						   $this->intMartes_Bloque_III,
						   $this->intMartes_Bloque_IV,
						   $this->intMartes_Bloque_V,
						   $this->intMiercoles_Bloque_I,
						   $this->intMiercoles_Bloque_II,
						   $this->intMiercoles_Bloque_III,
						   $this->intMiercoles_Bloque_IV,
						   $this->intMiercoles_Bloque_V,
						   $this->intJueves_Bloque_I,
						   $this->intJueves_Bloque_II,
						   $this->intJueves_Bloque_III,
						   $this->intJueves_Bloque_IV,
						   $this->intJueves_Bloque_V,
						   $this->intViernes_Bloque_I,
						   $this->intViernes_Bloque_II,
						   $this->intViernes_Bloque_III,
						   $this->intViernes_Bloque_IV,
						   $this->intViernes_Bloque_V);
		    $request = $this->update($sql,$arrData);
		    return $request;
	    }
    /*---------------------------------------------------------------------------------------------------------------------------------*/    
	}
	
?>