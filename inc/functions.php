<?php

function conectar(){
    //$conexion = @mysqli_connect("localhost", "username", "password", "ddb171025");
    $conexion = @mysqli_connect("bbdd.cobd.es", "ddb171025", "Repo@2021", "ddb171025");
    //$conexion = @mysqli_connect("localhost", "root", "", "ddb171025");

    if(!$conexion){
        die("No se ha podido conectar" . mysqli_connect_error());
    }
    mysqli_set_charset($conexion, "utf8");
    mysqli_query($conexion, "SET lc_time_names='es_ES'");
    return $conexion;
}


function desconectar($conexion){
    
    mysqli_close($conexion);
}

function tancar(){
    session_unset();
    session_destroy();
}

function sendMail($mailTo, $asunto, $body){
    //TODO QUITAR HARDCORE DE USUARIOS, PASSWORD, ETC...
    require_once("../inc/phpmailer.class.php");
    
    $mail = new PHPMailer();
    $mail -> IsSMTP();
    $mail -> SMTPAuth = true;
    $mail -> SMTPSecure = "tls";
    $mail -> Host = "smtp.dondominio.com";
    $mail -> Port = 587;
    $mail -> Username = "genis@cobd.es";
    $mail -> Password = "Genis_3142";
    $mail -> FromName = "Genis";
    $mail -> From = "genis@cobd.es";
    $mail -> SMTPDebug = 1; 
    $mail -> SMTPDebug = 2; 
    $mail -> AddReplyTo("genis@cobd.es");
    $mail -> AddAddress($mailTo);
    $mail -> Timeout = 100;
    $mail -> IsHtml(true);
    $mail -> CharSet = "UTF-8";
    $mail -> Subject = $asunto;
    $mail -> Body = $body;
    $mail -> AltBody = $body;
    
    $exito = $mail -> Send();
    $mail -> ClearAddresses();
    if(!$exito) return $mail->ErrorInfo;
    else echo "Mail enviado";
}

function replaceFromHtml($jsonArray){
    $normalChars = str_replace(array("'",'"',"\\n"), array("\'",'\"',"\r\n"),$jsonArray);
    return $normalChars;
}

function replaceFromBBDD($jsonArray){
    $normalChars = htmlspecialchars($jsonArray);
    $normalChars = str_replace(array('&quot;', '&amp;', '&lt;', '&gt;'), array('"', "&", "<", ">"), $normalChars);
    $normalChars = str_replace(array('"'), array('\"'), $normalChars);
    $normalChars = str_replace(array("\r\n", "\r", "\n"),"\\n" ,$normalChars);
    return $normalChars;
}

?>