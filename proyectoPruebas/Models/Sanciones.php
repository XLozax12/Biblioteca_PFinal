<?php
namespace Models;
use Lib\BaseDatos;
use PDO;
USE PDOException;
class Sanciones { //extends Base_Datos1
    
    private BaseDatos $conexion;
    private string $id;    
    private string $id_usuario;
    private string $fecha_inicio;
    private string $fecha_fin;


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

    public function getFecha_inicio(){
        return $this->fecha_inicio;
    }

    public function setFecha_inicio($fecha_inicio){
        $this->fecha_inicio = $fecha_inicio;

        return $this;
    }

    public function getFecha_fin(){
        return $this->fecha_fin;
    }

    public function setFecha_fin($fecha_fin){
        $this->fecha_fin = $fecha_fin;

        return $this;
    }


    // metodos
    public function sancionar($id_usuario,$fecha_inicio,$fecha_fin){
        $sql = $this->conexion->preparada("INSERT INTO sanciones (id_usuario,fecha_inicio,fecha_fin) 
        VALUES (:id_usuario,:fecha_inicio,:fecha_fin)");
        $sql->bindParam(':id_usuario',$id_usuario);
        $sql->bindParam(':fecha_inicio',$fecha_inicio);
        $sql->bindParam(':fecha_fin',$fecha_fin);
    
        try{
                $sql->execute();
                return true;
        }catch(PDOException $err){
             return $err;
    
        }
    }

    public function Eliminar($id){
        $sql = ("DELETE FROM sanciones WHERE id = $id");
        $this -> conexion -> consulta($sql);
        
    }

    public function getAll(): ?array{
        $this->conexion->consulta("SELECT s.*, u.nombre as nombre, u.socio as numero_socio 
        FROM sanciones s
        INNER JOIN usuarios u ON u.id = s.id_usuario
        ");
        return $this->conexion->extraer_todos();
    }


}
?>