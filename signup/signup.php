<?php
include("../php/conn.php");

$first_name=$conn->real_escape_string(htmlentities($_POST["first_name"],ENT_QUOTES));
$email=$conn->real_escape_string(htmlentities($_POST["email"],ENT_QUOTES));
$last_name=$conn->real_escape_string(htmlentities($_POST["last_name"],ENT_QUOTES));
$address=$conn->real_escape_string(htmlentities($_POST["address"],ENT_QUOTES));
$phone=$conn->real_escape_string(htmlentities($_POST["phone"],ENT_QUOTES));
$password=$conn->real_escape_string(htmlentities($_POST["password"],ENT_QUOTES));

if (empty($first_name) || empty($address) || empty($last_name) || empty($phone)) {
  $_SESSION["success"]="All fields must be filled";
   header("location:signup");
 }else {


  $check=mysqli_query($conn,"SELECT * FROM email='$email'");
  $rows=mysqli_num_rows($check);
  if ($rows > 0) {

 $_SESSION["success"]="Email already exists";
  header("location:signup");
}else {
  $registration_date=date('l jS \of F Y h:i:s A');
    $insert=mysqli_query($conn, "insert into accounts set email='$email', last_name='$last_name', address='$address', first_name='$first_name', phone='$phone', registration_date='$registration_date'") or die(mysqli_error($conn));
  header("location:index.php");
}
}
?>
