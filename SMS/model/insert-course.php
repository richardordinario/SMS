<?php
include("connection.php");
$id = $_POST["id"];
$code = $_POST["course-code"];
$desc = $_POST["course-desc"];


if($id=="") {
    mysqli_query($connection,"INSERT INTO courses(course_code,course_desc)
    VALUES('$code','$desc') ");
}
else {
    mysqli_query($connection, "UPDATE courses SET 
        course_code = '$code',
        course_desc = '$desc'
        WHERE id = '$id'
    ");
}

?>