<?php

require_once 'alumno.php';

class AlumnoDAO{
    private $pdo;
    
    public function __construct(){
        require_once 'connection.php';
        $this->pdo=$pdo;
    }

    public function getPdo(){
        return $this->pdo;
    }

    public function setPdo($pdo){
        $this->pdo = $pdo;
        return $this;
    }

    public function mostrar(){
        $query="SELECT * FROM `alumno`";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();

        $lista_alumnos=$sentencia->fetchALL(PDO::FETCH_ASSOC);
        foreach ($lista_alumnos as $alumno) {
            $id=$alumno['id_alu'];
            echo "<tr><td><a href='../model/actualizar_alumno.php?id={$id}'>Actualizar</a><br>";
            echo "<a href='../view/zona.admin.php?id_alu={$id}'>Eliminar</a>";
            echo "<td>{$alumno['nombre_alu']}</td>";
            echo "<td>{$alumno['apellido_paterno']}</td>";
            echo "<td>{$alumno['apellido_materno']}</td></tr>";
        }
    }

    public function añadir(){
    	try {
            require_once 'connection.php';
            $query="INSERT INTO `alumno` (`id_alu`,`nombre_alu`,`apellido_paterno`,`apellido_materno`, `grupo_alu`, `email_alu`, `passwd_alu`) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
            $sentencia=$this->pdo->prepare($query);

			$nombre=$_POST['nombre_alu'];
			$apellido1=$_POST['apellido_paterno'];
			$apellido2=$_POST['apellido_materno'];
			$grupo=$_POST['grupo_alu'];
			$email=$_POST['email_alu'];
			$passwd=md5($_POST['passwd_alu']);
			$sentencia->bindParam(1,$nombre);
			$sentencia->bindParam(2,$apellido1);
			$sentencia->bindParam(3,$apellido2);
			$sentencia->bindParam(4,$grupo);
			$sentencia->bindParam(5,$email);
            $sentencia->bindParam(6,$passwd);
            
            $sentencia->execute();
			header("Location:../view/zona.admin.php");
		} catch (Exception $ex){
			$pdo->rollback();
			echo $ex->getMessage();
		}
    }

    public function eliminar(){
		require_once 'connection.php';

		try {
			$this->pdo->beginTransaction();
			$id=$_GET['id_alu'];
            $query = "SELECT * FROM `notas` WHERE `id_alu` = ?"; 
			$sentencia=$this->pdo->prepare($query);
			$sentencia->bindParam(1,$id);
			$sentencia->execute();
			$lista_notas=$sentencia->fetch(PDO::FETCH_ASSOC);
			if ($lista_notas!="") {
				$query="DELETE FROM `alumno` WHERE `id_alu` = ?";
				$sentencia=$this->pdo->prepare($query);
				$sentencia->bindParam(1,$id);
				$sentencia->execute();
			} else {
				$query="DELETE FROM `notas` WHERE `id_alu` = ?";
				$sentencia=$this->pdo->prepare($query);
				$sentencia->bindParam(1,$id);
				$sentencia->execute();
				$query="DELETE FROM `alumno` WHERE `id_alu` = ?";
				$sentencia=$this->pdo->prepare($query);
				$sentencia->bindParam(1,$id);
				$sentencia->execute();
			}
		$this->pdo->commit();
		header("Location:../view/zona.admin.php");
	} catch (Exception $e) {
		$pdo->rollBack();
		echo $e;
	}
    }
    
    public function filtro(){
		// require_once 'connection.php';
    	$query="SELECT * FROM alumno WHERE nombre_alu LIKE '%{$_POST['nombre_alu']}%' AND apellido_paterno LIKE '%{$_POST['apep']}%'";
		$sentencia=$this->pdo->prepare($query);
        $sentencia->execute();

		$lista_alumno=$sentencia->fetchAll(PDO::FETCH_ASSOC);

		foreach ($lista_alumno as $alumno) {
			$id=$alumno["id_alu"]." ";
			echo "<tr><td><a href='./actualizar_alumno.php?id={$id}'>Actualizar</a><br>";
            echo "<a href='../view/zona.admin.php?id_alu={$id}'>Eliminar</a>";
		
			echo "<td>{$alumno['nombre_alu']}</td>";
            echo "<td>{$alumno['apellido_paterno']}</td>";
            echo "<td>{$alumno['apellido_materno']}</td></tr>";
    	}
	   }
	   
	public function modificacion($id){
		require_once 'connection.php';
	 	$query = "SELECT * FROM alumno WHERE id_alu=?";
		$sentencia=$this->pdo->prepare($query);
		$sentencia->bindParam(1,$id);
		$sentencia->execute();
		$alumno=$sentencia->fetch(PDO::FETCH_ASSOC);
		return $alumno;
 }
}

?>