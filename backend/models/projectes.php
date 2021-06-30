<?php
	require("../inc/functions.php");
	
	if(isset($_POST['acc']) && $_POST['acc'] == "r"){
		$sqlEsp = "SELECT e.nom, e.nombre, e.idEsp, edicio.dataInici, edicio.dataFi, edicio.idEdicio
		FROM `especialitats` e
		INNER JOIN edicio ON edicio.idEsp = e.idEsp
		INNER JOIN cases ON cases.idcasa = '{$_POST['idcasa']}'";

		$sqlProj=
		"SELECT p.titol, p.titulo, p.descripcio, p.descripcion, p.idProjecte, p.url, e.nom, e.nombre, e.idEsp
		FROM projectes p
		INNER JOIN cases ON cases.idcasa = {$_POST['idcasa']}
		INNER JOIN especialitats e ON p.idEdicio = e.idEsp";

		$sqlMult = "SELECT m.idMult, m.url, m.tipo, m.descripcio, m.descripcion, m.idProjecte, p.titol
		FROM multimedia m
		INNER JOIN projectes p ON m.idProjecte = p.idProjecte
		INNER JOIN cases ON cases.idcasa = '{$_POST['idcasa']}'";

		$conexion = conectar();
		$resultEsp = mysqli_query($conexion, $sqlEsp);
		$resultProj = mysqli_query($conexion, $sqlProj);
		$resultMult = mysqli_query($conexion, $sqlMult);
		desconectar($conexion);

		$rows = array();
		while($row = mysqli_fetch_array($resultEsp)){
			$rows[] = $row;
		}
		$datosExportar = '{"especialitats" : ' . json_encode($rows) . ', "multimedia" : ';

		$rows = array();
		while($row = mysqli_fetch_array($resultMult)){
			$rows[] = $row;
		}
		$datosExportar .= json_encode($rows) . ', "projectes" : ';

		$rows = array();
		while($row = mysqli_fetch_array($resultProj)){
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
		
		/*
		$fileNew=explode(".",$_FILES['multimedia']['name']); 
		$file=$fileNew[0].date("dmYhis").".".$fileNew[1]; 
		move_uploaded_file($_FILES['multimedia']['tmp_name'],"../img/".$file);

		$sql = "INSERT INTO `multimedia`(`url`, `tipo`, `descripcio`, `descripcion`, `idProjecte`) 
		VALUES ('{$file}', 'i', '{$_POST['descripcioMulti']}', '{$_POST['descripcionMulti']}', 
		'{$_POST['idProjecte']}'
		)";

		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
		echo $sql;*/
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

?>