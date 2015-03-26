
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
        $("#hiddenMenu").toggle();
    });

    $(".commentButton").click(function(){
        $(this).parent().parent().parent().siblings('.commentContent').toggle();
    });

});



