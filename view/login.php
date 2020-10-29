<!DOCTYPE html>
<html>
<title>Notas</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="../js/code.js"></script>
<style>
input[type=email], input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>

<h1 style="text-align: center; color: red;"><u>Gestión de notas</u></h1>

<div style="margin-left: 25%; margin-right: 25%;">
  <form action="../controller/loginController.php" method="POST" onsubmit="return validacionForm()">
  <h2 style="text-align: center;">Inicio de sesión</h2>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">

    <label for="passwd">Contraseña:</label>
    <input type="password" id="passwd" name="passwd">
  
    <input type="submit" id="submit" value="Submit">
  </form>
  <div id="message" style="color: red;"></div>
</div>

</body>
</html>