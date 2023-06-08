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
    .caja2{
        display: flex;
	      justify-content:  center;
        
    }
    .image{
      display: flex;
	    justify-content: center;
      /* align-items: center; */
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
<a href="logout" class="cerrar">Cerrar sesión</a>
<a href="inicio" class="biblioteca"><h1>Biblioteca Guadix</h1></a><br>
<div class="menu">
    <ul>
      <li><a href="mostrarPrestar">Prestar Libro</a></li>
      <li><a href="">Devolver Libro</a></li>
      <li><a href="sancionar">Sancionar</a></li>
  </ul>
  </div>

<form method="POST" action="sancionar">
<div class="caja1">
    <label for="usuario">Usarios</label>
    <select id="usuario" name="usuario">
      <?php foreach($usuarios as $usuario): ?>
      <option value="<?=$usuario['id'] ?>"><?=$usuario['nombre'] ?></option>
      <?php endforeach; ?>
    </select>

<button type="submit" name="sancionar" id="sancionar">Sancionar</button>
</div><br>
<div class="caja2">

<table>
  <thead>
    <tr>
      <!-- <th>id</th> -->
      <th>Nombre</th>
      <th>Fecha fin</th>
      <th>Fecha inicio</th>
      <td><b>Operaciones</b></td>
      
    </tr>
  </thead>
  
    <?php foreach($sanciones as $fila):?>
      <tr>
      <!-- <td><?php //echo $fila["id"]?></td> -->
      <td><?php echo $fila["id_usuario"]?></td>
      <td><?php echo $fila["fecha_inicio"]?></td>
      <td><?php echo $fila["fecha_fin"]?></td>
       <form action="?controller=Sancionar&action=Eliminar" method="post">
       <td><button type="submit"  name="borrar" value="<?= $fila["id"]; ?>">Eliminar</button></td>
       </form>
      </tr>
    <?php endforeach; ?>
</table><br>

<!-- </form> <br><br>
<div class="image">
<img src="../images/guadix1.png">-->
</div> 
</body>
</html>