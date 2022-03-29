<?php
session_start();
$db = mysqli_connect("localhost","root","","gym");

if(!$db){
	echo "خەلەتیەک هەیە ل ناڤا داتابەیسێ دا !";
}

date_default_timezone_set("Asia/Baghdad");
// Security Conf
function sec($data) {
	global $db;
	$data = mysqli_real_escape_string($db, htmlspecialchars($data));
	return $data;
}

$db->query("SET NAMES utf8");
$db->query("SET CHARACTER SET utf8");

if (!isset($_SESSION['lang']))
    $_SESSION['lang'] = "ba";
else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
    if ($_GET['lang'] == "ba")
        $_SESSION['lang'] = "ba";
    else if ($_GET['lang'] == "so")
        $_SESSION['lang'] = "so";
}

require_once "languages/" . $_SESSION['lang'] . ".php";


// Admin Session And Logout
if(isset($_SESSION['adminid'])){
	$AdminId = $_SESSION['adminid'];
}
if(isset($_GET['logout'])){
    session_unset();
    unset($_SESSION['adminid']);
    session_destroy();
    header('Location: index.php');
}

?>