<?php include("session.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../asset/icon/css/all.css">
    <link rel="stylesheet" href="../../asset/css/main.css">
    <script src="../../asset/js/jquery.js"></script>
    <script src="../../asset/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../asset/DataTables/datatables.min.css"/>
    <script src="../../asset/DataTables/datatables.min.js"></script>
    <title>Student Management System</title>
</head>
<style>
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
#filter-container{
    width: 400px;
    display: flex;
    float: right;

}
#filter-container div {
    flex: 1;
}

</style>
<body>
    <?php include("navigation.php");?>
    <div id="main">
    <h1 id="content-title"><i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;Class Schedule Management <span style="font-size: 16px;color: #888;">/ Class Schedule Panel</span> </h1>
        <hr class="new1">
        <br>
        <div class="container" id="container-form">
        <h2 style="margin-top:-5px;color:#888;font-size: 26px" id="content1-title">New Schedule</h2>
            <form id="form_schedule" method="POST">
                <input type="hidden" id="id" name="id" placeholder="">
                <div id="uidload"></div> 
                <input type="hidden" id="utype" name="utype" placeholder="" value="<?php echo $utype;?>">
                <input type="hidden" id="instructorid" name="instructorid" value="<?php echo $userid;?>">
                <input type="hidden" id="instructorname" name="instructorname" value="<?php echo $fullname;?>">
                <label for="">School Year</label><span class="required-logo">&#42;</span>
                <input type="text" id="sy" name="sy" placeholder="0000-0000 " required>
                <label for="ylevel">Semester</label><span class="required-logo">&#42;</span>
                <select id="sem" name="sem" required style="width: 100%;padding: 8px 12px;font-size:13px;">
                    <option value="">Select semester..</option>
                    <option value="1st Semester">1st Semester</option>
                    <option value="2nd Semester">2nd Semester</option>
                </select>
                <label for="ylevel">Subject</label><span class="required-logo">&#42;</span>
                <?php $query_course = mysqli_query($connection,"SELECT * FROM subjects"); ?>
                <select id="subject" name="subject" style="width: 100%;padding: 8px 12px;font-size:12px;" >
                    <option value="">Subject to teach..</option>
                    <?php while($row = mysqli_fetch_array($query_course)):; ?>
                    <option value="<?php echo $row[1];?>"> <?php echo $row[2];?> </option>
                    <?php endwhile;?>
                </select>

                <label for="ylevel">Course</label><span class="required-logo">&#42;</span>
                <?php $query_course = mysqli_query($connection,"SELECT * FROM courses"); ?>
                <select id="course" name="course" style="width: 100%;padding: 8px 12px;font-size:12px;" >
                    <option value="">Course to teach..</option>
                    <?php while($row = mysqli_fetch_array($query_course)):; ?>
                    <option value="<?php echo $row[1];?>"> <?php echo $row[2];?> </option>
                    <?php endwhile;?>
                </select>
                <table>
                    <tr>
                        <td>
                        <label for="lname">Section</label><span class="required-logo">&#42;</span>
                        <input type="text" id="section" name="section" placeholder="Your section..">
                        </td>
                        <td>
                            <label for="ylevel">Year Level  </label><span class="required-logo">&#42;</span>
                            <select id="ylevel" name="ylevel" required>
                                <option value="">Your year level..</option>
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <label for="">Number of days</label><span class="required-logo">&#42;</span>
                <input type="text" id="days" name="days" placeholder="Number of days.." required>

                <input type="submit" value="Submit" id="insert-schedule">
                <button id="clear">Cancel</button>
            </form>
        </div>
        <div class="table-container" id="container-table">
        <h2 style="margin-top:-5px;color:#888;font-size: 26px" id="content2-title">Class Schedule Data</h2>
            <table id="schedule_data" class="display compact">
                <thead>
                    <tr>
                        <th>Instructor Name</th>
                        <th>School Year</th>
                        <th>Semester</th>
                        <th>Subject Code</th>
                        <th>Course Code</th>
                        <th>Section</th>
                        <th>Year Level</th>
                        <th>Days</th>
                        <th width="2px"></th>
                        <th width="2px"></th>
                    </tr>
                </thead>
                    <div id="filter-container">
                        <div style="margin-left: 130px;margin-right:-93px;">
                            <select name="filter_name" id="filter_name" style="padding:4px 6px;margin-right:100px;color:#888;">
                                <option value=""></option>
                                <?php $query_faculty = mysqli_query($connection,"SELECT * FROM facultys"); ?>
                                <?php while($row = mysqli_fetch_array($query_faculty)):; ?>
                                <option value="<?php echo $row[1] . " " . $row[2];?>"> <?php echo $row[1] . " " . $row[2];?> </option>
                                <?php endwhile;?>
                                <?php $query_admin = mysqli_query($connection,"SELECT * FROM admins"); ?>
                                <?php while($row = mysqli_fetch_array($query_admin)):; ?>
                                <?php if ($fullname == $row[2] . " " . $row[3]){ }else {?>
                                <option value="<?php echo $row[2] . " " . $row[3];?>"> <?php echo $row[2] . " " . $row[3]; ?> </option>
                                <?php }?>
                                <?php endwhile;?>
                            </select>
                        </div>
                        <div><span id="filter" style=" background-color: #f5f6fa;background-image: linear-gradient(#f5f6fa,#f5f6fa, #dcdde1);margin-right: 3px;color:#888;font-size:12px; border: 1px solid #999;padding:6px 6px;width: 40px;text-align:center;border-radius:2px;cursor:pointer;">Filter</span></div>
                        <div><span id="filter_cancel" style=" background-color: #f5f6fa;background-image: linear-gradient(#f5f6fa,#f5f6fa, #dcdde1); color:#888;font-size:12px; border: 1px solid #999;padding:6px 6px;width: 40px;text-align:center;border-radius:2px;cursor:pointer;">Cancel</span></div>
                    </div>  
            </table>
        </div>
    </div>
    <div id="id01" class="modal">
    <form class="modal-content animate" id="form_days" method="POST" autocomplete="off">
        <div class="container-modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h2 style="margin-top:0px;color: #555;">Set Day and Time</h2>
            <p style="margin-top:-15px;margin-bottom:30px;color:#c0392b;font-size:14px;font-weight:600;">Please complete the field.</p>
            <span class="alert"></span>
            <table class="daytime" id="dynamic_data" style="width: 85%; margin-left: 20px;">

            </table>
            <input type="submit" id="save-schedule" value="Submit"></input>
        </div>
    </form>
