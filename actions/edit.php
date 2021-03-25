<?php

    include 'sessionVar.php';
    include '../helpers/utilities.php';
    include '../layout/main.php';

    $movie = null;

    $movie = GetById($_GET["id"]);

    if(isset($_POST["TituloName"]) && isset($_POST["DescripcionName"]) && isset($_POST["GeneroId"]) ){

        $movie = ["id"=> $_GET["id"], "name" => $_POST["TituloName"],"description"=>$_POST["DescripcionName"],"generoId"=>$_POST["GeneroId"],"disponibleStatus"=>$_POST["Disponible"]];
        
        Edit($movie);

        header("Location: ../index.php");

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>

    <?php echo printHeader() ?>

    <div class="card" style=" max-width: 35rem; margin: auto; padding: 0px; top: 30px; left: 0px;">
        <form action="edit.php?id=<?= $movie["id"]?>" method="POST">
            <div class="form-floating mb-3">
                <input type="text" name="TituloName" value="<?= $movie["name"]?>" class="form-control" id="pelicula" placeholder="Pelicula">
                <label for="nombre">Título</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" name="DescripcionName" placeholder="Leave a description here" id="description" style="height: 100px"><?= $movie["description"]?></textarea>
                <label for="description">Descripción</label>
            </div> 

            <div class="col-sm-8 mb-4">

                <label class="visually-hidden" for="Genero">Elegir Genero</label>
                <select name="GeneroId" class="form-select" id="genero">
                    <option value="0">Seleccione Genero</option>
                    <?php foreach($genres as $value => $genre):?>
                        
                        <option value="<?= $value ?>"><?= $genre ?></option>

                    <?php endforeach;?>

                </select>

            </div>

            <div class="form-check form-switch">
                <input class="form-check-input" name="Disponible" type="checkbox" id="SwitchChecked" checked>
                <label class="form-check-label" for="SwitchChecked">Disponibilidad</label>
            </div>
            
    <div class="modal-footer">
        <a href="../index.php" class="btn btn-secondary">Close</a>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>

    </form>
        

    </div>

    <?php echo printFooter() ?>

</body>

</html>