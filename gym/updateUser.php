<?php include'include/nav.php'; ?>

<?php
    if(isset($_SESSION['empty'])){?>
    <script>
    swal({
    title: "<?php echo $_SESSION['empty']; ?>",
    icon: "error",
    button: "باشە",
    });

    </script>
    <?php unset($_SESSION['empty']); } ?>

<?php
    if(isset($_SESSION['emptyQarz'])){?>
    <script>
    swal({
    title: "<?php echo $_SESSION['emptyQarz']; ?>",
    icon: "error",
    button: "باشە",
    });

    </script>
    <?php unset($_SESSION['emptyQarz']); } ?>


<?php
    if(isset($_SESSION['success'])){?>
    <script>
    swal({
    title: "<?php echo $_SESSION['success']; ?>",
    icon: "success",
    button: "باشە",
    });

    </script>
    <?php unset($_SESSION['success']); } ?>

    <div class="wrapper d-flex align-items-stretch">
	<?php include 'include/sidebar.php'; ?>
	<div id="content" class="p-4 p-md-5">
		<?php include 'include/navbar.php'; ?>
		<div class="header-of-page">

    <script>
        $("#sidebarCollapse").on("click", function () {
          $(".linkPages").toggleClass("d-none");
        })
      </script>





      <div class="search" style="flex-direction: row;">
        <form action="<?php echo sec($_SERVER['PHP_SELF']);?>" method="GET">
          <input type="text" name="nameSearch" placeholder="<?php echo sec($lang['placeholderSearch']); ?>">
          <button name="btn-search"><?php echo sec($lang['search']); ?></button>
        </form>

        <div class="TotalPrice">
          <?php 
          $QueryTotal = mysqli_query($db, "SELECT * FROM `useful`");
          $Total = 0;
          while($RowTotal = mysqli_fetch_assoc($QueryTotal)){
            $Total += $RowTotal['price'];
          }
        ?>
          <h5 style="font-family: 'Droid Arabic Kufi',sans-serif;"><?php echo sec($lang['dahat']); ?> <?php echo $Total; ?></h5>
        </div>
      </div>



      <?php

      if(isset($_GET['btn-search'])){
        $NameSearch = sec($_GET['nameSearch']);

        if(empty($NameSearch)){
          echo "<script> alert('wrong'); </script>";
        } else {
          $QuerySearch = mysqli_query($db , "SELECT * FROM `user` WHERE `name` LIKE '%$NameSearch%'");
          if(mysqli_num_rows($QuerySearch) > 0){
      ?>

<div class="formAddUser" style="background: none;">
        <table class="table">
                <thead>
                  <tr class="text-end" style="background: #FFCE54;">
                    <th scope="col"><?php echo sec($lang['Update']); ?></th>
                    <th scope="col"><?php echo sec($lang['AllMonth']); ?></th>
                    <th scope="col"><?php echo sec($lang['EndDate']); ?></th>
                    <th scope="col"><?php echo sec($lang['startDate']); ?></th>
                    <th scope="col"><?php echo sec($lang['gender']); ?></th>
                    <th scope="col"><?php echo sec($lang['name']); ?></th>
                    <th scope="col">#</th>
                  </tr>
                </thead>
                <tbody class="text-end">
                  <?php 
                  $NowDate = date("Y-m-d");
                  $finalDate = date("Y-m-d", strtotime("+1 month"));
                    while($RowUser = mysqli_fetch_assoc($QuerySearch)){?>
                    <tr>
                      <td><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo sec($RowUser['id']); ?>"><?php echo sec($lang['Update']); ?></button></td>
                      <td><?php echo sec($RowUser['month']); ?></td>
                      <td><?php echo sec($RowUser['date_end']); ?></td>
                      <td><?php echo sec($RowUser['date_start']); ?></td>
                      <td><?php echo sec($RowUser['gender']); ?></td>
                      <td><?php echo sec($RowUser['name']); ?></td>
                      <th scope="row"><?php echo sec($RowUser['id']); ?></th>
                    </tr>
 <!-- Modal -->
 <div class="modal fade" id="exampleModal<?php echo sec($RowUser['id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h1 class="text-end text-dark fs-4" style="font-family: 'Droid Arabic Kufi',sans-serif;"><?php echo sec($lang['newSubscribe']); ?></h1>

          <form class="text-dark" action="modal/UpdateUser.inc.php" method="POST">

            <select name="subscribe" class="form-select text-end mt-4" id="priceSubscribe" aria-label="Default select example">
                <option value="" selected> <?php echo sec($lang['SelectcategoriesSubscribe']); ?></option>
                <option data-id="25000">ئشتراکا عادی</option>
                <option data-id="30000">ئشتراک دگەل ئاڤێ</option>
                <option data-id="35000">ئشتراک دگەل ساونا</option>
            </select>

              <script>
                $("#priceSubscribe").change(function(){
                    var styleBorder = $(this).children('option:selected').data('id');
                    
                    $("#numPrice").val(styleBorder);
                })
            </script>


            <div class="mb-3 mt-4 text-end">
              <label for="exampleInputEmail1" class="form-label text-dark"><?php echo sec($lang['priceSubscribe']); ?></label>
              <input type="text" name="price" class="form-control text-end" id="numPrice" placeholder="<?php echo sec($lang['price']); ?>">
              <input type="text" name="id" hidden value="<?php echo sec($RowUser['id']); ?>">
            </div>

            <div class="mb-3 text-end">
              <label for="exampleInputPassword1" class="form-label text-dark"><?php echo sec($lang['startDate']); ?></label>
              <input type="date" value="<?php echo $NowDate; ?>" name="date_start" class="form-control text-end" id="exampleInputPassword1">
            </div>

            <div class="mb-3 text-end">
              <label for="exampleInputPassword1" class="form-label text-dark"><?php echo sec($lang['EndDate']); ?></label>
              <input type="date" value="<?php echo $finalDate; ?>" name="date_end" class="form-control text-end" id="exampleInputPassword1">
            </div>

            <div class="mb-3 text-end">
                <select name="qarz" class="form-select text-end mt-4" aria-label="Default select example">
                    <option selected value=""> <?php echo sec($lang['noMoneyAddUser']); ?></option>
                    <option value="0"><?php echo sec($lang['yes']); ?></option>
                    <option value="1"><?php echo sec($lang['no']); ?></option>
                  </select>
            </div>

            <button type="submit" name="update" class="btn btn-warning w-100 text-light"><?php echo sec($lang['Update']); ?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
                    <?php } ?>
                </tbody>
          </table>
    </div>
    <?php } } die(); } ?>
































