
            <?php include "header.php" ?>
            <div id="wallContent">
                <div id="request">
                    <div class="requestBorder">
                        <p class="requestBorderText">Follow Requests</p>
                    </div>
                    <?php
                    foreach($requests as $request){
                        if($request["profile_img"] == null){
                            $picture = "../../myspace/views/img/anonym.png";
                        }
                        else{
                            $picture = $request["profile_img"];
                        }
                    ?>
                    <div class="requestUser">
                        <form method="post" action="../user/accept">
                        <p class="requestUserName"><?php echo($request["first_name"] . " " . $request["last_name"])?></p>
                        <img class="requestUserPic" src="<?php echo($picture)?>"/>
                        <input type="hidden" name="hid_user_id" value="<?php echo($request["user_id"])?>">
                        <div class="requestButtons">
                            <input name="accept_button" type="submit" class="accept" value="ACCEPT"/>
                            <input name="" type="submit" class="decline" value="DECLINE"/>
                        </div>
                        </form>
                    </div>
                    <?php
                        }

                    ?>
                </div>
                <div id="pushFollower" class="follower">
                    <div class="followerBorder">
                        <p class="followerBorderText">Followers</p>
                    </div>
                    <?php
                        foreach($followers as $follower){
                            if($follower["profile_img"] == null){
                                $picture = "../../myspace/views/img/anonym.png";
                            }
                            else{
                                $picture = $follower["profile_img"];
                    }?>
                    <div class="followerUser">
                        <form method="post" action="../user/follow">
                        <img class="followerUserPic" src="<?php echo($picture)?>"/>
                        <input type="hidden" name="hidden_user_id" value="<?php echo($follower["user_id"])?>"/>
                        <input class="followerUserText" type="submit" value="<?php echo($follower["first_name"] . " " . $follower["last_name"])?>" name="other_user_button"/>
                        <input class="miniFollowButton" type="submit" value="FOLLOW" name="follow_button"/>
                        </form>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="follower">
                    <div class="followerBorder">
                        <p class="followerBorderText">Follow</p>
                    </div>
                    <?php
                        foreach($iFollow as $follow){
                            if($follow["profile_img"] == null){
                                $picture = "../../myspace/views/img/anonym.png";
                            }
                            else{
                                $picture = $follow["profile_img"];
                    }?>
                    <div class="followerUser">
                        <form method="post" action="../user/unFollow">
                        <img class="followerUserPic" src="<?php echo($picture)?>"/>
                        <input type="hidden" name="hidden_user_id" value="<?php echo($follow["user_id"])?>" />
                        <input class="followerUserText" type="submit" value="<?php echo($follow["first_name"] . " " . $follow["last_name"])?>" name=""/>
                        <input class="miniUnfollow" type="submit" value="UNFOLLOW" name="unFollow_button"/>
                        </form>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>