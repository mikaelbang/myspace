<?php

class Usercontroller{

    public function showAction(){

        //die(var_dump('test'));

        $db = new PDO("mysql:host=localhost;dbname=myspace", "root", "root");

        $profileStm = $db->prepare('SELECT * FROM users WHERE user_id = :user_id');
        $profileStm->bindParam(":user_id", $_SESSION["user"]->user_id, PDO::PARAM_INT);
        $profileStm->execute();
        $user = $profileStm->fetchObject();

        $followStm = $db->prepare('SELECT * FROM followers AS F JOIN users AS U ON (U.user_id = F.follower OR U.user_id = F.followee) WHERE U.user_id = :currentUser');
        $followStm->bindParam(':currentUser', $_SESSION["user"]->user_id);
        $followStm->execute();
        $allFollow = $followStm->fetchAll();

        $follow = 0;
        $followers = 0;

        foreach($allFollow as $i){
            if($i["followee"] == $_SESSION["user"]->user_id){
                $followers += 1;
            }
            if($i["follower"] == $_SESSION["user"]->user_id){
                $follow += 1;
            }
        }

        require_once "views/profile.php";
    }

    public function otherAction(){

        $db = new PDO("mysql:host=localhost;dbname=myspace", "root", "root");
        //Riktiga bindParam parametern
        //$_POST["user_id"]
        $OtherProfileStm = $db->prepare('SELECT * FROM users WHERE user_id = :user_id');
        $OtherProfileStm->bindParam(":user_id", $_POST["hidden_user_id"], PDO::PARAM_INT);
        $OtherProfileStm->execute();
        $user = $OtherProfileStm->fetchObject();
        require_once "views/other_user.php";
    }

    public function addStatusAction(){

        $db = new PDO("mysql:host=localhost;dbname=myspace", "root", "root");

        if(isset($_POST["post_text_button"]) && !empty($_POST["text"])){
            $addTextStm = $db->prepare("INSERT INTO posts(text, user_id) VALUES (:text, :user_id)");
            $addTextStm->bindParam(":text", $_POST["text"]);
            $addTextStm->bindParam(":user_id", $_SESSION["user"]->user_id);
            $addTextStm->execute();

        }

        header("location:../../myspace/user/show");
    }

    public function followersAction(){

        $db = new PDO("mysql:host=localhost;dbname=myspace", "root", "root");

        $followersStm = $db->prepare('SELECT * FROM `followers` AS F JOIN users AS U ON (U.user_id = F.follower) WHERE F.followee = :currentUser AND F.status = 1');
        $followersStm->bindParam(":currentUser", $_SESSION['user']->user_id);
        $followersStm->execute();

        $followers = $followersStm->fetchAll();

        $followsStm = $db->prepare('SELECT * FROM `followers` AS F JOIN users AS U ON (U.user_id = F.followee) WHERE F.follower = :currentUser AND F.status = 1');
        $followsStm->bindParam(":currentUser", $_SESSION['user']->user_id);
        $followsStm->execute();

        $iFollow = $followsStm->fetchAll();

        $showFollowRequestStm = $db->prepare("SELECT * FROM users JOIN followers ON (followers.follower = users.user_id) WHERE followers.followee = :currentUser AND followers.status = 0");
        $showFollowRequestStm->bindParam(":currentUser", $_SESSION["user"]->user_id);
        $showFollowRequestStm->execute();
        $requests = $showFollowRequestStm->fetchAll();

        require_once "views/followers.php";
    }

    public function followAction(){



        $db = new PDO("mysql:host=localhost;dbname=myspace", "root", "root");


        $initial_status = 0;


        if(isset($_POST["other_user_button"])){
            $this->otherAction();
        }
        if(isset($_POST["follow_button"])){
            $checkFollowerStm = $db->prepare("SELECT * FROM followers WHERE (follower = :currentUser AND followee = :user_id)");
            $checkFollowerStm->bindParam(":currentUser", $_SESSION["user"]->user_id);
            $checkFollowerStm->bindParam(":user_id", $_POST["hidden_user_id"]);
            $checkFollowerStm->execute();

            if($checkFollowerStm->rowCount() == 0){
                if($_POST["hidden_user_id"] != $_SESSION["user"]->user_id){
                    $addFriendStm = $db->prepare("INSERT INTO followers(follower, followee, status) VALUES (:follower, :followee, :status)");
                    $addFriendStm->bindParam(":follower", $_SESSION["user"]->user_id);
                    $addFriendStm->bindParam(":followee", $_POST["hidden_user_id"]);
                    $addFriendStm->bindParam(":status", $initial_status);
                    $addFriendStm->execute();
                }
                else{
                    echo("You can't follow yourself");
                }
            }
            else {
                echo("Already following");
            }
        }
        header("location:../user/followers");
    }

    public function unFollowAction(){

        $db = new PDO("mysql:host=localhost;dbname=myspace;charset=utf8", "root", "root");

        if(isset($_POST["unFollow_button"])){
            $unFollowStm = $db->prepare("DELETE FROM followers WHERE followers.follower = :currentUser AND followers.followee = :user_id");
            $unFollowStm->bindParam("currentUser", $_SESSION["user"]->user_id);
            $unFollowStm->bindParam("user_id", $_POST["hidden_user_id"]);
            $unFollowStm->execute();
        }
        header("location:../user/followers");
    }

    public function acceptAction(){

        $db = new PDO("mysql:host=localhost;dbname=myspace;charset=utf8", "root", "root");
        $accepted = 1;

        if(isset($_POST["accept_button"])){
            $acceptStm = $db->prepare("UPDATE followers SET status = :accepted WHERE follower = :user_id AND followee = :currentUser");
            $acceptStm->bindParam(":accepted", $accepted);
            $acceptStm->bindParam(":user_id", $_POST["hid_user_id"]);
            $acceptStm->bindParam(":currentUser", $_SESSION["user"]->user_id);
            $acceptStm->execute();
        }
        header("location:../user/followers");

    }

    public function declineAction(){

        $db = new PDO("mysql:host=localhost;dbname=myspace;charset=utf8", "root", "root");
        $declined = 2;

        $declinedStm = $db->prepare("UPDATE followers SET status = :declined");
        $declinedStm->bindParam(":declined", $declined);
        $declinedStm->execute();
    }


    private function requests(){

        $db = new PDO("mysql:host=localhost;dbname=myspace", "root", "root");

        $showFollowRequestStm = $db->prepare("SELECT * FROM users JOIN followers ON (followers.follower = users.user_id) WHERE followers.followee = :currentUser AND followers.status = 0");
        $showFollowRequestStm->bindParam(":currentUser", $_SESSION["user"]->user_id);
        $showFollowRequestStm->execute();
        $requests = $showFollowRequestStm->fetchAll();
        return $requests;
    }

    public function updateAction(){

        $db = new PDO("mysql:host=localhost;dbname=myspace", "root", "root");

        if(isset($_POST["save_button"])){
            $updateProfileStm = $db->prepare('UPDATE users SET first_name = :firstname, last_name = :lastname, profile_img = :p_img, about = :about WHERE user_id = :user_id');
            $updateProfileStm->bindParam(":user_id", $_SESSION["user"]->user_id, PDO::PARAM_INT);
            $updateProfileStm->bindParam(":firstname", $_POST["first_name"]);
            $updateProfileStm->bindParam(":lastname", $_POST["last_name"]);
            $updateProfileStm->bindParam(":p_img", $_POST["profile_img"]);
            $updateProfileStm->bindParam(":about", $_POST["about"]);

            if($updateProfileStm->execute()){
            header("location:../../myspace/user/show");


            }
        }
    }
}