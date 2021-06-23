<?php
	include("../inc/functions.php");

    session_start();
   

    if (isset($_POST['acc']) && $_POST['acc'] == "r") {
        $sql="SELECT `idcasa`, `nom`, `nombre`, `descripcio`, `descripcion`, `url`, `idDir` FROM `cases` WHERE `idDir` = '{$_SESSION['login']['idDir']}'";
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