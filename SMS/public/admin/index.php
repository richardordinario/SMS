<?php include("session.php");
date_default_timezone_set("Asia/Manila");
$dateToday = date("Y/m/d");
$dayToday = date("l");
$timeNow = date("h:ia ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../asset/js/jquery.js"></script>
    <script src="../../asset/js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../asset/DataTables/datatables.min.css"/>
    <script src="../../asset/DataTables/datatables.min.js"></script>
    <link rel="stylesheet" href="../../asset/icon/css/all.css">
    <link rel="stylesheet" href="../../asset/css/main.css">
    <title>Student Management System</title>
</head>
<style>
.container-active{
    float: right;
    position: absolute;
    margin-left: 315px;
    margin-right: 10px;
    padding: 15px;
    border-radius: 4px;
    background-color: #fff;
    box-shadow: 0px 6px 8px 0 rgba(0,0,0,0.2);
    border-top: 1px solid #ccc;
}
#container-db-main{
    display: flex;
    width: 1300px;
}

#container-db-main div {
  -ms-flex: 1;  /* IE 10 */  
  margin-left: 15px;
  flex: 1;
}
.container-db{
    width: 300px;
    border-radius: 4px;
    background-color: #fff;
    box-shadow: 0px 6px 8px 0 rgba(0,0,0,0.2);
    border-top: 1px solid #ccc;
    margin-bottom: 12px;
}
.db-title {
    color:#999;
    font-size: 14px;
    margin-right: 50px;
    padding: 8px 12px;
    float: right;
}
.db-title2 {
    color:#999;
    font-size: 14px;
    margin-right: 20px;
    padding: 8px 12px;
    float: right;
}
.count {
    font-size: 50px;
    font-weight: 600;
    color: #999;
    margin-left: 0px;
    margin-top: 10px;
}
span.icon {
    float:left;
    font-size: 70px;
    margin-top: -32.5px;
    margin-left: -16px;
    padding: 20px;
    background-image: linear-gradient(#f5f6fa,#f5f6fa, #dcdde1);
    background-color: #f5f6fa;
}
.container-schedule {
    float: left;
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
    margin: 1% auto 10% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 40%; /* Could be more or less, depending on screen size */
    border-radius: 4px;
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
.close {
    float: right;
    top: 0;
    color: #000;
    font-size: 25px;
    font-weight: bold;
    cursor: pointer;
}
.container-modal{
    padding: 16px;
}
@media only screen and (min-width:1920px) {
    .modal-content {width:28.5%;}
    .container-modal input[type=submit] {margin-left: 367.5px;}
}
</style>
<body>
    <?php include("navigation.php");?>
    <div id="main">
        <h1 id="content-title"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Dashboard <span style="font-size: 16px;color: #888;">/ Home Panel</span> </h1>
        <!-- <hr class="new1"> -->
        <div id="container-db-main">
            <div class="container-db">
                <div class="db-title"><i class="fas fa-user"></i>&nbsp;Number of students</div>
                <?php 
                    $student_query = mysqli_query($connection,"SELECT * FROM students");
                    $count_student = mysqli_num_rows($student_query);
                ?>
                <div class="count"><span class="fas fa-user icon"></span>&nbsp;<?php echo $count_student;?></div>
                <span style="margin-left:10px; font-size:14px;color:#999;">Total count in the system</span>
            </div>
            <div class="container-db">
                <div class="db-title2"><i class="fas fa-graduation-cap"></i>&nbsp;Number of courses</div>
                <?php 
                    $course_query = mysqli_query($connection,"SELECT * FROM courses");
                    $count_course = mysqli_num_rows($course_query);
                ?>
                <div class="count"><span class="fas fa-graduation-cap icon"></span>&nbsp;<?php echo $count_course;?></div>
                <span style="margin-left:10px; font-size:14px;color:#999;">Total count in the system</span>
            </div>
            <div class="container-db">
                <div class="db-title"><i class="fas fa-book"></i>&nbsp;Number of subjects</div>
                <?php 
                    $subject_query = mysqli_query($connection,"SELECT * FROM subjects");
                    $count_subject = mysqli_num_rows($subject_query);
                ?>
                <div class="count"><span class="fas fa-book icon"></span>&nbsp;<?php echo $count_subject;?></div>
                <span style="margin-left:10px; font-size:14px;color:#999;">Total count in the system</span>
            </div>
            <div class="container-db">
                <div class="db-title"><i class="fas fa-user"></i>&nbsp;Number of facultys</div>
                <?php 
                    $faculty_query = mysqli_query($connection,"SELECT * FROM facultys");
                    $count_faculty = mysqli_num_rows($faculty_query);
                ?>
                <div class="count"><span class="fas fa-user icon"></span>&nbsp;<?php echo $count_faculty;?></div>
                <span style="margin-left:10px; font-size:14px;color:#999;">Total count in the system</span>
            </div>
            
        </div>
       
        <div class="container-schedule">
            <?php
                $sched_array = array(); // hold unique id in schedule
                $subject_array= array(); //  hold subject in schedule
                $course_array= array(); //  hold course in schedule
                $section_array= array(); //  hold section in schedule
                $ylevel_array= array(); //  hold ylevel in schedule
                $numday_array= array(); //  hold number of days in schedule
                $day_array = array(); //  hold day in classes table
                $from_array = array();
                $to_array = array();
                $room_array = array();
                $html = "";
                $query_sched = mysqli_query($connection,"SELECT * FROM schedules WHERE instructor_name = '".$fullname."' ");
                if(mysqli_num_rows($query_sched) > 0){
                    while($row = mysqli_fetch_assoc($query_sched)) {
                        array_push($sched_array, $row["uniq_id"]);
                        array_push($subject_array, $row["subject_code"]);
                        array_push($course_array, $row["course_code"]);
                        array_push($section_array, $row["section"]);
                        array_push($ylevel_array, $row["ylevel"]);
                        array_push($numday_array, $row["dayses"]);
                    }

                    $sub_unique_array = array(); // hold unique id in classes table
                    
                    for($i=0; $i <count($sched_array);$i++){
                        $uniqueId = $sched_array[$i];
                        $db_from = array();
                        $db_to = array();
                        $db_room = array();
                        $daydb_array = array();
                        $db_unique = array();
                        $ctr = 0;
                        $exist = false;
                        $query_class = mysqli_query($connection,"SELECT * FROM classes WHERE schedule_id = '".$uniqueId."' ");
                        while($row = mysqli_fetch_assoc($query_class)) {
                            array_push($daydb_array, $row["dayses"]);
                            array_push($db_unique, $row["schedule_id"]);
                            array_push($db_from, $row["time_from"]);
                            array_push($db_to, $row["time_to"]);
                            array_push($db_room, $row["room"]);
                            
                        }
                        for($c=0; $c < count($daydb_array); $c++){
                            $subday = $daydb_array[$c];
                            $subId = $db_unique[$c];
                            $subFrom = $db_from[$c];
                            $subTo = $db_to[$c];
                            $subRoom = $db_room[$c];
                            if($subday == $daydb_array[$ctr=$ctr+1]){
                                if($exit = false){
                                    array_push($day_array, $subday);
                                    array_push($from_array, $subFrom);
                                    array_push($to_array, $subTo);
                                    array_push($room_array, $subRoom);
                                    array_push($sub_unique_array, $subId);
                                    $exist = true;
                                }
                            }else{
                                $ctr = $c - 1;
                                array_push($day_array, $subday);
                                array_push($from_array, $subFrom);
                                array_push($to_array, $subTo);
                                array_push($room_array, $subRoom);
                                array_push($sub_unique_array, $subId);
                            }
                        }
                    }

                    $s=0;
                    for($z=0;$z < count($sched_array); $z++){
                        $stock = $sub_unique_array[$z];   
                        $ylevel = strtoupper($ylevel_array[$z]);
                        $html .="<div class='class_sched' style ='border-radius:5px; margin-bottom:10px;width:300px;background-color:#fff;box-shadow: 0px 6px 8px 0 rgba(0,0,0,0.2);border:1px solid #ccc;'>";
                        $html .="<h1 style='text-align:center;font-size:35px;margin-top:0px;padding-top:20px;padding-bottom:30px;color:#999;border-bottom:1px solid #ccc;background-image: linear-gradient(#f5f6fa,#f5f6fa, #dcdde1);background-color: #f5f6fa;'>$subject_array[$z]</h1>";
                        $html .="<p style='text-align:center;font-size:12px;margin-top:-60px;margin-bottom:35px;color:#999;'>$course_array[$z] $ylevel $section_array[$z] </p>";
                        for($k=0; $k < count($day_array); $k++){
                            if($sched_array[$z]==$sub_unique_array[$k]){
                                
                                $html .= "
                                    <p style='text-align:center;font-size:22px;padding-left:none;margin-top:-20px;padding-top:15px;padding-bottom:20px;color:#999;'>$day_array[$k] &nbsp;<i class='fas fa-calendar-alt'></i></p>
                                    <p style='text-align:center;font-size:12px;padding-left:none;margin-top:-50px;padding-top:15px;padding-bottom:10px;color:#999;'>From : $from_array[$k] &nbsp;<i class='fas fa-clock'></i> / To : $to_array[$k] &nbsp;<i class='fas fa-clock'></i></p>
                                    
                                ";
                            }else {
                            }
                        }
                        $html .="</div>";
                    }
                    echo $html;
                }else{
                    $html .="<div class='class_sched' style ='border-radius:5px; margin-bottom:10px;width:300px;background-color:#fff;box-shadow: 0px 6px 8px 0 rgba(0,0,0,0.2);border:1px solid #ccc;'>";
                    $html .="<h1 style='text-align:center;font-size:25px;margin-top:0px;padding-top:20px;padding-bottom:10px;color:#999;border-bottom:1px solid #ccc;background-image: linear-gradient(#f5f6fa,#f5f6fa, #dcdde1);background-color: #f5f6fa;'>No data available</h1>";
                    $html .="</div>";
                    echo $html;
                }

            ?>
        </div>
        <div class="container-active">
           <h1 style="color: #999;font-size:45px;margin-top:8px;"><?php echo "<i class='far fa-calendar-check'></i>&nbsp;$dayToday ";?><div id="time" align="right" style="margin-top:-50px;">00:00:00am</div></h1>
           <p style="color:#999;margin-top:-28px;margin-left:55px">Your class schedule for today.</p>
            <?php
                $sched_array = array(); // hold unique id in schedule
                $subject_array= array(); //  hold subject in schedule
                $course_array= array(); //  hold course in schedule
                $section_array= array(); //  hold section in schedule
                $ylevel_array= array(); //  hold ylevel in schedule
                $numday_array= array(); //  hold number of days in schedule
                $day_array = array(); //  hold day in classes table
                $from_array = array();
                $to_array = array();
                $room_array = array();
                $html="";
                
                $query_sched = mysqli_query($connection,"SELECT * FROM schedules WHERE instructor_name = '".$fullname."' ");
                if(mysqli_num_rows($query_sched) > 0){
                    while($row = mysqli_fetch_assoc($query_sched)) {
                        array_push($sched_array, $row["uniq_id"]);
                        array_push($subject_array, $row["subject_code"]);
                        array_push($course_array, $row["course_code"]);
                        array_push($section_array, $row["section"]);
                        array_push($ylevel_array, $row["ylevel"]);
                        array_push($numday_array, $row["dayses"]);
                    }
                    for($i=0; $i <count($sched_array);$i++){
                        $uniqueId = $sched_array[$i];
                        $subject = $subject_array[$i];
                        $course = $course_array[$i];
                        $ylevel = strtoupper($ylevel_array[$i]);
                        $section = $section_array[$i];
                        $query_class = mysqli_query($connection,"SELECT * FROM classes WHERE schedule_id = '".$uniqueId."' AND dayses = '".$dayToday."' ORDER BY id DESC LIMIT 1");
                        if(mysqli_num_rows($query_class)>0){
                            while($row = mysqli_fetch_assoc($query_class)) {
                                $query_subject = mysqli_query($connection,"SELECT * FROM subjects WHERE subject_code = '".$subject."' ");
                                $query_course = mysqli_query($connection,"SELECT * FROM courses WHERE course_code = '".$course."' ");
                                $crow = mysqli_fetch_assoc($query_course);
                                $srow = mysqli_fetch_assoc($query_subject);
                                $cdesc = $crow["course_desc"];
                                $sdesc = $srow["subject_desc"];
                                $from = $row["time_from"];
                                $to = $row["time_to"];
                                if($from == $timeNow || $to >= $timeNow){
                                    echo "<div style='border-radius:5px; margin-bottom:10px;width:970px;background-color:#fff;border:1px solid #b33939;'> ";
                                }else{
                                    echo "<div style='border-radius:5px; margin-bottom:10px;width:970px;background-color:#fff;border:1px solid #ccc;'> ";
                                }
                                
                                echo "<h1 class='subject' style='font-size:45px;color:#999; margin-top:20px;margin-left:20px;'>$sdesc</h1>";
                                echo "<p class='course' style='font-size:15px;color:#999; margin-top:-20px;margin-left:30px;font-weight:500;'>$cdesc</p>";
                                echo "<p style='font-size:15px;color:#999; margin-top:-10px;margin-left:30px;font-weight:500;'><span class='ylevel'>$ylevel</span> - <span class='section'>$section</span></p>";
                                echo "<p style='font-size:15px;color:#999; margin-top:-10px;margin-left:30px;font-weight:500;'><strong> From : <span class='time_from'>$from</span> To <span class='time_to'>$to</span></strong></p>";
                                if($from == $timeNow || $to >= $timeNow){
                                    echo "<div class='attendace' align='right' style='padding:4px6px;margin-top:-130px;margin-bottom:130px;margin-right:20px;color: #999;cursor:pointer;'><i class='far fa-check-circle'></i> Attendance</div> ";
                                }else{
                                    echo "<div align='right' style='padding:4px6px;margin-top:-130px;margin-bottom:130px;margin-right:20px;color: #999;cursor:no-drop;'><i class='far fa-check-circle'></i> Attendance</div> ";
                                }
                                echo"</div>";   
                            }
                        }else{
                            $html.= "<div style='border-radius:5px; margin-bottom:10px;width:970px;background-color:#fff;border:1px solid #ff;'> ";
                            $html.= "<h1 class='subject' style='font-size:45px;color:#999; margin-top:20px;margin-left:20px;'></h1>";
                            $html.= "<p class='course' style='font-size:15px;color:#999; margin-top:-20px;margin-left:30px;font-weight:500;'></p>";
                            $html.= "</div>";  
                        }
                    }
                }
                echo $html;
            ?>
        </div>
    </div>
    <div id="id01" class="modal">
    <form class="modal-content animate" id="form_days" method="POST" autocomplete="off">
        <div class="container-modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h1 style="margin-top:0px;color: #888;">Check Attendace</h1>
            <p style="margin-top:-15px;margin-bottom:30px;color:#c0392b;font-size:14px;font-weight:600;"></p>
            <h4 class="subject-check" style="color:#888;margin-left: 10px;font-weight:600;"></h4>
            <p class="course-check" style="color:#888;margin-left: 10px;font-weight:600;margin-top:-15px;"></p>
            <p style="font-size:14px;color:#888;margin-left: 10px;font-weight:500;margin-top:-10px;">From <span class="from-check" ></span> To <span class="to-check"></span></p>
            
            <input type="submit" id="save-schedule" value="Submit"></input>
        </div>
    </form>
<script>
   
    function idleTimer() {
        var t;
        window.onmousemove = resetTimer;
        window.onmousedown = resetTimer;
        window.onclick = resetTimer;
        window.onscroll = resetTimer;
        window.onkeypress= resetTimer;
        function logout() {
            alert("Your are automatically logout!");
            window.location.href = "../../logout";
        }
        // function reload() {
        //     window.location = self.location.href;
        // }
        function resetTimer() {
            clearTimeout(t);
            t=setTimeout(logout, 60000);
            // t=setTimeout(reload, 60000);
        }
    }
    idleTimer();
    if(screen.width==1920){
        navShow();
    }else{
        navHide();
    }

    $(document).ready(function() {
       
        setInterval(function() {
            $("#time").load("../../model/load-time.php");
        },1000);

       item_subject = [];
       item_course = [];
       item_from = [];
       item_to = [];

        $(document).on('click','.attendace',function() {
            $(".subject").each(function() {
                item_subject.push($(this).text());
            });
            $(".course").each(function() {
                item_course.push($(this).text());
            });
            $(".time_from").each(function() {
                item_from.push($(this).text());
            });
            $(".time_to").each(function() {
                item_to.push($(this).text());
            });
            $(".subject-check").html(item_subject);
            $(".course-check").html(item_course);
            $(".from-check").html(item_from);
            $(".to-check").html(item_to);
            document.getElementById("id01").style.display="block";
        });

        $(".close").click(function() {
            item_subject = [];
            item_course = [];
            item_from = [];
            item_to = [];
        });
      
        $("#sidenav-hide").click(function(){
            var tsw = screen.width;
            if(tsw > 768){ navHide(); }
            else{} 
        });
        $("#sidenav-show").click(function(){
            var tsw = screen.width;
            if(tsw > 768){ navShow(); }
            else{}
        });
        
        $("#student-show").click(function(){
            $("#student-hide").show();
            $("#student-show").hide();
            $("#add-student").slideDown();
            $("#faculty").slideDown();
        });

        $("#student-hide").click(function(){
            $("#student-hide").hide();
            $("#student-show").show();
            $("#add-student").slideUp();
            $("#faculty").slideUp();
        });

        $("#add-student").click(function() {
            $("#addstud-active").show();
            $("#addstud-notactive").hide();
        
        });
    });

    function navHide() { 
        $("#sidenav-show").show();
        $("#sidenav-hide").hide();
        
        document.getElementById("sidenav").style.marginLeft="-300px";
        //--top navigation
        document.getElementById("topnav").style.marginLeft="0px";
        document.getElementById("topnav").style.width="100%";

        if(screen.width == 1920){
            var msw = screen.width - 400 + "px";
            //--main content 
            document.getElementById("main").style.marginLeft="0px";
            document.getElementById("main").style.width= msw;
            document.getElementById("main").style.margin= "auto";
            document.getElementById("main").style.marginTop= "55px";
    
        }else{
            var msw = screen.width - 50 + "px";
            //--main content 
            document.getElementById("main").style.marginLeft="0px";
            document.getElementById("main").style.width= msw;
            document.getElementById("main").style.margin= "auto";
            document.getElementById("main").style.marginTop= "55px";
            document.getElementById("content-title").style.paddingTop= "10px";
            document.getElementById("content-title").style.paddingBottom= " -8px";
            document.getElementById("dashboard-menu").style.fontWeight="600";
        }   
    }
    function navShow() {
        
        $("#sidenav-show").hide();
        $("#sidenav-hide").show();

        if(screen.width == 1920) {
            var tsw = screen.width - 300 + "px";
            var msw = screen.width - 340 + "px";
            document.getElementById("sidenav").style.marginLeft="0px";
            //--top navigation
            document.getElementById("topnav").style.width= tsw;
            document.getElementById("topnav").style.marginLeft="300px";
            //--main content 
            document.getElementById("main").style.width= msw;
            document.getElementById("main").style.margin= "auto";
            document.getElementById("main").style.marginLeft="310px";
            document.getElementById("main").style.marginTop= "55px";
        
        }else {
            var tsw = screen.width - 250 + "px";
            var msw = screen.width - 300 + "px";
            document.getElementById("sidenav").style.marginLeft="0px"; 
            document.getElementById("sidenav").style.width="250px";
            document.getElementById("img").style.marginLeft="5px";
            document.getElementById("topnav").style.width= tsw;
            document.getElementById("topnav").style.marginLeft="250px";
            document.getElementById("content-title").style.paddingTop= "10px";
            document.getElementById("content-title").style.paddingBottom= " -8px";
            document.getElementById("main").style.width= msw;
            document.getElementById("main").style.marginLeft="260px";
            document.getElementById("dashboard-menu").style.fontWeight="600";
        }
    }

</script>
</body>
</html>