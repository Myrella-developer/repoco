<?php
	require("../../inc/functions.php");
	
	if(isset($_POST['acc']) && $_POST['acc'] == "r"){
		$sqlMult = "SELECT m.idMult, m.url, m.tipo, m.descripcio, m.descripcion, m.idProjecte
		FROM multimedia m WHERE m.idProjecte = {$_POST['idProjecte']}";

		$conexion = conectar();
		$resultMult = mysqli_query($conexion, $sqlMult);
		desconectar($conexion);

		$rows = array();
		while($row = mysqli_fetch_array($resultMult)){
			$rows[] = $row;
		}
		echo json_encode($rows);
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "u"){
		$fileNew=explode(".",$_FILES['multimedia']['name']); 
		$file=$fileNew[0].date("dmYhis").".".$fileNew[1]; 
		move_uploaded_file($_FILES['multimedia']['tmp_name'],"../../multimedia/img/projectes/".$file);
		
		$sql = "UPDATE multimedia SET descripcio = '{$_POST['descripcio']}', descripcion = '{$_POST['descripcion']}', 
		url = '{$file}' WHERE idMult = {$_POST['idMult']}";
		
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
		echo $sql;
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "c"){
		$fileNew=explode(".",$_FILES['multimedia']['name']); 
		$file=$fileNew[0].date("dmYhis").".".$fileNew[1]; 
		move_uploaded_file($_FILES['multimedia']['tmp_name'],"../../multimedia/img/projectes/".$file);

		$sql = "INSERT INTO multimedia (url, descripcio, descripcion, idProjecte) 
		VALUES('{$file}', '{$_POST['descripcio']}', '{$_POST['descripcion']}', '{$_POST['idProjecte']}')
		";

		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "d"){
		$sqlSelect = "SELECT url FROM `multimedia` WHERE idMult = {$_POST['idMult']}";

		$conexion = conectar();
		$resultSelect = mysqli_query($conexion, $sqlSelect);
		desconectar($conexion);

		$rows = array();
		while($row = mysqli_fetch_array($resultSelect)){
			$rows[] = $row;
			unlink('../../multimedia/img/projectes/'.$row['url']);
		}
		echo json_encode($rows);

		$sqlUnlink = "DELETE FROM `multimedia` WHERE idMult = {$_POST['idMult']}";

		$conexion = conectar();
		$resultUnlink = mysqli_query($conexion, $sqlUnlink);
		desconectar($conexion);
	}

?>