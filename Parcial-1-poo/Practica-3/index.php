<?php
/**
 *
 *  Practica 3: Sistema de usuarios con validaciones y excepciones en PHP
 *  Practica de POO en PHP
 *  Bruno Alexis Cedano Vidal
 *
*/

    //Incluir todas las clases
    require_once 'clases/Usuario.php';
    require_once 'clases/Admin.php';
    require_once 'clases/Alumno.php';


    
    //Titulo de la practica
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Practica 3: Sistema con validaciones y excepciones</title>
    </head>
    <body>";

    echo "<h1>Practica 3: Sistema de usuarios con validaciones y excepciones</h1>";



    //1.- Prueba con usuarios validos
    echo "<h2>1.- Creacion de usuarios validos (try/catch exitoso):</h2>";

    try {
        //Crear un admin valido
        $admin = new Admin("Dr. Jose Aguilar", "jose.aguilar@uas.edu.mx");
        echo " Admin creado exitosamente: " . $admin->mostrarInformacion() . "<br>";

        //Crear un alumno valido
        $alumno = new Alumno("Maria Gonzalez","maria.gonzalez@gmail.com", "A123456");
        echo " Alumno creado exitosamente: " . $alumno->mostrarInformacion() . "<br>";

        //Demostrar metodos especificos
        echo " " . $admin->gestionarSistema() . "<br>";
        echo " " . $alumno->inscribirMateria() . "<br>";

    } catch (Exception $e) {
        echo " Error inesperado: " . $e->getMessage() . "<br>";
    }

    //2.- Prueba con correo invalido
    echo "<h2>2.- Prueba con correo invalido (formato incorrecto):</h2>";

    try {
        echo " Intentando crear usuario con correo 'correo-invalido'...<br>";
        $usuarioInvalido = new Usuario("Prueba error", "correo-invalido");
        echo "Esto no deberia mostrarse<br>";
    } catch (Exception $e) {
        echo " Excepcion capturada: " . $e->getMessage() . "<br>";
    }

    //3.- Prueba con dominio no permitido
    echo "<h2>3. Prueba con dominio no permitido:</h2>";

    try {
        echo " Intentando crear usuario con correo 'usuario@dominio-no-permitido.xyz'...<br>";
        $usuarioDominioInvalido = new Usuario("Prueba dominio", "usuario@dominio-no-permitido.xyz");
        echo "Esto no deberia mostrarse<br>";
    } catch (Exception $e) {
        echo " Excepcion capturada: " . $e->getMessage() . "<br>";
    }

    //4.- Prueba con matricula invalida
    echo "<h2>4.- Prueba con matricula invalida:</h2>";

    try {
        echo " Intentando crear alumno con matricula '12345' (formato incorrecto)...<br>";
        $alumnoInvalido = new Alumno("Pedro Lopez","pedro@gmail.com", "12345");
        echo "Esto no deberia mostrarse<br>";
    } catch (Exception $e) {
        echo " Excepcion capturada: " . $e->getMessage() . "<br>";
    }

    $casosPrueba = [
        ["Juan Perez", "juan@gmail.com", null , "Usuario normal"],
        ["Ana Lopez", "ana@hotmail.com", null , "Usuario normal"],
        ["Carlos Ruiz", "carlos@yahoo.com", null , "Usuario Normal"],
        ["Admin Sistema", "admin@uas.edu.mx", null , "Administrador"],
        ["Estudiante1", "estudiante1@gmail.com", "B789012" , "Alumno valido"],
        ["Estudiante2", "estudiante2@gmail.com", "C123" , "Alumno con matricula invalida"],
        ["Test Error", "test@dominio.xyz", null , "Dominio no permitido"],
    ];

    echo "<h2>5.- Prueba con diferentes casos:</h2>";

    foreach ($casosPrueba as $caso) {
        try {
            if ($caso[2] !== null) {
                //Es un alumno
                $objeto = new Alumno($caso[0], $caso[1], $caso[2]);
                echo " {$caso[3]}: " . $objeto->mostrarInformacion() . "<br>";
            } else {
                //Es usuario o admin
                if (strpos($caso[0], "Admin") !== false) {
                    $objeto = new Admin($caso[0], $caso[1]);
                    echo " {$caso[3]}: " . $objeto->mostrarInformacion() . "<br>";
                } else {
                    $objeto = new Usuario($caso[0], $caso[1]);
                    echo " {$caso[3]}: " . $objeto->mostrarInformacion() . "<br>";
                }
            }
        } catch (Exception $e) {
            echo " {$caso[3]}: " . $e->getMessage() ."<br>";
        }
    }

?>