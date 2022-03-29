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

<div class="numGym">
        <div class="left">
        <?php
            $query = mysqli_query($db, "SELECT * FROM `protin`");
            $countPrice = 0;
            while($row = mysqli_fetch_assoc($query)){
              $countPrice += $row['price_protin'];
            }?>
            <h5 style="font-family: 'Droid Arabic Kufi',sans-serif;"> <?php echo sec($lang['dahat']); ?> <?php echo $countPrice; ?></h5>
        </div>

        <div class="right">

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
<?php echo sec($lang['BuyProtin']); ?>
</button>
            
        </div>
    </div>

<div class="formAddUser" style="background: none;">
        <table class="table">
                <thead>
                  <tr class="text-end" style="background: #FFCE54;">
                    <th scope="col"><?php echo sec($lang['date']); ?></th>
                    <th scope="col"><?php echo sec($lang['priceProtin']); ?></th>
                    <th scope="col"><?php echo sec($lang['NameProtin']); ?></th>
                    <th scope="col"><?php echo sec($lang['NameUser']); ?></th>
                    <th scope="col"><?php echo sec($lang['admin']); ?></th>
                    <th scope="col">#</th>
                  </tr>
                </thead>
                <tbody class="text-end">
                <?php
                  $ProtinQuery = mysqli_query($db , "SELECT * FROM `protin`");
                  while($RowProduct = mysqli_fetch_assoc($ProtinQuery)){
                    $AdminId = $RowProduct['admin_id'];?>
                ?>
                <tr>
                    <td><?php echo sec($RowProduct['date']); ?></td>
                     <td><?php echo sec($RowProduct['price_protin']);?></td>
                    <td><?php echo sec($RowProduct['protin_name']); ?></td>
                    <td><?php echo sec($RowProduct['username']); ?></td>
                    <?php
                    $QueryAdmin = mysqli_query($db , "SELECT * FROM `admin` WHERE `id` = '$AdminId' ");
                    while($RowAdmin = mysqli_fetch_assoc($QueryAdmin)){?>
                    <td><?php echo sec($RowAdmin['name']); ?></td>
                    <?php } ?>
                    <th scope="row"><?php echo sec($RowProduct['id']); ?></th>
                </tr>

                <?php } ?>
                </tbody>
          </table>
    </div>

     




      
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h1 class="text-end text-dark fs-4" style="font-family: 'Droid Arabic Kufi',sans-serif;"><?php echo sec($lang['BuyProtin']); ?></h1>

          <form class="text-dark" action="modal/BuyProtin.inc.php" method="POST" enctype='multipart/form-data'>

          <?php 
            if(isset($_SESSION['adminid'])){
              $userid = $_SESSION['adminid'];
           } 
          ?>
            <div class="mb-3 mt-4 text-end">
              <label for="exampleInputEmail1" class="form-label text-dark"><?php echo sec($lang['NameUser']); ?></label>
              <input type="text" name="adminid" hidden value="<?php echo $userid; ?>" class="form-control text-end" placeholder="ناڤ" id="exampleInputEmail1" aria-describedby="emailHelp">
              <input type="text" name="nameUser" class="form-control text-end" placeholder="<?php echo sec($lang['name']); ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3 mt-4 text-end">
              <label for="exampleInputEmail1" class="form-label text-dark"><?php echo sec($lang['NameProtin']); ?></label>
              <input type="text" name="nameProtin" class="form-control text-end" placeholder="<?php echo sec($lang['name']); ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3 mt-4 text-end">
                <label for="exampleInputEmail1" class="form-label text-dark"><?php echo sec($lang['priceProtin']); ?></label>
                <input type="text" name="priceProtin" class="form-control text-end" placeholder="<?php echo sec($lang['price']); ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>

            <div class="modal-footer">
                <button type="submit" name="send" class="btn btn-warning text-light"><?php echo sec($lang['Buy']); ?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


        </div>
    </div>
    </div>
