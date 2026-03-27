<?php
/**
 *
 *  Practica 2: Herencia y reutilizacion de codigo en PHP
 *  Practica de POO en PHP
 *  Bruno Alexis Cedano Vidal
 *
*/



    //Incluir las clases necesarias
    require_once 'Usuario.php';
    require_once 'Admin.php';



    //Titulo de la practica
    echo "<h1>Practica 2: Herencia y reutilizacion de codigo en PHP</h1>";
    echo "<hr>";

    //1.- Demostracion de la clase base Usuario
    echo "<h2>1.- Creando un usuario normal (clase base):</h2>";
    $usuario = new Usuario("Carlos Lopez", "carlos.lopez@gmail.com");
    echo $usuario->mostrarInformacion() . "<br>";
    echo "<br>";



    //2.- Demostracion de la clase Admin (heredada de usuario)
    echo "<h2>2.- Creando un administrador (herencia):</h2>";
    $admin = new Admin("Ana Martinez", "ana.martinez@admin.com");

    //Mostrar informacion del admin usando metodos heredados y propios
    echo "Nombre (heredado): " . $admin->getNombre() ."<br>";
    echo "Correo (heredado): " . $admin->getCorreo() ."<br>";
    echo "Rol (propio): " . $admin->getRol() ."<br>";
    echo "<br>";



    //3.- Demonstracion de metodo sobrescrito
    echo "<h2>3.- Metodo sobrescrito mostrarInformacion():</h2>";
    echo "Usuario normal: " . $usuario->mostrarInformacion() ."<br>";
    echo "Administracion: " . $admin->mostrarInformacion() ."<br>";
    echo "<br>";



    //4.- Demostracion de metodo exclusivo de Admin
    echo "<h2>4.- Metodo exclusivo de la clase admin:</h2>";
    echo $admin->gestionarUsuarios() ."<br>";
    echo "<br>";



    //5.- Demostracion de reutilizacion de setters
    echo "<h2>5.- Reutilizacion de setters de la clase base:</h2>";
    echo "Antes - Admin: " . $admin->mostrarInformacion() ."<br>";
    $admin->setNombre("Ana Patricia Martinez");
    $admin->setCorreo("ana.patricia@admin.com");
    echo "Despues - Admin: " . $admin->mostrarInformacion() ."<br>";
    echo "<br>";



    //6.- Verificacion de tipos (instannceof)
    echo "<h2>6.- Verificacion de tipos con instanceof:</h2>";
    echo "¿El objeto \$admin es instancia de Usuario? " .
        (($admin instanceof Usuario) ? "SI " : "No ") . "<br>";
    echo "¿El objeto \$admin es instancia de Admin? " .
        (($admin instanceof Admin) ? "Si " : "No ") . "<br>";
    echo "¿El objeto \$usuario es instancia de Admin?" .
        (($usuario instanceof Admin) ? "Si " : "No ") . "<br>";
    echo "<br>";



    //Resumen
    echo "<hr>";
    echo "<h3>Resumen de la demonstracion de herencia:</h3>";
    echo "* <strong>Usuario</strong> (clase base): " . $usuario->mostrarInformacion() ."<br>";
    echo "* <strong>Admin</strong> (clase derivada): " . $admin->mostrarInformacion() ."<br>";
    echo "<br>";
    echo "<p><strong>Conclusion:</strong> La clase Admin hereda todos los metodos y atributos ";
    echo "de Usuario, añade su propio metodo getRol(), y puede sobreescribir metodos existentes.</p>";

?>