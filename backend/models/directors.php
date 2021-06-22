<?php
    session_start();
    // if(!isset($_SESSION['login'])) header ('Location:../#');
    require("../inc/functions.php");

    if(isset($_POST['acc']) && $_POST['acc'] == "directors"){
        $mySqlDirectors = "SELECT `idDir`, `nom`, `cog1`, `cog2`, `correu` FROM `directors`";
        $conexion = conectar();
        $resultDirectors = mysqli_query($conexion, $mySqlDirectors);
        desconectar($conexion);
        $rows = array();
        while($row = mysqli_fetch_array($resultDirectors)){
            $rows[] = $row;
        }
        echo json_encode($rows);
    }

?>
