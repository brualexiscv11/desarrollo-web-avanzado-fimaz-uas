<?php


    require_once("../../models/torneosModel.php");

    class torneosController{

        private $model;

        public function __construct()
        {
            $this->model = new torneosModel();
        }

        //Creamos metodo controlador que mandara llamar la funcion insert del modelo.
        //Tambien mandara los parametros necesarios para guardar en la tabla "torneos".
        //Si los datos se guardan redireccionara al usuario a la pantalla de inicio de los
        //contrario se mantendra en la pantalla del formulario de captura de datos del torneo.
        public function saveTorneo($nombreTorneo, $organizador, $patrocinadores, $sede,
        $categoria, $premio1, $premio2, $premio3, $otroPremio, $usuario, $contraseña){
            //Recordemos que la funcion insert del modelo, regresa el ultimo id generado.
            $id= $this->model->insert($nombreTorneo, $organizador, $patrocinadores, $sede,
            $categoria, $premio1, $premio2, $premio3, $otroPremio, $usuario, $contraseña);
            return ($id!=false) ? header("Location: readAllTorneos.php") : header("Location: frmTorneos.php");
        
        }

        //Metodo que manda ejecutar la funcion read del modelo del torneo.
        public function readTorneos(){
            return ($this->model->read()) ? $this->model->read() : false;
        }

        //Metodo para ejecutar la funcion readOne del modelo torneo.
        public function readOneTorneo($id){
            return ($this->model->readOne($id) != false) ? $this->model->readOne($id) : header
            ("Location: admin.php");
        }

        //Metodo que manda llamar la funcion update del modelo
        public function updateTorneo($id, $nombreTorneo, $organizador, $patrocinadores, $sede, $categoria,
        $premio1, $premio2, $premio3, $otroPremio){
            $resultado = $this->model->update($id, $nombreTorneo, $organizador, $patrocinadores, $sede, $categoria,
        $premio1, $premio2, $premio3, $otroPremio);
            return ($resultado != false) ? header("Location: readOneTorneo.php?id=".$id) : header("Location: readAllTorneos.php");
        }

        //Metodo que manda llamar a la funcion delete del modelo.
        public function delete($id) {
            return ($this->model->delete($id)) ? header("Location: readAllTorneos.php"): header("Location: readOneTorneo.php?id=".$id);
        }

    }

?>