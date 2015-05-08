
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

    $(".search").click(function(){
        $(".searchContent").show();
    });

    $('.searchContent').click(function(e) { //button click class name is myDiv
        e.stopPropagation();
    })

    $(function(){
        $(document).click(function(){
            $('.searchContent').hide(); //hide the button

        });
    });

    $(".editAbout").click(function(){
        $(".editAbout").css("height","100px");
    });


        /*
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

                $(this).parent().parent().siblings().closest('.commentContent').animate({height: 'toggle'});
                $(this).parent().parent().siblings('.commentContent').find('.othersComments').empty();


            });*/

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


    function ajax(comment){

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
    }


});



