<?php include'include/nav.php'; ?>

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
  <?php
    $query = mysqli_query($db, "SELECT * FROM `user`");
    $totalPrice = 0;
    while($row = mysqli_fetch_assoc($query)){
      if(sec($row['qarz']) == 1)
      $totalPrice += sec($row['price_qarz']); }?>
        <h5 style="font-family: 'Droid Arabic Kufi',sans-serif;"><?php echo sec($lang['TotalQarz']); ?> <?php echo $totalPrice; ?></h5>
    </div>
    <div class="formAddUser" style="background: none;">


        <!-- ئەگەر زانیارى هاتنە فڕیکرن بۆ داتابەیسى -->
<?php
    if(isset($_SESSION['gratterPrice'])){?>
    <p class="text-danger text-center pt-2"><?php echo $_SESSION['gratterPrice']; ?></p>
    <?php unset($_SESSION['gratterPrice']); } ?>


<!-- ئەگەر زانیارى هاتنە فڕیکرن بۆ داتابەیسى -->
<?php
    if(isset($_SESSION['allPrice'])){?>
    <p class="text-success text-center pt-2"><?php echo $_SESSION['allPrice']; ?></p>
    <?php unset($_SESSION['allPrice']); } ?>

<!-- ئەگەر زانیارى هاتنە فڕیکرن بۆ داتابەیسى -->
<?php
    if(isset($_SESSION['justPrice'])){?>
      <p class="text-success text-center pt-2"><?php echo $_SESSION['justPrice']; ?></p>
    <?php unset($_SESSION['justPrice']); } ?>


        <table class="table table-warning table-striped">
                <thead>
                  <tr class="text-end">
                    <th scope="col"><?php echo sec($lang['wasl']); ?></th>
                    <th scope="col"><?php echo sec($lang['AllMonth']); ?></th>
                    <th scope="col"><?php echo sec($lang['EndDate']); ?></th>
                    <th scope="col"><?php echo sec($lang['startDate']); ?></th>
                    <th scope="col"><?php echo sec($lang['noMoney']); ?></th>
                    <th scope="col"><?php echo sec($lang['gender']); ?></th>
                    <th scope="col"><?php echo sec($lang['name']); ?></th>
                    <th scope="col">#</th>
                  </tr>
                </thead>
                <tbody class="text-end">
                <?php
                    $query = mysqli_query($db, "SELECT * FROM `user` WHERE `qarz` = 1");
                    while($row = mysqli_fetch_assoc($query)){?>

                <tr>
                    <td><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo sec($row['id']); ?>"><?php echo sec($lang['wasl']); ?></button></td>
                    <td><?php echo sec($row['month_qarz']); ?></td>
                    <td><?php echo sec($row['date_end']); ?></td>
                    <td><?php echo sec($row['date_start']); ?></td>
                    <td><?php echo sec($row['price_qarz']); ?>د.ع</td>
                    <td><?php echo sec($row['gender']); ?></td>
                    <td><?php echo sec($row['name']); ?></td>
                    <th scope="row"><?php echo sec($row['id']); ?></th>
                </tr>
                    <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo sec($row['id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-body">
                          <h1 class="text-end text-dark fs-4" style="font-family: 'Droid Arabic Kufi',sans-serif;"><?php echo sec($lang['wasl']); ?></h1>

                          <form class="text-dark" action="modal/qarz.inc.php" method="POST">

                            <div class="mb-3 mt-4 text-end">
                              <label for="exampleInputEmail1" class="form-label text-dark"><?php echo sec($lang['priceWasl']); ?></label>
                              <input type="text" name="id" value="<?php echo sec($row['id']); ?>" hidden>
                              <input type="text" name="price" class="form-control text-end" placeholder="<?php echo sec($lang['price']); ?>">
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger text-light" name="updateAllPrice"><?php echo sec($lang['QarzAll']); ?></button>
                                <button type="submit" class="btn btn-success" name="updatePrice"><?php echo sec($lang['wasl']); ?></button>
                            </div>
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

    
