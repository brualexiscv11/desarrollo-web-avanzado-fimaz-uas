<?php
/**
 *
 *  Practica 3: Sistema de usuarios con validaciones y excepciones en PHP
 *  Practica de POO en PHP
 *  Bruno Alexis Cedano Vidal
 *
*/

    require_once 'Usuario.php';



    //Clase alumno que hereda de usuario
    class Alumno extends Usuario {

        //Atributo adicional privado
        private $matricula;



        //Constructor de alumno
        public function __construct($nombre, $correo, $matricula) {
            parent::__construct($nombre, $correo);
            $this->validarMatricula($matricula);
            $this->matricula = $matricula;
        }

        //Validar formato de matricula
        private function validarMatricula($matricula) {
            //formato esperado: A123456 (letra seguida de 6 digitos)
            if (!preg_match('/^[A-Z]\d{6}$/', $matricula)) {
                throw new Exception("Error: La matricula '$matricula' no tiene formato valido. Debe ser una letra mayuscula seguida de 6 digitos (ejemplo: A123456).");
            }
        }

        //Getter para matricula
        public function getMatricula() {
            return $this->matricula;
        }

        //Setter para matricula con validacion
        public function setMatricula($matricula) {
            $this->validarMatricula($matricula);
            $this->matricula = $matricula;
        }

        //Sobreescribe el metodo getRol
        public function getRol() {
            return "Alumno";
        }

        //Sobreescribe mostrarInformacion paara incluir matricula
        public function mostrarInformacion() {
            return parent::mostrarInformacion() . " - Matricula: {$this->matricula}";
        }

        //Metodo especifico de alumno
        public function inscribirMateria() {
            return "El alumno {$this->getNombre()} puede inscribirse a materias.";
        }

    }

?>