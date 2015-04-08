
        <?php include "header.php" ?>
            <div id="wallContent">
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
                for($post = 0; $post < count($posts); $post++){
                    $currentPostId = $posts[$post]["post_id"];
                    if($posts[$post-1]["post_id"] != $currentPostId){

                        if($posts[$post]["profile_img"] == null){
                            $picture = "../../myspace/views/img/anonym.png";
                        }
                        else{
                            $picture = $posts[$post]["profile_img"];
                        }
                ?>
                    <div class="statusContent">
                        <div class="statusUser">
                            <img src="<?php echo($picture)?>" class="statusUserImg">
                            <input class="statusUserText" value="<?php echo($posts[$post]["first_name"] . " " . $posts[$post]["last_name"])?>" type="submit" name=""/>
                        </div>
                        <div class="statuses">
                            <div class="statusBorder">
                                <p class="statusBorderText"><?php echo($posts[$post]["first_name"] . " | " . $posts[$post]['created'])?></p>
                            </div>
                            <div class="statusPosts">
                                <p class="statusPostsText"><?php echo($posts[$post]['text'])?></p>
                            </div>
                            <div class="statusPosts">
                                <img class="statusPostsPhoto" src=""/>
                            </div>
                        </div>
                        <div class="statusUnderBorder">
                            <div class="showLikes">
                                <p class="showLikesText">13,900 L</p>
                                <a href="#" class="noStyleLinks"><p class="showComments">45</p><img src="../../myspace/views/img/commentpic.png" class="commentPic"/></a>
                            </div>
                            <div class="statusButtons">
                                <input class="likeButton" type="submit" value="LIKE" name=""/>
                                <form class="comment_form commentButton" method="post">
                                    <input class="hidden_post_id" type="hidden" value="<?php echo($posts[$post]['post_id'])?>">
                                    <input class="commentButton" type="button" value="COMMENT" name="show_comments"/>
                                </form>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                        <div class="commentContent">
                            <div id="others_comments<?php //echo($posts[$post]["post_id"])?>" class="othersComments">
                                <?php
                                foreach($posts as $comment){
                                    if($posts[$post]['post_id'] == $comment["post_id"]){
                                    ?>
                                        <div class="othersCommentsBorder">
                                            <p class="commentBorderText"><?php echo($comment["first_name"] . "  |  " . $comment["created"])?></p>
                                        </div>
                                        <div class="othersCommentContent">
                                            <p class="othersCommentText"><?php echo($comment["content"])?></p>
                                        </div>
                                <?php
                                    }
                                } ?>

                            </div>
                            <form class="addCommentForm" method="post" action="../wall/comment">
                                <div class="yourComment">
                                    <input class="yourCommentText" name="content" type="text" placeholder="Wright your comment here..."/>
                                </div>
                                <input class="hidden_post_id" name="hidden_post_id" type="hidden" value="<?php echo($posts[$post]['post_id'])?>">
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