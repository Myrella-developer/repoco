<?php
	require("../../inc/functions.php");
	
	if(isset($_POST['acc']) && $_POST['acc'] == "r"){
		$sqlProj=
		"SELECT p.titol, p.titulo, p.descripcio, p.descripcion, p.idProjecte, p.url
		FROM projectes p
		WHERE p.idEdicio = '{$_POST['idEdicio']}'
		";
		
		$sqlEsp = "SELECT esp_proj.idEdicio, edicio.idEsp, especialitats.nom
		FROM esp_proj
		INNER JOIN edicio 
		ON edicio.idEdicio = esp_proj.idEdicio
		INNER JOIN especialitats
		ON edicio.idEsp = especialitats.idEsp
		WHERE esp_proj.idProjecte != 14 
		ORDER BY esp_proj.idEdicio";

		$sqlEsp2 = "SELECT esp_proj.idEdicio, edicio.idEsp, especialitats.nom
		FROM esp_proj
		INNER JOIN edicio 
		ON edicio.idEdicio = esp_proj.idEdicio
		INNER JOIN especialitats
		ON edicio.idEsp = especialitats.idEsp
		WHERE esp_proj.idProjecte = 14";

		$conexion = conectar();
		$resultProj = mysqli_query($conexion, $sqlProj);
		$resultEsp = mysqli_query($conexion, $sqlEsp);
		$resultEsp2 = mysqli_query($conexion, $sqlEsp2);
		desconectar($conexion);

		$rows = array();
		while($row = mysqli_fetch_array($resultProj)){
			$rows[] = $row;
		}

		$datosExportar = '{"projectes" : ' . json_encode($rows) . ', "especialitats" : ';

		$rows = array();
		while($row = mysqli_fetch_array($resultEsp)){
			$rows[] = $row;
		}
		
        $datosExportar .= json_encode($rows) . ', "edicionsExistents" : ';

		$rows = array();
		while($row = mysqli_fetch_array($resultEsp2)){
			$rows[] = $row;
		}
		$datosExportar .= json_encode($rows) . '}';
        echo $datosExportar;
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "u"){
		$edicio = $_POST['edicio'];
		$edicioExplode = explode("*", $edicio);

		$fileNew=explode(".",$_FILES['multimedia']['name']); 
		$file=$fileNew[0].date("dmYhis").".".$fileNew[1]; 
		move_uploaded_file($_FILES['multimedia']['tmp_name'],"../img/".$file);
		
		$sql = "UPDATE projectes SET titol = '{$_POST['titol']}', titulo = '{$_POST['titulo']}', 
		descripcio = '{$_POST['descripcio']}', descripcion = '{$_POST['descripcion']}', url = '{$file}',
		idEdicio = (SELECT edicio.idEdicio FROM edicio INNER JOIN especialitats 
		ON especialitats.idEsp = edicio.idEsp 
		WHERE especialitats.nom = '{$edicioExplode[0]}' AND edicio.dataInici = '{$edicioExplode[1]}')
		WHERE idProjecte = '{$_POST['idProjecte']}'";
		
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
		echo $sql;
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "c"){
		$edicio = $_POST['edicio'];
		$edicioExplode = explode("*", $edicio);
		
		$fileNew=explode(".",$_FILES['multimedia']['name']); 
		$file=$fileNew[0].date("dmYhis").".".$fileNew[1]; 
		move_uploaded_file($_FILES['multimedia']['tmp_name'],"../img/".$file);

		$sql = "INSERT INTO projectes (url, titol, titulo, descripcio, descripcion, idEdicio) 
		VALUES('{$file}', '{$_POST['titol']}', '{$_POST['titulo']}', '{$_POST['descripcio']}', '{$_POST['descripcion']}', 
		(SELECT edicio.idEdicio FROM edicio INNER JOIN especialitats 
		ON especialitats.idEsp = edicio.idEsp 
		WHERE especialitats.nom = '{$edicioExplode[0]}' AND edicio.dataInici = '{$edicioExplode[1]}')
		)";

		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "d"){
		$sqlUnlink = "SELECT url FROM multimedia WHERE idProjecte = {$row['idProjecte']};";

		$conexion = conectar();
		$resultUnlink = mysqli_query($conexion, $sqlUnlink);
		desconectar($conexion);

		$rows = array();
		while($row = mysqli_fetch_array($resultUnlink)){
			$rows[] = $row;

			unlink('../img/'.$row['url']);
		}

		$sql = "DELETE FROM `multimedia` WHERE idProjecte = '{$_POST['idProjecte']}'";
		$sql2 = "DELETE FROM `projectes` WHERE idProjecte = '{$_POST['idProjecte']}'";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		$result2 = mysqli_query($conexion, $sql2);
		desconectar($conexion);
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "addEdicio"){
		$sql = "INSERT INTO `esp_proj`(`idProjecte`, `idEdicio`) 
		VALUES ({$_POST['idProjecte']} , {$_POST['idEdicio']} )";

		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "deleteEdicio"){
		$sql = "DELETE FROM `esp_proj` 
		WHERE idProjecte = {$_POST['idProjecte']} 
		AND idEdicio = {$_POST['idEdicio']} ";

		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}

?>