<?php
    session_start();
    // if(!isset($_SESSION['login'])) header ('Location:../#');
    require("../inc/functions.php");

    if(isset($_POST['acc']) && $_POST['acc'] == "especialitats"){
        //TODO ELIMINAR
        //$_POST['idcasa']=1;
        actualiza();
    }
    if(isset($_POST['acc']) && $_POST['acc'] == "u"){
		$sql = "UPDATE especialitats SET `nom` = '{$_POST['nom']}', `nombre` = '{$_POST['nombre']}', `descripcio` = '{$_POST['descripcio']}', `descripcion` = '{$_POST['descripcion']}'
		WHERE `idEsp` = '{$_POST['idEsp']}'";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
        actualiza();
        
	}
	if(isset($_POST['acc']) && $_POST['acc'] == "c"){
		$sql = "INSERT INTO especialitats (`nom`,`nombre`,`descripcio`,`descripcion`,`idcasa`) VALUES ('{$_POST['nom']}','{$_POST['nombre']}','{$_POST['descripcio']}','{$_POST['descripcion']}','{$_POST['idcasa']}')";
        $conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
        actualiza();
	}
    if(isset($_POST['acc']) && $_POST['acc'] == "d"){
		$sql = "DELETE FROM `especialitats` WHERE idEsp = '{$_POST['idEsp']}'";
		$conexion = conectar();
		$result = mysqli_query($conexion, $sql);
		desconectar($conexion);
        actualiza();
	}
    function actualiza(){
        $mySqlEspecialitats = "SELECT especialitats.idcasa, especialitats.idEsp, especialitats.nom, especialitats.nombre, especialitats.url, especialitats.descripcio, especialitats.descripcion
        FROM especialitats WHERE especialitats.idcasa ='{$_POST['idcasa']}' ORDER BY especialitats.nombre ";
        $mySqlCases = "SELECT `idcasa`, `nom`, `nombre`, `descripcio`, `descripcion`, `idDir` FROM `cases`";
        $conexion = conectar();
        $resultEspecialitats = mysqli_query($conexion, $mySqlEspecialitats);
        $resultCases = mysqli_query($conexion, $mySqlCases);
        desconectar($conexion);
        $rows = array();
        while($row = mysqli_fetch_array($resultEspecialitats)){
            $rows[] = $row;
        }
        $datosExportar = '{"especialitats" : ' . json_encode($rows) . ', "cases" : ';

        $rows = array();
        while($row = mysqli_fetch_array($resultCases)){
            $rows[] = $row;
        }
        $datosExportar .= json_encode($rows) . '}';

        echo $datosExportar;
    }
?>




