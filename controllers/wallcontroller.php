<?php

class Wallcontroller{

    public function showAction(){

        $db = new PDO("mysql:host=localhost;dbname=myspace", "root", "root");

        $postStm = $db->prepare('SELECT * FROM posts AS P JOIN users AS U ON (P.user_id = U.user_id) LEFT JOIN comments AS CO ON (CO.post_id = P.post_id) JOIN followers AS F ON (F.followee = U.user_id) WHERE F.follower = :currentUser');

        $postStm->bindParam(":currentUser", $_SESSION['user']->user_id, PDO::PARAM_STR);
        $postStm->execute();

        $commentStm = $db->prepare('SELECT * FROM posts AS P JOIN users AS U ON (P.user_id = U.user_id) LEFT JOIN comments AS CO ON (CO.post_id = P.post_id) JOIN followers AS F ON (F.followee = U.user_id) WHERE F.follower = :currUser');
        $commentStm->bindParam(":currUser", $_SESSION['user']->user_id, PDO::PARAM_STR);
        $commentStm->execute();

        //get all posts
        //TODO: Sort the posts using ORDER BY DESC or ASC
        $posts = $postStm->fetchAll();

        //loop through the posts
        //make a sql statement to get the comments for that post ONLY!

        $comments = $commentStm->fetchAll();

        // if $comments["post_id"] == $posts['post_id'] then print comment.

        require_once "views/wall.php";
    }

    public function getCommentsAction(){

            $db = new PDO("mysql:host=localhost;dbname=myspace", "root", "root");

        if(isset($_POST["post_id"])){
            $commentStm = $db->prepare('SELECT * FROM comments AS CO JOIN users AS U ON (U.user_id = CO.user_id) WHERE post_id = :post_id ORDER BY CO.comment_id DESC');
            $commentStm->bindParam(':post_id', $_POST["post_id"], PDO::PARAM_INT);
            $commentStm->execute();
            $comments = $commentStm->fetchAll();
            $return = json_encode($comments);
            echo($return);
        }
    }

    public function commentAction(){
        $db = new PDO("mysql:host=localhost;dbname=myspace", "root", "root");


        $insertCommentStm = $db->prepare('INSERT INTO comments (content, post_id, user_id) VALUES (:content, :post_id, :user_id)');
        $insertCommentStm->bindParam(':content', $_POST['content'], PDO::PARAM_STR);
        $insertCommentStm->bindParam(':post_id', $_POST['hidden_post_id'], PDO::PARAM_INT);
        $insertCommentStm->bindParam(':user_id', $_SESSION['user']->user_id, PDO::PARAM_INT);
        $insertCommentStm->execute();

        echo($_POST['content'] ." " . $_POST['hidden_post_id'] ." ". $_SESSION['user']->user_id);
    }
}