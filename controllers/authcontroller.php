<?php

class Authcontroller{

    public function registerAction(){

        $db = new PDO("mysql:host=localhost;dbname=myspace", "root", "root");
        $registerStm = $db->prepare('INSERT INTO users (first_name, last_name, email, password, gender) VALUES (:first_name, :last_name, :email, :password, :gender)');
        $registerStm->bindParam(":first_name", $_POST["first_name"], PDO::PARAM_STR);
        $registerStm->bindParam(":last_name", $_POST["last_name"], PDO::PARAM_STR);
        $registerStm->bindParam(":email", $_POST["email"], PDO::PARAM_STR);
        $registerStm->bindParam(":password", $_POST["password"], PDO::PARAM_STR);
        $registerStm->bindParam(":gender", $_POST["gender"], PDO::PARAM_STR);

        if($registerStm->execute()){
            $this->loginAction();
        }


    }

    public function loginAction(){

        $db = new PDO("mysql:host=localhost;dbname=myspace", "root", "root");

        $loginStm = $db->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
        $loginStm->bindParam(":email", $_POST["email"], PDO::PARAM_STR);
        $loginStm->bindParam(":password", $_POST["password"], PDO::PARAM_STR);
        $loginStm->execute();

        if($loginStm->rowCount() == 1){
            session_start();
            $_SESSION["auth"] = 'loggedin';
            $_SESSION["user"] = $loginStm->fetchObject();

            header("location:../wall/show");
        }
        else{
            header("location:/myspace");
        }
    }

    public function logoutAction(){
        session_unset();
        session_destroy();
        header("location:../");
    }
}
