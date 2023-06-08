<?php
namespace Models;
use Lib\BaseDatos;
use PDO;
USE PDOException;
class Usuario { //extends Base_Datos1
    
    private BaseDatos $conexion;
    private string $id;    
    private string $nombre;
    private string $apellidos;
    private string $email;
    private string $password;
    private string $rol;


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

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;

        return $this;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;

        return $this;
    }

    public function getRol(){
        return $this->rol;
    }

    public function setRol($rol){
        $this->rol = $rol;

        return $this;
    }
    

// 



public function mostrarUsuarios(){
    $this->conexion->consulta("SELECT * FROM usuarios");
        return $this->conexion->extraer_todos();

    
}

public function login($email,$password){

    $sql = ("SELECT * FROM usuarios WHERE email = '$email'");
        $this -> conexion -> consulta($sql);
        $usuario=$this -> conexion -> extraer_registro();
        //print_r($password);
        if($usuario){
            if(password_verify($password,$usuario['password'])){

                return $usuario;

            }else{
                return false;
            }
        }else{
            return false;
        }

}


public function register($nombre,$apellidos,$email,$password,$rol){
    $hash_password =password_hash($password,PASSWORD_DEFAULT);
    
    $sql = $this->conexion->consulta("INSERT INTO usuarios (nombre,apellidos,email,password,rol) VALUES ('$nombre','$apellidos','$email','$hash_password','$rol')");
        try{
                //$sql->execute();
                return true;
        }catch(PDOException $err){
            //return CON EL MENSAJE DE ERROR
            //  return $err;
             return "No estas logueado";

        }

}




    
}
?>