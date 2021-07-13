<?php
//   session_start();

//   if(!isset($_SESSION['login'])) header('Location: ../#');
//   require("../inc/functions.php");

include("../inc/functions.php");

if(isset($_POST['acc']) && $_POST['acc']=='r'){

	$mySql="SELECT `idcasa`,`nom`,`nombre`,`descripcio`,`descripcion`,`url` FROM `cases`";

	$mySql2="SELECT `idcasavideo`, `url`, `idcasa`, `miniatura` FROM `casesvideos`";

	
	$conexion=conectar();
	$resultcasas=mysqli_query($conexion,$mySql);
	$resultespecialidades=mysqli_query($conexion,$mySql2);

	desconectar($conexion);

	$datosExportar='{"datosCasas":';
		$rows= array();

	while ($row=mysqli_fetch_array($resultcasas)) {
			$rows[]=$row;
		}

		$datosExportar.=json_encode($rows);
		$datosExportar.=', "datosVideos":';

	$rows= array();
	
	while ($row=mysqli_fetch_array($resultespecialidades)) {
			$rows[]=$row;
		}

		$datosExportar.=json_encode($rows);
		$datosExportar.='}';
		
		echo $datosExportar;

}
?>