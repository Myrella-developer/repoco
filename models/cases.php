<?php
include("../inc/functions.php");
if(isset($_POST['acc']) && $_POST['acc']=='r'){

	$mySql="SELECT `idcasa`,`nom`,`nombre`,`descripcio`,`descripcion`,`url` FROM `cases` WHERE `idcasa`='{$_POST['idcasa']}'";
	$conexion=conectar();
	$result=mysqli_query($conexion,$mySql);
	desconectar($conexion);

	$row=mysqli_fetch_row($result);
	echo json_encode($row);

}
?>