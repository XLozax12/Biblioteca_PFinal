<?php
namespace Lib;

class Pages {

    public function render(string $pageName, array $params = null): void{
    /*$pageName es el nombre de nuestra plantilla, por ej, mostrar_todos. No pongas la extensión 
      $params es el contenedor de las variables que deseamos pasar a la vista.
      $params es un array con un índice asociativo. 
      Para crear las variables, recorremos la lista y 
      usamos el índice como nombre de variable usando la propiedad variable de PHP ($$name = $value)
      */
        if($params != null){
            foreach($params as $name => $value){
                $$name = $value;
            }
        }
      // require_once "../Views/layout/header.php";
        require_once "../Views/$pageName.php";
      //require_once "../Views/layout/footer.php";
    }

}
