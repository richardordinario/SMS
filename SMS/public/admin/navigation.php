<div id="topnav">
    <!-- <a href="" class="user-mobile">Welcome: <strong>Richard Ordinario</strong></a> -->
    <a href="#" style="float: left;font-size: 16px;"><i class="fas fa-times" id="sidenav-hide"></i><span class="fas fa-bars"  id="sidenav-show"></span>&nbsp;&nbsp;&nbsp;Student Management System</a>
    <!-- <a href=""><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a> -->
    <a href="../../logout"style="padding: 8px;background-color:#f5f6fa; background-image: linear-gradient(#f5f6fa,#f5f6fa, #dcdde1);border: 1px solid #999;border-radius:2px;margin-top: 10px;margin-right:15px;font-size:12px;" id="logout-btn"><div align="right" >Logout</div></a>
</div>
<div id="sidenav">
    <span><img src="../../asset/img/people.png" alt="pic" class="pic" id="img"></span><span class="welcome">Welcome <?php echo $utype;?></span>
    <span class="user"><?php echo $fullname;?></span>
    <a href="index" id="dashboard-menu" style="border-top: 1px solid #f2f2f2;"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;&nbsp;Dashboard</a>
    
    <a href="#" id="account"><i class="fas fa-user"></i>&nbsp;&nbsp;&nbsp; Account Management
    <span class="fas fa-angle-left" id="student-show"></span>
    <span class="fas fa-angle-down" id="student-hide"></span>
    </a>    
    <a href="student" style="padding-left: 40px;font-size: 14px;color: #888;display:none;" id="add-student">
    <i class="far fa-circle" id="addstud-notactive"></i>
    <i class="far fa-dot-circle" id="addstud-active" style="display:none;"></i>
    &nbsp;&nbsp;&nbsp; Student Management </a> 
    <?php 
    if($utype == "Faculty") {}
    else
    {
        echo '
            <a href="faculty" style="padding-left: 40px;font-size: 14px;color: #888;display:none;" id="faculty" >
            <i class="far fa-circle" id="addfac-notactive"></i>
            <i class="far fa-dot-circle" id="addfac-active" style="display:none;"></i>
            &nbsp;&nbsp;&nbsp; Faculty Management </a>
        ';
    }
    ?>

    <a href="subject" id="subject-menu"><i class="fas fa-book"></i>&nbsp;&nbsp;&nbsp; Subject Management</a>
    <a href="course" id="course-menu"><i class="fas fa-graduation-cap"></i>&nbsp;&nbsp; Course Management</a>
    <!-- <a href=""><i class="fas fa-chalkboard-teacher"></i>&nbsp;&nbsp;&nbsp;Faculty</a> -->
    <a href="schedule" id="schedule-menu"><i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;&nbsp; Class Schedule</a>
    <?php
    if($utype == "Faculty" || $utype == "Admin") {}
    else{echo '<a href="admin" id="admin-menu"><i class="fas fa-user-cog"></i>&nbsp;&nbsp;&nbsp;Admin Management</a>';}
    ?>
    
    <!-- <a href=""><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp; Logout</a> -->
</div>