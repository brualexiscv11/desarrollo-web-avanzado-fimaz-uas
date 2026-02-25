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
    <hrml lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Practica 3: Sistema con validaciones y excepciones</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
            h1 { color: #333; border-bottom: 2px solid #333; padding-bottom: 10px; }
            h2 { color: #666; margin-top: 30px }
            .success { background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin: 10px 0; }
            .error { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin: 10px 0; }
            .info { background-color: #d1ecf1; color: #0c5460; padding: 10px; border-radius: 5px; margin: 10px 0; }
            pre { background-color: #f4f4f4; padding: 10px; border-radius: 5px; }
        </style>
    </head>
    <body>";

    echo "<h1> Practica 3: Sistema de usuarios con validaciones y excepciones</h1>";



    //1.- Prueba con usuarios validos
    echo "<h2>1.- Creacion de usuarios validos (try/catch exitoso):</h2>";

    try {
        //Crear un admin valido
        $admin = new Admin("Dr. Jose Aguilar", "jose.aguilar@uas.edu.mx");
        echo "<div class='success'> Admin creado exitosamente: " . $admin->mostrarInformacion() . "</div>";

        //Crear un alumno valido
        $alumno = new Alumno("Maria Gonzalez","maria.gonzalez@gmail.com", "A123456");
        echo "<div class='success'> Alumno creado exitosamente: " . $alumno->mostrarInformacion() . "</div>";

        //Demostrar metodos especificos
        echo "<div class='info'>" . $admin->gestionarSistema() . "</div>";
        echo "<div class='info'>" . $alumno->inscribirMateria() . "</div>";

    } catch (Exception $e) {
        echo "<div class='error'> Error inesperado: " . $e->getMessage() . "</div";
    }

    //2.- Prueba con correo invalido
    echo "<h2>2.- Prueba con correo invalido (formato incorrecto):</h2>";

    try {
        echo "<div class='info'>Intentando crear usuario con correo 'correo-invalido'...</div>";
        $usuarioInvalido = new Usuario("Prueba error", "Correo invalido");
        echo "div class='success'>Esto no deberia mostrarse</div>";
    } catch (Exception $e) {
        echo "<div class='error'> Excepcion capturada: " . $e->getMessage() . "</div>";
    }

    //3.- Prueba con dominio no permitido
    echo "<h2>3. Prueba con dominio no permitido:</h2>";

    try {
        echo "div class='info'>Intentando crear usuarios con correo 'usuario@dominio-no-permitido.xyz'...</div>";
        $usuarioDominioInvalido = new Usuario("Prueba dominio", "usuario@dominio-permitido.xyz");
        echo "<div class='successs'>Esto no deberia mostrarse</div>";
    } catch (Exception $e) {
        echo "<div class='error'> Excepcion capturada: " . $e->getMessage() . "</div>";
    }

    //4.- Prueba con matricula invalida
    echo "<h2>4.- Prueba con matricula invalida:</h2>";

    try {
        echo "div class='info'>Intentando crear alumno con matricula '12345' (formato incorrecto)...</div>";
        $alumnoInvalido = new Alumno("Pedro Lopez","pedro@gmail.com", "12345");
        echo "<div class='success'>Esto no deberia mostrarse</div>";
    } catch (Exception $e) {
        echo "<div class='error'> Excepcion capturada: " . $e->getMessage() . "</div>";
    }

    $casosPrueba = [
        ["Juan Perez", "juan@gmail.com", null , "Usuario normal"],
        ["Ana Lopez", "ana@hotmail.com", null , "Usuario normal"],
        ["Carlos Ruiz", "carlos@yahoo.com", null , "Usuario Normal"],
        ["Admin Sistema", "admin@uas.edu.mx", null , "Administrador"],
        ["Estudiante1", "estudiante1@gmail.com", "B789012" , "Alumno valido"],
        ["Estudiante2", "estudiante2@gmail.com", "C123" , "Alumno con matricula invalida"],
        ["Text Error", "test@dominio.xyz", null , "Dominio no permitido"],
    ];

    foreach ($casosPrueba as $caso) {
        try {
            if ($caso[2] !== null) {
                //Es un alumno
                $objeto = new Alumno($caso[0], $caso[1], $caso[2]);
                echo "<div class='success'> {$caso[3]}: " . $objeto->mostrarInformacion() . "</div>";
            } else {
                //Es usuario o admin
                if (strpos($caso[0], "Admin") !== false) {
                    $objeto = new Admin($caso[0], $caso[1]);
                    echo "<div class='success'> {$caso[3]}: " . $objeto->mostrarInformacion() . "</div>";
                } else {
                    $objeto = new Usuario($caso[0], $caso[1]);
                    echo "<div class='success'> {$caso[3]}: " . $objeto->mostrarInformacion() . "</div>";
                }
            }
        } catch (Exception $e) {
            echo "<div class='error'> {$caso[3]}: " . $e->getMessage() ."</div>";
        }
    }



    //Resumen de conceptos
    echo "<h2>Conceptos demostrados:</h2>";
    echo "<div class='info'>";
    echo "<strong>- Herencia:</strong> Admin y Alumno extienden de Usuario<br>";
    echo "<strong>- Encapsulamiento:</strong> Todos los atributos son privados<br>";
    echo "<strong>- Validaciones:</strong> Formato de correo, dominios permitidos, formato de matricula<br>";
    echo "<strong>- Excepciones:</strong> try/catch para manejo controlado de errores<br>";
    echo "<strong>- Polimorfismo:</strong> Metodo getRol() sobrescrito en cada clase<br>";
    echo "</div>";

    echo "</body></html>";

?>