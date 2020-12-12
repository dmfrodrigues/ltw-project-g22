<?php

    require_once('../../server/server.php');
    require_once('../../server/connection.php');
    require_once('../../server/User.php');   

    try {
        $pet = Pet::fromDatabase(intval($_POST['petId']));
        $user = User::fromDatabase($_POST['username']);
        $pet->removeFromFavorites($user);

        $data = array('successful' => true);
        echo json_encode($data);
    }
    catch(Exception $e) {
        $data = array('successful' => false);
        echo json_encode($data);
    }

