<?php
/**
 *
 *  Practica 2: Herencia y reutilizacion de codigo en PHP
 *  Practica de POO en PHP
 *  Bruno Alexis Cedano Vidal
 *
*/



    class Usuario {
        private $nombre;
        private $correo;

        

        //Constructor de la clase
        public function __construct($nombre, $correo) {
            $this->nombre = $nombre;
            $this->correo = $correo;
        }

        //Getter para obtener el nombre
        public function getNombre() {
            return $this->nombre;
        }

        //Getter para obtener el correo
        public function getCorreo() {
            return $this->correo;
        }

        //Setter para modificar el nombre
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        //Setter para modificar el correo
        public function setCorreo($correo) {
            //Validacion basica de correo electronico
            if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $this->correo = $correo;
            } else {
            echo "Error: El formato del correo no es valido.<br>";
            }

        }

        public function mostrarInformacion() {
            return "Usuario: {$this->nombre} - Correo: {$this->correo}";
        }

    }

?>