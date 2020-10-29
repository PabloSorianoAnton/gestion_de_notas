<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <?php
    require_once './alumnoDao.php';
    if (isset($_POST['añadir'])){
        $añadir_alu=new AlumnoDao;
        $añadir_alu->añadir();
    }
  ?>
  <h1 style="margin-left: 20px; text-align: center;"><a href="../controller/logoutController.php">Logout</a></h1>
    <div style="border: 2px solid black; background-color: lightgrey; width: 35%; margin-left: 32%; margin-right: 32%; padding-top: 10px;">
      <form action="./añadir_alumno.php" method="POST" style="margin-left: 20px; text-align: center;">
      <label for="nombre">Nombre:</label><br>
      <input type="text" id="nombre_alu" name="nombre_alu" placeholder="Escribir nombre..."><br><br>
      <label for="apellido1">1er apellido:</label><br>
      <input type="text" id="apellido_paterno" name="apellido_paterno" placeholder="Escribir 1er apellido..."><br><br>
      <label for="apellido2">2do apellido:</label><br>
      <input type="text" id="apellido_materno" name="apellido_materno" placeholder="Escribir 2do apellido..."><br><br>
      <label for="grupo">Grupo alumno:</label><br>
      <input type="text" id="grupo_alu" name="grupo_alu" placeholder="Escribir grupo..."><br><br>
      <label for="email">Email:</label><br>
      <input type="email" id="email_alu" name="email_alu" placeholder="Escribir email..."><br><br>
      <label for="passwd">Password:</label><br>
      <input type="password" id="passwd_alu" name="passwd_alu" placeholder="Escribir password..."><br><br>
      <input type="submit" value="Submit" name="añadir"><br><br>
    </div>
  <div style="text-align: center; padding-top: 10px;"><a href="../view/zona.admin.php">Volver atrás</a></div>
</form>
</body>
</html>