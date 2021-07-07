<?php
    require_once("../../inc/functions.php");

    if(isset($_POST['acc']) && $_POST['acc'] == "recuperar"){
        $newPass = sha1(md5("{$_POST['nuevaContra']}"));
        $asunto = "Recuperar Contraseña";
        $body = "Esta es su nueva contraseña: '{$newPass}' ";

        $mysql = "UPDATE directors SET recontra = '{$newPass}'
        WHERE email = '{$_POST['email']}' ";
    
        $conexion = conectar();
        $resultRec = mysqli_query($conexion, $mysql);
        desconectar($conexion);

        sendMail($_POST['email'], $asunto, $body);
    }
?>