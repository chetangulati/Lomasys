<?php
include 'includes/users.php';
session_start();
$dest = "";
$err = "";
if (isset($_GET["destination"])) {
  $err = "<div id='err'>&#9888 You need to Log In first</div>";
  $dest = "?destination=".$_GET['destination'];
}
if(isset($_SESSION["user"]))
{
  header("Location: index.php");
}

if(isset($_POST["username"])&&isset($_POST["password"]))
{
  $uname = $_POST["username"];
  $pwd = $_POST["password"];
  $err = "<div id='err'>".login($uname, $pwd)."</div>";
}

if(isset($_POST["name"])&&isset($_POST["mailid"])&&isset($_POST["m_no"])&&isset($_POST["passwd"]))
{
  $name = $_POST["name"];
  $email = $_POST["mailid"];
  $m_no = $_POST["m_no"];
  $passwd = $_POST["passwd"];
  $err = "<div id='err'>".signup($name, $email, $m_no, $passwd)."</div>";
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login | Trading India</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="A website which helps you in connecting nearby skilled peoples, so that you can learn anything at affordable prices. You can also split your skills to make some money.">
    <meta name="theme-color" content="#3F51B5">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Style Sheets -->
    <link rel="stylesheet" href="css/login.css">

    <!-- Plugins -->
    <script type="text/javascript" src="js/jquery.js"></script>

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
          <h2 id="lhead">Login</h2>
          <h2 id="shead">Sign Up</h2>
        </div>
        <div class="g-line"></div>

        <div id="login">

        <div class="mob"></div>
        <div class="user">
        <form class="info-form" action="login.php<?php echo $dest; ?>" method="post">
          <p>User Name</p>
          <input type="text" name="username" autofocus>
          <p>Password</p>
          <input type="password" name="password"><br>
          <input type="submit" name="login" value="Login">
        </form>
      </div>
        </div><!-- End Login -->

        <div id="signup">

        <div class="mob"></div>
        <div class="user">
          <script type="text/javascript">
            function numberkey(evt){
              var char = evt.charCodeAt(0);
              if(char > 47 && char < 58 || char == 43 || char == 45){
                return true;
              }
              return false;
            }
          </script>
        <form class="info-form" action="login.php<?php echo $dest; ?>#signup" method="post">
          <p>Full Name</p>
          <input type="text" name="name" autofocus>
          <p>Mobile Number</p>
          <input type="tel" onkeypress="return numberkey(event.key)" name="m_no">
          <p>E-mail ID</p>
          <input type="email" name="mailid">
          <p>Password</p>
          <input type="password" name="passwd">
          <input type="hidden" name="role" value="<?php echo $role; ?>">
          <input type="submit" name="signup" value="Sign Up">
        </form>
      </div>
        </div><!-- End Sign Up -->

      </div><!-- End ct-wrapper -->
    </div><!-- End pg-wrapper -->
    <script type="text/javascript" src="js/login.js"></script>
  </body>
</html>
