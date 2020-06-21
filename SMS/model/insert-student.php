<?php
include("connection.php");
$id = $_POST["id"];
$studid = $_POST["studid"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mname = $_POST["mname"];
$section = $_POST["section"];
$course = $_POST["course"];
$ylevel = $_POST["ylevel"];
$utype="Student";
$sub_id = "";
if($id=="") {
    mysqli_query($connection,"INSERT INTO students(studid,fname,lname,mname,course,ylevel,section)
    VALUES('$studid','$fname','$lname','$mname','$course','$ylevel','$section') ");

    $query_user = mysqli_query($connection,"SELECT * FROM students ORDER BY id DESC LIMIT 1");
    while($row = mysqli_fetch_assoc($query_user)){
        $sub_id = $row["id"];
    }

    mysqli_query($connection,"INSERT INTO users(userid,utype,username,password)
    VALUES('$sub_id','$utype','$studid','$lname') ");
}
else {
    mysqli_query($connection, "UPDATE students SET 
        fname = '$fname',
        lname = '$lname',
        mname = '$mname',
        course = '$course', 
        ylevel = '$ylevel',
        section = '$section'
        WHERE id = '$id'
    ");

    mysqli_query($connection, "UPDATE users SET 
    password = '$lname'
    WHERE id = '$id'
    ");
}

?>