<?php
include("connection.php");

$request = $_REQUEST;
$col = array("course_code","course_desc");
$sql = "SELECT * FROM courses";
$query = mysqli_query($connection,$sql);
$totalData = mysqli_num_rows($query);
$totalFilter = $totalData;

$sql = "SELECT * FROM courses WHERE 1=1";

if(!empty($request['search']['value'])) {
    $sql .= " AND (course_code LIKE '".$request['search']['value']."%' ";
    $sql .=  "OR course_desc LIKE '".$request['search']['value']."%' )";
}

$query = mysqli_query($connection,$sql);
$totalData = mysqli_num_rows($query);

$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."  ".$request['order'][0]['dir']."  LIMIT ".$request['start']."  ,".$request['length']."  ";
$query = mysqli_query($connection,$sql);
$data = array();

while($row = mysqli_fetch_array($query)) {
	$subdata = array();
	$subdata[] = '<span style="font-size: 12px;font-weight: 600;">'.$row["course_code"].'</span>';
	$subdata[] = '<span style="font-size: 12px;font-weight: 500;">'.$row["course_desc"].'</span>';

	$subdata[] = '<span name="Edit" style="font-size:11px;font-weight:400;padding:3px;background-color: #f5f6fa; background-image: linear-gradient(#f5f6fa,#f5f6fa, #dcdde1);border: 1px solid #888;border-radius: 2px; cursor:pointer;color: #555;" class="edit" id="'.$row["id"].'">Update</span>';
	$subdata[] = '<span name="Delete" style="font-size:11px;font-weight:400;padding:3px;background-color: #f5f6fa; background-image: linear-gradient(#f5f6fa,#f5f6fa, #dcdde1);border: 1px solid #888;border-radius: 2px; cursor:pointer;color: #555;" class="delete" id="'.$row["id"].'">Delete</span>';
	$data[] = $subdata;
}
$json_data = array(

	"draw"				=> intval($request['draw']),
	"recordsTotal"		=> intval($totalData),
	"recordsFiltered"	=> intval($totalFilter),
	"data"				=> $data
);
echo json_encode($json_data);
?>