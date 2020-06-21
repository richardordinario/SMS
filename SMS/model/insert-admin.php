<?php
include("connection.php");
$id = $_POST["id"];
$utype = $_POST["usertype"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mname = $_POST["mname"];
$contact = $_POST["contact"];
$sub_id = "";
if($id=="") {
    mysqli_query($connection,"INSERT INTO admins(utype,fname,lname,mname,contact)
    VALUES('$utype','$fname','$lname','$mname','$contact') ");

    $query_user = mysqli_query($connection,"SELECT * FROM admins ORDER BY id DESC LIMIT 1");
    while($row = mysqli_fetch_assoc($query_user)){
        $sub_id = $row["id"];
    }

    mysqli_query($connection,"INSERT INTO users(userid,utype,username,password)
    VALUES('$sub_id','$utype','$contact','$lname') ");
}
else {
    mysqli_query($connection, "UPDATE admins SET 
        utype = '$utype',
        fname = '$fname',
        lname = '$lname',
        mname = '$mname',
        contact = '$contact',
        WHERE id = '$id'
    ");

    mysqli_query($connection, "UPDATE users SET 
        utype = '$utype',
        username = '$contact',
        password = '$lname'
        WHERE id = '$id'
    ");
}

?>