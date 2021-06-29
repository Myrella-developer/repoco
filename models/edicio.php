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

	$datosExportar='{"anys":
						[';

	$i=0;
	while ($row=mysqli_fetch_array($anys)) {
		if ($i!=0) {
			$datosExportar.=',';
			};
		$datosExportar.='{"anyEdicio":"'.$row['dataInici'].'/'.$row['dataFi'].'",

						  "especialitats":
						  [';

						$mySql2="SELECT `es`.`idEsp`,`es`.`nombre`,`es`.`nom` FROM `especialitats` AS `es` LEFT JOIN `edicio` AS `ed` ON `es`.`idEsp`=`ed`.`idEsp` WHERE `ed`.`dataInici`= '{$row['dataInici']}' AND `es`.`idcasa`='{$_POST['idcasa']}'";

						$conexion=conectar();
						$especialitats=mysqli_query($conexion,$mySql2);
						desconectar($conexion);


						$j=0;
						while ($rowEspecialitats=mysqli_fetch_array($especialitats)) {
							if ($j!=0) {
								$datosExportar.=',';
								};	
						$datosExportar.='{"idEsp":"'.$rowEspecialitats['idEsp'].'"';

						$datosExportar.=', "nombre":"'.$rowEspecialitats['nombre'].'"';

						$datosExportar.=',"nom":"'.$rowEspecialitats['nom'].'"';

						$datosExportar.='}';
						$j++;
						};


		$datosExportar.=']}';
		$i++;
	};
		
	$datosExportar.=']}';
	

	echo $datosExportar;





}

?>