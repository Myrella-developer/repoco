<?php
	require("../inc/functions.php");

	session_start();

	if (isset($_POST['acc']) && $_POST['acc'] == "l") {
		$sql="SELECT `idDir`, `nom`, `cog1`, `cog2`, `correu`, `contrasenya`, `recontra`, `tipus` 
			FROM `directors` 
			WHERE `correu`='".$_POST['correu']."' AND `contrasenya`='".$_POST['pass']."'.`tipus`='a'";

		$conexion=conectar();
		$resultUser=mysqli_query($conexion, $sql);

	if ((mysqli_num_rows($resultUser)) !==0){
		echo "existe el user";

		$rows=array();

		while ($row=mysqli_fetch_array($resultUser)){
			$_SESSION['login']['idDir'] = $row['idDir'];
            $_SESSION['login']['tipus'] = $row['tipus'];
            $_SESSION['login']['nom'] = $row['nom'];
            $_SESSION['login']['correu'] = $row['correu'];
		}
	}
	if (isset($_POST['acc']) && $_POST['acc'] == "tancar") {
		session_unset();
		session_destroy();
		//header('Location: http://localhost/repoco/index.html#/');
	}
}
?>