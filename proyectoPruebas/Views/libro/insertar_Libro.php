<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .caja1{
            display: flex;
	        justify-content:  center;

           
        }
        .biblioteca{
            text-align: center;
            color:black;
        }  
        h1{
            display: flex;
	        justify-content:  center;

        }
        .error{
            background: red;
            display: inline-block;
        }
        .menu{
            display: flex;
	        justify-content:  center;
            color:black;
        }
        img{
            width: 100px;
            height: 100px;
        }
        .cerrar{
            display: flex;
	        justify-content: end;
        }
    
    </style>
</head>
<body>
<div class="image">
<img src="../images/guadix1.png">
<a href="logout" class="cerrar">Cerrar sesión</a>
</div>
<a href="inicio" class="biblioteca"><h1>Biblioteca Guadix</h1></a><br>
<div class="menu">
    <ul>
      <li><a href="mostrarPrestar">Prestar Libro</a></li>
      <li><a href="mostrarReservados">Devolver Libro</a></li>
      <li><a href="sancionar">Sancionar</a></li>
      <li><a href="insertarGet">Insertar Libros</a></li>
  </ul>
</div><br>
<h1>Insertar Libro</h1>
 <div class="caja1">
    
    <form action="insertarPost" method="post">
    Titulo<input type="text" name="titulo" id="titulo" required><br>
    <div class="error">
    <?php
    // if($errores){
    //     echo $errores["error_titulo"];
    // }
    ?>
    </div>
    <br><br>

    Autor<input type="text" name="autor" id="autor" required><br>
    <div class="error">
    <?php
    // if($errores){
    //     echo $errores["error_descripcion"];
    // }
    ?>
    </div>
    <br><br>

    Editorial<input type="text" name="editorial" id="editorial" required><br>
    <div class="error">
    <?php
    // if($errores){
    //     echo $errores["error_desnivel"];
    // }
    ?>
    </div>
    <br><br>

    Cantidad<input type="text" name="cantidad" id="cantidad" required><br>
    <div class="error">
    <?php

    // if ($errores) {
    //     echo $errores["error_distancia"];
    // }
    
    ?>
    </div>
    <br>
    <button type="submit" name="insertar" id="insertar">Insertar Libro</button>
    <br><br><br>

    </form>
    </div>