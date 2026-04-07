<?php
/**
 * 
 *  Bruno Alexis Cedano Vidal
 * 
 */

    require_once("../admin/template/header.php");
    require_once("../../controllers/torneosController.php");
    
    //Instanciamos controlador para ejecutar la consulta
    $objController = new torneosController();
    //Capturamos los registros de la tabla en "filas".
    $rows = $objController->readTorneos();

?>
    <div class="mx-auto p-5"></div>
        <div class="card text-center">
            <div class="card-header">
                Listado de torneos
            </div>
            <div class="card-body">

                <table class="table table-hover table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">TORNEO</th>
                            <th scope="col">ORGANIZADOR</th>
                            <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($rows && count($rows) > 0): ?>
                            <?php foreach($rows as $row): ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['nombreTorneo'] ?></td>
                                    <td><?= $row['organizador'] ?></td>
                                    <td>
                                        <a href="readOneTorneo.php?id=<?= $row['id'] ?>" class="btn btn-primary">Ver</a>
                                        <a href="updateTorneo.php?id=<?= $row['id'] ?>" class="btn btn-success">Editar</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#idModal<?= $row['id'] ?>">
                                            Eliminar
                                        </button>

                                        <div class="modal fade" id="idModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="Modal<?= $row['id'] ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="Modal<?= $row['id'] ?>">Deseas eliminar el torneo?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                La accion no se puede deshacer...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <a href="deleteTorneo.php?id=<?= $row['id'] ?>" class="btn btn-danger">Eliminar</a>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">
                                    No hay torneos aun.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mx-auto p-2">
            <a href="admin.php" class="btn btn-primary">REGRESAR</a>
        </div>
    </div>
<?php

    require_once("../admin/template/footer.php")

?>