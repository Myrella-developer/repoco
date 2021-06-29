<?php
	require("../inc/functions.php");

    if(isset($_POST['acc']) && $_POST['acc'] == "r"){
        $sqlEdicions = "SELECT edicio.dataInici, edicio.url, edicio.dataFi, edicio.idEdicio, cases.idcasa, especialitats.nom, especialitats.idEsp, especialitats.nom
        FROM edicio 
        INNER JOIN cases ON cases.idcasa = '{$_POST['idcasa']}'
        INNER JOIN especialitats ON edicio.idEsp = especialitats.idEsp
		ORDER BY especialitats.nom DESC,
		edicio.dataInici ";
        
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
        $nuevoNombre = $_POST['imgEdicio'] . date("Y-m-d_His");
        move_uploaded_file($nuevoNombre, "../img/" . $nuevoNombre);

		$sql = "UPDATE edicio SET dataInici = '{$_POST['dataInici']}', datafi = '{$_POST['dataFi']}', 
		idEsp = (SELECT idEsp FROM especialitats WHERE especialitats.nom = 'Disseny de pàgines web'), url = '{$nuevoNombre}' WHERE idEdicio = '{$_POST['idEdicio']}'";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "c"){
		$sql = "INSERT INTO edicio(idEdicio, idEsp, dataInici, dataFi, url) 
		VALUES(NULL, '{$_POST['selEsp']}', '{$_POST['dataInici']}', '{$_POST['dataFi']}', '{$_POST['imgEdicio']}')";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
		echo $sql;
	}

	if(isset($_POST['acc']) && $_POST['acc'] == "d"){
		$sql1 = "SELECT idProjecte FROM projectes WHERE idEdicio = '{$_POST['idEdicio']}';";
		$conexion = conectar();
		$result1 = mysqli_query($conexion, $sql1);
		desconectar($conexion);

		$rows = array();
		while($row = mysqli_fetch_array($result1)){
			$rows[] = $row;
			$sqlUnlink = "SELECT url FROM multimedia WHERE idProjecte = {$row['idProjecte']};";
			
			$conexion = conectar();
			$resultUnlink = mysqli_query($conexion, $sqlUnlink);
			desconectar($conexion);

			$rows2 = array();
			while($row2 = mysqli_fetch_array($resultUnlink)){
				$rows2[] = $row2;
				unlink('../../multimedia/img/ediciones/'.$row2['url']);
				$sql2 = "DELETE FROM multimedia WHERE idProjecte = {$row['idProjecte']};";
				$conexion = conectar();
				$result2 = mysqli_query($conexion, $sql2);
				desconectar($conexion);
			}
		}
		$sql3 = "DELETE FROM `projectes` WHERE idEdicio = '{$_POST['idEdicio']}';";
		$sql4 = "DELETE FROM `edicio` WHERE idEdicio = '{$_POST['idEdicio']}';";
		
		$conexion = conectar();
		$result3 = mysqli_query($conexion, $sql3);
		$result4 = mysqli_query($conexion, $sql4);
		desconectar($conexion);
	}
?>