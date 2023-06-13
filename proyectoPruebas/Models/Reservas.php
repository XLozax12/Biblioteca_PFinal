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
        $this->conexion->consulta("SELECT * FROM reservas WHERE id_libro = $idLibro");
        try{
            return $this->conexion->extraer_todos();
        }catch(PDOException $err){
            return $err;

        }
    }

    public function getReservasByIdUsuarioYIdLibro($id_usuario,$idLibro) {
        $this->conexion->consulta("SELECT * FROM reservas WHERE id_usuario =$id_usuario AND id_libro = $idLibro");
        try{
            return $this->conexion->extraer_todos();
        }catch(PDOException $err){
            return $err;

        }
    }

    public function guardarReserva($id_usuario,$id_libro,$fecha,$devolucion){
        $this->conexion->consulta("INSERT INTO reservas (id_usuario,id_libro,fecha,devolucion) 
                VALUES ('$id_usuario','$id_libro','$fecha','$devolucion')");
        try{
            return true;
    }catch(PDOException $err){
            return $err;

    }
    }
    public function getAll(): ?array{
        $this->conexion->consulta("SELECT *FROM reservas");
        return $this->conexion->extraer_todos();
    }

    public function mostrarReservasNoDevueltas() {
        $this->conexion->consulta("SELECT r.*, u.nombre as nombre_usuario, u.socio as numero_socio, l.titulo as titulo
         FROM reservas r
        INNER JOIN usuarios u ON u.id = r.id_usuario
        INNER JOIN libros l ON l.id = r.id_libro
         WHERE devolucion = 0");
        return $this->conexion->extraer_todos();
    }

    public function mostrarReservasDevueltas() {
        $this->conexion->consulta("SELECT r.*, u.nombre as nombre_usuario, u.socio as numero_socio, l.titulo as titulo
        FROM reservas r
       INNER JOIN usuarios u ON u.id = r.id_usuario
       INNER JOIN libros l ON l.id = r.id_libro
        WHERE devolucion = 1");
        return $this->conexion->extraer_todos();
    }

    public function actualizarDevolucion($id){
        $sql = ("UPDATE reservas SET devolucion = 1  WHERE id = $id");
        $this -> conexion -> consulta($sql);
    }

    public function getReservasConFechaMenorAHoy() {
        $this->conexion->consulta("SELECT r.*, u.nombre as nombre, u.socio as numero_socio 
        FROM reservas r
        INNER JOIN usuarios u ON u.id = r.id_usuario
        WHERE DATE_ADD(fecha, INTERVAL 7 DAY) < NOW() AND NOT EXISTS (SELECT * FROM sanciones) 
        ");
        return $this->conexion->extraer_todos();
    }


}
?>