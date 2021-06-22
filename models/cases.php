<?php
include("../inc/functions.php");
if(isset($_POST['acc']) && $_POST['acc']=='r'){

	$mySql="SELECT `idcasa`,`nom`,`nombre`,`descripcio`,`descripcion`,`url` FROM `cases` WHERE `idcasa`='{$_POST['idcasa']}'";

	$mySql2="SELECT `idEsp`,`nombre`,`nom`,`descripcio`,`descripcion`,`url` FROM `especialitats` WHERE `idcasa`='{$_POST['idcasa']}'";

	$conexion=conectar();
	$result=mysqli_query($conexion,$mySql);
	$result2=mysqli_query($conexion,$mySql2);
	desconectar($conexion);

	$datosExportar='{"casa":';

	$row=mysqli_fetch_row($result); 

	$datosExportar.=json_encode($row);
	$datosExportar.=', "especialitats":';

	$rows= array();
	while ($row=mysqli_fetch_array($result2)) {
			$rows[]=$row;
		}

		$datosExportar.=json_encode($rows);
		$datosExportar.='}';

		echo $datosExportar;


}
?>