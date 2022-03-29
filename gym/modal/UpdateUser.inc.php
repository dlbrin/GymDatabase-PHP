<?php
include'../include/config.php';

if(isset($_POST['update'])){
    $id = sec($_POST['id']);
    $subscribe = sec($_POST['subscribe']);
    $price = sec($_POST['price']);
    $date_start = sec($_POST['date_start']);
    $date_end = sec($_POST['date_end']);
    $qarz = sec($_POST['qarz']);

    $MonthQarz = 0;

    if(empty($price) || empty($date_start) || empty($date_end)){
        $_SESSION['empty'] = "هیڤیدارین زانیاریان بنڤێسى";
        header("Location: ../updateUser.php");
    }
    else if($qarz != 0 && $qarz != 1){
        $_SESSION['emptyQarz'] = "دیار بکە قەرزدارە ؟";
        header("Location: ../updateUser.php");
    } else {
        $QuerySelect = mysqli_query($db, "SELECT * FROM `user` WHERE `id` = '$id'");
        while($RowSelect = mysqli_fetch_assoc($QuerySelect)){
            $Month = sec($RowSelect['month']);
            $PriceCount = sec($RowSelect['price']);
            $NumQarzMonth = sec($RowSelect['month_qarz']);
            $PriceQarz = sec($RowSelect['price_qarz']);
        }
        $Month++;

        if($qarz == 1){
            $MonthQarz = 1;
            $QarzTotalMonth = $MonthQarz + $NumQarzMonth;
            $TotalPriceQarz = $price + $PriceQarz;
        }

        $QueryPrice = mysqli_query($db, "SELECT * FROM `useful` WHERE `id` = '$id'");
        while($RowPrice = mysqli_fetch_assoc($QueryPrice)){
            $PriceUseful = sec($RowPrice['price']);
        }

        $TotalPrice = $PriceCount + $PriceUseful;

        $UpdateQuery = mysqli_query($db , "UPDATE `user` SET `price` = '$price' , `date_start` = '$date_start' ,
        `date_end` = '$date_end' , `month` = '$Month' , `month_qarz` = '$QarzTotalMonth' , `price_qarz` = '$TotalPriceQarz' WHERE `id` = '$id'");

        if($UpdateQuery){
            $UpdateCount = mysqli_query($db , "UPDATE `useful` SET `price` = '$TotalPrice'");
            if($UpdateCount){
                $_SESSION['success'] = "ئیشتیراکا یاریزانى هاتە نوى کرن";
                header("Location: ../updateUser.php");
            }
        } else {
            echo "<script> alert('Wrong to update !'); </script>";
        }
    }
}



?>