<?php
	require("../../inc/functions.php");
	
	if(isset($_POST['acc']) && $_POST['acc'] == "r"){
		read();
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "u"){
		if(isset($_FILES['multimediaCambio'])){
			$fileNew=explode(".",$_FILES['multimediaCambio']['name']); 
			$file=$fileNew[0].date("dmYhis").".".$fileNew[1]; 
			move_uploaded_file($_FILES['multimediaCambio']['tmp_name'],"../../multimedia/img/projectes/".$file);
		}	
		if(isset($_POST['multimedia'])){
			$file = $_POST['multimedia'];
		}	
		
		$sql = "UPDATE projectes SET titol = '{$_POST['titol']}', titulo = '{$_POST['titulo']}', 
		descripcio = '{$_POST['descripcio']}', descripcion = '{$_POST['descripcion']}', 
		url = '{$file}',
		idEdicio = {$_POST['idEdicio']} 
		WHERE idProjecte = {$_POST['idProjecte']}";
		
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	
		read();
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "c"){
		$fileNew=explode(".",$_FILES['multimedia']['name']); 
		$file=$fileNew[0].date("dmYhis").".".$fileNew[1]; 
		move_uploaded_file($_FILES['multimedia']['tmp_name'],"../../multimedia/img/projectes/".$file);

		$sql = "INSERT INTO projectes (url, titol, titulo, descripcio, descripcion, idEdicio) 
		VALUES('{$file}', '{$_POST['titol']}', '{$_POST['titulo']}', '{$_POST['descripcio']}', 
		'{$_POST['descripcion']}', '{$_POST['idEdicio']}')";

		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);

		read();
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "d"){
		$sqlUnlink = "SELECT url FROM projectes WHERE idProjecte = {$_POST['idProjecte']};";

		$conexion = conectar();
		$resultUnlink = mysqli_query($conexion, $sqlUnlink);
		desconectar($conexion);

		$rows = array();
		while($row = mysqli_fetch_array($resultUnlink)){
			$rows[] = $row;

			unlink('../../multimedia/img/projectes/'.$row['url']);
		}

		$sql = "DELETE FROM `projectes` WHERE idProjecte = '{$_POST['idProjecte']}'";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
		
		read();
	}

	function read(){
		$sqlProj=
		"SELECT p.titol, p.titulo, p.descripcio, p.descripcion, p.idProjecte, p.url
		FROM projectes p
		WHERE p.idEdicio = '{$_POST['idEdicio']}'
		";

		$conexion = conectar();
		$resultProj = mysqli_query($conexion, $sqlProj);
		desconectar($conexion);

		$rows = array();
		while($row = mysqli_fetch_array($resultProj)){
			$rows[] = $row;
		}

		echo json_encode($rows);
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "updateEdicio"){
		updateEdicio();
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "addEdicio"){
		$sql = "INSERT INTO `esp_proj`(`idProjecte`, `idEdicio`) 
		VALUES ({$_POST['idProjecte']} , {$_POST['idEdicio']} )";

		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
		updateEdicio();
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "deleteEdicio"){
		$sql = "DELETE FROM `esp_proj` 
		WHERE idProjecte = {$_POST['idProjecte']} 
		AND idEdicio = {$_POST['idEdicio']} ";

		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
		updateEdicio();
	}

	function updateEdicio(){
		$sqlSelect = "SELECT `especialitats`.`nom`,`especialitats`.`nombre`, `edicio`.`idEdicio`
		FROM `especialitats`
		LEFT JOIN `edicio` ON `edicio`.`idEsp` = `especialitats`.`idEsp`
		WHERE `edicio`.`dataInici`='{$_POST['dataIniciEdicio']}'
		AND `edicio`.`idEdicio` NOT IN (SELECT `idEdicio` FROM `esp_proj` WHERE `idProjecte`= {$_POST['idProjecte']})";

		$sqlExistents = "SELECT esp_proj.idEdicio, edicio.idEsp, especialitats.nom
		FROM esp_proj
		INNER JOIN edicio 
		ON edicio.idEdicio = esp_proj.idEdicio
		INNER JOIN especialitats
		ON edicio.idEsp = especialitats.idEsp
		WHERE esp_proj.idProjecte = {$_POST['idProjecte']} ";

		$conexion = conectar();
		
		$resultSelect = mysqli_query($conexion, $sqlSelect);
		$resultExistents = mysqli_query($conexion, $sqlExistents);
		desconectar($conexion);

		$rows = array();
		while($row = mysqli_fetch_array($resultSelect)){
			$rows[] = $row;
		}

		$datosExportar = '{"edicionsInexistents" : ' . json_encode($rows);

		$rows = array();
		while($row = mysqli_fetch_array($resultExistents)){
			$rows[] = $row;
		}
		$datosExportar .=', "edicionsExistents" : ' . json_encode($rows) . '}';
		echo $datosExportar;
	}
?>