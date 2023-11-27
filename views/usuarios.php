<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

  header("Location: ../includes/login.php");
  die();

}


?>
<!DOCTYPE html>
<html lang="en">

<body>


  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../DataTables/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="../css/es.css">


    <script src="../js/jquery.min.js"></script>

    <script src="../js/resp/bootstrap.min.js"></script>


    <title>SGA</title>
  </head>
  <br>
  <div class="container is-fluid">


    <div class="col-xs-12">
      <h1 style="color:#FF0000">SISTEMA DE GESTION DE ALERTAS TEMPRANAS USUARIO: 
        <?php echo $_SESSION['nombre']; ?>
      </h1>

      <h1>Lista de usuarios</h1>
      <br>

      <div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
          <span class="glyphicon glyphicon-plus"></span> Nuevo registro <i class="fa fa-plus"></i> </a></button>

        <a class="btn btn-warning" href="../includes/_sesion/cerrarSesion.php">Cerrar sesion
          <i class="fa fa-power-off" aria-hidden="true"></i>
        </a>

        <a href="../includes/reporte.php" class="btn btn-primary"><b>PDF</b> </a>
      </div>

      <?php
      $conexion = mysqli_connect("localhost", "root", "", "sdat");
      $where = "";

      if (isset($_GET['enviar'])) {
        $busqueda = $_GET['busqueda'];


        if (isset($_GET['busqueda'])) {
          $where = "WHERE usuarios.id LIKE'%" . $busqueda . "%' OR usuarios.nombre  LIKE'%" . $busqueda . "%'";
        }

      }


      ?>



      </form>

      <br>


      <table class="table table-striped table-dark table_id " id="table_id">


        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>user</th>
            <th>pass</th>
            <th>rol</th>
            <th>Acciones</th>

          </tr>
        </thead>
        <tbody>

          <?php

          $conexion = mysqli_connect("localhost", "root", "", "sdat");
          $SQL = mysqli_query($conexion, "SELECT usuarios.id, usuarios.nombre, usuarios.user, usuarios.pass, 
usuarios.rol FROM usuarios");

          while ($fila = mysqli_fetch_assoc($SQL)):

            ?>
            <tr>
              <td>
                <?php echo $fila['id']; ?>
              </td>
              <td>
                <?php echo $fila['nombre']; ?>
              </td>
              <td>
                <?php echo $fila['user']; ?>
              </td>
              <td>
                <?php echo $fila['pass']; ?>
              </td>
              <td>
                <?php echo $fila['rol']; ?>
              </td>


              <td>


                <a class="btn btn-warning" href="editar_usuario.php?id=<?php echo $fila['id'] ?> ">
                  <i class="fa fa-edit"></i> </a>


                <a class="btn btn-danger btn-del" href="eliminar_usuario.php?id=<?php echo $fila['id'] ?> ">
                  <i class="fa fa-trash"></i></a>
              </td>
            </tr>


          <?php endwhile; ?>

</body>
</table>

<script>
  $('.btn-del').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href')

    Swal.fire({
      title: 'Estas seguro de eliminar este usuario?',
      text: "¡No podrás revertir esto!!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar!',
      cancelButtonText: 'Cancelar!',
    }).then((result) => {
      if (result.value) {
        if (result.isConfirmed) {
          Swal.fire(
            'Eliminado!',
            'El usuario fue eliminado.',
            'success'
          )
        }

        document.location.href = href;
      }

    })
  })

</script>
<script src="../package/dist/sweetalert2.all.js"></script>
<script src="../package/dist/sweetalert2.all.min.js"></script>
<script src="../package/jquery-3.6.0.min.js"></script>

<script type="text/javascript" src="../DataTables/js/datatables.min.js"></script>
<script type="text/javascript" src="../DataTables/js/jquery.dataTables.min.js"></script>
<script src="../DataTables/js/dataTables.bootstrap4.min.js"></script>

<script src="../js/page.js"></script>
<script src="../js/buscador.js"></script>
<script src="../js/user.js"></script>




<?php include('../nuevo_usuario.php'); ?>

</html>