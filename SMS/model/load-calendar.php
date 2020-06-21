<?php
include("connection.php");
$dateToday = date("Y/m/d");
$dayToday = date("l");

session_start();
$fullname = "";
$utype = "";
if(isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $check_user = mysqli_query($connection,"SELECT * FROM users WHERE id = '$id'");
    $fetch = mysqli_fetch_assoc($check_user);
    $utype = $fetch["utype"];
    $userid = $fetch["userid"];
    if($utype == "Superadmin")
    {
    $user = mysqli_query($connection,"SELECT * FROM admins WHERE id = '$userid'");
    $userFetch =  mysqli_fetch_assoc($user);
    $fullname = $userFetch["fname"] . " " . $userFetch["lname"];
    }
    else if($utype == "Admin")
    {
    $user = mysqli_query($connection,"SELECT * FROM admins WHERE id = '$userid'");
    $userFetch =  mysqli_fetch_assoc($user);
    $fullname = $userFetch["fname"] . " " . $userFetch["lname"];
    
    }
    else if( $utype == "Faculty")
    {
    $user = mysqli_query($connection,"SELECT * FROM facultys WHERE id = '$userid'");
    $userFetch =  mysqli_fetch_assoc($user);
    $fullname = $userFetch["fname"] . " " . $userFetch["lname"];
    
    }
}

$query_sched =  mysqli_query("SELECT * FROM schedules WHERE instructor_name = $fullname");
if(mysqli_num_row($query_sched)>0){
    while($row = mysqli_fetch_assoc($query_sched)) {
        array_push($studid, $row["uniq_id"]);
    }
}


// $connect = new PDO("mysql:host=localhost;dbname=sms", "root", "");
// session_start();
// $fullname = "";
// $utype = "";
// if(isset($_SESSION["id"])) {
//     $id = $_SESSION["id"];
//     $check_user = mysqli_query($connection,"SELECT * FROM users WHERE id = '$id'");
//     $fetch = mysqli_fetch_assoc($check_user);
//     $utype = $fetch["utype"];
//     $userid = $fetch["userid"];
//     if($utype == "Superadmin")
//     {
//     $user = mysqli_query($connection,"SELECT * FROM admins WHERE id = '$userid'");
//     $userFetch =  mysqli_fetch_assoc($user);
//     $fullname = $userFetch["fname"] . " " . $userFetch["lname"];
//     }
//     else if($utype == "Admin")
//     {
//     $user = mysqli_query($connection,"SELECT * FROM admins WHERE id = '$userid'");
//     $userFetch =  mysqli_fetch_assoc($user);
//     $fullname = $userFetch["fname"] . " " . $userFetch["lname"];
    
//     }
//     else if( $utype == "Faculty")
//     {
//     $user = mysqli_query($connection,"SELECT * FROM facultys WHERE id = '$userid'");
//     $userFetch =  mysqli_fetch_assoc($user);
//     $fullname = $userFetch["fname"] . " " . $userFetch["lname"];
    
//     }
// }
// $shed_array = array();
// $query_sched =  mysqli_query("SELECT * FROM schedules WHERE instructor_name = $fullname");
// while($dbrow = mysqli_fetch_assoc($query_sched)) {
//     array_push($studid, $dbrow["uniq_id"]);
// }


// $data = array();

// $query = "SELECT * FROM schedules ORDER BY id";

// $statement = $connect->prepare($query);

// $statement->execute();

// $result = $statement->fetchAll();

// foreach($result as $row)
// {
//     $data[] = array(
//     'id'   => $row["id"],
//     'title'   => $row["title"],
//     'start'   => $row["start_event"],
//     'end'   => $row["end_event"]
//     );
// }

// echo json_encode($data);


    
?>