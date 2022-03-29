<?php require'include/simpleBackupDB.php';
include'include/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login</title>
</head>
<body class="">
    <div class="lg-container">
            <div class="lg-row">
                <div class="lg-row-logo">
                    <img src="assets/img/technical-support.png" alt="">
                </div>
                <div class="lg-row-header">
                    <h1><i class="fas fa-lock"></i> چوونە ژوور</h1>
                </div>
                <form class="lg-row-inp" action="modal/login.inc.php" method="POST">
                    <input type="email" name="email" placeholder="<?php echo sec($lang['writeemail']); ?>">
                    <input type="password" name="password" placeholder="<?php echo sec($lang['writepassword']); ?>">
                    <button name="login">چوونە ژوور</button>
                </form>
            </div>
    </div>

    <style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Droid Arabic Kufi",sans-serif;
    }
    .lg-container{
        background-color: #ecf0f3;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: normal;
    }

    .lg-row{
        width: 400px;
        border-radius: 20px;
        margin: 30px 0px;
        padding: 30px;
        box-sizing: border-box;
        background: #ecf0f3;
        box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
        direction: rtl;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .lg-row-logo img{
        width: 140px;
    }

    .lg-row-header h1{
        direction: rtl;
        font-size: 20px;
        color: #022069;
        margin-bottom: 20px;
    }
    .lg-row-inp{
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .lg-row-inp input{
        margin: 10px 0;
        padding: 0 5px;
        height: 30px;
        background-color: transparent;
        border: none;
        border-bottom: 1px solid #FFCE54;
        direction: rtl;
        outline: none;
    }
    .lg-row-inp button{
        margin: 10px 0;
        height: 30px;
        background-color: #FFCE54;
        border: none;
        transition: .4s;
        border-radius: 4px;
    }
    .lg-row-inp button:hover{
        background-color: #ffbf1c;
    }
    </style>
</body>
</html>