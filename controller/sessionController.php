<?php

require_once '../model/administrador.php';

session_start();
if (!isset($_SESSION['admin'])) {
    header('Location:../view/login.php');
}
echo '<div style="background-color:lightgrey; height: 155px;"><h1 style="text-align: center; padding-top: 20px;">Bienvenido '.$_SESSION['admin']->getEmail().'</h1>
<h1 style="text-align: center;"><a href="../controller/logoutController.php">Logout</a></h1></div>';

?>