<?php
	require("../inc/functions.php");

	session_start();

	if (isset($_POST['acc']) && $_POST['acc'] == "l") {
		$sql="SELECT `idDir`, `nom`, `cog1`, `cog2`, `correu`, `contrasenya`, `recontra`, `tipus` 
			FROM `directors` 
			WHERE `correu`='".$_POST['correu']."' AND `contrasenya`='".$_POST['pass']."'.`tipus`='a'";
		$conexion=conectar();
		$resultUser=mysqli_query($conexion, $sql);
	}
?>