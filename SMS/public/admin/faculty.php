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
        <h1 id="content-title"><i class="fas fa-user"></i>&nbsp;&nbsp;Account Management <span style="font-size: 16px;color: #888;">/ Faculty Panel</span> </h1>
        <hr class="new1">
        <br>
        <div class="container" id="container-form">
        <h2 style="margin-top:-5px;color:#888;font-size: 26px" id="content1-title">Register Faculty</h2>

            <form id="form-faculty" method="POST">
                <input type="hidden" id="id" name="id" placeholder="">
               
                <label for="fname">First Name</label><span class="required-logo">&#42;</span>
                <input type="text" id="fname" name="fname" placeholder="Your first name.." required>
                <label for="lname">Last Name</label><span class="required-logo">&#42;</span>
                <input type="text" id="lname" name="lname" placeholder="Your last name.." required>
                <label for="lname">Middle Name</label>
                <input type="text" id="mname" name="mname" placeholder="Your middle name.." >
                <label for="fname">Contact Number</label><span class="required-logo">&#42;</span>
                <input type="text" id="contact" name="contact" placeholder="Your contact number.. " required>
               
                <input type="submit" value="Submit" id="insert-faculty">
                <button id="clear">Cancel</button>
            </form>
        </div>
        <div class="table-container" id="container-table">
        <h2 style="margin-top:-5px;color:#888;font-size: 26px" id="content2-title">Faculty Data</h2>
            <table id="faculty_data" class="display compact">
                <thead>
                    <tr>
                        <th data-orderable="false" class="sorting_asc">Contact Number</th>
                        <th data-orderable="false" class="sorting_asc">First Name</th>
                        <th data-orderable="false" class="sorting_asc">Last Name</th>
                        <th data-orderable="false" class="sorting_asc">Middle Name</th>
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
            document.getElementById("faculty_data").style.width= "930px";
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
            document.getElementById("faculty_data").style.width= "925px";
            document.getElementById("faculty_data").style.marginLeft= "0px";
            document.getElementById("container-table").style.marginTop= "-10px";
            document.getElementById("container-form").style.marginTop= "-10px";
            document.getElementById("container-form").style.marginBottom= "-10px";
            document.getElementById("content-title").style.paddingTop= "10px";
            document.getElementById("content-title").style.paddingBottom= " -8px";
            document.getElementById("content-title").style.fontSize= "26px";
            document.getElementById("content1-title").style.fontSize= "20px";
            document.getElementById("content2-title").style.fontSize= "20px";

            document.getElementById("account").style.fontWeight= "600";

            document.getElementById("insert-faculty").style.width= "70px";
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
            document.getElementById("faculty_data").style.width= "990px";

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
            document.getElementById("faculty_data").style.width= "730px";
            document.getElementById("faculty_data").style.marginLeft= "0px";
            document.getElementById("content-title").style.paddingTop= "10px";
            document.getElementById("content-title").style.paddingBottom= " -8px";
            document.getElementById("content-title").style.fontSize= "26px";
            document.getElementById("content1-title").style.fontSize= "20px";
            document.getElementById("content2-title").style.fontSize= "20px";


            document.getElementById("account").style.fontWeight= "600";

            document.getElementById("insert-faculty").style.width= "70px";
            document.getElementById("clear").style.width= "70px";

        }
    }

    showActive();
    function showActive() {
        $("#student-hide").show();
        $("#student-show").hide();
        $("#add-student").show();
        $("#faculty").show();
        $("#addfac-active").show();
        $("#addfac-notactive").hide();
    }

    $(document).ready(function() {
        facultyData();
        function facultyData(){
            $('#faculty_data').DataTable({
                "processing":true,
                "serverSide":true,
                "ajax": {
                    "url": "../../model/fetch-faculty.php",
                    "type": "POST"
                },
            })
        }
        $("#clear").click(function(e) {
            e.preventDefault();
            $("#form-faculty")[0].reset();  
            $("#insert-faculty").val("Submit");
            $("#content1-title").html("Register Faculty");
        });

        $("#insert-faculty").click(function(e){
        e.preventDefault();
            if($("#fname").val().length < 2){
                document.getElementById("fname").style.borderColor="red";
                setInterval(function(){
                document.getElementById("fname").style.borderColor="#ccc";
                },3000);
            }else if($("#lname").val().length < 2){
                document.getElementById("lname").style.borderColor="red";
                setInterval(function(){
                document.getElementById("lname").style.borderColor="#ccc";
                },3000);
            }else if($("#contact").val() < 11){
                document.getElementById("contact").style.borderColor="red";
                setInterval(function(){
                document.getElementById("contact").style.borderColor="#ccc";
                },3000);
            }
            else {
                var fn = $("#fname").val();
                var ln = $("#lname").val();
                var mn = $("#mname").val();
                
                $("#fname").val(fn.charAt(0).toUpperCase()+fn.slice(1));
                $("#lname").val(ln.charAt(0).toUpperCase()+ln.slice(1));

                if($("#mname").val()==""){}
                else{ $("#mname").val(mn.charAt(0).toUpperCase()+mn.slice(1)); }
               
                 
                $.ajax({
                url:"../../model/insert-faculty.php",
                method:"POST",
                data:$("#form-faculty").serialize(),
                success:function(data){
                        $("#form-faculty")[0].reset();
                        $('#faculty_data').DataTable().destroy();
                        facultyData();
                        if($("#insert-faculty").val()=="Submit"){ alert("Record Successfully Saved!"); }
                        else { alert("Record Successfully Updated!"); }
                        $("#insert-faculty").val("Submit");
                        $("#content1-title").html("Register Faculty");   
                    }
                });
            }
        }); 
        $(document).on('click','.edit', function() {
            var id = $(this).attr("id");
            if(confirm("Edit selected faculty record?")){
                $.ajax({
                    url:"../../model/search-faculty.php",
                    method:"POST",
                    data:{id:id},
                    dataType:"json",
                    success:function(data){
                        
                        $("#fname").val(data.fname);
                        $("#lname").val(data.lname);
                        $("#mname").val(data.mname);
                        $("#contact").val(data.contact);
                        $("#id").val(data.id);
                        $("#insert-faculty").val("Update");
                        $("#content1-title").html("Update Faculty");
                        
                    }
                })
            }
        });
        $(document).on('click','.delete', function() {
            var id = $(this).attr("id");
            if(confirm("Delete selected faculty record?")){
                $.ajax({
                    url:"../../model/delete-faculty.php",
                    method:"POST",
                    data:{id:id},
                    success:function(data){
                        $('#faculty_data').DataTable().destroy();
                        facultyData();
                        alert("Record Successfully Deleted!");
                    }
                });
            }
        });
    });
</script>
</body>
</html>