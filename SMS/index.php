<?php include("model/connection.php");
session_start();
$username = $password = $id = "";
if(isset($_POST["login"]))
{
    $username = $_POST["uname"];
    $password = $_POST["psw"];
    $check_uname = mysqli_query($connection,"SELECT * FROM users WHERE username = $username");
    $check_uname_row = mysqli_num_rows($check_uname);
    if($check_uname_row > 0)
    {
        while($row = mysqli_fetch_assoc($check_uname))
        {
            $db_password = $row["password"];
            $db_utype = $row["utype"];
            $id = $row["id"];
            if($password == $db_password)
            {
                if($db_utype == "Student")
                {
                    $_SESSION["id"]= $id;
                    echo "<script>window.alert('Successfully Login!');</script>";
                    echo "<script>window.location.href='public/student/index';</script>";
                }
                else
                {
                    $_SESSION["id"]= $id;
                    echo "<script>window.alert('Successfully Login!');</script>";
                    echo "<script>window.location.href='public/admin/index';</script>";
                }
            }
            else
            {
                echo "<script>window.alert('Password incorrect!');</script>";
            }
        }
    }
    else
    {
        echo "<script>window.alert('Username not found!');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/icon/css/all.css">
    <script src="asset/js/jquery.js"></script>
    <script src="asset/js/jquery.min.js"></script>
    <title>Student Management System</title>
</head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
label{color:#555;}
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    color:#777;
    border-radius: 10px;
    font-size: 14px;
}
button {
    background-color: #f5f6fa; /* For browsers that do not support gradients */
    background-image: linear-gradient(#f5f6fa,#f5f6fa, #dcdde1); 
    color: #555;
    padding: 14px 20px;
    margin: 8px 0;
    border: 1px solid #888;
    cursor: pointer;
    width: 100%;
    border-radius: 3px;
    font-size: 16px;
}
.container {
  padding: 16px;
}
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 30%; /* Could be more or less, depending on screen size */ 
    border-radius: 10px;
}
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

@media only screen and (min-width:1920px) {}
</style>
<body onload="myFunction()">
    <div id="id01" class="modal">
    <form class="modal-content animate" id="login-form" method="POST" autocomplete="off">
        <div class="container">
            <h1 style="margin-top:0px;color: #555;">SMS</h1>
            <p style="margin-top:-20px;margin-bottom:30px;color:#777;">Student Manangement System</p>
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" id="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

            <button type="submit" id="login" name="login">Login</button>
        </div>
    </form>
<script>
function myFunction() {
    document.getElementById('id01').style.display='block';
}
</script>
</body>
</html>