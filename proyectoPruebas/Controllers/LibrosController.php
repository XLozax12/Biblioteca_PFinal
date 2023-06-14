<?php
namespace Controllers;

use Models\Libro;
use Models\Usuario;
use Models\Reservas;
use Lib\Pages;
use Lib\Validation;

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

        //DEVOLVER LOS RESERVADOS

        $reservados = $this->reserva->mostrarReservados();
     
        $this->pages->render('libro/Prestar_Libro',['libros'=>$libros,'usuarios'=>$usuarios,'reservados'=>$reservados]);
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


                $reservasUsuario = $this->reserva->getReservasByIdUsuarioYIdLibro($_POST['usuario'],$_POST['libro']);
                
                if(count($reservasUsuario) > 0) {
                    echo "<script>alert('Este libro ya lo ha reservado esta persona')</script>";
                    $this->listadoCompleto();
                    die;
                }

                if(count($reservas) >= $cantidad){
                    echo "<script>alert('Estos libros ya estan reservados')</script>";
                    $this->listadoCompleto();
                    die;
                }

            
                $fecha = date("Y-m-d");
                $devolucion = 0;
                $reservado = 2;
    
                $result= $this->reserva->guardarReserva($_POST['usuario'],$_POST['libro'],$fecha,$devolucion,$reservado);
                
                if($result){
                    $this->listadoCompleto();
                    echo "<script>alert('Libro prestado con exito')</script>";
                }

                }
                
            }else{
                $libros = $this->libro->getAll();
                $usuarios = $this->usuario->mostrarUsuarios();
             
                $this->pages->render('libro/Prestar_Libro',['libros'=>$libros,'usuarios'=>$usuarios]);
            }
                  
    }

    public function prestarReservado() {
        $id_reserva = $_POST['id_reserva'];
        $reservado = 2;
        $this->reserva->actualizarReservado($id_reserva);

        $this->listadoCompleto();
        echo "<script>alert('Libro prestado con exito')</script>";

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

                $reservasUsuario = $this->reserva->getReservasByIdUsuarioYIdLibro($id_usuario,$id_libro);
                
                if(count($reservasUsuario) > 0) {
                    echo "<script>alert('Este libro ya lo ha reservado esta persona')</script>";
                    $this->listadoCompleto();
                    die;
                }

                if(count($reservas) >= $cantidad){
                    $this->listadoCompleto();
                    echo "<script>alert('Estos libros ya estan reservados')</script>";
                    die;
                }
                

            
                $fecha = date("Y-m-d");
                $devolucion = 0;
                $reservado = 1;
    
                $result= $this->reserva->guardarReserva($id_usuario,$id_libro,$fecha,$devolucion,$reservado);
                
                if($result){
                    $this->mostrarPrestar();
                    echo "<script>alert('Libro reservado con exito')</script>";
                }

                }
                
            }else{
                $libros = $this->libro->getAll();
                $usuarios = $this->usuario->mostrarUsuarios();
             
                $this->pages->render('libro/Prestar_Libro',['libros'=>$libros,'usuarios'=>$usuarios]);
            }
                  
    }

// reservados

    public function librosDevueltos() {
        $reserva = $this->reserva->mostrarReservasDevueltas();
        $this->pages->render('libro/listado_libros_devueltos',['reserva'=>$reserva]);
    }

    public function listadoCompletoReservas(){
        $reserva = $this->reserva->mostrarReservasNoDevueltas();
        $this->pages->render('libro/Listado_Libros_Reservados',['reserva'=>$reserva]);
    
    }

    public function eliminarReservados(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Comprobar si el campo de nombre no está vacío
            // el empty se posdria poner isset pero es lo mismo
            if (!empty($_POST['borrar'])){
              // Capturar los datos del formulario
              
              $id = $_POST['borrar'];
              
                

            $this->reserva->actualizarDevolucion($id);
            echo "<script>alert('Libro devuelto con exito')</script>";
    
          }else{
            echo "no se ha podido eliminar";
          }
            
          }
          $this->listadoCompletoReservas();
  
  
            }

    public function mostrarFormularioLibro() {
        $this->pages->render('libro/insertar_Libro');
    }

    // insertar
    public function insertarLibro(){
        $result=[];
        $errores=[];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // validar
          $titulo = filter_var($_POST["titulo"],  FILTER_SANITIZE_STRING);
          $autor= filter_var($_POST["autor"],  FILTER_SANITIZE_STRING);
          $editorial = filter_var($_POST["editorial"], FILTER_SANITIZE_STRING);
          $cantidad = filter_var($_POST["cantidad"], FILTER_SANITIZE_NUMBER_FLOAT);
        //   var_dump($titulo);
        //   var_dump($descripcion);

            if (!empty($titulo) && !empty($autor) && !empty($editorial) && !empty($cantidad) ) {
            // echo "hola";

              $result= $this->libro->insertarLibro($titulo,$autor,$editorial,$cantidad);
              
              if($result){
                $this->listadoCompleto();
              }
            }else{
              
            $errores["error_titulo"]=Validation::validar_requerido($titulo,"titulo");
            $errores["error_autor"]=Validation::validar_requerido($autor,"autor");
            $errores["error_editorial"]=Validation::validar_requerido($editorial,"editorial");
            $errores["error_cantidad"]=Validation::validar_requerido($cantidad,"cantidad");
              
              
            $this->pages->render('libro/insertar_Libro',['errores'=>$errores]);
    
            }
            // var_dump($id);
            // die();
          }
          else{
            $this->pages->render('libro/insertar_Libro',['errores'=>$errores]);
          }
        
        }


}
?>