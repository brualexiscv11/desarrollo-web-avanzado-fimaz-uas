<?php
/**
 * 
 *  Bruno Alexis Cedano Vidal
 * 
 */

    require_once("../admin/template/header.php");

?>

    <div class="mx-auto p-5"></div>
        <div class="card">
            <div class="card-header">
                Captura la informacion del torneo.
            </div>
            <div class="card-body">
                <form action="torneosInsert.php" method="post">
                    <div class="mb-3">
                        <label for="nombreTorneo" class="form-label">Nombre del torneo</label>
                        <input type="text" class="form-control" name="txtNombreTorneo" id="nombreTorneo" required>
                    </div>
                    <div class="mb-3">
                        <label for="organizador" class="form-label">Organizador (nombre completo)</label>
                        <input type="text" name="txtOrganizador" id="organizador" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="patrocinador" class="form-label">Patrocinador(ES)</label>
                        <textarea name="txtPatrocinador" id="patrocinador" cols="30" rows="2"
                        class="form-control"></textarea>
                        <span id="patrocinador" class="form-text">
                            Atencion: Se puede separar con "," si hay mas de un patrocinador.
                        </span>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="sede" class="form-label">Sede (cancha)</label>
                            <input type="text" name="txtSede" id="sede" class="form-control">
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="categoria" class="form-label">Categoria</label>
                        <input list="lstCategorias" name="txtCategoria" id="categoria" 
                        class="form-control">
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
                            <input type="text" name="txtPremio1" id="premio1" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="Premio2" class="form-label">Premio 2do. Lugar</label>
                            <input type="text" name="txtPremio2" id="premio2" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="Premio3" class="form-label">Premio 3er. Lugar</label>
                            <input type="text" name="txtPremio3" id="premio3" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="otroPremio" class="form-label">Otro premio (Campeon canastero)</label>
                            <input type="text" name="txtOtroPremio" id="OtroPremio" 
                            class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" name="txtUsuario" id="usuario" class="form-control" required>
                        </div>
                        <div class="col mb-3">
                            <label for="contraseña" class="form-label">Contraseña</label>
                            <input type="password" name="txtContraseña" id="contraseña" class="form-control" required>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="admin.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
            <div class="card-footer text-body-secondary">
                Formulario para registrar torneos.
            </div>
        </div>
    </div>

<?php

    require_once("../admin/template/footer.php")

?>