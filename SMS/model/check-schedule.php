<?php
include("connection.php");
$sy = $_POST["sy"];
$sem = $_POST["sem"];
$subject = $_POST["subject"];
$course = $_POST["course"];
$section = $_POST["section"];
$ylevel = $_POST["ylevel"];

    $data_query = mysqli_query($connection,"SELECT * FROM schedules WHERE sy = '".$_POST["sy"]."' AND sem = '".$_POST["sy"]."'
    AND subject_code = '".$_POST["subject"]."' AND course_code = '".$_POST["course"]."' 
    AND section = '".$_POST["section"]."' AND ylevel = '".$_POST["ylevel"]."' ");
    if(mysqli_num_rows($data_query)>0){
        $row = mysqli_fetch_assoc($data_query);
        echo json_encode($row);
    }else {
        echo json_encode("");
    }
    
 

?>