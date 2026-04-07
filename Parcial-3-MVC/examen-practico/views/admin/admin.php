<?php
/**
 * 
 *  Bruno Alexis Cedano Vidal
 * 
 */

    require_once("../admin/template/header.php");

?>

  <div class="mx-auto p-5">
    <div class="card text-center">
      <div class="card-header">
        Menu
      </div>
      <div class="card-body">
        <h5 class="card-title"></h5>
          <div class="row mb-3">
            <div class="col">
              <div class="card text-center">
              <div class="card-header">
                Crear torneo
              </div>
              <div class="card-body">
                <a href="frmTorneos.php" class="btn btn-primary">
                  <img src="../img/torneo-admin.png" alt="Crear un torneo." width="170" height="170">
                </a>
              </div>
              </div>
            </div>
            <div class="col">
              <div class="card text-center">
              <div class="card-header">
                Lista de torneos
              </div>
              <div class="card-body">
                <a href="readAllTorneos.php" class="btn btn-primary">
                  <img src="../img/lista-torneos-admin.png" alt="Listar torneo." width="170" height="170">
                </a>
              </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="card text-center">
              <div class="card-header">
                Estadisticas
              </div>
              <div class="card-body">
                Proximamente
              </div>
              </div>
            </div>
            <div class="col">
              <div class="card text-center">
                <div class="card-header">
                  Anuncios
                </div>
                <div class="card-body">
                  Proximamente
                </div>
              </div>
            </div>
          </div>

        </div>
      <div class="card-footer text-body-secondary">
        Configuracion de torneos. Web App Basket-Ball
      </div>
    </div>
  </div>

<?php

  require_once("../admin/template/footer.php")

?>