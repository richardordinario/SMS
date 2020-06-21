<?php include("session.php");?>
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
<body>
    <?php include("navigation.php");?>
    <div id="main">
        <h1 id="content-title"><i class="fas fa-user"></i>&nbsp;&nbsp;Account Management <span style="font-size: 16px;color: #888;">/ Stundet Panel</span> </h1>
        <hr class="new1">
        <br>
        <div class="container" id="container-form">
        <h2 style="margin-top:-5px;color:#888;font-size: 26px" id="content1-title">Register Student</h2>
        <div id="student-alert"></div>
            <form id="form-student" method="POST">
                <input type="hidden" id="id" name="id" placeholder="">
                <label for="fname">Student Number</label><span class="required-logo">&#42;</span>
                <input type="text" id="studid" name="studid" placeholder="Your id number.. " required>
                <label for="fname">First Name</label><span class="required-logo">&#42;</span>
                <input type="text" id="fname" name="fname" placeholder="Your first name.." required>
                <label for="lname">Last Name</label><span class="required-logo">&#42;</span>
                <input type="text" id="lname" name="lname" placeholder="Your last name.." required>
                <label for="lname">Middle Name</label>
                <input type="text" id="mname" name="mname" placeholder="Your middle name.." >
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
                <label for="course">Course</label><span class="required-logo">&#42;</span>
                <div class="course-category"></div> 
                <input type="submit" value="Submit" name="add-student-btn" id="insert-student">
                <button id="clear">Cancel</button>
            </form>
        </div>
        <div class="table-container" id="container-table">
        <h2 style="margin-top:-5px;color:#888;font-size: 26px" id="content2-title">Student Data</h2>
            <table id="student_data" class="display compact">
                <thead>
                    <tr>
                        <th data-orderable="false" class="sorting_asc">Id Number</th>
                        <th data-orderable="false" class="sorting_asc">First Name</th>
                        <th data-orderable="false" class="sorting_asc">Last Name</th>
                        <th data-orderable="false" class="sorting_asc">Middle Name</th>
                        <th data-orderable="false" class="sorting_asc">Course</th>
                        <th data-orderable="false" class="sorting_asc">Year Level</th>
                        <th data-orderable="false" class="sorting_asc">Section</th>
                        <th width="2px" data-orderable="false" class="sorting_asc"></th>
                        <th width="2px" data-orderable="false" class="sorting_asc"></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
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
            document.getElementById("student_data").style.width= "930px";

            document.getElementById("account").style.fontWeight= "600";
        }else{
            var msw = screen.width - 50 + "px";
            //--main content 
            document.getElementById("main").style.marginLeft="0px";
            document.getElementById("main").style.width= msw;
            document.getElementById("main").style.margin= "auto";
            document.getElementById("main").style.marginTop= "55px";
            document.getElementById("container-form").style.width= "300px";
            document.getElementById("container-table").style.marginLeft= "355px";
            document.getElementById("container-table").style.width= "920px";
            document.getElementById("student_data").style.width= "925px";
            document.getElementById("student_data").style.marginLeft= "0px";
            document.getElementById("container-table").style.marginTop= "-10px";
            document.getElementById("container-form").style.marginTop= "-10px";
            document.getElementById("container-form").style.marginBottom= "-10px";
            document.getElementById("content-title").style.paddingTop= "10px";
            document.getElementById("content-title").style.paddingBottom= " -8px";
            document.getElementById("content-title").style.fontSize= "26px";
            document.getElementById("content1-title").style.fontSize= "20px";
            document.getElementById("content2-title").style.fontSize= "20px";

            document.getElementById("ylevel").style.width= "200px";
            document.getElementById("account").style.fontWeight= "600";

            document.getElementById("insert-student").style.width= "70px";
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
            document.getElementById("student_data").style.width= "990px";
            
            document.getElementById("account").style.fontWeight= "600";
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
            
            document.getElementById("container-table").style.marginTop= "-10px";
            document.getElementById("container-form").style.marginTop= "-10px";
            document.getElementById("container-form").style.width= "250px"; 
            document.getElementById("container-form").style.marginBottom= "-10px"; 
            document.getElementById("container-table").style.marginLeft= "305px";
            document.getElementById("container-table").style.width= "725px";
            document.getElementById("student_data").style.width= "730px";
            document.getElementById("student_data").style.marginLeft= "0px";
            document.getElementById("content-title").style.paddingTop= "10px";
            document.getElementById("content-title").style.paddingBottom= " -8px";
            document.getElementById("content-title").style.fontSize= "26px";
            document.getElementById("content1-title").style.fontSize= "20px";
            document.getElementById("content2-title").style.fontSize= "20px";
            document.getElementById("ylevel").style.width= "180px";

            document.getElementById("account").style.fontWeight= "600";

            document.getElementById("insert-student").style.width= "70px";
            document.getElementById("clear").style.width= "70px";

        }
    }

    showActive();
    function showActive() {
        $("#student-hide").show();
        $("#student-show").hide();
        $("#add-student").show();
        $("#faculty").show();
        $("#addstud-active").show();
        $("#addstud-notactive").hide();
    }
    $(document).ready(function() {

        courseLoad();
        function courseLoad(){
            $(".course-category").load("../../model/load-course.php");
        }
    
    
        $("#insert-student").click(function(e){
        e.preventDefault();
            if($("#studid").val().length < 5){
                document.getElementById("studid").style.borderColor="red";
                setInterval(function(){
                document.getElementById("studid").style.borderColor="#ccc";
                },3000);
            }else if($("#fname").val().length < 2){
                document.getElementById("fname").style.borderColor="red";
                setInterval(function(){
                document.getElementById("fname").style.borderColor="#ccc";
                },3000);
            }else if($("#lname").val().length < 2){
                document.getElementById("lname").style.borderColor="red";
                setInterval(function(){
                document.getElementById("lname").style.borderColor="#ccc";
                },3000);
            }else if($("#section").val() == ""){
                document.getElementById("section").style.borderColor="red";
                setInterval(function(){
                document.getElementById("section").style.borderColor="#ccc";
                },3000);
            }else if($("#ylevel").val() == "" || $("#ylevel").val() == "Your year level.."){
                document.getElementById("ylevel").style.borderColor="red";
                setInterval(function(){
                document.getElementById("ylevel").style.borderColor="#ccc";
                },3000);
            }
            else if($("#course").val() == "" || $("#course").val() == "Your course.."){
                document.getElementById("course").style.borderColor="red";
                setInterval(function(){
                document.getElementById("course").style.borderColor="#ccc";
                },3000);
            }
            else {
                var fn = $("#fname").val();
                var ln = $("#lname").val();
                var mn = $("#mname").val();
                var sec = $("#section").val();
                $("#fname").val(fn.charAt(0).toUpperCase()+fn.slice(1));
                $("#lname").val(ln.charAt(0).toUpperCase()+ln.slice(1));

                if($("#mname").val()==""){}
                else{ $("#mname").val(mn.charAt(0).toUpperCase()+mn.slice(1)); }
                $("#section").val(sec.toUpperCase());
                 
                $.ajax({
                url:"../../model/insert-student.php",
                method:"POST",
                data:$("#form-student").serialize(),
                success:function(data){
                        $("#form-student")[0].reset();
                        $('#student_data').DataTable().destroy();
                        studentData();
                        if($("#insert-student").val()=="Submit"){ alert("Record Successfully Saved!"); }
                        else { alert("Record Successfully Updated!"); }
                        $("#insert-student").val("Submit");
                        $("#content1-title").html("Register Student");
                        $("#studid").attr("readOnly", false);   
                    }
                });
            }
        }); 

        studentData();

        function studentData(){
            $('#student_data').DataTable({
                "processing":true,
                "serverSide":true,
                "ajax": {
                    "url": "../../model/fetch-student.php",
                    "type": "POST"
                },
            })
        }
        $("#clear").click(function(e) {
            e.preventDefault();
            $("#form-student")[0].reset();  
            $("#id").val("");  
            $("#insert-student").val("Submit");
            $("#content1-title").html("Register Student");
            $("#studid").attr("readOnly", false);
        });

        $(document).on('click','.edit', function() {
            var id = $(this).attr("id");
            if(confirm("Edit selected student record?")){
                $.ajax({
                    url:"../../model/search-student.php",
                    method:"POST",
                    data:{id:id},
                    dataType:"json",
                    success:function(data){
                        $("#studid").val(data.studid);  
                        // document.getElementById("studid").readOnly = true;
                        $("#studid").attr("readOnly", true);
                        $("#studid").attr("border", "2px");
                        $("#fname").val(data.fname);
                        $("#lname").val(data.lname);
                        $("#mname").val(data.mname);
                        $("#ylevel").val(data.ylevel);
                        $("#section").val(data.section);
                        $("#course").val(data.course);
                        $("#id").val(data.id);
                        $("#insert-student").val("Update");
                        $("#content1-title").html("Update Student");
                        
                    }
                })
            }
        });

        $(document).on('click','.delete', function() {
            var id = $(this).attr("id");
            if(confirm("Delete selected student record?")){
                $.ajax({
                    url:"../../model/delete-student.php",
                    method:"POST",
                    data:{id:id},
                    success:function(data){
                        $('#student_data').DataTable().destroy();
                        studentData();
                        alert("Record Successfully Deleted!");
                    }
                });
            }
        }); 
    });
</script>

</body>
</html>