<div class="formAddUser" style="background: none;">
        <table class="table">
                <thead>
                  <tr class="text-end" style="background: #FFCE54;">
                    <th scope="col"><?php echo sec($lang['Update']); ?></th>
                    <th scope="col"><?php echo sec($lang['AllMonth']); ?></th>
                    <th scope="col"><?php echo sec($lang['EndDate']); ?></th>
                    <th scope="col"><?php echo sec($lang['startDate']); ?></th>
                    <th scope="col"><?php echo sec($lang['gender']); ?></th>
                    <th scope="col"><?php echo sec($lang['name']); ?></th>
                    <th scope="col">#</th>
                  </tr>
                </thead>
                <tbody class="text-end">
                  <?php 
                  $NowDate = date("Y-m-d");
                  $finalDate = date("Y-m-d", strtotime("+1 month"));
                    $query = mysqli_query($db, "SELECT * FROM `user`");
                    while($RowUser = mysqli_fetch_assoc($query)){?>
                    <tr>
                      <td><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo sec($RowUser['id']); ?>"><?php echo sec($lang['Update']); ?></button></td>
                      <td><?php echo sec($RowUser['month']); ?></td>
                      <td><?php echo sec($RowUser['date_end']); ?></td>
                      <td><?php echo sec($RowUser['date_start']); ?></td>
                      <td><?php echo sec($RowUser['gender']); ?></td>
                      <td><?php echo sec($RowUser['name']); ?></td>
                      <th scope="row"><?php echo sec($RowUser['id']); ?></th>
                    </tr>
 <!-- Modal -->
 <div class="modal fade" id="exampleModal<?php echo sec($RowUser['id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h1 class="text-end text-dark fs-4" style="font-family: 'Droid Arabic Kufi',sans-serif;"><?php echo sec($lang['newSubscribe']); ?></h1>

          <form class="text-dark" action="modal/UpdateUser.inc.php" method="POST">

            <select name="subscribe" class="form-select text-end mt-4" id="priceSubscribe" aria-label="Default select example">
                <option value="" selected> <?php echo sec($lang['SelectcategoriesSubscribe']); ?></option>
                <option data-id="25000">ئشتراکا عادی</option>
                <option data-id="30000">ئشتراک دگەل ئاڤێ</option>
                <option data-id="35000">ئشتراک دگەل ساونا</option>
            </select>

              <script>
                $("#priceSubscribe").change(function(){
                    var styleBorder = $(this).children('option:selected').data('id');
                    
                    $("#numPrice").val(styleBorder);
                })
            </script>


            <div class="mb-3 mt-4 text-end">
              <label for="exampleInputEmail1" class="form-label text-dark"><?php echo sec($lang['priceSubscribe']); ?></label>
              <input type="text" name="price" class="form-control text-end" id="numPrice" placeholder="<?php echo sec($lang['price']); ?>">
              <input type="text" name="id" hidden value="<?php echo sec($RowUser['id']); ?>">
            </div>

            <div class="mb-3 text-end">
              <label for="exampleInputPassword1" class="form-label text-dark"><?php echo sec($lang['startDate']); ?></label>
              <input type="date" value="<?php echo $NowDate; ?>" name="date_start" class="form-control text-end" id="exampleInputPassword1">
            </div>

            <div class="mb-3 text-end">
              <label for="exampleInputPassword1" class="form-label text-dark"><?php echo sec($lang['EndDate']); ?></label>
              <input type="date" value="<?php echo $finalDate; ?>" name="date_end" class="form-control text-end" id="exampleInputPassword1">
            </div>

            <div class="mb-3 text-end">
                <select name="qarz" class="form-select text-end mt-4" aria-label="Default select example">
                    <option selected value=""> <?php echo sec($lang['noMoneyAddUser']); ?></option>
                    <option value="0"><?php echo sec($lang['yes']); ?></option>
                    <option value="1"><?php echo sec($lang['no']); ?></option>
                  </select>
            </div>

            <button type="submit" name="update" class="btn btn-warning w-100 text-light"><?php echo sec($lang['Update']); ?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
                    <?php } ?>
                </tbody>
          </table>
    </div>

    <script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


        </div>
    </div>
    </div>


   