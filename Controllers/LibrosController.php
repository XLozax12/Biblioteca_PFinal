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

}
?>