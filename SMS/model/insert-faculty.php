<?php
include("connection.php");
$id = $_POST["id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mname = $_POST["mname"];
$contact = $_POST["contact"];
$utype="Faculty";
$sub_id = "";
if($id=="") {
    mysqli_query($connection,"INSERT INTO facultys(fname,lname,mname,contact,username,password)
    VALUES('$fname','$lname','$mname','$contact','$lname','$contact') ");

    $query_user = mysqli_query($connection,"SELECT * FROM facultys ORDER BY id DESC LIMIT 1");
    while($row = mysqli_fetch_assoc($query_user)){
        $sub_id = $row["id"];
    }
    mysqli_query($connection,"INSERT INTO users(userid,utype,username,password)
    VALUES('$sub_id','$utype','$contact','$lname') ");
}
else {
    mysqli_query($connection, "UPDATE facultys SET 
        fname = '$fname',
        lname = '$lname',
        mname = '$mname',
        contact = '$contact',
        username = '$lname',
        password = '$contact'
        WHERE id = '$id'
    ");

    mysqli_query($connection, "UPDATE users SET 
        username = '$contact',
        password = '$lname'
        WHERE id = '$id'
    ");
}

?>