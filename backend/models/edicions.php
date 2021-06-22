<?php
	require("../inc/functions.php");

    if(isset($_POST['acc']) && $_POST['acc'] == "r"){
        $sqlEdicions = "SELECT edicio.dataInici, edicio.dataFi, cases.idcasa, especialitats.nom
        FROM edicio 
        INNER JOIN cases ON cases.idcasa = '{$_POST['idcasa']}'
        INNER JOIN especialitats ON edicio.idEsp = especialitats.idEsp";

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
		$sql = "UPDATE";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "c"){
		$sql = "INSERT";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}
?>