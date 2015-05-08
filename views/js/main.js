
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

    $("#wallContent").click(function(){
        $(".searchContent").hide();
    });

    $("#header").click(function(){
        $(".searchContent").hide();
    });




    // $('.searchContent').click(function(e) { //button click class name is myDiv
    //    e.stopPropagation();
   // })

    //$(function(){
     //   $(document).click(function(){
      //      $('.searchContent').hide(); //hide the button

        //});
    //});

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

        var postId = $(this).siblings('.hidden_post_id').val();
        var comment = $(this).siblings('.yourComment').find('.yourCommentText').val();
        var userId = $(this).siblings('.hidden_current_user').val();
        var userName = $(this).siblings('.hidden_user_name').val();
        var userPic = $(this).siblings('.hidden_profile_pic').val();
        var this_element = $(this).siblings('.yourComment'); // Sends info of where the comment should be added so we can prepend it.
        var created = GetTodayDate();


        comment_insert(postId, comment, userId, this_element, userName, userPic, created);

        $(this).siblings('.yourComment').find('.yourCommentText').val('');

        //console.log($(this).parent().parent().next('.statusUnderBorder'));

        //alert($(this).parent().siblings().closest('.statusUnderBorder').find('.showComments')[0].innerText);


    })
});


function comment_insert(postId, comment, userId, this_element, userName, userPic, created){


    $.post("../controllers/comment.php" ,
        {
            hidden_post_id: postId,
            content: comment,
            hidden_current_user: userId
        }
    )
        .error(
            function(){
                console.log("Error: ");
            })
        .success(
            function(data){

                addCommentToHTML(postId, comment, userId, this_element, userName, userPic, created);
            }
        );
}

function addCommentToHTML(postId, comment, userId, this_element, userName, userPic, created){

    var t = '';
    t += '<div class="othersComments">';
    t +=    '<div class="othersCommentsBorder">';
    t +=        '<p class="commentBorderText">' + userName + " || " + created + '</p>';
    t +=    '</div>';
    t +=    '<div class="othersCommentContent">';
    t +=        '<img class="othersCommentPic" src="' + userPic + '"/>';
    t +=        '<p class="othersCommentText">' + comment + '</p>';
    t +=    '</div>';
    t += '</div>';

    if(comment != ''){
        this_element.before(t);
    }

}


function GetTodayDate() {
    var tdate = new Date();
    var dd = tdate.getDate(); //yields day
    if(dd < 10){
        dd = "0" + dd;
    }
    var MM = tdate.getMonth(); //yields month
    if(MM < 10){
        MM = MM + 1;
        MM = "0" + MM;
    }
    var yyyy = tdate.getFullYear(); //yields year
    var time = tdate.getHours() + ":" + tdate.getMinutes() + ":" + tdate.getSeconds();
    var now = yyyy + "-" + MM + "-" + dd + " " + time;

    return now;
}
