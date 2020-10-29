<?php
require_once 'administrador.php';
class AdminDao{
    private $pdo;
    
    public function __construct(){
        require_once 'connection.php';
        $this->pdo=$pdo;
    }
    
    public function login($admin){
        $query = "SELECT * FROM administrador WHERE email_admin=? AND passwd_admin=?";
        $sentencia=$this->pdo->prepare($query);
        $email=$admin->getEmail();
        $passwd=$admin->getPasswd();
        $sentencia->bindParam(1,$email);
        $sentencia->bindParam(2,$passwd);
        $sentencia->execute();
        // $result=$sentencia->fetch(PDO::FETCH_ASSOC);
        $numRow=$sentencia->rowCount();
        if($numRow==1){
            session_start();
            $_SESSION['admin']=$admin;
            return true;
        }else {
            return false;
        }
    }
}

?>