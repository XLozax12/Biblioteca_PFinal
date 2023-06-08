<?php
namespace Models;
use Lib\BaseDatos;
use PDO;
USE PDOException;
class Reservas { //extends Base_Datos1
    
    private BaseDatos $conexion;
    private string $id;    
    private string $id_usuario;
    private string $id_libro;
    private string $fecha;
    private string $devolucion;


    function __construct(){
        // parent::__construct();
        $this->conexion=new BaseDatos;
    }


    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;

        return $this;
    }

    public function getId_usuario(){
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario){
        $this->id_usuario = $id_usuario;

        return $this;
    }

    public function getId_libro(){
        return $this->id_libro;
    }

    public function setId_libro($id_libro){
        $this->id_libro = $id_libro;

        return $this;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;

        return $this;
    }

    public function getDevolucion(){
        return $this->devolucion;
    }

    public function setDevolucion($devolucion){
        $this->devolucion = $devolucion;

        return $this;
    }

    // metodos

    public function getReservasByIdLibro($idLibro){
        
    }

    public function guardarReserva($id_usuario,$id_libro,$fecha,$devolucion){
        
    }
}
?>