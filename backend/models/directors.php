<?php
    session_start();
    // if(!isset($_SESSION['login'])) header ('Location:../#');
    require("../inc/functions.php");

    if(isset($_POST['acc']) && $_POST['acc'] == "directors"){
        $mySqlDirectors = "SELECT `idDir`, `nom`, `cog1`, `cog2`, `correu` FROM `directors`";
        $conexion = conectar();
        $resultDirectors = mysqli_query($conexion, $mySqlDirectors);
        desconectar($conexion);
        $rows = array();
        while($row = mysqli_fetch_array($resultDirectors)){
            $rows[] = $row;
        }
        echo json_encode($rows);
    }
    if(isset($_POST['acc']) && $_POST['acc'] == "u"){
		$sql = "UPDATE directors SET nom = '{$_POST['nom']}', cog1 = '{$_POST['cog1']}', 
		cog2 = '{$_POST['cog2']}', correu = '{$_POST['correu']}' WHERE idDir = '{$_POST['idDir']}'";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "c"){
		$sql = "INSERT INTO directors";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}
?>
