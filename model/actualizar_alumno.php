<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="../css/fontawesome-free-5.15.0-web/css/all.css" rel="stylesheet">
</head>

<body>
    <?php
    require_once 'connection.php';
    require_once "alumnoDAO.php";
    require_once "notasDAO.php";
    $alumnodao = new AlumnoDao();
    $alumno = $alumnodao->modificacion($_POST['id_alu']);
    $notadao = new NotasDao();
    $notas = $notadao->notas();
    if (isset($_POST['nota0'])) {
    	$nota= new NotaDao();
    	$actualizar=$nota->actualizar();
    }

    ?>
    
<h2 style="text-align: center;">Modificar Alumno</h2>
<div class="row">
    <div class="form">
      <form action="actualizar_alumno.php" method="POST" onsubmit="return validacionForm1()">
      	<input type="hidden" name="id_alu" value="<?php echo $_POST['id_alu'];?>">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" id="nombre" value="<?php echo $alumno['nombre_alu'];?>" disabled><br>
        <label>1r apellido:</label><br>
        <input type="text" name="apep" id="apep" value="<?php echo $alumno['apellido_paterno'];?>" disabled><br>
        <label>2nd apellido:</label><br>
        <input type="text" name="apem" id="apem" value="<?php echo $alumno['apellido_materno'];?>" disabled><br>
        <label>Grupo:</label><br>
        <input type="text" name="grupo" id="grupo" value="<?php echo $alumno['grupo_alu'];?>" disabled><br>
        <label>Email:</label><br>
        <input type="email" name="email" id="email" value="<?php echo $alumno['email_alu'];?>" disabled><br>
        <?php
        $i=0;
        foreach ($notas as $nota) {
          echo "<label>".$nota['nombre_asignatura']."</label><br>";
          echo "<input type='text' name='nota".$i."' id='nota' value='".$nota['nota']."' required><br>";
          $i++;
          }
         ?>
        <input type="submit" value="Submit" name="actualizar">
      </form> 
    </div>
</div>

</body>
</html>