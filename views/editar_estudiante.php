<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {
    header("Location: ../includes/login.php");
    die();
}

$id_estudiante = $_GET['id_estudiante'];
$conexion = mysqli_connect("localhost", "root", "", "sdat");
$consulta = "SELECT estudiante.id_estudiante, estudiante.nombres, estudiante.apellidos, estudiante.edad, estudiante.sexo, seccion.descripcion secdes, cursos.descripcion curdes
FROM estudiante
LEFT JOIN registro_estudiante_curso on registro_estudiante_curso.id_estudiante = estudiante.id_estudiante
LEFT JOIN cursos ON cursos.id_curso = registro_estudiante_curso.id_curso
LEFT JOIN seccion on seccion.id_seccion = registro_estudiante_curso.id_seccion WHERE estudiante.id_estudiante = $id_estudiante";
$resultado = mysqli_query($conexion, $consulta);
$estudiante = mysqli_fetch_assoc($resultado);

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
    <title>Editar estudiante</title>

    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/es.css">
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">

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
                            <h3 class="text-center">Editar estudiante</h3>
                            <div class="form-group">
                                <label for="nombres" class="form-label">Nombres *</label>
                                <input type="text" id="nombres" name="nombres" class="form-control"
                                    value="<?php echo $estudiante['nombres']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos:</label><br>
                                <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder=""
                                    value="<?php echo $estudiante['apellidos']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="edad">Edad:</label><br>
                                <input type="number" name="edad" id="edad" class="form-control"
                                    value="<?php echo $estudiante['edad']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="sexo">Sexo:</label><br>
                                <select name="sexo" id="sexo" class="form-control" required>
                                    <option value="masculino" <?php echo ($estudiante['sexo'] == 'masculino') ? 'selected' : ''; ?>>Masculino</option>
                                    <option value="femenino" <?php echo ($estudiante['sexo'] == 'femenino') ? 'selected' : ''; ?>>Femenino</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="curso">Curso *</label>
                                <select name="curso" id="curso" class="form-control" required>
                                    <?php
                                    $queryCursos = "SELECT id_curso, descripcion FROM cursos";
                                    $resultCursos = mysqli_query($conexion, $queryCursos);

                                    while ($rowCurso = mysqli_fetch_assoc($resultCursos)) {
                                        $selected = ($estudiante['id_curso'] == $rowCurso['id_curso']) ? 'selected' : '';
                                        echo "<option value='{$rowCurso['id_curso']}' {$selected}>{$rowCurso['descripcion']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="seccion">Sección *</label>
                                <select name="seccion" id="seccion" class="form-control" required>
                                    <?php
                                    $querySecciones = "SELECT id_seccion, descripcion FROM seccion";
                                    $resultSecciones = mysqli_query($conexion, $querySecciones);

                                    while ($rowSeccion = mysqli_fetch_assoc($resultSecciones)) {
                                        $selected = ($estudiante['id_seccion'] == $rowSeccion['id_seccion']) ? 'selected' : '';
                                        echo "<option value='{$rowSeccion['id_seccion']}' {$selected}>{$rowSeccion['descripcion']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="accion" value="editar_estudiante">
                                <input type="hidden" name="id_estudiante" value="<?php echo $id_estudiante; ?>">
                            </div>

                            <br>

                            <div class="mb-3">

                <button type="submit" class="btn btn-success">Editar</button>
                <a href="estudiante.php" class="btn btn-danger">Cancelar</a>

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
