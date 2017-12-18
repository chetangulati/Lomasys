<?php
include_once "db_connect.php";

function redirect(){
  if(isset($_GET["destination"])){
    $dest = $_GET["destination"];
      header("Location: $dest.php");
  }
  else {
    header("Location: index.php");
  }
}

  // Login
function login($uname, $pwd)
{
  global $conn;
  global $conn_message;
  $status = "";

  if(isset($uname) && isset($pwd))
  {
    if($uname != "" && $pwd != "")
    {
        $sql = "SELECT user_id, full_name FROM user WHERE email_id = '$uname' AND password = '$pwd' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $count = mysqli_num_rows($result);

        if($count == 1){
          $_SESSION["user"] = $row["full_name"];
          $_SESSION["uid"] = $row["user_id"];
          redirect();
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
}// End Login function

function signup($fname, $email, $m_no, $passwd)
{
  global $conn;
  global $conn_message;
  $status = "";

  if ($fname != "" && $email != "" && $m_no != ""&&$passwd != "") {
      // Validation
      if(!preg_match("/^[a-zA-Z ]*$/", $fname))
      {
        $status = "&#9888 Only letters and white space allowed in Name";
      }

      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        $status = "&#9888 Invalid email format";
      }

      elseif(!preg_match('/^[0-9]{10}$/', $m_no))
      {
        $status = '&#9888 Invalid Number!';
      }
      else {
        $sql = "INSERT INTO user (email_id, password, full_name, mob_no) VALUES ('$email', '$passwd', '$fname', $m_no)";
        $result = mysqli_query($conn, $sql);
        $get = "SELECT user_id FROM user WHERE email_id='$email' LIMIT 1";
        $res = mysqli_query($conn, $get);
        $row = mysqli_fetch_assoc($res);

        if(mysqli_errno($conn) == 1062)
        {
          $status = "&#9888 E-mail or Mobile Number already registered";
        }
        if($result)
        {
          $_SESSION["user"] = $fname;
          $_SESSION["uid"] = $row['user_id'];
          redirect();
        }
        else{
          $status = "&#9888 Some error occured, Please Try after sometime.";
        }
      }

  }
  else {
    $status = "&#9888 Please Fill all the details";
  }
  return $status;
}
?>
