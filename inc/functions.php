<?php
function conectar(){

    $conexion = @mysqli_connect("bbdd.cobd.es", "ddb171025", "Repo@2021", "ddb171025");
    
    $conexion = @mysqli_connect("localhost", "root", "", "repoco");
    if(!$conexion){
        die("No se ha podido conectar" . mysqli_connect_errno());
    }
    mysqli_set_charset($conexion, "utf8");
    mysqli_query($conexion, "SET lc_time_names='es_ES'");
    return $conexion;
}

function desconectar($conexion){
    mysqli_close($conexion);
}

?>