<?php
	require("../inc/functions.php");
	
	if(isset($_POST['acc']) && $_POST['acc'] == "r"){
		$sql = "SELECT m.idMult, m.url, m.tipo, m.descripcio, m.idProjecte, p.titol
        FROM multimedia m
        INNER JOIN projectes p ON m.idProjecte = p.idProjecte
        INNER JOIN cases ON cases.idcasa = '{$_POST['idcasa']}'";

		$sqlProj="SELECT p.titol, p.titulo, p.descripcio, p.descripcion, p.idProjecte
		FROM projectes p
		INNER JOIN cases ON cases.idcasa = {$_POST['idcasa']}";

		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		$resultProj = mysqli_query($conexion, $sqlProj);
		desconectar($conexion);

		$rows = array();
		while($row = mysqli_fetch_array($result)){
			$rows[] = $row;
		}
		$datosExportar = '{"multimedia" : ' . json_encode($rows) . ', "projectes" : ';

		$rows = array();
		while($row = mysqli_fetch_array($resultProj)){
			$rows[] = $row;
		}
		$datosExportar .= json_encode($rows) . '}';

		echo $datosExportar;
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "r"){
		$foto = $_POST['nuevaFoto'];
		$porciones = explode(".", $foto);

		$sql = "INSERT INTO `multimedia`(`url`, `tipo`, `descripcio`, `descripcion`, `idProjecte`) 
		VALUES ('{$_POST['nuevaFoto']}', , '{$_POST['novaDescripcio']}', '{$_POST['novaDescripcion']}', '{$_POST['idProjecte']}')";

		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
		echo $sql;
	}
?>