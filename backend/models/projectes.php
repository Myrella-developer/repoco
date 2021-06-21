<?php
	require("../inc/functions.php");
	
	if(isset($_POST['acc']) && $_POST['acc'] == "r"){
		$sql="SELECT p.titol, p.titulo, p.descripcio, p.descripcion
		FROM projectes p
		INNER JOIN cases ON cases.idcasa = '{$_POST['idcasa']}'";
		$conexion=conectar();
		
		$resultPro=mysqli_query($conexion, $sql);
		desconectar($conexion);
		
		if ((mysqli_num_rows($resultPro)) !==0){
			$rows = array();
			while($row = mysqli_fetch_array($resultPro)){
				$rows[] = $row;
			}
			echo json_encode($rows);
		}else{
			echo false;
		}
	}
?>