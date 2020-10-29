<?php

require_once 'notas.php';

class NotasDao{
    private $pdo;

    public function __construct(){
    }


    public function getPdo(){
        return $this->pdo;
    }

    public function setPdo($pdo) {
        $this->pdo = $pdo;
        return $this;
    }

    public function notas(){
        $id=$_GET['id_alu'];
        $query = "SELECT * FROM notas WHERE id_alu=?";
        $sentencia=$pdo->prepare($query);
        $sentencia->bindParam(1,$id);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizar(){
        try {    
            require_once 'connection.php';
            $this->pdo->beginTransaction();
            $id=$_POST['id_alu'];
            $query1="UPDATE `nota` SET `nota`=? WHERE `id_alu` = ? AND nombre_asignatura LIKE 'Fisica';";
            $nota=$_POST['nota0'];
            $id=$_POST['id_alu'];
            $sentencia1=$this->pdo->prepare($query1);
            $sentencia1->bindParam(1,$nota);
            $sentencia1->bindParam(2,$id);
            $sentencia1->execute();
            $query2="UPDATE `nota` SET `nota`=? WHERE `id_alu = ? AND nombre_asignatura LIKE 'Matemáticas';";
            $id=$_POST['id_alu'];
            $nota=$_POST['nota1'];
            $sentencia2=$this->pdo->prepare($query2);
            $sentencia2->bindParam(1,$nota);
            $sentencia2->bindParam(2,$id);
            $sentencia2->execute();
            $query3="UPDATE `nota` SET `nota`=? WHERE `id_alu` = ? AND nombre_asignatura LIKE 'Programación';";
            $id=$_POST['id_alu'];
            $nota=$_POST['nota2'];
            $sentencia3=$this->pdo->prepare($query3);
            $sentencia3->bindParam(1,$nota);
            $sentencia3->bindParam(2,$id);
            $sentencia3->execute();
            print_r($sentencia3);
            $this->pdo->commit();
            header("Location: ../zona.admin.php");
        } catch (Exception $e) {
            $pdo->rollBack();
            echo $e;
        }
    }

}
?>