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





    
// 
// public function login($email,$password){

//     $sql = ("SELECT * FROM usuarios WHERE email = $email");
//         $this -> conexion -> consulta($sql);
//         $password=$this -> conexion -> extraer_registro();
//         echo $password;

// }


// public function register($nombre,$apellidos,$email,$password,$rol){
//     $hash_password =password_hash($password,PASSWORD_DEFAULT);
    
//     $sql = $this->conexion->preparada("INSERT INTO usuarios (nombre,apellido,email,`password`,rol) VALUES (:nombre,:apellido,:email,:pass,:rol)");
//         $sql->bindParam(':nombre',$nombre);
//         $sql->bindParam(':apellido',$apellidos);
//         $sql->bindParam(':email',$email);
//         $sql->bindParam(':pass',$hash_password);
//         $sql->bindParam(':rol',$rol);

//         try{
//                 $sql->execute();
//                 return true;
//         }catch(PDOException $err){
//              return $err;

//         }

// }


    

    
}
?>