<?php

include '../helpers/utilities.php';
include 'sessionVar.php';

session_start();
    
    $movies = $_SESSION[$GLOBALS["sessionName"]];

    if(isset($_GET['id'])){
        $movieId = $_GET['id'];

        $elementIndex = getIndexElement($movies, 'id', $movieId);

        unset($movies[$elementIndex]);

        $_SESSION[$GLOBALS["sessionName"]] = $movies;
    }

        

    header("Location: ../index.php");

?>