<?php
    $id_estudiante = $_GET['id_estudiante'];
    $conexion = mysqli_connect("localhost", "root", "", "sdat");

    $consultaEliminarRegistro = mysqli_query($conexion, "DELETE FROM registro_estudiante_curso WHERE id_estudiante = '$id_estudiante'");

    if ($consultaEliminarRegistro) {
        $consultaEliminarEstudiante = mysqli_query($conexion, "DELETE FROM estudiante WHERE id_estudiante = '$id_estudiante'");
        
        if ($consultaEliminarEstudiante) {
            header('Location: estudiante.php');
        } else {
            echo "Error al eliminar el estudiante.";
        }
    } else {
        echo "Error al eliminar el registro del estudiante en la tabla de cursos.";
    }
?>