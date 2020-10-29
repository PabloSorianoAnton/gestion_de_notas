<?php
include '../model/administrador.php';
include '../model/adminDAO.php';

    $administrador = new Administrador($_POST['email'], md5($_POST['passwd']));
    $adminDao = new AdminDao();
    if($adminDao->login($administrador)){
        header('Location:../view/zona.admin.php');
    }else {
        header('Location:../view/login.php');
    }

?>