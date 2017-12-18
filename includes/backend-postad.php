<?php
include 'db_connect.php';

function postad($tenure, $pan, $cibil, $amt, $accno, $img_name, $img_temp, $cat)
{
  $err = "";
  global $conn;

  // image upload script
  if ($img_name != "") {
  $imgfiletype = pathinfo($img_name,PATHINFO_EXTENSION);
  $temp = explode(".", $img_name);
  $newfilename = round(microtime(true)) .'.'. end($temp);


  $upload = move_uploaded_file($img_temp, "images/ads/$newfilename");

  if(!$upload) {
    $err = 'Sorry, there was an error uploading your file.';
    exit();
  }
}
else {
  $newfilename = "default.png";
}

$rs = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM interest_rates"));

if ($cat = 'Automotive') {
  $ir = $rs['automotive_loan'];
}
elseif ($cat = "edu") {
  $ir = $rs['education_loan'];
}
elseif ($cat = "home") {
  $ir = $rs['home_loan'];
}
else {
  $ir = $rs['personal_loan'];
}

//insert into db
$sql = mysqli_query($conn, "INSERT into loan_accounts (acc_no, pan, cibil, category, interest_rate, current_amount, initial_amount, tenure, image) values ($accno , '$pan', $cibil, '$cat', $ir ,$amt, $amt, $tenure, '$newfilename')");

if(!$sql){
  $err = mysqli_error($conn);
}else {
  header('Location: query.php');
}

return $err;
}
 ?>
