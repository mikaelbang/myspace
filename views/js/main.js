
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


    $(this).find('.comment_form').on('click', function(){

        event.preventDefault();

        var comment = {
            post_id: $(this).find('.hidden_post_id').val()
        };

        $.ajax({
            type: 'POST',
            url: '../wall/getComments',
            dataType: 'json',
            data: comment,
            success: function(comments){

                for(var i = 0; i < comments.length; i++){
                    var c = comments[i];
                    var p_id = c.post_id;

                    $('#others_comments'+ c.post_id +'').prepend('<div class="othersCommentsBorder">' +
                                                    '<p class="commentBorderText">' + c.first_name + " " + c.last_name + " || " + c.created + '</p>' +
                                                '</div>' +
                                                '<div class="othersCommentContent">' +
                                                    '<p class="othersCommentText">' + c.content + '</p>' +
                                                '</div>');
                }
            },
            error: function(){
                alert('Something went wrong');
            }
        });

        $(this).parent().parent().siblings().closest('.commentContent').toggle();
        $(this).parent().parent().siblings('.commentContent').find('.othersComments').empty();


    });

    $(this).find('.addCommentForm').on('submit', function(){
        event.preventDefault();
        alert($(this).serialize());

        var data = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '../wall/comment',
            //dataType: 'json',
            data: data,
            success: function(comment){
                alert(comment);
            },
            error: function(){
                alert('Something went wrong');
            }
        });
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



