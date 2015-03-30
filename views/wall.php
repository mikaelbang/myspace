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
                <p id="logo">AW</p>
            </div>
        <?php include "header.php" ?>
            <div id="wallContent">
                <div id="hiddenMenu">
                    <a href="#" class="noStyleLinks"><p class="hiddenMenuText">Edit Profile</p></a>
                    <a href="#" class="noStyleLinks"><p class="hiddenMenuText">Log Out</p></a>
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
                <?php
                foreach($posts as $post){
                ?>
                    <div class="statusContent">
                        <div class="statusUser">
                            <img src="<?php echo($post['profile_img'])?>" class="statusUserImg">
                            <input class="statusUserText" value="<?php echo($post["first_name"] . " " . $post["last_name"])?>" type="submit" name=""/>
                        </div>
                        <div class="statuses">
                            <div class="statusBorder">
                                <p class="statusBorderText"><?php echo($post['created'])?></p>
                            </div>
                            <div class="statusPosts">
                                <p class="statusPostsText"><?php echo($post['text'])?></p>
                            </div>
                            <div class="statusPosts">
                                <img class="statusPostsPhoto" src=""/>
                            </div>
                        </div>
                        <div class="statusUnderBorder">
                            <div class="showLikes">
                                <p class="showLikesText">13,900 L</p>
                                <p class="showComments">45 C</p>
                            </div>
                            <div class="statusButtons">
                                <input class="likeButton" type="submit" value="LIKE" name=""/>
                                <form class="comment_form commentButton" method="post">
                                    <input class="hidden_post_id" type="hidden" value="<?php echo($post['post_id'])?>">
                                    <input class="commentButton" type="submit" value="COMMENT" name="show_comments"/>
                                </form>
                            </div>
                        </div>
                        <div class="commentContent">
                            <div id="others_comments<?php echo($post["post_id"])?>" class="othersComments">

                            </div>
                            <form class="addCommentForm" method="post" action="../wall/comment">
                                <div class="yourComment">
                                    <input class="yourCommentText" name="content" type="text" placeholder="Wright your comment here..."/>
                                </div>
                                <input class="hidden_post_id" name="hidden_post_id" type="hidden" value="<?php echo($post['post_id'])?>">
                                <input class="yourCommentButton" type="submit" name="submit_comment" value="COMMENT"/>
                            </form>
                        </div>
                    </div>

                <?php
                }?>
            </div>
        </div>
    </body>
</html>