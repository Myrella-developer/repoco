<?php
include("../inc/functions.php");

if(isset($_POST['acc']) && $_POST['acc']=='r'){

	$mySql="SELECT `especialitats`.`nombre`,`especialitats`.`nom`,`especialitats`.`descripcio`,`especialitats`.`descripcion`,`especialitats`.`url`, `edicio`.`idEdicio`, `projectes`.`idProjecte`, `projectes`.`url`,`projectes`.`titol`,`projectes`.`titulo`,`projectes`.`descripcio`,`projectes`.`descripcion` FROM `especialitats` 
		LEFT JOIN `edicio` ON `edicio`.`idEsp` = `especialitats`.`idEsp` 
		LEFT JOIN `projectes` ON `projectes`.`idEdicio` = `edicio`.`idEdicio` 
		WHERE `edicio`.`idEdicio`='{$_POST['idEdicio']}'";


	$conexion=conectar();
	$projectes=mysqli_query($conexion,$mySql);
	desconectar($conexion);

	$rows= array();

	while ($row= mysqli_fetch_array($projectes)) {
		$rows[]=$row;

	}

echo json_encode($rows);


}

?>

