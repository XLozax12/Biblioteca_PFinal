<?php

namespace Controllers;
use Models\Ponente;

use Lib\Pages;



class ApiponenteController
{

    private Pages $pages;
    //private Ponente $ponente;

    public function __construct()
    {
       
       // $this->ponente = new Ponente();
        $this->pages= new Pages();
    }


    public function getAll(){
        
       echo "En el futuro los mostraré todos";
      return "Todos";
    }

}



