<?php
include("connection.php");
$delete_query = "DELETE FROM admins WHERE id = '".$_POST["id"]."' ";
mysqli_query($connection, $delete_query);

$delete_query = "DELETE FROM users WHERE userid = '".$_POST["id"]."' ";
mysqli_query($connection, $delete_query);
?>