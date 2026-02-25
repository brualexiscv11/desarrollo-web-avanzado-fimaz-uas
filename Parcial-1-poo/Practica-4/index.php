<!--    Practica 4: Integracion POO + Herencia + Validaciones + Excepciones
        Practica de POO en PHP
        Bruno Alexis Cedano Vidal -->

<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Practica 4 - POO con Herencia y Excepciones</title>



        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
                background-color: #f5f5f5;
            }
            .container {
                max-width: 1000px;
                margin: 0 auto;
                background-color: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }
            h1 {
                color: #333;
                border-bottom: 2px solid #4CAF50;
                padding-bottom: 10px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            th {
                background-color: #4CAF50;
                color: white;
                padding: 12px;
                text-align: left;
            }
            td {
                padding: 10px;
                border-bottom: 1px solid #ddd;
            }
            tr:hover {
                background-color: #f5f5f5;
            }
            .error {
                background-color: #ffebee;
                color: #c62828;
                padding: 15px;
                border-radius: 5px;
                margin: 20px 0;
                border-left: 5px solid #c62828;
            }
            .success {
                background-color: #e8f5e8;
                color: #2e7d32;
                padding: 15px;
                border-radius: 5px;
                margin: 20px 0;
                border-left: 5px solid #2e7d32;
            }
        </style>
    </head>



    <body>
        <div class="container">
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
                
                echo '<div class="success">Todos los objetos se crearon correctamente (esto no deberia aparecer si hay excepcion)</div>';
                
            } catch (Exception $e) {
                $errorMensaje = $e->getMessage();
            }
            
            ?>
            


            <!-- Mostrar mensaje de error si existe -->
            <?php if (!empty($errorMensaje)): ?>
                <div class="error">
                    <strong>Error controlado:</strong> <?php echo $errorMensaje; ?>
                </div>
            <?php endif; ?>
            


            <!-- Tabla de usuarios -->
            <h2>Usuarios registrados correctamente</h2>
            <table>
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
        </div>
    </body>
</html>