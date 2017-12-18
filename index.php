<?php
session_start();

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lomasys | Loan Management System</title>
    <meta name="description" content="A Platform from where you can trade your products anywhere in India">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css?v=2">

    <!-- plugins -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/animate.css">
  </head>
  <body>
    <?php include 'header.php'; ?>
      <section id="banner">
        <h1 style="position: relative;
top: 150px;
left: 250px;
font-size: 700;
color: #0091EA;
font-size: 70px">Manage your Loans</h1>
  <a href="apply.php" style="position: relative;
top: 150px;
left: 250px;
font-size: 700;
color: #000;
border: 1px solid #000;
text-decoration: none;
box-shadow: 0 0 2px 5px #333;
font-size: 70px">Apply Now</a>
      </section>
      <section id="categories">
        <h2><center>Features</center></h2>
        <div class="container">
          <div class="catelem col-xs-12 col-sm-6 col-md-3 ">
            <div class="cat shdw-2">
              <img src="images/icons/usermgt.png" alt="">
              <h3><center><a href="admin/applications.php">User Management</a></center></h3>
            </div>
          </div>
          <div class="catelem col-xs-12 col-sm-6 col-md-3">
            <div class="cat shdw-2">
              <img src="images/icons/application.png" alt="">
              <h3><center><a href="apply.php">Loan Application</a></center></h3>
            </div>
          </div>
          <div class="catelem col-xs-12 col-sm-6 col-md-3">
            <div class="cat shdw-2">
              <img src="images/icons/query.png" alt="">
              <h3><center><a href="query.php">Query</a></center></h3>
            </div>
          </div>
          <div class="catelem col-xs-12 col-sm-6 col-md-3">
            <div class="cat shdw-2">
              <img src="images/icons/transaction.png" alt="">
              <h3><center><a href="#">Transaction</a></center></h3>
            </div>
          </div>
      </div>

      </section>
      <section id="ads">
        <h2><center>Categories</center></h2>
        <div class="container">
          <div class="catelem col-xs-12 col-sm-6 col-md-3 ">
            <div class="cat shdw-2">
              <img src="images/icons/home.png" alt="">
              <h3><center>Home Loan</center></h3>
            </div>
          </div>
          <div class="catelem col-xs-12 col-sm-6 col-md-3">
            <div class="cat shdw-2">
              <img src="images/icons/personal.png" alt="">
              <h3><center>Personal Loan</center></h3>
            </div>
          </div>
          <div class="catelem col-xs-12 col-sm-6 col-md-3">
            <div class="cat shdw-2">
              <img src="images/icons/study.png" alt="">
              <h3><center>Education Loan</center></h3>
            </div>
          </div>
          <div class="catelem col-xs-12 col-sm-6 col-md-3">
            <div class="cat shdw-2">
              <img src="images/icons/car.png" alt="">
              <h3><center>Automotive Loan</center></h3>
            </div>
          </div>
      </div>
      </section>
      <footer>

      </footer>
      <script type="text/javascript" src="js/home.js"></script>
  </body>
</html>
