<html>
<head>
    <title>Myspace</title>
    <link href="../../myspace/views/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="../../myspace/views/css/wall.css" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../../myspace/views/js/main.js"></script>
</head>
<body>
<div id="wallpaper">
    <div id="header">
        <img class="logoPic" src="../../myspace/views/img/sounder.png"/>
    </div>
    <?php include "header.php" ?>
    <div id="wallContent">
        <div id="hiddenMenu">
            <a href="#" class="noStyleLinks"><p class="hiddenMenuText">Edit Profile</p></a>
            <a href="../auth/logout" class="noStyleLinks"><p class="hiddenMenuText">Log Out</p></a>
        </div>
        <div id="underBorder">
            <div class="underBorderItem">
                <input class="underBorderText" type="submit" value="SOUND" name="sort_sound"/>
            </div>
            <div class="underBorderItem">
                <input class="underBorderText" type="submit" value="PHOTO" name="sort_photo"/>
            </div>

            <div class="underBorderItem">
                <input class="underBorderText" type="submit" value="TEXT" name="sort_text"/>
            </div>
        </div>
        <div class="statusContent">
        <?php
        for($post = 0; $post < count($posts); $post++){

                if($posts[$post]["profile_img"] == null){
                    $picture = "../../myspace/views/img/anonym.png";
                }
                else{
                    $picture = $posts[$post]["profile_img"];
                }
                ?>
                <div class="statusUser">
                    <img src="<?php echo($picture)?>" class="statusUserImg">
                    <input class="statusUserText" value="<?php echo($posts[$post]["first_name"] . " " . $posts[$post]["last_name"])?>" type="submit" name=""/>
                </div>
                <div class="statuses">
                    <div class="statusBorder">
                        <p class="statusBorderText"><?php echo($posts[$post]['created'])?></p>
                    </div>
                    <div class="statusPosts">
                        <p class="statusPostsText"><?php echo($posts[$post]['text'])?></p>
                    </div>
                    <div class="statusPosts">
                        <img class="statusPostsPhoto" src=""/>
                    </div>
                </div>
                <?php
                $comment_count = 0;
                for($k = 0; $k < count($comments); $k++){
                    if($comments[$k]["post_id"] == $posts[$post]['post_id']){
                        $comment_count += 1;
                    }
                }
                ?>
                <div class="statusUnderBorder">
                    <div class="showLikes">
                        <p class="showLikesText">13,900 L</p>
                        <a href="#" class="noStyleLinks"><p class="showComments"><?php echo($comment_count)?></p><img src="../../myspace/views/img/commentpic.png" class="commentPic"/></a>
                    </div>
                    <div class="statusButtons">
                        <input class="likeButton" type="submit" value="LIKE" name=""/>
                        <form class="comment_form commentButton" method="post">
                            <input class="hidden_post_id" type="hidden" value="<?php echo($posts[$post]['post_id'])?>">
                            <input class="commentButton" type="button" value="COMMENT" name="show_comments"/>
                        </form>
                    </div>
                </div>
                <div class="commentContent">
                    <?php
                    for($j = 0; $j < count($comments); $j++){
                        if($comments[$j]["post_id"] == $posts[$post]['post_id']){
                        ?>
                            <div class="othersComments">
                                <div class="othersCommentsBorder">
                                    <p class="commentBorderText"><?php echo($comments[$j]['first_name'] . " " . $comments[$j]['last_name'])?></p>
                                </div>
                                <div class="othersCommentContent">
                                    <p class="othersCommentText"><?php echo($comments[$j]['content'])?></p>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <form class="addCommentForm" method="post" action="../wall/comment">
                        <div class="yourComment">
                            <input class="yourCommentText" name="content" type="text" placeholder="Wright your comment here..."/>
                        </div>
                        <input class="hidden_post_id" name="hidden_post_id" type="hidden" value="<?php echo($post['post_id'])?>">
                        <input class="yourCommentButton" type="submit" name="submit_comment" value="COMMENT"/>
                    </form>
                </div>
        <?php
        }?>

        </div>
    </div>
</div>
</body>
</html>