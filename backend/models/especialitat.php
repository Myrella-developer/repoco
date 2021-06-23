<?php
    session_start();
    // if(!isset($_SESSION['login'])) header ('Location:../#');
    require("../inc/functions.php");

    if(isset($_POST['acc']) && $_POST['acc'] == "especialitats"){
        $mySqlEspecialitats = "SELECT especialitats.idEsp, especialitats.nom, especialitats.nombre, especialitats.url, especialitats.descripcio, especialitats.descripcion, especialitats.idCasa, cases.nom, cases.nombre 
        FROM especialitats INNER JOIN cases ON especialitats.idCasa = 1";
        $conexion = conectar();
        $resultEspecialitats = mysqli_query($conexion, $mySqlEspecialitats);
        desconectar($conexion);
        $rows = array();
        while($row = mysqli_fetch_array($resultEspecialitats)){
            $rows[] = $row;
        }
        echo json_encode($rows);
    }
    if(isset($_POST['acc']) && $_POST['acc'] == "u"){
		$sql = "UPDATE especialitats SET nom = '{$_POST['nom']}', nombre = '{$_POST['nombre']}', descripcio = '{$_POST['descripcio']}', descripcion = '{$_POST['descripcion']}',
		WHERE idEsp = '{$_POST['idEsp']}'";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "c"){
		$sql = "INSERT INTO especialitats (`nom`,`nombre`,`descripcio`,`descripcion`) VALUES ('{$_POST['nom']}','{$_POST['nombre']}','{$_POST['descripcio']}','{$_POST['descripcion']}')";
		echo $sql;
        $conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}
?>




