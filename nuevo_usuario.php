<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

  header("Location: ./includes/login.php");
  die();
  
}


?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

	<link rel="stylesheet" href="./css/es.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./package/dist/sweetalert2.css">
</head>

<body id="page-top">

<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Registro de Usuarios</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                 <form  action="../includes/insertar_usuario.php" method="POST" >

                            <div class="form-group">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="fecha_nacimiento">User:</label><br>
                                <input type="text" name="user" id="user" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label><br>
                                <input type="password" name="pass" id="pass" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                  <label for="rol" class="form-label">Rol de usuario *</label>
                                <input type="number"  id="rol" name="rol" class="form-control" placeholder="Escribe el rol, 1 doctor, 2 paciente..">
                             
                            </div>
                      <br>

                                <div class="mb-3">
                                    
                               <input type="submit" value="Guardar" id="register" class="btn btn-success" 
                               name="registrar">
                               <a href="usuarios.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                       
</body>
</html>

