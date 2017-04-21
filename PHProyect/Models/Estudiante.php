<?php  namespace Models;

  /**
   * Clase de estudiantes
   */
  class Estudiante{
    //Atributos
    private $id;
    private $nombre;
    private $edad;
    private $promedio;
    private $imagen;
    private $id_seccion;
    private $fecha;
    private $con;

    public function __construct(){
      $this->con = new Conexion();
    }

    public function set($atributo,$contenido){
      $this->$atributo = $contenido;
    }

    public function get($atributo){
      return $this->$atributo;
    }

    public function listar(){
      $sql = "SELECT T1.*,T2.nombre as nombre_seccion from estudiantes T1 inner join secciones T2 on T1.id_seccion=T2.id";
      $datos = $this->con->consultaRetorno($sql);
      return $datos;
    }

    public function add(){
      $sql = "INSERT INTO estudiantes(id,nombre,edad,promedio,imagen,id_seccion,fecha)
              VALUES (Null,'{$this->nombre}','{$this->edad}','{$this->promedio}','{$this->imagen}','{$this->id_seccion}',NOW())";
      $this->con->consultaSimple($sql);
    }

    public function delete(){
      $sql = "DELETE FROM estudiantes WHERE id = '{$this->id}'";
      $this->con->consultaSimple($sql);
    }

    public function edit(){
      $sql = "UPDATE estudiantes SET nombre='{$this->nombre}',edad='{$this->edad}',promedio='{$this->promedio}',id_seccion='{$this->id_seccion}' where id='{$this->id}'";
      $this->con->consultaSimple($sql);
    }

    public function view(){
      $sql = "SELECT T1.*,T2.nombre as nombre_seccion from estudiantes T1 inner join secciones T2 on T1.id_seccion=T2.id
              WHERE T1.id = '{$this->id}'";
      $datos = $this->con->consultaRetorno($sql);
      $row = mysqli_fetch_assoc($datos);
      return $row;
    }

  }

 ?>
