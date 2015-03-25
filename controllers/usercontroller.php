<?php

class Usercontroller{

    public function showAction(){

        $db = new PDO("mysql:host=localhost;dbname=myspace", "root", "root");

        $profileStm = $db->prepare('SELECT * FROM users WHERE user_id = :user_id');
        $profileStm->bindParam(":user_id", $_SESSION["user"]->user_id, PDO::PARAM_INT);
        $profileStm->execute();
        $user = $profileStm->fetchObject();

        require_once "/views/profile.php";
    }

    public function otherAction(){

        $db = new PDO("mysql:host=localhost;dbname=myspace", "root", "root");
        //Riktiga bindParam parametern
        //$_POST["user_id"]
        $userId = 2;
        $OtherProfileStm = $db->prepare('SELECT * FROM users WHERE user_id = :user_id');
        $OtherProfileStm->bindParam(":user_id", $userId, PDO::PARAM_INT);
        $OtherProfileStm->execute();
        $user = $OtherProfileStm->fetchObject();
        require_once "/views/other_user.php";
    }

    public function followersAction(){

        $db = new PDO("mysql:host=localhost;dbname=myspace", "root", "root");

        //$_SESSION['user']->user_id
        $userId = 3;
        $followersStm = $db->prepare('SELECT * FROM `followers` AS F JOIN users AS U ON (U.user_id = F.follower) WHERE F.followee = :currentUser');
        $followersStm->bindParam(":currentUser", $userId, PDO::PARAM_STR);
        $followersStm->execute();

        $followers = $followersStm->fetchAll();

        $followsStm = $db->prepare('SELECT * FROM `followers` AS F JOIN users AS U ON (U.user_id = F.followee) WHERE F.follower = :currentUser');
        $followsStm->bindParam(":currentUser", $userId, PDO::PARAM_STR);
        $followsStm->execute();

        $Ifollow = $followsStm->fetchAll();

        require_once "/views/followers.php";
    }
}