<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .caja1{
            /* ponerloenmedio */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* cuadro */
            padding: 30px 40px;
            margin: 20px 0 50px 0;
            background-color: #ffffcc;
            border-radius: 10px;
            box-shadow: #464646 0 0 10px;
            /* display:inline-block; */

           
        }
        .biblioteca{
            position: absolute;
            top: 15%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        .error{
            background: red;
            display: inline-block;
        }
    </style>
</head>
<body>
<h1  class="biblioteca">Biblioteca Guadix</h1>
<form action="registrar" method="post">
    <div class="caja1">
    Nombre<input type="text" name="nombre" id="nombre" required ><br>
    <div class="error">
    <?php
    // if($errores){
    //     echo $errores["error_titulo"];
    // }
    ?>
    </div>
    <br><br>

    Apellidos<input type="text" name="apellidos" id="apellidos" required><br>
    <div class="error">
    <?php
    // if($errores){
    //     echo $errores["error_titulo"];
    // }
    ?>
    </div>
    <br><br>

    Email<input type="text" name="email" id="email" required><br>
    <div class="error">
    <?php
    // if($errores){
    //     echo $errores["error_titulo"];
    // }
    ?>
    </div>
    <br><br>

    password<input type="password" name="password" id="password" required><br>
    <div class="error">
    <?php
    // if($errores){
    //     echo $errores["error_descripcion"];
    // }
    ?>
    </div>
    <br><br>
    <button type="submit" name="insertar" id="insertar">Registro</button>
    </form>
    </div>
    
</body>
</html>