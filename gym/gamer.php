<?php
 include'include/nav.php';

if(!isset($_SESSION['adminid'])){
  header("location:index.php");
}
?>
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

      <div class="numGym">
        <div class="left">
          <?php
            $query = mysqli_query($db, "SELECT * FROM `user`");
            $countMale = 0;
            $countFemali = 0;
            while($row = mysqli_fetch_assoc($query)){
              if($row['gender'] == "نێر")
                $countMale++;
              else if($row['gender'] == "مێ")
                $countFemali++;
            }?>
          <h5 style="font-family: 'Droid Arabic Kufi',sans-serif;"> <?php echo sec($lang['male']); ?> : <?php echo $countMale; ?></h5>
          <h5 style="font-family: 'Droid Arabic Kufi',sans-serif;"> <?php echo sec($lang['female']); ?> : <?php echo $countFemali; ?></h5>
        </div>

        <div class="right">
          <?php
            $query = mysqli_query($db, "SELECT * FROM `user`");
            $countUser = 0;
            while($row = mysqli_fetch_assoc($query)){
              $countUser++;
            }?>

          <h5 style="font-family: 'Droid Arabic Kufi',sans-serif;"><?php echo sec($lang['numAllUser']); ?> : <?php echo $countUser; ?></h5>

        </div>
      </div>



      <div class="search">
        <form action="<?php echo sec($_SERVER['PHP_SELF']);?>" method="GET">
          <input type="text" name="name" placeholder="<?php echo sec($lang['placeholderSearch']); ?>">
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
        $name = sec($_GET['name']);

        if(empty($name)){
          echo "<script> alert('wrong'); </script>";
        } else {
          $querySearch = mysqli_query($db , "SELECT * FROM `user` WHERE `name` LIKE '%$name%'");
  
          if(mysqli_num_rows($querySearch) > 0){
            ?>
      <div class="formAddUser" style="background: none;">
        <table class="table">
          <thead>
            <tr class="text-end" style="background: #FFCE54;">
              <th scope="col"><?php echo sec($lang['Delete']); ?></th>
              <th scope="col"><?php echo sec($lang['AllMonth']); ?></th>
              <th scope="col"><?php echo sec($lang['EndDate']); ?></th>
              <th scope="col"><?php echo sec($lang['startDate']); ?></th>
              <th scope="col"><?php echo sec($lang['noMoneyAddUser']); ?></th>
              <th scope="col"><?php echo sec($lang['priceSubscribe']); ?></th>
              <th scope="col"><?php echo sec($lang['admin']); ?></th>
              <th scope="col"><?php echo sec($lang['address']); ?></th>
              <th scope="col"><?php echo sec($lang['gender']); ?></th>
              <th scope="col"><?php echo sec($lang['name']); ?></th>
              <th scope="col">#</th>
            </tr>
          </thead>
          <tbody class="text-end">
            <?php
                    while($RowSerach = mysqli_fetch_assoc($querySearch)){
                      if(sec($RowSerach['qarz']) == 1){
                        $qarz = "نەخێر";
                      } else{
                        $qarz = "بەلێ";
                      }
                      ?>
            <tr>
            <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo sec($RowSerach['id']); ?>">
            <?php echo sec($lang['Delete']); ?>
                </button></td>              <td><?php echo sec($RowSerach['month']); ?></td>
              <td><?php echo sec($RowSerach['date_end']); ?></td>
              <td><?php echo sec($RowSerach['date_start']); ?></td>
              <td><?php echo sec($qarz); ?></td>
              <td><?php echo sec($RowSerach['price']); ?>د.ع</td>
              <?php 
                    if(isset($_SESSION['adminid'])){
                      $userid = $_SESSION['adminid'];
                    }
                    $queryAdmin = mysqli_query($db , "SELECT * FROM `admin` WHERE `id` = '$userid'");
                    while($RowAdmin = mysqli_fetch_assoc($queryAdmin)){?>
              <td><?php echo sec($RowAdmin['name']); }?></td>
              <td><?php echo sec($RowSerach['address']); ?></td>
              <td><?php echo sec($RowSerach['gender']); ?></td>
              <td><?php echo sec($RowSerach['name']); ?></td>
              <th scope="row"><?php echo sec($RowSerach['id']); ?></th>

            </tr>

            
              <!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo sec($RowSerach['id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <form action="modal/DeleteUser.inc.php" method="POST">
        <h4 class="text-center" style="font-family: 'Droid Arabic Kufi',sans-serif;"><?php echo sec($lang['AreUShureToDelte']); ?></h4>
        <input type="text" value="<?php echo $RowSerach['id']; ?>" hidden name="id">
        <div class="mt-4 text-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo sec($lang['no']); ?></button>
          <button class="btn btn-danger" name="delete"><?php echo sec($lang['yes']); ?></button>
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

      <?php } } exit(); } ?>





      <div class="formAddUser" style="background: none;">
        <table class="table">
          <thead>
            <tr class="text-end" style="background: #FFCE54;">
              <th scope="col"><?php echo sec($lang['Delete']); ?></th>
              <th scope="col"><?php echo sec($lang['AllMonth']); ?></th>
              <th scope="col"><?php echo sec($lang['EndDate']); ?></th>
              <th scope="col"><?php echo sec($lang['startDate']); ?></th>
              <th scope="col"><?php echo sec($lang['noMoneyAddUser']); ?></th>
              <th scope="col"><?php echo sec($lang['priceSubscribe']); ?></th>
              <th scope="col"><?php echo sec($lang['admin']); ?></th>
              <th scope="col"><?php echo sec($lang['address']); ?></th>
              <th scope="col"><?php echo sec($lang['gender']); ?></th>
              <th scope="col"><?php echo sec($lang['name']); ?></th>
              <th scope="col">#</th>
            </tr>
          </thead>
          <tbody class="text-end">
            <?php
                    $query = mysqli_query($db, "SELECT * FROM `user`");
                    $CountGamer = 0;
                    while($row = mysqli_fetch_assoc($query)){
                      $CountGamer++;
                      $Adminid = sec($row['admin_id']);
                      if(sec($row['qarz']) == 1){
                        $qarz = "نەخێر";
                      } else{
                        $qarz = "بەلێ";
                      }
                      ?>
            <tr>
            <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo sec($row['id']); ?>">
            <?php echo sec($lang['Delete']); ?>
                </button></td>
              <td><?php echo sec($row['month']); ?></td>
              <td><?php echo sec($row['date_end']); ?></td>
              <td><?php echo sec($row['date_start']); ?></td>
              <td><?php echo sec($qarz); ?></td>
              <td><?php echo sec($row['price']); ?>د.ع</td>
              <?php 
                    if(isset($_SESSION['adminid'])){
                      $userid = $_SESSION['adminid'];
                    }
                    $queryAdmin = mysqli_query($db , "SELECT * FROM `admin` WHERE `id` = '$Adminid'");
                    while($RowAdmin = mysqli_fetch_assoc($queryAdmin)){?>
              <td><?php echo sec($RowAdmin['name']); }?></td>
              <td><?php echo sec($row['address']); ?></td>
              <td><?php echo sec($row['gender']); ?></td>
              <td><?php echo sec($row['name']); ?></td>
              <th scope="row"><?php echo $CountGamer; ?></th>
            </tr>

            <!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo sec($row['id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <form action="modal/DeleteUser.inc.php" method="POST">
        <h4 class="text-center" style="font-family: 'Droid Arabic Kufi',sans-serif;"><?php echo sec($lang['AreUShureToDelte']); ?></h4>
        <input type="text" value="<?php echo $row['id']; ?>" hidden name="id">
        <div class="mt-4 text-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo sec($lang['no']); ?></button>
          <button class="btn btn-danger" name="delete"><?php echo sec($lang['yes']); ?></button>
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