<script>
    if(screen.width==1920){
        navShow();
    }else{
        navHide();
    }
    $(document).ready(function() {
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
            document.getElementById("container-table").style.width= "930px";
            document.getElementById("schedule_data").style.width= "930px";

            document.getElementById("schedule-menu").style.fontWeight="600";
        }else{
            var msw = screen.width - 50 + "px";
            //--main content
            document.getElementById("main").style.marginLeft="0px";
            document.getElementById("main").style.width= msw;
            document.getElementById("main").style.margin= "auto";
            document.getElementById("main").style.marginTop= "55px";

            document.getElementById("schedule-menu").style.fontWeight="600";

            document.getElementById("container-form").style.width= "300px";
            document.getElementById("container-table").style.marginLeft= "355px";
            document.getElementById("container-table").style.width= "920px";
            document.getElementById("schedule_data").style.width= "925px";
            document.getElementById("schedule_data").style.marginLeft= "0px";
            document.getElementById("container-table").style.marginTop= "-10px";
            document.getElementById("container-form").style.marginTop= "-10px";
            document.getElementById("container-form").style.marginBottom= "-10px";
            document.getElementById("content-title").style.paddingTop= "10px";
            document.getElementById("content-title").style.paddingBottom= " -8px";
            document.getElementById("content-title").style.fontSize= "26px";
            document.getElementById("content1-title").style.fontSize= "20px";
            document.getElementById("content2-title").style.fontSize= "20px";

            document.getElementById("ylevel").style.width= "200px";

            document.getElementById("insert-schedule").style.width= "70px";
            document.getElementById("clear").style.width= "70px";
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

            document.getElementById("container-table").style.width= "990px";
            document.getElementById("schedule_data").style.width= "990px";

            document.getElementById("schedule-menu").style.fontWeight="600";

        }else {
            var tsw = screen.width - 250 + "px";
            var msw = screen.width - 300 + "px";
            document.getElementById("sidenav").style.marginLeft="0px";
            document.getElementById("sidenav").style.width="250px";
            document.getElementById("img").style.marginLeft="5px";
            document.getElementById("topnav").style.width= tsw;
            document.getElementById("topnav").style.marginLeft="250px";

            document.getElementById("main").style.width= msw;
            document.getElementById("main").style.marginLeft="260px";

            document.getElementById("schedule-menu").style.fontWeight="600";
            document.getElementById("container-table").style.marginTop= "-10px";
            document.getElementById("container-form").style.marginTop= "-10px";
            document.getElementById("container-form").style.width= "250px";
            document.getElementById("container-form").style.marginBottom= "-10px";
            document.getElementById("container-table").style.marginLeft= "305px";
            document.getElementById("container-table").style.width= "725px";
            document.getElementById("schedule_data").style.width= "730px";
            document.getElementById("schedule_data").style.marginLeft= "0px";
            document.getElementById("content-title").style.paddingTop= "10px";
            document.getElementById("content-title").style.paddingBottom= " -8px";
            document.getElementById("content-title").style.fontSize= "26px";
            document.getElementById("content1-title").style.fontSize= "20px";
            document.getElementById("content2-title").style.fontSize= "20px";
            document.getElementById("ylevel").style.width= "180px";

            document.getElementById("insert-schedule").style.width= "70px";
            document.getElementById("clear").style.width= "70px";

        }
    }
    $(document).ready(function() {

        $("#insert-schedule").click(function(e) {
            e.preventDefault();
            if($("#sy").val()==""){
                document.getElementById("sy").style.borderColor="red";
                setInterval(function(){
                document.getElementById("sy").style.borderColor="#ccc";
                },3000);
            }else if($("#sem").val()==""){
                document.getElementById("sem").style.borderColor="red";
                setInterval(function(){
                document.getElementById("sem").style.borderColor="#ccc";
                },3000);
            }else if($("#subject").val()==""){
                document.getElementById("subject").style.borderColor="red";
                setInterval(function(){
                document.getElementById("subject").style.borderColor="#ccc";
                },3000);
            }else if($("#course").val()==""){
                document.getElementById("course").style.borderColor="red";
                setInterval(function(){
                document.getElementById("course").style.borderColor="#ccc";
                },3000);
            }else if($("#section").val()==""){
                document.getElementById("section").style.borderColor="red";
                setInterval(function(){
                document.getElementById("section").style.borderColor="#ccc";
                },3000);
            }else if($("#ylevel").val()==""){
                document.getElementById("ylevel").style.borderColor="red";
                setInterval(function(){
                document.getElementById("ylevel").style.borderColor="#ccc";
                },3000);
            }else if($("#days").val()==""){
                document.getElementById("days").style.borderColor="red";
                setInterval(function(){
                document.getElementById("days").style.borderColor="#ccc";
                },3000);
            }else {
                $.ajax({
                    url:"../../model/check-schedule.php",
                    method:"POST",
                    data:$("#form_schedule").serialize(),
                    dataType:"json",
                    success:function(data){

                        if(data==""){
                            var html = "";
                            html += "<tr>";
                            html += "<tr id='row'><td><label style='font-size: 12px;margin-left: 10px;'>Day</label><select class='selected_day' name='day[]' style='width:200px;margin-top:10px;padding:8px;border: 1px solid #ccc;font-size: 13px;border-radius:2px;color:#888;'><option value=''>Select Day...</option><option value='Monday'>Monday</option><option value='Tuesday'>Tuesday</option><option value='Wednesday'>Wednesday</option><option value='Thursday'>Thursday</option><option value='Friday'>Friday</option><option value='Saturday'>Saturday</option><option value='Sunday'>Sunday</option></select></td>";
                            html += "<td><label style='font-size: 12px;margin-left: 10px;'>From </lable><input placeholder='00:00am' class='from' name='from[]' type='text' style='width:50px;margin-top:10px;padding:8px;border: 1px solid #ccc;font-size: 13px;border-radius:2px;color:#888;'></td>";
                            html += "<td><label style='font-size: 12px;margin-left: 10px;'>To </lable><input placeholder='00:00am' class='to' name='to[]' type='text' style='width:50px;margin-top:10px;padding:8px;border: 1px solid #ccc;font-size: 13px;border-radius:2px;color:#888;'></td>";
                            html += "<td><label style='font-size: 12px;margin-left: 10px;'>Room </lable><input placeholder='Room number..' class='room' name='room[]' type='text' style='width:100px;margin-top:10px;padding:8px;border: 1px solid #ccc;font-size: 13px;border-radius:2px;color:#888;'></td>";
                            html += "</tr>"
                            var day = $("#days").val();
                            for(i = 0;i < day; i++) {
                                $("#dynamic_data").append(html);
                            }
                            document.getElementById('id01').style.display='block';
                        }
                        else{
                            alert("Meron");
                        }
                    }
                });
            }
        });
      
        // scheduleData();
        // function scheduleData(){
        //     $('#schedule_data').DataTable({
        //         "processing":true,
        //         "serverSide":true,
        //         "ordeMulti":false,
        //         // "searching": false,
        //         "ajax": {
        //             "url": "../../model/fetch-schedule.php",
        //             "type": "POST"
        //         },
        //     })
        // }
        if($("#utype").val()=="Superadmin") {
            document.getElementById("filter_name").style.display="block";
            document.getElementById("filter").style.display="block";
            document.getElementById("filter_cancel").style.display="block";
        }else{
            document.getElementById("filter_name").style.display="none";
            document.getElementById("filter").style.display="none";
            document.getElementById("filter_cancel").style.display="none";
        }
        filterSched();
    
        function filterSched(filter_name = ""){
        var dataTable = $("#schedule_data").DataTable({
                "processing" : true,
                "serverSide" : true,
                "ordering" : false,
                "searching": false,
                "ajax":{
                    url:"../../model/fetch-schedule.php",
                    type:"POST",
                    data:{filter_name:filter_name}, 
                }
            });
        };

        uni_load();
        function uni_load() {
            $("#uidload").load("../../model/unique-id-load.php");
        }
        

        $("#filter").click(function() {
            var filter_name = $("#filter_name").val();
            if(filter_name != "")
            {
                $("#schedule_data").DataTable().destroy();
                filterSched(filter_name);
            }
            else
            {
                $("#schedule_data").DataTable().destroy();
                filterSched();
            }
        });

        $("#filter_cancel").click(function() {
            $("#filter_name").val("Filter by name");
            $("#schedule_data").DataTable().destroy();
            filterSched();
        });

        $(".close").click(function(){
            $("#dynamic_data").html("");
        });

        $("#clear").click(function(e) {
            e.preventDefault();
            $("#form-schedule")[0].reset();
            $("#id").val("");
            $("#insert-schedule").val("Submit");
            $("#content1-title").html("New schedule");
        });

        $("#save-schedule").click(function(e){
            e.preventDefault();
            var count = 0;
            item_day = [];
            item_from = [];
            item_to = [];
            item_room = [];
            var uniq_id = $("#uniqid").val();
            sec = $("#section").val();
            sy = $("#sy").val();
            sem = $("#sem").val();
            subject = $("#subject").val();
            instructorid = $("#instructorid").val();
            dayses = $("#days").val();
            item_course = $("#course").val();
            item_section = $("#section").val(sec.toUpperCase());
            item_ylevel = $("#ylevel").val();

            $(".selected_day").each(function() {
                if($(this).val()==""){
                    $(this).css("border-color","red");
                    return false;
                }else {
                    $(this).css("border-color","#ccc");
                    item_day.push($(this).val());
                    return true;
                }
            });

            setTimeout(function(){
            $(".selected_day").css("border-color","#ccc");
            },2000);

            $(".from").each(function() {
                if($(this).val()==""){
                    $(this).css("border-color","red");
                    return false;
                }else {
                    $(this).css("border-color","#ccc");
                    item_from.push($(this).val());
                    return true;
                }
            });

            setTimeout(function(){
            $(".from").css("border-color","#ccc");
            },2000);

            $(".to").each(function() {
                if($(this).val()==""){
                    $(this).css("border-color","red");
                    return false;
                }else {
                    $(this).css("border-color","#ccc");
                    item_to.push($(this).val());
                    return true;
                }
            });

            setTimeout(function(){
            $(".to").css("border-color","#ccc");
            },2000);

            $(".room").each(function() {
                if($(this).val()==""){
                    $(this).css("border-color","red");
                    return false;
                }else {
                    $(this).css("border-color","#ccc");
                    item_room.push($(this).val());
                    return true;
                }
            });

            setTimeout(function(){
            $(".room").css("border-color","#ccc");
            },2000);

            var day_temp = 0;
            var day_count = 0;
            var day_error = false;
            for(day_count;day_count<item_day.length;day_count++){
                if(item_day[day_count]==item_day[day_temp=day_temp+1]){
                    day_error = true;
                    break;
                }else{
                    day_error = false;
                }
            }
            if(day_error==true){
                item_day = [];
                alert("Selected day should not be the same");
            }
            else {
                $.ajax({
                url:"../../model/insert-schedule.php",
                method:"POST",
                data:$("#form_schedule").serialize(),
                success:function(data){
                   
                    }
                });
                $.ajax({
                    url:"../../model/daytime-schedule.php",
                    method:"POST",
                    data:{item_day:item_day, item_from:item_from, item_to:item_to, item_room:item_room, uniq_id:uniq_id},
                    // data:$("#form_days").serialize(),
                    success:function(data){
                        document.getElementById('id01').style.display='none';
                        $("#schedule_data").DataTable().destroy();
                        filterSched();
                        uni_load();
                        $("#dynamic_data").html("");
                        $("#form_days")[0].reset();
                        $("#form_schedule")[0].reset();

                    }
                });
            }

            $("#clear").click(function(e) {
                e.preventDefault();
                $("#form-admin")[0].reset();
                $("#insert-admin").val("Submit");
                $("#content1-title").html("Register Admin");
            });

            // var fromTo_temp = 0;
            // var fromTo_count = 0;
            // var fromTo_error = false;
            // for(fromTo_count;fromTo_count<item_from.length;fromTo_count++){
            //     if(item_from[fromTo_count]==item_to[fromTo_count] || item_to[fromTo_count]>item_from[fromTo_count]){
            //         fromTo_error = true;
            //         break;
            //     }else{
            //         fromTo_error = false;
            //     }
            // }
            // if(fromTo_error==true){
            //     item_from = [];
            //     item_to = [];
            //     alert("Input time in some field is invalid");
            // }



        });
    });
   
</script>
</body>
</html>