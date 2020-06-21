<?php
include("connection.php");
$id = $_POST["id"];
$code = $_POST["subject-code"];
$desc = $_POST["subject-desc"];


if($id=="") {
    mysqli_query($connection,"INSERT INTO subjects(subject_code,subject_desc)
    VALUES('$code','$desc') ");
}
else {
    mysqli_query($connection, "UPDATE subjects SET 
        subject_code = '$code',
        subject_desc = '$desc'
        WHERE id = '$id'
    ");
}

?>