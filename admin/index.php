<?php
session_start();
include '../includes/db_connect.php';

$err = "";
if (isset($_GET["destination"])) {
  $err = "<div id='err'>&#9888 You need to Log In first</div>";
}
if(isset($_SESSION["admin"]))
{
  header("Location: applications.php");
}

if(isset($_POST["username"])&&isset($_POST["password"]))
{
  $uname = $_POST["username"];
  $pwd = $_POST["password"];
  $err = "<div id='err'>".login($uname, $pwd)."</div>";
}


function login($uname, $pwd){
  global $conn;
  global $conn_message;
  $status = "";

  if(isset($uname) && isset($pwd))
  {
    if($uname != "" && $pwd != "")
    {
        $sql = "SELECT admin_id, full_name FROM admin WHERE email_id = '$uname' AND password = '$pwd' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $count = mysqli_num_rows($result);

        if($count == 1){
          $_SESSION["admin"] = $row["full_name"];
          $_SESSION["aid"] = $row["user_id"];
          header('Location: /Lomasys/admin/applications.php');
        }
        else {
          $status = "&#9888 Username or Password Incorrect";
        }
    }

    else {
      $status = "Please enter all the details";
      }
    }
  return $status;
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin Login | Lomasys</title>
    <meta name="description" content="A Platform from where you can trade your products anywhere in India">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0">

    <link rel="stylesheet" href="../css/login.css">

    <!-- plugins -->
    <script type="text/javascript" src="../js/jquery.js"></script>
  </head>
  <body>
    <script type="text/javascript">
    $(document).ready(function hash(){
      if (window.location.hash == "#signup") {
        $("#lhead").removeClass("activelogin");
        $("#signup").addClass("as");
        $("#login").removeClass("al");
        $("#shead").addClass("activesignup");
      }
      else {
        $("#lhead").addClass("activelogin");
        $("#signup").removeClass("as");
        $("#login").addClass("al");
        $("#shead").removeClass("activesignup");
      }
    });
    </script>

    <?php echo $err; ?>

    <div id="pg-wrapper">
      <div id="ct-wrapper" class="shdw-2">
        <div class="head">
          <h2 id="lhead">Admin Login</h2>
        </div>
        <div class="g-line"></div>

        <div id="login">

        <div class="mob"></div>
        <div class="user">
        <form class="info-form" action="index.php" method="post">
          <p>User Name</p>
          <input type="text" name="username" autofocus>
          <p>Password</p>
          <input type="password" name="password"><br>
          <input type="submit" name="login" value="Login">
        </form>
      </div>
        </div><!-- End Login -->
      </div><!-- End ct-wrapper -->
    </div><!-- End pg-wrapper -->
    <script type="text/javascript" src="../js/login.js"></script>
  </body>
</html>
