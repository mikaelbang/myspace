<?php

class Wallcontroller{

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