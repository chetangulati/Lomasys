<?php
session_start();
include '../includes/db_connect.php';
$al = "";
$hl = "";
$pl = "";
$el = "";
if (isset($_SESSION['admin'])) {
  //category auto
  $auto = mysqli_query($conn, "SELECT * FROM loan_accounts WHERE category='Automotive' AND account_active=0");
  if (mysqli_num_rows($auto) == 0) {
    $al = "<h3  >No pending approvals for this category</h3>";
  }
  while($row1 = mysqli_fetch_assoc($auto))
  {
    $per1 = ($row1["cibil"]/1000)*100;
    $p1 = 100 - $per1;
    $al .= "  <div class='cards shdw-2 animated fadeInUp'>
        <img src='../images/ads/$row1[image]' alt='$row1[acc_no]'>
        <h3>Acc Number $row1[acc_no]</h3>
        <h3 style='float: right'>Rs. $row1[initial_amount] /-</h3>
        <h3 style='clear: right'>PAN No. - $row1[pan]</h3>
        <h3 style='float: right'>Cibil Score - $row1[cibil]</h3>
        <h3 style='float: left; clear: right'>Tenure - $row1[tenure] Months</h3>
        <div class='a'><div class='score' style='width: $p1%'></div></div>
        <button type='button' name='approve'>Approve</button>
      </div>";
  }

  //category home
  $home = mysqli_query($conn, "SELECT * FROM loan_accounts WHERE category='Home' AND account_active=0");
  if (mysqli_num_rows($home) == 0) {
    $hl = "<h3   >No pending approvals for this category</h3>";
  }
  while($row2 = mysqli_fetch_assoc($home))
  {
    $per2 = ($row2["cibil"]/1000)*100;
    $p2 = 100 - $per2;
    $hl .= "  <div class='cards shdw-2 animated fadeInUp'>
        <img src='../images/ads/$row2[image]' alt='$row2[acc_no]'>
        <h3>Acc Number $row2[acc_no]</h3>
        <h3 style='float: right'>Rs. $row2[initial_amount] /-</h3>
        <h3 style='clear: right'>PAN No. - $row2[pan]</h3>
        <h3 style='float: right'>Cibil Score - $row2[cibil]</h3>
        <h3 style='float: left; clear: right'>Tenure - $row2[tenure] Months</h3>
        <div class='a'><div class='score' style='width: $p2%'></div></div>
        <button type='button' name='approve'>Approve</button>
      </div>";
  }

  //category personal
  $personal = mysqli_query($conn, "SELECT * FROM loan_accounts WHERE category='Personal' AND account_active=0");
  if (mysqli_num_rows($personal) == 0) {
    $pl = "<h3   > No pending approvals for this category</h3>";
  }
  while($row3 = mysqli_fetch_assoc($personal))
  {
    $per3 = ($row3["cibil"]/1000)*100;
    $p3 = 100 - $per3;
    $pl .= "  <div class='cards shdw-2 animated fadeInUp'>
        <img src='../images/ads/$row3[image]' alt='$row3[acc_no]'>
        <h3>Acc Number $row3[acc_no]</h3>
        <h3 style='float: right'>Rs. $row3[initial_amount] /-</h3>
        <h3 style='clear: right'>PAN No. - $row3[pan]</h3>
        <h3 style='float: right'>Cibil Score - $row3[cibil]</h3>
        <h3 style='float: left; clear: right'>Tenure - $row3[tenure] Months</h3>
        <div class='a'><div class='score' style='width: $p3%'></div></div>
        <button type='button' name='approve'>Approve</button>
      </div>";
  }


  //category education

  $edu = mysqli_query($conn, "SELECT * FROM loan_accounts WHERE category='Education' AND account_active=0");
  if (mysqli_num_rows($edu) == 0) {
    $el = "<h3>No pending approvals for this category</h3>";
  }
  while($row4 = mysqli_fetch_assoc($edu))
  {
    $per4 = ($row4["cibil"]/1000)*100;
    $p4 = 100 - $per4;
    $el .= "  <div class='cards shdw-2 animated fadeInUp'>
        <img src='../images/ads/$row4[image]' alt='$row4[acc_no]'>
        <h3>Acc Number $row4[acc_no]</h3>
        <h3 style='float: right'>Rs. $row4[initial_amount] /-</h3>
        <h3 style='clear: right'>PAN No. - $row4[pan]</h3>
        <h3 style='float: right'>Cibil Score - $row4[cibil]</h3>
        <h3 style='float: left; clear: right'>Tenure - $row4[tenure] Months</h3>
        <div class='a'><div class='score' style='width: $p4%'></div></div>
        <button type='button' name='approve'>Approve</button>
      </div>";
  }

}
else {
  header("Location: /Lomasys/admin/index.php");
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>User Management | Lomasys</title>
    <meta name="description" content="A Platform from where you can trade your products anywhere in India">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0">
    <link rel="stylesheet" href="../css/ads.css?v=1">


    <!-- plugins -->
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">

    <style media="screen">
      .a{
        background-image: linear-gradient(to right, red , #08f508 );
        width: 60%;
        margin: 30px 5% 10px 5%;
        float: left;
        position: relative;
        height: 10px;
      }
      .score{
        height: 10px;
        background: #fff;
        float: right;
      }
      button{
        float: right;
        margin-right: 30px;
        border: 0;
        background: blue;
        color: #fff;
        font-size: 20px;
        padding: 5px;
        box-shadow: 0 2px 8px 2px rgba(0 , 0 , 0 , 0.4 );
      }
    </style>

  </head>
  <body>
    <?php include '../header.php'; ?>
    <div id="sidenav">
      <nav>
        <ul class="nav nav-pills">
          <li class="active"><a data-toggle="pill" href="#clothing">Automotive Loan</a></li>
          <li><a href="#household" data-toggle="pill">Home Loan</a></li>
          <li><a href="#electronics" data-toggle="pill">Personal Loan</a></li>
          <li><a href="#realestate" data-toggle="pill">Education Loan</a></li>
        </ul>
      </nav>
    </div>
    <section id="main-ct">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="clothing">
          <?php echo $al; ?>
        </div>
        <div class="tab-pane fade" id="household">
          <?php echo $hl; ?>

        </div>

        <div class="tab-pane fade" id="electronics">
          <?php echo $pl; ?>

        </div>

        <div class="tab-pane fade" id="realestate">
          <?php echo $el; ?>

        </div>
      </div>
    </section>
    <script type="text/javascript" src="js/ads.js"></script>
  </body>
