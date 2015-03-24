<html>
    <head>
        <title>wall</title>
    </head>
    <body>
        <h1>Wall</h1>
        <?php
        foreach($posts as $post){
            ?>
        <p><?php echo($post["text"])?></p>
        <?php
        }
        ?>
    </body>
</html>