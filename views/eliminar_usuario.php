<?php

    $id= $_GET['id'];
    $conexion=mysqli_connect("localhost","root","","sdat");
    $consulta= mysqli_query($conexion,"DELETE FROM usuarios WHERE id= '$id'");

    header('Location: usuarios.php');
