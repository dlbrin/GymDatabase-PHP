<?php include'include/nav.php'; 
$male = "نێر";
$female = "مێ";
$NowDate = date("Y-m-d");
$finalDate = date("Y-m-d", strtotime("+1 month"));
?>



 

    <div class="wrapper d-flex align-items-stretch">
	<?php include 'include/sidebar.php'; ?>
	<div id="content" class="p-4 p-md-5">
		<?php include 'include/navbar.php'; ?>
		<div class="header-of-page">
            <script>
                $("#sidebarCollapse").on("click" , function(){
                    $(".linkPages").toggleClass("d-none");
                })
            </script>

        <div class="formAddUser">

        <!-- ئەگەر زانیارى هاتنە فڕیکرن بۆ داتابەیسى -->
        <?php
            if(isset($_SESSION['insertUser'])){?>
            <p class="text-success text-center pt-2"><?php echo $_SESSION['insertUser']; ?></p>
        <?php unset($_SESSION['insertUser']); } ?>

        <!-- ئەگەر خانە ڤالا بن -->
        <?php
        if(isset($_SESSION['empty'])){?>
        <p class="text-danger text-center pt-2"><?php echo $_SESSION['empty']; ?></p>
        <?php unset($_SESSION['empty']); } ?>
            
        <form action="modal/insertUser.inc.php" method="POST" enctype='multipart/form-data' >
            <div class="controlAddUser">
                <label for=""><?php echo sec($lang['name']); ?></label>
                <input type="text" placeholder="<?php echo sec($lang['NameUser']); ?>" name="nameUser">
            </div>
            <div class="controlAddUser">
                <label for=""><?php echo sec($lang['old']); ?></label>
                <input type="text" placeholder="<?php echo sec($lang['oldUser']); ?>" name="ageUser">
                <?php
                 if(isset($_SESSION['adminid'])){
                    $userid = $_SESSION['adminid'];
                 } 
                    ?>
                <input type="text" value="<?php echo $userid; ?>" placeholder="تەمەنێ یاریزان" hidden name="adminid">
            </div>
            <div class="controlAddUser">
                <label for=""><?php echo sec($lang['address']); ?></label>
                <input type="text" placeholder="<?php echo sec($lang['addressUser']); ?>" name="address">
            </div>
            <div class="controlAddUser">
                <label for=""><?php echo sec($lang['categoriesSubscribe']); ?></label>
                <select name="Subscribe" id="priceSubscribe">
                    <option value=""> <?php echo sec($lang['SelectcategoriesSubscribe']); ?></option>
                    <option data-id="25000">ئشتراکا عادی</option>
                    <option data-id="30000">ئشتراک دگەل ئاڤێ</option>
                    <option data-id="35000">ئشتراک دگەل ساونا</option>
                </select>
            </div>

            <div class="controlAddUser">
                <label for=""><?php echo sec($lang['gender']); ?></label>
                <select name="genderUser" id="">
                    <option value=""> <?php echo sec($lang['selectGender']); ?></option>
                    <option value="<?php echo sec($male); ?>"><?php echo sec($lang['male']); ?></option>
                    <option value="<?php echo sec($female); ?>"><?php echo sec($lang['female']); ?></option>
                </select>
            </div>

            


            <div class="controlAddUser">
                <label for=""><?php echo sec($lang['priceSubscribe']); ?></label>
                <input type="text" id="numPrice" placeholder="<?php echo sec($lang['priceSubscribe']); ?>" name="priceUser">
            </div>


            <script>
                $("#priceSubscribe").change(function(){
                    var styleBorder = $(this).children('option:selected').data('id');
                    
                    $("#numPrice").val(styleBorder);
                })
            </script>


            <div class="controlAddUser">
                <label for=""><?php echo sec($lang['startDate']); ?></label>
                <input type="date" value="<?php echo $NowDate; ?>" placeholder="username" name="startDate">
            </div>
            <div class="controlAddUser">
                <label for=""><?php echo sec($lang['EndDate']); ?></label>
                <input type="date" value="<?php echo $finalDate; ?>" placeholder="بەروارێ کۆتایى" name="endDate">
            </div>

            <div class="controlAddUser">
                <label for=""><?php echo sec($lang['noMoneyAddUser']); ?></label>
                <select name="Qarzar" id="">
                    <option value="0"> <?php echo sec($lang['no']); ?></option>
                    <option value="1"><?php echo sec($lang['yes']); ?></option>
                </select>
            </div>

            <button name="insert"><?php echo sec($lang['addBtn']); ?></button>
        </form>
    </div>

    <script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


        </div>
    </div>
    </div>

   