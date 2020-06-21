<?php
include("../../model/connection.php");
session_start();
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$fullname = "";
$userid = "";
$utype = "";
if(isset($_SESSION["id"])) {
  $id = $_SESSION["id"];
  $check_user = mysqli_query($connection,"SELECT * FROM users WHERE id = '$id'");
  $fetch = mysqli_fetch_assoc($check_user);
  $utype = $fetch["utype"];
  $userid = $fetch["userid"];
  if($utype == "Superadmin")
  {
    $user = mysqli_query($connection,"SELECT * FROM admins WHERE id = '$userid'");
    $userFetch =  mysqli_fetch_assoc($user);
    $fullname = $userFetch["fname"] . " " . $userFetch["lname"];
  }
  else if($utype == "Admin")
  {
    $user = mysqli_query($connection,"SELECT * FROM admins WHERE id = '$userid'");
    $userFetch =  mysqli_fetch_assoc($user);
    $fullname = $userFetch["fname"] . " " . $userFetch["lname"];
    if($url == "http://localhost/sms/public/admin/admin") {
      echo "<script>window.location.href='../../admin-authentication';</script>";
    }else{}
  }
  else if( $utype == "Faculty")
  {
    $user = mysqli_query($connection,"SELECT * FROM facultys WHERE id = '$userid'");
    $userFetch =  mysqli_fetch_assoc($user);
    $fullname = $userFetch["fname"] . " " . $userFetch["lname"];
    
    if($url == "http://localhost/sms/public/admin/faculty" || $url == "http://localhost/sms/public/admin/admin") {
      echo "<script>window.location.href='../../admin-authentication';</script>";
    }else{}
  }
  else { echo "<script>window.location.href='../../admin-authentication';</script>"; }
}
else { echo "<script>window.location.href='../../hack';</script>"; }

?>