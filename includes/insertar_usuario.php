<?php

$conexion=mysqli_connect("localhost","root","","sdat"); 

if (
    isset($_POST["nombre"]) && !empty($_POST["nombre"]) &&
    isset($_POST["user"]) && !empty($_POST["user"]) &&
    isset($_POST["pass"]) && !empty($_POST["pass"])&& 
    isset($_POST["rol"]) && !empty($_POST["rol"]) 
) {
    $nombre = $_POST["nombre"];
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $rol = $_POST["rol"];

    $sql = "INSERT INTO usuarios (nombre, user, pass, rol)
    VALUES (?, ?, ?, ?)";

    if ($statement = mysqli_prepare($conexion, $sql)) {

        mysqli_stmt_bind_param($statement, "ssss", $nombre, $user, $pass,  $rol);

        if (mysqli_stmt_execute($statement)) {
      header('Location: ../views/usuarios.php');

        } else {
            echo "No se pudo realizar la accion";
        }
        mysqli_stmt_close($statement);
    }

    mysqli_close($conexion);
} else {
?>
<?php  } ?>
