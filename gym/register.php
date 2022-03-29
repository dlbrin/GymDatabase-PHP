<?php include'include/nav.php'; 
$male = "نێر";
$female = "مێ";
?>


<!-- ئەگەر زانیارى هاتنە فڕیکرن بۆ داتابەیسى -->
<?php
    if(isset($_SESSION['SuccessRegisetr'])){?>
    <script>
    swal({
    title: "<?php echo $_SESSION['SuccessRegisetr']; ?>",
    icon: "success",
    button: "باشە",
    });

    </script>
    <?php unset($_SESSION['SuccessRegisetr']); } ?>

<!-- ئەگەر زانیارى ڤاڵا بن -->
    <?php
    if(isset($_SESSION['emptyRegsietr'])){?>
    <script>
    swal({
    title: "<?php echo $_SESSION['emptyRegsietr']; ?>",
    icon: "error",
    button: "باشە",
    });
    </script>
    <?php unset($_SESSION['emptyRegsietr']); } ?>

    <!--ئەگەر پەیڤا نهێنى وەک ئێک نەبن-->
    <?php
    if(isset($_SESSION['PasswordNotEqual'])){?>
    <script>
    swal({
    title: "<?php echo $_SESSION['PasswordNotEqual']; ?>",
    icon: "error",
    button: "باشە",
    });
    </script>
    <?php unset($_SESSION['PasswordNotEqual']); } ?>

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
        <form action="modal/register.inc.php" method="POST"enctype='multipart/form-data'>
            <div class="controlAddUser">
                <label for=""><?php echo sec($lang['name']); ?></label>
                <input type="text" name="name">
            </div>
            <div class="controlAddUser">
                <label for=""><?php echo sec($lang['address']); ?></label>
                <input type="text" name="address">
            </div>
            <div class="controlAddUser">
                <label for=""><?php echo sec($lang['numberPhone']); ?></label>
                <input type="text" name="phone">
            </div>
            <div class="controlAddUser">
                <label for=""><?php echo sec($lang['gender']); ?></label>
                <select name="gender" id="">
                    <option value=""><?php echo sec($lang['selectGender']); ?></option>
                    <option value="<?php echo sec($male); ?>"><?php echo sec($lang['male']); ?></option>
                    <option value="<?php echo sec($female); ?>"><?php echo sec($lang['female']); ?></option>
                </select>
            </div>
            <div class="controlAddUser">
                <label for=""><?php echo sec($lang['writeemail']); ?></label>
                <input type="email" name="email">
            </div>
            <div class="controlAddUser">
                <label for=""><?php echo sec($lang['writepassword']); ?></label>
                <input type="password" name="password">
            </div>
            <div class="controlAddUser">
                <label for=""><?php echo sec($lang['PasswordAgain']); ?></label>
                <input type="password" name="repeat_password">
            </div>
        
            <button name="register"><?php echo sec($lang['Register']); ?></button>
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