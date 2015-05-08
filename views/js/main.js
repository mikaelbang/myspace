
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

    $("#showEdit").click(function(){
        event.preventDefault();
        $("#editContent").slideDown();
        $("#page-cover").css("display","block")
    });

    $('.commentButton').on('click', function(){

        //event.preventDefault();


    $(this).parent().parent().next('.commentContent').animate({height: 'toggle'});
        //$(this).parent().parent().siblings('.commentContent').find('.othersComments').empty();

    });

    $("#cancelButton").click(function(){
        $("#page-cover").css("display","none");
        $("#editContent").css("display","none")
    });


    $(".editAbout").click(function(){
        $(".editAbout").css("height","100px");
    });


    $(".postContent").click(function(){
        $(".hiddenPostContent").slideDown();
    });

    $("#showSound").click(function(){
        $(".writePost").css("display","none");
        $(".postPhoto").css("display","none");
        $(".postSound").css("display","inline-block");
        $(".soundButton").css("display","inline-block");
        $(".photoButton").css("display","none");
        $(".postButton").css("display","none");

    });

    $("#showPhoto").click(function(){
        $(".writePost").css("display","none");
        $(".postPhoto").css("display","inline-block");
        $(".postSound").css("display","none");
        $(".photoButton").css("display","inline-block");
        $(".soundButton").css("display","none");
        $(".postButton").css("display","none");

    });

    $("#showText").click(function(){
        $(".writePost").css("display","inline-block");
        $(".postPhoto").css("display","none");
        $(".postSound").css("display","none");
        $(".postButton").css("display","inline-block");
        $(".soundButton").css("display","none");
        $(".photoButton").css("display","none");

    });

    $('.yourCommentButton').on('click', function(){

        //alert($(this).siblings('.yourComment').find('.yourCommentText').val());

        //console.log($(this).siblings('.yourComment').find('.yourCommentText'));

        var postId = $(this).siblings('.hidden_post_id').val();
        var comment = $(this).siblings('.yourComment').find('.yourCommentText').val();
        var userName = $(this).siblings('.hidden_current_user').val();

        comment_insert(postId, comment, userName);
    })
});


function comment_insert(postId, comment, userName){

    $.post("../controllers/comment.php" ,
        {
            task: "commentInsert",
            hidden_post_id: postId,
            content: comment
        }
    )
        .error(
            function(){
                console.log("Error: ");
            })
        .success(
            function(data){
                console.log(data);
            }
        );
}



