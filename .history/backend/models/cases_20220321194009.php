<?php

	include("../../inc/functions.php");
    session_start();
    if (isset($_POST['acc']) && $_POST['acc'] == "r") {
        actualizar();     
    }

    if (isset($_POST['acc']) && $_POST['acc']=="u") {
        $ejecucion="";
        $_POST['nom'] = replaceFromHtml($_POST['nom']);
        $_POST['nombre'] = replaceFromHtml($_POST['nombre']);
        $_POST['descripcio'] = replaceFromHtml($_POST['descripcio']);
        $_POST['descripcion'] = replaceFromHtml($_POST['descripcion']);
        $_POST['url'] = replaceFromHtml($_POST['url']);
        $sql="UPDATE `cases` 
            SET `nom`='{$_POST['nom']}',`nombre`='{$_POST['nombre']}',`descripcio`='{$_POST['descripcio']}',`descripcion`='{$_POST['descripcion']}',`url`='{$_POST['url']}'
            WHERE `idcasa` ='{$_POST['idcasa']}'";
        $conexion= conectar();
        $updateCases = mysqli_query($conexion,$sql);
        desconectar($conexion);    
        actualizar();  
    }
    if(isset($_POST['acc']) && $_POST['acc'] == "d"){
		$sqlSelect = "SELECT url FROM `cases` WHERE idcasa = {$_POST['idcasa']}";

		$conexion = conectar();
		$resultSelect = mysqli_query($conexion, $sqlSelect);
		desconectar($conexion);

		$rows = array();
		while($row = mysqli_fetch_array($resultSelect)){
			$rows[] = $row;
			// unlink('../../multimedia/img/projectes/'.$row['url']);
		}

		$sqlUnlink = "DELETE FROM `cases` WHERE idMult = {$_POST['idMult']}";

		$conexion = conectar();
		$resultUnlink = mysqli_query($conexion, $sqlUnlink);
		desconectar($conexion);

		read();
	}
    if (isset($_POST['acc']) && $_POST['acc']=="c") {
    }
    function actualizar(){
        $sql="SELECT `idcasa`, `nom`, `nombre`, `descripcio`, `descripcion`, `url`, `idDir` 
            FROM `cases` 
            WHERE `idDir` = '{$_SESSION['login']['idDir']}'";
        $conexion = conectar();
        $resultCases = mysqli_query($conexion, $sql);
        desconectar($conexion);

        $rows = array();
                while($row = mysqli_fetch_array($resultCases)){
                    $rows[] = $row;
                }
        echo json_encode($rows); 
    }
?>