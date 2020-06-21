<?php
include("connection.php");
if(isset($_POST["item_day"]))
{
    $item_day = $_POST["item_day"];
    $item_from = $_POST["item_from"];
    $item_to = $_POST["item_to"];
    $item_room = $_POST["item_room"];
    $uniq_id = $_POST["uniq_id"];
    
    mysqli_query($connection,"SELECT * FROM schedules");
    sleep(1);
    $get_schedid = mysqli_query($connection,"SELECT * FROM schedules WHERE uniq_id = '".$_POST["uniq_id"]."' ");
    $print_id = mysqli_fetch_row($get_schedid);
    $scheduleid = $print_id[0];
    $ylevel = $print_id[9];
    $course  = $print_id[7];
    $section = $print_id[8];

    // $course  = $_POST["item_course"];
    // $section = $_POST["item_section"];
    // $ylevel = $_POST["item_ylevel"];

    $studid = array();

    $student_id_query = mysqli_query($connection,"SELECT * FROM students WHERE course = '".$course."' AND ylevel = '".$ylevel."' AND section = '".$section."' ");
    while($row = mysqli_fetch_assoc($student_id_query)) {
        array_push($studid, $row["studid"]);
    }
    for($count = 0; $count<count($item_day); $count++)
    {

        $subday = $item_day[$count];
        $subfrom = $item_from[$count];
        $subto = $item_to[$count];
        $subroom = $item_room[$count];
        for($c=0;$c<count($studid); $c++){
            $substudid = $studid[$c];
            mysqli_query($connection,"INSERT INTO classes(schedule_id,studid,dayses,time_from,time_to,room,absent,status)
            VALUES('$uniq_id','$substudid','$subday','$subfrom','$subto','$subroom','0','Enrolled')");
        }

    }
    echo "Schedule Successfully Save";

}
?>