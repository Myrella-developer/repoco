<?php
    require("../../inc/functions.php");

    if(isset($_POST['acc']) && $_POST['acc']=='r-d'){
        $query = "SELECT idDistricte, nom FROM districtes";
        $con = conectar();
        $result = mysqli_query($con, $query);
        desconectar($con);

        $dists = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $dists[]=$row;
        }
        echo json_encode($dists);
    }
    else if(isset($_POST['acc']) && $_POST['acc']=='r-b'){
        if(isset($_POST['d_id']) && $_POST['d_id']<=0){
            echo "Unexpected district selected.";
        } else {
            $query = "SELECT idBarri, nomBarri FROM barris WHERE idDistricte = {$_POST['d_id']}";
            $con = conectar();
            $result = mysqli_query($con, $query);
            desconectar($con);

            $barris = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $barris[]=$row;
            }
            echo json_encode($barris);
        }
    }
    else if(isset($_POST['acc']) && $_POST['acc']=='u-b'){
        if(!isset($_POST['b_barri']) || !isset($_POST['b_idDist']) || !isset($_POST['b_id']) || $_POST['b_idDist'] == -1){
            echo "Not enough information provided.";
        } else {
            $query = "UPDATE `barris` SET `nomBarri`='{$_POST['b_barri']}', `idDistricte`={$_POST['b_idDist']} WHERE idBarri={$_POST['b_id']}";
            $con = conectar();
            $result = mysqli_query($con, $query);
            desconectar($con);

            echo $result;
        }
    }
    else if(isset($_POST['acc']) && $_POST['acc']=='d-b'){
        if(!isset($_POST['b_id'])){
            echo "Not enough information provided";
        } else {
            $query = "DELETE FROM `barris` WHERE `idBarri`={$_POST['b_id']}";
            $con = conectar();
            $result = mysqli_query($con, $query);
            if (!$result) {
                echo mysqli_errno($con);
            } else {
                desconectar($con);
                echo $result;
            }

        }
    }
    else if(isset($_POST['acc']) && $_POST['acc']=='c-b'){
        if(!isset($_POST['barriName']) || !isset($_POST['newBarriDist'])){
            echo "Not enough information provided";
        } else {
            $query = "INSERT INTO `barris`(`nomBarri`, `idDistricte`) VALUES ('{$_POST['barriName']}',{$_POST['newBarriDist']})";
            $con = conectar();
            $result = mysqli_query($con, $query);
            desconectar($con);
            
            echo $result;
        }
    }
    else if(isset($_POST['acc']) && $_POST['acc']=='d-d'){
        if(!isset($_POST['d_id'])){
            echo "Unexpected district selected.";
        } else {
            $query = "DELETE from `districtes` WHERE `idDistricte`={$_POST['d_id']}";
            $con = conectar();
            $result = mysqli_query($con,$query);
            if (!$result) {
                echo mysqli_errno($con);
            } else {
                desconectar($con);
                echo $result;
            }
        }
    }
    else if(isset($_POST['acc']) && $_POST['acc']=='u-d'){
         if(!isset($_POST['d_id']) || !isset($_POST['d_name'])){
             echo "Not enough information provided.";
         } else {
            $query = "UPDATE `districtes` SET `nom`='{$_POST['d_name']}' WHERE `idDistricte`={$_POST['d_id']}";
            $con = conectar();
            $result = mysqli_query($con,$query);
            desconectar($con);

            echo $result;
         }
    }
    else if(isset($_POST['acc']) && $_POST['acc']=='c-d'){
        if(!isset($_POST['d_name']) || !isset($_POST['d_name'])=="undefined"){
            echo "Name not provided";
        } else {
           $query = "INSERT INTO `districtes`(`nom`) VALUES ('{$_POST['d_name']}')";
           $con = conectar();
           $result = mysqli_query($con,$query);
           desconectar($con);

           echo $result;
        }
   }
?>