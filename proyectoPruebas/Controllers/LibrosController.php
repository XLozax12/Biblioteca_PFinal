<?php
namespace Controllers;

use Models\Libro;
use Models\Usuario;
use Models\Reservas;
use Lib\Pages;
use Utils\Validation;

class LibrosController{
    private Pages $pages;
    private Libro $libro;
    private Usuario $usuario;
    private Reservas $reserva;

    public function __construct() {
        
        $this->pages=new Pages();
        $this->libro=new Libro();
        $this->usuario=new Usuario();
        $this->reserva=new Reservas();
    }


    public function listadoCompleto(){
        session_start();
        $libros = $this->libro->getAll();
        $this->pages->render('libro/Listado_Libros',['libros'=>$libros]);
        
    }
    public function mostrarPrestar(){
        $libros = $this->libro->getAll();
        $usuarios = $this->usuario->mostrarUsuarios();
     
        $this->pages->render('libro/Prestar_Libro',['libros'=>$libros,'usuarios'=>$usuarios]);
    }

    public function prestar(){
        // ESTE MÉTODO PRESTARÁ UN LIBRO
        // Llamara al modelo RESERVA y al metodo guardar una reserva
        // Hay que comprobar que el libro que viene no está ya reservado

        $result=[];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
                if (!empty($_POST['usuario']) && !empty($_POST['libro'])) {

                $reservas = $this->reserva->getReservasByIdLibro($_POST['libro']);
                $libro = $this->libro->getLibroById($_POST['libro']);
                $cantidad = $libro['cantidad'];

                if(count($reservas) >= $cantidad){
                    echo 'Estos libros ya estan reservados';
                    die;
                }

            
                $fecha = date("Y-m-d");
                $devolucion = 0;
    
                $result= $this->reserva->guardarReserva($_POST['usuario'],$_POST['libro'],$fecha,$devolucion);
                
                if($result){
                    $this->listadoCompleto();
                }

                }
                
            }else{
                $libros = $this->libro->getAll();
                $usuarios = $this->usuario->mostrarUsuarios();
             
                $this->pages->render('libro/Prestar_Libro',['libros'=>$libros,'usuarios'=>$usuarios]);
            }
                  
    }

    public function reservar(){
        // ESTE MÉTODO PRESTARÁ UN LIBRO
        // Llamara al modelo RESERVA y al metodo guardar una reserva
        // Hay que comprobar que el libro que viene no está ya reservado

        $result=[];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
                if (!empty($_POST['reservar'])) {
                $id_libro = $_POST['reservar'];
                session_start();
                $id_usuario = $_SESSION['id_usuario'];

                $reservas = $this->reserva->getReservasByIdLibro($id_libro);
                $libro = $this->libro->getLibroById($id_libro);
                $cantidad = $libro['cantidad'];

                if(count($reservas) >= $cantidad){
                    echo 'Estos libros ya estan reservados';
                    die;
                }

            
                $fecha = date("Y-m-d");
                $devolucion = 0;
    
                $result= $this->reserva->guardarReserva($id_usuario,$id_libro,$fecha,$devolucion);
                
                if($result){
                    $this->listadoCompleto();
                }

                }
                
            }else{
                $libros = $this->libro->getAll();
                $usuarios = $this->usuario->mostrarUsuarios();
             
                $this->pages->render('libro/Prestar_Libro',['libros'=>$libros,'usuarios'=>$usuarios]);
            }
                  
    }

// reservados

    public function listadoCompletoReservas(){
        $reserva = $this->reserva->getAll();
        $this->pages->render('libro/Listado_Libros_Reservados',['reserva'=>$reserva]);
    
    
    }
    public function eliminarReservados(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Comprobar si el campo de nombre no está vacío
            // el empty se posdria poner isset pero es lo mismo
            if (!empty($_POST['borrar'])){
              // Capturar los datos del formulario
              
              $id = $_POST['borrar'];
              
                

            $this->reserva->Eliminar($id);
    
          }else{
            echo "no se ha podido eliminar";
          }
            
          }
          $this->listadoCompletoReservas();
  
  
            }
    // insertar
    public function insertarLibro(){
        $result=[];
        $errores=[];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // validar
          $titulo = filter_var($_POST["titulo"],  FILTER_SANITIZE_STRING);
          $descripcion= filter_var($_POST["autor"],  FILTER_SANITIZE_STRING);
          $desnivel = filter_var($_POST["editorial"], FILTER_SANITIZE_STRING);
          $distancia = filter_var($_POST["cantidad"], FILTER_SANITIZE_NUMBER_FLOAT);
        //   var_dump($titulo);
        //   var_dump($descripcion);

            if (!empty($titulo) && !empty($autor) && !empty($editorial) && Validation::validar_float($cantidad) ) {
            // echo "hola";

              $result= $this->Libro->insertarLibro($titulo,$autor,$editorial,$cantidad);
              
              if($result){
                // $this->listadoCompleto();
                echo "Se ha añadido con exito";
              }
            }else{
              
            //   $errores["error_titulo"]=Validation::validar_requerido($titulo,"titulo");
            //   $errores["error_autor"]=Validation::validar_requerido($descripcion,"autor");
            //   $errores["error_editorial"]=Validation::validar_requerido($desnivel,"editorial");
            //   $errores["error_cantidad"]=Validation::mensaje_validar_float($distancia,"cantidad");
              
              
            $this->pages->render('libro/insertar_Libro');
            }
            // var_dump($id);
            // die();
          }
          else{
            $this->pages->render('libro/insertar_Libro');
          }
        




        }


}
?>