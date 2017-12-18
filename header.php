<?php
if (isset($_SESSION['user'])) {
  $logged_in = "<a type='button'>$_SESSION[user]</a>
                <a type='button' href='includes/logout.php'>Log Out</a>";
}
else {
  $logged_in = "          <a type='button' href='login.php#signup' name='button'>Sign Up</a>
            <a type='button' href='login.php#login'  name='button'>Log In</a>";
}
 ?>

 <header>
   <a style="border: 0" href="/Lomasys/index.php"><img src="/Lomasys/images/logo.png" style="width: 100px; padding-left: 10px; float:left" alt=""></a>
   <div style="float:left; padding: 20px; font-weight: 600; font-size: 30px; color: #fff">
     Lomasys
   </div>
   <div class="login">
     <?php echo $logged_in; ?>
   </div>
   <nav id="mob-nav">

   </nav>
 </header>
