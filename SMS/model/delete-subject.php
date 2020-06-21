<?php
include("connection.php");
$delete_query = "DELETE FROM subjects WHERE id = '".$_POST["id"]."' ";
mysqli_query($connection, $delete_query);
?>