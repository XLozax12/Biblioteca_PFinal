<?php
namespace Lib;

class Validation{
   static function validar_float(string $texto){
      if(!filter_var($texto, FILTER_VALIDATE_FLOAT)){
         return false ;
      }else{
         return true;
      }

   }


   static function mensaje_validar_float(string $texto,string $campo){
      if(!filter_var($texto, FILTER_VALIDATE_FLOAT)){
         return 'El formato del campo '. $campo .' es invalido';
      }

   }

   static function  validar_requerido(string $texto,string $campo){
      if((trim($texto) == '')){
         return 'El campo '. $campo .' es obligatorio';
      }
       
   }
   static function mensaje_error_formato(string $campo){
     
         return 'El formato del campo '. $campo .' es invalido';
      

   }
}
    //Examinamos cada campo sanitizando
   
   // $titulo = filter_var($_POST["titulo"],  FILTER_SANITIZE_STRING);
   // $descripcion= filter_var($_POST["descripcion"],  FILTER_SANITIZE_STRING);
   // $desnivel = filter_var($_POST["desnivel"], FILTER_SANITIZE_NUMBER_INT);
   
   // $distancia = filter_var($_POST["distancia"], FILTER_SANITIZE_NUMBER_FLOAT);
     
   
   // Después de limpiar la información, validamos. Comprobamos que cumple con lo requisitos establecidos

   /** Valida si un texto no esta vacío */

   // function validar_requerido(string $texto): bool
   // {
   //     return !(trim($texto) == '');
   // }
   // if (!validar_requerido($titulo)) {
   //    $errores["titulo"] = 'El campo titulo es obligatorio.';
   //    $error = true;
   // }else{
   //    $errores["titulo"] = "";
   // }


   // if (!validar_requerido($descripcion) && !validar_requerido($desnivel)) {
   //    $errores["descripcion"] = 'El campo descripcion/desnivel es obligatorio.';
   //    $error = true;
   // }else{
   //    $errores["descripcion"] = "";

   // }

   // validacion filtro
   // if(!filter_var($distancia, FILTER_VALIDATE_FLOAT)){
   //    $errores["distancia"] = "El campo distancia debe ser un número.";
   //    $error = true;
   //  }else{
   //    $errores["distancia"] = "";
   // }


