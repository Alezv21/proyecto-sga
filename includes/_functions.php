<?php

require_once("_db.php");

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        //casos de registros
        case 'editar_usuario':
            editar_usuario();
            break;    
        
        case 'editar_docente':
            editar_docente();
            break;            

        case 'acceso_user';
            acceso_user();
            break;

        case 'agregar_docente';
        agregar_docente();
            break;

        case 'agregar_estudiante';
        agregar_estudiante();
            break;

        case 'editar_estudiante';
        editar_estudiante();
            break;
    }
}

function editar_usuario()
{
    $conexion = mysqli_connect("localhost", "root", "", "sdat");
    extract($_POST);

    $consulta_pass_actual = "SELECT pass FROM usuarios WHERE id = '$id'";
    $resultado_pass_actual = mysqli_query($conexion, $consulta_pass_actual);
    $fila_pass_actual = mysqli_fetch_assoc($resultado_pass_actual);
    $pass_actual = $fila_pass_actual['pass'];

    if ($pass != $pass_actual) {
        $pass_hash = password_hash($pass, PASSWORD_BCRYPT);
    } else {
        $pass_hash = $pass_actual;
    }

    $consulta = "UPDATE usuarios SET nombre = '$nombre', user = '$user', pass ='$pass_hash', rol = '$rol' WHERE id = '$id' ";
    mysqli_query($conexion, $consulta);

    header('Location: ../views/usuarios.php');
}

function editar_docente()
{
    $conexion = mysqli_connect("localhost", "root", "", "sdat");
    extract($_POST);
    $consulta = "UPDATE docente SET nombres = '$nombres', apellidos = '$apellidos',
		documento ='$documento' WHERE id_docente = '$id_docente' ";

    mysqli_query($conexion, $consulta);

    header('Location: ../views/docentes.php');
}

function agregar_docente()
{
    $conexion = mysqli_connect("localhost", "root", "", "sdat");
    extract($_POST);
    $consulta = "INSERT INTO docente (nombres, apellidos, documento) VALUES ('$nombres', '$apellidos', '$documento')";
    mysqli_query($conexion, $consulta);
    header('Location: ../views/docentes.php');
}


function editar_estudiante()
{
    $conexion = mysqli_connect("localhost", "root", "", "sdat");
    extract($_POST);
    $consulta = "UPDATE estudiante SET nombres = '$nombres', apellidos = '$apellidos',
		edad ='$edad', sexo ='$sexo'  WHERE id_estudiante = '$id_estudiante' ";

    mysqli_query($conexion, $consulta);

    header('Location: ../views/estudiante.php');
}

function agregar_estudiante()
{
    $conexion = mysqli_connect("localhost", "root", "", "sdat");
    extract($_POST);
    $consulta = "INSERT INTO estudiante (nombres, apellidos, edad, sexo) VALUES ('$nombres', '$apellidos', '$edad', '$sexo')";
    mysqli_query($conexion, $consulta);
    header('Location: ../views/estudiante.php');
}



function acceso_user()
{
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    session_start();
    $_SESSION['nombre'] = $nombre;

    $conexion = mysqli_connect("localhost", "root", "", "sdat");

    $consulta = "SELECT * FROM usuarios WHERE user='$nombre'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_array($resultado);

    if ($filas) {
        $hashed_password = $filas['pass'];
        if (password_verify($password, $hashed_password)) {
            if ($filas['rol'] == 1) { // admin
                header('Location: ../views/usuarios.php');
            } else if ($filas['rol'] == 2) { // director
                header('Location: ../views/docentes.php');
            } else if ($filas['rol'] == 3) { // profesor
                header('Location: ../views/estudiante.php');
            } else {
                header('Location: login.php');
                session_destroy();
            }
        } else {
            header('Location: login.php');
            session_destroy();
        }
    } else {
        header('Location: login.php');
        session_destroy();
    }

    mysqli_close($conexion);
}
?>






