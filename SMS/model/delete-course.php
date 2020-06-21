<?php
include("connection.php");
$delete_query = "DELETE FROM courses WHERE id = '".$_POST["id"]."' ";
mysqli_query($connection, $delete_query);
?>