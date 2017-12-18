<?php
session_start();
include 'includes/db_connect.php';
$list = "";

if (isset($_SESSION['user'])&&isset($_SESSION['uid'])) {

$sql = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM loan_accounts WHERE acc_no=$_SESSION[uid]"));

$amount = $sql['initial_amount'];
$rate = $sql['interest_rate'] / 1200; // Monthly interest rate
$term = $sql['tenure']; // Term in months

$emi = $amount * $rate * (pow(1 + $rate, $term) / (pow(1 + $rate, $term) - 1));

  for($i = 1; $i < $sql['tenure'] + 1; $i++){
    $list .=  "<tr>
              <td>$i</td>
              <td>".date('d/m/Y', strtotime("+$i months"))."</td>
              <td>".round($emi, 1)."</td>
            </tr>";
  }

  if ($sql['account_active'] == 0) {
    $err = "<b>Loan Not approved by Admin but you can see the EMI dates</b>";
  }
  else {
    $err = "";
  }
}
else {
  header("Location: login.php");
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Query | Loan Management System</title>
    <meta name="description" content="A Platform to manage your Loans">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css?v=2">
    <link rel="stylesheet" href="css/query.css">

    <!-- plugins -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/animate.css">
  </head>
  <body>
    <?php include 'header.php'; ?>
    <div class="container">
      <h2>EMI Payment Details</h2>
      <?php echo $err; ?>
    <div class="emi">
      <table>
        <tr>
          <th>Sr No</th>
          <th>Payment Date</th>
          <th>Amount to be Paid</th>
        </tr>
        <?php echo $list; ?>
      </table>
    </div>
  </div>
  </body>
  </html>
