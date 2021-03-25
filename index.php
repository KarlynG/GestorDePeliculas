<?php 

include 'helpers/utilities.php';
include 'actions/sessionVar.php';
include 'layout/main.php';

$movies = GetList();


//$movies = GetList();


?>

<?php echo PrintHeader(true);?>

    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">

            <button type="button" class="btn btn-success button-fix" data-bs-toggle="modal" data-bs-target="#nueva-movie">
                Nueva película
            </button>

        </div>
    </div>

    <div class="row">
        
        <div class="col-md-3 button-group-fix">
            <div class="btn-group">
                <a href="index.php" class="btn btn-dark text-light">Todos</a>
                <a href="index.php?filtroId=1" class="btn btn-dark text-light">Accion</a>
                <a href="index.php?filtroId=2" class="btn btn-dark text-light">Terror</a>
                <a href="index.php?filtroId=3" class="btn btn-dark text-light">Comedia</a>
                <a href="index.php?filtroId=4" class="btn btn-dark text-light">Suspenso</a>
                <a href="index.php?filtroId=5" class="btn btn-dark text-light">Documentales</a>

            </div>
        </div>
    </div>

    <!-- Card -->
    <div class="col-sm-12">
        <div class="card card_fix2">
            <div class="row">

                <?php if(count($movies) == 0): ?>
                    <div class="card-boy">
                        <h2 class="card-text">No se encontraron peliculas</h2>
                    </div>

                <?php else: ?>

                    <?php foreach($movies as $movie) : ?>

                        <div class="col-md-3 mb-3">

                            
                                <?php if($movie['disponibleStatus'] != "on") :?>
                                        <div class="card card-fix border-danger">
                                <?php else: ?>
                                    <div class="card card-fix border-success">
                                <?php endif; ?>

                                <div class="card-body">
                                    <h5 class="card-title"><?= $movie["name"]?></h5>
                                    <p class="card-text"><?= $movie["description"]?></p>
                                    <p class="card-text"><b>Genero</b>: <?= $genres[$movie["generoId"]]?></p>
                                </div>

                                <div class="card-body">
                                    <a href="actions/edit.php?id=<?= $movie['id']?>" class="btn btn-primary">Editar</a>
                                    <a href="actions/delete.php?id=<?= $movie['id']?>" class="btn btn-danger">Eliminar</a>
                                </div>

                                
                                    <?php if($movie['disponibleStatus'] != "on") :?>
                                        <div class="card-footer text-danger">
                                        Estado: No Disponible
                                    <?php else: ?>
                                        <div class="card-footer text-success">
                                        Estado: Disponible
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>

                        
                    
                    <?php endforeach; ?>

                <?php endif; ?>

            </div>
        </div>
    </div>

    

    

    <!-- Modal -->
    <div class="modal fade" id="nueva-movie" tabindex="-1" aria-labelledby="firstModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="firstModal">Agregar pelicula</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="actions/add.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" name="TituloName" class="form-control" id="pelicula" placeholder="Pelicula">
                            <label for="nombre">Título</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="DescripcionName" placeholder="Leave a description here" id="description" style="height: 100px"></textarea>
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
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

                </form>
            </div>
        </div>
    </div>

<?php echo PrintFooter(true);?>