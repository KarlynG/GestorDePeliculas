<?php

    function PrintHeader($isRoot = false){
        $directory = ($isRoot) ? "" : "../";

        $header = <<<EOF

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{$directory}assets/css/style.css">
    <video autoplay muted loop id="videoBack">
      <source src="{$directory}src/background.mp4" type="video/mp4">
    </video>
    

    <title>Gestor De Peliculas</title>
</head>
<body>

<div class="content"></div>

    <!-- Navbar -->
    <nav class="navbar bg-dark">
      <span class="navbar-text nav_title">
        <a href="{$directory}index.php" class="hyper_text">
        <img src="{$directory}resource/senko_ico.png" alt="" width="50" height="48" class="d-inline-block align-top">
            Gestor de peliculas
        </a>
      </span>
    </nav> 

    

EOF;

        echo $header;
    }

    function PrintFooter($isRoot = false){
        $footer = <<<EOF
        
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>

EOF;

        echo $footer;
    }

?>