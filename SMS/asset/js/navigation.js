
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
    }else{
        var msw = screen.width - 50 + "px";
        //--main content 
        document.getElementById("main").style.marginLeft="0px";
        document.getElementById("main").style.width= msw;
        document.getElementById("main").style.margin= "auto";
        document.getElementById("main").style.marginTop= "55px";
        document.getElementById("container-form").style.width= "300px";
        document.getElementById("container-table").style.marginLeft= "350px";
        document.getElementById("container-table").style.width= "925px";
        document.getElementById("student_data").style.marginLeft= "0px";
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
    }else {
        var tsw = screen.width - 250 + "px";
        var msw = screen.width - 240 + "px"; 
        document.getElementById("sidenav").style.marginLeft="0px"; 
        document.getElementById("sidenav").style.width="250px";
        document.getElementById("img").style.marginLeft="5px";
        document.getElementById("topnav").style.width= tsw;
        document.getElementById("topnav").style.marginLeft="250px";

        document.getElementById("main").style.width= msw;
        document.getElementById("main").style.marginLeft="260px";


    }
}
