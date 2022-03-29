<?php
include'../include/config.php';
if(isset($_POST['register'])){
    $name = sec($_POST['name']);
    $address = sec($_POST['address']);
    $phone = sec($_POST['phone']);
    $gender = sec($_POST['gender']);
    $email = sec($_POST['email']);
    $password = sec($_POST['password']);
    $repeat_password = sec($_POST['repeat_password']);
    
    if(empty($name) || empty($address) || empty($phone) || empty($gender) || empty($email) || empty($password) || empty($repeat_password))
    {
        $_SESSION['emptyRegsietr'] = "هەمى خانان پر بکە";
        header("Location: ../register.php");
    } 
    else if($password != $repeat_password)
    {
        $_SESSION['PasswordNotEqual'] = "پەیڤا نهێنى وەک ئێک نینن";
        header("Location: ../register.php");
    }
    else 
    {
        // encrypt pass
        $Encpassword = hash('gost', $password);

        //insert info user to regsiter
        $AddUser = mysqli_query($db, "INSERT INTO `admin` (`name`,`email`,`password`,`phone`,`address`,`gender`) VALUES('$name','$email','$Encpassword','$phone','$address','$gender')");
        if($AddUser){
            $_SESSION['SuccessRegisetr'] = "سەرکەفتیانە هاتە تۆمار کرن";
            header("Location: ../register.php");
        }
    }
}

?>