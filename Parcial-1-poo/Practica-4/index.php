<!--    Practica 4: Integracion POO + Herencia + Validaciones + Excepciones
        Practica de POO en PHP
        Bruno Alexis Cedano Vidal -->

<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Practica 4 - POO con Herencia y Excepciones</title>
    </head>



    <body>
        <h1>Practica 4: Integracion POO + Herencia + Validaciones + Excepciones</h1>
        
        <?php
        //Importar las clases necesarias
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
        
        ?>
        


        <!-- Mostrar mensaje de error si existe -->
        <?php if (!empty($errorMensaje)): ?>
            <strong>Error controlado:</strong> <?php echo $errorMensaje; ?><br>
        <?php endif; ?>
        


        <!-- Tabla de usuarios -->
        <h2>Usuarios registrados correctamente</h2>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Matricula</th>
                    <th>Empresa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($usuario->getNombre()); ?></td>
                        <td><?php echo htmlspecialchars($usuario->getCorreo()); ?></td>
                        <td><?php echo htmlspecialchars($usuario->getRol()); ?></td>
                        
                        <!-- Mostrar matricula si es Alumno -->
                        <?php if ($usuario instanceof Alumno): ?>
                            <td><?php echo htmlspecialchars($usuario->getMatricula()); ?></td>
                        <?php else: ?>
                            <td>—</td>
                        <?php endif; ?>
                        
                        <!-- Mostrar empresa si es Invitado -->
                        <?php if ($usuario instanceof Invitado): ?>
                            <td><?php echo htmlspecialchars($usuario->getEmpresa()); ?></td>
                        <?php else: ?>
                            <td>—</td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>