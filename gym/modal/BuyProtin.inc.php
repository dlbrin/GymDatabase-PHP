<?php
include'../include/config.php';
if(isset($_POST['send'])){

    $nameUser = sec($_POST['nameUser']);
	$AdminID = sec($_POST['adminid']);
    $nameProtin = sec($_POST['nameProtin']);
    $priceProtin = sec($_POST['priceProtin']);
	$NowDate = date("Y-m-d");

    if(empty($nameUser) || empty($nameProtin) || empty($priceProtin)){
		$_SESSION['Empty'] = "هەمى خانان پر بکە";
		header('Location: ../protin.php');
	}
	else{
        $PhotoQuery = mysqli_query($db , "INSERT INTO `protin`(`username`,`admin_id`,`protin_name`,`price_protin`,`date`) VALUES('$nameUser','$AdminID', '$nameProtin' , '$priceProtin' , '$NowDate')");
		if($PhotoQuery){
			$_SESSION['PostSuccess'] = "سەرکەفتیانە هاتە زێدەکرن";
			header('Location: ../protin.php');
	    }
    }
}
?>