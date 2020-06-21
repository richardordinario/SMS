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
    <h1 id="content-title"><i class="fas fa-graduation-cap"></i>&nbsp;&nbsp;Course Management <span style="font-size: 16px;color: #888;">/ Course Panel</span> </h1>
        <hr class="new1">
        <br>
        <div class="container" id="container-form">
        <h2 style="margin-top:-5px;color:#888;font-size: 26px" id="content1-title">New Course</h2>
            <form id="form-course" method="POST">
                <input type="hidden" id="id" name="id" placeholder="">
                <label for="">Course Code</label><span class="required-logo">&#42;</span>
                <input type="text" id="course-code" name="course-code" placeholder="Course code.. " required>
                <label for="">Course Description</label><span class="required-logo">&#42;</span>
                <input type="text" id="course-desc" name="course-desc" placeholder="Course description.." required>
                
                <input type="submit" value="Submit" name="add-student-btn" id="insert-course">
                <button id="clear">Cancel</button>
            </form>
        </div>
        <div class="table-container" id="container-table">
        <h2 style="margin-top:-5px;color:#888;font-size: 26px" id="content2-title">Course Data</h2>
            <table id="course_data" class="display compact">
                <thead>
                    <tr>
                        <th data-orderable="false" class="sorting_asc">Course Code</th>
                        <th data-orderable="false" class="sorting_asc">Course Description</th>
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
            document.getElementById("course_data").style.width= "930px";
            document.getElementById("course-menu").style.fontWeight="600";
        }else{
            var msw = screen.width - 50 + "px";
            //--main content 
            document.getElementById("main").style.marginLeft="0px";
            document.getElementById("main").style.width= msw;
            document.getElementById("main").style.margin= "auto";
            document.getElementById("main").style.marginTop= "55px";

            document.getElementById("course-menu").style.fontWeight="600";

            document.getElementById("container-form").style.width= "300px";
            document.getElementById("container-table").style.marginLeft= "355px";
            document.getElementById("container-table").style.width= "920px";
            document.getElementById("course_data").style.width= "925px";
            document.getElementById("course_data").style.marginLeft= "0px";
            document.getElementById("container-table").style.marginTop= "-10px";
            document.getElementById("container-form").style.marginTop= "-10px";
            document.getElementById("container-form").style.marginBottom= "-10px";
            document.getElementById("content-title").style.paddingTop= "10px";
            document.getElementById("content-title").style.paddingBottom= " -8px";
            document.getElementById("content-title").style.fontSize= "26px";
            document.getElementById("content1-title").style.fontSize= "20px";
            document.getElementById("content2-title").style.fontSize= "20px";

            // document.getElementById("ylevel").style.width= "200px";

            document.getElementById("insert-course").style.width= "70px";
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
            document.getElementById("course_data").style.width= "990px";
            document.getElementById("course-menu").style.fontWeight="600";
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
            
            document.getElementById("course-menu").style.fontWeight="600";
            document.getElementById("container-table").style.marginTop= "-10px";
            document.getElementById("container-form").style.marginTop= "-10px";
            document.getElementById("container-form").style.width= "250px"; 
            document.getElementById("container-form").style.marginBottom= "-10px"; 
            document.getElementById("container-table").style.marginLeft= "305px";
            document.getElementById("container-table").style.width= "725px";
            document.getElementById("course_data").style.width= "730px";
            document.getElementById("course_data").style.marginLeft= "0px";
            document.getElementById("content-title").style.paddingTop= "10px";
            document.getElementById("content-title").style.paddingBottom= " -8px";
            document.getElementById("content-title").style.fontSize= "26px";
            document.getElementById("content1-title").style.fontSize= "20px";
            document.getElementById("content2-title").style.fontSize= "20px";
            // document.getElementById("ylevel").style.width= "180px";

            document.getElementById("insert-course").style.width= "70px";
            document.getElementById("clear").style.width= "70px";

        }
    }
    $(document).ready(function() {
        courseData();
        function courseData(){
            $('#course_data').DataTable({
                "processing":true,
                "serverSide":true,
                "ajax": {
                    "url": "../../model/fetch-course.php",
                    "type": "POST"
                },
            })
        }

        $("#insert-course").click(function(e) {
            e.preventDefault();
            if($("#course-code").val().length < 2){
                document.getElementById("course-code").style.borderColor="red";
                setInterval(function(){
                document.getElementById("course-code").style.borderColor="#ccc";
                },3000);
            }else if($("#course-desc").val().length < 2){
                document.getElementById("course-desc").style.borderColor="red";
                setInterval(function(){
                document.getElementById("course-desc").style.borderColor="#ccc";
                },3000);
            }else {
                var code = $("#course-code").val();
                var desc = $("#course-desc").val();
                $("#course-code").val(code.toUpperCase());
                $("#course-desc").val(desc.toUpperCase());
                $.ajax({
                url:"../../model/insert-course.php",
                method:"POST",
                data:$("#form-course").serialize(),
                success:function(data){
                        $("#form-course")[0].reset();
                        $('#course_data').DataTable().destroy();
                        courseData();
                        if($("#insert-course").val()=="Submit"){ alert("Record Successfully Saved!"); }
                        else { alert("Record Successfully Updated!"); }
                        $("#insert-course").val("Submit");
                        $("#content1-title").html("New Course");
                    }
                });
            }
        });

        $("#clear").click(function(e) {
            e.preventDefault();
            $("#form-course")[0].reset();  
            $("#insert-course").val("Submit");
            $("#content1-title").html("New Course");
        });

        $(document).on('click','.edit', function() {
            var id = $(this).attr("id");
            if(confirm("Edit selected record?")){
                $.ajax({
                    url:"../../model/search-course.php",
                    method:"POST",
                    data:{id:id},
                    dataType:"json",
                    success:function(data){
                        $("#course-code").val(data.course_code);
                
                        $("#course-code").attr("borderColor", "#888");
                        $("#course-desc").val(data.course_desc);
                        $("#id").val(data.id);
                        $("#insert-course").val("Update");
                        $("#content1-title").html("Update Course");
                        
                    }
                })
            }
        });

        $(document).on('click','.delete', function() {
            var id = $(this).attr("id");
            if(confirm("Delete selected record?")){
                $.ajax({
                    url:"../../model/delete-course.php",
                    method:"POST",
                    data:{id:id},
                    success:function(data){
                        $('#course_data').DataTable().destroy();
                        courseData();
                        alert("Record Successfully Deleted!");
                    }
                });
            }
        });
    });
</script>
</body>
</html>