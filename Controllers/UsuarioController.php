<?php
namespace Controllers;

use Models\Usuario;
use Models\Libro;
use Lib\Pages;
use Utils\Validation;

class UsuarioController{
    private Pages $pages;
    private Usuario $usuario;
    private Libro $libro;

    public function __construct() {
        
        $this->pages=new Pages();
        $this->usuario=new Usuario();
        $this->libro=new Libro();
    }


    public function login(){
      //print_r($_POST);
        $result=[];
        $errores=[];
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // validar
            $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
            $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
  
              if (!empty($email) &&!empty($password) ) {
  
                $result= $this->usuario->login($email,$password);
                
                if($result !== false){
                  session_start();
                  $_SESSION["id_usuario"] = $result["id"];
                  $_SESSION["rol_usuario"] = $result["rol"];
                  
                  $libros = $this->libro->getAll();
                  $this->pages->render('libro/Listado_Libros',['libros'=>$libros]);
          
                }else{
                  echo"datos incorrectos";
                }
              }else{
                $errores["error_email"]=Validation::validar_requerido($email,"email");
                $errores["error_password"]=Validation::validar_requerido($password,"password");
                
                require_once 'views\user\login.php';
              }
              
            }else{
              require_once 'views\user\login.php';
            }
          

    }

    public function mostrarLogin(){
        return $this->pages->render("user/login");
    }

    public function registro(){
        //print_r($_POST);
        $result=[];
      $errores=[];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // validar
          $nombre = filter_var($_POST["nombre"],  FILTER_SANITIZE_STRING);
          $apellidos= filter_var($_POST["apellidos"],  FILTER_SANITIZE_STRING);
          $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
          $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

            if (!empty($nombre) && !empty($apellidos) && !empty($email) &&!empty($password) ) {
              // echo "hola";
            
              $rol = 'lectores';

              $result= $this->usuario->register($nombre,$apellidos,$email,$password,$rol);
              
              if($result){
                $this->mostrarLogin();
              }
            }else{
              
              $errores["error_nombre"]=Validation::validar_requerido($nombre,"nombre");
              $errores["error_apellidos"]=Validation::validar_requerido($apellidos,"apellidos");
              $errores["error_email"]=Validation::validar_requerido($email,"email");
              $errores["error_password"]=Validation::validar_requerido($password,"password");
              
              
              require_once 'views\user\register.php';
            }
            
          }else{
            require_once 'views\user\register.php';
          }
        

    }

    public function mostrarRegistro(){
        return $this->pages->render("user/register");
    }

    public function logout(){
      session_start();
      session_destroy();
      header("Location: inicio");
      exit();
    }

    // usuarios lectores
    public function listadoUsuariosLectores(){
      $usuarios = $this->usuario->mostrarUsuarios();
      $this->pages->render('libro/Listado_Libros',['usuarios'=>$usuarios]);
        
    }




}
?>