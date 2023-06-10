<?php
namespace Models;
use Lib\BaseDatos;
use PDO;
USE PDOException;
class Libro { //extends Base_Datos1
    
    private BaseDatos $conexion;
    private string $id;    
    private string $Titulo;
    private string $autor;
    private string $editorial;


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

    public function getTitulo(){
        return $this->Titulo;
    }

    public function setTitulo($Titulo){
        $this->Titulo = $Titulo;

        return $this;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function setAutor($autor){
        $this->autor = $autor;

        return $this;
    }


    public function getEditorial(){
        return $this->editorial;
    }


    public function setEditorial($editorial){
        $this->editorial = $editorial;

        return $this;
    }

    
    public function getAll(): ?array{
        $this->conexion->consulta("SELECT *FROM libros");
        return $this->conexion->extraer_todos();
}

    public function mostrarLibros(): ?array{
    


}

public function getLibroById($id) {
    $this->conexion->consulta("SELECT * FROM libros WHERE id = $id");
    try{
        return $this->conexion->extraer_registro();
    }catch(PDOException $err){
        return $err;

    }
}


public function insertarLibro($titulo,$autor,$editorial,$cantidad){
    $sql = $this->conexion->preparada("INSERT INTO libros (titulo,autor,editorial,cantidad) 
    VALUES (:titulo,:autor,:editorial,:cantidad)");
    $sql->bindParam(':titulo',$titulo);
    $sql->bindParam(':autor',$autor);
    $sql->bindParam(':editorial',$editorial);
    $sql->bindParam(':cantidad',$cantidad);

    try{
            $sql->execute();
            return true;
    }catch(PDOException $err){
         return $err;

    }

}


    

    
}
?>