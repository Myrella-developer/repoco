<?php
	require("../../inc/functions.php");

    if(isset($_POST['acc']) && $_POST['acc'] == "r"){
        $sqlEdicions = "SELECT `idEdicio`, `idEsp`, `dataInici`, `dataFi`, `url`
		FROM edicio WHERE idEsp = {$_POST['idEsp']}";
        
        $conexion = conectar();
        $resultEdicions = mysqli_query($conexion, $sqlEdicions);
        desconectar($conexion);
		
        $rows = array();
		while($row = mysqli_fetch_array($resultEdicions)){
			$rows[] = $row;
		}
		echo json_encode($rows);
    }

    if(isset($_POST['acc']) && $_POST['acc'] == "u"){
		$fileNew=explode(".",$_FILES['imgEdicio']['name']); 
		$file=$fileNew[0].date("dmYhis").".".$fileNew[1]; 
		move_uploaded_file($_FILES['imgEdicio']['tmp_name'],"../img/".$file); 

		$sql = "UPDATE edicio SET dataInici = '{$_POST['dataInici']}', datafi = '{$_POST['dataFi']}', 
		url = '{$file}' WHERE idEdicio = '{$_POST['idEdicio']}'";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "c"){
		$fileNew=explode(".",$_FILES['imgEdicio']['name']); 
		$file=$fileNew[0].date("dmYhis").".".$fileNew[1]; 
		move_uploaded_file($_FILES['imgEdicio']['tmp_name'],"../img/".$file); 

		$sql = "INSERT INTO edicio(idEsp, dataInici, dataFi, url) 
		VALUES('{$_POST['idEsp']}', '{$_POST['dataInici']}', '{$_POST['dataFi']}', '{$file}')";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "d"){
		$sql1 = "SELECT idProjecte FROM projectes WHERE idEdicio = '{$_POST['idEdicio']}';";
		$conexion = conectar();
		$result1 = mysqli_query($conexion, $sql1);
		desconectar($conexion);

		$rows = array();
		while($row = mysqli_fetch_array($result1)){
			$rows[] = $row;
			$sqlUnlink = "SELECT url FROM multimedia WHERE idProjecte = {$row['idProjecte']};";
			
			$conexion = conectar();
			$resultUnlink = mysqli_query($conexion, $sqlUnlink);
			desconectar($conexion);

			$rows2 = array();
			while($row2 = mysqli_fetch_array($resultUnlink)){
				$rows2[] = $row2;
				unlink('../../multimedia/img/ediciones/'.$row2['url']);
				$sql2 = "DELETE FROM multimedia WHERE idProjecte = {$row['idProjecte']};";
				$conexion = conectar();
				$result2 = mysqli_query($conexion, $sql2);
				desconectar($conexion);
			}
		}
		$sql3 = "DELETE FROM `projectes` WHERE idEdicio = '{$_POST['idEdicio']}';";
		$sql4 = "DELETE FROM `edicio` WHERE idEdicio = '{$_POST['idEdicio']}';";
		
		$conexion = conectar();
		$result3 = mysqli_query($conexion, $sql3);
		$result4 = mysqli_query($conexion, $sql4);
		desconectar($conexion);
	}
?>