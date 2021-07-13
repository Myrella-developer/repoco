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

if(isset($_POST['acc']) && $_POST['acc']=='pro'){

	$mySql="SELECT `cases`.`idcasa`, `cases`.`nom`, `cases`.`nombre`, `cases`.`url`,`especialitats`.`nombre`,`especialitats`.`nom`,`especialitats`.`url`, `edicio`.`dataInici`,`edicio`.`dataFi`, `edicio`.`url`,`projectes`.`idProjecte`, `projectes`.`url`,`projectes`.`titol`,`projectes`.`titulo`,`projectes`.`descripcio`,`projectes`.`descripcion` FROM `especialitats` 
		LEFT JOIN `cases` ON `cases`.`idcasa`=`especialitats`.`idcasa` 
		LEFT JOIN `edicio` ON `edicio`.`idEsp` = `especialitats`.`idEsp` 
		LEFT JOIN `projectes` ON `projectes`.`idEdicio` = `edicio`.`idEdicio` WHERE `projectes`.`idProjecte`='{$_POST['idProjecte']}'";


	$conexion=conectar();
	$projecte=mysqli_query($conexion,$mySql);
	desconectar($conexion);

	$row=mysqli_fetch_row($projecte); 
	echo json_encode($row);

}

if(isset($_POST['acc']) && $_POST['acc']=='galeria'){

	$mysql="SELECT `url`,`tipo`,`descripcio`,`descripcion` FROM `multimedia` WHERE `idProjecte`='{$_POST['idProjecte']}'";
	$mysql2="SELECT `esp_proj`.`idEdicio`,`esp_proj`.`idProjecte`,`especialitats`.`nombre`,`especialitats`.`nom` FROM `esp_proj`
		LEFT JOIN `edicio` ON `edicio`.`idEdicio` = `esp_proj`.`idEdicio`
		LEFT JOIN `especialitats` ON `especialitats`.`idEsp`=`edicio`.`idEsp`
		WHERE `esp_proj`.`idProjecte`='{$_POST['idProjecte']}'";

	$conexion=conectar();
	$galeria=mysqli_query($conexion,$mysql);
	$participants=mysqli_query($conexion,$mysql2);
	desconectar($conexion);
	
	$datosExportar='{"galeria":';
		$rows= array();

		while ($row= mysqli_fetch_array($galeria)) {
		$rows[]=$row;

			}
		$datosExportar.=json_encode($rows);
		$datosExportar.=', "participants":';

		$rows= array();

		while ($row= mysqli_fetch_array($participants)) {
		$rows[]=$row;

			}
			$datosExportar.=json_encode($rows);
			$datosExportar.='}';
	
	echo $datosExportar;
	
	}

?>

