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
    if(isset($_SESSION['emptySubscribe'])){?>
    <script>
    swal({
    title: "<?php echo $_SESSION['emptySubscribe']; ?>",
    icon: "error",
    button: "باشە",
    });

    </script>
    <?php unset($_SESSION['emptySubscribe']); } ?>


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
                $("#sidebarCollapse").on("click" , function(){
                    $(".linkPages").toggleClass("d-none");
                })
            </script>

<div class="koiGshtiQarz">
        <h5 style="font-family: Droid Arabic Kufi,'sans-serif'; color: #111;">کۆیی گشتى قەرز : 120000</h5>
    </div>
    <div class="formAddUser" style="background: none;">
        <table class="table table-warning table-striped">
                <thead>
                  <tr class="text-end">
                    <th scope="col"><?php echo sec($lang['Update']); ?></th>
                    <th scope="col"><?php echo sec($lang['AllMonth']); ?></th>
                    <th scope="col"><?php echo sec($lang['EndDate']); ?></th>
                    <th scope="col"><?php echo sec($lang['startDate']); ?></th>
                    <th scope="col"><?php echo sec($lang['noMoneyAddUser']); ?></th>
                    <th scope="col"><?php echo sec($lang['gender']); ?></th>
                    <th scope="col"><?php echo sec($lang['name']); ?></th>
                    <th scope="col">#</th>
                  </tr>
                </thead>
                <tbody class="text-end">
                  <?php
                  $query = mysqli_query($db, "SELECT * FROM `user`");
                  $CountGamer = 0;
                  $NowDate = date("Y-m-d");
                  $finalDate = date("Y-m-d", strtotime("+1 month"));
                  $qarz = "";
                  while($row_select = mysqli_fetch_assoc($query)){
                    $CountGamer++;
                    if($row_select["date_end"] <= date("Y-m-d")){
                      if($row_select['qarz'] == "1")
                        $qarz = "نەخێر";
                      else 
                        $qarz = "بەلێ";

                        
                      ?>
                <tr>
                  <td><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo sec($row_select['id']); ?>">نویکرن</button></td>
                    <td><?php echo sec($row_select['month']); ?></td>
                    <td class="text-danger"><?php echo sec($row_select['date_end']); ?></td>
                    <td><?php echo sec($row_select['date_start']); ?></td>
                    <td><?php echo $qarz; ?></td>
                    <td><?php echo sec($row_select['gender']); ?></td>
                    <td><?php echo sec($row_select['name']); ?></td>
                    <th scope="row"><?php echo $CountGamer; ?></th>
                </tr>
                </tr>
 <!-- Modal -->
 <div class="modal fade" id="exampleModal<?php echo sec($row_select['id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h1 class="text-end text-dark fs-4"><?php echo sec($lang['newSubscribe']); ?></h1>

          <form class="text-dark" action="modal/updateDate.inc.php" method="POST">

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
              <input type="text" name="price" class="form-control text-end" id="numPrice" placeholder="price">
              <input type="text" hidden name="id" value="<?php echo sec($row_select['id']); ?>">
            </div>

            <div class="mb-3 text-end">
              <label for="exampleInputPassword1" class="form-label"><?php echo sec($lang['startDate']); ?></label>
              <input type="date" value="<?php echo $NowDate; ?>" name="date_start" class="form-control text-end" id="exampleInputPassword1">
            </div>

            <div class="mb-3 text-end">
              <label for="exampleInputPassword1" class="form-label"><?php echo sec($lang['EndDate']); ?></label>
              <input type="date" value="<?php echo $finalDate; ?>" name="date_end" class="form-control text-end" id="exampleInputPassword1">
            </div>

            <div class="mb-3 text-end">
                <select name="qarz" class="form-select text-end mt-4" aria-label="Default select example">
                    <option selected value=""><?php echo sec($lang['noMoneyAddUser']); ?></option>
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
                <?php } } ?>
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