<!DOCTYPE html>
<html>
<title>Notas</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<?php
require_once '../controller/sessionController.php'
?>

</br></br>
<h1 style="margin-left: 20px; color: #4a7c7c">Buscar alumno</h1>
<div style="border: 3px solid #4a7c7c; width: 40%; margin-left: 20px; padding: 10px; background-color: lightgrey;">
  <form action="zona.admin.php" method="POST">
    <label for="nombre_alu">Nombre del alumno:</label>
    <input type="text" id="nombre_alu" name="nombre_alu" placeholder="Nombre..."><br><br>
    <label for="apep">1r apellido del alumno:</label>
    <input type="text" id="apep" name="apep" placeholder="Apellido..."></br></br>
    <input type="submit" value="Filtrar" name="filtrar">
  </form>
</div>
</br>
  <h3 style="margin-left: 20px">Agregar alumno a la base de datos: <button onclick="location.href='../model/añadir_alumno.php'">Añadir alumno</button></h3>
</br>

  <table class="w3-table-all">
    <thead>
      <tr class="w3-green">
        <th>EDITAR</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
      </tr>
    </thead>

  <?php

    require_once '../model/alumnoDAO.php';

    if (isset($_GET['id_alu'])) {
		$eliminar_alu = new AlumnoDAO;
		$eliminar_alu->eliminar();
    }

    if (empty($_POST['filtrar'])){
		$mostrar_alu=new AlumnoDAO;
		echo $mostrar_alu->mostrar();
	} else if (empty($_POST['nombre_alu']) && empty($_POST['apep'])) {
    	$mostrar_alu=new AlumnoDAO;
		echo $mostrar_alu->mostrar();
	} else if (isset($_POST['nombre_alu']) || isset($_POST['apep'])){
        $filtro_alu=new AlumnoDAO;
        $filtro_alu->filtro();
 	}

  ?>
</table>
</body>
</html>