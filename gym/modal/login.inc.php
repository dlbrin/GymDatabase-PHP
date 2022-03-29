<?php
include'../include/config.php';
session_start();

if(isset($_POST['login'])){
    $email = sec($_POST['email']);
    $password = sec($_POST['password']);

    if(empty($email) || empty($password))
    {
        $_SESSION['emptyRegsietr'] = "زانیاریێن خۆ بنڤێسە";
        header("Location: ../index.php");
    } 
    else 
    {
        $Encpassword = hash('gost', $password);
        $result_db = mysqli_query($db,"SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$Encpassword'");
        $row = mysqli_fetch_array($result_db);
        $count = mysqli_num_rows($result_db);
        if($count != 0){
                $_SESSION["adminid"] = $row["id"];
            header('Location: ../home.php?success');
        } else {
            header('Location: ../index.php?error');
        }
    }
}

?>