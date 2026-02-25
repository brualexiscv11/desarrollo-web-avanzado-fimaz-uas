<?php
/**
 *
 *  Practica 3: Sistema de usuarios con validaciones y excepciones en PHP
 *  Practica de POO en PHP
 *  Bruno Alexis Cedano Vidal
 *
*/

    class Usuario {
        private $nombre;
        private $correo;



        //Constructor con validaciones
        public function __construct($nombre, $correo) {
            $this->nombre = $nombre;
            $this->validarCorreo($correo);
            $this->correo = $correo;
        }

        //Valida el formato del correo electronico
        private function validarCorreo($correo) {
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Error: El correo '$correo' no tiene un formato valido.");
            }
            
            //Validacion adicional - Dominio permitido
            $dominiosPermitidos = ['gmail.com', 'hotmail.com', 'yahoo.com', 'uas.edu.mx'];
            $dominio = substr(strrchr($correo, "@"), 1);

            if (!in_array($dominio, $dominiosPermitidos)) {
                throw new Exception("Error: El dominio '$dominio' no esta permitido. Dominios permitidos: " . implode(', ', $dominiosPermitidos));
            }
        }



        //Getter para nombre
        public function getNombre() {
            return $this->nombre;
        }

        //Getter para correo
        public function getCorreo() {
            return $this->correo;
        }

        //Setter para nombre
        public function setNombre($nombre) {
            if (empty(trim($nombre))) {
                throw new Exception("Error: El nombre no puede estar vacio.");
            }
            $this->nombre = $nombre;
        }

        //Setter para correo
        public function setCorreo($correo) {
            $this->validarCorreo($correo);
            $this->correo = $correo;
        }


        
        //Metodo para obtener el rol
        public function getRol() {
            return "Usuario";
        }

        //Muestra informacion completa del usuario
        public function mostrarInformacion() {
            return "{$this->getRol()}: {$this->nombre} - Correo: {$this->correo}";
        }
    }

?>