<html>
    <head>
        <title>Followers</title>
    </head>
    <body>
        <h1>List of followers</h1>
        <?php
        foreach($followers as $follower){
            ?>
        <p><?php echo($follower["first_name"] . " " . $follower["last_name"])?></p>
        <?php
        }
        ?>

        <h1>List of people I follow</h1>
        <?php
        foreach($Ifollow as $follows){
        ?>
        <p><?php echo($follows["first_name"] . " " . $follower["last_name"])?></p>
            <?php
            }
            ?>

    </body>
</html>