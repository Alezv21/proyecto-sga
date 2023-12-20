<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

  header("Location: ../includes/login.php");
  die();


}





$id = $_GET['id'];
$conexion = mysqli_connect("localhost", "root", "", "sdat");
$consulta = "SELECT * FROM usuarios WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

if (isset($_GET['enviar'])) {
  $busqueda = $_GET['busqueda'];

}

?>


<!DOCTYPE html>
<html lang="es-MX">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar usuario</title>

    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/es.css">
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../DataTables/css/dataTables.bootstrap4.min.css">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/resp/bootstrap.min.js"></script>

    <style>
        body {
            background-color: #1e1e1e;
            color: #ff4500;
        }

        .form-group label {
            color: #ff4500;
        }

        .form-control {
            background-color: #343a40;
            color: #ff4500;
        }

        .btn-success {
            background-color: #ff4500;
            border-color: #ff4500;
            color: #1e1e1e;
        }

        .btn-danger {
            background-color: #1e1e1e;
            border-color: #ff4500;
            color: #ff4500;
        }
    </style>
</head>

<body id="page-top" background="https://www.elheraldo.com.ar/fotos/2021/03/23_camiseta.jpg">

    <form action="../includes/_functions.php" method="POST">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <br>
                            <br>
                            <h3 class="text-center">Editar usuario</h3>
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre *</label>
                                <input type="text" id="nombre" name="nombre" class="form-control"
                                    value="<?php echo $usuario['nombre']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="user">Usuario:</label><br>
                                <input type="text" name="user" id="user" class="form-control" placeholder=""
                                    value="<?php echo $usuario['user']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="pass">Contraseña:</label><br>
                                <input type="password" name="pass" id="pass" class="form-control"
                                    value="<?php echo $usuario['pass']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="rol" class="form-label">Rol de usuario *</label>
                                <input type="number" id="rol" name="rol" class="form-control"
                                    value="<?php echo $usuario['rol']; ?>" required>
                                <small class="form-text text-muted">Ejemplo: 1 para Admin, 2 para Director, 3 para Profesor</small>
                                <input type="hidden" name="accion" value="editar_usuario">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                            </div>
                            <br>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Editar</button>
                                <a href="usuarios.php" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

  </form>
  </div>
  </div>
  </div>
  </div>
  </div>
  </form>
  <br>
  <div class="col-xs-12">
  </div>
  </div>
  </div>
  </div>
  </div>
  </form>




  <div class="container is-fluid">

<script>
  $('.btn-del').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href')

    Swal.fire({
      title: 'Estas seguro de eliminar este registro?',
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
            'El registro fue eliminado.',
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




<?php include('../index.php'); ?>

</body>

</html>
