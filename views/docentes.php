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

      <h1>Lista de docentes</h1>
      <br>

      <div>

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
          $where = "WHERE docente.id_docente LIKE'%" . $busqueda . "%' OR docente.nombres  LIKE'%" . $busqueda . "%'";
        }

      }


      ?>

<div class="col-xs-12">

    <form action="../includes/_functions.php" method="POST">
      <div id="login">
        <div class="container">
          <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
              <div id="login-box" class="col-md-12">

                <br>
                <br>
                <h3 class="text-center">Agregar Nuevo Docente</h3>


                <div class="form-group">
                  <label for="rol" class="form-label">nombres *</label>
                  <input type="text" id="nombres" name="nombres" class="form-control"
                    value="<?php echo $usuario['nombres']; ?>" required>
                  <input type="hidden" name="accion" value="agregar_docente">
                </div>

                <div class="form-group">
                  <label for="rol" class="form-label">apellidos *</label>
                  <input type="text" id="apellidos" name="apellidos" class="form-control"
                    value="<?php echo $usuario['apellidos']; ?>" required>
                  <input type="hidden" name="accion" value="agregar_docente">
                </div>

                <div class="form-group">
                  <label for="rol" class="form-label">documento *</label>
                  <input type="text" id="documento" name="documento" class="form-control"
                    value="<?php echo $usuario['documento']; ?>" required>
                  <input type="hidden" name="accion" value="agregar_docente">
                </div>

                <br>

                <div class="mb-3">

                  <button type="submit" class="btn btn-success">Agregar</button>

                </div>
              </div>
            </div>

    </form>
  </div>
  </div>
  </div>
  </div>
  </div>
  </form>




  <div class="container is-fluid">
    <table class="table table-striped table-dark table_id " id="table_id">


    <thead>
          <tr>
            <th>ID_docente</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Documento</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

        <?php

$conexion = mysqli_connect("localhost", "root", "", "sdat");
$SQL = mysqli_query($conexion, "SELECT docente.id_docente, docente.nombres, docente.apellidos, docente.documento 
FROM docente");


while ($fila = mysqli_fetch_assoc($SQL)):

  ?>
  <tr>
    <td>
      <?php echo $fila['id_docente']; ?>
    </td>
    <td>
      <?php echo $fila['nombres']; ?>
    </td>
    <td>
      <?php echo $fila['apellidos']; ?>
    </td>
    <td>
      <?php echo $fila['documento']; ?>
    </td>
    <td>


      <a class="btn btn-warning" href="editar_docente.php?id_docente=<?php echo $fila['id_docente'] ?> ">
        <i class="fa fa-edit"></i> </a>


      <a class="btn btn-danger btn-del" href="eliminar_docente.php?id_docente=<?php echo $fila['id_docente'] ?> ">
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
      title: 'Estas seguro de eliminar este docente?',
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
            'El docente fue eliminado.',
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