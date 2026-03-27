<?php
/**
 *
 *  Practica 4: Integracion POO + Herencia + Validaciones + Excepciones
 *  Practica de POO en PHP
 *  Bruno Alexis Cedano Vidal
 *
*/

    //Clase base Usuario
    class Usuario {
        protected $nombre;
        protected $correo;
        
        //Construcion de correo electronico
        public function __construct($nombre, $correo) {
            //Validacion de correo electronico
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Correo invalido: " . $correo . " - El formato no es correcto");
            }
            
            $this->nombre = $nombre;
            $this->correo = $correo;
        }
        
        //get nombre
        public function getNombre() {
            return $this->nombre;
        }
        
        //get correo
        public function getCorreo() {
            return $this->correo;
        }

    }
    
?>