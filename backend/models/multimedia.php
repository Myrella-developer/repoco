<?php
	require("../inc/functions.php");
	
	if(isset($_POST['acc']) && $_POST['acc'] == "r"){
		$sql = "SELECT m.idMult, m.url, m.tipo, m.descripcio, m.idProjecte, p.titol
        FROM multimedia m
        INNER JOIN projectes p ON m.idProjecte = p.idProjecte
         INNER JOIN cases ON cases.idcasa = '{$_POST['idcasa']}'";

		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);

		$rows = array();
		while($row = mysqli_fetch_array($result)){
			$rows[] = $row;
		}

		echo json_encode($rows);
	}