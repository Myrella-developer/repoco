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

    if (isset($_POST['acc']) && $_POST['acc']=="u") {
        echo "llega model cases UPDATE";
        $sql2="UPDATE `cases` SET `nom`='{$_POST['nom']}',`nombre`='{$_POST['nombre']}',`descripcio`='{$_POST['descripcio']}',`descripcion`='{$_POST['descripcion']}',`url`='{$_POST['url']}', WHERE `idcasa` ='{$_POST['idcasa']}'";
        $conexion= conectar();
        $updateCases = mysqli_query($conexion,$sql2);
        desconectar($conexion);    
        echo $sql2;
    
    }
    if (isset($_POST['acc']) && $_POST['acc']=="c") {
        echo "llega model CREATE";
    }
?>