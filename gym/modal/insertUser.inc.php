<?php
include'../include/config.php';

if(isset($_POST['insert'])){
    $nameUser = sec($_POST['nameUser']);
    $ageUser = sec($_POST['ageUser']);
    $Subscribe = sec($_POST['Subscribe']);
    $genderUser = sec($_POST['genderUser']);
    $priceUser = sec($_POST['priceUser']);
    $startDate = sec($_POST['startDate']);
    $endDate = sec($_POST['endDate']);
    $QarzarUser = sec($_POST['Qarzar']);
    $Address = sec($_POST['address']);
    $AdminID = sec($_POST['adminid']);

    $priceQarz = 0;
    $MonthQarz = 0;

    if($QarzarUser == 0){
        $priceQarz = 0;
    } else if($QarzarUser == 1){
        $priceQarz = $priceUser;
        $MonthQarz = 1;
    }

    if(empty($nameUser) || empty($ageUser || empty($Address) ||
        empty($genderUser) || empty($priceUser) || empty($startDate)
        || empty($endDate)))
        {
            $_SESSION['empty'] = sec($lang['empty']);
            header("Location: ../addUser.php");
        } else {
            $query = mysqli_query($db , "INSERT INTO `user` (`name`,`admin_id`,`categories_gym`,`address`,`gender`,`price`,`date_start`,`date_end`,`month`,`qarz`,`price_qarz`,`month_qarz`) VALUES('$nameUser','$AdminID','$Subscribe','$Address','$genderUser','$priceUser','$startDate','$endDate','1','$QarzarUser','$priceQarz','$MonthQarz')");

            if($query){
                $InsertUseful = mysqli_query($db , "INSERT INTO `useful` (`name`,`price`) VALUES('$nameUser','$priceUser')");
                if($InsertUseful){
                $_SESSION['insertUser'] = sec($lang['InsertUser']);
                header("Location: ../addUser.php");
                }
            }
        }
}

?>