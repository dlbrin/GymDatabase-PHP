<?php
include'include/config.php';
 if(!isset($_SESSION['adminid'])){
   
   header("location:index.php");
   
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>هۆڵا لەشجوانى چڕەى</title>
</head>
<body>

<div class="language">
    <a href="<?php echo sec($_SERVER['PHP_SELF']);?>?lang=ba">کوردى</a>
    <a href="<?php echo sec($_SERVER['PHP_SELF']);?>?lang=so">عربی</a>
</div>
    <style>
        .language{
            color: #111;
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .language a{
            text-decoration: none;
    font-size: 1.2rem;
    background: #ffbc11;
    color: #fff;
    width: 100px;
    text-align: center;
    padding: 6px;
    margin: 4px 0px;
    border-radius: 6px;
        }
        .warning{
            position: absolute;
            bottom: 30px;
            left: 30px;
            padding: 4px;
            border-radius: 8px;
            display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  
        }
        .warning img{
            width: 50px;
        }
        .warning .time{
            display: flex;
  justify-content: center;
  align-items: center;
        }
        .warning .moneyGym{
            margin-top: 1rem;
            display: flex;
  justify-content: center;
  align-items: center;
        }
        #MyClockDisplay{
            color: #111;
            font-size: 2rem;
            position: absolute;
            top: 40px;
            left: 30px;
        }
    </style>

<div id="MyClockDisplay" class="clock"></div>
    <script>
    
        function showTime(){
            var date = new Date();
            var h = date.getHours();
            var m = date.getMinutes();
            var s = date.getSeconds();
            var session = "AM";

            if(h == 0){
                h = 12;
            }

            if(h > 12){
                h = h - 12;
                session = "PM"
            }

            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;

            var time = h + ":" + m + ":" + s + " " + session;
            document.getElementById("MyClockDisplay").innerText = time;
            document.getElementById("MyClockDisplay").textContent = time;

            setTimeout(showTime, 1000);
        }
        showTime();

    </script>
    <div class="warning" style="color: #111;">
    <div class="time">
    <img src="assets/img/expired.png" style="margin-right: 10px;" onclick='WrongDate()'  alt="" srcset="">
    <?php
        $query = mysqli_query($db , "SELECT * FROM `user`");
        $expire = 0;
        while($RowExpire = mysqli_fetch_assoc($query)){
            if($RowExpire['date_end'] < date("Y-m-d")){
                $expire++;
            }
        }
    ?>
        <p onclick='WrongDate()'><?php echo $expire; ?></p>
        </div>
        <script>
            function WrongDate(){
                window.location.href="wrongDate.php";
            }
        </script>
        <div class="moneyGym">
    <img src="assets/img/noMoney.png" onclick='WrongMoney()' style="margin-right: 10px;" alt="" srcset="">
    <?php
        $query = mysqli_query($db , "SELECT * FROM `user`");
        $price = 0;
        while($RowPrice = mysqli_fetch_assoc($query)){
            if($RowPrice['qarz'] > 0){
                $price++;
            }
        }
    ?>
        <p onclick='WrongMoney()'><?php echo $price; ?></p>
        <script>
            function WrongMoney(){
                window.location.href="qarz.php";
            }
        </script>
        </div>
    </div>

    <div class="navbar">
        <span>
            سیستەمێ رێڤەبرنا هۆڵا لەشجوانی
        </span>
    </div>
    <div class="cardGroupHome">
        <div class="cardHome">
            <a href="addUser.php">
                <img src="assets/img/add-user.png" alt="" srcset="">
                <h1><?php echo sec($lang['addGamer']); ?></h1>
            </a>
        </div>
        <div class="cardHome">
            <a href="updateUser.php">
                <img src="assets/img/add-file.png" alt="" srcset="">
                <h1><?php echo sec($lang['newSubscribe']); ?></h1>
            </a>
        </div>
        <div class="cardHome">
            <a href="wrongDate.php">
                <img src="assets/img/expired.png" alt="" srcset="">
                <h1><?php echo sec($lang['wrongDate']); ?></h1>
            </a>
        </div>
        <div class="cardHome">
            <a href="gamer.php">
                <img src="assets/img/trainer.png" alt="" srcset="">
                <h1><?php echo sec($lang['gamer']); ?></h1>
            </a>
        </div>
        <div class="cardHome">
            <a href="money.php">
                <img src="assets/img/salary.png" alt="" srcset="">
                <h1><?php echo sec($lang['haveMoney']); ?></h1>
            </a>
        </div>
        <div class="cardHome">
            <a href="qarz.php">
                <img src="assets/img/noMoney.png" alt="" srcset="">
                <h1><?php echo sec($lang['noMoney']); ?></h1>
            </a>
        </div>
        <div class="cardHome">
            <a href="protin.php">
                <img src="assets/img/protein.png" alt="" srcset="">
                <h1><?php echo sec($lang['protin']); ?></h1>
            </a>
        </div>
        <div class="cardHome">
            <a href="register.php">
                <img src="assets/img/admin.png" alt="" srcset="">
                <h1><?php echo sec($lang['admin']); ?></h1>
            </a>
        </div>
    </div>
</body>
</html>