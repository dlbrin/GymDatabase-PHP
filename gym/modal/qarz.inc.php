<?php
include'../include/config.php';

if(isset($_POST['updatePrice'])){
    $id = sec($_POST['id']);
    $price = sec($_POST['price']);

    $query = mysqli_query($db, "SELECT * FROM `user` WHERE `id` = '$id'");
    while($QarzRow = mysqli_fetch_assoc($query)){
        if($price > sec($QarzRow['price_qarz']) || $price <= 0 ){
            $_SESSION['gratterPrice'] = sec($lang['WrongAddPrice']);
            header("Location: ../qarz.php");
        }
        else if($price == sec($QarzRow['price_qarz'])){
            $UpdateUser = mysqli_query($db, "UPDATE `user` SET `qarz` = 0 , `price_qarz` = 0 WHERE `id` = '$id'");
            if($UpdateUser){
                $_SESSION['allPrice'] = sec($lang['ALLPriceSuccess']);
                header("Location: ../qarz.php");
            }
        }
        else {
            $total = sec($QarzRow['price_qarz']) - $price;
            $UpdateUserPrice = mysqli_query($db, "UPDATE `user` SET `price_qarz` = '$total' WHERE `id` = '$id'");
            if($UpdateUserPrice){
                $_SESSION['justPrice'] = $price.sec($lang['PriceSuccess']);
                header("Location: ../qarz.php");
            }
        }
    }
} else if(isset($_POST['updateAllPrice'])){
    $id = sec($_POST['id']);
    $UpdateUserPricAll = mysqli_query($db, "UPDATE `user` SET `qarz` = 0 , `price_qarz` = '0' WHERE `id` = '$id'");
    if($UpdateUserPricAll){
        $_SESSION['justPrice'] = sec($lang['ALLPriceSuccess']);
        header("Location: ../qarz.php");
    }
}

?>