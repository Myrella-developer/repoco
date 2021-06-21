<?php
	require("../inc/functions.php");
	
	if(isset($_POST['acc']) && $_POST['acc'] == "r"){
		$sqlEsp = "SELECT nom, nombre FROM `especialitats` WHERE idcasa = '{$_POST['idcasa']}'";

		$sqlProj="SELECT p.titol, p.titulo, p.descripcio, p.descripcion, p.idProjecte
		FROM projectes p
		INNER JOIN cases ON cases.idcasa = '{$_POST['idcasa']}'";

		$conexion = conectar();
		$resultEsp = mysqli_query($conexion, $sqlEsp);
		$resultProj = mysqli_query($conexion, $sqlProj);
		desconectar($conexion);

		$rows = array();
		while($row = mysqli_fetch_array($resultEsp)){
			$rows[] = $row;
		}
		$datosExportar = '{"especialitats" : ' . json_encode($rows) . ', "projectes" : ';

		$rows = array();
		while($row = mysqli_fetch_array($resultProj)){
			$rows[] = $row;
		}
		$datosExportar .= json_encode($rows) . '}';

		echo $datosExportar;
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "u"){
		$sql = "UPDATE projectes SET titol = '{$_POST['titol']}', titulo = '{$_POST['titulo']}', 
		descripcio = '{$_POST['descripcio']}', descripcion = '{$_POST['descripcion']}' WHERE idProjecte = '{$_POST['idProjecte']}'";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "c"){
		$sql = "INSERT INTO projectes";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}
?>