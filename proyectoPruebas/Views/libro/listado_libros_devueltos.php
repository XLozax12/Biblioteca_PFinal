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
    select{
      align-items: center;
    }
    .caja1{
        display: flex;
	      justify-content:  center;
	     /* align-items: center;  */
        
    }
    /* .caja2{
        display: flex;
	      justify-content:  center;
        
    } */
    img{
      width: 100px;
      height: 100px;
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
    .menu{
      display: flex;
	    justify-content:  center;
      color:black;
    }
        
    a:visited {
      text-decoration: none;
      color:black;
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
<a href="home" class="biblioteca"><h1>Biblioteca Guadix</h1></a><br>
<div class="menu">
    <ul>
      <li><a href="mostrarPrestar">Prestar Libro</a></li>
      <li><a href="mostrarReservados">Devolver Libro</a></li>
      <li><a href="sancionar">Sancionar</a></li>
      <li><a href="librosDevueltos">Libros Devueltos</a></li>
      <li><a href="pendienteSancion">Pendiente Sanción</a></li>
      <li><a href="mostrarFormularioLibro">Insertar Libros</a></li>
  </ul>
</div><br>

<div class="caja1">
<table>
  <thead>
    <tr>
      <!-- <th>id</th> -->
      <th>Numero Socio</th>
      <th>Usuario</th>
      <th>Libro</th>
      <th>Fecha</th>
      <th>Devolucion</th>
      
    </tr>
  </thead>
  
    <?php foreach($reserva as $fila):?> 
      <tr>
      <!-- <td><?php //echo $fila["id"]?></td> --> 
      <td><?php echo $fila["numero_socio"]?></td>
      <td><?php echo $fila["nombre_usuario"]?></td>
      <td><?php echo $fila["titulo"]?></td>
      <td><?php echo $fila["fecha"]?></td>
      <td><?php echo $fila["devolucion"] == 1 ? 'Si' : 'No'?></td>
      </tr>
    <?php endforeach; ?>
</table><br>

</form> 
<br>
</body>
</html>