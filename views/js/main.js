
$(document).ready(function(){
    $(".showRegister").click(function(){
        $("#register").css("display","block");
        $("#login").css("display","none");
        $(".hideLogin").css("display","none");
        $(".hideRegister").css("display","block");
    });

    $(".showLogin").click(function(){
        $("#register").css("display","none");
        $("#login").css("display","block");
        $(".hideLogin").css("display","block");
        $(".hideRegister").css("display","none");
    });

    $("#rightMenuItem").click(function(){
        event.preventDefault();
        $("#hiddenMenu").toggle();
    });

    $(".commentButton").click(function(){
        $(this).parent().parent().parent().siblings('.commentContent').toggle();
    });

    $(".postContent").click(function(){
        $(".hiddenPostContent").css("display","inline-block");
    });

    $("#showSound").click(function(){
        $(".writePost").css("display","none");
        $(".postPhoto").css("display","none");
        $(".postSound").css("display","inline-block");
    });

    $("#showPhoto").click(function(){
        $(".writePost").css("display","none");
        $(".postPhoto").css("display","inline-block");
        $(".postSound").css("display","none");
    });

    $("#showText").click(function(){
        $(".writePost").css("display","inline-block");
        $(".postPhoto").css("display","none");
        $(".postSound").css("display","none");
    });

});



