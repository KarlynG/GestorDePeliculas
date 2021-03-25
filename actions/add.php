<?php
    include '../helpers/utilities.php';
    include 'sessionVar.php';

    if(isset($_POST["TituloName"]) && isset($_POST["DescripcionName"]) && isset($_POST["GeneroId"])){

        $movies = ["name" => $_POST["TituloName"],"description"=>$_POST["DescripcionName"],"generoId"=>$_POST["GeneroId"], "disponibleStatus"=>"on"];
        Add($movies);

        header("Location: ../index.php");
    }

?>