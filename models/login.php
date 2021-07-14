<?php

	require("../inc/functions.php");
	session_start();
	if (isset($_POST['acc']) && $_POST['acc'] == "entrar") {
		echo $errorLogin;
		$sql="SELECT `idDir`, `nom`, `cog1`, `cog2`, `correu`, `contrasenya`, `tipus` FROM `directors` WHERE `correu`='".$_POST['correu']."' AND `contrasenya`='".sha1(md5($_POST['pass']))."' AND `actiu`='s'";

		$conexion=conectar();
		$resultUser=mysqli_query($conexion, $sql);
		desconectar($conexion);
		if ((mysqli_num_rows($resultUser)) !==0){
			$rows=array();
			while ($row=mysqli_fetch_array($resultUser)){
				$_SESSION['login']['idDir'] = $row['idDir'];
				$_SESSION['login']['tipus'] = $row['tipus'];
				$_SESSION['login']['nom'] = $row['nom'];
				$_SESSION['login']['correu'] = $row['correu'];
			}		
		}else{
			echo false;
		}
	}

	if (isset($_POST['acc']) && $_POST['acc'] == "tancar") {
		echo "string";
		session_unset();
		session_destroy();
	}
?>