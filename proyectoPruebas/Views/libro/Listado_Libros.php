<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .biblioteca{
      text-align: center;
      color:black;
    }    
    .rol{
      text-align: center;
    }
    .menu{
      display: flex;
	    justify-content:  center;
      color:black;
    }
    .cerrar{
      display: flex;
	    justify-content: end;
    }
    table {
        border-collapse: collapse;
    }
 
    table,
    th,
    td {
        border: 1px solid black;
        background-color: #ffffcc;
    }
 
    th,
    td {
        padding: 5px;
    }
    .caja1{
        display: flex;
	      justify-content:  center;
    }
    p{
        display: flex;
	      justify-content:  center;
          
    }
    a:visited {
      text-decoration: none;
      color:black;
    }
    img{
      width: 100px;
      height: 100px;
    }
        
    </style>
</head>
<body>
<br><br>
<div>
  <!-- ESTE MENÚ ES SOLO PARA BIBLIOTECARIO -->
  <?php session_start(); ?>
<div class="image">
<img src="../images/guadix1.png">
<a href="logout" class="cerrar">Cerrar sesión</a>
</div>
  <a href="inicio" class="biblioteca"><h1>Biblioteca Guadix</h1></a><br>
  <div class="rol">
  Estás logueado como: 
  <?=$_SESSION['rol_usuario']; ?>
  </div><br>
  <div class="menu">
  <?php if($_SESSION['rol_usuario'] == 'bibliotecario'): ?>
    <ul>
      <li><a href="mostrarPrestar">Prestar Libro</a></li>
      <li><a href="mostrarReservados">Devolver Libro</a></li>
      <li><a href="sancionar">Sancionar</a></li>
      <li><a href="insertarGet">Insertar Libros</a></li>
  </ul>
  </div>
  <?php endif; ?>
</div>
<div class="caja1">

<table>
  <thead>
    <tr>
      <!-- <th>id</th> -->
      <th>Titulo</th>
      <th>Autor</th>
      <th>Editorial</th>
      <td><b>Operaciones</b></td>
      
    </tr>
  </thead>
  
    <?php foreach($libros as $fila):?>
      <tr>
      <!-- <td><?php //echo $fila["id"]?></td> -->
      <td><?php echo $fila["titulo"]?></td>
      <td><?php echo $fila["autor"]?></td>
      <td><?php echo $fila["editorial"]?></td>
       <form action="reservar" method="post">
       <td><button type="submit"  name="reservar" value="<?= $fila["id"]; ?>">Reservar</button></td>
       </form>
      </tr>
    <?php endforeach; ?>
</table><br>


</div>
<!-- <p>El numero total de rutas es:</p> -->


    
</body>
</html>                                               