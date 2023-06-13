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
  </div>

<form method="POST" action="prestar">
<div class="caja1">
    <label for="usuario">Usarios</label>
    <select id="usuario" name="usuario">
      <?php foreach($usuarios as $usuario): ?>
      <option value="<?=$usuario['id'] ?>"><?=$usuario['socio'].' - '.$usuario['nombre'] ?></option>
      <?php endforeach; ?>
    </select>&   

    <label for="libro">Listado de libros</label>
      <select id="libro" name="libro">
        <?php foreach($libros as $libro): ?>
          <option value="<?=$libro['id'] ?>"><?=$libro['titulo']?></option>
        <?php endforeach; ?>
      </select>|

<button type="submit" name="reservar" id="reservar">Reservar</button>
</div><br>

</form> <br><br>
<div class="image">
<img src="../images/guadix1.png">
</div>
</body>
</html>