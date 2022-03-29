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
      if(sec($row['qarz']) == 0)
      $totalPrice += sec($row['price']); }?>
        <h5 style="font-family: 'Droid Arabic Kufi',sans-serif;"><?php echo sec($lang['dahat']); ?> <?php echo $totalPrice; ?></h5>
    </div>
    <div class="formAddUser" style="background: none;">
        <table class="table table-warning table-striped">
                <thead>
                  <tr class="text-end">
                    <th scope="col"><?php echo sec($lang['AllMonth']); ?></th>
                    <th scope="col"><?php echo sec($lang['EndDate']); ?></th>
                    <th scope="col"><?php echo sec($lang['startDate']); ?></th>
                    <th scope="col"><?php echo sec($lang['price']); ?></th>
                    <th scope="col"><?php echo sec($lang['gender']); ?></th>
                    <th scope="col"><?php echo sec($lang['name']); ?></th>
                    <th scope="col">#</th>
                  </tr>
                </thead>
                <tbody class="text-end">
                <?php
                    $query = mysqli_query($db, "SELECT * FROM `user`");
                    while($row = mysqli_fetch_assoc($query)){
                      if(sec($row['qarz']) == 0){?>
                      
                <tr>
                    <td>هەیڤ  <?php echo sec($row['month']); ?></td>
                    <td><?php echo sec($row['date_end']); ?></td>
                    <td><?php echo sec($row['date_start']); ?></td>
                    <td>د.ع<?php echo sec($row['price']); ?></td>
                    <td><?php echo sec($row['gender']); ?></td>
                    <td><?php echo sec($row['name']); ?></td>
                    <th scope="row"><?php echo sec($row['id']); ?></th>
                </tr>
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
