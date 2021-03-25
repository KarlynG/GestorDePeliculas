<?php

    session_start();

    $GLOBALS["sessionName"] = "movie";

    function Add($item){
        $movies = GetList();

        if(count($movies) == 0){
            $item["id"] = 1;

        }else{

            $lastElement = getLastElement($movies);

            $item["id"] = $lastElement["id"] + 1;
        }   

        array_push($movies, $item);

        $_SESSION[$GLOBALS["sessionName"]] = $movies;

    }

    function Edit($item){      

        $movies = GetList();
        $movieId = GetById($item["id"]);

        if($movieId != null && count($movieId) > 0 ){
      
            $index = getIndexElement($movies,"id",$item["id"]);
            $movies[$index] = $item;

            $_SESSION[$GLOBALS["sessionName"]] = $movies;    

        }           
    }

    function GetList(){
        $listaPeliculas = $_SESSION[$GLOBALS["sessionName"]];

        if(!empty($listaPeliculas)){
            if(isset($_GET['filtroId'])){
                $listaPeliculas = searchProperty($listaPeliculas, 'generoId', $_GET['filtroId']);
            }
        }
        else{
            $listaPeliculas = [];
        }

        return $listaPeliculas;
    }
    
    function GetById($id){

        $movies = GetList();

        $movie = searchProperty($movies,"id",$id);     
        
        return $movie[0];
    }

?>