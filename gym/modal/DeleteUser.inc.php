<?php
include'../include/config.php';

if(isset($_POST['delete'])){
    $id = sec($_POST['id']);

    $QueryDelete = mysqli_query($db , "DELETE FROM `user` WHERE `id` = '$id'");

    if($QueryDelete === true){
        header("Location: ../gamer.php?deleted");
    }else{
        echo "no";
    }
} 
?>