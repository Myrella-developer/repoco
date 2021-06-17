<?php
include("../inc/functions.php");
if(isset($_POST['acc']) && $_POST['acc']=='r'){

	$mySql="SELECT `idcasa`,`nom`,`nombre`,`descripcio`,`descripcion` FROM `cases`";
	// `url` hay que poner en la base de datos del server 
	$conexion=conectar();
	$result=mysqli_query($conexion,$mySql);
	desconectar($conexion);

	$rows= array();
	while ($row=mysqli_fetch_array($result)) {
		$rows[]=$row;
	}
	echo json_encode($rows);

}
?>