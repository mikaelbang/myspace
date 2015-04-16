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

        $resultPost = $postStm->fetchAll();
        $resultComments = $commentStm->fetchAll();

        $posts = $this->sortPosts($resultPost);
        $comments = $this->sortComments($resultComments);

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

    private function sortPosts($resultPost){

        $posts = array();

        for($i = 0; $i < count($resultPost); $i++){
            $currentPostId = $resultPost[$i]["post_id"];
            if($i == 0){
                array_push($posts, $resultPost[$i]);
            }
            elseif($resultPost[$i-1]["post_id"] != $currentPostId){
                array_push($posts, $resultPost[$i]);
            }
        }

        return $posts;
    }

    private function sortComments($resultComments){

        $comments = array();
        for($j = 0; $j < count($resultComments); $j++){
            if($resultComments[$j]['comment_id'] != null){
                array_push($comments, $resultComments[$j]);
            }
        }

        return $comments;
    }
}