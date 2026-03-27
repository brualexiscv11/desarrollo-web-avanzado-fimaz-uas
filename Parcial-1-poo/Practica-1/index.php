<?php
/**
 *
 *  Practica 1: Creacion de clases y encapsulamiento en PHP
 *  Practica de POO en PHP
 *  Bruno Alexis Cedano Vidal
 *
*/

    require_once 'usuario.php';

    echo "<h1>Practica 1: Creacion de clases y encapsulamiento en PHP</h1>";
    echo "<hr>";



    //1.- Crear una instancia de usuario
    echo "<h2>1.- Creando un usuario con el constructor:</h2>";
    $usuario1 = new Usuario("Juan Perez", "juan.perez@gmail.com");

    //Mostrar valores usando los getters
    echo "Nombre: " . $usuario1->getNombre() . "<br>";
    echo "Correo: " . $usuario1->getCorreo() . "<br>";
    echo "<br>";



    //2.- Modificar valores usando los setters
    echo "<h2>2.- Modificando datos con los setters</h2>";
    $usuario1->setNombre("Juan Carlos Perez");
    $usuario1->setCorreo("juancarlos.perez@gmail.com");

    //Mostrar los nuevos valores
    echo "Nombre actualizado: " . $usuario1->getNombre() . "<br>";
    echo "Correo actualizado: " . $usuario1->getCorreo() . "<br>";
    echo "<br>";



    //3.- Demostracion de validacion en el setter de correo
    echo "<h2>3.- Probando validacion de correo:</h2>";
    $usuario1->setCorreo("correo-invalido"); //Esto indicara error
    echo "correo despues de intento invalido: " . $usuario1->getCorreo() . "<br>";
    echo "<br>";



    //4.- Crear otro usuario para demostrar multiples instancias
    echo "<h2>4.- Creando un segundo usuario:</h2>";
    $usuario2 = new Usuario("Maria Garcia", "maria-garcia@gmail.com");
    echo $usuario2->mostrarInformacion() ."<br>";
    echo "<br>";



    //5.- Demostracion de encapsulamiento
    echo "<h2>5.- Demostracion de encapsulamiento:</h2>";
    echo "Los atributos nombre y correo son privados, ";
    echo "Solo se accede a traves de getters y setters.<br>";
    echo "// Esto daria error: echo \$usuario1->nombre;<br>";
    echo "<br>";



    //Resumen
    echo "<hr>";
    echo "<h3>Resumen de usuarios creados:</h3>";
    echo "Usuario 1: " . $usuario1->mostrarInformacion() ."<br>";
    echo "Usuario 2: " . $usuario2->mostrarInformacion() ."<br>";

?>