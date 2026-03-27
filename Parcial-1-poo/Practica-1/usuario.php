<?php
/**
 *
 *  Practica 1: Creacion de clases y encapsulamiento en PHP
 *  Practica de POO en PHP
 *  Bruno Alexis Cedano Vidal
 *
*/

    class Usuario {

        private $nombre;
        private $correo;



        //Control de la clase
        public function __construct($nombre, $correo) {
            $this-> nombre = $nombre;
            $this-> correo = $correo;
        }

        //Getter para obtener el nombre
        public function getNombre() {
            return $this->nombre;
        }

        //Getter para obetener el correo
        public function getCorreo() {
            return $this->correo;
        }

        //Setter para modificar nombre
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        //Setter para modificar correo
        public function setCorreo($correo) {
            if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $this->correo = $correo;
            } else {
                echo "Error: El formato del correo no es valido.<br>";
            }
        }

        //Mostrar informacion para mostrar toda la informacion del usuario
        public function mostrarInformacion() {
            return "Usuario: {$this->nombre} - Correo: {$this->correo}";
        }

    }

?>