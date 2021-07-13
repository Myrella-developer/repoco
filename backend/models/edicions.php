<?php
	require("../../inc/functions.php");

    if(isset($_POST['acc']) && $_POST['acc'] == "r"){
        $sqlEdicions = "SELECT `idEdicio`, `idEsp`, DATE_FORMAT(`dataInici`,'%d/%m/%Y') AS dataInici, DATE_FORMAT(`dataFi`,'%d/%m/%Y') AS dataFi,
		`url`
		FROM edicio WHERE idEsp = {$_POST['idEsp']} 
		ORDER BY dataInici";
	
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
		$fileNew=explode(".",$_FILES['imgEdicio']['name']); 
		$file=$fileNew[0].date("dmYhis").".".$fileNew[1]; 
		move_uploaded_file($_FILES['imgEdicio']['tmp_name'],"../../multimedia/img/edicions/".$file); 

		$sql = "UPDATE edicio SET dataInici = '{$_POST['dataInici']}', datafi = '{$_POST['dataFi']}', 
		url = '{$file}' WHERE idEdicio = '{$_POST['idEdicio']}'";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
		echo $sql;
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "c"){
		$fileNew=explode(".",$_FILES['imgEdicio']['name']); 
		$file=$fileNew[0].date("dmYhis").".".$fileNew[1]; 
		move_uploaded_file($_FILES['imgEdicio']['tmp_name'],"../../multimedia/img/edicions/".$file); 

		$sql = "INSERT INTO edicio(idEsp, dataInici, dataFi, url) 
		VALUES('{$_POST['idEsp']}', '{$_POST['dataInici']}', '{$_POST['dataFi']}', '{$file}')";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "d"){
		$sqlSelect = "SELECT url FROM `edicio` WHERE idEdicio = {$_POST['idEdicio']}";

		$conexion = conectar();
		$resultSelect = mysqli_query($conexion, $sqlSelect);
		desconectar($conexion);

		$rows = array();
		while($row = mysqli_fetch_array($resultSelect)){
			$rows[] = $row;
			unlink('../../multimedia/img/edicions/'.$row['url']);
		}
		echo json_encode($rows);

		$sqlUnlink = "DELETE FROM `edicio` WHERE idEdicio = {$_POST['idEdicio']}";

		$conexion = conectar();
		$resultUnlink = mysqli_query($conexion, $sqlUnlink);
		desconectar($conexion);
	}
?>