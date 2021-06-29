<?php
    session_start();
    // if(!isset($_SESSION['login'])) header ('Location:../#');
    require("../inc/functions.php");

    if(isset($_POST['acc']) && $_POST['acc'] == "r"){
        actualiza();
    }
    if(isset($_POST['acc']) && $_POST['acc'] == "u"){
		$sql = "UPDATE directors SET `nom` = '{$_POST['nom']}', `cog1` = '{$_POST['cog1']}', 
		`cog2` = '{$_POST['cog2']}', `correu` = '{$_POST['correu']}' WHERE `idDir` = '{$_POST['idDir']}'";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
        actualiza();
        
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "c"){
        echo $_POST['idDir'];
		$sql = "INSERT INTO directors (`nom`, `cog1`, `cog2`, `correu`,`tipus`,`actiu`,`contrasenya`) VALUES ('{$_POST['nom']}','{$_POST['cog1']}','{$_POST['cog2']}','{$_POST['correu']}','d','s','".sha1(md5($_POST['pass']))."')";
        $conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
        actualiza();
	}
    if(isset($_POST['acc']) && $_POST['acc'] == "d"){
		$sql = "DELETE FROM `directors` WHERE idDir = '{$_POST['idDir']}'";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
        actualiza();
	}
    function actualiza(){
        $mySqlDirectors = "SELECT `idDir`, `nom`, `cog1`, `cog2`, `correu`,`tipus`,`actiu`,`contrasenya` FROM `directors`";
        $conexion = conectar();
        $resultDirectors = mysqli_query($conexion, $mySqlDirectors);
        desconectar($conexion);
        $rows = array();
        while($row = mysqli_fetch_array($resultDirectors)){
            $rows[] = $row;
        }
        echo json_encode($rows);
    }
?>
