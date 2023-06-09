<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
//require '../includes/bootstrap.php';
require_once __DIR__.'/../vendor/autoload.php';

// use Controllers\ApiponenteController;
use Controllers\UsuarioController;
use Controllers\LibrosController;
use Controllers\SancionarController;
use Lib\Router;

use Dotenv\Dotenv;

// Añadir Dotenv
$dotenv = Dotenv::createImmutable(dirname(__DIR__.'/'));// para acceder al contenido del archivo .env
//$dotenv =Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad(); // si no existe no nos marca error*/

//Añadimos rutas
// Router::add('GET','/',function (){return 'saludo';});

Router::add('GET','/home', function (){

    (new LibrosController())->listadoCompleto();});

Router::add('GET','/logout', function (){

    (new UsuarioController())->logout();});

Router::add('GET','/', function (){

    (new UsuarioController())->mostrarLogin();});

Router::add('GET','/inicio', function (){

    (new UsuarioController())->mostrarLogin();});

Router::add('GET','/registro', function (){

    (new UsuarioController())->mostrarRegistro();});

Router::add('POST','/registrar', function (){

    (new UsuarioController())->registro();});

Router::add('POST','/login', function (){

    (new UsuarioController())->login();});

Router::add('GET','/mostrarPrestar', function (){

    (new LibrosController())->mostrarPrestar();});
        
Router::add('GET','/sancionar', function (){

    (new SancionarController())->listadoCompletoSanciones();}); 

Router::add('POST','/eliminar', function (){

    (new SancionarController())->Eliminar();}); 
Router::add('POST','/eliminarReservados', function (){

    (new LibrosController())->eliminarReservados();});
Router::add('GET','/mostrarReservados', function (){

    (new LibrosController())->listadoCompletoReservas();});   

Router::add('GET','/devolver', function (){

    (new UsuarioController())->login();});   

Router::add('POST','/prestar', function (){

    (new LibrosController())->prestar();});

Router::add('POST','/prestarReservado', function (){

    (new LibrosController())->prestarReservado();});

Router::add('POST','/reservar', function (){

    (new LibrosController())->reservar();});

Router::add('POST','/crearSancion', function (){

    (new SancionarController())->crearSancion();});

Router::add('GET','/mostrarFormularioLibro', function (){

    (new LibrosController())->mostrarFormularioLibro();});

Router::add('POST','/insertarLibro', function (){

    (new LibrosController())->insertarLibro();});

Router::add('GET','/librosDevueltos', function (){

    (new LibrosController())->librosDevueltos();});

Router::add('GET','/pendienteSancion', function (){

    (new SancionarController())->pendienteSancion();});

Router::dispatch();

?>








