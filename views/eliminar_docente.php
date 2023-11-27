<?php

    $id_docente= $_GET['id_docente'];
    $conexion=mysqli_connect("localhost","root","","sdat");
    $consulta= mysqli_query($conexion,"DELETE FROM docente WHERE id_docente= '$id_docente'");

    header('Location: docentes.php');
