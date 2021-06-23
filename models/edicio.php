<?php
include("../inc/functions.php");
if(isset($_POST['acc']) && $_POST['acc']=='r'){

	$mySql="SELECT `idEdicio`,`idEsp`,`dataInici`,`dataFi`,`url` FROM `edicio` WHERE `idEsp`='{$_POST['idEsp']}'";
	$conexion=conectar();
	$result=mysqli_query($conexion,$mySql);
	desconectar($conexion);

	$cantRegistros=mySqli_num_rows($result);

	if ($cantRegistros!=1) {
			$rows= array();

			while ($row=mysqli_fetch_array($result)) {
				$rows[]=$row;
			}

		echo json_encode($rows);
			
		}
		else{
			$row=mysqli_fetch_row($result);

			echo json_encode($row);
		}

}

?>