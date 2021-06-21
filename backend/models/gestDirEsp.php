<?php
    session_start();
    // if(!isset($_SESSION['login'])) header ('Location:../#');
    require("../inc/functions.php");

    if(isset($_POST['acc']) && $_POST['acc'] == "especialitats"){
        $mySqlCases="SELECT `idcasa`, `nom`, `nombre`, `idDir` FROM `cases`";
        $mySqlEspecialitats = "SELECT especialitats.idEsp, especialitats.nom, especialitats.nombre, especialitats.url, especialitats.descripcio, especialitats.descripcion, especialitats.idcasa, cases.nom, cases.nombre 
        FROM especialitats INNER JOIN cases ON especialitats.idcasa = cases.idcasa
        WHERE cases.idcasa='".$_POST['idcasa']."'";
        // $conexion = conectar();
        // $resultEspecialitats = mysqli_query($conexion, $mySqlEspecialitats);
        // $resultCases = mysqli_query($conexion, $mySqlCases);
        // desconectar($conexion);
        // $datosEsp='{"especialitats":';
        // $rows = array();
        // while($row = mysqli_fetch_array($resultEspecialitats)){
        //     $rows[] = $row;
        // }
        // $datosEsp.=json_encode($rows);
        // $datosEsp.=', "cases":';    echo json_encode($rows);
        // $rows= array();
        // while ($row=mysqli_fetch_array($resultCases)) {
        //         $rows[]=$row;
        //     }
        //     $datosEsp.=json_encode($rows);
        //     $datosEsp.='}';

        //     echo $datosEsp;
    }

?>




