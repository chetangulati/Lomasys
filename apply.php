<?php include 'includes/backend-postad.php';
session_start();
$status = '';
  if(!isset($_SESSION["user"])){
    header("Location: login.php?destination=apply");
  }
  if(isset($_FILES['pic']['name'])&&isset($_POST['pan'])&&isset($_POST['cibil'])&&isset($_POST['tenure'])&&isset($_POST['category'])&&isset($_POST['amt'])  ) {
      $tenure = $_POST['tenure'];
      $amt = $_POST['amt'];
      $accno = $_SESSION['uid'];
      $cat = $_POST['category'];
      $pan = $_POST['pan'];
      $cibil = $_POST['cibil'];
      $img_name = $_FILES['pic']['name'];
      $img_temp = $_FILES['pic']['tmp_name'];
    if ($tenure == ""|| $amt == "" || $cat == "" || $pan == ""|| $cibil == "" ||$img_name == "") {
      $status = "<script>alert('Please Fill out all the fields')</script>";
    }
    else {
      $status = postad($tenure, $pan, $cibil, $amt, $accno, $img_name, $img_temp, $cat);
    }
  }

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lomasys | Apply for loan</title>
    <meta name="description" content="A Platform from where you can trade your products anywhere in India">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0">
    <link rel="stylesheet" href="css/postad.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- plugins -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
  </head>
  <body>
    <?php include 'header.php'; ?>
    <?php echo $status; ?>
    <div id="form-container">
      <form action="apply.php" enctype="multipart/form-data" method="post">
          <p>Upload Image</p>
          <input type="file" name="pic" required accept="image/*">
          <p>Pan Number</p>
          <input type="text" name="pan" required>
          <p>Cibil Score (out of 1000) </p>
          <input type="number" name="cibil" min="0" max="1000" required>
          <p>Proposed Loan Amount</p>
          <input type="number" name="amt" required>
          <p>Category</p>
          <select name="category" required>
            <option disabled selected>Select a Category</option>
            <option value="Automotive">Automotive Loan</option>
            <option value="Home">Home Loan</option>
            <option value="Education">Education Loan</option>
            <option value="Personal">Personal Loan</option>
          </select>
          <p>Tenure (in months)</p>
          <input type="number" name="tenure" value="" required>
          <input type="submit" value="Apply">
      </form>
    </div>
  </body>
