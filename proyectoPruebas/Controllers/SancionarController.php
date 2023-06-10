<?php
namespace Controllers;

use Models\Libro;
use Models\Usuario;
use Models\Reservas;
use Models\Sanciones;
use Lib\Pages;
use Utils\Validation;

class SancionarController{
    private Pages $pages;
    private Libro $libro;
    private Sanciones $sanciones;
    private Usuario $usuario;
    private Reservas $reserva;

    public function __construct() {
        
        $this->pages=new Pages();
        $this->libro=new Libro();
        $this->usuario=new Usuario();
        $this->reserva=new Reservas();
        $this->sanciones=new Sanciones();
    }

    public function mostrarSancion(){
        $usuarios = $this->usuario->mostrarUsuarios();
     
        $this->pages->render('libro/Sancionar',['usuarios'=>$usuarios]);
    }

    public function listadoCompletoSanciones(){
      
        $sanciones = $this->sanciones->getAll();
        //  print_r($sanciones);die;
        $this->pages->render('libro/Sancionar',['sanciones'=>$sanciones]);
        
        
        
    }

    public function crearSancion() {
      $fecha_inicio = fecha('Y-m-d');
      $fecha_fin=date('Y-m-d', strtotime($fecha_inicio . ' +7 days'));
      //FECHA INICIO SEA HOY
      //FECHA FIN SEA 7 DIAS A PARTIR DE HOY  busca un metodo para sumar dias a una fecha
    }

  public function Eliminar(){
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // Comprobar si el campo de nombre no está vacío
          // el empty se posdria poner isset pero es lo mismo
          if (!empty($_POST['borrar'])){
            // Capturar los datos del formulario
            
            $id = $_POST['borrar'];
            
              

          // $senderismo = new Senderismo();
          $this->sanciones->Eliminar($id);
  
        }else{
          echo "no se ha podido eliminar";
        }
          
        }
        $this->listadoCompletoSanciones();


      }
    



}
?>