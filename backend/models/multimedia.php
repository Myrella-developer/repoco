<?php
	require("../../inc/functions.php");
	
	if(isset($_POST['acc']) && $_POST['acc'] == "r"){
		read();
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "u"){
		$fileNew=explode(".",$_FILES['multimedia']['name']); 
		$file=$fileNew[0].date("dmYhis").".".$fileNew[1]; 
		move_uploaded_file($_FILES['multimedia']['tmp_name'],"../../multimedia/img/projectes/".$file);
		
		if($_POST['tipo'] == "video") $tipo = 'v';
		if($_POST['tipo'] == "imatge") $tipo = 'i';
		if($_POST['tipo'] == "so") $tipo = 's';
		
		$sql = "UPDATE multimedia SET descripcio = '{$_POST['descripcio']}', descripcion = '{$_POST['descripcion']}', 
		url = '{$file}', tipo = '{$tipo}' WHERE idMult = {$_POST['idMult']}";
		
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);

		read();
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "c"){
		if($_POST['tipo'] !== "video"){
			$fileNew=explode(".",$_FILES['multimedia']['name']); 
			$file=$fileNew[0].date("dmYhis").".".$fileNew[1]; 
			move_uploaded_file($_FILES['multimedia']['tmp_name'],"../../multimedia/img/projectes/".$file);
		}else{
			$file = $_POST['enlace'];
		}
		
		if($_POST['tipo'] == "video") $tipo = 'v';
		if($_POST['tipo'] == "imatge") $tipo = 'i';
		if($_POST['tipo'] == "so") $tipo = 's';
		

		$sql = "INSERT INTO multimedia (url, descripcio, descripcion, idProjecte, tipo) 
		VALUES('{$file}', '{$_POST['descripcio']}', '{$_POST['descripcion']}', '{$_POST['idProjecte']}',
		'{$tipo}')
		";

		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);

		read();
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

		$sqlUnlink = "DELETE FROM `multimedia` WHERE idMult = {$_POST['idMult']}";

		$conexion = conectar();
		$resultUnlink = mysqli_query($conexion, $sqlUnlink);
		desconectar($conexion);

		read();
	}

	function read(){
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

?>