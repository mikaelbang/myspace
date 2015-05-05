
            <?php include "header.php"?>
            <div id="wallContent">
                <?php
                    if($user->profile_img == null){
                        $picture = "../../myspace/views/img/anonym.png";
                    }
                    else{
                        $picture = $user->profile_img;
                }?>
                <div class="profileContent">
                    <div class="profileInfo">
                        <img class="profilePic" src="<?php echo($picture)?>" />
                        <div class="profileFollow">
                            <p class="profileName"><?php echo($user->first_name . " " . $user->last_name)?></p>
                            <div class="follows">
                                <div class="followsNrDiv">
                                    <p class="followsNr"><?php echo($follow)?></p>
                                </div>
                                <a href="../../myspace/user/followers" class="noStyleLinks"><p class="followsText">Follow</p></a>
                            </div>
                            <div class="follows">
                                <div class="followsNrDiv">
                                    <p class="followsNr"><?php echo($followers)?></p>
                                </div>
                                <a href="../../myspace/user/followers" class="noStyleLinks"><p class="followsText">Followers</p></a>
                            </div>
                            <div class="followRequest">
                                <a class="noStyleLinks" href="../../myspace/user/followers"><p class="followRequestText">You have ? requests</p></a>
                            </div>
                            <input type="submit" name="follow_button" id="followButton" value="FOLLOW"/>
                            <input type="submit" name="" id="unfollowButton" value="UNFOLLOW"/>
                            <div class="about">
                                <p class="aboutText"><?php echo($user->about)?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post">
                    <form method="post" action="../user/addStatus">
                        <div class="postContent">
                            <textarea class="writePost" name="text" placeholder="Write your status here..."></textarea>
                            <input class="postPhoto" name="photo" placeholder="Choose your photo..." type="text"/>
                            <input class="postSound" name="sound" placeholder="Choose your sound..." type="text"/>
                        </div>
                        <div class="hiddenPostContent">
                            <div class="postBorder">
                                <p class="postBorderText" id="showSound">SOUND</p>
                                <p class="postBorderText" id="showPhoto">PHOTO</p>
                                <p class="postBorderText" id="showText">TEXT</p>
                            </div>
                            <input type="submit" class="postButton" name="post_text_button" value="POST"/>
                            <input type="submit" class="photoButton" name="post_photo_button" value="POST"/>
                            <input type="submit" class="soundButton" name="post_sound_button" value="POST"/>
                        </div>
                    </form>
                </div>
                <div class="statusContent">
                    <div class="aStatus">
                        <div class="statusUser">
                            <img src="http://40.media.tumblr.com/69fd5bd214dfd9ae52a3196fbf9f46a9/tumblr_njmfshP8ln1tk1dwxo2_1280.jpg" class="statusUserImg">
                            <input class="statusUserText" value="Mattias Willhelmsson" type="submit" name=""/>
                        </div>
                        <div class="statuses">
                            <div class="statusBorder">
                                <p class="statusBorderText">Mattias posted a sound | | 2015-03-24 | 15:52</p>
                            </div>
                            <div class="statusPosts">
                                <p class="statusPostsText">//michaelshuntByRichardAndTheButter..//</p>
                            </div>
                            <div class="statusPosts">
                                <img class="statusPostsPhoto" src=""/>
                            </div>
                        </div>
                    </div>
                    <div class="statusUnderBorder">
                        <div class="showLikes">
                            <p class="showLikesText">13,900 L</p>
                            <a href="#" class="noStyleLinks"><p class="showComments">45</p><img src="../../myspace/views/img/commentpic.png" class="commentPic"/></a>
                        </div>
                        <div class="statusButtons">
                            <button class="likeButton" type="submit"  value="LIKE" name="">LIKE</button>
                            <input class="commentButton" type="submit" value="COMMENT" name=""/>
                        </div>
                    </div>
                </div>
                <div class="commentContent">
                    <div class="othersComments">
                        <div class="othersCommentsBorder">
                            <p class="commentBorderText">Karl Gunnarsson | | 2015-03-25 13:26  </p>
                        </div>
                        <div class="othersCommentContent">
                            <p class="othersCommentText">Det här var allt en bra låt. Det enda som är bättre än låten är namnet på bandet.</p>
                        </div>
                        <div class="othersCommentsBorder">
                            <p class="commentBorderText">Karl Gunnarsson | | 2015-03-25 13:26  </p>
                        </div>
                        <div class="othersCommentContent">
                            <p class="othersCommentText">Det här var allt en bra låt. Det enda som är bättre än låten är namnet på bandet. Det enda som är bättre än låten är namnet på bandet. Det enda som är bättre än låten är namnet på bandet. Det enda som är bättre än låten är namnet på bandet. Det enda som är bättre än låten är namnet på bandet. Det enda som är bättre än låten är namnet på bandet.</p>
                        </div>
                    </div>
                    <div class="yourComment">
                        <p class="yourCommentText">Wright your comment here...</p>
                    </div>
                    <input class="yourCommentButton" type="submit" name="" value="COMMENT"/>
                </div>
            </div>
        </div>
    </body>
</html>