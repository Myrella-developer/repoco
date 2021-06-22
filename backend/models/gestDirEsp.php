<?php
    session_start();
    // if(!isset($_SESSION['login'])) header ('Location:../#');
    require("../inc/functions.php");

    if(isset($_POST['acc']) && $_POST['acc'] == "especialitats"){
        $mySqlEspecialitats = "SELECT especialitats.idEsp, especialitats.nom, especialitats.nombre, especialitats.url, especialitats.descripcio, especialitats.descripcion, especialitats.idCasa, cases.nom, cases.nombre 
        FROM especialitats INNER JOIN cases ON especialitats.idCasa = 1";
        $conexion = conectar();
        $resultEspecialitats = mysqli_query($conexion, $mySqlEspecialitats);
        desconectar($conexion);
        $rows = array();
        while($row = mysqli_fetch_array($resultEspecialitats)){
            $rows[] = $row;
        }
        echo json_encode($rows);
    }

?>




