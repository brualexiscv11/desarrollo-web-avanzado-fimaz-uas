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
    
    //Verificar que el ID existe
    if(!isset($_GET['id']) || empty($_GET['id'])) {
        header("Location: readAllTorneos.php");
        exit;
    }
    
    //Capturar el id y a su vez sacar la informacion del torneo.
    $lstTorneo = $objController->readOneTorneo($_GET['id']);
    
    //Verificar que se obtuvo el torneo
    if(!$lstTorneo || !is_array($lstTorneo)) {
        echo "<div class='alert alert-danger'>Error: No se encontro el torneo solicitado.</div>";
        echo '<a href="readAllTorneos.php" class="btn btn-primary">Regresar</a>';
        require_once("../admin/template/footer.php");
        exit;
    }

?>
    <div class="mx-auto p-5">
        <div class="card">
            <div class="card-header">
                Editar informacion del torneo.
            </div>
            <div class="card-body">
                <form action="torneoUpdate.php" method="post">
                    <div class="mb-3">
                        <label for="id" class="form-label">Id del torneo</label>
                        <input type="text" class="form-control" name="txtId" id="id" value="<?= $lstTorneo['id'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nombreTorneo" class="form-label">Nombre del torneo</label>
                        <input type="text" class="form-control" name="txtNombreTorneo" id="nombreTorneo" value="<?= htmlspecialchars($lstTorneo['nombreTorneo']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="organizador" class="form-label">Organizador (nombre completo)</label>
                        <input type="text" name="txtOrganizador" id="organizador" class="form-control" value="<?= htmlspecialchars($lstTorneo['organizador']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="patrocinador" class="form-label">Patrocinador(ES)</label>
                        <textarea name="txtPatrocinador" id="patrocinador" cols="30" rows="2"
                        class="form-control"><?= htmlspecialchars($lstTorneo['patrocinadores']) ?></textarea>
                        <span id="patrocinador" class="form-text">
                            Atencion: Se puede separar con "," si hay mas de un patrocinador.
                        </span>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="sede" class="form-label">Sede (cancha)</label>
                            <input type="text" name="txtSede" id="sede" class="form-control" value="<?= htmlspecialchars($lstTorneo['sede']) ?>">
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="categoria" class="form-label">Categoria</label>
                        <input list="lstCategorias" name="txtCategoria" id="categoria" 
                        class="form-control" value="<?= htmlspecialchars($lstTorneo['categoria']) ?>">
                        <datalist id="lstCategorias">
                            <option value="1ra. fuerza">
                            <option value="2da. fuerza">
                            <option value="Veteranos">
                            <option value="Libre">
                            <option value="Juvenil">
                            <option value="Femenil">
                            <option value="Empresarial">
                            <option value="Infantil">
                            <option value="Minibasket">
                        </datalist>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="Premio1" class="form-label">Premio 1er. Lugar</label>
                            <input type="text" name="txtPremio1" id="premio1" class="form-control" value="<?= htmlspecialchars($lstTorneo['premio1']) ?>">
                        </div>
                        <div class="col mb-3">
                            <label for="Premio2" class="form-label">Premio 2do. Lugar</label>
                            <input type="text" name="txtPremio2" id="premio2" class="form-control" value="<?= htmlspecialchars($lstTorneo['premio2']) ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="Premio3" class="form-label">Premio 3er. Lugar</label>
                            <input type="text" name="txtPremio3" id="premio3" class="form-control" value="<?= htmlspecialchars($lstTorneo['premio3']) ?>">
                        </div>
                        <div class="col mb-3">
                            <label for="otroPremio" class="form-label">Otro premio (Campeon canastero)</label>
                            <input type="text" name="txtOtroPremio" id="OtroPremio" 
                            class="form-control" value="<?= htmlspecialchars($lstTorneo['otroPremio']) ?>">
                        </div>
                    </div>
                    <div class="col mb-3">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        <a href="readAllTorneos.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
            <div class="card-footer text-body-secondary">
                Editar torneo
            </div>
        </div>
    </div>

<?php
    require_once("../admin/template/footer.php")
?>