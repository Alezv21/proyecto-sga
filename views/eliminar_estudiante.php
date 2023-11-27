<?php

    $id_estudiante= $_GET['id_estudiante'];
    $conexion=mysqli_connect("localhost","root","","sdat");
    $consulta= mysqli_query($conexion,"DELETE FROM estudiante WHERE id_estudiante= '$id_estudiante'");

    header('Location: estudiante.php');
