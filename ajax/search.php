<?php

    $db = new PDO("mysql:host=localhost;dbname=myspace", "root", "root");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


    $search = $_POST['search'] . "%";
    $searchStm = $db->prepare('SELECT first_name, last_name, profile_img FROM users WHERE first_name LIKE :partialName');
    $searchStm->bindParam(':partialName', $search, PDO::PARAM_STR);
    $searchStm->execute();

    $result = $searchStm->fetchAll();

    echo(json_encode($result));
