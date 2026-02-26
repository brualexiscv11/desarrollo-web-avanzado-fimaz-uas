<?php
/**
 * 
 *  Practica 4: Integracion POO + Herencia + Validaciones + Excepciones
 *  Practica de POO en PHP
 *  Bruno Alexis Cedano Vidal
 *
*/

    //Incluir las clases
    require_once 'clases/Admin.php';
    require_once 'clases/Alumno.php';
    require_once 'clases/Invitado.php';

    $usuarios = [];
    $errorMensaje = "";



    //Intentar crear los objetos
    try {
        //Crear objetos validos
        $usuarios[] = new Admin("Carlos Rodriguez", "carlos.rodriguez@fimaz.edu.mx");
        $usuarios[] = new Alumno("Maria Garcia", "maria.garcia@estudiante.edu.mx", "A2023001");
        $usuarios[] = new Invitado("Juan Perez", "juan.perez@empresa.com", "Tecnologia SA");
        
        //Crear un objeto con correo invalido para generar excepcion
        $usuarios[] = new Alumno("Pedro Martinez", "correo-invalido", "A2023002");
        
        echo 'Todos los objetos se crearon correctamente (esto no deberia aparecer si hay excepcion)<br>';
        
    } catch (Exception $e) {
        $errorMensaje = $e->getMessage();
    }

    //Mostrar mensaje de error si existe
    if (!empty($errorMensaje)) {
        echo "<strong>Error controlado:</strong> " . $errorMensaje . "<br>";
    }



    //Mostrar tabla de usuarios
    echo "<h2>Usuarios registrados correctamente</h2>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>Correo</th>";
    echo "<th>Rol</th>";
    echo "<th>Matricula</th>";
    echo "<th>Empresa</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";



    foreach ($usuarios as $usuario) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($usuario->getNombre()) . "</td>";
        echo "<td>" . htmlspecialchars($usuario->getCorreo()) . "</td>";
        echo "<td>" . htmlspecialchars($usuario->getRol()) . "</td>";
        
        //Mostrar matricula si es Alumno
        if ($usuario instanceof Alumno) {
            echo "<td>" . htmlspecialchars($usuario->getMatricula()) . "</td>";
        } else {
            echo "<td>—</td>";
        }
        
        //Mostrar empresa si es Invitado
        if ($usuario instanceof Invitado) {
            echo "<td>" . htmlspecialchars($usuario->getEmpresa()) . "</td>";
        } else {
            echo "<td>—</td>";
        }
        
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    
?>
