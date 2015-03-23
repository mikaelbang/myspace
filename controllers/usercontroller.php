<?php

class Usercontroller{

    public function showAction(){
        require_once "/views/profile.php";
    }

    public function showuserAction(){
        require_once "/views/other_user.php";
    }

    public function followersAction(){
        require_once "/views/followers.php";
    }
}