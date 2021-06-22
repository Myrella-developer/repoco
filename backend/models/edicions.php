<?php
	require("../inc/functions.php");

    if(isset($_POST['acc']) && $_POST['acc'] == "r"){
        $sqlEdicions = "SELECT edicio.dataInici, edicio.dataFi, edicio.idEdicio, cases.idcasa, especialitats.nom
        FROM edicio 
        INNER JOIN cases ON cases.idcasa = '{$_POST['idcasa']}'
        INNER JOIN especialitats ON edicio.idEsp = especialitats.idEsp";
        
        $sqlEsp = "SELECT nom, nombre, idEsp FROM `especialitats` WHERE idcasa = '{$_POST['idcasa']}'";
        
        $conexion = conectar();
        $resultEsp = mysqli_query($conexion, $sqlEsp);
        $resultEdicions = mysqli_query($conexion, $sqlEdicions);
        desconectar($conexion);

        $rows = array();
		while($row = mysqli_fetch_array($resultEsp)){
			$rows[] = $row;
		}
		$datosExportar = '{"especialitats" : ' . json_encode($rows) . ', "edicions" : ';

		$rows = array();
		while($row = mysqli_fetch_array($resultEdicions)){
			$rows[] = $row;
		}
		$datosExportar .= json_encode($rows) . '}';

		echo $datosExportar;
    }

    if(isset($_POST['acc']) && $_POST['acc'] == "u"){
		$sql = "UPDATE edicio SET dataInici = '{$_POST['dataInici']}', datafi = '{$_POST['dataFi']}', 
		idEsp = '{$_POST['selEsp']}' WHERE idEdicio = '{$_POST['idEdicio']}'";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "c"){
		$sql = "INSERT INTO edicio(idEdicio, idEsp, dataInici, dataFi, url) 
		VALUES(NULL, '{$_POST['selEspAdd']}', '{$_POST['dataInici']}', '{$_POST['dataFi']}', NULL)";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}
?>