<?php
include("connection.php");
if(isset($_POST["course"])){
    $course = $_POST["course"];
    $section = $_POST["section"];
    $ylevel = $_POST["ylevel"];

    $sy = $_POST["sy"];
    $sem = $_POST["sem"];
    $subject = $_POST["subject"];
    $dayses = $_POST["days"];
    $instructorid = $_POST["instructorid"];
    $instructorname = $_POST["instructorname"];
    $uniq_id = $_POST["uniqid"];

    mysqli_query($connection,"INSERT INTO schedules(uniq_id,instructor_id,instructor_name,sy,sem,subject_code,course_code,section,ylevel,dayses)
    VALUES('$uniq_id','$instructorid','$instructorname','$sy','$sem','$subject','$course','$section','$ylevel','$dayses')");
    
    mysqli_query($connection,"SELECT * FROM schedules");
}
else {

}

?>