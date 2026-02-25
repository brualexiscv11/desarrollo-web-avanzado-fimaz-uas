<?php
/**
 *
 *  Practica 4: Integracion POO + Herencia + Validaciones + Excepciones
 *  Practica de POO en PHP
 *  Bruno Alexis Cedano Vidal
 *
*/

    require_once 'Usuario.php';



    //Clase alumno que ereda de usuario
    class Alumno extends Usuario {
        private $matricula;
        
        //Constructor de funcion matricula
        public function __construct($nombre, $correo, $matricula) {
            parent::__construct($nombre, $correo);
            $this->matricula = $matricula;
        }
        


        //Get matricula
        public function getMatricula() {
            return $this->matricula;
        }
        
        //Get Rol
        public function getRol() {
            return "Alumno";
        }

    }

?>