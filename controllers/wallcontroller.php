<?php

class Wallcontroller{

    public function showAction(){

        $db = new PDO("mysql:host=localhost;dbname=myspace", "root", "root");

        //$_SESSION['user']->user_id
        $userId = 3;
        $postStm = $db->prepare('SELECT * FROM posts AS P JOIN users AS U ON (P.user_id = U.user_id) JOIN followers AS F ON (F.followee = U.user_id) WHERE F.follower = :currentUser');
        $postStm->bindParam(":currentUser", $userId, PDO::PARAM_STR);
        $postStm->execute();

        $posts = $postStm->fetchAll();
        require_once "views/wall.php";
    }
}