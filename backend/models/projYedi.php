<?php
    require_once("../inc/functions.php");

    if(isset($_POST['acc']) && $_POST['acc'] == "projectes"){
        $sqlProjectes = "SELECT projectes.idProjecte, projectes.nom, projectes.nombre, projectes.url, projectes.títol, projectes.titulo, projectes.descripcio, projectes.descripcion, projectes.idEdicio, edicio.dataInici, edicio.dataFi, multimedia.url
        FROM projectes 
        INNER JOIN edicio ON projectes.idEdicio = edicio.idEdicio
        INNER JOIN multimedia ON multimedia.idProjecte = projectes.idProjecte";

        $conexion = conectar();
        $resultProjectes = mysqli_query($conexion, $sqlProjectes);
        desconectar($conexion);

        $rows = array();
        while($row = mysqli_fetch_array($resultProjectes)){
            $rows[] = $row;
        }
        echo json_encode($rows);
    }
    
    if(isset($_POST['acc']) && $_POST['acc'] == "edicions"){
        $sqlEdicions = "SELECT edicio.idEdicio, edicio.idEsp, edicio.dataInici, edicio.dataFi, especialitats.nom, especialitats.nombre
        FROM edicio 
        INNER JOIN especialitats ON especialitats.idEsp = edicio.idEsp";

        $conexion = conectar();
        $resultEdicions = mysqli_query($conexion, $sqlEdicions);
        desconectar($conexion);

        $rows = array();
        while($row = mysqli_fetch_array($resultEdicions)){
            $rows[] = $row;
        }
        echo json_encode($rows);
    }
  

?>