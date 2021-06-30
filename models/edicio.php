<?php
include("../inc/functions.php");

if(isset($_POST['acc']) && $_POST['acc']=='r'){

	// $datosExportar='{"anys":
	// 					[{"anyEdicio":"2021","especialitats":
	// 										[{"nombre":"esp1","idEsp":"1"},
	// 										{"nombre":"esp2","idEsp":"2"}]},
	// 					{"anyEdicio":"2020","especialitats":
	// 										[{"nombre":"esp3","idEsp":"3"},
	// 										{"nombre":"esp4","idEsp":"4"}]}]}';
	$mySql="SELECT DISTINCT `ed`.`dataInici`, `ed`.`dataFi` FROM `edicio` AS `ed` LEFT JOIN `especialitats` AS `es` ON `ed`.`idEsp`=`es`.`idEsp` WHERE `es`.`idcasa`='{$_POST['idcasa']}' ORDER BY `dataInici` DESC";
	

	$conexion=conectar();
	$anys=mysqli_query($conexion,$mySql);
	
	desconectar($conexion);

	$datosExportar='{"anysEdicio":';

	$rows= array();

	while ($row= mysqli_fetch_array($anys)) {

		$inici=$row['dataInici'];
		$fi=$row['dataFi'];

		$mySql2="SELECT `es`.`idEsp`,`es`.`nombre`,`es`.`nom`,`ed`.`idEdicio` FROM `especialitats` AS `es` LEFT JOIN `edicio` AS `ed` ON `es`.`idEsp`=`ed`.`idEsp` WHERE `ed`.`dataInici`= '{$row['dataInici']}' AND `es`.`idcasa`='{$_POST['idcasa']}'";

		$conexion=conectar();
		$especialitats=mysqli_query($conexion,$mySql2);
		desconectar($conexion);

		$rows2=array();

		while ($rowEspecialitats=mysqli_fetch_array($especialitats)) {

			$idEsp=$rowEspecialitats['idEsp'];
			$nombre=$rowEspecialitats['nombre'];
			$nom=$rowEspecialitats['nom'];
			$idEdicio=$rowEspecialitats['idEdicio'];

			$rows2[]= array('idEsp'=>$idEsp, 'nombre'=>$nombre, 'nom'=>$nom, 'idEdicio'=>$idEdicio);
		}

		$rows[]=array('inici'=>$inici, 'fi'=>$fi, 'especialitats'=>$rows2);
	}

	$datosExportar.=json_encode($rows);
	$datosExportar.='}';

	echo $datosExportar;

}


if(isset($_POST['acc']) && $_POST['acc']=='anyEsp'){

$mySql2="SELECT `es`.`idEsp`,`es`.`nombre`,`es`.`nom`,`ed`.`idEdicio` FROM `especialitats` AS `es` LEFT JOIN `edicio` AS `ed` ON `es`.`idEsp`=`ed`.`idEsp` WHERE `ed`.`dataInici`= '{$_POST['any']}' AND `es`.`idcasa`='{$_POST['idCasa']}'";

		$conexion=conectar();
		$especialitats=mysqli_query($conexion,$mySql2);
		desconectar($conexion);

$rows= array();

	while ($row= mysqli_fetch_array($especialitats)) {
		$rows[]=$row;

}

echo json_encode($rows);




}

?>