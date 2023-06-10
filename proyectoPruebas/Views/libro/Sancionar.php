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
        
    }
    .caja2{
        display: flex;
	      justify-content:  center;
        
    }
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
<a href="inicio" class="biblioteca"><h1>Biblioteca Guadix</h1></a><br>
<div class="menu">
    <ul>
      <li><a href="mostrarPrestar">Prestar Libro</a></li>
      <li><a href="mostrarReservados">Devolver Libro</a></li>
      <li><a href="sancionar">Sancionar</a></li>
      <li><a href="insertarGet">Insertar Libros</a></li>
  </ul>
</div>

<form method="POST" action="crearSancion">
<div class="caja1">
    <label for="usuario">Usarios</label>
    <select id="usuario" name="usuario">
      <?php foreach($usuarios as $usuario): ?>
      <option value="<?=$usuario['id'] ?>"><?=$usuario['nombre'] ?></option>
      <?php endforeach; ?>
    </select>|

<button type="submit" name="sancionar" id="sancionar">Sancionar</button>

</div>
</form>
<br>
<div class="caja2">

<table>
  <thead>
    <tr>
       <th>id</th> 
       <th>Nombre</th>
      <th>Fecha Inicio</th>
      <th>Fecha fin</th>
      <td><b>Operaciones</b></td> 
      
    </tr>
  </thead>
  <?php//print_r($sanciones);die;?>
    <?php foreach($sanciones as $fila):?> 
      <?php //echo"1";?>
      <tr>
      <!-- <td><?php //echo $fila["id"]?></td> --> 
      <td><?php echo $fila["id_usuario"]?></td>
      <td><?php echo $fila["fecha_inicio"]?></td>
      <td><?php echo $fila["fecha_fin"]?></td>
       <?php //print_r($fila); die; ?> 
       <form action="eliminar" method="post">
       <td><button type="submit"  name="borrar" value="<?= $fila["id"]; ?>">Eliminar</button></td>
       </form>
      </tr>
    <?php endforeach; ?>
</table><br>

</form> 
<br> 
</body>
</html>