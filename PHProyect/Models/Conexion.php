<?php  namespace Models;

	class Conexion{

		private $datos = array(
			"host" => "localhost",
			"user" => "root",
			"pass" => "",
			"db"=> "proyecto"
			 );

		private $con;

		public function __construct(){
			$this->con =  new \mysqli($this->datos["host"],$this->datos["user"],$this->datos["pass"],$this->datos["db"]);
		}

		public function consultaSimple($sql){
			$this->con->query($sql);
		}

		public function consultaRetorno($sql){
			$datos = $this->con->query($sql);
			return $datos;
		}
	}
/*
$con = new Conexion();
$sql = "SELECT T1.*,T2.nombre as nombre_seccion from estudiantes T1 inner join secciones T2 on T1.id_seccion=T2.id
				WHERE T1.id = '1'";
$datos = $con->consultaRetorno($sql);
echo "Nombre:".$datos["nombre"];*/
 ?>
