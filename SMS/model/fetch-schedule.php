<?php
include("connection.php");
$connect = new PDO("mysql:host=localhost;dbname=sms", "root", "");
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
$column = array("instructor_name","sy","sem","subject_code","course_code","section","ylevel","dayses");

$query = "
SELECT * FROM schedules 
";

if(isset($_POST['filter_name']) && $_POST['filter_name'] != '')
{
    $query .= '
    WHERE instructor_name = "'.$_POST['filter_name'].'"
 ';
}
else
{
    $query .= '
    WHERE instructor_name =  "'.$fullname.'"
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();


$data = array();

foreach($result as $row){
    $subdata = array();
    $subdata[] = '<span style="font-size: 12px;font-weight: 600;">'.$row["instructor_name"].'</span>';
    $subdata[] = '<span style="font-size: 12px;font-weight: 600;">'.$row["sy"].'</span>';
    $subdata[] = '<span style="font-size: 13px;font-weight: 500;">'.$row["sem"].'</span>';
    $subdata[] = '<span style="font-size: 12px;font-weight: 600;">'.$row["subject_code"].'</span>';
    $subdata[] = '<span style="font-size: 12px;font-weight: 600;">'.$row["course_code"].'</span>';
    $subdata[] = '<span style="font-size: 13px;font-weight: 500;">'.$row["section"].'</span>';
    $subdata[] = '<span style="font-size: 13px;font-weight: 500;">'.$row["ylevel"].'</span>';
    $subdata[] = '<span style="font-size: 13px;font-weight: 500;">'.$row["dayses"].'</span>';

    $subdata[] = '<span name="Edit" style="font-size:11px;font-weight:400;padding:3px;background-color: #f5f6fa; background-image: linear-gradient(#f5f6fa,#f5f6fa, #dcdde1);border: 1px solid #888;border-radius: 2px; cursor:pointer;color: #555;" class="edit" id="'.$row["id"].'">Update</span>';
    $subdata[] = '<span name="Delete" style="font-size:11px;font-weight:400;padding:3px;background-color: #f5f6fa; background-image: linear-gradient(#f5f6fa,#f5f6fa, #dcdde1);border: 1px solid #888;border-radius: 2px; cursor:pointer;color: #555;" class="delete" id="'.$row["id"].'">Delete</span>';
    $data[] = $subdata;
}
function count_all_data($connect)
{
    $query = "SELECT * FROM schedules";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}
$json_data = array(

	"draw"				=> intval($_POST['draw']),
	"recordsTotal"		=> count_all_data($connect),
	"recordsFiltered"	=> $number_filter_row,
	"data"				=> $data
);
echo json_encode($json_data);

// $request = $_REQUEST;
// $col = array("instructor_name","sy","sem","subject_code","course_code","section","ylevel","dayses");
// $sql = "SELECT * FROM schedules";
// $query = mysqli_query($connection,$sql);
// $totalData = mysqli_num_rows($query);
// $totalFilter = $totalData;

// $sql = "SELECT * FROM schedules WHERE 1=1";

// if(!empty($request['search']['value'])) {
//     $sql .= " AND (instructor_name LIKE '".$request['search']['value']."%' ";
//     $sql .= " OR sy LIKE '".$request['search']['value']."%' ";
//     $sql .= " OR sem LIKE '".$request['search']['value']."%' ";
//     $sql .= " OR subject_code LIKE '".$request['search']['value']."%' ";
//     $sql .= " OR course_code LIKE '".$request['search']['value']."%' ";
//     $sql .= " OR section LIKE '".$request['search']['value']."%' ";
//     $sql .= " OR ylevel LIKE '".$request['search']['value']."%' ";
//     $sql .=  "OR dayses LIKE '".$request['search']['value']."%' )";
// }

// $query = mysqli_query($connection,$sql);
// $totalData = mysqli_num_rows($query);

// $sql.=" ORDER BY ".$col[$request['order'][0]['column']]."  ".$request['order'][0]['dir']."  LIMIT ".$request['start']."  ,".$request['length']."  ";
// $query = mysqli_query($connection,$sql);
// $data = array();

// while($row = mysqli_fetch_array($query)) {
// 	$subdata = array();
// 	$subdata[] = '<span style="font-size: 12px;font-weight: 600;">'.$row["instructor_name"].'</span>';
// 	$subdata[] = '<span style="font-size: 12px;font-weight: 600;">'.$row["sy"].'</span>';
//     $subdata[] = '<span style="font-size: 13px;font-weight: 500;">'.$row["sem"].'</span>';
//     $subdata[] = '<span style="font-size: 12px;font-weight: 600;">'.$row["subject_code"].'</span>';
//     $subdata[] = '<span style="font-size: 12px;font-weight: 600;">'.$row["course_code"].'</span>';
//     $subdata[] = '<span style="font-size: 13px;font-weight: 500;">'.$row["section"].'</span>';
//     $subdata[] = '<span style="font-size: 13px;font-weight: 500;">'.$row["ylevel"].'</span>';
//     $subdata[] = '<span style="font-size: 13px;font-weight: 500;">'.$row["dayses"].'</span>';

//     $subdata[] = '<span name="Edit" style="font-size:11px;font-weight:400;padding:3px;background-color: #f5f6fa; background-image: linear-gradient(#f5f6fa,#f5f6fa, #dcdde1);border: 1px solid #888;border-radius: 2px; cursor:pointer;color: #555;" class="edit" id="'.$row["id"].'">Update</span>';
// 	$subdata[] = '<span name="Delete" style="font-size:11px;font-weight:400;padding:3px;background-color: #f5f6fa; background-image: linear-gradient(#f5f6fa,#f5f6fa, #dcdde1);border: 1px solid #888;border-radius: 2px; cursor:pointer;color: #555;" class="delete" id="'.$row["id"].'">Delete</span>';
// 	$data[] = $subdata;
// }
// $json_data = array(

// 	"draw"				=> intval($request['draw']),
// 	"recordsTotal"		=> intval($totalData),
// 	"recordsFiltered"	=> intval($totalFilter),
// 	"data"				=> $data
// );
// echo json_encode($json_data);

?>