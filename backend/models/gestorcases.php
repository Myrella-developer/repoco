<?php
	function conectar(){

    //$conexion = @mysqli_connect("bbdd.cobd.es", "ddb171025", "Repo@2021", "ddb171025");
    
    $conexion = @mysqli_connect("localhost", "root", "", "repoco");

    if(!$conexion){
        die("No se ha podido conectar" . mysqli_connect_errno());
    }
    mysqli_set_charset($conexion, "utf8");
    mysqli_query($conexion, "SET lc_time_names='es_ES'");
    return $conexion;


}
    $sql="SELECT * FROM `cases`";

    $conexion=conectar();

    $resultCases=mysqli_query($conexion, $sql);

    $datosCases='{"datosCases":';

    $rows = array();

    while ($row = mysqli_fetch_array($resultCases)) {
        $rows[]=$row;
    }

    $datosCases.=json_encode($rows);

    $datosCases.="}";

    desconectar($conexion);

function desconectar($conexion){
    mysqli_close($conexion);
}
	
?>