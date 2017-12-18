<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', 'root');
define('DATABASE', 'loan_mgt_system');

$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);

if (!$conn) {
  $conn_message = "Can't connect";
  die();
}
else {
  $conn_message = "Connected to network successfully";
}
 ?>
